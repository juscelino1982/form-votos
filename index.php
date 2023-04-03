<?php
// Informações do banco de dados
$host = 'localhost';
$user = 'seu_usuario';
$password = 'sua_senha';
$database = 'seu_banco_de_dados';

// Conecta ao banco de dados
$conexao = mysqli_connect($host, $user, $password, $database);

// Verifica se houve erro na conexão
if (mysqli_connect_errno()) {
  die('Falha ao conectar com o banco de dados: ' . mysqli_connect_error());
}
?>
<?php
// Conecta ao banco de dados
require 'db.php';

// Verifica se os dados do formulário foram enviados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Obtém os valores do formulário
  $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
  $idade = mysqli_real_escape_string($conexao, $_POST['idade']);
  $voto = mysqli_real_escape_string($conexao, $_POST['voto']);
  $justificativa = mysqli_real_escape_string($conexao, $_POST['justificativa']);

  // Insere os valores no banco de dados
  $query = "INSERT INTO votos (nome, idade, voto, justificativa) VALUES ('$nome', '$idade', '$voto', '$justificativa')";
  if (mysqli_query($conexao, $query)) {
    echo 'Voto registrado com sucesso!';
  } else {
    echo 'Erro ao registrar o voto: ' . mysqli_error($conexao);
  }

  // Fecha a conexão com o banco de dados
  mysqli_close($conexao);
}
?>
