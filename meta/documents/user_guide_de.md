
# User Guide für das Elastic Export Criteo Plugin

<div class="container-toc"></div>

## 1 Bei Criteo registrieren

Criteo ist ein personalisiertes Retargeting-Unternehmen, das mit Internethändlern zusammenarbeitet, um Kunden, die die Website des Werbetreibenden bereits besucht haben, personalisierte Online-Werbeanzeigen zu bieten.
Um das Plugin für Criteo einzurichten, registrieren Sie sich zunächst als Händler.

## 2 Elastic Export Criteo-Plugin in plentymarkets einrichten

Um dieses Format nutzen zu können, benötigen Sie das Plugin Elastic Export.

Auf der Handbuchseite [Daten exportieren](https://knowledge.plentymarkets.com/basics/datenaustausch/daten-exportieren#30) werden die einzelnen Formateinstellungen beschrieben.

In der folgenden Tabelle finden Sie Hinweise zu den Einstellungen, Formateinstellungen und empfohlenen Artikelfiltern für das Format **Criteo-Plugin**.
<table>
    <tr>
        <th>
            Einstellung
        </th>
        <th>
            Erläuterung
        </th>
    </tr>
    <tr>
        <td class="th" colspan="2">
            Einstellungen
        </td>
    </tr>
    <tr>
        <td>
            Format
        </td>
        <td>
            <b>Criteo-Plugin</b> wählen.
        </td>        
    </tr>
    <tr>
        <td>
            Bereitstellung
        </td>
        <td>
            <b>URL</b> wählen.
        </td>        
    </tr>
    <tr>
        <td>
            Dateiname
        </td>
        <td>
            Der Dateiname muss auf <b>.csv</b> oder <b>.txt</b> enden, damit Criteo die Datei erfolgreich importieren kann.
        </td>        
    </tr>
    <tr>
        <td class="th" colspan="2">
            Artikelfilter
        </td>
    </tr>
    <tr>
        <td>
            Aktiv
        </td>
        <td>
            <b>Aktiv</b> wählen.
        </td>        
    </tr>
    <tr>
        <td>
            Märkte
        </td>
        <td>
            Eine oder mehrere Auftragsherkünfte wählen. Die gewählten Auftragsherkünfte müssen an der Variante aktiviert sein, damit der Artikel exportiert wird.
        </td>        
    </tr>
    <tr>
        <td class="th" colspan="2">
            Formateinstellungen
        </td>
    </tr>
    <tr>
        <td>
            Auftragsherkunft
        </td>
        <td>
            Die Auftragsherkunft wählen, die beim Auftragsimport zugeordnet werden soll.
        </td>        
    </tr>
    <tr>
		<td>
			Vorschautext
		</td>
		<td>
			Diese Option ist für dieses Format nicht relevant.
		</td>        
	</tr>
    <tr>
        <td>
            UVP
        </td>
        <td>
            Diese Option ist für dieses Format nicht relevant.
        </td>        
    </tr>
    <tr>
        <td>
            MwSt.-Hinweis
        </td>
        <td>
            Diese Option ist für dieses Format nicht relevant.
        </td>        
    </tr>
</table>


## 3 Übersicht der verfügbaren Spalten

<table>
    <tr>
        <th>
            Spaltenbezeichnung
        </th>
        <th>
            Erläuterung
        </th>
    </tr>
    <tr>
		<td>
			id
		</td>
		<td>
			Die <b>SKU</b> für Criteo der Variante.
		</td>        
	</tr>
	<tr>
		<td>
			title
		</td>
		<td>
			Entsprechend der Formateinstellung <b>Artikelname</b>.
		</td>        
	</tr>
	<tr>
		<td>
			description
		</td>
		<td>
			Entsprechend der Formateinstellung <b>Beschreibung</b>.
		</td>        
	</tr>
	<tr>
		<td>
			google_product_category
		</td>
		<td>
			Entsprechend der Einstellung <b>Einstellungen » Märkte » Google » Google Shopping Int.</b> die Google Shopping Kategorie der Standardkategorie.
		</td>        
	</tr>
	<tr>
        <td>
            link
        </td>
        <td>
            Der <b>URL-Pfad</b> des Artikels abhängig vom gewählten <b>Mandanten</b> in den Formateinstellungen.
        </td>        
    </tr>
    <tr>
        <td>
            image_link
        </td>
        <td>
            URL des Bildes. Variantenbiler werden vor Artikelbildern priorisiert.
        </td>        
    </tr>
    <tr>
        <td>
            additional_image_link
        </td>
        <td>
            Zusätzliche kommagetrennte URLs für bis zu 10 zusätzliche Bilder. Variantenbiler werden vor Artikelbildern priorisiert.
        </td>        
    </tr>
    <tr>
        <td>
            availability
        </td>
        <td>
            Der <b>Name der Artikelverfügbarkeit</b> unter <b>Einstellungen » Artikel » Artikelverfügbarkeit</b> oder die Übersetzung gemäß der Formateinstellung <b>Artikelverfügbarkeit überschreiben</b>.
        </td>        
    </tr>
    <tr>
        <td>
            price
        </td>
        <td>
            Der <b>Verkaufspreis</b>.
        </td>        
    </tr>
    <tr>
        <td>
            sale_price
        </td>
        <td>
            Der <b>Angebotspreis</b> abhängig der Formatseinstellung **Angebotspreis**.
        </td>        
    </tr>
    <tr>
        <td>
            gtin
        </td>
        <td>
            Entsprechend der Formateinstellung <b>Barcode</b>.
        </td>        
    </tr>
    <tr>
        <td>
            mpn
        </td>
        <td>
            Das <b>Model</b> der Vartiante.
        </td>        
    </tr>
    <tr>
        <td>
            brand
        </td>
        <td>
            Der <b>Name des Herstellers</b> des Artikels. Der <b>Externe Name</b> unter <b>Einstellungen » Artikel » Hersteller</b> wird bevorzugt, wenn vorhanden.
        </td>        
    </tr>
    <tr>
        <td>
            adult
        </td>
        <td>
            Das Erwachsenenstatus in Bezug auf das Criteo-Merkmal **Erwachsene**.
        </td>        
    </tr>
	<tr>
		<td>
			product_type
		</td>
		<td>
			Name der Standardkategorie, die mit der Variante verknüpft ist.
		</td>        
	</tr>
    <tr>
        <td>
            product_type_key
        </td>
        <td>
            Leer.
        </td>        
    </tr>
    <tr>
        <td>
            number_of_ratings
        </td>
        <td>
            Leer.
        </td>        
    </tr>
    <tr>
        <td>
            product_rating
        </td>
        <td>
            Leer.
        </td>        
    </tr>
    <tr>
        <td>
            filters
        </td>
        <td>
            Leer.
        </td>        
    </tr>
    <tr>
        <td>
            mobile_link
        </td>
        <td>
            Mobiler Link in Bezug auf das Criteo-Merkmal **Mobiler-Link**.
        </td>        
    </tr>
	<tr>
		<td>
			condition
		</td>
		<td>
			Der Zustand des Artikels. Anhand <b>Artikel » Artikel bearbeiten » Global » Grundeinstellungen » Zustand API</b>
		</td>        
	</tr>
    <tr>
        <td>
            item_group_id
        </td>
        <td>
            Die <b>Artikel-ID</b> der Variante.
        </td>        
    </tr>
	<tr>
		<td>
			color
		</td>
		<td>
			Die <b>Farbe</b> für die Vartiante anhand des Attibuts oder eines Merkmals. Merkmale werden bevorzugt behandelt.
		</td>        
	</tr>
    <tr>
        <td>
            gender
        </td>
        <td>
            Das Geschlecht in Bezug auf das Criteo-Merkmal **Geschlecht**.
        </td>        
    </tr>
    <tr>
        <td>
            age_group
        </td>
        <td>
            Die Altersgruppe in Bezug auf das Criteo-Merkmal **Altersgruppe**.
        </td>        
    </tr>
    <tr>
        <td>
            material
        </td>
        <td>
            Das <b>Material</b> für die Vartiante anhand des Attibuts oder eines Merkmals. Merkmale werden bevorzugt behandelt.
        </td>        
    </tr>
    <tr>
        <td>
            pattern
        </td>
        <td>
            Das <b>Muster</b> für die Vartiante anhand des Attibuts oder eines Merkmals. Merkmale werden bevorzugt behandelt.
        </td>        
    </tr>
	<tr>
		<td>
			size
		</td>
		<td>
			Die <b>Größe</b> für die Vartiante anhand des Attibuts oder eines Merkmals. Merkmale werden bevorzugt behandelt.
		</td>        
	</tr>
    <tr>
        <td>
            size_type
        </td>
        <td>
            Das Größensystem in Bezug auf das Criteo-Merkmal **Größensystem**.
        </td>        
    </tr>
    <tr>
        <td>
            size_system
        </td>
        <td>
            Das Größensystem in Bezug auf das Criteo-Merkmal **Größensystem**.
        </td>        
    </tr>
    <tr>
        <td>
            cross_sellers_product_id
        </td>
        <td>
            Das Cross Verkäufer in Bezug auf das Criteo-Merkmal **Cross Verkäufer**.
        </td>        
    </tr>
    <tr>
        <td>
            seller_name
        </td>
        <td>
            Das Verkäufer-Name in Bezug auf das Criteo-Merkmal **Verkäufer-Name**.
        </td>        
    </tr>
    <tr>
        <td>
            seller_id
        </td>
        <td>
            Das Verkäufer-Id in Bezug auf das Criteo-Merkmal **Verkäufer-Id**.
        </td>        
    </tr>
	<tr>
		<td>
			shipping
		</td>
		<td>
			Entsprechend der Formateinstellung <b>Versandkosten</b>.
		</td>        
	</tr>
	<tr>
		<td>
			shipping_weight
		</td>
		<td>
			Das Versandgewicht der Variante.
		</td>        
	</tr>
    <tr>
        <td>
            shipping_height
        </td>
        <td>
            Das Versandhöhe der Variante.
        </td>        
    </tr>
    <tr>
        <td>
            shipping_width
        </td>
        <td>
            Das Versandbreite der Variante.
        </td>        
    </tr>
    <tr>
        <td>
            shipping_length
        </td>
        <td>
            Das Versandlänge der Variante.
        </td>        
    </tr>
    <tr>
        <td>
            shipping_label
        </td>
        <td>
            Das Versandaufkleber der Variante.
        </td>        
    </tr>
    <tr>
        <td>
            multipack
        </td>
        <td>
            Leer.
        </td>        
    </tr>
    <tr>
        <td>
            is_bundle
        </td>
        <td>
            Leer.
        </td>        
    </tr>
    <tr>
        <td>
            promotion_id
        </td>
        <td>
            Die Aktions-ID in Bezug auf das Criteo-Merkmal **Aktions-ID**.
        </td>        
    </tr>
    <tr>
        <td>
            promo_text
        </td>
        <td>
            Die Aktions-Text in Bezug auf das Criteo-Merkmal **Aktions-Text**.
        </td>        
    </tr>
    <tr>
        <td>
            custom_label_0
        </td>
        <td>
            Das Benutzerdefinierte Label 0 in Bezug auf das Criteo-Merkmal **Benutzerdefiniertes Label 0**.
        </td>        
    </tr>
    <tr>
        <td>
            custom_label_1
        </td>
        <td>
            Das Benutzerdefinierte Label 1 in Bezug auf das Criteo-Merkmal **Benutzerdefiniertes Label 1**.
        </td>        
    </tr>
    <tr>
        <td>
            custom_label_2
        </td>
        <td>
            Das Benutzerdefinierte Label 2 in Bezug auf das Criteo-Merkmal **Benutzerdefiniertes Label 2**.
        </td>        
    </tr>
    <tr>
        <td>
            custom_label_3
        </td>
        <td>
            Das Benutzerdefinierte Label 3 in Bezug auf das Criteo-Merkmal **Benutzerdefiniertes Label 3**.
        </td>        
    </tr>
    <tr>
        <td>
            custom_label_4
        </td>
        <td>
            Das Benutzerdefinierte Label 4 in Bezug auf das Criteo-Merkmal **Benutzerdefiniertes Label 4**.
        </td>        
    </tr>
    <tr>
        <td>
            sale_price_effective_date
        </td>
        <td>
            Der Sonderangebotszeitraum in Bezug auf das Criteo-Merkmal **Sonderangebotszeitraum**.
        </td>        
    </tr>
    <tr>
        <td>
            adwords_redirect
        </td>
        <td>
            AdWords Redirect in Bezug auf das Criteo-Merkmal **AdWords Redirect**.
        </td>        
    </tr>
	<tr>
		<td>
			excluded_destination
		</td>
		<td>
            Ausgeschlossenes Ziel in Bezug auf das Criteo-Merkmal **Ausgeschlossenes Ziel**.
        </td>        
	</tr>
    <tr>
        <td>
            expiration_​date
        </td>
        <td>
            Das Haltbarkeitsdatum der Variante.
        </td>        
    </tr>
	<tr>
		<td>
			unit_pricing_measure
		</td>
		<td>
			<b>Inhalt:</b> Die <b>Einheit</b> der Variante.
		</td>        
	</tr>
	<tr>
		<td>
			unit_pricing_base_measure
		</td>
		<td>
			Die <b>Grundeinheit</b> der Variante in Bezug auf **unit_pricing_measure**.
		</td>        
	</tr>
	<tr>
		<td>
			energy_efficiency_class
		</td>
		<td>
			Die Energieefizienzklasse in Bezug auf das Criteo-Merkmal **Energieefizienzklasse**.
		</td>        
	</tr>
    <tr>
        <td>
            display_ads_title
        </td>
        <td>
            Die <b>Anzeigentitel</b> der Variante in Bezug auf **Anzeigentitel anzeigen**.
        </td>        
    </tr>
    <tr>
        <td>
            display_ads_value
        </td>
        <td>
            Die <b>Anzeigewert</b> der Variante in Bezug auf **Anzeigewert anzeigen**.
        </td>        
    </tr>
    <tr>
        <td>
            map_price
        </td>
        <td>
            Leer.
        </td>        
    </tr>
    <tr>
        <td>
            map_model
        </td>
        <td>
            Leer.
        </td>        
    </tr>
</table>

## 4 Lizenz

Das gesamte Projekt unterliegt der GNU AFFERO GENERAL PUBLIC LICENSE – weitere Informationen finden Sie in der [LICENSE.md](https://github.com/plentymarkets/plugin-elastic-export-criteo/blob/master/LICENSE.md).
