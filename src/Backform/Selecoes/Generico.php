<?php
namespace Backform\Selecoes;
use Backform\CamposFormularioAbstract;

class Generico extends CamposFormularioAbstract
{
	public $tipo = "string";
	public $descricao = "formulário genérico";

	public function __call($method,$args)
	{
		return $this;
	}
}