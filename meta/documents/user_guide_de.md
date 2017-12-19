
# User Guide für das Elastic Export Criteo Plugin

## 1 Bei Criteo registrieren

Criteo ist ein personalisiertes Retargeting-Unternehmen, das mit Internethändlern zusammenarbeitet, um Kunden, die die Website des Werbetreibenden bereits besucht haben, personalisierte Online-Werbeanzeigen zu bieten.
Um das Plugin für Criteo einzurichten, registrieren Sie sich zunächst als Händler.

## 2 Elastic Export Criteo-Plugin in plentymarkets einrichten

Um dieses Format nutzen zu können, benötigen Sie das Plugin Elastic Export.

Auf der Handbuchseite [Daten exportieren](https://knowledge.plentymarkets.com/basics/datenaustausch/daten-exportieren#30) werden die einzelnen Formateinstellungen beschrieben.

Neues Exportformat erstellen:
1. Öffnen Sie das Menü **Daten** » **Elastischer Export**.
2. Klicken Sie auf **Neuer Export**.
3. Nehmen Sie die Einstellungen vor. Beachten Sie dazu die Erläuterungen in Tabelle 1.
4. **Speichern** Sie die Einstellungen.
→ Eine ID für das Exportformat **Criteo-Plugin** wird vergeben und das Exportformat erscheint in der Übersicht **Exporte**.

In der folgenden Tabelle finden Sie Hinweise zu den Einstellungen, Formateinstellungen und empfohlenen Artikelfiltern für das Format **Criteo-Plugin**.

| Einstellung                   | Erläuterung |
| ---                           | --- |
| Einstellungen                 |     |
| Format                        | **Criteo-Plugin** wählen. |
| Bereitstellung                | **URL** wählen. |
| Dateiname                     | Der Dateiname muss auf **.csv** oder **.txt** enden, damit Criteo die Datei erfolgreich importieren kann. |
| Artikelfilter                 |     |
| Aktiv                         | **Aktiv** wählen. |
| Märkte                        | Eine oder mehrere Auftragsherkünfte wählen. Die gewählten Auftragsherkünfte müssen an der Variante aktiviert sein, damit der Artikel exportiert wird. |
| Formateinstellungen           |     |
| Auftragsherkunft              | Die Auftragsherkunft wählen, die beim Auftragsimport zugeordnet werden soll. |
| Vorschautext                  | Diese Option ist für dieses Format nicht relevant. |
| UVP                           | Diese Option ist für dieses Format nicht relevant. |
| MwSt.-Hinweis                 | Diese Option ist für dieses Format nicht relevant. |

_Tab. 1: Einstellungen für das Datenformat **Criteo-Plugin**_ 

## 3 Übersicht der verfügbaren Spalten

Zusätzliche Informationen zu den einzelnen Spalten sind direkt bei [Criteo](https://support.criteo.com/hc/en-us/articles/207571095-Criteo-Product-Feed-specification) erläutert (nur auf Englisch verfügbar). 

| Spaltenbezeichnung            | Erläuterung |
| ---                           | --- |
| id                            | Die **SKU** der Variante. |
| title                         | Entsprechend der Formateinstellung **Artikelname**. |
| description                   | Entsprechend der Formateinstellung **Beschreibung**. |
| google_product_category       | Entsprechend der Einstellung **Einstellungen** » **Märkte** » **Google** » **Google Shopping Int.** die Google Shopping Kategorie der Standardkategorie. |
| link                          | Der **URL-Pfad** des Artikels abhängig vom gewählten **Mandanten** in den Formateinstellungen. |
| image_link                    | URL des Bildes. Variantenbiler werden vor Artikelbildern priorisiert. |
| additional_image_link         | Zusätzliche kommagetrennte URLs für bis zu 10 zusätzliche Bilder. Variantenbiler werden vor Artikelbildern priorisiert. |
| availability                  | Der **Name der Artikelverfügbarkeit** unter **Einstellungen** » **Artikel** » **Artikelverfügbarkeit** oder die Übersetzung gemäß der Formateinstellung **Artikelverfügbarkeit überschreiben**. |
| price                         | Der **Verkaufspreis**. |
| sale_price                    | Der **Angebotspreis** abhängig der Formatseinstellung **Angebotspreis**. |
| gtin                          | Entsprechend der Formateinstellung **Barcode**. |
| mpn                           | Das **Model** der Vartiante. |
| brand                         | Der **Name des Herstellers** des Artikels. Der **Externe Name** unter **Einstellungen** » **Artikel** » **Hersteller** wird bevorzugt, wenn vorhanden. |
| adult                         | Das Criteo-Merkmal **Volljährig**. Mögliche Werte: **yes** und **no**. |
| product_type                  | **Name der Standardkategorie**, die mit der Variante verknüpft ist. |
| product_type_key              | Leer. |
| number_of_ratings             | Leer. |
| product_rating                | Leer. |
| filters                       | Leer. |
| mobile_link                   | Das Criteo-Merkmal **Mobillink**. |
| condition                     | Der **Zustand des Artikels**. Mögliche Werte **new**, **refurbished** and **used**. |
| item_group_id                 | Die **Artikel-ID** der Variante. |
| color                         | Die **Farbe** für die Vartiante anhand des Attibuts oder eines Merkmals. Merkmale werden bevorzugt behandelt. |
| gender                        | Das **Geschlecht** in Bezug auf das Criteo-Merkmal **Geschlecht**. Mögliche Werte **female**, **male** and **unisex**. |
| age_group                     | Das Criteo-Merkmal **Altersgruppe**. Mögliche Werte **newborn**, **infant**, **toddler**, **kids** and **adult**. |
| material                      | Das **Material** der Vartiante anhand des Attibuts oder eines Merkmals. Merkmale werden bevorzugt behandelt. |
| pattern                       | Das **Muster** der Vartiante anhand eines Attibuts oder eines Merkmals. Merkmale werden bevorzugt behandelt. |
| size                          | Die **Größe** der Vartiante anhand eines Attibuts oder eines Merkmals. Merkmale werden bevorzugt behandelt. |
| size_type                     | Das Criteo-Merkmal **Größentyp**. Mögliche Werte **regular**, **petite**, **used**, **big** and **tall** and **maternity**. |
| size_system                   | Das Criteo-Merkmal **Größensystem**. Mögliche Werte **US**, **UK**, **EU**, **UK**, **DE**, **FR**, **JP**, **CN**, **IT**, **BR**, **MEX** and **AU**. |
| cross_sellers_product_id      | Das Criteo-Merkmal **Cross-Selling-ID**. |
| seller_name                   | Das Criteo-Merkmal **Verkäufername**. |
| seller_id                     | Das Criteo-Merkmal **Verkäufer-ID**. |
| shipping                      | Entsprechend der Formateinstellung **Versandkosten**. |
| shipping_weight               | **Gewicht** der Variante. |
| shipping_height               | **Höhe** der Variante. |
| shipping_width                | **Breite** der Variante. |
| shipping_label                | **Länge** der Variante. |
| multipack                     | Leer. |
| is_bundle                     | Leer. |
| promotion_id                  | Das Criteo-Merkmal **Aktions-ID**. |
| promo_text                    | Das Criteo-Merkmal **Aktionstext**. |
| custom_label_0                | Das Criteo-Merkmal **Benutzerdefiniertes Label 0**. |
| custom_label_1                | Das Criteo-Merkmal **Benutzerdefiniertes Label 1**. |
| custom_label_2                | Das Criteo-Merkmal **Benutzerdefiniertes Label 2**. |
| custom_label_3                | Das Criteo-Merkmal **Benutzerdefiniertes Label 3**. |
| custom_label_4                | Das Criteo-Merkmal **Benutzerdefiniertes Label 4**. |
| sale_price_effective_date     | Das Criteo-Merkmal **Sonderangebotszeitraum**. |
| adwords_redirect              | Das Criteo-Merkmal **AdWords Redirect**. |
| excluded_destination          | Das Criteo-Merkmal **Ausgeschlossenes Ziel**. |
| expiration_date               | Das **Haltbarkeitsdatum** der Variante. |
| unit_pricing_measure          | Die **Einheit** der Variante. |
| unit_pricing_base_measure     | Die **Grundeinheit** der Variante in Bezug auf **unit_pricing_measure**. |
| display_ads_title             | Die **Anzeigentitel** der Variante in Bezug auf **Anzeigentitel anzeigen**. |
| display_ads_value             | Die **Anzeigewert** der Variante in Bezug auf **Anzeigewert anzeigen**. |
| map_price                     | Leer. |
| map_model                     | Leer. |

_Tab. 2: Spalten der Exportdatei für **Criteo**_

## 4 Lizenz

Das gesamte Projekt unterliegt der GNU AFFERO GENERAL PUBLIC LICENSE – weitere Informationen finden Sie in der [LICENSE.md](https://github.com/plentymarkets/plugin-elastic-export-criteo/blob/master/LICENSE.md).
