
# User Guide für das Elastic Export Criteo Plugin

## 1 Bei Criteo registrieren

Criteo ist ein personalisiertes Retargeting-Unternehmen, das mit Internethändlern zusammenarbeitet, um Kunden, die die Website des Werbetreibenden bereits besucht haben, personalisierte Online-Werbeanzeigen zu bieten.
Um das Plugin für Criteo einzurichten, registrieren Sie sich zunächst als Händler.

## 2 Das Datenformat Criteo-Plugin in plentymarkets einrichten

Mit der Installation dieses Plugins erhalten Sie das Exportformat **Criteo-Plugin**, mit dem Sie Daten über den elastischen Export zu Criteo übertragen. Um dieses Format für den elastischen Export nutzen zu können, installieren Sie zunächst das Plugin **Elastic Export** aus dem plentyMarketplace, wenn noch nicht geschehen. 

Sobald beide Plugins im Ihrem System installiert sind, kann das Exportformat **Criteo-Plugin** erstellt werden. Weitere Informationen finden Sie auch auf der Handbuchseite [Daten über dynamischen Export exportieren](https://knowledge.plentymarkets.com/basics/datenaustausch/export-import/daten-exportieren#30).

Neues Exportformat erstellen:

1. Öffnen Sie das Menü **Daten » Elastischer Export**.
2. Klicken Sie auf **Neuer Export**.
3. Nehmen Sie die Einstellungen vor. Beachten Sie dazu die Erläuterungen in Tabelle 1.
4. **Speichern** Sie die Einstellungen.
→ Eine ID für das Exportformat **Criteo-Plugin** wird vergeben und das Exportformat erscheint in der Übersicht **Exporte**.

In der folgenden Tabelle finden Sie Hinweise zu den Einstellungen, Formateinstellungen und empfohlenen Artikelfiltern für das Format **Criteo-Plugin**.

| **Einstellung**                                    | **Erläuterung**| 
| ---                                                | --- |
| **Einstellungen**                                  | |
| **Name**                                           | Name eingeben. Unter diesem Namen erscheint das Exportformat in der Übersicht im Tab **Exporte**. |
| **Typ**                                            | Typ **Artikel** aus dem Dropdown-Menü wählen. |
| **Format**                                         | **Criteo-Plugin** wählen. |
| **Limit**                                          | Zahl eingeben. Wenn mehr als 9999 Datensätze an die Preissuchmaschine übertragen werden sollen, wird die Ausgabedatei wird für 24 Stunden nicht noch einmal neu generiert, um Ressourcen zu sparen. Wenn mehr mehr als 9999 Datensätze benötigt werden, muss die Option **Cache-Datei generieren** aktiv sein. |
| **Cache-Datei generieren**                         | Häkchen setzen, wenn mehr als 9999 Datensätze an die Preissuchmaschine übertragen werden sollen. Um eine optimale Performance des elastischen Exports zu gewährleisten, darf diese Option bei maximal 20 Exportformaten aktiv sein. |
| **Bereitstellung**                                 | **URL** wählen. |
| **Token, URL**                                     | Wenn unter **Bereitstellung** die Option **URL** gewählt wurde, auf **Token generieren** klicken. Der Token wird dann automatisch eingetragen. Die URL wird automatisch eingetragen, wenn unter **Token** der Token generiert wurde. |
| **Dateiname**                                      | Der Dateiname muss auf **.csv** oder **.txt** enden, damit Criteo die Datei erfolgreich importieren kann. |
| **Artikelfilter**                                  | |
| **Artikelfilter hinzufügen**                       | Artikelfilter aus dem Dropdown-Menü wählen und auf **Hinzufügen** klicken. Standardmäßig sind keine Filter voreingestellt. Es ist möglich, alle Artikelfilter aus dem Dropdown-Menü nacheinander hinzuzufügen. **Varianten** = **Alle übertragen** oder **Nur Hauptvarianten übertragen** wählen. **Märkte** = Einen, mehrere oder **ALLE** Märkte wählen. Die Verfügbarkeit muss für alle hier gewählten Märkte am Artikel hinterlegt sein. Andernfalls findet kein Export statt. **Währung** = Währung wählen. **Kategorie** = Aktivieren, damit der Artikel mit Kategorieverknüpfung übertragen wird. Es werden nur Artikel, die dieser Kategorie zugehören, übertragen. **Bild** = Aktivieren, damit der Artikel mit Bild übertragen wird. Es werden nur Artikel mit Bildern übertragen. **Mandant** = Mandant wählen. **Bestand** = Wählen, welche Bestände exportiert werden sollen. **Markierung 1 - 2** = Markierung wählen. **Hersteller** = Einen, mehrere oder **ALLE** Hersteller wählen. **Aktiv** = Nur aktive Varianten werden übertragen. |
| **Formateinstellungen**                            | |
| **Produkt-URL**                                    | Wählen, ob die URL des Artikels oder der Variante an das Preisportal übertragen wird. Varianten URLs können nur in Kombination mit dem Ceres Webshop übertragen werden. |
| **Mandant**                                        | Mandant wählen. Diese Einstellung wird für den URL-Aufbau verwendet. |
| **URL-Parameter**                                  | Suffix für die Produkt-URL eingeben, wenn dies für den Export erforderlich ist. Die Produkt-URL wird dann um die eingegebene Zeichenkette erweitert, wenn weiter oben die Option **übertragen** für die Produkt-URL aktiviert wurde. |
| **Auftragsherkunft**                               | Die Auftragsherkunft wählen, die beim Auftragsimport zugeordnet werden soll. |
| **Marktplatzkonto**                                | Marktplatzkonto aus dem Dropdown-Men wählen. Die Produkt-URL wird um die gewählte Auftragsherkunft erweitert, damit die Verkäufe später analysiert werden können. |
| **Sprache**                                        | Sprache aus dem Dropdown-Menü wählen. |
| **Artikelname**                                    | **Name 1**, **Name 2** oder **Name 3** wählen. Die Namen sind im Tab **Texte** eines Artikels gespeichert. Im Feld **Maximale Zeichenlänge (def. Text)** optional eine Zahl eingeben, wenn die Preissuchmaschine eine Begrenzung der Länge des Artikelnamen beim Export vorgibt. |
| **Vorschautext**                                   | Diese Option ist für dieses Format nicht relevant. |
| **Beschreibung**                                   | Wählen, welcher Text als Beschreibungstext übertragen werden soll.<br /> Im Feld **Maximale Zeichenlänge (def. Text)** optional eine Zahl eingeben, wenn die Preissuchmaschine eine Begrenzung der Länge der Beschreibung beim Export vorgibt.Option **HTML-Tags entfernen** aktivieren, damit die HTML-Tags beim Export entfernt werden. Im Feld **Erlaubte HTML-Tags, kommagetrennt (def. Text)** optional die HTML-Tags eingeben, die beim Export erlaubt sind. Wenn mehrere Tags eingegeben werden, mit Komma trennen. |
| **Zielland**                                       | Zielland aus dem Dropdown-Menü wählen. |
| **Barcode**                                        | ASIN, ISBN oder eine EAN aus dem Dropdown-Menü wählen. Der gewählte Barcode muss mit der oben gewählten Auftragsherkunft verknüpft sein. Andernfalls wird der Barcode nicht exportiert. |
| **Bild**                                           | **Position 0** oder **Erstes Bild** wählen, um dieses Bild zu exportieren. **Position 0** = Ein Bild mit der Position 0 wird übertragen. <br />**Erstes Bild** = Das erste Bild wird übertragen. Position des Energieetikettes eintragen. Alle Bilder die als Energieetikette übertragen werden sollen, müssen diese Position haben. |
| **Bildposition des Energieetiketts**               | Diese Option ist für dieses Format nicht relevant. |
| **Bestandspuffer**                                 | Der Bestandspuffer für Varianten mit Beschränkung auf den Netto-Warenbestand. |
| **Bestand für Varianten ohne Bestandsbeschräkung** | Der Bestand für Varianten ohne Bestandsbeschränkung. |
| **Bestand für Varianten ohne Bestandsführung**     | Der Bestand für Varianten ohne Bestandsführung. |
| **Währung live umrechnen**                         | Aktivieren, damit der Preis je nach eingestelltem Lieferland in die Währung des Lieferlandes umgerechnet wird. Der Preis muss für die entsprechende Währung freigegeben sein. |
| **Verkaufspreis**                                  | Brutto- oder Nettopreis aus der Dropdown-Liste wählen. |
| **Angebotspreis**                                  | Aktivieren, um den Angebotspreis zu übertragen. |
| **UVP**                                            | Diese Option ist für dieses Format nicht relevant. |
| **Versandkosten**                                  | Aktivieren, damit die Versandkosten aus der Konfiguration übernommen werden. Wenn die Option aktiviert ist, stehen in den beiden Dropdown-Menüs Optionen für die Konfiguration und die Zahlungsart zur Verfügung. Option **Pauschale Versandkosten übertragen** aktivieren, damit die pauschalen Versandkosten übertragen werden. Wenn diese Option aktiviert ist, muss im Feld darunter ein Betrag eingegeben werden. |
| **MwSt.-Hinweis**                                  | Diese Option ist für dieses Format nicht relevant. |
| **Artikelverfügbarkeit**                           | Option **überschreiben** aktivieren und in die Felder **1** bis **10**, die die ID der Verfügbarkeit darstellen, Artikelverfügbarkeiten< eintragen. Somit werden die Artikelverfügbarkeiten, die im Menü **System » Artikel » Verfügbarkeit** eingestellt wurden, überschrieben. |

_Tab. 1: Einstellungen für das Datenformat **Criteo-Plugin**_ 

## 3 Verfügbare Spalten der Exportdatei

Öffnen Sie das Menü **Daten » Elastischer Export** und öffnen Sie das Datenformat **Criteo-Plugin**, um die Exportdatei herunterzuladen.

| **Spaltenbezeichnung**    | **Erläuterung** |
| ---                       | --- |
| id                        | Die **SKU** der Variante. |
| title                     | Entsprechend der Formateinstellung **Artikelname**. |
| description               | Entsprechend der Formateinstellung **Beschreibung**. |
| google_product_category   | Entsprechend der Einstellung **Einstellungen** » **Märkte** » **Google** » **Google Shopping Int.** die Google Shopping Kategorie der Standardkategorie. |
| link                      | Der **URL-Pfad** des Artikels abhängig vom gewählten **Mandanten** in den Formateinstellungen. |
| image_link                | **URL des Bildes**. Variantenbiler werden vor Artikelbildern priorisiert. |
| additional_image_link     | Zusätzliche mit Komma getrennte URLs für bis zu 10 zusätzliche Bilder. Variantenbiler werden vor Artikelbildern priorisiert. |
| availability              | Der **Name der Artikelverfügbarkeit** unter **Einstellungen** » **Artikel** » **Artikelverfügbarkeit** oder die Übersetzung gemäß der Formateinstellung **Artikelverfügbarkeit überschreiben**. |
| price                     | Der **Verkaufspreis**. |
| sale_price                | Der **Angebotspreis** abhängig der Formatseinstellung **Angebotspreis**. |
| gtin                      | Entsprechend der Formateinstellung **Barcode**. |
| mpn                       | Das **Model** der Vartiante. |
| brand                     | Der **Name des Herstellers** des Artikels. Der **Externe Name** unter **Einstellungen** » **Artikel** » **Hersteller** wird bevorzugt, wenn vorhanden. |
| adult                     | Das Criteo-Merkmal **Volljährig**. Mögliche Werte: **yes** und **no**. |
| product_type              | **Name der Standardkategorie**, die mit der Variante verknüpft ist. |
| product_type_key          | Leer. |
| number_of_ratings         | Leer. |
| product_rating            | Leer. |
| filters                   | Leer. |
| mobile_link               | Das Criteo-Merkmal **Mobillink**. |
| condition                 | Der **Zustand des Artikels**. Mögliche Werte **new**, **refurbished** and **used**. |
| item_group_id             | Die **Artikel-ID** der Variante. |
| color                     | Die **Farbe** für die Vartiante anhand des Attibuts oder eines Merkmals. Merkmale werden bevorzugt behandelt. |
| gender                    | Das **Geschlecht** in Bezug auf das Criteo-Merkmal **Geschlecht**. Mögliche Werte **female**, **male** and **unisex**. |
| age_group                 | Das Criteo-Merkmal **Altersgruppe**. Mögliche Werte **newborn**, **infant**, **toddler**, **kids** and **adult**. |
| material                  | Das **Material** der Vartiante anhand des Attibuts oder eines Merkmals. Merkmale werden bevorzugt behandelt. |
| pattern                   | Das **Muster** der Vartiante anhand eines Attibuts oder eines Merkmals. Merkmale werden bevorzugt behandelt. |
| size                      | Die **Größe** der Vartiante anhand eines Attibuts oder eines Merkmals. Merkmale werden bevorzugt behandelt. |
| size_type                 | Das Criteo-Merkmal **Größentyp**. Mögliche Werte **regular**, **petite**, **used**, **big** and **tall** and **maternity**. |
| size_system               | Das Criteo-Merkmal **Größensystem**. Mögliche Werte **US**, **UK**, **EU**, **UK**, **DE**, **FR**, **JP**, **CN**, **IT**, **BR**, **MEX** and **AU**. |
| cross_sellers_product_id  | Das Criteo-Merkmal **Cross-Selling-ID**. |
| seller_name               | Das Criteo-Merkmal **Verkäufername**. |
| seller_id                 | Das Criteo-Merkmal **Verkäufer-ID**. |
| shipping                  | Entsprechend der Formateinstellung **Versandkosten**. |
| shipping_weight           | **Gewicht** der Variante. |
| shipping_height           | **Höhe** der Variante. |
| shipping_width            | **Breite** der Variante. |
| shipping_label            | **Länge** der Variante. |
| multipack                 | Leer. |
| is_bundle                 | Leer. |
| promotion_id              | Das Criteo-Merkmal **Aktions-ID**. |
| promo_text                | Das Criteo-Merkmal **Aktionstext**. |
| custom_label_0            | Das Criteo-Merkmal **Benutzerdefiniertes Label 0**. |
| custom_label_1            | Das Criteo-Merkmal **Benutzerdefiniertes Label 1**. |
| custom_label_2            | Das Criteo-Merkmal **Benutzerdefiniertes Label 2**. |
| custom_label_3            | Das Criteo-Merkmal **Benutzerdefiniertes Label 3**. |
| custom_label_4            | Das Criteo-Merkmal **Benutzerdefiniertes Label 4**. |
| sale_price_effective_date | Das Criteo-Merkmal **Sonderangebotszeitraum**. |
| adwords_redirect          | Das Criteo-Merkmal **AdWords Redirect**. |
| excluded_destination      | Das Criteo-Merkmal **Ausgeschlossenes Ziel**. |
| expiration_date           | Leer. |
| unit_pricing_measure      | Die **Einheit** der Variante. |
| unit_pricing_base_measure | Die **Grundeinheit** der Variante in Bezug auf **unit_pricing_measure**. |
| display_ads_title         | Die **Anzeigentitel** der Variante in Bezug auf **Anzeigentitel anzeigen**. |
| display_ads_value         | Die **Anzeigewert** der Variante in Bezug auf **Anzeigewert anzeigen**. |
| map_price                 | Leer. |
| map_model                 | Leer. |

_Tab. 2: Spalten der Exportdatei für **Criteo**_

Zusätzliche Informationen zu den einzelnen Spalten sind direkt bei [Criteo](https://support.criteo.com/hc/en-us/articles/207571095-Criteo-Product-Feed-specification) erläutert (nur auf Englisch verfügbar).

## 4 Lizenz

Das gesamte Projekt unterliegt der GNU AFFERO GENERAL PUBLIC LICENSE – weitere Informationen finden Sie in der [LICENSE.md](https://github.com/plentymarkets/plugin-elastic-export-criteo/blob/master/LICENSE.md).
