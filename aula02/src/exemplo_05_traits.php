<?php 

echo "<pre>";

use Daoo\Aula02\classes\Atleta;
use Daoo\Aula02\classes\Medico;
use Daoo\Aula02\classes\logs\Relatorio;

// $atl1 = new Jogador("Pedro Geromel",36,1.83,75);
$atl1 = new Atleta("Luizito",36,1.8,80);
$med1 = new Medico("Pualo Paixão",122343,"Fisioterapeuta",80,1.8,90);

$relatorio = new Relatorio;
$relatorio->add($med1);
$relatorio->add($atl1);
$relatorio->imprime();