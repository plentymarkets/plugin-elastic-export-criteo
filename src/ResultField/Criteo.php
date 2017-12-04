<?php

namespace ElasticExportCriteo\ResultField;

use Plenty\Modules\Cloud\ElasticSearch\Lib\ElasticSearch;
use Plenty\Modules\DataExchange\Contracts\ResultFields;
use Plenty\Modules\Helper\Services\ArrayHelper;
use Plenty\Modules\Item\Search\Mutators\BarcodeMutator;
use Plenty\Modules\Item\Search\Mutators\ImageMutator;
use Plenty\Modules\Cloud\ElasticSearch\Lib\Source\Mutator\BuiltIn\LanguageMutator;
use Plenty\Modules\Item\Search\Mutators\KeyMutator;
use Plenty\Modules\Item\Search\Mutators\DefaultCategoryMutator;
use Plenty\Modules\Item\Search\Mutators\SkuMutator;
use ElasticExport\DataProvider\ResultFieldDataProvider;
use Plenty\Plugin\Log\Loggable;

/**
 * Class Criteo
 * @package ElasticExportCriteo\ResultField
 */
class Criteo extends ResultFields
{
	use Loggable;

    const CRITEO = 153.00;

    /**
     * @var ArrayHelper
     */
    private $arrayHelper;

    /**
     * Criteo constructor.
     * 
     * @param ArrayHelper $arrayHelper
     */
    public function __construct(ArrayHelper $arrayHelper)
    {
        $this->arrayHelper = $arrayHelper;
    }

    /**
     * Generate result fields.
     *
     * @param  array $formatSettings = []
     * @return array
     */
    public function generateResultFields(array $formatSettings = []):array
    {
        $settings = $this->arrayHelper->buildMapFromObjectList($formatSettings, 'key', 'value');

        $this->setOrderByList(['item.id', ElasticSearch::SORTING_ORDER_ASC]);

        $reference = $settings->get('referrerId') ? $settings->get('referrerId') : self::CRITEO;

        //Mutator
        /**
         * @var ImageMutator $imageMutator
         */
        $imageMutator = pluginApp(ImageMutator::class);
        if($imageMutator instanceof ImageMutator)
        {
            $imageMutator->addMarket($reference);
        }

        /**
         * @var KeyMutator $keyMutator
         */
        $keyMutator = pluginApp(KeyMutator::class);
        if($keyMutator instanceof KeyMutator)
        {
            $keyMutator->setKeyList($this->getKeyList());
            $keyMutator->setNestedKeyList($this->getNestedKeyList());
        }

        /**
         * @var LanguageMutator $languageMutator
         */
        $languageMutator = pluginApp(LanguageMutator::class, [[$settings->get('lang')]]);

        /**
         * @var SkuMutator $skuMutator
         */
        $skuMutator = pluginApp(SkuMutator::class);
        if($skuMutator instanceof SkuMutator)
        {
            $skuMutator->setMarket($reference);
        }

        /**
         * @var DefaultCategoryMutator $defaultCategoryMutator
         */
        $defaultCategoryMutator = pluginApp(DefaultCategoryMutator::class);
        if($defaultCategoryMutator instanceof DefaultCategoryMutator)
        {
            $defaultCategoryMutator->setPlentyId($settings->get('plentyId'));
        }

        /**
         * @var BarcodeMutator $barcodeMutator
         */
        $barcodeMutator = pluginApp(BarcodeMutator::class);
        if($barcodeMutator instanceof BarcodeMutator)
        {
            $barcodeMutator->addMarket($reference);
        }

		$resultFieldHelper = pluginApp(ResultFieldDataProvider::class);
		if($resultFieldHelper instanceof ResultFieldDataProvider)
		{
			$resultFields = $resultFieldHelper->getResultFields($settings);
		}

		if(isset($resultFields) && is_array($resultFields) && count($resultFields))
		{
			$fields[0] = $resultFields;
			$fields[1] = [
				$languageMutator,
				$skuMutator,
				$defaultCategoryMutator,
				$barcodeMutator,
				$keyMutator,
			];

			if($reference != -1)
			{
				$fields[1][] = $imageMutator;
			}
		}
		else
		{
			$this->getLogger(__METHOD__)->critical('ElasticExportCriteo::log.resultFieldError');
			exit();
		}

        return $fields;
    }

    /**
     * Returns the list of keys.
     *
     * @return array
     */
    private function getKeyList()
    {
        return [
            // Item
            'item.id',
            'item.manufacturer.id',
            'item.conditionApi',

            // Variation
            'variation.availability.id',
            'variation.model',
            'variation.releasedAt',
            'variation.stockLimitation',
            'variation.weightG',
            'variation.widthMM',
            'variation.lengthMM',
            'variation.heightMM',

            // Unit
            'unit.content',
            'unit.id',
        ];
    }

    /**
     * Returns the list of nested keys.
     *
     * @return array
     */
    private function getNestedKeyList()
    {
        return [
            'keys' => [
                // Attributes
                'attributes',

                // Properties
                'properties',

                // Barcodes
                'barcodes',

                // Default categories
                'defaultCategories',

                // Images
                'images.all',
                'images.item',
                'images.variation',

                // Sku
                'skus',

                // Texts
                'texts',
            ],

            'nestedKeys' => [
                // Attributes
                'attributes' => [
                    'attributeValueSetId',
                    'attributeId',
                    'valueId',
                ],

                // Proprieties
                'properties' => [
                    'property.id',
                    'property.valueType',
                    'selection.name',
                    'selection.lang',
                    'texts.value',
                    'texts.lang',
                    'valueInt',
                    'valueFloat',
                ],

                // Barcodes
                'barcodes' => [
                    'code',
                    'type',
                ],

                // Default categories
                'defaultCategories' => [
                    'id',
                ],

                // Images
                'images.all' => [
                    'urlMiddle',
                    'urlPreview',
                    'urlSecondPreview',
                    'url',
                    'path',
                    'position',
                ],
                'images.item' => [
                    'urlMiddle',
                    'urlPreview',
                    'urlSecondPreview',
                    'url',
                    'path',
                    'position',
                ],
                'images.variation' => [
                    'urlMiddle',
                    'urlPreview',
                    'urlSecondPreview',
                    'url',
                    'path',
                    'position',
                ],

                // Sku
                'skus' => [
                    'sku',
                ],

                // Texts
                'texts' => [
                    'urlPath',
                    'name1',
                    'name2',
                    'name3',
                    'shortDescription',
                    'description',
                    'technicalData',
                ],
            ]
        ];
    }
}