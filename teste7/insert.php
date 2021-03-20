<?php

/**
 * Crie uma API simples para manipular uma lista de usuários contendo os campos (Nome, Sobrenome, Email & Telefone.). Essa API deverá conter os requisitos abaixo:
 *
 * Dados deverão ser salvos em um arquivo de texto
 * Usar Rest API
 * Criar Endpoint para listar todos os usuarios
 * Criar Endpoint para deletar usuarios por email
 * Criar Endpoint para adicionar um usuario novo
 * Criar Endpoint para atualizar os dados do usuario.
 * Prover documentacao minima para usar a API.
 *
 */

require('Api.php');
header('Content-Type: application/json; charset=ISO-8859-1');
header('Access-Control-Max-Age: 86400');
header('HTTP/1.1 200 OK', true, 200);

$api = new Api(strtolower($_SERVER['REQUEST_METHOD']), 'testUsers.txt', $_REQUEST['DATA'], $_REQUEST['ID']);
echo $api->insertUser();