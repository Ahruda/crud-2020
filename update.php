<?php
	include("conexao.php");

	// Cria as variáveis com os posts enviados

	$id = $_POST['id'];

	$sql = "select * from comentarios where id = $id";

	$result = mysqli_query($conn, $sql);

	if($result){
		$json = array();
		
		$row = mysqli_fetch_assoc($result);
		
		$json['id'] = $id;
		$json['nome'] = $row['nome'];
		$json['comentario'] = $row['comentario'];

		echo json_encode($json);

	}else{
		echo false;
	}
?>