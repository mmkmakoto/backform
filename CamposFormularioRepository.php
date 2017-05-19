<?php
namespace App\Repositories\CamposFormulario;
class CamposFormularioRepository
{
	public function tipo($nomeCampo)
	{
		$namespace = __NAMESPACE__.'\Selecoes\\'.$nomeCampo;
		return new $namespace;
	}
}