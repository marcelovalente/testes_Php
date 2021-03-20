<?php

/**
 * Escreva uma fun��o em PHP para pegar determinar a extens�o dos 3 arquivos abaixo e mostrar as extens�es na tela. As sa�das devem ser mostradas em uma lista em ordem alfab�tica.
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
 * Esta fun��o ir� receber o nome do arquivo e retornar a sua extens�o
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