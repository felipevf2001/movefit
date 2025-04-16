<?php include('includes/header.php') ?>


<!-- // ================================== | MAIN CONTAINER | ================================== \\ -->
<section class="section-container">
	<?php include('includes/main-header.php'); ?>
	<main class="main-container">
		
		<h1>Cliente  |  Listagem</h1>

		<hr>

		<section class="container-tabela">			
			<table id="table-search" class="table">
		        <thead>
		            <tr>
		                <th>#</th>
		                <th>Imagem</th>
		                <th>Nome</th>
		                <th>E-mail</th>
		                <th>Data Cadastro</th>
		                <th>Menus</th>
		            </tr>
		        </thead>
	        	<?php 
        		$ls_cliente = $banco->query('select * from cliente')->fetchAll();
	        	// // ========================== | FOREACH | ========================== \\
	        	foreach($ls_cliente as $cliente){ ?>
		            <tr>
		                <td width="5%"><?=$cliente['id']?></td>
		                <td width="10%">
		                	<img src="<?=HOST?>source/cliente/imagem/<?=$cliente['imagem']?>" class="w-100" alt="">
		                </td>
		                <td width="50%">
		                	<b><?=$cliente['nome']?></b>
	                	</td>
		                <td width="10%"><?=$cliente['email']?></td>		               
		                <td width="15%"><?=date("d/m/Y H:i:s", strtotime($cliente['data_cadastro']))?></td>		               
		                <td  width="5%">
		                	<a href="<?=HOST_GERENCIADOR?>alterar_cliente/<?=$cliente['id']?>/<?=retirar_acento_espaco($cliente['nome'])?>" class="btn btn-primary">
		                		<i class="fa fa-external-link m-0"></i>
		                	</a>
    						<?php 
    						// // ========= | PARA O ADMIN | ========= \\
    						if($usuario['permissao'] == "1"){ ?>
    	                	<a data-href="<?=HOST_GERENCIADOR?>core/excluir-registro.php?id_deletado=<?=$cliente['id']?>&tabela=cliente" class="btn btn-danger excluir">
    	                		<i class="fa fa-close m-0"></i>
    	                	</a>
    						<?php }
    						// \\ ==================================== // ?>
		                </td>
		            </tr>
	        	<?php }
	        	// \\ ================================================================= // ?>
		    </table>
		</section>
		  

	</main>
</section>
