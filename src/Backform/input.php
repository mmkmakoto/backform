<?php
namespace Backform;
abstract class Input
{
	protected $nullable = true;
	public $tipo = "";
	public $descricao = "";
	public $nome = "";
	public $params = [];

	protected function getValor($value)
	{
		return $value;
	}

	public function resposta($resposta)
	{
		$this->resposta = $resposta;
		return $this;
	}

	public function nome($nome)
	{
		$this->nome = $nome;
		return $this;
	}

	public function label($label)
	{
		$this->label = $label;
		return $this;
	}

	public function setNullable($bool)
	{
		$this->nullable = $bool;
		return $this;
	}

	public function valida($value)
	{
		//Se o valor for nulo e Nullable for true
		if((empty($value) and $this->nullable))
		{
			$retorno = ['value' => null ,'errors' => null];
		}
		elseif((empty($value) and !$this->nullable))
		{
			$retorno = ['value' => null ,'errors' => 'Campo não pode ser nulo'];
		}
		else
		{
			$errors = [];
			foreach($this->params as $propriedade => $parametros)
			{
				$funcaoValidadora = $propriedade.'Validar';
				$error = $this->$funcaoValidadora($parametros,$value);
				if($error)
					$errors[] = $error;
			}
			$retorno = ['value' => $this->getValor($value) ,'errors' => $errors];
		}
		return $retorno;
	}
}