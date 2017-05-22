<?php
namespace Backform;
use exception;
class Backform{
	public function tipo($nomeCampo)
	{
		$namespace = __NAMESPACE__.'\Selecoes\\'.$nomeCampo;
		if(class_exists($namespace)){
			return new $namespace;
		}
		else{
			return new Selecoes\Generico;
		}
	}
}

?>