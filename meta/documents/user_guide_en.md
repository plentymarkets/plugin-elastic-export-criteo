
# Criteo plugin user guide

## 1 Registering with Criteo

Criteo is a personalized retargeting company that works with Internet retailers to serve personalized online display advertisements to consumers who have previously visited the advertiser's website.
Before you can transfer your export format, you will have to register with Criteo first.

## 2 Setting up the data format Criteo-Plugin in plentymarkets

By installing this plugin yo will receive the export format **Criteo-Plugin**. Use this format to exchange data between plentymarkets and Criteo. It is required to install the Plugin Elastic export from the plentyMarketplace first before you can use the format **Criteo-Plugin** in plentymarkets.

Once both plugins are installed, you can create the export format **Criteo-Plugin**. Refer to the [Elastic Export](https://knowledge.plentymarkets.com/en/basics/data-exchange/elastic-export) page of the manual for further details about the individual format settings.

Creating a new export format:

1. Go to **Data** » **Elastic export**.
2. Click on **New export**.
3. Carry out the settings as desired. Pay attention to the information given in table 1.
4. **Save** the settings.
→ The export format is given an ID and it appears in the overview within the **Exports** tab.

The following table lists details for settings, format settings and recommended item filters for the format **Criteo-Plugin**.

| **Setting**                                           | **Explanation** |
| ---                                                   | --- |
| **Settings**                                          | |
| **Name**                                              | Enter a name. The eport format will be listed under this name in the overview within the Exports tab. |
| **Type**                                              | Select the type **Item** from the dropdown menu. |
| **Format**                                            | Choose **Criteo-Plugin**. |
| **Limit**                                             | Enter a number. If you want to transfer more than 9,999 data records, then the output file will not be generated again for another 24 hours. This is to save resources. If more than 9,999 data records are necessary, the setting **Generate cache file** has to be active. |
| **Generate cache file**                               | Place a check mark if you want to transfer more than 9,999 data records. The output file will not be generated again for 24 hours. We recommend not to activate this setting for more than 20 export formats. This is to save resources. |
| **Provisioning**                                      | Choose **URL**. |
| **Token, URL**                                        | If you selected the option **URL** under **Provisioning**, then click on **Generate token**. The token will be entered automatically. The URL will be entered automatically if the token was generated under **Token**. |
| **File name**                                         | The file name must have the ending **.csv** for Criteo to be able to import the file successfully. |
| **Item filters**                                      | |
| **Add item filters**                                  | Select an item filter from the drop-down menu and click on **Add**. There are no filters set in default. It is possible to add multiple item filters from the drop-down menu one after the other. **Variations** = Select **Transfer all** or **Only transfer main variations**. **Markets** = Select one market, several or **ALL**. The availability for all markets selected here has to be saved for the item. Otherwise, the export will not take place. **Currency** = Select a currency. **Category** = Activate to transfer the item with its category link. Only items belonging to this category will be exported. **Image** = Activate to transfer the item with its image. Only items with images will be transferred. **Client** = Select client. **Stock** = Select which stocks you want to export. **Flag 1 - 2** = Select the flag. **Manufacturer** = Select one, several or **ALL** manufacturers. **Active** = Only active variations will be exported. |
| **Format settings**                                   | |
| **Product URL**                                       | Choose wich URL should be transferred to the price comparison portal, the item’s URL or the variation’s URL. Variation SKUs can only be transferred in combination with the Ceres store. |
| **Client**                                            | Select a client. This setting is used for the URL structure. |
| **URL parameter**                                     | Enter a suffix for the product URL if this is required for the export. If you activated the transfer option for the product URL further up, then this character string will be added to the product URL. |
| **Order referrer**                                    | Choose the order referrer that should be assigned during the order import. |
| **Market account**                                    | Select the market account from the drop-down menu. The selected referrer will be added to the product URL so that sales can be analysed later. |
| **Language**                                          | Select the language from the drop-down menu. |
| **Item name**                                         | Select **Name 1**, **Name 2** or **Name 3**. These names are saved in the **Texts** tab of the item. Enter a number into the **Maximum number of characters (def. Text)** field if desired. This will specify how many characters should be exported for the item name. |
| **Preview text**                                      | This option is not relevant for this format. |
| **Description**                                       | Select the text that you want to transfer as description. Enter a number into the **Maximum number of characters (def. text)** field if desired. This will specify how many characters should be exported for the description. Activate the option **Remove HTML tags** if you want HTML tags to be removed during the export. If you only want to allow specific HTML tags to be exported, then enter these tags into the field **Permitted HTML tags, separated by comma (def. Text)**. Use commas to separate multiple tags. |
| **Target country**                                    | Select the target country from the drop-down menu. |
| **Barcode**                                           | Select the ASIN, ISBN or an EAN from the drop-down menu. The barcode has to be linked to the order referrer selected above. If the barcode is not linked to the order referrer it will not be exported. |
| **Image**                                             | Select **Position 0** or **First image** to export this image. **Position 0** = An image with position 0 will be transferred. **First image** = The first image will be transferred. |
| **Image position of the energy label**                | This option does not affect this format. |
| **Stockbuffer**                                       | The stock buffer for variations with limitation to the net stock. |
| **Stock for variations without stock limitation**     | The stock for variations without stock limitation. |
| **Stock for variations with no stock administration** | The stock for variations without stock adminstration. |
| **Live currency conversion**                          | Activate this option to convert the price into the currency of the selected country of delivery. The price has to be released for the corresponding currency. |
| **Retail price**                                      | Select the gross price or net price from the drop-down list. |
| **Offer price**                                       | This option is not relevant for this format. |
| **RRP**                                               | Activate to transfer the RRP. |
| **Shipping costs**                                    | Activate this option if you want to use the shipping costs that are saved in a configuration. If this option is activated, then you will be able to select the configuration and the payment method from the drop-down menus. Activate the option **Transfer flat rate shipping charge** if you want to use a fixed shipping charge. If this option is activated, a value has to be entered in the line underneath. |
| **VAT note**                                          | This option is not relevant for this format. |
| **Item availability**                                 | Activate the **overwrite** option and enter item availabilities into the fields 1 to 10. The fields represent the IDs of the availabilities. This will overwrite the item availabilities that are saved in the menu **System » Item » Availability**. |

_Tab. 1: Settings for the data format **Criteo-Plugin**_ 

## 3 Available columns of the export file

Go to **Data** » **Elastic export** and open the data format **Criteo-Plugin** in order to download the export file.

| **Column name**           | **Explanation** |
| ---                       | --- |
| id                        | The Criteo **SKU** for the variation. |
| title                     | According to the format setting **Item name**. |
| description               | According to the format setting **Description**. |
| google_product_category   | According to the setting **Settings** » **Markets** » **Google** » **Google Shopping Int.** the Google Shopping category for the default category. |
| link                      | The **URL path** of the item depending on the chosen **client** in the format settings. |
| image_link                | The **image url**. Variation images are prioritized over item images. |
| additional_image_link     | Additional comma separated image URLs for up to 10 images. Variation images are prioritized over item images. |
| availability              | The **name of the item availability** under **Settings** » **Item** » **Item availability** or the translation according to the format setting **Item availability**. |
| price                     | The **sales price** of the variation. |
| sale_price                | The **special price** of the variation. |
| gtin                      | According to the format setting **Barcode**. |
| mpn                       | The **Model** of the variation. |
| brand                     | The **name of the manufacturer** of the item. The **external name** from the menu **Settings** » **Items** » **Manufacturer** will be preferred if existing. |
| adult                     | The adult status according to the Criteo property **adult**. Possible values **yes** and **no**. |
| product_type              | The **name of the default category**. |
| product_type_key          | Empty. |
| number_of_ratings         | Empty. |
| product_rating            | Empty. |
| filters                   | Empty. |
| mobile_link               | The mobile link according to the Criteo property **mobile link**. |
| condition                 | The condition of the item. According to **Item** » **Edit item** » **Global** » **Basic Settings** » **Condition for API**. Possible values **new**, **refurbished**, **used**. |
| item_group_id             | The **item ID** of the variation. |
| color                     | The **color** of the variation according to the attribute or property. Properties are prioritized. |
| gender                    | The gender according to the Criteo property **gender**. Possible values **female**, **male** and **unisex**. |
| age_group                 | The age group according to the Criteo property **age group**. Possible values **newborn**, **infant**, **toddler**, **kids** and **adult**. |
| material                  | The **material** of the variation according to the attribute or property. Properties are prioritized. |
| pattern                   | The **pattern** of the variation according to the attribute or property. Properties are prioritized. |
| size                      | The **size** of the variation according to the attribute or property. Properties are prioritized. |
| size_type                 | The size type according to the Criteo property **size type**. |
| size_system               | The size system according to the Criteo property **size system**. Possible values **US**, **UK**, **EU**, **UK**, **DE**, **FR**, **JP**, **CN**, **IT**, **BR**, **MEX** and **AU**. |
| cross_sellers_product_id  | The cross sellers product ID according to the Criteo property **cross sellers product ID**. |
| seller_name               | The seller name according to the Criteo property **seller name**. |
| seller_id                 | The seller id according to the Criteo property **seller id**. |
| shipping                  | According to the format setting **Shipping costs**. |
| shipping_weight           | The **weight** of the variation. |
| shipping_height           | The **height** of the variation. |
| shipping_width            | The **width** of the variation. |
| shipping_label            | The **label** of the variation. |
| multipack                 | Empty. |
| is_bundle                 | Empty. |
| promotion_id              | The promotion ID according to the Criteo property **promotion id**. |
| promo_text                | The promotion text according to the Criteo property **promotion text**. |
| custom_label_0            | The custom label 0 according to the Criteo property **Custom label 0**. |
| custom_label_1            | The custom label 0 according to the Criteo property **Custom label 1**. |
| custom_label_2            | The custom label 0 according to the Criteo property **Custom label 2**. |
| custom_label_3            | The custom label 0 according to the Criteo property **Custom label 3**. |
| custom_label_4            | The custom label 0 according to the Criteo property **Custom label 4**. |
| sale_price_effective_date | The sale price effective date according to the Criteo property **sale price effective date**. |
| adwords_redirect          | AdWords redirect according to the Criteo property **AdWords Redirect**. |
| excluded_destination      | The excluded destination according to the Criteo property **excluded destination**. |
| expiration_date           | Empty. |
| unit_pricing_measure      | The **unit** of the variation. |
| unit_pricing_base_measure | The **base unit** of the variation according to **unit_pricing_measure**. |
| display_ads_title         | The display ads title according to the Criteo property **display ads title**. |
| display_ads_value         | The display ads value according to the Criteo property **display ads value**. |
| map_price                 | Empty. |
| map_model                 | Empty. |

_Tab. 2: Export file for **Criteo**_

Refer to [Criteo](https://support.criteo.com/hc/en-us/articles/207571095-Criteo-Product-Feed-specification) for additional information.

## 4 License

This project is licensed under the GNU AFFERO GENERAL PUBLIC LICENSE.- find further information in the [LICENSE.md](https://github.com/plentymarkets/plugin-elastic-export-criteo/blob/master/LICENSE.md).
