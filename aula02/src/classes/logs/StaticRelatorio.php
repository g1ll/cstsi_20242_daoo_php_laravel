<?php 
namespace Daoo\Aula01Projeto02\classes\logs;

//	"----src/---/classes/Atleta.php
use Daoo\Aula01Projeto02\classes\Atleta as AtletaData;

class StaticRelatorio {
	public static function log(AtletaData $atleta){
		echo "\nLog:\n".$atleta;
	}
}