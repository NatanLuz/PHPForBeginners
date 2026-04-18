<?php

require_once __DIR__ . '/Funcionario.php';

/**
 * Departamento agrega funcionarios.
 *
 * Agregacao: o departamento "tem" funcionarios, mas nao e dono do ciclo
 * de vida deles. Ou seja, um Funcionario pode existir sem Departamento
 * e pode ser movido para outro Departamento.
 */
class Departamento
{
	private string $nome;

	/** @var Funcionario[] */
	private array $funcionarios = [];

	public function __construct(string $nome)
	{
		$this->nome = $nome;
	}

	public function getNome(): string
	{
		return $this->nome;
	}

	/**
	 * Adiciona um funcionario no departamento.
	 * Evita duplicidade por ID.
	 */
	public function adicionarFuncionario(Funcionario $funcionario): bool
	{
		foreach ($this->funcionarios as $item) {
			if ($item->getId() === $funcionario->getId()) {
				return false;
			}
		}

		$this->funcionarios[] = $funcionario;
		return true;
	}

	/**
	 * Remove um funcionario do departamento pelo ID.
	 * Retorna o objeto removido para mostrar que ele continua existindo.
	 */
	public function removerFuncionarioPorId(int $id): ?Funcionario
	{
		foreach ($this->funcionarios as $indice => $item) {
			if ($item->getId() === $id) {
				$removido = $item;
				unset($this->funcionarios[$indice]);
				$this->funcionarios = array_values($this->funcionarios);
				return $removido;
			}
		}

		return null;
	}

	/** @return Funcionario[] */
	public function listarFuncionarios(): array
	{
		return $this->funcionarios;
	}

	public function totalFuncionarios(): int
	{
		return count($this->funcionarios);
	}

	public function calcularFolhaMensal(): float
	{
		$total = 0.0;

		foreach ($this->funcionarios as $item) {
			$total += $item->getSalario();
		}

		return $total;
	}

	public function apresentarResumo(): string
	{
		$folha = number_format($this->calcularFolhaMensal(), 2, ',', '.');
		return "Departamento: {$this->nome} | Funcionarios: {$this->totalFuncionarios()} | Folha: R$ {$folha}";
	}
}
