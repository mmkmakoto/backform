<?php
namespace Backform\Selecoes;
use Backform\CamposFormularioAbstract;

class String extends CamposFormularioAbstract
{
	//Propriedades Estáticas Básicas Necessárias
 	protected $tipo = 'string';
 	protected $descricao = 'Um campo do tipo string duh';

	protected function getValor($value)
	{
		return $value;
	}
}