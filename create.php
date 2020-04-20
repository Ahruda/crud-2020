<?php
	include("conexao.php");

	// Cria as variáveis com os posts enviados
	$nome = $_POST['nome'];
	$comentario = $_POST['comentario'];


	$sql = "insert into comentarios values(NULL,'$nome','$comentario')";
	$result = mysqli_query($conn, $sql);

	// Valida se as informações foram enviadas com sucesso
	if($result){
		echo true;
	}else{
		echo 'Erro ao cadastrar';
	}
?>