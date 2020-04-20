<table width="100%" cellspacing="0" border="1">
	
	<tr class="colunas" align="center">
		<th>Código</th>
		<th>Nome</th>
		<th>Comentário</th>
		<th>Alterar</th>
		<th>Excluir</th>
	</tr>

<?php

include("conexao.php");

$sql = "SELECT * FROM comentarios";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
   ?>
		<tr class="colunas" align="center">
			<th><?php echo $row['id'] ?></th>
			<th><?php echo $row['nome'] ?>
				
			</th>
			<th><?php echo $row['comentario'] ?>
				
			</th>
			<th>
				<button class="nav-link" onclick="modal_update(<?php echo $row['id'] ?>);">
					Alterar
				</button>
			</th>
			<th>
				<button class="nav-link" onclick="delete_confirmation(<?php echo $row['id'] ?>);">
					Excluir
				</button>
			</th>
		</tr>
	<?php

    }
} else {
?>
		<tr class="colunas">
			<th colspan="5" style="text-align: center;"><br>Não há nada cadastrado ainda </th>
			
		</tr>
<?php
	}
?>
	</tbody>
</table>