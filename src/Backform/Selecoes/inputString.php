<?php
namespace Backform\Selecoes;
use Backform\Input;

class inputString extends Input
{
	//Propriedades Estáticas Básicas Necessárias
 	public $tipo = 'string';
 	public $descricao = 'Um campo do tipo string duh';

	protected function getValor($value)
	{
		return $value;
	}
}