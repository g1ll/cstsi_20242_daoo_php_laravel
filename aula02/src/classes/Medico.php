<?php
namespace Daoo\Aula02\classes;

use Daoo\Aula02\classes\Abstracts\Pessoa;
use Daoo\Aula02\traits\IMC;
// use Daoo\Aula02\classes\Pessoa;

class Medico extends Pessoa{

	use IMC;

	private $CRM, $especialidade;

	public function __construct($nome, $crm,$especialidade,$idade=null)
	{
		$this->nome = $nome;
		$this->CRM = $crm;
		$this->especialidade = $especialidade;
		$this->idade = $idade;
	}

	public function getCRM(){
		return $this->CRM;
	}

	public function __toString()
	{
		$className = self::class;
		return 	"\n=== Dados de $className ==="
			. "\nHerança: ".parent::class
			. "\nAtributos:"
			. "\n\tNome: $this->nome"
			. ($this->idade ? "\n\tIdade: $this->idade" : "")
			. "\n\tEspecialidade: $this->especialidade"
			. "\n\tCRM: $this->CRM\n";
	}
}