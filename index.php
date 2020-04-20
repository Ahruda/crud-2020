<!--
	Criado por: Leonardo Galbiere Arruda
	---20/04/2020---
-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
 	<link rel="stylesheet" href="sweetAlert/dist/sweetalert2.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>

<body>
	<!--Conteudo-->
	<div>
		<!-- Begin Page Content -->
		<div class="container">
			<br>
			<h3 class="h3 mb-2 text-gray-800">CRUD (Create, Read, Update, Delete)</h3> 

			<br><hr><br>

			<div class="row">
				<div class="col-md-9"></div>
				<div class="col-md-2">
					<button class="btn btn-primary" onclick="abreModal()">Novo comentário</button>
				</div>
				<div class="col-md-1"></div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10" style="border-style: groove;" >
					<br>
					<div id="table"></div>
					<br>
				</div>
				<div class="col-md-1"></div>
			</div>

		</div>	

		<!-- MODAL DO CADASTRO -->
		<div class="modal fade" id="modalInsert" tabindex="-1" role="dialog">
	        <div class="modal-dialog">
	            <!-- Modal content-->
	            <div class="modal-content">
	                <div class="modal-body">
	                    <form>
	                    	<h2 class="h2 mb-2 text-gray-800">Novo comentário</h2>
	                    	<hr>
	                    	
	                    	<div class="row">
	                    		<div class="col-md-1"></div>
	                    		<div class="col-md-10">
	                    			<label for="basic-url">Nome</label>
									<div class="input-group mb-3">
									  <input type="text" class="form-control" id="nome" placeholder="Insira seu nome aqui" required>
									</div>
	                    		</div>
	                    		<div class="col-md-1"></div>
	                    	</div>

	                    	<div class="row">
	                    		<div class="col-md-1"></div>
	                    		<div class="col-md-10">
	                    			<label for="basic-url">Comentário</label>
									<div class="input-group mb-3">
									  <input type="text" class="form-control" id="comentario" placeholder="Insira seu comentário aqui">
									</div>
	                    		</div>
	                    		<div class="col-md-1"></div>
	                    	</div>
	                    </form>
	                    <p>&nbsp;</p>
	                    <div class="row">
	                    	<div class="col-md-1"></div>
	                    	<div class="col-md-10 text-right" style="">
	                    		<button class="btn btn-danger" onclick="fechaModal();">Cancelar</button>
	                    		<button class="btn btn-primary" onclick="cadastrar();">Cadastrar</button>
	                    	</div>
	                    	<div class="col-md-1"></div>
	             		</div>
	                </div>
	            </div>
	        </div>
	    </div>

	    <!-- MODAL PARA UPDATE -->
		<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog">
	        <div class="modal-dialog">
	            <!-- Modal content-->
	            <div class="modal-content">
	                <div class="modal-body">
	                    <form>
	                    	<h2 class="h2 mb-2 text-gray-800">Alterar comentário</h2>
	                    	<hr>
	                    	
							<input type="hidden" id="idUpdate" >

	                    	<div class="row">
	                    		<div class="col-md-1"></div>
	                    		<div class="col-md-10">
	                    			<label for="basic-url">Nome</label>
									<div class="input-group mb-3">
									  <input type="text" class="form-control" id="nomeUpdate" placeholder="Insira seu nome aqui" required>
									</div>
	                    		</div>
	                    		<div class="col-md-1"></div>
	                    	</div>

	                    	<div class="row">
	                    		<div class="col-md-1"></div>
	                    		<div class="col-md-10">
	                    			<label for="basic-url">Comentário</label>
									<div class="input-group mb-3">
									  <input type="text" class="form-control" id="comentarioUpdate" placeholder="Insira seu comentário aqui">
									</div>
	                    		</div>
	                    		<div class="col-md-1"></div>
	                    	</div>
	                    </form>
	                    <p>&nbsp;</p>
	                    <div class="row">
	                    	<div class="col-md-1"></div>
	                    	<div class="col-md-10 text-right" style="">
	                    		<button class="btn btn-danger" onclick="fechaModal();">Cancelar</button>
	                    		<button class="btn btn-primary" onclick="update();">Alterar comentário</button>
	                    	</div>
	                    	<div class="col-md-1"></div>
	             		</div>
	                </div>
	            </div>
	        </div>
	    </div>


	</div>

	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>

<script>

		window.onload = initPage;

		function initPage(){
			read_data();
		}

		function botao(){
			Swal.fire({
				icon: 'success',
				title: 'Boaaa...',
				text: 'Parece que o sweet alert está funcionando!',
				footer: '<a href>Agora use isso bastante</a>'
			})
		}

		function read_data() {
			$( '#table' ).load( 'read.php' );
		}
		function abreModal() {
			$('input, textarea').val('');
			$('#modalInsert').modal('show');
		}
		function abreModalUpdate() {
			$('input, textarea').val('');
			$('#modalUpdate').modal('show');
		}
		function fechaModal() {
			$('#modalInsert').modal('hide');
			$('#modalUpdate').modal('hide');
		}

		function cadastrar() {
			
			// Pega os valores dos inputs e coloca nas variáveis
	        var nome = $('#nome').val();
	        var comentario = $('#comentario').val();
			 
				// Método post do Jquery
	        $.post('create.php', {
	            nome:nome,
	            comentario:comentario //ultima variavel vai sem a virgula
	        }, 
	        function(resposta){
	            // Valida a resposta
	            if(resposta == 1){
	                //Limpa os inputs
	                alert_success('Cadastro realizado com sucesso!');
	                fechaModal();
	                read_data();
	            }else {
	                alert_error(resposta);
	                read_data();
	            }
	        });
		}

		function delete_confirmation(id){
			Swal.fire({
			  title: 'Você tem certeza que deseja excluir?',
			  text: "Isso não poderá ser desfeito no futuro",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Sim, excluir isso!'
			})
			.then((result) => {
			  if (result.value) {
			    $.post('delete.php', {
	            	id:id
	            }, 
		        function(resposta){
		            // Valida a resposta
		            if(resposta == 1){			              
		                alert_success('Excluido com sucesso!');
		                read_data();
		            }else {
		                alert_error('Ocorreu um erro ao excluir!');
		                read_data();
		            }
		        });
			  }
			})
		}

		function modal_update(id){
			
				abreModalUpdate();
				var parametros = {
					id:id
				};
			$.ajax({
			     url : "update.php",
			     type : 'post',
			     dataType: 'JSON',
			     data : parametros,
			     beforeSend : function(){
			        //alert("Buscando dados...");
			     }
			})
			.done(function(json){
				$('#idUpdate').val(json.id);
				$('#nomeUpdate').val(json.nome);	//coloca os dados do array no modal
				$('#comentarioUpdate').val(json.comentario);
			})
			.fail(function(jqXHR, textStatus, msg){
			    alert(msg);
			}); 
		}

		function update() {

			// Pega os valores dos inputs e coloca nas variáveis
			var parametros = {
					id : $('#idUpdate').val(),
	        	nome : $('#nomeUpdate').val(),
	        	comentario : $('#comentarioUpdate').val()
				};
				
			$.ajax({
		    	url : "update2.php",
		        type : 'post',
		   	    dataType: 'html',
		   	    data : parametros,
		    	beforeSend : function(){
		     		//alert("alterando comentario....");
		     	}
			})
			.done(function(resposta){
				fechaModal();
				read_data();
				if(resposta != null){
					alert_success("O comentario foi alterado com sucesso!");
				}else{
					alert_error("Ocorreu um erro ao alterar seu comentario!");
				}
			})
			.fail(function(jqXHR, textStatus, msg){
				alert_error("Ocorreu o seguinte erro na chamada Ajax: "+msg);
			}); 
		}

		function alert_error(mensagem){
			Swal.fire({
			  icon: 'error',
			  title: 'Oops...',
			  text: mensagem
			})
		}

		function alert_success(mensagem){
			Swal.fire({
				icon: 'success',
				title: 'Sucesso',
				text: mensagem
			})
		}
		
</script>

<!-- Bootstrap core JavaScript-->
<script src="sweetAlert/dist/sweetalert2.all.min.js"></script>
<script src="sweetAlert/dist/sweetalert2.min.js"></script>

<script src="jquery/jquery.js"></script>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>

<!-- Core plugin JavaScript-->

