<?php 
require "vendor/autoload.php";

use Daoo\Aula02\classes\Atleta;
use Daoo\Aula02\classes\Medico;
use utilphp\util as utl;

$atl1 = new Atleta("Pedro Geromel",36, 1.83,75);
$med1 = new Medico("Paulo Paixão",122343,"Fisioterapeuta");

$atl1->showImc();
$med1->showImc();

echo "\nutil: ".utl::remove_accents($med1->nome);

