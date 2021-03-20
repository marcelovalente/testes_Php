<?php

/**
 * Escreva uma função em PHP para pegar determinar a extensão dos 3 arquivos abaixo e mostrar as extensões na tela. As saídas devem ser mostradas em uma lista em ordem alfabética.
 *
 * Arquivos de exemplo
 *    a) music.mp4
 *    b) video.mov
 *    c) imagem.jpeg
 *
 * Saida experada:
 *    1 .jpeg
 *    2 .mov
 *    3 .mp4
 */

declare(strict_types=1);

/**
 * Esta função irá receber o nome do arquivo e retornar a sua extensão
 *
 * @param string $file
 *
 * @return string
 */
function splitExtension(string $file): string
{
    return substr($file, strrpos($file, '.'), strlen($file));
}

$extensions = [];
$files = ['music.mp4', 'video.mov', 'imagem.jpeg'];

foreach ($files as $file) {
    $extensions[] = splitExtension($file);
}

sort($extensions);

$i = 1;
foreach ($extensions as $extension) {
    echo $i . ' ' . $extension . '<br/>';
    $i++;
}