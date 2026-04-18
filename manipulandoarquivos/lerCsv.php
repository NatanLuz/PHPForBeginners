<?php

// lendo arquivos csv com php

/**
 * Lê um arquivo CSV e retorna todas as linhas como array numérico.
 *
 * @param string $nomeArquivo Caminho do arquivo CSV.
 * @param string $separador Separador usado no CSV (ex.: ';' ou ',').
 * @return array Lista de linhas lidas.
 */
function lerCsv($nomeArquivo, $separador = ';')
{
  // Mantendo sua ideia original: primeiro validamos se o arquivo existe.
  if (file_exists($nomeArquivo)) {
    echo "Arquivo encontrado e pronto para leitura..." . PHP_EOL;
  } else {
    echo "Arquivo não encontrado, verifique o caminho digitado..." . PHP_EOL;
    return [];
  }

  $arquivo = fopen($nomeArquivo, 'r');

  if ($arquivo === false) {
    echo "Não foi possível abrir o arquivo para leitura." . PHP_EOL;
    return [];
  }

  $dados = [];

  // fgetcsv lê linha por linha e já separa cada coluna em um array.
  while (($linha = fgetcsv($arquivo, 0, $separador)) !== false) {
    $dados[] = $linha;
  }

  fclose($arquivo);
  return $dados;
}

/**
 * Lê o CSV e transforma cada linha em array associativo usando o cabeçalho.
 * Exemplo de saída: ['nome' => 'João', 'idade' => '25', 'E-mail' => 'x@x.com']
 *
 * @param string $nomeArquivo Caminho do arquivo CSV.
 * @param string $separador Separador usado no CSV.
 * @return array Lista de usuários em formato associativo.
 */
function lerCsvAssociativo($nomeArquivo, $separador = ';')
{
  $dados = lerCsv($nomeArquivo, $separador);

  if (count($dados) < 2) {
    // Menos de 2 linhas significa que não há cabeçalho + dados suficientes.
    return [];
  }

  $cabecalho = $dados[0];
  $resultado = [];

  // Começa da linha 1 porque a linha 0 é o cabeçalho.
  for ($i = 1; $i < count($dados); $i++) {
    // array_combine junta [chaves] + [valores] em um array associativo.
    $linhaAssociativa = array_combine($cabecalho, $dados[$i]);

    if ($linhaAssociativa !== false) {
      $resultado[] = $linhaAssociativa;
    }
  }

  return $resultado;
}

/**
 * Acrescenta novas linhas no CSV sem apagar o que já existe.
 * Modo append = 'a'.
 *
 * @param string $nomeArquivo Caminho do arquivo CSV.
 * @param array $novosUsers Novas linhas no formato: ["Nome", idade, "email"]
 * @param string $separador Separador usado no CSV.
 * @return bool
 */
function adicionarUsuariosCsv($nomeArquivo, $novosUsers, $separador = ';')
{
  if (count($novosUsers) === 0) {
    echo "Nenhum usuário novo para adicionar." . PHP_EOL;
    return false;
  }

  $arquivo = fopen($nomeArquivo, 'a');

  if ($arquivo === false) {
    echo "Erro ao abrir arquivo em modo append." . PHP_EOL;
    return false;
  }

  foreach ($novosUsers as $linha) {
    // Validação básica para iniciantes: linha precisa ser um array com 3 colunas.
    if (!is_array($linha) || count($linha) !== 3) {
      echo "Linha inválida ignorada no append." . PHP_EOL;
      continue;
    }

    // Exemplo simples de validação de e-mail.
    if (strpos($linha[2], '@') === false) {
      echo "E-mail inválido ignorado: {$linha[2]}" . PHP_EOL;
      continue;
    }

    fputcsv($arquivo, $linha, $separador);
  }

  fclose($arquivo);
  echo "Novos usuários adicionados com sucesso." . PHP_EOL;
  return true;
}

// Caminho correto do CSV criado na aula anterior.
$nomeArquivo = __DIR__ . '/usuarios.csv';

echo "==== EXEMPLO 1: LEITURA SIMPLES (ARRAY NUMÉRICO) ====" . PHP_EOL;
$dados = lerCsv($nomeArquivo);
print_r($dados);

echo PHP_EOL . "==== EXEMPLO 2: LEITURA ASSOCIATIVA (CABEÇALHO) ====" . PHP_EOL;
$usersAssociativos = lerCsvAssociativo($nomeArquivo);
print_r($usersAssociativos);

echo PHP_EOL . "==== EXEMPLO 3: FILTRAR USUÁRIOS COM 30+ ANOS ====" . PHP_EOL;
$maioresDe30 = array_filter($usersAssociativos, function ($user) {
  return (int) $user['idade'] >= 30;
});
print_r(array_values($maioresDe30));

echo PHP_EOL . "==== EXEMPLO 4: APPEND (SEM APAGAR O CSV) ====" . PHP_EOL;
$novosUsers = [
  ["Larissa", 28, "larissa@email.com"],
  ["Bruno", 33, "bruno@email.com"],
  ["Invalido", 22, "email-sem-arroba"],
];
adicionarUsuariosCsv($nomeArquivo, $novosUsers);

echo PHP_EOL . "==== EXEMPLO 5: LEITURA APÓS APPEND ====" . PHP_EOL;
print_r(lerCsvAssociativo($nomeArquivo));

/*
MINI EXERCÍCIO GUIADO (INICIANTES)

1. Troque os dados de $novosUsers por 3 pessoas da sua escolha.
2. Execute o arquivo e confirme no terminal se elas aparecem no "EXEMPLO 5".
3. Crie uma função contarUsuariosCsv() que retorne a quantidade de usuários
   sem contar o cabeçalho.
4. Desafio extra: filtre e mostre somente os usuários com domínio "gmail.com".
*/