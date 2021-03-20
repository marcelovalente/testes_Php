<?php

/**
 * Crie uma Classe para criar um select Field para um user registration form.
 * Após criar essa classe crie um webform simples e adicione esse campo criado.
 *
 * OBSERVAÇÃO: PHP 8.0 necessário, devido ao tipo de declaração na linha 26 ser do formato mixed
 */

// declare(strict_types=1);

class SelectForm
{

    protected $selectName;
    protected $options;

    /**
     * Método para setar valores nas variáveis
     *
     * @param string $variable
     * @param mixed $value
     *
     * @return void
     */
    public function __set(string $variable, $value): void
    {
        if (property_exists($this, $variable)) {
            $this->$variable = $value;
        }
    }

    /**
     * Metodo para retornar o valor da variável
     *
     * @param string $variable
     *
     * @return iterable
     */
    public function __get(string $variable): iterable
    {
        if (property_exists($this, $variable)) {
            return $this->$variable;
        }
    }

    /**
     * Faz a renderização do elemento select
     *
     * @return string
     */
    public function renderSelect(): string
    {
        $select = '<select name="' . $this->selectName . '">';
        $select .= $this->renderOptions();
        $select .= '</select>';
        return $select;
    }

    /**
     * Faz a renderização do elemento option
     *
     * @return string
     */
    private function renderOptions(): string
    {
        $newOption = '<option value="-1">Escolha um nome</option>';
        foreach ($this->__get('options') as $chave => $option) {
            $newOption .= '<option value="' . $chave . '">' . $option . '</option>';
        }
        return $newOption;
    }
}

$nomes = new SelectForm();
$nomes->__set('selectName', 'mulheres');
$nomes->__set('options', [0 => 'Maria', 1 => 'José']);

?>

<!DOCTYPE HTML>
<html lang=”pt-br”>
    <head>
        <meta charset=”UTF-8”>
        <title>Webform simples</title>
    </head>
    <body>
    <div>
        <?php echo $nomes->renderSelect() ?>
    </div>
    </body>
</html>