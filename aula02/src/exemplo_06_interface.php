<?php 

echo "<pre>";

use Daoo\Aula02\classes\Arbitro;
use Daoo\Aula02\classes\Atleta;
use Daoo\Aula02\classes\JogadorDefesa;
use Daoo\Aula02\interfaces\IMC;

function esperaObjetoQueImplementaIMC(IMC $pessoaComIMC){
    $pessoaComIMC->showImc();
};

$atl1 = new Atleta("Walter Kannemann",33,1.84,83);
$arbi = new Arbitro("Anderson Daronco",43,'Juiz',1.88,90);

$atl2 = new JogadorDefesa("Pedro Geromel",36, 1.83,75);

// esperaObjetoQueImplementaIMC($atl2);
esperaObjetoQueImplementaIMC($atl1);
esperaObjetoQueImplementaIMC($arbi);