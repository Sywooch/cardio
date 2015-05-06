<?php

use yii\db\Schema;
use yii\db\Migration;

class m150308_125324_create_prehistory_item_table extends Migration
{
    private $table = "{{prehistory_item}}";

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable($this->table, [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
        ], $tableOptions);

        // Insert prehistory items data extracted from csv
        $this->batchInsert($this->table, ['name'], [
                [
                    "Voorgeschiedenis item"
                ],
                [
                    "(peri)lunaire luxatie"
                ],
                [
                    "1-vaats coronairlijden: LAD"
                ],
                [
                    "1-vaats coronairlijden: RCA"
                ],
                [
                    "1-vaats coronairlijden: RCX"
                ],
                [
                    "1-vaats coronairlijden: diagonale tak"
                ],
                [
                    "1e graads AV-blok"
                ],
                [
                    "2-vaatslijden: LAD en RCA"
                ],
                [
                    "2-vaatslijden: LAD en RCX"
                ],
                [
                    "2-vaatslijden: RCA en RCX"
                ],
                [
                    "2e graads AV-blok"
                ],
                [
                    "2e graads AV-blok type Mobitz II"
                ],
                [
                    "2e graads AV-blok type Wenckebach (Mobitz I)"
                ],
                [
                    "3-vaats coronairlijden"
                ],
                [
                    "3e graads AV-blok (totaal AV-blok)"
                ],
                [
                    "ACTH-deficiлntie"
                ],
                [
                    "AV reлntry tachycardie"
                ],
                [
                    "AV-nodaal ritme"
                ],
                [
                    "AV-nodale cirkeltachycardie"
                ],
                [
                    "AV-nodale reлntry tachycardie"
                ],
                [
                    "Aanpassingsstoornis"
                ],
                [
                    "Aanvalsgewijze klachten"
                ],
                [
                    "Abces"
                ],
                [
                    "Abces drainage keel."
                ],
                [
                    "Abcesdrainage"
                ],
                [
                    "Abdominale sterilisatie"
                ],
                [
                    "Abdominale totaaloperatie"
                ],
                [
                    "Abdominale uterusextirpatie"
                ],
                [
                    "Abdominoplastiek"
                ],
                [
                    "Abducensparese"
                ],
                [
                    "Aberrante aanleg RCA"
                ],
                [
                    "Aberrante aanleg linker coronairsysteem"
                ],
                [
                    "Ablatie ivm. AV-nodale tachycardie"
                ],
                [
                    "Ablatie ivm. WPW syndroom"
                ],
                [
                    "Ablatie ivm. atriale tachycardie"
                ],
                [
                    "Ablatie ivm. atriumfibrilleren"
                ],
                [
                    "Ablatie ivm. boezemflutter"
                ],
                [
                    "Ablatie ivm. ventriculaire tachycardie"
                ],
                [
                    "Ablatie van de AV-knoop"
                ],
                [
                    "Ablatio"
                ],
                [
                    "Ablatio mamma"
                ],
                [
                    "Abnormale inmonding van de longvenen"
                ],
                [
                    "Abnormale moeheid ECI"
                ],
                [
                    "Abortus"
                ],
                [
                    "Abortus provocatus"
                ],
                [
                    "Acanthosis nigricans"
                ],
                [
                    "Accessoire tepel"
                ],
                [
                    "Accidentele intoxicatie"
                ],
                [
                    "Acetabulumfractuur"
                ],
                [
                    "Achalasie v.d. cardia"
                ],
                [
                    "Achillespeesoperatie"
                ],
                [
                    "Achterstrengstoornis"
                ],
                [
                    "Achterwandplastiek"
                ],
                [
                    "Acne"
                ],
                [
                    "Acromegalie"
                ],
                [
                    "Acromio-claviculaire luxatie"
                ],
                [
                    "Acromionfractuur"
                ],
                [
                    "Actinische keratose"
                ],
                [
                    "Acusticus neurinoom verwijdering"
                ],
                [
                    "Acute alcoholische pancreatitis"
                ],
                [
                    "Acute biliaire pancreatitis"
                ],
                [
                    "Acute cholecystitis"
                ],
                [
                    "Acute cocaпne-intoxicatie"
                ],
                [
                    "Acute constipatie"
                ],
                [
                    "Acute erosieve gastritis"
                ],
                [
                    "Acute hepatitis B"
                ],
                [
                    "Acute intermitterende porfyrie"
                ],
                [
                    "Acute lymfadenitis"
                ],
                [
                    "Acute lymfatische leukemie"
                ],
                [
                    "Acute myeloide leukemie"
                ],
                [
                    "Acute nefritis nno"
                ],
                [
                    "Acute nierinsufficiлntie nno"
                ],
                [
                    "Acute nierinsufficiлntie o.b.v. acute tubulusnecro"
                ],
                [
                    "Acute nierinsufficiлntie t.g.v. rцntgencontrast"
                ],
                [
                    "Acute ongedifferentieerde leukemie"
                ],
                [
                    "Acute opiaatintoxicatie"
                ],
                [
                    "Acute pancreatitis"
                ],
                [
                    "Acute pancreatitis tgv medicament"
                ],
                [
                    "Acute peritonitis"
                ],
                [
                    "Acute pyelonefritis"
                ],
                [
                    "Acute rejectie niertransplantaat"
                ],
                [
                    "Acute thyreoпditis"
                ],
                [
                    "Acute tubulointerstitiлle nefritis"
                ],
                [
                    "Acuut myocardinfarct"
                ],
                [
                    "Acuut rheuma"
                ],
                [
                    "Addison-crisis"
                ],
                [
                    "Adenocarcinoom"
                ],
                [
                    "Adenocarcinoom van de oesofagus"
                ],
                [
                    "Adenovilleuze papiltumor"
                ],
                [
                    "Adhesiolysis"
                ],
                [
                    "Adipositas"
                ],
                [
                    "Adipositas graad 2"
                ],
                [
                    "Adipositas graad 3"
                ],
                [
                    "Adnexextirpatie"
                ],
                [
                    "Adnexgezwel"
                ],
                [
                    "Adnexitis"
                ],
                [
                    "Adrenalectomie"
                ],
                [
                    "Adult onset Still's disease"
                ],
                [
                    "Aerofagie"
                ],
                [
                    "Afakie"
                ],
                [
                    "Afferent-loop syndrome"
                ],
                [
                    "Afwijking thorax"
                ],
                [
                    "Afwijkingen in kleine coronairtakken"
                ],
                [
                    "Agenesie nier"
                ],
                [
                    "Agenesie/hypoplasie nier"
                ],
                [
                    "Alcoholabusus"
                ],
                [
                    "Alcoholintoxicatie"
                ],
                [
                    "Alcoholische hepatitis"
                ],
                [
                    "Alcoholische levercirrhose"
                ],
                [
                    "Alcoholische leverfunctiestoornis"
                ],
                [
                    "Alcoholische leverinsufficiлntie"
                ],
                [
                    "Alcoholische polyneuropathie"
                ],
                [
                    "Alcoholische steatohepatitis"
                ],
                [
                    "Alcoholverslaving"
                ],
                [
                    "Alfa-1-antitrypsinedeficiлntie"
                ],
                [
                    "Alfa-2-antiplasminedeficiлntie"
                ],
                [
                    "Allergie"
                ],
                [
                    "Allergische bronchopulmonale aspergillose (ABPA)"
                ],
                [
                    "Alopecia"
                ],
                [
                    "Alopecia totalis"
                ],
                [
                    "Alveolitis"
                ],
                [
                    "Alzheimerdementie"
                ],
                [
                    "Amblyopie"
                ],
                [
                    "Amelogenesis imperfecta"
                ],
                [
                    "Amfetaminenmisbruik"
                ],
                [
                    "Amoebendysenterie"
                ],
                [
                    "Amoebenenteritis"
                ],
                [
                    "Amputatie"
                ],
                [
                    "Amyloidose en paraproteinaemie zonder multiple mye"
                ],
                [
                    "Amyloпdose"
                ],
                [
                    "Amyotrofe laterale sclerose (ALS)"
                ],
                [
                    "Anafylactische shock"
                ],
                [
                    "Analgetica-abusus"
                ],
                [
                    "Analgeticageпnduceerde hoofdpijn"
                ],
                [
                    "Anaplastisch schildkliercarcinoom"
                ],
                [
                    "Andere psychostimulantia"
                ],
                [
                    "Androgeenresistentiesyndroom"
                ],
                [
                    "Anemie door acuut bloedverlies"
                ],
                [
                    "Anemie door chronische ziekte"
                ],
                [
                    "Anemie nno"
                ],
                [
                    "Anemie tgv alcohol"
                ],
                [
                    "Anemie tgv chronische loodintoxicatie"
                ],
                [
                    "Anemie tgv endocriene ziekten"
                ],
                [
                    "Anemie tgv foliumzuurtekort"
                ],
                [
                    "Anemie tgv vitamine B12-tekort"
                ],
                [
                    "Anemie tgv vitamine B6-deficiлntie"
                ],
                [
                    "Aneurysma"
                ],
                [
                    "Aneurysma atriumseptum"
                ],
                [
                    "Aneurysma cordis"
                ],
                [
                    "Aneurysma dissecans aortae"
                ],
                [
                    "Aneurysma sinus Valsalvae"
                ],
                [
                    "Aneurysma spurium"
                ],
                [
                    "Aneurysma spurium arteria femoralis links"
                ],
                [
                    "Aneurysma spurium arteria femoralis rechts"
                ],
                [
                    "Aneurysma van de aorta abdominalis (AAA)"
                ],
                [
                    "Aneurysma van de aorta thoracalis"
                ],
                [
                    "Aneurysma-operatie"
                ],
                [
                    "Aneurysmata van de coronairarteriлn"
                ],
                [
                    "Aneurysmectomie linkerventrikel"
                ],
                [
                    "Angelchik-operatie"
                ],
                [
                    "Angina abdominalis"
                ],
                [
                    "Angina op basis van spasme"
                ],
                [
                    "Angina pectoris"
                ],
                [
                    "Angina pectoris"
                ],
                [
                    "Angina pectoris"
                ],
                [
                    "Angina pectoris"
                ],
                [
                    "Angina pectoris"
                ],
                [
                    "Angina pectoris"
                ],
                [
                    "Angina pectoris"
                ],
                [
                    "Angina pectoris"
                ],
                [
                    "Angiodysplasie"
                ],
                [
                    "Angiodysplasie van het colon"
                ],
                [
                    "Angiografie nierarterien"
                ],
                [
                    "Angiokeratomen"
                ],
                [
                    "Angiomyolipoom nier"
                ],
                [
                    "Angststoornis"
                ],
                [
                    "Ankylostomiasis"
                ],
                [
                    "Anomalie van de pancreas"
                ],
                [
                    "Anorectale fistel"
                ],
                [
                    "Anorectale myectomie"
                ],
                [
                    "Anorexia nervosa"
                ],
                [
                    "Antebrachii-fractuur"
                ],
                [
                    "Anterieure schouderluxatie (glenohumeraal)"
                ],
                [
                    "Anterolateraal myocardinfarct"
                ],
                [
                    "Anteroseptaal myocardinfarct"
                ],
                [
                    "Anteroseptaal-lateraal infarct"
                ],
                [
                    "Anticardiolipine syndrome"
                ],
                [
                    "Antifosfolipidensyndroom"
                ],
                [
                    "Antireflux-operatie"
                ],
                [
                    "Antitrombine III-deficiлntie"
                ],
                [
                    "Anusatresie"
                ],
                [
                    "Anuscarcinoom"
                ],
                [
                    "Anusdilatatie"
                ],
                [
                    "Anuspoliep"
                ],
                [
                    "Anusprolaps"
                ],
                [
                    "Anusstenose"
                ],
                [
                    "Aorta-iliacale bypass"
                ],
                [
                    "Aortabuisprothese"
                ],
                [
                    "Aortadissectie"
                ],
                [
                    "Aortaklepdilatatie"
                ],
                [
                    "Aortaklepinsufficiлntie"
                ],
                [
                    "Aortaklepsclerose"
                ],
                [
                    "Aortaklepstenose"
                ],
                [
                    "Aortaklepvervanging"
                ],
                [
                    "Aortaklepvervanging"
                ],
                [
                    "Aortakunstklep"
                ],
                [
                    "Aortakunstklep"
                ],
                [
                    "Aortakunstklep"
                ],
                [
                    "Aortakunstklep"
                ],
                [
                    "Aortakunstklep"
                ],
                [
                    "Aortakunstklep"
                ],
                [
                    "Aortakunstklep"
                ],
                [
                    "Aortaprothese"
                ],
                [
                    "Aortitis"
                ],
                [
                    "Aorto-iliacale bifurcatieprothese"
                ],
                [
                    "Apathie"
                ],
                [
                    "Aplasie van de hypofysesteel"
                ],
                [
                    "Aplastische anemie"
                ],
                [
                    "Appendectomie"
                ],
                [
                    "Appendicitis"
                ],
                [
                    "Armoperatie"
                ],
                [
                    "Arteriitis temporalis"
                ],
                [
                    "Arterio-veneuze malformatie (AVM)"
                ],
                [
                    "Arteriлle afsluiting"
                ],
                [
                    "Arteriлle afsluiting linkerbeen"
                ],
                [
                    "Arteriлle afsluiting rechterbeen"
                ],
                [
                    "Arteriлle micro-embolieлn"
                ],
                [
                    "Arteriпtis temporalis"
                ],
                [
                    "Arthralgie MCP PIP DIP gewricht hand"
                ],
                [
                    "Arthralgie MTP PIP DIP gewricht voet"
                ],
                [
                    "Arthralgie elleboogklachten"
                ],
                [
                    "Arthralgie enkelgewrichtsklachten"
                ],
                [
                    "Arthralgie frozen shoulder"
                ],
                [
                    "Arthralgie heupgewrichtsklachten"
                ],
                [
                    "Arthralgie kaakgewricht tmj-syndroom"
                ],
                [
                    "Arthralgie kniegewrichtklachten"
                ],
                [
                    "Arthralgie polsgewrichtsklachten"
                ],
                [
                    "Arthralgie schouderklachten"
                ],
                [
                    "Arthralgie sinus tarsi syndroom"
                ],
                [
                    "Arthralgieлn"
                ],
                [
                    "Arthritis"
                ],
                [
                    "Arthritis psoriatica"
                ],
                [
                    "Arthrodese"
                ],
                [
                    "Arthrodese (verschillende vingers)"
                ],
                [
                    "Arthropathie"
                ],
                [
                    "Arthroplastiek Swanson (verschillende vingers)"
                ],
                [
                    "Arthroplastiek+corr. ulnaire deviatie"
                ],
                [
                    "Arthroplastiek-capsulolysis"
                ],
                [
                    "Arthroscopie"
                ],
                [
                    "Arthrose"
                ],
                [
                    "Ascites"
                ],
                [
                    "Ascorbinezuurdeficiлntie"
                ],
                [
                    "Aseptische botnecrose"
                ],
                [
                    "Aspecifieke aangezichtspijn"
                ],
                [
                    "Aspecifieke thoracale klachten"
                ],
                [
                    "Aspecifieke thorakale klachten"
                ],
                [
                    "Aspergillose"
                ],
                [
                    "Aspiratie"
                ],
                [
                    "Asthma bronchiale"
                ],
                [
                    "Asthma cardiale"
                ],
                [
                    "Asthmatische bronchitis"
                ],
                [
                    "Astrocytoom verwijdering"
                ],
                [
                    "Asymmetrische septumhypertrofie"
                ],
                [
                    "Asystolie"
                ],
                [
                    "Ataxie"
                ],
                [
                    "Atelectase"
                ],
                [
                    "Atlanto-axiale dislocatie"
                ],
                [
                    "Atlanto-occipitale dislocatie"
                ],
                [
                    "Atopie"
                ],
                [
                    "Atriale tachycardie"
                ],
                [
                    "Atriumdilatatie"
                ],
                [
                    "Atriumfibrilleren"
                ],
                [
                    "Atriumfibrilleren met rustige ventrikelfrequentie"
                ],
                [
                    "Atriumfibrilleren met snelle ventrikelfrequentie"
                ],
                [
                    "Atriumfibrilleren met trage ventrikelfrequentie"
                ],
                [
                    "Atriumflutter"
                ],
                [
                    "Atriumseptumdefect"
                ],
                [
                    "Atriumseptumdefect"
                ],
                [
                    "Attention deficit hyperactivity disorder (ADHD)"
                ],
                [
                    "Atypische aangezichtspijn"
                ],
                [
                    "Atypische angina pectoris"
                ],
                [
                    "Atypische buikklachten"
                ],
                [
                    "Atypische precordiale klachten"
                ],
                [
                    "Aura met niet-migraine hoofdpijn"
                ],
                [
                    "Aura zonder hoofdpijn"
                ],
                [
                    "Auto-immuun hemolytische anemie"
                ],
                [
                    "Autonome neuropathie"
                ],
                [
                    "Autonoom functionerende schildklier"
                ],
                [
                    "Autonoom multinodulair struma"
                ],
                [
                    "Axiale ataxie"
                ],
                [
                    "Axillo-femorale bypass"
                ],
                [
                    "Azathioprine (Imuran)"
                ],
                [
                    "B-lymfoblastair lymfoom"
                ],
                [
                    "BCC-PCC-melanoom (verschillende gebieden)"
                ],
                [
                    "BPSD"
                ],
                [
                    "Bacteriлle overgroei van de dunne darm"
                ],
                [
                    "Bacteriлmie"
                ],
                [
                    "Bacteriлmie (focus onbekend)"
                ],
                [
                    "Bakerse cyste"
                ],
                [
                    "Balanitis"
                ],
                [
                    "Balansstoornis"
                ],
                [
                    "Barrettoesofagus"
                ],
                [
                    "Barton-fractuur"
                ],
                [
                    "Basaalcelcarcinoom"
                ],
                [
                    "Basalioom"
                ],
                [
                    "Basilaris type migraine"
                ],
                [
                    "Beenlengteverschil"
                ],
                [
                    "Beenmergbeschadiging tgv radiotherapie of chemothe"
                ],
                [
                    "Beenmergtransplantatie"
                ],
                [
                    "Beenmergziekte"
                ],
                [
                    "Beenoperatie"
                ],
                [
                    "Begin orale antidiabetische medicatie"
                ],
                [
                    "Beginnende diabetische nefropathie"
                ],
                [
                    "Behandeling met 1100 MBq (30 mCi) jodium-131"
                ],
                [
                    "Behandeling met 177Lu-octreotaat"
                ],
                [
                    "Behandeling met 185 MBq (5 mCi) jodium-131"
                ],
                [
                    "Behandeling met 1850 MBq (50 mCi) jodium-131"
                ],
                [
                    "Behandeling met 220 MBq (6 mCi) jodium-131"
                ],
                [
                    "Behandeling met 2200 MBq (60 mCi) jodium-131"
                ],
                [
                    "Behandeling met 260 MBq (7 mCi) jodium-131"
                ],
                [
                    "Behandeling met 2780 MBq (75 mCi) jodium-131"
                ],
                [
                    "Behandeling met 300 MBq (8 mCi) jodium-131"
                ],
                [
                    "Behandeling met 330 MBq (9 mCi) jodium-131"
                ],
                [
                    "Behandeling met 370 MBq (10 mCi) jodium-131"
                ],
                [
                    "Behandeling met 400 MBq (11 mCi) jodium-131"
                ],
                [
                    "Behandeling met 440 MBq (12 mCi) jodium-131"
                ],
                [
                    "Behandeling met 480 MBq (13 mCi) jodium-131"
                ],
                [
                    "Behandeling met 520 MBq (14 mCi) jodium-131"
                ],
                [
                    "Behandeling met 5550 MBq (150 mCi) jodium-131"
                ],
                [
                    "Behandeling met 630 MBq (17 mCi) jodium-131"
                ],
                [
                    "Behandeling met 670 MBq (18 mCi) jodium-131"
                ],
                [
                    "Behandeling met 740 MBq (20 mCi) jodium-131"
                ],
                [
                    "Behandeling met 930 MBq (25 mCi) jodium-131"
                ],
                [
                    "Behandeling met jodium-131"
                ],
                [
                    "Behaviour and psychological symptoms of dementia "
                ],
                [
                    "Bekkenbodemsyndroom"
                ],
                [
                    "Bekkenfractuur"
                ],
                [
                    "Bekkennier"
                ],
                [
                    "Bekkenring-fractuur"
                ],
                [
                    "Bekkenvenenthrombose"
                ],
                [
                    "Benigne afwijking mamma"
                ],
                [
                    "Benigne blaastumor"
                ],
                [
                    "Benigne fasciculaties"
                ],
                [
                    "Benigne intracraniлle hypertensie"
                ],
                [
                    "Benigne mammatumor"
                ],
                [
                    "Benigne neoplasma van een speekselklier"
                ],
                [
                    "Benigne pancreaseilandceltumor"
                ],
                [
                    "Benigne prostaathypertrofie (BPH)"
                ],
                [
                    "Benigne tumor"
                ],
                [
                    "Bennet-fractuur"
                ],
                [
                    "Benzodiazepine-intoxicatie"
                ],
                [
                    "Benzodiazepineverslaving"
                ],
                [
                    "Beriberi"
                ],
                [
                    "Bestraling"
                ],
                [
                    "Bestralingsenteritis"
                ],
                [
                    "Bicondylaire femurfractuur"
                ],
                [
                    "Bicuspide aortaklep"
                ],
                [
                    "Bifasciculair blok"
                ],
                [
                    "Bifurcatieprothese"
                ],
                [
                    "Bijholte-operatie"
                ],
                [
                    "Bijnierschorscarcinoom"
                ],
                [
                    "Bijnierschorsinsufficiлntie"
                ],
                [
                    "Bilaterale ovariлctomie"
                ],
                [
                    "Bilio-digestieve anastomose"
                ],
                [
                    "Billroth I-maagresectie"
                ],
                [
                    "Billroth II-maagresectie"
                ],
                [
                    "Bipolaire stoornis"
                ],
                [
                    "Biventriculaire ICD"
                ],
                [
                    "Blaasbiopten"
                ],
                [
                    "Blaascarcinoom (urotheelcelcarcinoom van de blaas)"
                ],
                [
                    "Blaasdivertikel"
                ],
                [
                    "Blaashalsincisie/ - resectie"
                ],
                [
                    "Blaashalssuspensie"
                ],
                [
                    "Blaaslithotripsie"
                ],
                [
                    "Blaasneuropathie"
                ],
                [
                    "Blaassteen"
                ],
                [
                    "Blanco"
                ],
                [
                    "Blefaroplastiek boven- en onderoogleden"
                ],
                [
                    "Blefaroplastiek bovenoogleden"
                ],
                [
                    "Blefaroplastiek onderoogleden"
                ],
                [
                    "Blepharitis"
                ],
                [
                    "Blindheid"
                ],
                [
                    "Bloeding"
                ],
                [
                    "Bloeding in de schildklier"
                ],
                [
                    "Borderline persoonlijkheid"
                ],
                [
                    "Borderline persoonlijkheidsstoornis"
                ],
                [
                    "Borstverkleining"
                ],
                [
                    "Botziekte van Paget"
                ],
                [
                    "Boulimie"
                ],
                [
                    "Bovenste luchtweginfectie"
                ],
                [
                    "Brachialgie"
                ],
                [
                    "Brachytherapie"
                ],
                [
                    "Brady-tachycardie-syndroom"
                ],
                [
                    "Bradycardie"
                ],
                [
                    "Braken"
                ],
                [
                    "Braken ECI"
                ],
                [
                    "Brandwond"
                ],
                [
                    "Brandwond derdegraads"
                ],
                [
                    "Brandwond eerstegraads"
                ],
                [
                    "Brandwond gelaat"
                ],
                [
                    "Brandwond tweedegraads"
                ],
                [
                    "Brandwond vierdegraads"
                ],
                [
                    "Brandwonden (verschillende gebieden en categorieлn"
                ],
                [
                    "Breedcomplex-tachycardie"
                ],
                [
                    "Bricker-deviatie"
                ],
                [
                    "Bridging LAD"
                ],
                [
                    "Bronchiolitis"
                ],
                [
                    "Bronchiolitis obliterans"
                ],
                [
                    "Bronchiлctasie"
                ],
                [
                    "Bronchopathie"
                ],
                [
                    "Brucellosis"
                ],
                [
                    "Buikoperatie nno"
                ],
                [
                    "Buikpijn"
                ],
                [
                    "Buikwandbreukoperatie"
                ],
                [
                    "Buikwandcorrectie"
                ],
                [
                    "Bulbitis"
                ],
                [
                    "Burkitt's lymfoom"
                ],
                [
                    "Burning mouth syndroom"
                ],
                [
                    "Bursitis"
                ],
                [
                    "Bypassoperatie"
                ],
                [
                    "CABG"
                ],
                [
                    "CABG met LIMA"
                ],
                [
                    "CABG met LIMA en RIMA"
                ],
                [
                    "CABG met LIMA en veneuze graft"
                ],
                [
                    "CABG met LIMA"
                ],
                [
                    "CABG met RIMA"
                ],
                [
                    "CABG met meerdere veneuze grafts"
                ],
                [
                    "CABG met ййn veneuze jump graft"
                ],
                [
                    "CABG met ййn veneuze single graft"
                ],
                [
                    "CAPD-catheterdysfunctie"
                ],
                [
                    "CEA verhoogd"
                ],
                [
                    "CH chronisch"
                ],
                [
                    "CH episodisch"
                ],
                [
                    "COPD"
                ],
                [
                    "CREST-syndroom"
                ],
                [
                    "CTS-guyon"
                ],
                [
                    "CVA"
                ],
                [
                    "CVA"
                ],
                [
                    "CVA"
                ],
                [
                    "Calcaneusfractuur"
                ],
                [
                    "Calcinosis cutis"
                ],
                [
                    "Caldwell-Luc operatie"
                ],
                [
                    "Campylobacter-enteritis"
                ],
                [
                    "Candida-infectie"
                ],
                [
                    "Candida-oesofagitis"
                ],
                [
                    "Candidiasis"
                ],
                [
                    "Cannabisroes"
                ],
                [
                    "Capitellumfractuur"
                ],
                [
                    "Capsulectomie(-otomie)-prothesevervanging"
                ],
                [
                    "Carcinoom"
                ],
                [
                    "Carcinoom glandula sublingualis"
                ],
                [
                    "Carcinoom van onbekende origine"
                ],
                [
                    "Carcinoom vd papil van Vater"
                ],
                [
                    "Carcinoпd"
                ],
                [
                    "Cardiac event registratie:"
                ],
                [
                    "Cardiac event registratie: geen afwijkingen"
                ],
                [
                    "Cardiacarcinoom"
                ],
                [
                    "Cardiale ischaemie"
                ],
                [
                    "Cardiogene shock"
                ],
                [
                    "Cardiomyopathie"
                ],
                [
                    "Cardioversie"
                ],
                [
                    "Cardioversie wegens VT"
                ],
                [
                    "Cariлs"
                ],
                [
                    "Carotisdesobstructie"
                ],
                [
                    "Carotisstenose"
                ],
                [
                    "Carotisstenose links"
                ],
                [
                    "Carotisstenose rechts"
                ],
                [
                    "Carpaaltunnel-operatie"
                ],
                [
                    "Carpaaltunnelsyndroom (CTS)"
                ],
                [
                    "Carpaliafractuur"
                ],
                [
                    "Castratie"
                ],
                [
                    "Cataract"
                ],
                [
                    "Cataractoperatie"
                ],
                [
                    "Catheterablatie"
                ],
                [
                    "Catheterpoortinfectie"
                ],
                [
                    "Cauda equina syndroom"
                ],
                [
                    "Cellulitis"
                ],
                [
                    "Centraal neuropathische pijn"
                ],
                [
                    "Centraal neuropathische pijn bij CRPS"
                ],
                [
                    "Centrale diabetes insipidus"
                ],
                [
                    "Cerebraal aneurysma"
                ],
                [
                    "Cerebraal aneurysma-operatie"
                ],
                [
                    "Cerebrale intraparenchymateuze bloeding"
                ],
                [
                    "Cervicaal kanaalstenose-operatie"
                ],
                [
                    "Cervicaal ligamentair letsel"
                ],
                [
                    "Cervicaal syndroom"
                ],
                [
                    "Cervicaal syndroom cervicobrach. cervicogene hoofd"
                ],
                [
                    "Cervicale HNP-operatie"
                ],
                [
                    "Cervicale dislocatie"
                ],
                [
                    "Cervicale wervelfractuur"
                ],
                [
                    "Cervicitis"
                ],
                [
                    "Cervicobrachialgie"
                ],
                [
                    "Cervicogene hoofdpijn"
                ],
                [
                    "Cervixcarcinoom"
                ],
                [
                    "Cervixexcisie"
                ],
                [
                    "Chalazion"
                ],
                [
                    "Charcotvoet"
                ],
                [
                    "Chauffeur's fractuur"
                ],
                [
                    "Cheilitis granulomatosa (syndroom van Melkersson-R"
                ],
                [
                    "Cheilognathopalatoschizis"
                ],
                [
                    "Chemische oesofagitis"
                ],
                [
                    "Cholangiocarcinoom"
                ],
                [
                    "Cholangitis"
                ],
                [
                    "Cholecystectomie"
                ],
                [
                    "Cholecystolithiasis"
                ],
                [
                    "Choledocholithiasis"
                ],
                [
                    "Choledocholithiasis met cholangitis"
                ],
                [
                    "Choledochotomie"
                ],
                [
                    "Cholelithiasis"
                ],
                [
                    "Cholerische diarrhoea"
                ],
                [
                    "Cholestatische leverfunctiestoornis"
                ],
                [
                    "Cholesteatoom"
                ],
                [
                    "Cholesterolembolieлn"
                ],
                [
                    "Chondrocalcinosis"
                ],
                [
                    "Chondromalacie"
                ],
                [
                    "Chondropathie"
                ],
                [
                    "Chondrosarcoom"
                ],
                [
                    "Chordectomie"
                ],
                [
                    "Chordoma"
                ],
                [
                    "Chorea van Huntington"
                ],
                [
                    "Chorioretinitis"
                ],
                [
                    "Chronisch"
                ],
                [
                    "Chronisch aggressieve hepatitis"
                ],
                [
                    "Chronisch aktieve hepatitis met auto-immuunkenmerk"
                ],
                [
                    "Chronisch alcoholisme"
                ],
                [
                    "Chronisch boezemfibrilleren"
                ],
                [
                    "Chronisch occult intestinaal bloedverlies"
                ],
                [
                    "Chronisch persisterende hepatitis"
                ],
                [
                    "Chronisch recidiverende pancreatitis"
                ],
                [
                    "Chronisch vermoeidheidssyndroom"
                ],
                [
                    "Chronische TTT met pericraniele tenderness"
                ],
                [
                    "Chronische TTT zonder pericraniele tenderness"
                ],
                [
                    "Chronische actieve hepatitis"
                ],
                [
                    "Chronische atrofische gastritis"
                ],
                [
                    "Chronische bronchitis"
                ],
                [
                    "Chronische cholecystitis"
                ],
                [
                    "Chronische constipatie"
                ],
                [
                    "Chronische glomerulonefritis"
                ],
                [
                    "Chronische hepatitis B"
                ],
                [
                    "Chronische hepatitis C"
                ],
                [
                    "Chronische hepatitis nno"
                ],
                [
                    "Chronische intestinale ischaemie"
                ],
                [
                    "Chronische lymfatische leukemie"
                ],
                [
                    "Chronische lymfatische leukemie nno"
                ],
                [
                    "Chronische lymfatische leukemie stadium A"
                ],
                [
                    "Chronische lymfatische leukemie stadium B"
                ],
                [
                    "Chronische lymfatische leukemie stadium C"
                ],
                [
                    "Chronische migraine"
                ],
                [
                    "Chronische myeloide leukemie"
                ],
                [
                    "Chronische myelomoncyten leukemie"
                ],
                [
                    "Chronische myelomonocyten leukemie"
                ],
                [
                    "Chronische myelomonocyten leukemie (bm<20%"
                ],
                [
                    "Chronische nierinsufficiлntie"
                ],
                [
                    "Chronische pancreatitis"
                ],
                [
                    "Chronische paroxysmale hemicrania"
                ],
                [
                    "Chronische pyelonefritis"
                ],
                [
                    "Chronische rejectie niertransplantaat"
                ],
                [
                    "Chronische tubulointerstitiлle nefritis"
                ],
                [
                    "Chronische veneuze insufficiлntie"
                ],
                [
                    "Churg-Strauss syndroom"
                ],
                [
                    "Chyleuze ascites"
                ],
                [
                    "Chylothorax"
                ],
                [
                    "Ciclosporine (Neoral)"
                ],
                [
                    "Ciclosporine-nefrotoxiciteit"
                ],
                [
                    "Circulatiestoornis"
                ],
                [
                    "Circumcisie"
                ],
                [
                    "Cirkeltachycardie"
                ],
                [
                    "Claudicatio intermittens"
                ],
                [
                    "Claudicatio intermittens links"
                ],
                [
                    "Claudicatio intermittens rechts"
                ],
                [
                    "Clavicula-operatie"
                ],
                [
                    "Claviculafractuur"
                ],
                [
                    "Clostridiuminfectie"
                ],
                [
                    "Cluster A persoonlijkheidsstoornis"
                ],
                [
                    "Cluster B persoonlijkheidsstoornis"
                ],
                [
                    "Cluster hoofdpijn Hortonse neuralgie"
                ],
                [
                    "Coarctatio aortae"
                ],
                [
                    "Cocaпneverslaving"
                ],
                [
                    "Coccygodynie"
                ],
                [
                    "Coecumcarcinoom"
                ],
                [
                    "Coeliakie"
                ],
                [
                    "Cognitieve stoornissen"
                ],
                [
                    "Colitis"
                ],
                [
                    "Colitis ulcerosa"
                ],
                [
                    "Collageneuze colitis"
                ],
                [
                    "Collaps"
                ],
                [
                    "Collaps ECI"
                ],
                [
                    "Colles-fractuur"
                ],
                [
                    "Colon transversumresectie"
                ],
                [
                    "Colon/appendix carcinoom"
                ],
                [
                    "Coloncarcinoom Dukes A"
                ],
                [
                    "Coloncarcinoom Dukes D"
                ],
                [
                    "Coloncarcinoom linkszijdig Dukes C"
                ],
                [
                    "Coloncarcinoom nno"
                ],
                [
                    "Coloncarcinoom rechtszijdig Dukes C"
                ],
                [
                    "Colonpoliep"
                ],
                [
                    "Colorectale (re-)anastomose"
                ],
                [
                    "Colostomie"
                ],
                [
                    "Coma"
                ],
                [
                    "Commando-operatie"
                ],
                [
                    "Comminutieve fractuur"
                ],
                [
                    "Commissurotomie"
                ],
                [
                    "Commotio cerebri"
                ],
                [
                    "Compartimentsyndroom"
                ],
                [
                    "Complex regionaal pijnsyndroom"
                ],
                [
                    "Complex regionaal pijnsyndroom meerdere extremitei"
                ],
                [
                    "Complex regionaal pijnsyndroom type I  bovenste ex"
                ],
                [
                    "Complex regionaal pijnsyndroom type I  onderste ex"
                ],
                [
                    "Complex regionaal pijnsyndroom type II bovenste ex"
                ],
                [
                    "Complex regionaal pijnsyndroom type II onderste ex"
                ],
                [
                    "Condylomata acuminata"
                ],
                [
                    "Congenitaal AV-blok"
                ],
                [
                    "Congenitaal panhypopituitarisme"
                ],
                [
                    "Congenitale afwijking"
                ],
                [
                    "Congenitale buphtalmus"
                ],
                [
                    "Congenitale cystenieren"
                ],
                [
                    "Congenitale hypothyreoпdie"
                ],
                [
                    "Congenitale levercyste"
                ],
                [
                    "Congenitale leverfibrose"
                ],
                [
                    "Congenitale megalo-ureter"
                ],
                [
                    "Conisatie"
                ],
                [
                    "Conjunctivitis"
                ],
                [
                    "Constitutioneel geringe lengte"
                ],
                [
                    "Continue ambulante peritoneale dialyse (CAPD)"
                ],
                [
                    "Continue cyclische peritoneale dialyse (CCPD)"
                ],
                [
                    "Contractuur van Dupuytren"
                ],
                [
                    "Contusie"
                ],
                [
                    "Conusexcisie"
                ],
                [
                    "Cor pulmonale"
                ],
                [
                    "Corneaperforatie"
                ],
                [
                    "Corneatransplantatie"
                ],
                [
                    "Corneopathie"
                ],
                [
                    "Coronairangiogram (CAG)"
                ],
                [
                    "Coronaire fistel"
                ],
                [
                    "Coronaire spasme"
                ],
                [
                    "Coronaire stentplaatsing"
                ],
                [
                    "Coronairsclerose"
                ],
                [
                    "Coronarialijden"
                ],
                [
                    "Corpus alienum verwijdering"
                ],
                [
                    "Correctie"
                ],
                [
                    "Correctie afstaande oren"
                ],
                [
                    "Correctie cheilognatopalatoschizis"
                ],
                [
                    "Corticobasale degeneratie"
                ],
                [
                    "Corticosteroпdosteoporose"
                ],
                [
                    "Coxartrose"
                ],
                [
                    "Craniofaryngioom"
                ],
                [
                    "Craniotomie"
                ],
                [
                    "Cruraplastiek"
                ],
                [
                    "Cryptogene levercirrhose"
                ],
                [
                    "Cryptorchisme"
                ],
                [
                    "Cryptosporidiosis"
                ],
                [
                    "Curettage"
                ],
                [
                    "Cutaan lymfoom"
                ],
                [
                    "Cutane discoпde lupus erythematodes"
                ],
                [
                    "Cutane lupus erythematodes"
                ],
                [
                    "Cutane mastocytosen"
                ],
                [
                    "Cyclofosfamide (Endoxan)"
                ],
                [
                    "Cystadenoma van het pancreas"
                ],
                [
                    "Cyste"
                ],
                [
                    "Cyste bij het ruggemerg"
                ],
                [
                    "Cyste vagina verwijderd"
                ],
                [
                    "Cyste van het zakje van Rathke"
                ],
                [
                    "Cystectomie + Bricker"
                ],
                [
                    "Cystectomie + neoblaas"
                ],
                [
                    "Cystic fibrosis (mucoviscoidosis)"
                ],
                [
                    "Cystinurie"
                ],
                [
                    "Cystitis"
                ],
                [
                    "Cystokиle"
                ],
                [
                    "Cystoscopie"
                ],
                [
                    "Cytochroom p450c17-deficiлntie"
                ],
                [
                    "Cytomegalovirusziekte"
                ],
                [
                    "DHL"
                ],
                [
                    "Dacryocystitis"
                ],
                [
                    "Darmoperatie"
                ],
                [
                    "Darmperforatie"
                ],
                [
                    "Darmtuberculose"
                ],
                [
                    "Debulking-operatie"
                ],
                [
                    "Decompensatio cordis"
                ],
                [
                    "Decubitus"
                ],
                [
                    "Decubitus myocutanelap"
                ],
                [
                    "Decubitus pacemaker"
                ],
                [
                    "Deglovement arm"
                ],
                [
                    "Deglovement bovenbeen"
                ],
                [
                    "Deglovement enkel"
                ],
                [
                    "Deglovement hand"
                ],
                [
                    "Deglovement knie"
                ],
                [
                    "Deglovement onderarm"
                ],
                [
                    "Deglovement onderbeen"
                ],
                [
                    "Deglovement teen"
                ],
                [
                    "Deglovement vinger"
                ],
                [
                    "Dehydratie"
                ],
                [
                    "Delirium"
                ],
                [
                    "Dementiesyndroom"
                ],
                [
                    "Dementiлel syndroom"
                ],
                [
                    "Denervatie ingreep"
                ],
                [
                    "Dengue-koorts"
                ],
                [
                    "Dense deposit disease"
                ],
                [
                    "Densfractuur"
                ],
                [
                    "Depressie"
                ],
                [
                    "Dermatitis ECI"
                ],
                [
                    "Dermatitis herpetiformis (ziekte van Duhring)"
                ],
                [
                    "Dermatomycose"
                ],
                [
                    "Dermatopolymyositis"
                ],
                [
                    "Dermatose"
                ],
                [
                    "Dermolipectomie"
                ],
                [
                    "Dermolipectomie armen"
                ],
                [
                    "Dermolipectomie benen"
                ],
                [
                    "Dermolipectomie buik"
                ],
                [
                    "Desobstructie"
                ],
                [
                    "Desobstructie van de arteria carotis links"
                ],
                [
                    "Desobstructie van de arteria carotis rechts"
                ],
                [
                    "Dextrocardie"
                ],
                [
                    "Diabetes mellitus type 1"
                ],
                [
                    "Diabetes mellitus type 2"
                ],
                [
                    "Diabetes mellitus"
                ],
                [
                    "Diabetische achtergrondretinopathie"
                ],
                [
                    "Diabetische ketoacidose"
                ],
                [
                    "Diabetische perifere polyneuropathie"
                ],
                [
                    "Diabetische voet"
                ],
                [
                    "Diafragma hoogstand"
                ],
                [
                    "Diafysaire femurfractuur"
                ],
                [
                    "Diafysaire humerusfractuur"
                ],
                [
                    "Diafysaire radiusfractuur"
                ],
                [
                    "Diafysaire tibiafractuur"
                ],
                [
                    "Diafysaire ulnafractuur"
                ],
                [
                    "Dialyse artropathie"
                ],
                [
                    "Dialysecatheter-dysfunctie"
                ],
                [
                    "Diarrhoea"
                ],
                [
                    "Diastolisch hartfalen"
                ],
                [
                    "Diastolische dysfunctie"
                ],
                [
                    "Diepe veneuze beenthrombose"
                ],
                [
                    "Diffuse cutane mastocytose"
                ],
                [
                    "Diffuse idiopathic skeletal hyperostosis (DISH)"
                ],
                [
                    "Diffuse oesofagusspasmen"
                ],
                [
                    "Diffuus grootcellig B-cel lymfoom"
                ],
                [
                    "Difterie"
                ],
                [
                    "Digoxine-intoxicatie"
                ],
                [
                    "Dilatatie arteria femoralis links"
                ],
                [
                    "Dilatatie arteria femoralis rechts"
                ],
                [
                    "Dilatatie arteria iliaca links"
                ],
                [
                    "Dilatatie arteria iliaca rechts"
                ],
                [
                    "Dilatatie nierarteriestenose links"
                ],
                [
                    "Dilatatie nierarteriestenose rechts"
                ],
                [
                    "Diplopie"
                ],
                [
                    "Discopathie"
                ],
                [
                    "Discoпde lupus erythematodes"
                ],
                [
                    "Dissectie"
                ],
                [
                    "Dissectie aorta abdominalis"
                ],
                [
                    "Dissectie aorta ascendens"
                ],
                [
                    "Dissectie aorta descendens"
                ],
                [
                    "Dissectie aorta thoracalis"
                ],
                [
                    "Dissociatieve stoornis (conversie)"
                ],
                [
                    "Distale radiusfractuur met dorsale dislocatie"
                ],
                [
                    "Distale radiusfractuur met volaire dislocatie"
                ],
                [
                    "Distale tibiafractuur"
                ],
                [
                    "Diverticulitis"
                ],
                [
                    "Diverticulitis met abces"
                ],
                [
                    "Diverticulitis met perforatie"
                ],
                [
                    "Diverticulosis coli"
                ],
                [
                    "Diverticulosis coli met bloeding"
                ],
                [
                    "Dolichocolon"
                ],
                [
                    "Dorst"
                ],
                [
                    "Dragerschap St. aureus"
                ],
                [
                    "Dreigend myocardinfarct"
                ],
                [
                    "Dronkenschap"
                ],
                [
                    "Ductus Botalli"
                ],
                [
                    "Duizeligheid"
                ],
                [
                    "Duizeligheidsklachten"
                ],
                [
                    "Dumping syndroom"
                ],
                [
                    "Dundarmileus"
                ],
                [
                    "Dunne basaalmembraan glomerulopathie"
                ],
                [
                    "Dunne darm-divertikels"
                ],
                [
                    "Dunne darm-ileus nno"
                ],
                [
                    "Dunne darmoperatie"
                ],
                [
                    "Dunne darmresectie"
                ],
                [
                    "Duodenumdivertikel"
                ],
                [
                    "Duodenumpoliep"
                ],
                [
                    "Dupuytren-contractuur linkerhand"
                ],
                [
                    "Dupuytren-contractuur rechterhand"
                ],
                [
                    "Dupuytren-operatie"
                ],
                [
                    "Dwangneurose"
                ],
                [
                    "Dwarslesie"
                ],
                [
                    "Dynamische m gracilisplastiek"
                ],
                [
                    "Dysfagie"
                ],
                [
                    "Dyskinesia tarda"
                ],
                [
                    "Dyspepsie"
                ],
                [
                    "Dyspepsie"
                ],
                [
                    "Dyspepsie"
                ],
                [
                    "Dysplasie"
                ],
                [
                    "Dyspnoe"
                ],
                [
                    "Dyspnoe eci"
                ],
                [
                    "Dyspnoe"
                ],
                [
                    "Dyspnoe"
                ],
                [
                    "Dyspnoe"
                ],
                [
                    "Dyspnoe"
                ],
                [
                    "Dyspnoe"
                ],
                [
                    "Dyspnoe"
                ],
                [
                    "Dyspnoe"
                ],
                [
                    "Dystrofie"
                ],
                [
                    "Dystrophia musculorum progressiva"
                ],
                [
                    "ECG abnormaal"
                ],
                [
                    "ECG abnormaal eci"
                ],
                [
                    "ECG aspecifieke afwijkingen"
                ],
                [
                    "ECG binnen normale grenzen"
                ],
                [
                    "ECG normaal"
                ],
                [
                    "ESWL (extracorporele schokgolflithotripsie)"
                ],
                [
                    "Echinococcose"
                ],
                [
                    "Echo cor"
                ],
                [
                    "Echocardiogram"
                ],
                [
                    "Echocardiogram: normaal"
                ],
                [
                    "Eczeem"
                ],
                [
                    "Eenzijdige stilstaande stemband"
                ],
                [
                    "Electrofysiologisch onderzoek: abnormaal"
                ],
                [
                    "Electrofysiologisch onderzoek: normaal"
                ],
                [
                    "Elleboogluxatie"
                ],
                [
                    "Elleboogoperatie"
                ],
                [
                    "Embolectomie"
                ],
                [
                    "Emfyseem"
                ],
                [
                    "Eminentiafractuur"
                ],
                [
                    "Empty sella syndroom"
                ],
                [
                    "Encefalitis"
                ],
                [
                    "Encefalopathie van Wernicke"
                ],
                [
                    "Enchondroom"
                ],
                [
                    "Endocapillaire proliferatieve glomerulonefritis"
                ],
                [
                    "Endocarditis"
                ],
                [
                    "Endocarditis van de aortaklep"
                ],
                [
                    "Endocarditis van de mitralisklep"
                ],
                [
                    "Endocarditis van de pulmonalisklep"
                ],
                [
                    "Endocarditis van de tricuspidalisklep"
                ],
                [
                    "Endocrien inactief hypofyse-adenoom"
                ],
                [
                    "Endocriene hypertensie"
                ],
                [
                    "Endometriose"
                ],
                [
                    "Endometriose-cysteverwijdering"
                ],
                [
                    "Endometritis"
                ],
                [
                    "Endometriumcarcinoom"
                ],
                [
                    "Endomyocardiale tumor"
                ],
                [
                    "Endoscopie"
                ],
                [
                    "Endoscopische dilatatie naadstenose na darmresecti"
                ],
                [
                    "Endoscopische papillotomie"
                ],
                [
                    "Endoscopische procedure"
                ],
                [
                    "Endoscopische transsfenoпdale partiлle hypofysecto"
                ],
                [
                    "Endoscopische verwijdering endometriumpoliep"
                ],
                [
                    "Enkelluxatie"
                ],
                [
                    "Enteritis"
                ],
                [
                    "Enteritis"
                ],
                [
                    "Enterokиle-operatie"
                ],
                [
                    "Enucleatie"
                ],
                [
                    "Enuresis nocturna"
                ],
                [
                    "Eosinofiel granuloom"
                ],
                [
                    "Eosinofiele gastro-enterocolitis"
                ],
                [
                    "Eosinofiele oesofagitis"
                ],
                [
                    "Eosinofilie"
                ],
                [
                    "Epicondylitis lateralis"
                ],
                [
                    "Epidermoпdcyste van de hypofyse"
                ],
                [
                    "Epididymectomie"
                ],
                [
                    "Epididymitis"
                ],
                [
                    "Epiduraal haematoom"
                ],
                [
                    "Epifysiolyse"
                ],
                [
                    "Epilepsie"
                ],
                [
                    "Episcleritis"
                ],
                [
                    "Episodisch"
                ],
                [
                    "Episodische paroxysmale hemicrania"
                ],
                [
                    "Epistaxis"
                ],
                [
                    "Erectiele dysfunctie"
                ],
                [
                    "Ergometrie"
                ],
                [
                    "Ergometrie: dubieus positief"
                ],
                [
                    "Ergometrie: geen tekenen van ischemie"
                ],
                [
                    "Ergometrie: mogelijk positief"
                ],
                [
                    "Ergometrie: niet conclusief"
                ],
                [
                    "Ergometrie: tekenen ischemie"
                ],
                [
                    "Ernstige aortaklepinsufficiлntie"
                ],
                [
                    "Ernstige aortaklepstenose"
                ],
                [
                    "Ernstige hypoglykemie"
                ],
                [
                    "Ernstige mitralisinsufficiлntie"
                ],
                [
                    "Ernstige mitralisstenose"
                ],
                [
                    "Ernstige tricuspidalisinsufficiлntie"
                ],
                [
                    "Erosieve duodenitis van de bulbus"
                ],
                [
                    "Erosieve gastro-duodenitis"
                ],
                [
                    "Erysipelas"
                ],
                [
                    "Erythema annulare centrifugum"
                ],
                [
                    "Erythema gyratum repens"
                ],
                [
                    "Erythema intertrigo"
                ],
                [
                    "Erythema migrans"
                ],
                [
                    "Erythema multiforme"
                ],
                [
                    "Erythema nodosum"
                ],
                [
                    "Essentiлle hypertensie"
                ],
                [
                    "Essentiлle mixed type cryoglobulinemie type 2"
                ],
                [
                    "Essentiлle trombocytose"
                ],
                [
                    "Ethmoпdectomie"
                ],
                [
                    "Etsing van de luchtwegen"
                ],
                [
                    "EuroSCORE Logistic 1-3%"
                ],
                [
                    "EuroSCORE Logistic 10-15 %"
                ],
                [
                    "EuroSCORE Logistic 15-20%"
                ],
                [
                    "EuroSCORE Logistic 20-25 %"
                ],
                [
                    "EuroSCORE Logistic 25-30 %"
                ],
                [
                    "EuroSCORE Logistic 3-5%"
                ],
                [
                    "EuroSCORE Logistic 30-35 %"
                ],
                [
                    "EuroSCORE Logistic 35-40 %"
                ],
                [
                    "EuroSCORE Logistic 40-45 %"
                ],
                [
                    "EuroSCORE Logistic 45-50 %"
                ],
                [
                    "EuroSCORE Logistic 5-10%"
                ],
                [
                    "EuroSCORE Logistic 50-55 %"
                ],
                [
                    "EuroSCORE Logistic 55-60 %"
                ],
                [
                    "EuroSCORE Logistic 65-70%"
                ],
                [
                    "EuroSCORE Logistic < 1%"
                ],
                [
                    "Euthyreood diffuus struma"
                ],
                [
                    "Euthyreood multinodulair struma"
                ],
                [
                    "Exacerbatie COPD"
                ],
                [
                    "Exacerbatie IBD"
                ],
                [
                    "Excisie"
                ],
                [
                    "Excisie benigne afwijking mamma"
                ],
                [
                    "Excisie os coccygis"
                ],
                [
                    "Excisie ovariлle cyste"
                ],
                [
                    "Excisie schildkliernodus"
                ],
                [
                    "Exogene hypercalciurie"
                ],
                [
                    "Exogene hypothyreoпdie"
                ],
                [
                    "Exophtalmus"
                ],
                [
                    "Exploratie"
                ],
                [
                    "Exploratieve lumbotomie"
                ],
                [
                    "External compression hoofdpijn"
                ],
                [
                    "Extirpatie"
                ],
                [
                    "Extra-capillaire glomerulonefritis met halve manen"
                ],
                [
                    "Extra-ovarieel carcinoom"
                ],
                [
                    "Extra-uterine graviditeit"
                ],
                [
                    "Extractie"
                ],
                [
                    "Extrasystolie"
                ],
                [
                    "FHM"
                ],
                [
                    "Facelift"
                ],
                [
                    "Facetdenervatie percutaan"
                ],
                [
                    "Faciales parese dubbelzijdig"
                ],
                [
                    "Facialisparese"
                ],
                [
                    "Factor V (Leiden)-deficiлntie"
                ],
                [
                    "Factor VII-deficiлntie"
                ],
                [
                    "Factor XII-deficiлntie"
                ],
                [
                    "Factor XIII-deficiлntie"
                ],
                [
                    "Faecale incontinentie"
                ],
                [
                    "Failed back surgery syndroom (FBSS)"
                ],
                [
                    "Failed neck surgery syndroom"
                ],
                [
                    "Familiaire hypercholesterolemie (FH)"
                ],
                [
                    "Familiaire hypocalciurische hypercalciлmie"
                ],
                [
                    "Familiale hypofosfatemie"
                ],
                [
                    "Fantoompijn"
                ],
                [
                    "Faryngeaal letsel"
                ],
                [
                    "Faryngitis"
                ],
                [
                    "Farynxcarcinoom"
                ],
                [
                    "Fasciпtis plantaris"
                ],
                [
                    "Febriele granulopenie"
                ],
                [
                    "Femoraalbreuk"
                ],
                [
                    "Femorocrurale bypass"
                ],
                [
                    "Femoropedale bypass"
                ],
                [
                    "Femoropopliteale bypass"
                ],
                [
                    "Femorotibiale bypass"
                ],
                [
                    "Femurfractuur"
                ],
                [
                    "Femurkopfractuur"
                ],
                [
                    "Fenylketonurie"
                ],
                [
                    "Feochromocytoom"
                ],
                [
                    "Fibreuze dysplasie"
                ],
                [
                    "Fibromusculaire dysplasie"
                ],
                [
                    "Fibromyalgie"
                ],
                [
                    "Fibrosarcoom"
                ],
                [
                    "Fibulafractuur"
                ],
                [
                    "Filariasis"
                ],
                [
                    "Fimosis"
                ],
                [
                    "Fissura ani"
                ],
                [
                    "Fissurectomie"
                ],
                [
                    "Fissuur"
                ],
                [
                    "Fistel enterovesicaal"
                ],
                [
                    "Fisteloperatie"
                ],
                [
                    "Fladderthorax"
                ],
                [
                    "Flebitis"
                ],
                [
                    "Flushes"
                ],
                [
                    "Focale nodulaire hyperplasie"
                ],
                [
                    "Focale segmentale glomerulosclerose"
                ],
                [
                    "Focale spinale spieratrofie"
                ],
                [
                    "Foetus-in-foetu"
                ],
                [
                    "Foliumzuurdeficiлntie"
                ],
                [
                    "Folliculair schildkliercarcinoom"
                ],
                [
                    "Follikelcentrumcel lymfoom"
                ],
                [
                    "Follikelcentrumcel lymfoom"
                ],
                [
                    "Follikelcentrumcel lymfoom"
                ],
                [
                    "Forcipale extractie"
                ],
                [
                    "Fosfaat verhoogd"
                ],
                [
                    "Fototherapeutische keratectomie (PTK)"
                ],
                [
                    "Fractuur"
                ],
                [
                    "Fractuur os cuboideum"
                ],
                [
                    "Fractuur os naviculare"
                ],
                [
                    "Frenulotomie penis"
                ],
                [
                    "Freq. episod. TTH met pericraniele tenderness"
                ],
                [
                    "Freq. episod. TTH zonder pericraniele tenderness"
                ],
                [
                    "Frontotemporaal dementie"
                ],
                [
                    "Frozen shoulder"
                ],
                [
                    "Functionele diarrhee"
                ],
                [
                    "Functionele klachten"
                ],
                [
                    "Furunkel"
                ],
                [
                    "G6PD-deficiлntie"
                ],
                [
                    "Galactorroe"
                ],
                [
                    "Galactosemie"
                ],
                [
                    "Galblaascarcinoom"
                ],
                [
                    "Galblaaspoliepjes"
                ],
                [
                    "Galeazzi-fractuur"
                ],
                [
                    "Gallige peritonitis"
                ],
                [
                    "Galwegcarcinoom"
                ],
                [
                    "Ganglion"
                ],
                [
                    "Ganglion-operatie"
                ],
                [
                    "Ganglionblokkade"
                ],
                [
                    "Gastric bypass operatie"
                ],
                [
                    "Gastritis"
                ],
                [
                    "Gastro-intestinale bloeding n.n.o."
                ],
                [
                    "Gastroenteritis"
                ],
                [
                    "Gastropexie"
                ],
                [
                    "Geaccelereerd idioventriculair ritme"
                ],
                [
                    "Geaccelereerde hypertensie"
                ],
                [
                    "Gecombineerd aortaklepvitium"
                ],
                [
                    "Gecombineerd mitralisklepvitium"
                ],
                [
                    "Gecombineerd pulmonalisklep vitium"
                ],
                [
                    "Gecombineerde hyperlipoproteпnemie"
                ],
                [
                    "Gedilateerde aorta ascendens"
                ],
                [
                    "Gedilateerde cardiomyopathie"
                ],
                [
                    "Gedissimineerde intravasale stolling (DIS)"
                ],
                [
                    "Geelzucht"
                ],
                [
                    "Geen cardiale pathologie aantoonbaar"
                ],
                [
                    "Geen interne pathologie aantoonbaar"
                ],
                [
                    "Geen neurologische pathologie aantoonbaar"
                ],
                [
                    "Geen pulmonale pathologie aantoonbaar"
                ],
                [
                    "Gefaalde cardioversie wegens atriumfibrilleren"
                ],
                [
                    "Gefaalde cardioversie wegens atriumflutter"
                ],
                [
                    "Gegeneraliseerde atherosclerose"
                ],
                [
                    "Gehoorprothese-implantatie"
                ],
                [
                    "Gele koorts"
                ],
                [
                    "Gemengd delirium"
                ],
                [
                    "Gemengdcellig  Hodgkin-lymfoom"
                ],
                [
                    "Gemengde dementie"
                ],
                [
                    "Gemengde incontinentie"
                ],
                [
                    "Gemetastaseerd mammacarcinoom"
                ],
                [
                    "Gemetastaseerd pancreascarcinoom"
                ],
                [
                    "Genitale dysgenesie"
                ],
                [
                    "Gentamicine-nefropathie"
                ],
                [
                    "Geringe aortaklepinsufficiлntie"
                ],
                [
                    "Geringe pulmonalisklepstenose"
                ],
                [
                    "Gestoorde glucosetolerantie"
                ],
                [
                    "Gestoorde nuchtere bloedglucose"
                ],
                [
                    "Gestoorde oesofagusmotoriek  nno"
                ],
                [
                    "Gevestigde diabetische nefropathie"
                ],
                [
                    "Gewichtsverlies ECI"
                ],
                [
                    "Geпnfecteerde niercyste"
                ],
                [
                    "Giardia infectie"
                ],
                [
                    "Gistingsdyspepsie"
                ],
                [
                    "Glasvochtbloeding"
                ],
                [
                    "Glasvochtloslating"
                ],
                [
                    "Glaucoom"
                ],
                [
                    "Glaucoom-operatie"
                ],
                [
                    "Glenoidfractuur"
                ],
                [
                    "Glomerulonephritis n.n.o."
                ],
                [
                    "Goed contraherende linker ventrikel"
                ],
                [
                    "Goed contraherende rechter ventrikel"
                ],
                [
                    "Goede LV-functie"
                ],
                [
                    "Goede functie van de LIMA-graft"
                ],
                [
                    "Goede functie van de RIMA-graft"
                ],
                [
                    "Goede functie van de bypass(es)"
                ],
                [
                    "Goede"
                ],
                [
                    "Gokverslaving"
                ],
                [
                    "Gonadale dysgenesie"
                ],
                [
                    "Gonadotropinoom"
                ],
                [
                    "Gonartrose"
                ],
                [
                    "Gonokokkenurethritis"
                ],
                [
                    "Gonorrhoe"
                ],
                [
                    "Gracilisplastiek ivm incontinentie alvi"
                ],
                [
                    "Granolomateuze hepatitis"
                ],
                [
                    "Granuloma"
                ],
                [
                    "Granulomateuze hepatitis nno"
                ],
                [
                    "Graves' oftalmopathie"
                ],
                [
                    "Greenstick-fractuur"
                ],
                [
                    "Groeihormoondeficiлntie"
                ],
                [
                    "HBV-dragerschap"
                ],
                [
                    "HBsAg-positiviteit"
                ],
                [
                    "HELLP-syndroom"
                ],
                [
                    "HIV infectie"
                ],
                [
                    "HNP"
                ],
                [
                    "HNP cervicaal conservatief"
                ],
                [
                    "HNP cervicaal operatief"
                ],
                [
                    "HNP lumbaal conservatief"
                ],
                [
                    "HNP lumbaal operatief"
                ],
                [
                    "HNP-operatie"
                ],
                [
                    "HNPCC-coloncarcinoom"
                ],
                [
                    "HNPCC-gendragerschap"
                ],
                [
                    "HP met angst/paniek"
                ],
                [
                    "HP met depressie"
                ],
                [
                    "HP met epilepsie"
                ],
                [
                    "HP met slaapstoornissen"
                ],
                [
                    "Haarcelleukemie"
                ],
                [
                    "Hairy cell leukemie"
                ],
                [
                    "Hallux valgus"
                ],
                [
                    "Halscyste operatie"
                ],
                [
                    "Halsoperatie"
                ],
                [
                    "Halsrib"
                ],
                [
                    "Hamartoom"
                ],
                [
                    "Handoperatie"
                ],
                [
                    "Handtumor  (verschillende tumoren)"
                ],
                [
                    "Hangman-fractuur"
                ],
                [
                    "Hardhorendheid"
                ],
                [
                    "Hartfalen"
                ],
                [
                    "Hartgeruis"
                ],
                [
                    "Hartkloppingen"
                ],
                [
                    "Hartmann-procedure"
                ],
                [
                    "Hartoperatie"
                ],
                [
                    "Hartritmestoornis"
                ],
                [
                    "Harttransplantatie"
                ],
                [
                    "Heesheid"
                ],
                [
                    "Helicobacter-eradicatiekuur"
                ],
                [
                    "Helicobacter-positiviteit"
                ],
                [
                    "Helleroperatie"
                ],
                [
                    "Hemangio-endothelioma"
                ],
                [
                    "Hemangioom"
                ],
                [
                    "Hemangioom operatie"
                ],
                [
                    "Hemangioom van de lever"
                ],
                [
                    "Hematemesis zonder gekende oorzaak"
                ],
                [
                    "Hematoom"
                ],
                [
                    "Hematospermie"
                ],
                [
                    "Hemicastratie"
                ],
                [
                    "Hemicolectomie"
                ],
                [
                    "Hemicrania continua"
                ],
                [
                    "Hemiplegie"
                ],
                [
                    "Hemithyreoпdectomie"
                ],
                [
                    "Hemochromatose"
                ],
                [
                    "Hemochromatose heterozygoot"
                ],
                [
                    "Hemochromatose homozygoot"
                ],
                [
                    "Hemodialyse"
                ],
                [
                    "Hemofilie B"
                ],
                [
                    "Hemolyse"
                ],
                [
                    "Hemolytisch uremisch syndroom (HUS)"
                ],
                [
                    "Hemoptoл"
                ],
                [
                    "Hemorragische shock"
                ],
                [
                    "Hemorroпd-ligaties"
                ],
                [
                    "Hemorroпden"
                ],
                [
                    "Hemosiderose"
                ],
                [
                    "Hemothorax"
                ],
                [
                    "Henoch-Schцnlein-purpura"
                ],
                [
                    "Heparine induced trombocytopenie en thrombose (HIT"
                ],
                [
                    "Hepatische encefalopathie"
                ],
                [
                    "Hepatitis A"
                ],
                [
                    "Hepatitis B"
                ],
                [
                    "Hepatitis B dragerschap"
                ],
                [
                    "Hepatitis B vaccinatie"
                ],
                [
                    "Hepatitis C"
                ],
                [
                    "Hepatitis D"
                ],
                [
                    "Hepatitis E"
                ],
                [
                    "Hepatitis nno"
                ],
                [
                    "Hepatitis tgv cytomegalievirus"
                ],
                [
                    "Hepatitis tgv mononucleosis infectiosa"
                ],
                [
                    "Hepatitis-B-virus-dragerschap"
                ],
                [
                    "Hepatocellulair carcinoom"
                ],
                [
                    "Hepatomegalie nno"
                ],
                [
                    "Hepatorenaal syndroom"
                ],
                [
                    "Hereditaire amyloпd-nefropathie"
                ],
                [
                    "Hereditaire hemorragische teleangiлctasieлn"
                ],
                [
                    "Hereditaire motorisch-sensibele neuropathie (HMSN)"
                ],
                [
                    "Hereditaire sferocytose"
                ],
                [
                    "Hernia"
                ],
                [
                    "Hernia cicatricialis"
                ],
                [
                    "Hernia cicatricialis-operatie"
                ],
                [
                    "Hernia diafragmatica"
                ],
                [
                    "Hernia epigastrica-operatie"
                ],
                [
                    "Hernia incarcerata"
                ],
                [
                    "Hernia inguinalis"
                ],
                [
                    "Hernia para-oesofagealis"
                ],
                [
                    "Hernia umbilicalis"
                ],
                [
                    "Heroпneverslaving"
                ],
                [
                    "Herpes simplex genitalis"
                ],
                [
                    "Herpes zoster acuta"
                ],
                [
                    "Herpes zoster acuta cervicaal"
                ],
                [
                    "Herpes zoster acuta lumbosacraal"
                ],
                [
                    "Herpes zoster acuta thoracaal"
                ],
                [
                    "Herpes zoster acuta trigemini"
                ],
                [
                    "Herpes zoster infectie"
                ],
                [
                    "Herpesoesofagitis"
                ],
                [
                    "Hersenbloeding"
                ],
                [
                    "Herseninfarct"
                ],
                [
                    "Hersenmetastase"
                ],
                [
                    "Hersenoedeem"
                ],
                [
                    "Hersenschudding"
                ],
                [
                    "Hersentumor"
                ],
                [
                    "Hersentumor-operatie"
                ],
                [
                    "Hersenzenuwen/centrale oorzaak: n v-neuralgie idio"
                ],
                [
                    "Herstel van de continuпteit van de tractus digestivus"
                ],
                [
                    "Hersteloperatie na (totaal)ruptuur bij partus"
                ],
                [
                    "Heterozygotie voor cytochroom P450"
                ],
                [
                    "Heterozygotie voor factor V Leiden"
                ],
                [
                    "Heupdysplasie"
                ],
                [
                    "Heupfractuur"
                ],
                [
                    "Heupluxatie"
                ],
                [
                    "Hieloperatie"
                ],
                [
                    "Higher level mobility disorder"
                ],
                [
                    "Histiocytoom"
                ],
                [
                    "Histiocytose X"
                ],
                [
                    "Hoefijzernier"
                ],
                [
                    "Hoest hoofdpijn"
                ],
                [
                    "Holter monitoring"
                ],
                [
                    "Homocystinurie"
                ],
                [
                    "Hoofdhals tumor"
                ],
                [
                    "Hoofdpijn"
                ],
                [
                    "Hoofdpijn na hoofd-/nektrauma"
                ],
                [
                    "Hoofdstamstenose"
                ],
                [
                    "Hoog voltage elektriciteits trauma"
                ],
                [
                    "Hooggradig B-cel lymfoom"
                ],
                [
                    "Hooggradig glioma cerebri"
                ],
                [
                    "Hooggradig non Hodgkin lymfoom"
                ],
                [
                    "Hoogteziekte"
                ],
                [
                    "Hooikoorts"
                ],
                [
                    "Hordeolum"
                ],
                [
                    "Huidkanker"
                ],
                [
                    "Huidtransplantatie"
                ],
                [
                    "Huidverbranding"
                ],
                [
                    "Humerusfractuur"
                ],
                [
                    "Hydradenitis"
                ],
                [
                    "Hydrocele"
                ],
                [
                    "Hydrocele-correctie"
                ],
                [
                    "Hydrocephalus"
                ],
                [
                    "Hydronefrose"
                ],
                [
                    "Hydrops"
                ],
                [
                    "Hygroom"
                ],
                [
                    "Hyper-eosinophiel syndroom ECI"
                ],
                [
                    "Hyperactief hyperreactief delirium"
                ],
                [
                    "Hypercalciaemie"
                ],
                [
                    "Hypercholesterolemie"
                ],
                [
                    "Hyperchylomicronemie"
                ],
                [
                    "Hyperemesis gravidarum"
                ],
                [
                    "Hyperglykemische ontregeling"
                ],
                [
                    "Hyperhomocysteпnemie"
                ],
                [
                    "Hyperkaliлmie"
                ],
                [
                    "Hyperlipoproteпnemie (a)"
                ],
                [
                    "Hypernatriлmie"
                ],
                [
                    "Hyperosmolaire ontregeling diabetes"
                ],
                [
                    "Hyperostosis ankylosans vertebralis senilis (ziekt"
                ],
                [
                    "Hyperprolactinaemie"
                ],
                [
                    "Hypersensitief carotis syndroom"
                ],
                [
                    "Hypertensie"
                ],
                [
                    "Hypertensie nno"
                ],
                [
                    "Hypertensieve encefalopathie"
                ],
                [
                    "Hyperthyreoпdie"
                ],
                [
                    "Hyperthyreoпdie E.C.I."
                ],
                [
                    "Hypertriglyceridemie"
                ],
                [
                    "Hypertrofische cardiomyopathie"
                ],
                [
                    "Hypertrofische obstructieve cardiomyopathie"
                ],
                [
                    "Hypertrofische osteoarthropathie (ziekte van Marie"
                ],
                [
                    "Hyperuricaemie"
                ],
                [
                    "Hyperventilatiesyndroom"
                ],
                [
                    "Hypervitaminose A"
                ],
                [
                    "Hypervitaminose D"
                ],
                [
                    "Hyphema"
                ],
                [
                    "Hypoactief hyporeactief delirium"
                ],
                [
                    "Hypoalfalipoproteпnemie"
                ],
                [
                    "Hypocalciлmie"
                ],
                [
                    "Hypochondrie"
                ],
                [
                    "Hypofysebestraling"
                ],
                [
                    "Hypofysedecompressie"
                ],
                [
                    "Hypofysemetastase"
                ],
                [
                    "Hypoglycaemie"
                ],
                [
                    "Hypogonadotroop hypogonadisme"
                ],
                [
                    "Hypokaliлmie"
                ],
                [
                    "Hypokinetisch rigide syndroom"
                ],
                [
                    "Hyponatriлmie"
                ],
                [
                    "Hypospadie"
                ],
                [
                    "Hypotensie"
                ],
                [
                    "Hypothyreoпdie na radioactief jodium"
                ],
                [
                    "Hypothyreoпdie na uitwendige bestraling"
                ],
                [
                    "IAPP ( ilea-anale pouch procedure)"
                ],
                [
                    "ICD controle"
                ],
                [
                    "ICD implantatie"
                ],
                [
                    "ICD vervanging"
                ],
                [
                    "IJzerdeficiлntie zonder anemie"
                ],
                [
                    "IJzergebreksanemie"
                ],
                [
                    "Iatrogeen panhypopituпtarisme"
                ],
                [
                    "Iatrogeen syndroom van Cushing"
                ],
                [
                    "Iatrogene hyperthyreoпdie"
                ],
                [
                    "Iatrogene hypoparathyreoпdie"
                ],
                [
                    "Ichthyosis"
                ],
                [
                    "Idiopathisch hirsutisme"
                ],
                [
                    "Idiopathisch primair hyperaldosteronisme"
                ],
                [
                    "Idiopathische aangezichtspijn"
                ],
                [
                    "Idiopathische gynaecomastie"
                ],
                [
                    "Idiopathische hypercalciurie"
                ],
                [
                    "Idiopathische osteoporose"
                ],
                [
                    "Idiopathische trombocytopenische purpura (ITP)"
                ],
                [
                    "Idiopathische ventriculaire tachycardie"
                ],
                [
                    "IgA-deficiлntie"
                ],
                [
                    "IgA-nefropathie"
                ],
                [
                    "Ileiitis terminalis"
                ],
                [
                    "Ileocoecaal resectie"
                ],
                [
                    "Ileostomie"
                ],
                [
                    "Ileus"
                ],
                [
                    "Iliacopopliteale bypass"
                ],
                [
                    "Immuuncomplex glomerulonefritis"
                ],
                [
                    "Implantatie port-a-cath"
                ],
                [
                    "Inappropriate antidiuretic hormone secretion (IADH secretion)"
                ],
                [
                    "Incidentaloom"
                ],
                [
                    "Incidentaloom bijnier"
                ],
                [
                    "Incompleet rechter bundeltakblok"
                ],
                [
                    "Indeterminate colitis"
                ],
                [
                    "Induratio penis plastica (M. Peyronie)"
                ],
                [
                    "Infectie"
                ],
                [
                    "Infectie shunt"
                ],
                [
                    "Inferior myocardinfarct"
                ],
                [
                    "Inferior- en rechterventrikel myocardinfarct"
                ],
                [
                    "Inferolateraal myocardinfarct"
                ],
                [
                    "Inferoposterior myocardinfarct"
                ],
                [
                    "Inferoposterolateraal en RV myocardinfarct"
                ],
                [
                    "Inferoposterolateraal myocardinfarct"
                ],
                [
                    "Infertiliteit"
                ],
                [
                    "Infestatie met Enterobius vermicularis"
                ],
                [
                    "Influenza door geпdentificeerd influenzavirus"
                ],
                [
                    "Influenza"
                ],
                [
                    "Inhalatie trauma"
                ],
                [
                    "Insektenbeet of -steek"
                ],
                [
                    "Insomnia"
                ],
                [
                    "Inspanningshoofdpijn"
                ],
                [
                    "Instabiele angina pectoris"
                ],
                [
                    "Instabiele angina pectoris met ECG-afwijkingen"
                ],
                [
                    "Instabiele angina pectoris met ECG-afwijkingen en"
                ],
                [
                    "Instelling op insuline"
                ],
                [
                    "Insulinoom"
                ],
                [
                    "Insult"
                ],
                [
                    "Intentionele autointoxicatie"
                ],
                [
                    "Intermediair non-Hodgkin lymfoom"
                ],
                [
                    "Interne cardiale defibrilator (ICD)"
                ],
                [
                    "Interstitieel longlijden"
                ],
                [
                    "Intestinale pseudo-obstructie"
                ],
                [
                    "Intolerantie"
                ],
                [
                    "Intoxicatie met psychostimulantia"
                ],
                [
                    "Intra-uteriene vruchtdood"
                ],
                [
                    "Intracondylaire humerusfractuur"
                ],
                [
                    "Intracranieel hematoom"
                ],
                [
                    "Intramurale aortabloeding"
                ],
                [
                    "Intravasculaire infecties"
                ],
                [
                    "Intraventriculaire geleidingsstoornis"
                ],
                [
                    "Introпtusplastiek"
                ],
                [
                    "Inwendige cardioverter-defibrillator (ICD)"
                ],
                [
                    "Iridocyclitis"
                ],
                [
                    "Irritable bowel syndroom (IBS)"
                ],
                [
                    "Ischemie"
                ],
                [
                    "Ischemische cardiomyopathie"
                ],
                [
                    "Ischemische colitis"
                ],
                [
                    "Ischemische colonstrictuur"
                ],
                [
                    "Ischemische hepatitis"
                ],
                [
                    "Ischemische opticopathie"
                ],
                [
                    "Ischemische pijn extremiteiten"
                ],
                [
                    "Jefferson's fractuur"
                ],
                [
                    "Jeuk"
                ],
                [
                    "Jicht"
                ],
                [
                    "Kaakimplantaat"
                ],
                [
                    "Kaakoperatie"
                ],
                [
                    "Kaakspoeling"
                ],
                [
                    "Kattekrabziekte"
                ],
                [
                    "Keloпd"
                ],
                [
                    "Keratitis"
                ],
                [
                    "Keratoconjunctivitis"
                ],
                [
                    "Klapvoet"
                ],
                [
                    "Klein myocardinfarct met onbekende lokalisatie"
                ],
                [
                    "Kleincellig longcarcinoom"
                ],
                [
                    "Kleincellig longcarcinoom extended disease"
                ],
                [
                    "Kleincellig longcarcinoom gemetastaseerd"
                ],
                [
                    "Kleincellig longcarcinoom limited disease"
                ],
                [
                    "Kleplijden nno"
                ],
                [
                    "Klepvervanging"
                ],
                [
                    "Kleurenblindheid"
                ],
                [
                    "Klier"
                ],
                [
                    "Knie-operatie"
                ],
                [
                    "Knieluxatie"
                ],
                [
                    "Koliekaanval"
                ],
                [
                    "Kolposuspensie"
                ],
                [
                    "Koolmonoxidevergiftiging"
                ],
                [
                    "Koorts"
                ],
                [
                    "Koorts"
                ],
                [
                    "Kopnecrose"
                ],
                [
                    "Korsakow-syndroom"
                ],
                [
                    "Koude stimulus hoofdpijn"
                ],
                [
                    "Kreatinine"
                ],
                [
                    "Kruisbandletsel"
                ],
                [
                    "Kunstklep goed functionerend"
                ],
                [
                    "Kunstklep niet goed functionerend"
                ],
                [
                    "Kunstmatige inseminatie"
                ],
                [
                    "Kwabs-resectie"
                ],
                [
                    "LUTS (Lower Urinary Tract Symptoms)/OAB"
                ],
                [
                    "LVEF 11-15%"
                ],
                [
                    "LVEF 16-20%"
                ],
                [
                    "LVEF 21-25%"
                ],
                [
                    "LVEF 26-30%"
                ],
                [
                    "LVEF 31-35%"
                ],
                [
                    "LVEF 36-40%"
                ],
                [
                    "LVEF 41-45%"
                ],
                [
                    "LVEF 46-50%"
                ],
                [
                    "LVEF 51-55%"
                ],
                [
                    "LVEF 56-60%"
                ],
                [
                    "LVEF 61-65%"
                ],
                [
                    "LVEF 66-70%"
                ],
                [
                    "LVEF < 10%"
                ],
                [
                    "LVEF > 70%"
                ],
                [
                    "Laaggradig glioma cerebri"
                ],
                [
                    "Laaggradig non-Hodgkin lymfoom"
                ],
                [
                    "Labyrinthitis"
                ],
                [
                    "Lactaat verhoging"
                ],
                [
                    "Lactaatacidose"
                ],
                [
                    "Lactose-intolerantie"
                ],
                [
                    "Lage von Willebrand factor"
                ],
                [
                    "Lambert-Eaton syndroom"
                ],
                [
                    "Laminectomie"
                ],
                [
                    "Lang QT-syndroom"
                ],
                [
                    "Lange QT-tijd door sotalol"
                ],
                [
                    "Laparoscopie"
                ],
                [
                    "Laparoscopische appendectomie"
                ],
                [
                    "Laparoscopische cholecystectomie"
                ],
                [
                    "Laparoscopische sterilisatie"
                ],
                [
                    "Laparoscopische totaaloperatie"
                ],
                [
                    "Laparoscopische uterusextirpatie"
                ],
                [
                    "Laryngeaal letsel"
                ],
                [
                    "Laryngitis"
                ],
                [
                    "Larynxcarcinoom"
                ],
                [
                    "Lasertherapie"
                ],
                [
                    "Late-onset autoimmune diabetes of the adult (LADA)"
                ],
                [
                    "Lateraal myocardinfarct"
                ],
                [
                    "Laterale condylfractuur elleboog"
                ],
                [
                    "Laterale interne sphincterotomie"
                ],
                [
                    "Laterale malleolusfractuur"
                ],
                [
                    "Leiomyoom van de maag"
                ],
                [
                    "Lekkage CAPD-vloeistof buiten de buikholte"
                ],
                [
                    "Lensluxatie"
                ],
                [
                    "Letsel mediastinale bloedvaten"
                ],
                [
                    "Leukocytose"
                ],
                [
                    "Leukocytose ECI"
                ],
                [
                    "Leukopenie"
                ],
                [
                    "Leukopenie nno"
                ],
                [
                    "Leverabces"
                ],
                [
                    "Leveradenoom"
                ],
                [
                    "Levercyste"
                ],
                [
                    "Leverfibrose"
                ],
                [
                    "Leverfunctiestoornis"
                ],
                [
                    "Leverinsufficiлntie nno"
                ],
                [
                    "Leverkwabsresectie"
                ],
                [
                    "Leverproces"
                ],
                [
                    "Levertestafwijkingen"
                ],
                [
                    "Levertransplantatie"
                ],
                [
                    "Leverziekte tgv morbus Wilson"
                ],
                [
                    "Lewy-body-dementie"
                ],
                [
                    "Lichen ruber planus"
                ],
                [
                    "Lichen sclerosis et atroficans"
                ],
                [
                    "Licht Schedel Hersenletsel (LSH)"
                ],
                [
                    "Lichte aortaklepinsufficiлntie"
                ],
                [
                    "Lichte aortaklepstenose"
                ],
                [
                    "Lichte mitralisklepinsufficiлntie"
                ],
                [
                    "Lichte mitralisklepstenose"
                ],
                [
                    "Lichte pulmonalisklepinsufficiлntie"
                ],
                [
                    "Lichte tot matige aortaklepinsufficiлntie"
                ],
                [
                    "Lichte tot matige aortaklepstenose"
                ],
                [
                    "Lichte tot matige mitralisklepinsufficiлntie"
                ],
                [
                    "Lichte tot matige tricuspidalisklepinsufficiлntie"
                ],
                [
                    "Lichte tricuspidalisklepinsufficiлntie"
                ],
                [
                    "Liesbreukoperatie"
                ],
                [
                    "Ligamentair enkelletsel"
                ],
                [
                    "Ligamentair knieletsel"
                ],
                [
                    "Ligatie hemorroпden"
                ],
                [
                    "Linitis plastica van de maag"
                ],
                [
                    "Linker anterior fasciculair blok"
                ],
                [
                    "Linker bundeltakblok"
                ],
                [
                    "Linker posterior hemiblok"
                ],
                [
                    "Linker ventrikel thrombus"
                ],
                [
                    "Linker ventrikelhypertrofie"
                ],
                [
                    "Linker ventrikelhypertrofie niet meer op ECG aanto"
                ],
                [
                    "Links decompensatio cordis"
                ],
                [
                    "Linkszijdig coloncarcinoom Dukes B"
                ],
                [
                    "Lintworm"
                ],
                [
                    "Lipodystrofie"
                ],
                [
                    "Lipoom"
                ],
                [
                    "Lipoomresectie"
                ],
                [
                    "Lipoperatie"
                ],
                [
                    "Liposuctie"
                ],
                [
                    "Liposuctie (hier verschillende gebieden)"
                ],
                [
                    "Lithiumintoxicatie"
                ],
                [
                    "Littekenbreuk"
                ],
                [
                    "Littekenbreukcorrectie"
                ],
                [
                    "Littekencorrectie"
                ],
                [
                    "Littekenpijn"
                ],
                [
                    "Litttekencorrectie (verschillende gebieden)"
                ],
                [
                    "Livedo reticularis"
                ],
                [
                    "Locally advanced pancreascarcinoom"
                ],
                [
                    "Logesyndroom"
                ],
                [
                    "Lokaal recidief mammacarcinoom"
                ],
                [
                    "Longcarcinoom nno"
                ],
                [
                    "Longembolie"
                ],
                [
                    "Longemfyseem"
                ],
                [
                    "Longfibrose"
                ],
                [
                    "Longkwabresectie"
                ],
                [
                    "Longontsteking"
                ],
                [
                    "Longperfusie-scan: geen perfusie-defecten"
                ],
                [
                    "Longresectie"
                ],
                [
                    "Longtransplantatie"
                ],
                [
                    "Longtuberculose"
                ],
                [
                    "Longtumor"
                ],
                [
                    "Loopstoornis"
                ],
                [
                    "Low anterior resectie"
                ],
                [
                    "Lues"
                ],
                [
                    "Lumbago"
                ],
                [
                    "Lumbago met ischialgie"
                ],
                [
                    "Lumbago pseudo radiculair syndroom"
                ],
                [
                    "Lumbago pseudo radiculair syndroom"
                ],
                [
                    "Lumbago pseudo radiculair syndroom"
                ],
                [
                    "Lumbale HNP-operatie"
                ],
                [
                    "Lumbale wervelfractuur"
                ],
                [
                    "Lumpectomie"
                ],
                [
                    "Lupus erythematodes"
                ],
                [
                    "Lupus erythematodes disseminatus"
                ],
                [
                    "Lupusnefritis"
                ],
                [
                    "Luxatie"
                ],
                [
                    "Luxatie distaal interfalangeaal gewricht"
                ],
                [
                    "Luxatie metacarpofalangeaal gewricht"
                ],
                [
                    "Luxatie proximaal interfalangeaal gewricht"
                ],
                [
                    "Luxatie van Chopartgewricht (articulatio tarsi tra"
                ],
                [
                    "Luxatie van Lisfranc (tarsometatarsaal)"
                ],
                [
                    "Lymfadenectomie"
                ],
                [
                    "Lymfadenopathie"
                ],
                [
                    "Lymfklierdissectie"
                ],
                [
                    "Lymfocytenarm Hodgkin lymfoom"
                ],
                [
                    "Lymfocytenrijk Hodgkin lymfoom"
                ],
                [
                    "Lymfoedeem"
                ],
                [
                    "Lymfoplasmocytair lymfoom/Waldenstrцm"
                ],
                [
                    "Lymfvatoperatie"
                ],
                [
                    "MEN1-syndroom"
                ],
                [
                    "MEN2a-syndroom"
                ],
                [
                    "Maagcarcinoom"
                ],
                [
                    "Maagperforatie"
                ],
                [
                    "Maagpoliep"
                ],
                [
                    "Maagretentie"
                ],
                [
                    "Maagverkleiningsoperatie"
                ],
                [
                    "Maagzweer"
                ],
                [
                    "Macrocytaire anemie n.n.o."
                ],
                [
                    "Macroglobulinemie van Waldenstrцm"
                ],
                [
                    "Macroprolactinemie"
                ],
                [
                    "Macroscopische hematurie"
                ],
                [
                    "Maculadegeneratie"
                ],
                [
                    "Magnesiumdeficiлntie"
                ],
                [
                    "Maisonneuve-letsel"
                ],
                [
                    "Malabsorptie"
                ],
                [
                    "Malaria"
                ],
                [
                    "Maligne endocriene pancreastumor"
                ],
                [
                    "Maligne feochromocytoom"
                ],
                [
                    "Maligne hypertensie"
                ],
                [
                    "Maligne indolente lymfomen B-cell type"
                ],
                [
                    "Maligne lymfoom"
                ],
                [
                    "Maligne melanoom"
                ],
                [
                    "Maligne neuroleptisch syndroom"
                ],
                [
                    "Maligne teratoom"
                ],
                [
                    "Maligniteit van de dunne darm"
                ],
                [
                    "Malleolus tertius fractuur"
                ],
                [
                    "Mallet-vinger"
                ],
                [
                    "Mallory-Weiss syndroom"
                ],
                [
                    "Maltoma van de maag"
                ],
                [
                    "Mamma-augmentatieplastiek"
                ],
                [
                    "Mammacarcinoom T0 N2 M0"
                ],
                [
                    "Mammacarcinoom T1 ( 1.1-1.9 cm) N0 M0"
                ],
                [
                    "Mammacarcinoom T1 (<0.9 cm) N0 M0"
                ],
                [
                    "Mammacarcinoom T1 N1 (<4lk) M0"
                ],
                [
                    "Mammacarcinoom T1 N1 (>3lk) M0"
                ],
                [
                    "Mammacarcinoom T1 N3 (parasternaal) M0"
                ],
                [
                    "Mammacarcinoom T2 N0 M0"
                ],
                [
                    "Mammacarcinoom T2 N1 (<4lk) M0"
                ],
                [
                    "Mammacarcinoom T2 N1 (>3lk) M0"
                ],
                [
                    "Mammacarcinoom T2 N2 M0"
                ],
                [
                    "Mammacarcinoom T2 N3 (parasternaal) M0"
                ],
                [
                    "Mammacarcinoom T3 N0 M0"
                ],
                [
                    "Mammacarcinoom T3 N1 M0"
                ],
                [
                    "Mammacarcinoom T3 N2 (>3klieren) M0"
                ],
                [
                    "Mammacarcinoom T3 N3 (parasternaal) M0"
                ],
                [
                    "Mammacarcinoom T4 N1-2 M0"
                ],
                [
                    "Mammacarcinoom T4 N2 M0"
                ],
                [
                    "Mammacarcinoom T4 Nx M0"
                ],
                [
                    "Mammacarcinoom Tis N0 M0"
                ],
                [
                    "Mammacarcinoom nno"
                ],
                [
                    "Mammaprothesen plaatsing"
                ],
                [
                    "Mammaprotheseverwijdering"
                ],
                [
                    "Mammareconstructie-myocutanelap"
                ],
                [
                    "Mammareconstructie-operatie"
                ],
                [
                    "Mammareconstructie-prothese"
                ],
                [
                    "Mammareductie-ptosiscorrectie"
                ],
                [
                    "Mammareductieplastiek"
                ],
                [
                    "Mandibulafractuur"
                ],
                [
                    "Mantelcellymfoom"
                ],
                [
                    "Manuele placentaverwijdering"
                ],
                [
                    "Marginale zone lymfoom van de milt"
                ],
                [
                    "Marginale zone lymfoon extranodaal"
                ],
                [
                    "Mastectomie"
                ],
                [
                    "Mastitis"
                ],
                [
                    "Mastitis (abces) operatie"
                ],
                [
                    "Mastitis puerperalis"
                ],
                [
                    "Mastocytoom"
                ],
                [
                    "Mastopathie"
                ],
                [
                    "Mastoпditis"
                ],
                [
                    "Mastoпdoperatie"
                ],
                [
                    "Maternally inherited diabetes and deafness"
                ],
                [
                    "Matig contraherende linker ventrikel"
                ],
                [
                    "Matig contraherende rechter ventrikel"
                ],
                [
                    "Matige aortaklepinsufficiлntie"
                ],
                [
                    "Matige aortaklepstenose"
                ],
                [
                    "Matige functie van de coronaire bypass"
                ],
                [
                    "Matige mitralisklepinsufficiлntie"
                ],
                [
                    "Matige mitralisklepstenose"
                ],
                [
                    "Matige tot ernstige aortaklepinsufficiлntie"
                ],
                [
                    "Matige tot ernstige mitralisklepinsufficiлntie"
                ],
                [
                    "Matige tricuspidalisklepinsufficiлntie"
                ],
                [
                    "Maturity onset diabetes of the young (MODY)"
                ],
                [
                    "Maxillafractuur"
                ],
                [
                    "Meatotomie"
                ],
                [
                    "Meatusstenose urethra"
                ],
                [
                    "Mediale collumfractuur"
                ],
                [
                    "Mediale condylfractuur elleboog"
                ],
                [
                    "Mediale malleolusfractuur"
                ],
                [
                    "Mediastinitis"
                ],
                [
                    "Medicatiemisbruik hoofdpijn: analgetica"
                ],
                [
                    "Medicatiemisbruik hoofdpijn: ander R/ misbruik"
                ],
                [
                    "Medicatiemisbruik hoofdpijn: combinaties"
                ],
                [
                    "Medicatiemisbruik hoofdpijn: ergotamine"
                ],
                [
                    "Medicatiemisbruik hoofdpijn: koffie"
                ],
                [
                    "Medicatiemisbruik hoofdpijn: opioiden"
                ],
                [
                    "Medicatiemisbruik hoofdpijn: triptaan"
                ],
                [
                    "Medullair schildkliercarcinoom"
                ],
                [
                    "Medullaire sponsnieren"
                ],
                [
                    "Megacolon congenitum (M. Hirschsprung)"
                ],
                [
                    "Melaena"
                ],
                [
                    "Melaena zonder gekende oorzaak"
                ],
                [
                    "Melo-operatie wegens atriumfibrilleren"
                ],
                [
                    "Membraneuze glomerulopathie"
                ],
                [
                    "Meningeoom"
                ],
                [
                    "Meningeoomverwijdering"
                ],
                [
                    "Meningitis"
                ],
                [
                    "Meniscusletsel"
                ],
                [
                    "Meniscusoperatie"
                ],
                [
                    "Menopauze"
                ],
                [
                    "Menorrhagie"
                ],
                [
                    "Menstruele hoofdpijn"
                ],
                [
                    "Mentale retardatie"
                ],
                [
                    "Meralgia paraesthetica"
                ],
                [
                    "Merkelcelcarcinoom"
                ],
                [
                    "Mesangiocapillaire glomerulonefritis"
                ],
                [
                    "Mesangioproliferatieve glomerulonefritis"
                ],
                [
                    "Mesenteriaaltrombose"
                ],
                [
                    "Mesothelioom"
                ],
                [
                    "Metabole acidose"
                ],
                [
                    "Metabole alkalose"
                ],
                [
                    "Metabole encefalopathie"
                ],
                [
                    "Metacarpaliafractuur"
                ],
                [
                    "Metastase van onbekende oorsprong."
                ],
                [
                    "Metastasectomie"
                ],
                [
                    "Metastasen"
                ],
                [
                    "Metatarsaliafractuur"
                ],
                [
                    "Metrorrhagie"
                ],
                [
                    "Micro-albuminurie"
                ],
                [
                    "Micro-angiopathie"
                ],
                [
                    "Microcurettage"
                ],
                [
                    "Microscopische colitis"
                ],
                [
                    "Microscopische hematurie"
                ],
                [
                    "Microscopische hematurie nno"
                ],
                [
                    "Middenooroperatie"
                ],
                [
                    "Migraine"
                ],
                [
                    "Migraine met aura"
                ],
                [
                    "Migraine triggered insult"
                ],
                [
                    "Migraine zonder aura"
                ],
                [
                    "Migraineus infarct"
                ],
                [
                    "Mild cognitive impairment"
                ],
                [
                    "Miltextirpatie"
                ],
                [
                    "Miltinfarct"
                ],
                [
                    "Minimal lesions glomerulopathie"
                ],
                [
                    "Minimale aortaklepinsufficiлntie"
                ],
                [
                    "Minimale coronaire wandonregelmatigheden"
                ],
                [
                    "Misbruik van ergotalkaloпden"
                ],
                [
                    "Misbruik van nicotine"
                ],
                [
                    "Misselijkheid en braken"
                ],
                [
                    "Misselijkheid"
                ],
                [
                    "Mitraalklepinsufficiлntie"
                ],
                [
                    "Mitraalklepprolaps"
                ],
                [
                    "Mitraalklepstenose"
                ],
                [
                    "Mitraalklepvervanging"
                ],
                [
                    "Mitralisklep commissurotomie"
                ],
                [
                    "Mitralisklep dilatatie"
                ],
                [
                    "Mitralisklep reconstructie"
                ],
                [
                    "Mitralisklepannulus plastiek"
                ],
                [
                    "Mitralisklepannulus verkalking"
                ],
                [
                    "Mitralisklepinsufficiлntie"
                ],
                [
                    "Mitralisklepplastiek"
                ],
                [
                    "Mitraliskunstklep"
                ],
                [
                    "Mitraliskunstklep"
                ],
                [
                    "Mitraliskunstklep"
                ],
                [
                    "Mitraliskunstklep"
                ],
                [
                    "Mitraliskunstklep"
                ],
                [
                    "Mitraliskunstklep"
                ],
                [
                    "Mixed connective tissue disease (MCTD)"
                ],
                [
                    "Mobiliteitstoornis"
                ],
                [
                    "Mogelijk angina pectoris"
                ],
                [
                    "Mogelijk doorgemaakt myocardinfarct"
                ],
                [
                    "Mogelijk kleplijden"
                ],
                [
                    "Mogelijk myocardinfarct"
                ],
                [
                    "Mola destruens"
                ],
                [
                    "Molazwangerschap"
                ],
                [
                    "Mondbodem carcinoom"
                ],
                [
                    "Mono-ostotische fibrodysplasie"
                ],
                [
                    "Monoclonale B-cel lymfocytose"
                ],
                [
                    "Mononeuropathie"
                ],
                [
                    "Mononucleosis infectiosa"
                ],
                [
                    "Monteggia-fractuur"
                ],
                [
                    "Morbilli"
                ],
                [
                    "Motiliteitsstoornis van de maag"
                ],
                [
                    "Mouches volantes"
                ],
                [
                    "Mucositis"
                ],
                [
                    "Multi-infarct syndroom"
                ],
                [
                    "Multi-orgaanfalen"
                ],
                [
                    "Multifactorieelbepaald vallen"
                ],
                [
                    "Multipel drugsgebruik"
                ],
                [
                    "Multipel myeloom nno"
                ],
                [
                    "Multipel myeloom relapse"
                ],
                [
                    "Multipel myeloom stadium I"
                ],
                [
                    "Multipel myeloom stadium I a"
                ],
                [
                    "Multipel myeloom stadium I b"
                ],
                [
                    "Multipel myeloom stadium II a"
                ],
                [
                    "Multipel myeloom stadium II b"
                ],
                [
                    "Multipel myeloom stadium III a"
                ],
                [
                    "Multipel myeloom stadium III b"
                ],
                [
                    "Multipele lacunaire infarcten"
                ],
                [
                    "Multipele ribfracturen"
                ],
                [
                    "Multipele sclerose (MS)"
                ],
                [
                    "Multisysteematrofie"
                ],
                [
                    "Myalgieлn"
                ],
                [
                    "Myasthenia gravis"
                ],
                [
                    "Mydriasis"
                ],
                [
                    "Myelitis"
                ],
                [
                    "Myelitis transversum"
                ],
                [
                    "Myelo-monocyten leukemie"
                ],
                [
                    "Myelodysplastisch syndroom nno"
                ],
                [
                    "Myelofibrose"
                ],
                [
                    "Myelosclerose met myeloide metaplasie"
                ],
                [
                    "Myocardinfarct"
                ],
                [
                    "Myocardinfarct met onbekende localisatie"
                ],
                [
                    "Myocarditis"
                ],
                [
                    "Myocardscintigrafie met persantin : irreversibel d"
                ],
                [
                    "Myocardscintigrafie met persantin: negatief"
                ],
                [
                    "Myocardscintigrafie met persantin: positief"
                ],
                [
                    "Myocardscintigrafie:"
                ],
                [
                    "Myocardscintigrafie: afwijkend bij LBTB"
                ],
                [
                    "Myocardscintigrafie: dubieus een irreversibel perf"
                ],
                [
                    "Myocardscintigrafie: dubieuze ischaemie"
                ],
                [
                    "Myocardscintigrafie: ernstige ischemie"
                ],
                [
                    "Myocardscintigrafie: geen significante ischemie"
                ],
                [
                    "Myocardscintigrafie: geen tekenen van ischemie"
                ],
                [
                    "Myocardscintigrafie: geringe ischemie"
                ],
                [
                    "Myocardscintigrafie: irreversibel defect"
                ],
                [
                    "Myocardscintigrafie: irreversibel defect met ernst"
                ],
                [
                    "Myocardscintigrafie: irreversibel defect met gerin"
                ],
                [
                    "Myocardscintigrafie: irreversibel defect met matig"
                ],
                [
                    "Myocardscintigrafie: irreversibel defekt met minim"
                ],
                [
                    "Myocardscintigrafie: lichte tot matige ischemie"
                ],
                [
                    "Myocardscintigrafie: matige ischemie"
                ],
                [
                    "Myocardscintigrafie: minimale ischemie"
                ],
                [
                    "Myocardscintigrafie: normaal"
                ],
                [
                    "Myoclonieлn"
                ],
                [
                    "Myofasciale pijn"
                ],
                [
                    "Myoomenucleatie"
                ],
                [
                    "Myopathie nemaline"
                ],
                [
                    "Myope papil"
                ],
                [
                    "Myxoom van de linker boezem"
                ],
                [
                    "Myxoom van de mitralisklep"
                ],
                [
                    "Myxoom van de rechter boezem"
                ],
                [
                    "N IX"
                ],
                [
                    "N V - neuralgie"
                ],
                [
                    "N V - neuralgie symptomatisch"
                ],
                [
                    "N intermedius"
                ],
                [
                    "N. facialis parese"
                ],
                [
                    "N. laryngeus sup"
                ],
                [
                    "N. nasociliaris"
                ],
                [
                    "N. occipitalis"
                ],
                [
                    "N. supraorbitalis"
                ],
                [
                    "NSAID-gastropathie"
                ],
                [
                    "Nabloeding pacemakerpocket"
                ],
                [
                    "Nachtelijke angina pectoris"
                ],
                [
                    "Naevus pigmentosus"
                ],
                [
                    "Nagel-patella syndroom"
                ],
                [
                    "Narcolepsie"
                ],
                [
                    "Navelbreuk"
                ],
                [
                    "Navelbreukoperatie"
                ],
                [
                    "Necrobiosis lipoidica diabeticorum"
                ],
                [
                    "Necrotomie"
                ],
                [
                    "Nefrectomie"
                ],
                [
                    "Nefrectomie (partieel)"
                ],
                [
                    "Nefrectomie"
                ],
                [
                    "Nefro-ureterectomie"
                ],
                [
                    "Nefrocalcinosis"
                ],
                [
                    "Nefrogene (niet renovasculaire) hypertensie"
                ],
                [
                    "Nefrogene diabetes insipidus"
                ],
                [
                    "Nefrolithiasis"
                ],
                [
                    "Nefrolithotomie"
                ],
                [
                    "Nefropexie"
                ],
                [
                    "Nefrosclerose"
                ],
                [
                    "Nefrostomie"
                ],
                [
                    "Nefrotisch syndroom n.n.o"
                ],
                [
                    "Nek-tong syndroom"
                ],
                [
                    "Neoimplantatie ureter"
                ],
                [
                    "Nervositas"
                ],
                [
                    "Netelroos"
                ],
                [
                    "Netvliesloslating (ablatio retinae)"
                ],
                [
                    "Netvliesloslatingsoperatie"
                ],
                [
                    "Neuralgie"
                ],
                [
                    "Neurodermitis"
                ],
                [
                    "Neurofibromatose"
                ],
                [
                    "Neurogene claudicatio"
                ],
                [
                    "Neuroom"
                ],
                [
                    "Neuropathie"
                ],
                [
                    "Neuropsychiatrische symptomen passend bij dementie"
                ],
                [
                    "Neuroretinitis"
                ],
                [
                    "Neurorrafie (verschillende nervi)"
                ],
                [
                    "Neurose"
                ],
                [
                    "Neuscorrectie"
                ],
                [
                    "Neusfractuur"
                ],
                [
                    "Neusoperatie"
                ],
                [
                    "Neuspoliep"
                ],
                [
                    "Neusseptumcorrectie"
                ],
                [
                    "Nicotineverslaving"
                ],
                [
                    "Nier- en pancreastransplantatie"
                ],
                [
                    "Nierarteriestenose"
                ],
                [
                    "Nierarteriestenose links"
                ],
                [
                    "Nierarteriestenose links"
                ],
                [
                    "Nierarteriestenose rechts"
                ],
                [
                    "Nierarteriestenose rechts"
                ],
                [
                    "Nierbekkencarcinoom (urotheelcelcarcinoom van het"
                ],
                [
                    "Nierbekkenplastiek"
                ],
                [
                    "Nierbiopsie"
                ],
                [
                    "Niercelcarcinoom"
                ],
                [
                    "Niercontusie"
                ],
                [
                    "Niercyste"
                ],
                [
                    "Nierdonor"
                ],
                [
                    "Nierfunctiestoornis"
                ],
                [
                    "Nierinfarct"
                ],
                [
                    "Nierinsufficientie obv chemotherapie"
                ],
                [
                    "Niersteen"
                ],
                [
                    "Niertransplantatie"
                ],
                [
                    "Niertuberculose"
                ],
                [
                    "Niertumor"
                ],
                [
                    "Niet gelukte PCI"
                ],
                [
                    "Niet kleincellig longcarcinoom"
                ],
                [
                    "Niet-kleincellige longcarcinoom recidief"
                ],
                [
                    "Nieuwe dagelijkse persisterende hoofdpijn"
                ],
                [
                    "Nissen-fundoplastiek"
                ],
                [
                    "Nissen-fundoplicatie"
                ],
                [
                    "Nno Hodgkin lymfoom"
                ],
                [
                    "Nocardiosis"
                ],
                [
                    "Nodulair scleroserend Hodgkin lymfoom"
                ],
                [
                    "Non Hodgkin lymfoom extra-nodaal"
                ],
                [
                    "Non Hodgkin lymfoom nno"
                ],
                [
                    "Non Hodgkin niet te classificeren"
                ],
                [
                    "Non-Hodgkin lymfoom T-cel type"
                ],
                [
                    "Non-Hodgkin lymfoom maag intermediair"
                ],
                [
                    "Non-Hodgkin lymfoom maag laaggradig"
                ],
                [
                    "Non-Hodgkin lymfoom palatum"
                ],
                [
                    "Non-Hodgkin lymfoom schildklier"
                ],
                [
                    "Non-Hodgkin lymfoom vd maag"
                ],
                [
                    "Non-cardiac chestpain (NCCP)"
                ],
                [
                    "Non-compliance"
                ],
                [
                    "Nonalcoholische steatohepatitis (NASH)"
                ],
                [
                    "Normal pressure hydrocephalus"
                ],
                [
                    "Normale coronairarterien"
                ],
                [
                    "Normale klepfunctie"
                ],
                [
                    "Nystagmus"
                ],
                [
                    "Observatie wegens thoracale klachten"
                ],
                [
                    "Obstetrische cholestase ( intrahepatische cholesta"
                ],
                [
                    "Obstipatie"
                ],
                [
                    "Obstructie tgv compressie vd oesofagus"
                ],
                [
                    "Obstructie van de slokdarm"
                ],
                [
                    "Obstructie vd galweg nno"
                ],
                [
                    "Obstructie-ileus"
                ],
                [
                    "Obstructie-ileus t.g.v. streng"
                ],
                [
                    "Obstructie-ileus tgv coprostase"
                ],
                [
                    "Obstructie-ileus tgv galsteen"
                ],
                [
                    "Obstructie-ileus tgv invaginatie"
                ],
                [
                    "Obstructie-ileus tgv volvulus"
                ],
                [
                    "Obstructie-ileus"
                ],
                [
                    "Obstructief slaapapneu syndroom (OSAS)"
                ],
                [
                    "Occipitalis"
                ],
                [
                    "Occlusie aorta"
                ],
                [
                    "Occlusie arteria centralis retinae"
                ],
                [
                    "Occlusie shunt"
                ],
                [
                    "Occlusie van een coronaire graft"
                ],
                [
                    "Oculomotoriusparese"
                ],
                [
                    "Oedeem"
                ],
                [
                    "Oesofaguscarcinoom"
                ],
                [
                    "Oesofaguscarcinoom cardio-oesofagiale overgang"
                ],
                [
                    "Oesofagusdivertikel"
                ],
                [
                    "Oesofagusresectie met buismaagreconstructie"
                ],
                [
                    "Oesofagusvarices"
                ],
                [
                    "Olecranon fractuur"
                ],
                [
                    "Oligozoцspermie"
                ],
                [
                    "Oncocytoom van de hypofyse"
                ],
                [
                    "Ondergronds mijnwerker"
                ],
                [
                    "Onderkoelingstrauma"
                ],
                [
                    "Ondervoeding"
                ],
                [
                    "Ongedifferentiлerd somatoforme stoornis"
                ],
                [
                    "Ongewenste subfertiliteit"
                ],
                [
                    "Onychomycose"
                ],
                [
                    "Ooginfarct"
                ],
                [
                    "Ooglidcorrectie"
                ],
                [
                    "Oogoperatie"
                ],
                [
                    "Oogprothese-plaatsing"
                ],
                [
                    "Ooroperatie"
                ],
                [
                    "Open boek fractuur"
                ],
                [
                    "Open foramen ovale"
                ],
                [
                    "Open fractuur"
                ],
                [
                    "Open thoraxwond"
                ],
                [
                    "Operatie"
                ],
                [
                    "Operatie arteria femoralis links"
                ],
                [
                    "Operatie arteria femoralis rechts"
                ],
                [
                    "Operatie arteria renalis rechts"
                ],
                [
                    "Operatie cerebrale vaatafwijkingen"
                ],
                [
                    "Operatie ivm extra-uterine graviditeit"
                ],
                [
                    "Operatie van de arteria iliaca links"
                ],
                [
                    "Operatie van de arteria iliaca rechts"
                ],
                [
                    "Operatie volgens Maze"
                ],
                [
                    "Operatie voor congenitaal hartvitium"
                ],
                [
                    "Operatie voor stressincontinentie"
                ],
                [
                    "Operatie wegens cyste van Bartholin"
                ],
                [
                    "Operatie wegens een myxoom"
                ],
                [
                    "Operatie wegens pylospasme"
                ],
                [
                    "Operatie wegens ruptuur linker ventrikel"
                ],
                [
                    "Operatie wegens supravalv. aortastenose"
                ],
                [
                    "Operatie wegens ventrikelseptumdefekt"
                ],
                [
                    "Operatieve repositionering PD-catheter"
                ],
                [
                    "Ophthalmopleg migraine"
                ],
                [
                    "Opname"
                ],
                [
                    "Opticusneuropathie"
                ],
                [
                    "Orbitafractuur"
                ],
                [
                    "Orchidectomie"
                ],
                [
                    "Orchidopexie"
                ],
                [
                    "Orchitis"
                ],
                [
                    "Organisch psychosyndroom"
                ],
                [
                    "Orthostatische hypotensie"
                ],
                [
                    "Os coccygisfractuur"
                ],
                [
                    "Os pubisfractuur"
                ],
                [
                    "Os sacrumfractuur"
                ],
                [
                    "Osteochondrose"
                ],
                [
                    "Osteomyelitis"
                ],
                [
                    "Osteopenie"
                ],
                [
                    "Osteopetrose"
                ],
                [
                    "Osteoporose door hypogonadisme"
                ],
                [
                    "Osteotomie"
                ],
                [
                    "Otitis"
                ],
                [
                    "Ovariumcarcinoom"
                ],
                [
                    "Ovariumcarcinoom i c"
                ],
                [
                    "Ovariumcarcinoom progressie"
                ],
                [
                    "Ovariumcarcinoom stadium II"
                ],
                [
                    "Ovariumcarcinoom stadium III"
                ],
                [
                    "Ovariumcarcinoom stadium IV"
                ],
                [
                    "Ovariumcyste"
                ],
                [
                    "Ovariлctomie"
                ],
                [
                    "Overhechten ulcus"
                ],
                [
                    "Overlapsyndroom"
                ],
                [
                    "PCI"
                ],
                [
                    "PCI met stentplaatsing"
                ],
                [
                    "PCI van de D"
                ],
                [
                    "PCI van de LAD"
                ],
                [
                    "PCI van de RCA"
                ],
                [
                    "PCI van de RCX"
                ],
                [
                    "PCI van de hoofdstam"
                ],
                [
                    "PCI van een bypass"
                ],
                [
                    "PEG-catheter"
                ],
                [
                    "PNL (Percutane Nefro Lithotrypsie)"
                ],
                [
                    "PTA shunt"
                ],
                [
                    "PTCA"
                ],
                [
                    "Pacemaker"
                ],
                [
                    "Pacemaker controle"
                ],
                [
                    "Pacemaker implantatie"
                ],
                [
                    "Pacemaker implantatie"
                ],
                [
                    "Pacemaker implantatie"
                ],
                [
                    "Pacemaker implantatie"
                ],
                [
                    "Pacemaker implantatie"
                ],
                [
                    "Pacemaker infectie"
                ],
                [
                    "Pacemaker reimplantatie"
                ],
                [
                    "Pacemaker verwijdering"
                ],
                [
                    "Pacemaker-implantatie"
                ],
                [
                    "Pacemaker-syndroom"
                ],
                [
                    "Pacemakerlead dysfunctie"
                ],
                [
                    "Pacemakerlead repositie"
                ],
                [
                    "Pacemakerlead verwijdering"
                ],
                [
                    "Pacemakerlead wisseling"
                ],
                [
                    "Pacemakerwisseling"
                ],
                [
                    "Palatumplastiek"
                ],
                [
                    "Palpitaties"
                ],
                [
                    "Panaritium"
                ],
                [
                    "Pancreas divisum"
                ],
                [
                    "Pancreascarcinoom"
                ],
                [
                    "Pancreascyste drainage"
                ],
                [
                    "Pancreaskopcarcinoom"
                ],
                [
                    "Pancreastransplantatie"
                ],
                [
                    "Pancreatico-jejunostomie vlgs Puestov"
                ],
                [
                    "Pancytopenie"
                ],
                [
                    "Panhypopituitarisme"
                ],
                [
                    "Panophthalmitis"
                ],
                [
                    "Panproctocolectomie met ileoanale pouch"
                ],
                [
                    "Papilanomalie"
                ],
                [
                    "Papillair schildkliercarcinoom"
                ],
                [
                    "Papilnecrose"
                ],
                [
                    "Papiloedeem"
                ],
                [
                    "Paracentesis"
                ],
                [
                    "Paraganglioom"
                ],
                [
                    "Paraneoplastische gewrichtsklachten"
                ],
                [
                    "Parapemphigus"
                ],
                [
                    "Paraplegie"
                ],
                [
                    "Paraproteпnemie van onbekende betekenis (MGUS)"
                ],
                [
                    "Parapsoriasis"
                ],
                [
                    "Parathyreoпdectomie"
                ],
                [
                    "Paravalvulaire lekkage mitralisklep geopereerd"
                ],
                [
                    "Paravalvulaire lekkage mitralisklepprothese"
                ],
                [
                    "Parese"
                ],
                [
                    "Paresthesie"
                ],
                [
                    "Paresthesieлn"
                ],
                [
                    "Parkinson dementie"
                ],
                [
                    "Parkinsonisme"
                ],
                [
                    "Parkinsonplussyndroom"
                ],
                [
                    "Parodontitis"
                ],
                [
                    "Paronychia"
                ],
                [
                    "Parotiscarcinoom"
                ],
                [
                    "Parotisoperatie"
                ],
                [
                    "Parotiszwelling"
                ],
                [
                    "Parotitis"
                ],
                [
                    "Parotitis epidemica (bof)"
                ],
                [
                    "Paroxysmaal atriumfibrilleren"
                ],
                [
                    "Paroxysmale atriale tachycardie"
                ],
                [
                    "Paroxysmale atriumflutter"
                ],
                [
                    "Partiлle CYP11b1- (11-oxygenase)deficiлntie"
                ],
                [
                    "Partiлle CYP21a2- (21-oxygenase)deficiлntie"
                ],
                [
                    "Partiлle blaasresectie"
                ],
                [
                    "Partiлle leverresectie"
                ],
                [
                    "Partiлle maagresectie"
                ],
                [
                    "Partiлle ovariлctomie"
                ],
                [
                    "Partiлle pancreatectomie"
                ],
                [
                    "Partus"
                ],
                [
                    "Partus immaturus"
                ],
                [
                    "Partus praematurus"
                ],
                [
                    "Passagere 2e graads AV-blok"
                ],
                [
                    "Passagere AV-blok"
                ],
                [
                    "Patellafractuur"
                ],
                [
                    "Patellaluxatie"
                ],
                [
                    "Patellectomie"
                ],
                [
                    "Pediculosis capitis"
                ],
                [
                    "Pediculosis corporis"
                ],
                [
                    "Pediculosis pubis"
                ],
                [
                    "Peesreconstructie (verschillende vingers re of li)"
                ],
                [
                    "Peesschede operatie"
                ],
                [
                    "Peestranspositie (vershillende mogelijkheden)"
                ],
                [
                    "Pelvic inflammatory disease"
                ],
                [
                    "Pemphigus"
                ],
                [
                    "Penetrerend abdominaal trauma"
                ],
                [
                    "Peniscarcinoom"
                ],
                [
                    "Penisplicatuur"
                ],
                [
                    "Pentrerend thoraxtrauma"
                ],
                [
                    "Peptische stenose vd oesofagus"
                ],
                [
                    "Percutane transluminale angioplastiek (PTA)"
                ],
                [
                    "Percutane transmyocardiale laserbehandeling"
                ],
                [
                    "Percutane valvoplastiek pulmonaalklep"
                ],
                [
                    "Percutane valvuloplastiek aortaklep"
                ],
                [
                    "Percutane valvuloplastiek mitraalklep"
                ],
                [
                    "Perforatie overhechten"
                ],
                [
                    "Perfusiescintigram"
                ],
                [
                    "Peri-anaal abces"
                ],
                [
                    "Perianaal abces incisie"
                ],
                [
                    "Perianale fistel operatie"
                ],
                [
                    "Periarthritis humeroscapularis"
                ],
                [
                    "Pericardcyste"
                ],
                [
                    "Pericarddrainage"
                ],
                [
                    "Pericardeffusie"
                ],
                [
                    "Pericardiectomie"
                ],
                [
                    "Pericarditis"
                ],
                [
                    "Pericarditis carcinomatosa"
                ],
                [
                    "Pericarditis constrictiva"
                ],
                [
                    "Pericardpunctie"
                ],
                [
                    "Pericardtamponade"
                ],
                [
                    "Perifeer neuropathische pijn"
                ],
                [
                    "Perifeer neuropathische pijn"
                ],
                [
                    "Perifeer reuscelgranuloom"
                ],
                [
                    "Perifeer vaatlijden"
                ],
                [
                    "Perifere arteriosclerose"
                ],
                [
                    "Perifere embolie"
                ],
                [
                    "Perifere facialisparese"
                ],
                [
                    "Perifere pulmonaalstenosen"
                ],
                [
                    "Perifere vaatoperatie"
                ],
                [
                    "Perifere zenuwpijn"
                ],
                [
                    "Perimyocarditis"
                ],
                [
                    "Perineale pijn"
                ],
                [
                    "Periodic Limb Movement Disorder (PMLD)"
                ],
                [
                    "Periodiek syndroom op kinderleeftijd"
                ],
                [
                    "Peritonitis bij peritoneale dialyse"
                ],
                [
                    "Peritonitis carcinomatosa"
                ],
                [
                    "Permanent boezemfibrilleren"
                ],
                [
                    "Pernicieuze anemie"
                ],
                [
                    "Peroneus parese"
                ],
                [
                    "Peroperatieve transmyocardiale laserbehandeling"
                ],
                [
                    "Persist. aura zonder HP"
                ],
                [
                    "Persist. aura zonder hp"
                ],
                [
                    "Persistent perineal sinus"
                ],
                [
                    "Persisterend atriumfibrilleren"
                ],
                [
                    "Persisterende micro-albuminurie"
                ],
                [
                    "Persisterende proteпnurie"
                ],
                [
                    "Persisterende vena cava superior links"
                ],
                [
                    "Persoonlijkheidhsstoornis cluster A"
                ],
                [
                    "Persoonlijkheidsstoornis nno"
                ],
                [
                    "Pertrochantere femurfractuur"
                ],
                [
                    "Pertussis (kinkhoest)"
                ],
                [
                    "Phimosis"
                ],
                [
                    "Pickwick-syndroom"
                ],
                [
                    "Pijn bij maligniteit"
                ],
                [
                    "Pijn bij maligniteit"
                ],
                [
                    "Pijn op de borst"
                ],
                [
                    "Pilon-tibiale-fractuur"
                ],
                [
                    "Pityriasis rosea"
                ],
                [
                    "Pityriasis versicolor"
                ],
                [
                    "Plaatsing CAPD-catheter"
                ],
                [
                    "Plaatsing PD-catheter"
                ],
                [
                    "Plaatsing TVT-bandje (anti-incontinentie ingreep)"
                ],
                [
                    "Plaatsing dialysecatheter"
                ],
                [
                    "Plaatsing dubbel-j-catheter in ureter"
                ],
                [
                    "Plaatsing galwegstent"
                ],
                [
                    "Plaatsing pancreasstent"
                ],
                [
                    "Plasma renine-aldosteron test"
                ],
                [
                    "Plasmacelleukemie"
                ],
                [
                    "Plasmaferese"
                ],
                [
                    "Platvoeten"
                ],
                [
                    "Platzbauch"
                ],
                [
                    "Plaveiselcelcarcinoom van de huid"
                ],
                [
                    "Plaveiselcelcarcinoom van de oesofagus"
                ],
                [
                    "Pleuraverdikking"
                ],
                [
                    "Pleuravocht"
                ],
                [
                    "Pleuritis"
                ],
                [
                    "Pleurodese"
                ],
                [
                    "Pleuropericarditis"
                ],
                [
                    "Plexus brachialis neuropathie"
                ],
                [
                    "Pneumaturie"
                ],
                [
                    "Pneumectomie"
                ],
                [
                    "Pneumocystis carinii pneumonie"
                ],
                [
                    "Pneumodilatatie"
                ],
                [
                    "Pneumonectomie"
                ],
                [
                    "Pneumonie"
                ],
                [
                    "Pneumothorax"
                ],
                [
                    "Poliep"
                ],
                [
                    "Poliep van de papil van Vater"
                ],
                [
                    "Poliepverwijdering chirugisch"
                ],
                [
                    "Poliepverwijdering endoscopisch"
                ],
                [
                    "Poliomyelitis"
                ],
                [
                    "Polsfractuur"
                ],
                [
                    "Polsoperatie"
                ],
                [
                    "Polyarteriitis nodosa (PAN)"
                ],
                [
                    "Polyarthritis"
                ],
                [
                    "Polyarthrosis"
                ],
                [
                    "Polyclonaal verhoogd gamma-globuline"
                ],
                [
                    "Polycysteus-ovariumsyndroom (PCOS)"
                ],
                [
                    "Polycystische leverziekte"
                ],
                [
                    "Polycythaemie"
                ],
                [
                    "Polycythemia vera"
                ],
                [
                    "Polyglandulaire auto-immune endocrinopathie type 2"
                ],
                [
                    "Polymyalgia rheumatica"
                ],
                [
                    "Polymyelitis"
                ],
                [
                    "Polyneuropathie"
                ],
                [
                    "Polyneuropathie door geneesmiddelengebruik"
                ],
                [
                    "Polyostotische fibrodysplasie"
                ],
                [
                    "Polyposis coli"
                ],
                [
                    "Polyposis coli gen-dragerschap"
                ],
                [
                    "Polyposis nasi"
                ],
                [
                    "Porphyria cutanea tarda"
                ],
                [
                    "Portale hypertensie"
                ],
                [
                    "Portale hypertensie met hypersplenisme"
                ],
                [
                    "Portio-amputatie"
                ],
                [
                    "Portioamputatie"
                ],
                [
                    "Positieve ANF"
                ],
                [
                    "Positieve rheuma serologie"
                ],
                [
                    "Post-infarct angina pectoris"
                ],
                [
                    "Post-thoracotomie pijn"
                ],
                [
                    "Posterieure schouder (glenohumeraal) luxatie"
                ],
                [
                    "Posterior myocardinfarct"
                ],
                [
                    "Posterolateraal myocardinfarct"
                ],
                [
                    "Postherpetische neuralgie"
                ],
                [
                    "Postmenopauzale osteoporose"
                ],
                [
                    "Postoperatieve hypothyreoпdie"
                ],
                [
                    "Postprandiale hypotensie"
                ],
                [
                    "Postpunctionele hoofdpijn"
                ],
                [
                    "Posttraumatisch stresssyndroom (PTSS)"
                ],
                [
                    "Postvagotomiesyndroom"
                ],
                [
                    "Pouch - resectie"
                ],
                [
                    "Pouchitis"
                ],
                [
                    "Pre-excitatie"
                ],
                [
                    "Prednison"
                ],
                [
                    "Preproliferatieve diabetische retinopathie"
                ],
                [
                    "Prerenale nierinsufficiлntie"
                ],
                [
                    "Presbyacusis"
                ],
                [
                    "Presbyfonie"
                ],
                [
                    "Presbyopie"
                ],
                [
                    "Priapisme"
                ],
                [
                    "Prikkelhoest"
                ],
                [
                    "Primair hypogonadisme"
                ],
                [
                    "Primair mediastnaal (thymus) B-cel lymfoom"
                ],
                [
                    "Primair myxoedeem"
                ],
                [
                    "Primair progressieve afasie"
                ],
                [
                    "Primair ventrikelfibrilleren"
                ],
                [
                    "Primaire biliaire cirrose (PBC)"
                ],
                [
                    "Primaire hemochromatose"
                ],
                [
                    "Primaire hersentumor"
                ],
                [
                    "Primaire hyperparathyreoпdie"
                ],
                [
                    "Primaire hypoparathyreoпdie"
                ],
                [
                    "Primaire hypothyreoпdie e.c.i."
                ],
                [
                    "Primaire scleroserende cholangitis (PSC)"
                ],
                [
                    "Proctalgia fugax"
                ],
                [
                    "Proctectomie"
                ],
                [
                    "Proctitis"
                ],
                [
                    "Proctocolectomie met ileostoma"
                ],
                [
                    "Proeflaparotomie"
                ],
                [
                    "Progressieve afasie"
                ],
                [
                    "Progressieve angina pectoris"
                ],
                [
                    "Progressive supranuclear palsy"
                ],
                [
                    "Prolactinoom"
                ],
                [
                    "Prolapsplastiek"
                ],
                [
                    "Proliferatieve diabetische retinopathie"
                ],
                [
                    "Proliferatieve glomerulonefritis n.n.o."
                ],
                [
                    "Prostaatadenectomie"
                ],
                [
                    "Prostaatcarcinoom"
                ],
                [
                    "Prostaatcarcinoom ossaal en lymfogeen gemetastasee"
                ],
                [
                    "Prostaatcarcinoom ossaal gemetastaseerd"
                ],
                [
                    "Prostatectomie radicale"
                ],
                [
                    "Prostatitis"
                ],
                [
                    "Prostatitis"
                ],
                [
                    "Prostratodynie"
                ],
                [
                    "Proteine C-deficiлntie"
                ],
                [
                    "Proteine S-deficiлntie"
                ],
                [
                    "Proteпnurie"
                ],
                [
                    "Protrombine variant"
                ],
                [
                    "Proximale humerusfractuur"
                ],
                [
                    "Proximale tibiafractuur"
                ],
                [
                    "Pruritus"
                ],
                [
                    "Pseudo-jicht"
                ],
                [
                    "Pseudocyste van het pancreas"
                ],
                [
                    "Pseudogynaecomastie"
                ],
                [
                    "Pseudohypoparathyreoпdie"
                ],
                [
                    "Pseudomelanosis coli"
                ],
                [
                    "Pseudomembraneuze colitis"
                ],
                [
                    "Pseudosyndroom van Cushing door alcohol"
                ],
                [
                    "Psittacose"
                ],
                [
                    "Psoriasis"
                ],
                [
                    "Psychiatrische opname zonder bekende klassificeren"
                ],
                [
                    "Psychiatrische stoornis"
                ],
                [
                    "Psychofarmacaverslaving"
                ],
                [
                    "Psychogene polydipsie"
                ],
                [
                    "Psychose"
                ],
                [
                    "Ptosis"
                ],
                [
                    "Ptosis nier"
                ],
                [
                    "Pubertas praecox"
                ],
                [
                    "Pulmonaalklepinsufficiлntie"
                ],
                [
                    "Pulmonaalklepstenose"
                ],
                [
                    "Pulmonaalvenenisolatie"
                ],
                [
                    "Pulmonale hypertensie"
                ],
                [
                    "Pulmonalisatresie"
                ],
                [
                    "Pulmonalisklep commissurotomie"
                ],
                [
                    "Pulmonalisklepstenose"
                ],
                [
                    "Pyelitis"
                ],
                [
                    "Pyelo-ureteraal dubbelsysteem"
                ],
                [
                    "Pyelo-ureterale overgangsstenose"
                ],
                [
                    "Pyelonefritis"
                ],
                [
                    "Pylorusstenose-operatie"
                ],
                [
                    "Pyoderma gangrenosum"
                ],
                [
                    "Pyramidaal syndroom"
                ],
                [
                    "Pyridoxinedeficiлntie"
                ],
                [
                    "QT-tijd verlenging"
                ],
                [
                    "Quincke-oedeem"
                ],
                [
                    "REM sleep behaviour disorder"
                ],
                [
                    "RF-ablatie"
                ],
                [
                    "Rachitis"
                ],
                [
                    "Radiatie-oesofagitis"
                ],
                [
                    "Radiatiepneumonitis"
                ],
                [
                    "Radiatieproctitis"
                ],
                [
                    "Radiculair syndroom"
                ],
                [
                    "Radiculopathie"
                ],
                [
                    "Radiofrequente zenuwbehandeling"
                ],
                [
                    "Radiotherapie"
                ],
                [
                    "Radiusfractuur"
                ],
                [
                    "Radiushalsfractuur"
                ],
                [
                    "Radiuskopfractuur"
                ],
                [
                    "Rapidly progressive glomerulonephritis (RPGN)"
                ],
                [
                    "Re-CABG"
                ],
                [
                    "Reactieve depressie"
                ],
                [
                    "Reactieve lymfadenopathie"
                ],
                [
                    "Reanimatie"
                ],
                [
                    "Reanimatie beleid"
                ],
                [
                    "Rechter bundeltakblok"
                ],
                [
                    "Rechter ventrikel hypertrofie"
                ],
                [
                    "Rechter ventrikel myocardinfarct"
                ],
                [
                    "Rechts decompensatio cordis"
                ],
                [
                    "Rechts en links decompensatie"
                ],
                [
                    "Rechtszijdig coloncarcinoom Dukes B"
                ],
                [
                    "Recidief NHL"
                ],
                [
                    "Recidief anterolateraal myocardinfarct"
                ],
                [
                    "Recidief anteroseptaal myocardinfarct"
                ],
                [
                    "Recidief anteroseptaal-lateraal myocardinfarct"
                ],
                [
                    "Recidief hodgkin lymfoom"
                ],
                [
                    "Recidief hyperthyreoпdie"
                ],
                [
                    "Recidief infero-postero-lateraal myocardinfarct"
                ],
                [
                    "Recidief inferolateraal myocardinfarct"
                ],
                [
                    "Recidief inferoposterior myocardinfarct"
                ],
                [
                    "Recidief lateraal myocardinfarct"
                ],
                [
                    "Recidief mammacarcinoom"
                ],
                [
                    "Recidief myocard"
                ],
                [
                    "Recidief nefrotisch syndroom"
                ],
                [
                    "Recidief onderwand en RV-myocardinfarct"
                ],
                [
                    "Recidief onderwandmyocardinfarct"
                ],
                [
                    "Recidief ovariumcarcinoom"
                ],
                [
                    "Recidief posterior myocardinfarct"
                ],
                [
                    "Recidief posterolateraal myocardinfarct"
                ],
                [
                    "Recidief voorwandmyocardinfarct"
                ],
                [
                    "Recidiverende urineweginfecties"
                ],
                [
                    "Recidiverende urineweginfecties nno"
                ],
                [
                    "Reconstructie (verschillende mogelijkheden)"
                ],
                [
                    "Reconstructie operatie"
                ],
                [
                    "Rectaal bloedverlies"
                ],
                [
                    "Rectocele"
                ],
                [
                    "Rectocele operatie"
                ],
                [
                    "Rectopexie"
                ],
                [
                    "Rectosigmoidcarcinoom Dukes B"
                ],
                [
                    "Rectosigmoidcarcinoom Dukes C"
                ],
                [
                    "Rectosigmoidcarcinoom Dukes D"
                ],
                [
                    "Rectovaginale fistel"
                ],
                [
                    "Rectumamputatie"
                ],
                [
                    "Rectumcarcinoom Dukes C"
                ],
                [
                    "Rectumcarcinoom Dukes D"
                ],
                [
                    "Rectumcarcinoom nno"
                ],
                [
                    "Rectumpoliep"
                ],
                [
                    "Rectumprolaps intussusceptie"
                ],
                [
                    "Redelijk contraherende linker ventrikel"
                ],
                [
                    "Reflexdystrofie"
                ],
                [
                    "Refluxklachten"
                ],
                [
                    "Refluxklachten zonder oesofagitis"
                ],
                [
                    "Refluxnefropathie"
                ],
                [
                    "Refluxoesofagitis graad A"
                ],
                [
                    "Refluxoesofagitis graad B"
                ],
                [
                    "Refluxoesofagitis graad C"
                ],
                [
                    "Refluxoesofagitis graad D"
                ],
                [
                    "Refractaire anemie"
                ],
                [
                    "Refractaire anemie (bm<5%"
                ],
                [
                    "Refractaire anemie met excess aan blasten (bm 5-20"
                ],
                [
                    "Refractaire anemie met excess aan blasten in trans"
                ],
                [
                    "Refractaire anemie met overmatig veel blasten"
                ],
                [
                    "Refractaire anemie met overmatig veel blasten in t"
                ],
                [
                    "Refractaire anemie met ringsideroblasten"
                ],
                [
                    "Refractaire anemie met ringsideroblasten (bm<5%"
                ],
                [
                    "Rejectiebehandeling"
                ],
                [
                    "Relapsing polychondritis"
                ],
                [
                    "Renale glucosurie"
                ],
                [
                    "Renale granulomatose van Wegener"
                ],
                [
                    "Renale tubulaire acidose"
                ],
                [
                    "Renovasculaire hypertensie"
                ],
                [
                    "Repetitive strain injury (RSI)"
                ],
                [
                    "Resectie"
                ],
                [
                    "Resectie neo-terminale ileum"
                ],
                [
                    "Resectie papil van Vater"
                ],
                [
                    "Resectie tumor"
                ],
                [
                    "Respiratoire insufficiлntie"
                ],
                [
                    "Restless legs"
                ],
                [
                    "Restrictieve cardiomyopathie"
                ],
                [
                    "Retentieblaas"
                ],
                [
                    "Retinabloeding"
                ],
                [
                    "Retinale migraine"
                ],
                [
                    "Retinitis pigmentosa"
                ],
                [
                    "Retinopathie"
                ],
                [
                    "Retroperitoneale fibrose"
                ],
                [
                    "Rett-syndroom"
                ],
                [
                    "Reumatoпde artritis (RA)"
                ],
                [
                    "Reuscel granuloom"
                ],
                [
                    "Reveal ® explantatie"
                ],
                [
                    "Reveal ® implantatie"
                ],
                [
                    "Reven van de sfincter ani"
                ],
                [
                    "Reversed Barton fractuur"
                ],
                [
                    "Rhabdomyolyse"
                ],
                [
                    "Rheumatische klepgebreken"
                ],
                [
                    "Rhinitis"
                ],
                [
                    "Rhinitis allergica"
                ],
                [
                    "Rhinitis vasomotorica"
                ],
                [
                    "Rhinophyma"
                ],
                [
                    "Rhizotomie"
                ],
                [
                    "Ribfractuur"
                ],
                [
                    "Ribresectie"
                ],
                [
                    "Rickettsiose"
                ],
                [
                    "Ritme chirurgie"
                ],
                [
                    "Rolando-fractuur"
                ],
                [
                    "Rosacea"
                ],
                [
                    "Rotator cuff letsel"
                ],
                [
                    "Rotator cuff syndroom"
                ],
                [
                    "Roux-Y reconstructie"
                ],
                [
                    "Rubella"
                ],
                [
                    "Rubeosis iridis"
                ],
                [
                    "Rugklachten"
                ],
                [
                    "Rugoperatie"
                ],
                [
                    "Ruptuur"
                ],
                [
                    "Ruptuur achterste kruisband"
                ],
                [
                    "Ruptuur linker ventrikel"
                ],
                [
                    "Ruptuur thoracale aorta"
                ],
                [
                    "Ruptuur trachea en bronchi"
                ],
                [
                    "Ruptuur voorste kruisband"
                ],
                [
                    "SUNCT/ SUMA"
                ],
                [
                    "Sacraal pijnsyndroom"
                ],
                [
                    "Sacro-ileitis"
                ],
                [
                    "Sacro-ilialgie"
                ],
                [
                    "Sacrumfractuur"
                ],
                [
                    "Salmonella enteritis"
                ],
                [
                    "Salmonella infect"
                ],
                [
                    "Sarcoom"
                ],
                [
                    "Sarcopenie"
                ],
                [
                    "Sarcoпdose"
                ],
                [
                    "Sarcoпdose hypofysesteel"
                ],
                [
                    "Scabies"
                ],
                [
                    "Scalenotomie"
                ],
                [
                    "Scaphoidfractuur"
                ],
                [
                    "Scapulafractuur"
                ],
                [
                    "Scarlatina"
                ],
                [
                    "Schaamlipcorrectie"
                ],
                [
                    "Schedelbasisfractuur"
                ],
                [
                    "Schedeloperatie"
                ],
                [
                    "Schedeltrauma"
                ],
                [
                    "Schildklieradenoom"
                ],
                [
                    "Schildkliercarcinoom nno"
                ],
                [
                    "Schildkliercyste"
                ],
                [
                    "Schildkliernodus"
                ],
                [
                    "Schildklieroperatie"
                ],
                [
                    "Schildklierziekte nno"
                ],
                [
                    "Schistosomiasis"
                ],
                [
                    "Schizofrenie"
                ],
                [
                    "Schizotypische persoonlijkheidsstoornis"
                ],
                [
                    "Schlinge-procedure (TOT)"
                ],
                [
                    "Schouderoperatie"
                ],
                [
                    "Schrompelnier"
                ],
                [
                    "Schwannoom"
                ],
                [
                    "Scleritis"
                ],
                [
                    "Sclerodermie"
                ],
                [
                    "Scoliose"
                ],
                [
                    "Screening wegens familiair voorkomen poliepen en/o"
                ],
                [
                    "Scrotaalbreuk"
                ],
                [
                    "Scrotaalbreukoperatie"
                ],
                [
                    "Sectio caesarea"
                ],
                [
                    "Secundair ventrikelfibrilleren"
                ],
                [
                    "Secundaire amennorroe"
                ],
                [
                    "Secundaire debulkingsoperatie"
                ],
                [
                    "Secundaire diabetes mellitus"
                ],
                [
                    "Secundaire gynaecomastie"
                ],
                [
                    "Secundaire hyperparathyreoпdie"
                ],
                [
                    "Secundaire hypertensie"
                ],
                [
                    "Secundaire hypothyreoпdie"
                ],
                [
                    "Secundaire osteoporose"
                ],
                [
                    "Secundaire polycytemie"
                ],
                [
                    "Secundaire polyneuropathie"
                ],
                [
                    "Seniele kolpitis"
                ],
                [
                    "Seniele osteoporose"
                ],
                [
                    "Sepsis"
                ],
                [
                    "Septische arthritis"
                ],
                [
                    "Seronegatieve spondylartropathie"
                ],
                [
                    "Serotoninesyndroom"
                ],
                [
                    "Serumziekte"
                ],
                [
                    "Sexueel overdraagbare aandoening (SOA)"
                ],
                [
                    "Sexuele hoofdpijn"
                ],
                [
                    "Shigella infectie"
                ],
                [
                    "Shirodkar cerclage"
                ],
                [
                    "Shock"
                ],
                [
                    "Short bowel syndrome"
                ],
                [
                    "Shuntoperatie"
                ],
                [
                    "Sialoadenitis"
                ],
                [
                    "Sick sinus syndroom"
                ],
                [
                    "Sigmoidcarcinoom"
                ],
                [
                    "Sigmoidresectie"
                ],
                [
                    "Sikkelcelcrisis"
                ],
                [
                    "Sikkelceltrait"
                ],
                [
                    "Silicose"
                ],
                [
                    "Silver-Russell-syndroom"
                ],
                [
                    "Sino-auriculair blok"
                ],
                [
                    "Sinus pilonidalis operatie"
                ],
                [
                    "Sinus thrombose"
                ],
                [
                    "Sinus venosus defekt"
                ],
                [
                    "Sinusbradycardie"
                ],
                [
                    "Sinusitis"
                ],
                [
                    "Sinusritme"
                ],
                [
                    "Sinustachycardie"
                ],
                [
                    "Skiduim/ulnair bandletsel MCP"
                ],
                [
                    "Slaap hoofdpijn"
                ],
                [
                    "Slaapapnoe-syndroom"
                ],
                [
                    "Slecht contraherende linker ventrikel"
                ],
                [
                    "Slecht contraherende rechter ventrikel"
                ],
                [
                    "Slecht funtionerend colostoma/ enterosoma"
                ],
                [
                    "Slechte functie van de coronaire stent"
                ],
                [
                    "Slechte funktie van LIMA-graft"
                ],
                [
                    "Slechte funktie van de coronaire bypass"
                ],
                [
                    "Slechtziendheid"
                ],
                [
                    "Slipped Nissen"
                ],
                [
                    "Slokdarm-echocardiografie:"
                ],
                [
                    "Slokdarmetsing"
                ],
                [
                    "Slokdarmvarices"
                ],
                [
                    "Sluiting atriumseptumdefect"
                ],
                [
                    "Sluiting atriumseptumdefect met device"
                ],
                [
                    "Sluiting septumdefect"
                ],
                [
                    "Sluiting vesico-vaginale fistel"
                ],
                [
                    "Smith fractuur"
                ],
                [
                    "Snijwond"
                ],
                [
                    "Solitair plasmocytoom"
                ],
                [
                    "Solitair rectumulcus"
                ],
                [
                    "Souffle cor"
                ],
                [
                    "Spanningshoofdpijn"
                ],
                [
                    "Spanningshoofdpijn met pericraniele tenderness"
                ],
                [
                    "Spanningshoofdpijn zonder pericraniele tenderness"
                ],
                [
                    "Spanningspneumothorax"
                ],
                [
                    "Spasme"
                ],
                [
                    "Spastisch bekkenbodemsyndroom"
                ],
                [
                    "Spastische spinaalparalyse"
                ],
                [
                    "Speekselklieroperatie"
                ],
                [
                    "Speekselkliersteenverwijdering"
                ],
                [
                    "Spermatocиle"
                ],
                [
                    "Spermatocиle-extirpatie"
                ],
                [
                    "Sphincter Oddi dysfunctie (spasme van de papil van"
                ],
                [
                    "Spina bifida occulta"
                ],
                [
                    "Spinale stenose"
                ],
                [
                    "Spinalioom"
                ],
                [
                    "Splenectomie"
                ],
                [
                    "Splenic lymphoma with villous lymphocytes"
                ],
                [
                    "Splenomegalie ECI"
                ],
                [
                    "Spondylartrose"
                ],
                [
                    "Spondylitis"
                ],
                [
                    "Spondylitis ankylopoetica (M. Bechterew)"
                ],
                [
                    "Spondylodese"
                ],
                [
                    "Spondylodiscitis"
                ],
                [
                    "Spondylolisthesis"
                ],
                [
                    "Spondylomyelitis"
                ],
                [
                    "Spontane bacteriлle peritonitis (SBP)"
                ],
                [
                    "Spoortje aortaklepinsufficiлntie"
                ],
                [
                    "Spoortje mitralisklepinsufficiлntie"
                ],
                [
                    "Spoortje tricuspidalisklepinsufficiлntie"
                ],
                [
                    "Sporad. hemipl. migraine"
                ],
                [
                    "Stabbing hoofdpijn (icepick"
                ],
                [
                    "Stafylokokkendrager"
                ],
                [
                    "Stamceltransplantatie"
                ],
                [
                    "Start orale diabetes medicatie"
                ],
                [
                    "Stase oesophagitis"
                ],
                [
                    "Status epilepticus"
                ],
                [
                    "Status migrainosus"
                ],
                [
                    "Status na carotisendoarteriectomie"
                ],
                [
                    "Status na stil myocardinfarct"
                ],
                [
                    "Status na sub- epiduraal hematoom"
                ],
                [
                    "Steatohepatitis"
                ],
                [
                    "Steatorrhoe"
                ],
                [
                    "Steatorrhoe t.g.v. pancreasinsufficientie"
                ],
                [
                    "Steatosis hepatis"
                ],
                [
                    "Stembandingreep"
                ],
                [
                    "Stenose"
                ],
                [
                    "Stenose arteria van de iliaca rechts"
                ],
                [
                    "Stenose in beide arteriae carotides"
                ],
                [
                    "Stenose in de coronaire bypass"
                ],
                [
                    "Stenose van de aorta abdominalis"
                ],
                [
                    "Stenose van de arteria femoralis links"
                ],
                [
                    "Stenose van de arteria femoralis rechts"
                ],
                [
                    "Stenose van de arteria iliaca links"
                ],
                [
                    "Stenose van de arteria subclavia links"
                ],
                [
                    "Stenose van de arteria subclavia rechts"
                ],
                [
                    "Stent arteria renalis links"
                ],
                [
                    "Stent arteria renalis rechts"
                ],
                [
                    "Stent in D"
                ],
                [
                    "Stent in LAD"
                ],
                [
                    "Stent in RCA"
                ],
                [
                    "Stent in RCx"
                ],
                [
                    "Stent in arteria pulmonalis tak"
                ],
                [
                    "Stent in coronaire bypass"
                ],
                [
                    "Stent in hoofdstam"
                ],
                [
                    "Stent plaatsing coronair"
                ],
                [
                    "Stentocclusie"
                ],
                [
                    "Stereotactische ingreep"
                ],
                [
                    "Sterilisatie"
                ],
                [
                    "Sternoclaviculaire dislocatie"
                ],
                [
                    "Sternumfractuur"
                ],
                [
                    "Sternumoperatie"
                ],
                [
                    "Stevens-Johnson-syndroom"
                ],
                [
                    "Stille thyreoпditis"
                ],
                [
                    "Stoma ingreep"
                ],
                [
                    "Stomatitis"
                ],
                [
                    "Stomp abdominaal trauma"
                ],
                [
                    "Stomp thoraxtrauma"
                ],
                [
                    "Strabismus"
                ],
                [
                    "Strabismusoperatie"
                ],
                [
                    "Strengileus"
                ],
                [
                    "Stressincontinentie"
                ],
                [
                    "Strictuurplastiek"
                ],
                [
                    "Stridor"
                ],
                [
                    "Stromacel tumor"
                ],
                [
                    "Strumectomie"
                ],
                [
                    "Stuwingsnefropathie"
                ],
                [
                    "Subacute thyreoпditis (de Quervain)"
                ],
                [
                    "Subacuut anteroseptaal myocardinfarct"
                ],
                [
                    "Subacuut inferolateraal myocardinfarct"
                ],
                [
                    "Subacuut inferoposterior myocardinfarct"
                ],
                [
                    "Subacuut lateraal myocardinfarct"
                ],
                [
                    "Subacuut myocardinfarct"
                ],
                [
                    "Subacuut onderwandmyocardinfarct"
                ],
                [
                    "Subacuut ongelokaliseerd myocardinfarct"
                ],
                [
                    "Subacuut posterior myocardinfarct"
                ],
                [
                    "Subacuut posterolateraal myocardinfarct"
                ],
                [
                    "Subacuut voorwandmyocardinfarct"
                ],
                [
                    "Subarachnoпdale bloeding"
                ],
                [
                    "Subarachnoпdale bloeding (SAB)"
                ],
                [
                    "Subclavian steal syndroom"
                ],
                [
                    "Subduraal haematoom"
                ],
                [
                    "Subfrenisch abces"
                ],
                [
                    "Subfrontale partiлle hypofysectomie"
                ],
                [
                    "Subileus"
                ],
                [
                    "Subpelvine stenose"
                ],
                [
                    "Subtotale colectomie"
                ],
                [
                    "Subtotale maagresectie"
                ],
                [
                    "Subtotale pancreatectomie"
                ],
                [
                    "Subtotale thyreoпdectomie"
                ],
                [
                    "Subtrochantere femurfractuur"
                ],
                [
                    "Subvalvulaire aortaklepstenose"
                ],
                [
                    "Succesvolle cardioversie wegens atriale tachycardi"
                ],
                [
                    "Succesvolle cardioversie wegens atriumfibrilleren"
                ],
                [
                    "Succesvolle cardioversie wegens atriumflutter"
                ],
                [
                    "Supernumeraire digiti"
                ],
                [
                    "Supracondylaire femurfractuur"
                ],
                [
                    "Supracondylaire humerusfractuur"
                ],
                [
                    "Supraorbitalis"
                ],
                [
                    "Suprapubische catheter"
                ],
                [
                    "Supravaginale uterusextirpatie"
                ],
                [
                    "Supravalvulaire aortaklepstenose"
                ],
                [
                    "Supraventriculaire tachycardie (SVT)"
                ],
                [
                    "Surmenage"
                ],
                [
                    "Sweetsyndroom"
                ],
                [
                    "Sympatectomie"
                ],
                [
                    "Sympathische reflexdystrofie"
                ],
                [
                    "Symphysiolysis"
                ],
                [
                    "Symptomatisch"
                ],
                [
                    "Syndactylie (verschillende mogelijkheden)"
                ],
                [
                    "Syndroom van Alport"
                ],
                [
                    "Syndroom van Angelman (happy puppet syndroom)"
                ],
                [
                    "Syndroom van Asperger"
                ],
                [
                    "Syndroom van Bloom"
                ],
                [
                    "Syndroom van Brugada"
                ],
                [
                    "Syndroom van Budd-Chiari"
                ],
                [
                    "Syndroom van Charles Bonnet"
                ],
                [
                    "Syndroom van Coffin-Lowry"
                ],
                [
                    "Syndroom van Cushing door bijnierschorsadenoom"
                ],
                [
                    "Syndroom van Down"
                ],
                [
                    "Syndroom van Ehlers-Danlos"
                ],
                [
                    "Syndroom van Eisenmenger"
                ],
                [
                    "Syndroom van Felty"
                ],
                [
                    "Syndroom van Gilbert"
                ],
                [
                    "Syndroom van Gitelman"
                ],
                [
                    "Syndroom van Goodpasture"
                ],
                [
                    "Syndroom van Guillain-Barrй"
                ],
                [
                    "Syndroom van Hermansky-Pudlak"
                ],
                [
                    "Syndroom van Horner"
                ],
                [
                    "Syndroom van Kallmann"
                ],
                [
                    "Syndroom van Klinefelter"
                ],
                [
                    "Syndroom van Leriche"
                ],
                [
                    "Syndroom van Marfan"
                ],
                [
                    "Syndroom van McCune-Albright"
                ],
                [
                    "Syndroom van Miculicz"
                ],
                [
                    "Syndroom van Noonan"
                ],
                [
                    "Syndroom van Prader-Willi"
                ],
                [
                    "Syndroom van Raynaud"
                ],
                [
                    "Syndroom van Sanfilippo"
                ],
                [
                    "Syndroom van Sheehan"
                ],
                [
                    "Syndroom van Turner"
                ],
                [
                    "Syndroom van inadequate secretie van antidiuretisc"
                ],
                [
                    "Synoviectomie flexoren"
                ],
                [
                    "Synoviectomie strekkers"
                ],
                [
                    "Synoviлctomie"
                ],
                [
                    "Syringomyelie"
                ],
                [
                    "Systemische mastocytose"
                ],
                [
                    "Systolic anterior motion van de voorste mitraalkle"
                ],
                [
                    "Systolisch hartfalen"
                ],
                [
                    "Systolische hypertensie"
                ],
                [
                    "TME (total mesorectal excision)"
                ],
                [
                    "TSH-producerend hypofyseadenoom"
                ],
                [
                    "TUR-blaastumor"
                ],
                [
                    "TUR-prostaat"
                ],
                [
                    "Tabaksvergiftiging"
                ],
                [
                    "Tachycardie"
                ],
                [
                    "Tachycardiomyopathie"
                ],
                [
                    "Takayasu arteriitis"
                ],
                [
                    "Talaire luxatie"
                ],
                [
                    "Talusfractuur"
                ],
                [
                    "Tamponade"
                ],
                [
                    "Tarsaliafractuur"
                ],
                [
                    "Te vroege menopauze"
                ],
                [
                    "Teenfractuur"
                ],
                [
                    "Teenoperatie"
                ],
                [
                    "Teleangiectasia macularis eruptive perstans"
                ],
                [
                    "Teleangiectasieen"
                ],
                [
                    "Telemetrische observatie"
                ],
                [
                    "Temperomandibulaire Dislocatie"
                ],
                [
                    "Temporomandibular joint (TMJ) syndrome"
                ],
                [
                    "Tendinitis"
                ],
                [
                    "Tendovaginitis"
                ],
                [
                    "Tendovaginitis stenosans (verschillende vingers)"
                ],
                [
                    "Tenolyse (verschillende pezen)"
                ],
                [
                    "Tenorrafie extensoren (verschillende mogelijkheden"
                ],
                [
                    "Tenorrafie flexoren (verschillende mogelijlheden)"
                ],
                [
                    "Tenosynovitis"
                ],
                [
                    "Tentamen suicide"
                ],
                [
                    "Teratoom"
                ],
                [
                    "Terminale nierinsufficiлntie"
                ],
                [
                    "Terminale pompfunctiestoornissen"
                ],
                [
                    "Tertiaire hyperparathyreoпdie"
                ],
                [
                    "Testisatrofie"
                ],
                [
                    "Testiscarcinoom"
                ],
                [
                    "Testiscarcinoom"
                ],
                [
                    "Tethered cord syndrome"
                ],
                [
                    "Tetralogie van Fallot"
                ],
                [
                    "Tetralogie van Fallot"
                ],
                [
                    "Thalassemie"
                ],
                [
                    "Thallium scintigram"
                ],
                [
                    "Thermo-ablatio endometrium"
                ],
                [
                    "Thoracaal pijnsyndroom"
                ],
                [
                    "Thoracaal pijnsyndroom"
                ],
                [
                    "Thoracaal pijnsyndroom"
                ],
                [
                    "Thoracaal pijnsyndroom"
                ],
                [
                    "Thoracale klachten eci"
                ],
                [
                    "Thoracale oesophagomyotomie"
                ],
                [
                    "Thoracale rugpijn"
                ],
                [
                    "Thoracale wervelfractuur"
                ],
                [
                    "Thoracic outlet syndroom"
                ],
                [
                    "Thoracoscopie"
                ],
                [
                    "Thoracotomie"
                ],
                [
                    "Thrombectomie"
                ],
                [
                    "Thromboangiitis obliterans"
                ],
                [
                    "Thrombopenie eci"
                ],
                [
                    "Thrombose"
                ],
                [
                    "Thrombosebeen links"
                ],
                [
                    "Thrombosebeen rechts"
                ],
                [
                    "Thunderclap hoofdpijn"
                ],
                [
                    "Thymectomie"
                ],
                [
                    "Thyreotoxicosis factitia"
                ],
                [
                    "Thyreoпdectomie"
                ],
                [
                    "Thyreoпditis post partum"
                ],
                [
                    "Tibia fractuur"
                ],
                [
                    "Tibia plateau fractuur"
                ],
                [
                    "Tibio-femorale luxatie"
                ],
                [
                    "Tijdelijke uitwendige pacemaker"
                ],
                [
                    "Tinea pedis"
                ],
                [
                    "Tinnitus"
                ],
                [
                    "Toegenomen buikomvang"
                ],
                [
                    "Tongcarcinoom"
                ],
                [
                    "Tongoperatie"
                ],
                [
                    "Tonsillectomie"
                ],
                [
                    "Tonsillitis"
                ],
                [
                    "Torsio testis"
                ],
                [
                    "Totaalruptuur"
                ],
                [
                    "Totaalruptuurherstel"
                ],
                [
                    "Totale colectomie met ileorectale anastomose"
                ],
                [
                    "Totale heupprothese"
                ],
                [
                    "Totale knieprothese"
                ],
                [
                    "Totale maagresectie"
                ],
                [
                    "Totale pancreatectomie"
                ],
                [
                    "Totale rectumprolaps"
                ],
                [
                    "Totale thyreoпdectomie"
                ],
                [
                    "Toxicodermie"
                ],
                [
                    "Toxisch megacolon"
                ],
                [
                    "Toxisch multinodulair struma (M. Plummer)"
                ],
                [
                    "Toxisch schildklieradenoom"
                ],
                [
                    "Toxische geneesmiddelhepatitis"
                ],
                [
                    "Toxische thrombocytopenie"
                ],
                [
                    "Toxoplasmose"
                ],
                [
                    "Traanbuis operatie"
                ],
                [
                    "Traanfilm instabiliteit"
                ],
                [
                    "Trabeculectomie"
                ],
                [
                    "Tracheacompressie"
                ],
                [
                    "Tracheostomie"
                ],
                [
                    "Transanale chirurgie"
                ],
                [
                    "Transanale endoscopische microchirurgie (TEM)"
                ],
                [
                    "Transfusieproblemen"
                ],
                [
                    "Transient ischaemic attack (TIA)"
                ],
                [
                    "Transpireren"
                ],
                [
                    "Transpositie sulcus ulnaris (re of li)"
                ],
                [
                    "Transpositie van de grote vaten"
                ],
                [
                    "Transseksualiteit"
                ],
                [
                    "Transsfenoпdale partiлle hypofysectomie"
                ],
                [
                    "Trauma"
                ],
                [
                    "Trauma capitis"
                ],
                [
                    "Trauma gelaat"
                ],
                [
                    "Trauma hand"
                ],
                [
                    "Traumatisch Vena Jugularis Letsel"
                ],
                [
                    "Traumatisch anaal letsel"
                ],
                [
                    "Traumatisch aorta abdominalis letsel"
                ],
                [
                    "Traumatisch aorta thoracalis letsel"
                ],
                [
                    "Traumatisch arteria axillaris letsel"
                ],
                [
                    "Traumatisch arteria brachialis letsel"
                ],
                [
                    "Traumatisch arteria brachiocephalica letsel"
                ],
                [
                    "Traumatisch arteria carotis letsel"
                ],
                [
                    "Traumatisch arteria coeliacus letsel"
                ],
                [
                    "Traumatisch arteria femoralis letsel"
                ],
                [
                    "Traumatisch arteria iliaca letsel"
                ],
                [
                    "Traumatisch arteria poplitea letsel"
                ],
                [
                    "Traumatisch arteria pulmonalis letsel"
                ],
                [
                    "Traumatisch arteria subclavia letsel"
                ],
                [
                    "Traumatisch bicepspees letsel"
                ],
                [
                    "Traumatisch bijnier letsel"
                ],
                [
                    "Traumatisch blaas letsel"
                ],
                [
                    "Traumatisch bronchus letsel"
                ],
                [
                    "Traumatisch colon letsel"
                ],
                [
                    "Traumatisch complete dwarslaesie"
                ],
                [
                    "Traumatisch diafragma letsel"
                ],
                [
                    "Traumatisch duodenum letsel"
                ],
                [
                    "Traumatisch galblaas letsel"
                ],
                [
                    "Traumatisch hersenzenuwletsel"
                ],
                [
                    "Traumatisch ileum letsel"
                ],
                [
                    "Traumatisch incomplete dwarslaesie"
                ],
                [
                    "Traumatisch jejunum letsel"
                ],
                [
                    "Traumatisch leverletsel"
                ],
                [
                    "Traumatisch longcontusie"
                ],
                [
                    "Traumatisch maag letsel"
                ],
                [
                    "Traumatisch milt letsel"
                ],
                [
                    "Traumatisch myocard letsel"
                ],
                [
                    "Traumatisch nervus femoralis letsel"
                ],
                [
                    "Traumatisch nervus ischiadicus letsel"
                ],
                [
                    "Traumatisch nervus medialis letsel"
                ],
                [
                    "Traumatisch nervus peroneus letsel"
                ],
                [
                    "Traumatisch nervus radialis letsel"
                ],
                [
                    "Traumatisch nervus tibialis letsel"
                ],
                [
                    "Traumatisch nier letsel"
                ],
                [
                    "Traumatisch oesophagus letsel"
                ],
                [
                    "Traumatisch oogletsel"
                ],
                [
                    "Traumatisch oorletsel"
                ],
                [
                    "Traumatisch ovarieel letsel"
                ],
                [
                    "Traumatisch pancreas letsel"
                ],
                [
                    "Traumatisch penis letsel"
                ],
                [
                    "Traumatisch perineaal letsel"
                ],
                [
                    "Traumatisch plexus brachialis letsel"
                ],
                [
                    "Traumatisch pneumomediastinum"
                ],
                [
                    "Traumatisch rectum letsel"
                ],
                [
                    "Traumatisch scrotum letsel"
                ],
                [
                    "Traumatisch testis letsel"
                ],
                [
                    "Traumatisch trachea letsel"
                ],
                [
                    "Traumatisch ureter letsel"
                ],
                [
                    "Traumatisch urethra letsel"
                ],
                [
                    "Traumatisch uterus letsel"
                ],
                [
                    "Traumatisch vagina letsel"
                ],
                [
                    "Traumatisch vena brachialis letsel"
                ],
                [
                    "Traumatisch vena cava letsel"
                ],
                [
                    "Traumatisch vena iliaca letsel"
                ],
                [
                    "Traumatisch vena poplitea letsel"
                ],
                [
                    "Traumatisch vena pulmonalis letsel"
                ],
                [
                    "Traumatisch vulva letsel"
                ],
                [
                    "Traumatische achillespees ruptuur"
                ],
                [
                    "Traumatische amputatie bovenste ledemaat"
                ],
                [
                    "Traumatische amputatie onderste lidmaat"
                ],
                [
                    "Traumatische patellapees ruptuur"
                ],
                [
                    "Traumatische peesruptuur bovenste extremitiet"
                ],
                [
                    "Traumatische perforatie vd oesofagus"
                ],
                [
                    "Traumatische pneumothorax"
                ],
                [
                    "Traumatische quadricepspees ruptuur"
                ],
                [
                    "Traumatsich vena axillaris letsel"
                ],
                [
                    "Traumatsich vena femoralis letsel"
                ],
                [
                    "Traumtisch nervus ulnaris letsel"
                ],
                [
                    "Tremor"
                ],
                [
                    "Tricuspidaalklep vervanging"
                ],
                [
                    "Tricuspidaalklepinsufficiлntie"
                ],
                [
                    "Tricuspidaalklepstenose"
                ],
                [
                    "Tricuspidalisklepplastiek"
                ],
                [
                    "Tricuspidalisklepplastiek vlgs Carpentier-Edwards"
                ],
                [
                    "Tricuspidalisklepvervanging"
                ],
                [
                    "Tricuspidaliskunstklep"
                ],
                [
                    "Trifasciculair blok"
                ],
                [
                    "Trigeminopathie"
                ],
                [
                    "Trigeminusneuralgie"
                ],
                [
                    "Trimalleolaire fractuur"
                ],
                [
                    "Trisomie 9"
                ],
                [
                    "Trombocytopathie"
                ],
                [
                    "Trombocytopenie n.n.o."
                ],
                [
                    "Trombocytose"
                ],
                [
                    "Tromboflebitis"
                ],
                [
                    "Trombolyse"
                ],
                [
                    "Trombose van de linker arm venen"
                ],
                [
                    "Trombose van de rechter arm venen"
                ],
                [
                    "Trombose vd vena portae"
                ],
                [
                    "Trombosebeen"
                ],
                [
                    "Trombosebeen links"
                ],
                [
                    "Trombosebeen rechts"
                ],
                [
                    "Trombotische trombocytopenische purpura (TTP)"
                ],
                [
                    "Trommelstokvingers"
                ],
                [
                    "Tuba carcinoom"
                ],
                [
                    "Tubaresectie"
                ],
                [
                    "Tuberculum majus humeri fractuur"
                ],
                [
                    "Tuberositas tibiae fractuur"
                ],
                [
                    "Tuboneostomie"
                ],
                [
                    "Tumor"
                ],
                [
                    "Tumornefrectomie"
                ],
                [
                    "Tympanoplastiek"
                ],
                [
                    "URS (ureterorenoscopie)"
                ],
                [
                    "Uitslag onderzoek"
                ],
                [
                    "Ulcus"
                ],
                [
                    "Ulcus cruris"
                ],
                [
                    "Ulcus duodeni"
                ],
                [
                    "Ulcus duodeni bij NSAID"
                ],
                [
                    "Ulcus duodeni"
                ],
                [
                    "Ulcus gastrojejunale"
                ],
                [
                    "Ulcus ventriculi"
                ],
                [
                    "Ulcus ventriculi bij nsaid"
                ],
                [
                    "Ulcus ventriculi"
                ],
                [
                    "Ulna fractuur"
                ],
                [
                    "Ulnaropathie"
                ],
                [
                    "Undifferentiated connective tissue disease"
                ],
                [
                    "Unicondylaire femurfractuur"
                ],
                [
                    "Ureter operatie"
                ],
                [
                    "Ureter reпmplantatie"
                ],
                [
                    "Uretercarcinoom (urotheelcelcarcinoom van de urete"
                ],
                [
                    "Ureterectomie"
                ],
                [
                    "Uretero-cutaneostomie"
                ],
                [
                    "Ureterolithotomie"
                ],
                [
                    "Ureterolysis"
                ],
                [
                    "Uretersteen"
                ],
                [
                    "Ureterstenose"
                ],
                [
                    "Urethra dilatatie"
                ],
                [
                    "Urethradivertikel"
                ],
                [
                    "Urethrastrictuur"
                ],
                [
                    "Urethrectomie"
                ],
                [
                    "Urethrotomie vlgs. Otis"
                ],
                [
                    "Urethrotomie vlgs. Sachse"
                ],
                [
                    "Urethrovaginale fistel"
                ],
                [
                    "Urineweginfectie"
                ],
                [
                    "Urolithiasis"
                ],
                [
                    "Urosepsis"
                ],
                [
                    "Urticaria"
                ],
                [
                    "Urticaria pigmentosa"
                ],
                [
                    "Uterus myomatosus"
                ],
                [
                    "Uterus prolaps"
                ],
                [
                    "Uterusmyoom"
                ],
                [
                    "Uterusoperatie"
                ],
                [
                    "Uveitis"
                ],
                [
                    "Vaatoperatie"
                ],
                [
                    "Vaatspasmen"
                ],
                [
                    "Vacuьmextractie"
                ],
                [
                    "Vaginacarcinoom"
                ],
                [
                    "Vaginale sterilisatie"
                ],
                [
                    "Vaginale uterusextirpatie"
                ],
                [
                    "Vaginaplastiek"
                ],
                [
                    "Vaginaprolaps"
                ],
                [
                    "Vaginitis"
                ],
                [
                    "Vagotomie"
                ],
                [
                    "Valneiging"
                ],
                [
                    "Varicella"
                ],
                [
                    "Varices"
                ],
                [
                    "Varicesoperatie"
                ],
                [
                    "Varicocиle"
                ],
                [
                    "Varicocиlectomie"
                ],
                [
                    "Varicosis cruris"
                ],
                [
                    "Vasculaire dementie"
                ],
                [
                    "Vasculaire hoofdpijn"
                ],
                [
                    "Vasculaire purpura"
                ],
                [
                    "Vasculitis nno"
                ],
                [
                    "Vasculitis van de huid"
                ],
                [
                    "Vasectomie"
                ],
                [
                    "Vasovagale collaps"
                ],
                [
                    "Vasovasostomie"
                ],
                [
                    "Vena axillaristhrombose"
                ],
                [
                    "Vena cava superior syndroom"
                ],
                [
                    "Vena centralis retina occlusie"
                ],
                [
                    "Vena lienalis trombose"
                ],
                [
                    "Vena renalis thrombose"
                ],
                [
                    "Veneuze hemi-occlusie"
                ],
                [
                    "Veneuze klepinsufficiлnties"
                ],
                [
                    "Veneuze trombose van de retina"
                ],
                [
                    "Ventriculaire extrasystolie"
                ],
                [
                    "Ventriculaire ritmestoornissen"
                ],
                [
                    "Ventriculaire tachycardie"
                ],
                [
                    "Ventriculaire tachycardie uit rechter kamer outflo"
                ],
                [
                    "Ventriculaire tachycardie"
                ],
                [
                    "Ventrikelfibrilleren"
                ],
                [
                    "Ventrikelflutter"
                ],
                [
                    "Ventrikelseptum defekt"
                ],
                [
                    "Ventrikelseptumdefect"
                ],
                [
                    "Ventrikelseptumruptuur"
                ],
                [
                    "Ventrikeltachycardie"
                ],
                [
                    "Verdenking op endocarditis"
                ],
                [
                    "Vergrote klieren"
                ],
                [
                    "Verhoogd CK"
                ],
                [
                    "Verhoogd IgE"
                ],
                [
                    "Verhoogd LDH"
                ],
                [
                    "Verhoogd PSA"
                ],
                [
                    "Verhoogd alk. fosfatase"
                ],
                [
                    "Verhoogd ferritine"
                ],
                [
                    "Verhoogd gamma-GT"
                ],
                [
                    "Verhoogde BSE"
                ],
                [
                    "Verkrachting"
                ],
                [
                    "Vermagering"
                ],
                [
                    "Vermagering E.C.I."
                ],
                [
                    "Verruca"
                ],
                [
                    "Verslikklachten."
                ],
                [
                    "Vertebrobasillaris syndroom"
                ],
                [
                    "Vertigo"
                ],
                [
                    "Vertraagde puberteit"
                ],
                [
                    "Vervanging aorta thoracalis"
                ],
                [
                    "Vervanging van de aorta ascendens"
                ],
                [
                    "Verwijderen PD-catheter"
                ],
                [
                    "Verwijderen port a cath"
                ],
                [
                    "Verwijdering cervixpoliep"
                ],
                [
                    "Verwijdering corpus alienum maag"
                ],
                [
                    "Verwijdering osteosynthesemateriaal"
                ],
                [
                    "Verwijdering stent"
                ],
                [
                    "Verwijdering tissue expander blaas"
                ],
                [
                    "Verzakkingsoperatie"
                ],
                [
                    "Vesico-ureterale reflux"
                ],
                [
                    "Vesicocele operatie"
                ],
                [
                    "Vesicovaginale fistel"
                ],
                [
                    "Vetembolie"
                ],
                [
                    "Vetschortreductie"
                ],
                [
                    "Vingerfractuur"
                ],
                [
                    "Vingeroperatie"
                ],
                [
                    "Virushepatitis nno"
                ],
                [
                    "Viscerale pijn (abdominaal)"
                ],
                [
                    "Viscerale pijn (thoracaal)"
                ],
                [
                    "Visusdaling"
                ],
                [
                    "Vitamine B1 deficiлntie"
                ],
                [
                    "Vitamine B12-deficiлntie"
                ],
                [
                    "Vitamine D-deficiлntie"
                ],
                [
                    "Vitamine D-insufficiлntie"
                ],
                [
                    "Vitamine D-resistente osteomalacie"
                ],
                [
                    "Vitiligo"
                ],
                [
                    "Vitrectomie"
                ],
                [
                    "Voedselallergie"
                ],
                [
                    "Voedselimpactie in slokdarm"
                ],
                [
                    "Voetoperatie"
                ],
                [
                    "Volvulus operatie"
                ],
                [
                    "Voor- en achterwandplastiek"
                ],
                [
                    "Voortplantingsgerelateerd"
                ],
                [
                    "Voorwand myocardinfarct"
                ],
                [
                    "Voorwandplastiek"
                ],
                [
                    "Vulvacarcinoom"
                ],
                [
                    "Vulvitis"
                ],
                [
                    "Waarschijnlijk SUNCT"
                ],
                [
                    "Waarschijnlijk ch"
                ],
                [
                    "Wad klasse 0 (whiplash associated disorder)"
                ],
                [
                    "Wad klasse 1 (whiplash associated disorder)"
                ],
                [
                    "Wad klasse 2 (whiplash associated disorder)"
                ],
                [
                    "Wad klasse 3 (whiplash associated disorder)"
                ],
                [
                    "Wad klasse 4 (whiplash associated disorder)"
                ],
                [
                    "Wandonregelmatigheden coronairarterien"
                ],
                [
                    "Wandonregelmatigheden in de hoofdstam"
                ],
                [
                    "Watermelon stomach"
                ],
                [
                    "Weber A fractuur"
                ],
                [
                    "Weber B fractuur"
                ],
                [
                    "Weber C fractuur"
                ],
                [
                    "Wenkbrauwlift"
                ],
                [
                    "Wervelfractuur"
                ],
                [
                    "Wervelkanaalstenose"
                ],
                [
                    "Whiplash"
                ],
                [
                    "Whipple-operatie"
                ],
                [
                    "White coat hypertensie"
                ],
                [
                    "Wigexcisie"
                ],
                [
                    "Wigexcisie ovarium"
                ],
                [
                    "Wisselend AV-blok"
                ],
                [
                    "Wisseling galwegstent"
                ],
                [
                    "Wolff-Parkinson-White syndroom"
                ],
                [
                    "Wond"
                ],
                [
                    "Wondtoilet"
                ],
                [
                    "Wormziekte"
                ],
                [
                    "X-gebonden adrenoleucodystrofie"
                ],
                [
                    "Xanthalasmata"
                ],
                [
                    "Xanthelasmata verwijderd"
                ],
                [
                    "Xerosis cutis"
                ],
                [
                    "Yersinia enteritis"
                ],
                [
                    "Zeer aggressieve lymfomen B-cell type"
                ],
                [
                    "Zenkers divertikel"
                ],
                [
                    "Zenuwtransplantatie"
                ],
                [
                    "Ziekte van Addison"
                ],
                [
                    "Ziekte van Behзet"
                ],
                [
                    "Ziekte van Bowen"
                ],
                [
                    "Ziekte van Conn"
                ],
                [
                    "Ziekte van Crohn van de dunne darm"
                ],
                [
                    "Ziekte van Crohn van het colon"
                ],
                [
                    "Ziekte van Cushing"
                ],
                [
                    "Ziekte van Ebstein"
                ],
                [
                    "Ziekte van Fabry"
                ],
                [
                    "Ziekte van Graves"
                ],
                [
                    "Ziekte van Hashimoto"
                ],
                [
                    "Ziekte van Henoch-Schцnlein"
                ],
                [
                    "Ziekte van Hodgkin lymfocytenarm"
                ],
                [
                    "Ziekte van Hodgkin nno"
                ],
                [
                    "Ziekte van Hodgkin recidief"
                ],
                [
                    "Ziekte van Kahler"
                ],
                [
                    "Ziekte van Kikushi (histiocytaire necrotiserende l"
                ],
                [
                    "Ziekte van Lyme"
                ],
                [
                    "Ziekte van Mйniиre"
                ],
                [
                    "Ziekte van Niemann-Pick"
                ],
                [
                    "Ziekte van Osgood Schlatter"
                ],
                [
                    "Ziekte van Parkinson"
                ],
                [
                    "Ziekte van Perthes"
                ],
                [
                    "Ziekte van Reiter"
                ],
                [
                    "Ziekte van Scheuerman"
                ],
                [
                    "Ziekte van Sjцgren"
                ],
                [
                    "Ziekte van Wegener"
                ],
                [
                    "Ziekte van Weil"
                ],
                [
                    "Ziekte van Whipple"
                ],
                [
                    "Ziekte van Wilson"
                ],
                [
                    "Zondagmiddagelleboog"
                ],
                [
                    "Zwakbegaafdheid"
                ],
                [
                    "Zwangerschapscholestase"
                ],
                [
                    "Zwangerschapsdiabetes"
                ],
                [
                    "Zwangerschapshypertensie"
                ],
                [
                    "Zwangerschapstoxicose"
                ],
                [
                    "Zygomafractuur"
                ]
            ]
        );
    }

    public function down()
    {
        $this->dropTable($this->table);
    }
}
