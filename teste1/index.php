<?php

/**
 * Crie um script PHP que mostra o nome do pa�s e sua capital usando uma array chamada $location. Ordene a Lista pelo nome da capital e adicione pelo     menos 5 entradas no array.

 * Exemplo do que deve ser mostrado de sa�da:
 * A capital do Brasil e Bras�lia
 * A capital dos EUA e Washington
 * A capital da Espanha e Madrid
 */

$locations = [];
$locations[] = ['country' => 'Uruguai', 'capital' => 'Montevideo', 'preposition' => 'do'];
$locations[] = ['country' => 'Brasil', 'capital' => 'Brasília', 'preposition' => 'do'];
$locations[] = ['country' => 'Estados Unidos', 'capital' => 'Washington D.C.', 'preposition' => 'dos'];
$locations[] = ['country' => 'Espanha', 'capital' => 'Madrid', 'preposition' => 'do'];
$locations[] = ['country' => 'Tatooine', 'capital' => 'Bestine', 'preposition' => 'de'];

array_multisort(array_column($locations, 'capital'), SORT_ASC, $locations);

foreach ($locations as $location) {
    echo 'A capital ' . $location['preposition'] . ' <b>' .  $location['country'] . '</b> e <b>' . $location['capital']. '</b><br/>';
}