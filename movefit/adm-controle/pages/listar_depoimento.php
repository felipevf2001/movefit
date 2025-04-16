<?php include('includes/header.php') ?>


<!-- // ================================== | MAIN CONTAINER | ================================== \\ -->
<section class="section-container">
	<?php include('includes/main-header.php'); ?>
	<main class="main-container">
		
		<h1>Depoimentos  |  Listagem</h1>

		<hr>

		<section class="botoes-adicionais">
			<a class="btn btn-success" href="<?=HOST_GERENCIADOR?>cadastrar_registro?tabela=depoimento&id_idioma=<?=$id?>">
				<i class="fas fa-plus-circle"></i> Adicionar
			</a>
		</section>


		<section class="container-tabela">			
			<table id="table-search" class="table">
		        <thead>
		            <tr>
		                <th>#</th>
		                <th>Imagem</th>
		                <th>Nome</th>
		                <th>Título</th>
		                <th>Descrição</th>
		                <th>Data Cadastro</th>
		                <th>Posição</th>
		                <th>Menus</th>
		            </tr>
		        </thead>
	        	<?php 
        		$ls_depoimento = $banco->query('select * from depoimento')->fetchAll();
	        	// // ========================== | FOREACH | ========================== \\
	        	foreach($ls_depoimento as $depoimento){
	        	$cliente = $banco->query('
	        		select * from cliente
	        			where
	        				id = "'.$depoimento['id_cliente'].'"')->fetch(); ?>
		            <tr>
		                <td width="5%"><?=$depoimento['id']?></td>
		                <td width="10%">
		                	<img src="<?=HOST?>source/cliente/imagem/<?=$cliente['imagem']?>" class="w-100" alt="">
		                </td>
		                <td width="25%">
		                	<b><?=$cliente['nome']?></b>
	                	</td>
		                <td width="10%"><?=$depoimento['titulo']?></td>		               
		                <td width="15%"><?=$depoimento['descricao']?></td>		               
		                <td width="15%"><?=date("d/m/Y H:i:s", strtotime($depoimento['data_cadastro']))?></td>		               
		                <td  width="15%">
		                	<input 
		                	    value="<?=$depoimento['posicao']?>" 
		                	    type="number" 
		                	    placeholder="Posição"
		                	    class="form-control atualizar-campo" 
		                	    data-tabela="depoimento"
		                	    data-campo="posicao"
		                	    data-id-campo="<?=$depoimento['id']?>" 
		                	>
		                </td>
		                <td  width="5%">
		                	<a href="<?=HOST_GERENCIADOR?>alterar_depoimento/<?=$depoimento['id']?>/<?=retirar_acento_espaco($depoimento['nome'])?>" class="btn btn-warning">
		                		<i class="fa fa-edit m-0"></i>
		                	</a>
    						<?php 
    						// // ========= | PARA O ADMIN | ========= \\
    						if($usuario['permissao'] == "1"){ ?>
    	                	<a data-href="<?=HOST_GERENCIADOR?>core/excluir-registro.php?id_deletado=<?=$depoimento['id']?>&tabela=depoimento" class="btn btn-danger excluir">
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
