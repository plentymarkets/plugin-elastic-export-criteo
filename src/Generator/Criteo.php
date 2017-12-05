<?php

namespace ElasticExportCriteo\Generator;

use ElasticExport\Helper\ElasticExportCoreHelper;
use ElasticExport\Helper\ElasticExportItemHelper;
use ElasticExport\Helper\ElasticExportPriceHelper;
use ElasticExport\Helper\ElasticExportStockHelper;
use ElasticExport\Helper\ElasticExportPropertyHelper;
use ElasticExportCriteo\Helper\AttributeHelper;
use ElasticExportCriteo\Helper\ImageHelper;
use ElasticExportCriteo\Helper\PriceHelper;
use Plenty\Modules\DataExchange\Contracts\CSVPluginGenerator;
use Plenty\Modules\Helper\Services\ArrayHelper;
use Plenty\Modules\DataExchange\Models\FormatSetting;
use Plenty\Modules\Helper\Models\KeyValue;
use Plenty\Modules\Item\Search\Contracts\VariationElasticSearchScrollRepositoryContract;
use Plenty\Plugin\Log\Loggable;

/**
 * Class Criteo
 * @package ElasticExportCriteo\Generator
 */
class Criteo extends CSVPluginGenerator
{
    use Loggable;

    const CHARACTER_TYPE_GENDER                     = 'gender';
    const CHARACTER_TYPE_AGE_GROUP                  = 'age_group';
    const CHARACTER_TYPE_ADULT                      = 'adult';
    const CHARACTER_TYPE_SIZE_TYPE                  = 'size_type';
    const CHARACTER_TYPE_SIZE_SYSTEM                = 'size_system';
    const CHARACTER_TYPE_ENERGY_EFFICIENCY_CLASS    = 'energy_efficiency_class';
    const CHARACTER_TYPE_EXCLUDED_DESTINATION       = 'excluded_destination';
    const CHARACTER_TYPE_ADWORDS_REDIRECT           = 'adwords_redirect';
    const CHARACTER_TYPE_MOBILE_LINK                = 'mobile_link';
    const CHARACTER_TYPE_SALE_PRICE_EFFECTIVE_DATE  = 'sale_price_effective_date';
    const CHARACTER_TYPE_CUSTOM_LABEL_0             = 'custom_label_0';
    const CHARACTER_TYPE_CUSTOM_LABEL_1             = 'custom_label_1';
    const CHARACTER_TYPE_CUSTOM_LABEL_2             = 'custom_label_2';
    const CHARACTER_TYPE_CUSTOM_LABEL_3             = 'custom_label_3';
    const CHARACTER_TYPE_CUSTOM_LABEL_4             = 'custom_label_4';
    const CHARACTER_TYPE_DESCRIPTION                = 'description';
    const CHARACTER_TYPE_COLOR                      = 'color';
    const CHARACTER_TYPE_SIZE                       = 'size';
    const CHARACTER_TYPE_PATTERN                    = 'pattern';
    const CHARACTER_TYPE_MATERIAL                   = 'material';
    const CHARACTER_TYPE_ADS_TITLE                  = 'display_ads_title';
    const CHARACTER_TYPE_ADS_VALUE                  = 'display_ads_value';
    const CHARACTER_TYPE_PROMOTION_ID               = 'promotion_id';
    const CHARACTER_TYPE_PROMO_TEXT                 = 'promo_text';
    const CHARACTER_TYPE_CROSS_SELLER               = 'cross_sellers_products_id';
    const CHARACTER_TYPE_SELLER_NAME                = 'seller_name';
    const CHARACTER_TYPE_SELLER_ID                  = 'seller_id';

    const ISO_CODE_2                                = 'isoCode2';
    const ISO_CODE_3                                = 'isoCode3';

    const CRITEO                                    = 153.00;
    const GOOGLE_SHOPPING                           = 7.00;

    const DELIMITER = "\t"; // TAB

    /**
     * @var ElasticExportCoreHelper $elasticExportHelper
     */
    private $elasticExportHelper;

    /**
     * @var ArrayHelper $arrayHelper
     */
    private $arrayHelper;

    /**
     * @var AttributeHelper $attributeHelper
     */
    private $attributeHelper;

    /**
     * @var PriceHelper $priceHelper
     */
    private $priceHelper;

    /**
     * @var ImageHelper $imageHelper
     */
    private $imageHelper;

    /**
     * @var ElasticExportStockHelper $elasticExportStockHelper
     */
    private $elasticExportStockHelper;

    /**
     * @var ElasticExportPriceHelper $elasticExportPriceHelper
     */
    private $elasticExportPriceHelper;

    /**
     * @var ElasticExportItemHelper $elasticExportItemHelper
     */
    private $elasticExportItemHelper;

    /**
     * @var ElasticExportPropertyHelper $elasticExportPropertyHelper
     */
    private $elasticExportPropertyHelper;

    /**
     * @var array
     */
    private $shippingCostCache;

    /**
     * Criteo constructor.
     *
     * @param ArrayHelper $arrayHelper
     * @param AttributeHelper $attributeHelper
     * @param PriceHelper $priceHelper
     * @param ImageHelper $imageHelper
     */
    public function __construct(
        ArrayHelper $arrayHelper,
        AttributeHelper $attributeHelper,
        PriceHelper $priceHelper,
        ImageHelper $imageHelper
    )
    {
        $this->arrayHelper = $arrayHelper;
        $this->attributeHelper = $attributeHelper;
        $this->priceHelper = $priceHelper;
        $this->imageHelper = $imageHelper;
    }

    /**
     * Generates and populates the data into the CSV file.
     *
     * @param VariationElasticSearchScrollRepositoryContract $elasticSearch
     * @param array $formatSettings
     * @param array $filter
     */
    protected function generatePluginContent($elasticSearch, array $formatSettings = [], array $filter = [])
    {
        $this->elasticExportHelper = pluginApp(ElasticExportCoreHelper::class);
        $this->elasticExportPriceHelper = pluginApp(ElasticExportPriceHelper::class);
        $this->elasticExportStockHelper = pluginApp(ElasticExportStockHelper::class);
        $this->elasticExportItemHelper = pluginApp(ElasticExportItemHelper::class);
        $this->elasticExportPropertyHelper = pluginApp(ElasticExportPropertyHelper::class);

        // Set the property helper
        $this->attributeHelper->setPropertyHelper();

        // Get mapped settings from export
        $settings = $this->arrayHelper->buildMapFromObjectList($formatSettings, 'key', 'value');

        // Delimiter accepted are TAB or COMMA
        $this->setDelimiter(self::DELIMITER);

        // Add the header of the CSV file
        $this->addCSVContent($this->head());

        // Add the attributes linked to GoogleShopping
        $this->attributeHelper->loadLinkedAttributeList($settings);

        if($elasticSearch instanceof VariationElasticSearchScrollRepositoryContract)
        {
            // Set the documents per shard for a faster processing
            $elasticSearch->setNumberOfDocumentsPerShard(250);

            // Initiate the counter for the variations limit
            $limitReached = false;
            $limit = 0;
			$shardIterator = 0;

            do 
            {
                // Stop writing if limit is reached
                if($limitReached === true)
                {
                    break;
                }

                // Get the data from Elastic Search
                $resultList = $elasticSearch->execute();

				$shardIterator++;

				// Log the amount of the elasticsearch result once
				if($shardIterator == 1)
				{
					$this->getLogger(__METHOD__)->addReference('total', (int)$resultList['total'])->info('ElasticExportCriteo::log.esResultAmount');
				}

                if(count($resultList['error']) > 0)
                {
                    $this->getLogger(__METHOD__)->addReference('failedShard', $shardIterator)->error('ElasticExportCriteo::log.occurredElasticSearchErrors', [
                        'message' => $resultList['error'],
                    ]);
                }

                if(is_array($resultList['documents']) && count($resultList['documents']) > 0)
                {
                    $previousItemId = null;

                    foreach ($resultList['documents'] as $variation)
                    {
                        // Stop and set the flag if limit is reached
                        if($limit == $filter['limit'])
                        {
                            $limitReached = true;
                            break;
                        }

                        // If filtered by stock is set and stock is negative, then skip the variation
                        if($this->elasticExportStockHelper->isFilteredByStock($variation, $filter) === true)
                        {
                            continue;
                        }

                        try
                        {
                            // Set the caches if we have the first variation or when we have the first variation of an item
                            if($previousItemId === null || $previousItemId != $variation['data']['item']['id'])
                            {
                                $previousItemId = $variation['data']['item']['id'];
                                unset($this->shippingCostCache);

                                // Build the caches arrays
                                $this->buildCaches($variation, $settings);
                            }

                            // New line printed in the CSV file
                            $this->buildRow($variation, $settings);
                        }
                        catch(\Throwable $throwable)
                        {
                            $this->getLogger(__METHOD__)->error('ElasticExportCriteo::logs.fillRowError', [
                                'message'       => $throwable->getMessage(),
                                'line'          => $throwable->getLine(),
                                'variationId'   => $variation['id']
                            ]);
                        }

                        // Count the new printed line
                        $limit++;
                    }
                }
                
            } while ($elasticSearch->hasNext());
        }
    }

    /**
     * Creates the header of the CSV file.
     *
     * @return array
     */
    private function head():array
    {
        return array(
            //mandatory
            'id',
            'title',
            'description',
            'google_product_category',
            'link',
            'image_link',
            'additional_image_link',
            'availability',
            'price',
            'sale_price',
            'gtin',
            'mpn',
            'brand',
            'adult',
            'product_type',
            'product_type_key',
            'number_of_reviews',
            'product_rating',
            'filters',

            //optional
            'mobile_link',
            'condition',

            //product variant
            'item_group_id',
            'color',
            'gender',
            'age_group',
            'material',
            'pattern',
            'size',
            'size_type',
            'size_system',
            'cross_sellers_product_id',
            'seller_name',
            'seller_id',

            //shipping
            'shipping',
            'shipping_weight',
            'shipping_height',
            'shipping_width',
            'shipping_length',
            'shipping_label',

            //product pack
            'multipack',
            'is_bundle',
            'promotion_id',
            'promo_text',

            //additional attributes
            'custom_label_0',
            'custom_label_1',
            'custom_label_2',
            'custom_label_3',
            'custom_label_4',
            'sale_price_effective_date',
            'adwords_redirect',
            'excluded_destination',
            'expiration_date',
            'unit_pricing_measure',
            'unit_pricing_base_measure',
            'display_ads_title',
            'display_ads_value',
            'map_price',
            'model_number',
        );
    }

    /**
     * Creates the variation row and prints it into the CSV file.
     *
     * @param array $variation
     * @param KeyValue $settings
     */
    private function buildRow($variation, KeyValue $settings)
    {
        // Get the variation attributes
        $variationAttributes = $this->attributeHelper->getVariationAttributes($variation, $settings);

        // Get and set the price and rrp
        $priceList = $this->getPriceList($variation, $settings);

        // Get the images only for valid variations
        $imageList = $this->elasticExportHelper->getImageListInOrder($variation, $settings, 11, 'variationImages');
        $images = $this->imageHelper->getImages($imageList);

        // Base price fields
        $basePriceComponents = $this->priceHelper->getBasePriceComponents($variation);

        $data = [
            //mandatory
            'id'                            => $this->elasticExportHelper->generateSku($variation['id'], self::CRITEO, 0, (string)$variation['data']['skus'][0]['sku']),
            'title'                         => $this->elasticExportHelper->getMutatedName($variation, $settings),
            'description'                   => $this->getDescription($variation, $settings),
            'google_product_category'       => $this->elasticExportHelper->getCategoryMarketplace((int)$variation['data']['defaultCategories'][0]['id'], (int)$settings->get('plentyId'), (int)self::GOOGLE_SHOPPING),
            'link'                          => $this->elasticExportHelper->getMutatedUrl($variation, $settings, true, false),
            'image_link'                    => $images[ImageHelper::MAIN_IMAGE],
            'additional_image_link'         => $images[ImageHelper::ADDITIONAL_IMAGES],
            'availability'                  => $this->getAvailability($variation, $settings),
            'price'                         => $priceList['price'],
            'sale_price'                    => $priceList['salePrice'],
            'gtin'                          => $this->elasticExportHelper->getBarcodeByType($variation, $settings->get('barcode')),
            'mpn'                           => $variation['data']['variation']['model'],
            'brand'                         => $this->elasticExportHelper->getExternalManufacturerName((int)$variation['data']['item']['manufacturer']['id']),
            'adult'                         => $this->elasticExportPropertyHelper->getProperty($variation, self::CHARACTER_TYPE_ADULT, self::CRITEO, $settings->get('lang')),
            'product_type'                  => $this->elasticExportHelper->getCategory((int)$variation['data']['defaultCategories'][0]['id'], $settings->get('lang'), $settings->get('plentyId')),
            'product_type_key'              => '',
            'number_of_reviews'             => '',
            'product_rating'                => '',
            'filters'                       => '',

            //optional
            'mobile_link'                   => $this->elasticExportPropertyHelper->getProperty($variation, self::CHARACTER_TYPE_MOBILE_LINK, self::CRITEO, $settings->get('lang')),
            'condition'                     => $this->getCondition($variation['data']['item']['conditionApi']['id']),

            //product variant
            'item_group_id'                 => $variation['data']['item']['id'],
            'color'                         => $variationAttributes[self::CHARACTER_TYPE_MATERIAL],
            'gender'                        => $this->elasticExportPropertyHelper->getProperty($variation, self::CHARACTER_TYPE_GENDER, self::CRITEO, $settings->get('lang')),
            'age_group'                     => $this->elasticExportPropertyHelper->getProperty($variation, self::CHARACTER_TYPE_AGE_GROUP, self::CRITEO, $settings->get('lang')),
            'material'                      => $variationAttributes[self::CHARACTER_TYPE_MATERIAL],
            'pattern'                       => $variationAttributes[self::CHARACTER_TYPE_PATTERN],
            'size'                          => $variationAttributes[self::CHARACTER_TYPE_SIZE],
            'size_type'                     => $this->elasticExportPropertyHelper->getProperty($variation, self::CHARACTER_TYPE_SIZE_TYPE, self::CRITEO, $settings->get('lang')),
            'size_system'                   => $this->elasticExportPropertyHelper->getProperty($variation, self::CHARACTER_TYPE_SIZE_SYSTEM, self::CRITEO, $settings->get('lang')),
            'cross_sellers_product_id'      => $this->elasticExportPropertyHelper->getProperty($variation, self::CHARACTER_TYPE_CROSS_SELLER, self::CRITEO, $settings->get('lang')),
            'seller_name'                   => $this->elasticExportPropertyHelper->getProperty($variation, self::CHARACTER_TYPE_SELLER_NAME, self::CRITEO, $settings->get('lang')),
            'seller_id'                     => $this->elasticExportPropertyHelper->getProperty($variation, self::CHARACTER_TYPE_SELLER_ID, self::CRITEO, $settings->get('lang')),

            //shipping
            'shipping'                      => $this->getShippingCost($variation),
            'shipping_weight'               => $variation['data']['variation']['weightG'].' g',
            'shipping_height'               => '',
            'shipping_width'                => '',
            'shipping_length'               => '',
            'shipping_label'                => '',

            //product pack
            'multipack'                     => '',
            'is_bundle'                     => '',
            'promotion_id'                  => $this->elasticExportPropertyHelper->getProperty($variation, self::CHARACTER_TYPE_PROMOTION_ID, self::CRITEO, $settings->get('lang')),
            'promo_text'                    => $this->elasticExportPropertyHelper->getProperty($variation, self::CHARACTER_TYPE_PROMO_TEXT, self::CRITEO, $settings->get('lang')),

            //additional attributes
            'custom_label_0'			    => $this->elasticExportPropertyHelper->getProperty($variation, self::CHARACTER_TYPE_CUSTOM_LABEL_0, self::CRITEO, $settings->get('lang')),
            'custom_label_1'			    => $this->elasticExportPropertyHelper->getProperty($variation, self::CHARACTER_TYPE_CUSTOM_LABEL_1, self::CRITEO, $settings->get('lang')),
            'custom_label_2'			    => $this->elasticExportPropertyHelper->getProperty($variation, self::CHARACTER_TYPE_CUSTOM_LABEL_2, self::CRITEO, $settings->get('lang')),
            'custom_label_3'			    => $this->elasticExportPropertyHelper->getProperty($variation, self::CHARACTER_TYPE_CUSTOM_LABEL_3, self::CRITEO, $settings->get('lang')),
            'custom_label_4'			    => $this->elasticExportPropertyHelper->getProperty($variation, self::CHARACTER_TYPE_CUSTOM_LABEL_4, self::CRITEO, $settings->get('lang')),
            'sale_price_effective_date'     => $this->elasticExportPropertyHelper->getProperty($variation, self::CHARACTER_TYPE_SALE_PRICE_EFFECTIVE_DATE, self::CRITEO, $settings->get('lang')),
            'adwords_redirect'              => $this->elasticExportPropertyHelper->getProperty($variation, self::CHARACTER_TYPE_ADWORDS_REDIRECT, self::CRITEO, $settings->get('lang')),
            'excluded_destination'          => $this->elasticExportPropertyHelper->getProperty($variation, self::CHARACTER_TYPE_EXCLUDED_DESTINATION, self::CRITEO, $settings->get('lang')),
            'expiration_date'               => '',
            'unit_pricing_measure'		    => $basePriceComponents['unit_pricing_measure'],
            'unit_pricing_base_measure'	    => $basePriceComponents['unit_pricing_base_measure'],
            'display_ads_title'             => $this->elasticExportPropertyHelper->getProperty($variation, self::CHARACTER_TYPE_ADS_TITLE, self::CRITEO, $settings->get('lang')),
            'display_ads_value'             => $this->elasticExportPropertyHelper->getProperty($variation, self::CHARACTER_TYPE_ADS_VALUE, self::CRITEO, $settings->get('lang')),
            'map_price'                     => '',
            'model_number'                  => '',
        ];

        $this->addCSVContent(array_values($data));
    }

    /**
     * Get the price list.
     *
     * @param  array    $variation
     * @param  KeyValue $settings
     * @return array
     */
    private function getPriceList(array $variation, KeyValue $settings):array
    {
        $priceList = $this->elasticExportPriceHelper->getPriceList($variation, $settings, 2, '.');
        $variationPrice = $priceList['price'] . ' ' . $priceList['currency'];

        if(strlen($priceList['price']) == 0)
        {
            // manufacturer or normal price
            $variationPrice = '';
        }

        $salePrice = $priceList['specialPrice'] . ' ' . $priceList['currency'];

        if(strlen($priceList['specialPrice']) == 0 || $salePrice >= $variationPrice)
        {
            // special sale price
            $salePrice = '';
        }

        return [
            'price'     => $variationPrice,
            'salePrice' => $salePrice,
        ];
    }

    /**
     * Get availability text.
     *
     * @param  array $variation
     * @param  KeyValue $settings
     * @return string
     */
    public function getAvailability($variation, $settings):string
    {
        $variationAvailabilityDays = $this->elasticExportHelper->getAvailability($variation, $settings, false);

        if($variationAvailabilityDays > 0)
        {
            return 'in stock';
        }

        return 'out of stock';
    }

    /**
     * Check if condition is valid.
     *
     * @param int|null $conditionId
     * @return string
     */
    private function getCondition($conditionId):string
    {
        $conditionList = [
            0 => 'new',
            1 => 'used',
            2 => 'used',
            3 => 'used',
            4 => 'used',
            5 => 'refurbished'
        ];

        if (!is_null($conditionId) && array_key_exists($conditionId, $conditionList))
        {
            return $conditionList[$conditionId];
        }
        else
        {
            return '';
        }
    }

    /**
     * Returns the description of a variation. Priority has a "description" property. Is
     * no property linked, it will return the default description text.
     *
     * @param array $variation
     * @param KeyValue $settings
     * @return string
     */
    private function getDescription($variation, KeyValue $settings):string
    {
        $description = $this->elasticExportPropertyHelper->getProperty($variation, self::CHARACTER_TYPE_DESCRIPTION, self::CRITEO, $settings->get('lang'));

        if (strlen($description) <= 0)
        {
            $description = $this->elasticExportHelper->getMutatedDescription($variation, $settings, 5000);
        }

        return $description;
    }

    /**
     * Get the shipping cost.
     *
     * @param $variation
     * @return string
     */
    private function getShippingCost($variation):string
    {
        if(isset($this->shippingCostCache) && array_key_exists($variation['data']['item']['id'], $this->shippingCostCache))
        {
            return $this->shippingCostCache[$variation['data']['item']['id']];
        }

        return '';
    }

    /**
     * Build the cache arrays for the item variation.
     *
     * @param $variation
     * @param $settings
     */
    private function buildCaches($variation, $settings)
    {
        if(!is_null($variation) && !is_null($variation['data']['item']['id']))
        {
            $shippingCost = $this->elasticExportHelper->getShippingCost($variation['data']['item']['id'], $settings);

            if(!is_null($shippingCost))
            {
                $shippingCost = number_format((float)$shippingCost, 2, '.', '');

                $this->shippingCostCache[$variation['data']['item']['id']] = $this->elasticExportHelper->getCountry($settings, self::ISO_CODE_2).':::'.$shippingCost;
            }
            else
            {
                $this->shippingCostCache[$variation['data']['item']['id']] = '';
            }
        }
    }
}
