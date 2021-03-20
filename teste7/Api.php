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

// declare(strict_types=1);
require('File.php');

class Api extends File
{
    protected $method;
    protected $data = [];
    protected $status;
    protected $dataInput = [];
    protected $id;

    public function __construct($method, $db, $data = [], $id = '')
    {
        $this->__set('method', $method);
        parent::__construct($db);

        if ($id) {
            $this->__set('id', trim($id));
        }
        if ($data) {
            $this->__set('dataInput', array_map('trim', $data));
        }
    }

    /**
     * Método para atualizar informações do usuário
     *
     * @return string
     */
    public function updateUser(): string
    {
        $this->checkMethod();
        $this->convertFileArray();
        $positionUser = $this->findUserPosition();
        $arrayFile = $this->__get('fileArray');
        $arrayFile[$positionUser] = $this->__get('dataInput');
        $this->updateFile($arrayFile);
        return $this->updateRecord();
    }

    /**
     * Método para inserir um novo usuário na base de dados
     *
     * @return string
     */
    public function insertUser(): string
    {
        $this->checkMethod();
        $this->convertFileArray();
        $arrayFile = $this->__get('fileArray');
        $arrayFile[] = $this->__get('dataInput');
        $this->updateFile($arrayFile);
        return $this->updateRecord();
    }

    /**
     * Retorna a listagem com todos os usuários na base de dados
     *
     * @return string
     */
    public function getUser(): string
    {
        $this->checkMethod();
        $this->convertFileArray();
        $this->__set('status', 204);
        if ($arrFile = $this->__get('fileArray')) {
            $this->__set('status', 200);
            $this->__set('data', $arrFile);
        }
        $this->closeFile();
        return $this->result();
    }

    /**
     * Método para apagar um usuário da base de dados
     *
     * @return string
     */
    public function deleteUser(): string
    {
        $this->checkMethod();
        $this->convertFileArray();
        $positionUser = $this->findUserPosition();
        $arrayFile = $this->__get('fileArray');
        $this->__set('dataInput', $this->__get('id'));
        unset($arrayFile[$positionUser]);
        $this->updateFile($arrayFile);
        return $this->updateRecord();
    }

    /**
     * Informará a posição do usuário no array da base de dados
     *
     * @return int
     */
    private function findUserPosition(): int
    {
        return array_search($this->__get('id'), array_column($this->__get('fileArray'), 'Email'));
    }

    /**
     * Atualiza o registro da base de dados, alterando a informação ou excluindo um registro
     *
     * @return string
     */
    private function updateRecord(): string
    {
        $this->closeFile();
        $this->__set('status', 200);
        $this->__set('data', $this->__get('dataInput'));
        return $this->result();
    }

    /**
     * Método para checar se o método informado condiz com a ação que deseja realizar
     *
     * @return void
     */
    private function checkMethod(): void
    {
        $debugTrace = debug_backtrace();
        switch ($debugTrace[1]['function']) {
            case 'getUser':
                if ($this->__get('method') !== 'get') {
                    $this->__set('status', 405);
                }
                break;
            case 'updateUser':
                if ($this->__get('method') !== 'put') {
                    $this->__set('status', 405);
                }
                break;
            case 'insertUser':
                if ($this->__get('method') !== 'post') {
                    $this->__set('status', 405);
                }
                break;
            case 'deleteUser':
                if ($this->__get('method') !== 'delete') {
                    $this->__set('status', 405);
                }
                break;
        }
        if ($this->__get('status') === 405) {
            $this->__set('data', ['Método não suportado para esta ação']);
            die($this->result());
        }
    }

    /**
     * Retornará um json com a ação executada
     *
     * @return string
     */
    private function result(): string
    {
        return json_encode(['status' => $this->__get('status'), 'data' => $this->__get('data')]);
    }
}