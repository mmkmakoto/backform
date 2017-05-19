<?php
namespace Backform\Selecoes;
use Backform\CamposFormularioAbstract;

class Float extends CamposFormularioAbstract
{
	//Propriedades Estáticas Básicas Necessárias
 	static protected $static_nome = 'float';
 	static protected $static_descricao = 'Um campo do tipo float duh';

	public function __construct()
	{
		parent::__construct();
	}

	public function setValorMin($valor)
	{
		$this->params['valorMin'] = $valor;
		return $this;
	}

	protected function valorMinValidar($parametros,$value)
	{
		if($parametros > ($value*1) )
			return "O valor selecionado ($value) não excede o mínimo ($parametros)";

		return null;
	}

	public function setValorMax($valor)
	{
		$this->params['valorMax'] = $valor;
		return $this;
	}

	protected function valorMaxValidar($parametros,$value)
	{
		if($parametros < ($value*1) )
			return "O valor selecionado ($value) excede o máximo ($parametros)";

		return null;
	}

	protected function getValor($value)
	{
		return ($value*1);
	}
}