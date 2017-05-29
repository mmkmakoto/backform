<?php
namespace Backform;
use Backform\Selecoes\inputData;
use Backform\Selecoes\inputFloat;
use Backform\Selecoes\inputGenerico;
use Backform\Selecoes\inputSelecao;
use Backform\Selecoes\inputString;

class Backform{
	protected $campos = [
		'Data' => inputData::class,
		'Float' => inputFloat::class,
		'Generico' => inputGenerico::class,
		'Selecao' => inputSelecao::class,
		'String' => inputString::class,
	];

	public function tipo($nomeCampo)
	{
		if(in_array($nomeCampo,$this->campos)){
			return new $this->campos[$nomeCampo];
		}
		else{
			return new inputGenerico;
		}
	}
}

?>