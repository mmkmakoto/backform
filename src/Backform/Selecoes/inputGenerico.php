<?php
namespace Backform\Selecoes;
use Backform\Input;

class inputGenerico extends Input
{
	public $tipo = "string";
	public $descricao = "formulário genérico";

	public function __call($method,$args)
	{
		return $this;
	}
}