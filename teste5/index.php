<?php

/**
 * Crie um parser que converte um arquivo XML em um arquivo CSV usando PHP.
 *
 * Exemplo xml:
 *
 * <?xml version='1.0'?>
 * <marvel>
 * <hero>
 *  <name>Spider-man</name>
 *  <power>2000</power>
 * </hero>
 * <hero>
 *  <name>Hulk</name>
 *  <power>10000</power>
 * </hero>
 * <hero>
 *  <name>Ironman</name>
 *  <power>5000</power>
 * </hero>
 * </marvel>
 *
 *
 */

$xmlFile ='testeXml.xml';
if (file_exists($xmlFile)) {
    $xml = simplexml_load_file($xmlFile);
    $file = fopen('heroes.csv', 'w+');
    foreach ($xml->hero as $hero) {
        fputcsv($file, get_object_vars($hero),',','"');
    }
    fclose($file);
    echo 'Clique nos arquivos para verificar como estava a origem e o destino <a href="testeXml.xml">testeXml.xml</a> => <a href="heroes.csv">heroes.csv</a>';
} else {
    echo 'O arquivo ' . $xmlFile . ' não existe.';
}

