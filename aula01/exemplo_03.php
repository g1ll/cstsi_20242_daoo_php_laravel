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
}

$pessoaUm = new Pessoa("Gill",34);
$pessoaDois = new Pessoa("Vera",60,1.55,89);

var_dump($pessoaUm, $pessoaDois);