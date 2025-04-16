<?php include('includes/header.php') ?>


<!-- // ================================== | MAIN CONTAINER | ================================== \\ -->

<?php
// // ========================= | VERIFICA E CADASTRA PÁGINAS | ========================= \\
$ls_pasta = diretorio('../pages/');
foreach($ls_pasta as $pasta){

    $pagina_exist = $banco->query('select * from pagina where url = "'.$pasta.'"')->fetchAll();
    if(!$pagina_exist){

        $sql['nome']             = str_replace(array(".php","-"), array(""," "), $pasta);
        $sql['url']              = $pasta;
        $sql['url_sem_extencao'] = str_replace(array(".php",".html"),array("",""),$pasta);
        $sql['url_configuravel'] = str_replace(array(".php",".html"),array("",""),$pasta);

        $action = $banco->prepare('insert into pagina 
				(
					nome,
					url,
					url_sem_extencao,
					url_configuravel
				)
		  values(
					:nome,
					:url,
					:url_sem_extencao,
					:url_configuravel
				)')->execute($sql);

    }
}
// \\ =================================================================================== // ?> 




<section class="section-container">
	<?php include('includes/main-header.php'); ?>
	<main class="main-container">
		
		<h1>Páginas</h1>

		<hr>


		<section class="botoes-adicionais">
			<a class="btn btn-success" href="<?=HOST_GERENCIADOR?>cadastrar_pagina">
				<i class="fas fa-plus-circle"></i> Adicionar
			</a>
		</section>


		<section class="container-tabela">			
			<table id="table-search" class="table">
		        <thead>
		            <tr>
		                <th>#</th>
		                <th>Nome</th>
		                <th>Menus</th>
		            </tr>
		        </thead>
	        	<?php 
        		$ls_pagina = $banco->query('select * from pagina')->fetchAll();
	        	// // ========================== | FOREACH | ========================== \\
	        	foreach($ls_pagina as $pagina){ ?>
		            <tr>
		                <td width="5%"><?=$pagina['id']?></td>
		                <td width="80%"><?=$pagina['nome']?></td>
		                <td  width="5%">
		                	<a class="btn btn-primary" href="<?=HOST?><?=str_replace('.php','',$pagina['url'])?>" target="_blank">
		                		<i class="fas fa-external-link"></i>
		                	</a>
		                	<a href="<?=HOST_GERENCIADOR?>alterar_pagina/<?=$pagina['id']?>/<?=retirar_acento_espaco($pagina['nome'])?>" class="btn btn-warning">
		                		<i class="fa fa-edit m-0"></i>
		                	</a>
		                	<a data-href="<?=HOST_GERENCIADOR?>core/excluir-registro.php?id_deletado=<?=$pagina['id']?>&tabela=pagina" class="btn btn-danger excluir">
		                		<i class="fa fa-close m-0"></i>
		                	</a>
		                </td>
		            </tr>
	        	<?php }
	        	// \\ ================================================================= // ?>
		    </table>
		</section>
		  

	</main>
</section>
