<?php

/**
 * Joãozinho vai morder o seu dedo 50% das vezes. Esse exercício será dividido em 2 partes.
 *
 * a) Primeiro, cria uma função chamada foiMordido() que deverá retornar  TRUE para 50% das vezes e FALSE para os outros 50%. A função rand() pode ser útil aqui.
 *
 * b) Após criar a função, crie um código/página que mostre as frases “Joãozinho mordeu o seu dedo !” ou “Joaozinho NAO mordeu o seu dedo !” usando a função foiMordido() que foi criado na primeira parte.
 */

declare(strict_types=1);

/**
 * Esta função irá verificar se o usuário foi mordido
 *
 * @return bool
 */
function foiMordido(): bool
{
    if (rand(1, 2) % 2) {
        return true;
    }
    return false;
}

if (foiMordido()) {
    echo 'Joãozinho mordeu o seu dedo !';
} else {
    echo 'Joaozinho NAO mordeu o seu dedo !';
}