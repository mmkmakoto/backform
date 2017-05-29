<?php
namespace Backform\Selecoes;
use Backform\Input;
use Carbon\Carbon;

class inputData extends Input
{
	//Propriedades Estáticas Básicas Necessárias
	public $tipo = 'data';
 	public $descricao = 'Um campo do tipo data sem seleção de horário';

	public function setDataMax($data)
	{
		$this->params['dataMax'] = $data;
		return $this;
	}

	protected function dataMaxValidar($parametros,$value)
	{
		if(!empty($value))
		{
			$dataSelecionada = Carbon::CreateFromFormat('d/m/Y',$value);
			$dataMaxima = Carbon::CreateFromFormat('Y-m-d',$parametros);

			if($dataSelecionada > $dataMaxima)
			{
				return "Data selecionada ( ".$dataSelecionada->format('d/m/Y')." ) excede a data máxima ( ".$dataMaxima->format('d/m/Y')." )";
			}
		}
		else
		{
			return null;
		}
	}


	public function setDataMin($data)
	{
		$this->params['dataMin'] = $data;
		return $this;
	}

	protected function dataMinValidar($parametros,$value)
	{
		$dataMinima = Carbon::CreateFromFormat('Y-m-d',$parametros);
		if(!empty($value))
		{
			$dataSelecionada = Carbon::CreateFromFormat('d/m/Y',$value);

			if($dataSelecionada < $dataMinima)
			{
				return "Data selecionada ( ".$dataSelecionada->format('d/m/Y')." ) não excede a data mínima ( ".$dataMinima->format('d/m/Y')." )";
			}
			else
			{
				return null;
			}
		}
		else
		{
			return "Data não selecionada, mínima requerida(".$dataMinima->format('d/m/Y').")";
		}
	}

	protected function getValor($value)
	{
		$retorno = Carbon::CreateFromFormat('d/m/Y',$value);
		return $retorno->format("Y-m-d");
	}

	public function resposta($resposta)
	{
		$resposta = Carbon::CreateFromFormat("Y-m-d",$resposta);
		$this->resposta = $resposta->format('d/m/Y');
		return $this;
	}
}