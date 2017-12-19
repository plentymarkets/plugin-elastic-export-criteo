
# Criteo plugin user guide

## 1 Registering with Criteo

Criteo is a personalized retargeting company that works with Internet retailers to serve personalized online display advertisements to consumers who have previously visited the advertiser's website.
Before you can transfer your export format, you will have to register with Criteo first.

## 2 Setting up the data format Criteo-Plugin in plentymarkets

The plugin Elastic Export is required to use this format.

Refer to the [Exporting data formats for price search engines](https://knowledge.plentymarkets.com/en/basics/data-exchange/exporting-data#30) page of the manual for further details about the individual format settings.

Creating a new export format:

1. Go to **Data** » **Elastic export**.
2. Click on **New export**.
3. Carry out the settings as desired. Pay attention to the information given in table 1.
4. **Save** the settings.
→ The export format will be given an ID and it will appear in the overview within the **Exports** tab.

The following table lists details for settings, format settings and recommended item filters for the format **Criteo-Plugin**.

| Settings                      | Explanation |
| ---                           | --- |
| Settings                      |     |
| Format                        | Choose **Criteo-Plugin**. |
| Provisioning                  | Choose **URL**. |
| File name                     | The file name must have the ending **.csv** for Criteo to be able to import the file successfully. |
| Item filter                   |     |
| Active                        | Choose **Aktiv**. |
| Markets                       | Choose one or multiple order referrer. The chosen order referrer has to be active at the variation for the item to be exported. |
| Format settings               |     |
| Order referrer                | Choose the order referrer that should be assigned during the order import. |
| Preview text                  | This option is not relevant for this format. |
| Offer price                   | This option is not relevant for this format. |
| VAT note                      | This option is not relevant for this format. |

_Tab. 1: Settings for the data format **Criteo-Plugin**_ 

## 3 Overview of available columns

Refer to [Criteo](https://support.criteo.com/hc/en-us/articles/207571095-Criteo-Product-Feed-specification) for additional information.


| Column name                   | Explanation |
| ---                           | --- |
| id                            | The Criteo **SKU** for the variation. |
| title                         | According to the format setting **Item name**. |
| description                   | According to the format setting **Description**. |
| google_product_category       | According to the setting **Settings** » **Markets** » **Google** » **Google Shopping Int.** the Google Shopping category for the default category. |
| link                          | The **URL path** of the item depending on the chosen **client** in the format settings. |
| image_link                    | The **image url**. Variation images are prioritized over item images. |
| additional_image_link         | Additional comma separated image URLs for up to 10 images. Variation images are prioritized over item images. |
| availability                  | The **name of the item availability** under **Settings** » **Item** » **Item availability** or the translation according to the format setting **Item availability**. |
| price                         | The **sales price** of the variation. |
| sale_price                    | The **special price** of the variation. |
| gtin                          | According to the format setting **Barcode**. |
| mpn                           | The **Model** of the variation. |
| brand                         | The **name of the manufacturer** of the item. The **external name** from the menu **Settings** » **Items** » **Manufacturer** will be preferred if existing. |
| adult                         | The adult status according to the Criteo property **adult**. Possible values **yes** and **no**. |
| product_type                  | The **name of the default category**. |
| product_type_key              | Empty. |
| number_of_ratings             | Empty. |
| product_rating                | Empty. |
| filters                       | Empty. |
| mobile_link                   | The mobile link according to the Criteo property **mobile link**. |
| condition                     | The condition of the item. According to **Item** » **Edit item** » **Global** » **Basic Settings** » **Condition for API**. Possible values **new**, **refurbished**, **used**. |
| item_group_id                 | The **item ID** of the variation. |
| color                         | The **color** of the variation according to the attribute or property. Properties are prioritized. |
| gender                        | The gender according to the Criteo property **gender**. Possible values **female**, **male** and **unisex**. |
| age_group                     | The age group according to the Criteo property **age group**. Possible values **newborn**, **infant**, **toddler**, **kids** and **adult**. |
| material                      | The **material** of the variation according to the attribute or property. Properties are prioritized. |
| pattern                       | The **pattern** of the variation according to the attribute or property. Properties are prioritized. |
| size                          | The **size** of the variation according to the attribute or property. Properties are prioritized. |
| size_type                     | The size type according to the Criteo property **size type**. |
| size_system                   | The size system according to the Criteo property **size system**. Possible values **US**, **UK**, **EU**, **UK**, **DE**, **FR**, **JP**, **CN**, **IT**, **BR**, **MEX** and **AU**. |
| cross_sellers_product_id      | The cross sellers product ID according to the Criteo property **cross sellers product ID**. |
| seller_name                   | The seller name according to the Criteo property **seller name**. |
| seller_id                     | The seller id according to the Criteo property **seller id**. |
| shipping                      | According to the format setting **Shipping costs**. |
| shipping_weight               | The **weight** of the variation. |
| shipping_height               | The **height** of the variation. |
| shipping_width                | The **width** of the variation. |
| shipping_label                | The **label** of the variation. |
| multipack                     | Empty. |
| is_bundle                     | Empty. |
| promotion_id                  | The promotion ID according to the Criteo property **promotion id**. |
| promo_text                    | The promotion text according to the Criteo property **promotion text**. |
| custom_label_0                | The custom label 0 according to the Criteo property **Custom label 0**. |
| custom_label_1                | The custom label 0 according to the Criteo property **Custom label 1**. |
| custom_label_2                | The custom label 0 according to the Criteo property **Custom label 2**. |
| custom_label_3                | The custom label 0 according to the Criteo property **Custom label 3**. |
| custom_label_4                | The custom label 0 according to the Criteo property **Custom label 4**. |
| sale_price_effective_date     | The sale price effective date according to the Criteo property **sale price effective date**. |
| adwords_redirect              | AdWords redirect according to the Criteo property **AdWords Redirect**. |
| excluded_destination          | The excluded destination according to the Criteo property **excluded destination**. |
| expiration_date               | Empty. |
| unit_pricing_measure          | The **unit** of the variation. |
| unit_pricing_base_measure     | The **base unit** of the variation according to **unit_pricing_measure**. |
| display_ads_title             | The display ads title according to the Criteo property **display ads title**. |
| display_ads_value             | The display ads value according to the Criteo property **display ads value**. |
| map_price                     | Empty. |
| map_model                     | Empty. |

_Tab. 2: Export file for **Criteo**_

## 4 License

This project is licensed under the GNU AFFERO GENERAL PUBLIC LICENSE.- find further information in the [LICENSE.md](https://github.com/plentymarkets/plugin-elastic-export-criteo/blob/master/LICENSE.md).
