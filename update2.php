<?php
	include("conexao.php");

	// Cria as variáveis com os posts enviados
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$comentario = $_POST['comentario'];

	$sql = "update comentarios SET 
	nome = '$nome',
	comentario = '$comentario' 
	where id = $id";
	
	$result = mysqli_query($conn, $sql);

	// Valida se as informações foram enviadas com sucesso
	if($result){
		echo true;
	}else{
		echo false;
	}
?>