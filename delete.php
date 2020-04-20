<?php
	include("conexao.php");

	// Cria as variáveis com os posts enviados
	$id = $_POST['id'];

	$sql = "delete from comentarios where id = $id";
	$result = mysqli_query($conn, $sql);

	// Valida o sql foi executado com sucesso
	if($result){
		echo true;
	}else{
		echo false;
	}
?>