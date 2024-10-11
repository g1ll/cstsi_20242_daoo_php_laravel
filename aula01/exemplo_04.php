<?php 

class Pessoa {
	public $nome, $idade, $altura, $peso;

	function __construct($nome, $idade, $altura=0, $peso=0)
	{
		$this->nome = $nome;
		$this->idade = $idade;
		$this->altura = $altura;
		$this->peso = $peso;
		
	}

	function __destruct()
	{
		echo "\n$this->nome será removido da memória\n";
	}
}

$pessoaUm = new Pessoa("Gill",34);
$pessoaDois = new Pessoa("Vera",60,1.55,89);

$pessoaTres = new Pessoa("Fulano",23);

$pessoaTres = null;

var_dump($pessoaUm, $pessoaDois);

echo "Script será encerrado!!!";