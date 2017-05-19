<?php
namespace Backform\Selecoes;
use Backform\CamposFormularioAbstract;

class Selecao extends CamposFormularioAbstract
{
	//Propriedades Estáticas Básicas Necessárias
 	static protected $static_nome = 'selecao';
 	static protected $static_descricao = 'Um campo do tipo seleçao';

	public function __construct()
	{
		parent::__construct();
	}

	public function setMaxUnidadesSelecionadas($maxUnidades)
	{
		$this->params['maxUnidadesSelecionadas'] = $maxUnidades;
		return $this;
	}

	protected function maxUnidadesSelecionadasValidar($parametros,$value)
	{
		$unidadesSelecionadas = count($value);
		if($unidadesSelecionadas > $parametros)
			return "O número de seleções($unidadesSelecionadas) excede o máximo($parametros)";

		return null;
	}

	public function setMinUnidadesSelecionadas($minUnidades)
	{
		$this->params['minUnidadesSelecionadas'] = $minUnidades;
		return $this;
	}

	protected function minUnidadesSelecionadasValidar($parametros,$value)
	{
		$unidadesSelecionadas = count($value);
		if($unidadesSelecionadas < $parametros)
			return "O número de seleções($unidadesSelecionadas) não atinge o mínimo($parametros)";

		return null;
	}

	public function setSelectionOptions($opcoes)
	{
		$this->params['selectionOptions'] = $opcoes;
		return $this;
	}

	protected function selectionOptionsValidar($parametros,$value)
	{
		$itensDisponiveis = $parametros->lists('value');
		$itensSelecionados = collect($value)->lists('value');

		$numItensSelecionadosNaoDisponiveis = count($itensSelecionados->diff($itensDisponiveis));

		if($numItensSelecionadosNaoDisponiveis>0)
			return "Número de seleções não disponíveis($numItensSelecionadosNaoDisponiveis)";

		return null;
	}

	protected function getValor($value)
	{
		$retorno = collect($value)->lists('value')->toArray();
		return $retorno;
	}

	public function resposta($resposta)
	{
		$params = [];
		foreach($resposta as $item){
			foreach($this->params['selectionOptions'] as $key => $options){
				if($options['value'] == $item){
					$options['selected'] = true;
					$this->params['selectionOptions'][$key] = $options;
				}
			}
		}
		$this->resposta = $resposta;
		return $this;
	}
}