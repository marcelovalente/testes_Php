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

class File
{

    protected $fileName;
    protected $fileOpen;
    protected $fileArray = [];
    protected $fileJson;
    protected $fileSize = 0;

    public function __construct($fileName)
    {
        $this->__set('fileName', $fileName);
        $this->openFile();
    }

    public function __set(/* string */ $variable, /* string */ $value)
    {
        if (property_exists($this, $variable)) {
            $this->$variable = $value;
        }
    }

    public function __get($variable)
    {
        if (property_exists($this, $variable)) {
            return $this->$variable;
        }
    }

    /**
     * Converterá o registro no arquivo texto para o formato array
     *
     * @return void
     */
    protected function convertFileArray(): void
    {
        if ($fileSize = $this->fileSize()) {
            $fileReaded = fread($this->__get('fileOpen'), $fileSize);
        }
        $content = json_decode($fileReaded, true) ?: [];
        $this->__set('fileArray', $content);
    }

    /**
     * Abre o arquivo informado
     *
     * @return void
     */
    protected function openFile(): void
    {
        $this->fileOpen = fopen($this->__get('fileName'), 'a+');
        rewind($this->__get('fileOpen'));
    }

    /**
     * Retornará o tamanho do arquivo de consulta
     *
     * @return int
     */
    protected function fileSize(): int
    {
        return filesize('/home/cardemotion/www/test/teste7/' . $this->__get('fileName'));
    }

    /**
     * Atualiza o registro no arquivo de texto
     *
     * @param array $file
     *
     * @return void
     */
    protected function updateFile(array $file): void
    {
        file_put_contents($this->__get('fileName'), json_encode($file));
    }

    /**
     * Fecha o arquivo
     *
     * @return void
     */
    protected function closeFile(): void
    {
        fclose($this->__get('fileOpen'));
    }
}