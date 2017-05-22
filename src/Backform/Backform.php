<?php
namespace Backform;

class Backform{
	public function tipo($nomeCampo)
	{
		$namespace = __NAMESPACE__.'\Selecoes\\'.$nomeCampo;
		return new $namespace;
	}
}

?>