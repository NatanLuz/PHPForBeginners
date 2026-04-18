<?php 

// trabalhando com manipulação de arquivos
// com php

/**
 * Gera um arquivo CSV a partir de um array bidimensional.
 *
 * @param string $nomeArquivo Caminho/nome do arquivo CSV.
 * @param array $users Dados a serem escritos no CSV.
 * @return bool Retorna true em caso de sucesso e false em caso de erro.
 */
function gerarArquivosCsv($nomeArquivo, $users)
{
    // Verifica se há dados para escrever.
    if (count($users) === 0) {
        echo "Não há dados para inserir no CSV." . PHP_EOL;
        return false;
    }

    echo "Array com dados a serem inseridos." . PHP_EOL;

    // Abre (ou cria) o arquivo em modo escrita.
    // Se já existir, o conteúdo antigo será sobrescrito.
    $arquivo = fopen($nomeArquivo, 'w');

    if ($arquivo === false) {
        echo "Erro ao abrir/criar o arquivo: {$nomeArquivo}" . PHP_EOL;
        return false;
    }

    // Percorre cada linha do array e grava no CSV.
    // Usamos ';' como separador, comum em planilhas no padrão PT-BR.
    foreach ($users as $linha) {
        if (!is_array($linha)) {
            echo "Linha inválida encontrada e ignorada." . PHP_EOL;
            continue;
        }

        $resultadoEscrita = fputcsv($arquivo, $linha, ';');

        if ($resultadoEscrita === false) {
            echo "Erro ao escrever uma linha no CSV." . PHP_EOL;
            fclose($arquivo);
            return false;
        }
    }

    // Fecha o arquivo para garantir que os dados sejam salvos.
    fclose($arquivo);

    echo "Arquivo CSV gerado com sucesso em: {$nomeArquivo}" . PHP_EOL;
    return true;
}

/**
 * Lê um arquivo CSV e retorna os dados em formato de array.
 *
 * @param string $nomeArquivo Caminho/nome do arquivo CSV.
 * @return array Retorna um array com as linhas lidas. Em erro, retorna array vazio.
 */
function lerArquivoCsv($nomeArquivo)
{
    // Confere se o arquivo existe antes de tentar abrir.
    if (!file_exists($nomeArquivo)) {
        echo "Arquivo não encontrado para leitura: {$nomeArquivo}" . PHP_EOL;
        return [];
    }

    // Abre o arquivo em modo leitura.
    $arquivo = fopen($nomeArquivo, 'r');

    if ($arquivo === false) {
        echo "Erro ao abrir o arquivo para leitura: {$nomeArquivo}" . PHP_EOL;
        return [];
    }

    $dados = [];

    // Lê linha por linha até o final do arquivo.
    while (($linha = fgetcsv($arquivo, 0, ';')) !== false) {
        $dados[] = $linha;
    }

    fclose($arquivo);

    echo "Leitura do CSV concluída com sucesso." . PHP_EOL;
    return $dados;
}

/**
 * Acrescenta novos usuários em um CSV já existente sem apagar o conteúdo antigo.
 *
 * @param string $nomeArquivo Caminho/nome do arquivo CSV.
 * @param array $novosUsers Linhas que serão adicionadas ao final do CSV.
 * @return bool Retorna true em caso de sucesso e false em caso de erro.
 */
function adicionarUsuariosCsv($nomeArquivo, $novosUsers)
{
    if (count($novosUsers) === 0) {
        echo "Não há novos usuários para adicionar." . PHP_EOL;
        return false;
    }

    // Modo 'a' (append): adiciona no final sem sobrescrever o arquivo.
    $arquivo = fopen($nomeArquivo, 'a');

    if ($arquivo === false) {
        echo "Erro ao abrir o arquivo em modo append: {$nomeArquivo}" . PHP_EOL;
        return false;
    }

    foreach ($novosUsers as $linha) {
        if (!is_array($linha)) {
            echo "Linha inválida encontrada e ignorada no append." . PHP_EOL;
            continue;
        }

        $resultadoEscrita = fputcsv($arquivo, $linha, ';');

        if ($resultadoEscrita === false) {
            echo "Erro ao adicionar uma linha no CSV." . PHP_EOL;
            fclose($arquivo);
            return false;
        }
    }

    fclose($arquivo);

    echo "Novos usuários adicionados com sucesso em: {$nomeArquivo}" . PHP_EOL;
    return true;
}




$users =[
     ["nome", "idade", "E-mail"],
     ["João", 25,"joao@email.com"],
     ["Maria", 24,"maria@gmail.com"],
     ["Pedro", 45,"pedro@email.com"],
     ["Tiago", 36,"tiago@email.com"],
];

// Exibe o array para visualizar a estrutura dos dados.
var_dump($users);

// Gera um arquivo CSV com os dados do array $users.
// __DIR__ aponta para a pasta atual deste arquivo PHP.
$nomeArquivo = __DIR__ . '/usuarios.csv';
gerarArquivosCsv($nomeArquivo, $users);

echo PHP_EOL . "==== LEITURA INICIAL DO CSV ====" . PHP_EOL;
$dadosLidos = lerArquivoCsv($nomeArquivo);
print_r($dadosLidos);

// Novos usuários para demonstrar o append (sem apagar o arquivo).
$novosUsers = [
        ["Carla", 29, "carla@email.com"],
        ["Rafael", 31, "rafael@email.com"],
];

echo PHP_EOL . "==== ADICIONANDO NOVOS USUÁRIOS (APPEND) ====" . PHP_EOL;
adicionarUsuariosCsv($nomeArquivo, $novosUsers);

echo PHP_EOL . "==== LEITURA FINAL DO CSV (COM APPEND) ====" . PHP_EOL;
$dadosAtualizados = lerArquivoCsv($nomeArquivo);
print_r($dadosAtualizados);

/*
MINI EXERCÍCIO GUIADO (INICIANTES)

Objetivo: praticar escrita, leitura e append no mesmo arquivo CSV.

Passo 1:
- Altere o array $novosUsers adicionando 2 pessoas novas.

Passo 2:
- Execute o script novamente e verifique no terminal se os novos dados apareceram
    na seção "LEITURA FINAL DO CSV".

Passo 3:
- Crie um if para impedir e-mail sem "@" no append.
    Dica: use strpos($linha[2], '@') === false para validar.

Passo 4:
- Desafio extra: crie uma função para contar quantas linhas existem no CSV
    (sem contar o cabeçalho) e exiba esse total no final.
*/