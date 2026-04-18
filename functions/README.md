# Functions

## O que sao funcoes em PHP

Funcoes em PHP sao blocos de codigo reutilizaveis que executam uma tarefa especifica.
Em vez de repetir o mesmo codigo varias vezes, voce cria uma funcao e chama quando precisar.

## Por que funcoes sao importantes

- melhoram a organizacao do codigo
- evitam repeticao
- facilitam manutencao e leitura
- tornam testes e correcoes mais simples
- ajudam voce a pensar em partes menores de um problema

## Topicos abordados neste modulo

- user-defined functions
- parameters and arguments
- return values
- anonymous functions
- arrow functions
- first-class callable

## Organizacao dos arquivos

Esta pasta segue uma ordem progressiva para facilitar o estudo:

- 00_indice_funcoes.php: visao geral do modulo
- 01_user_defined_functions.php: funcoes criadas por voce
- 02_parameters_and_arguments.php: entrada de dados em funcoes
- 03_returning_values.php: retorno de resultados
- 04_variable_functions.php: chamada dinamica por nome
- 05_internal_functions.php: funcoes internas do PHP
- 06_anonymous_functions.php: funcoes sem nome
- 07_arrow_functions.php: sintaxe curta de funcoes
- 08_first_class_callable.php: callable com sintaxe moderna
- 09_functions_overview.php: resumo pratico do tema

Padrao de nomenclatura:

- prefixo numerico 01*, 02*, 03\_... indica sequencia recomendada de estudo
- arquivos exercise1.php e exercise2.php sao para pratica

## Exercicios praticos

### Exercicio 1

Crie uma funcao chamada calculateFinalPrice que receba:

- preco do produto
- percentual de desconto

Regras:

- a funcao deve retornar o valor final com desconto aplicado
- exiba o resultado final com duas casas decimais

### Exercicio 2

Crie uma funcao chamada classifyGrade que receba uma nota de 0 a 10 e retorne:

- Excellent para nota maior ou igual a 9
- Good para nota maior ou igual a 7 e menor que 9
- Regular para nota maior ou igual a 5 e menor que 7
- Failed para nota menor que 5

Depois, teste a funcao com pelo menos 5 notas diferentes.

## Desafio pratico (situacao real)

Voce foi chamado para ajudar em um sistema simples de pedidos de uma lanchonete.

Crie funcoes para:

- calcular subtotal de itens
- aplicar taxa de entrega (gratis para subtotal acima de um valor definido por voce)
- aplicar cupom de desconto opcional
- retornar total final do pedido

Requisitos:

- use pelo menos uma funcao com parametro padrao
- use pelo menos uma funcao com return
- organize o fluxo em etapas claras

Objetivo do desafio:

Simular um problema real usando composicao de funcoes, com foco em clareza e reutilizacao.
