<?php include('includes/header.php') ?>


<!-- // ================================== | MAIN CONTAINER | ================================== \\ -->
<section class="section-container">
	<?php include('includes/main-header.php'); ?>
	<main class="main-container">
		<h1>Cadastros Gerais  |  Avatar Usuários</h1>
		<hr>

		<hr>
		<section class="botoes-adicionais">
			<a class="btn btn-success" href="<?=HOST_GERENCIADOR?>cadastrar_usuario">
				<i class="fas fa-plus-circle"></i> Adicionar
			</a>
		</section>
		


		<style>
			.listar_usuario{
				width: 100%;
				display: flex;
				flex-wrap: wrap;
				align-content: flex-start;
			}
			.listar_usuario article{
				width: 100%;
				border-top: 2px solid <?=$cor_1?>;
				border-radius: 0px 0px 4px 4px;
				box-shadow: 2px 2px 11px -1px rgb(0 0 0 / 6%);
				padding: 0.5rem;
				display: flex;
				height: 100%;
			}
			.listar_usuario article figure{
				margin: 0;
				width: 50%;
				display: flex;
				align-items: center;
			}
			.listar_usuario article div{
				width: 100%;
				display: flex;
				flex-wrap: wrap;
			}
			.listar_usuario article span{
				padding: 0.2rem 0.4rem;
				border-radius: 4px;
				width: auto;
				background: <?=$cor_1?>;
				color: white;
				font-weight: 400;
				font-size: 0.65rem;
			}
			.listar_usuario article small{
				display: block;
				font-size: 0.70rem;
				color: #73757E;
			}
			.listar_usuario article h2{
				font-size: 1rem;
				margin-bottom: 1.5rem;
			}
			.listar_usuario article img{
				height: 65px;
				width: 65px;
				border-radius: 100%;
				object-fit: cover;
				object-position: center;
			}
			.listar_usuario article .buttons{
				display: flex;
				width: 100%;
				justify-content: end;
			}
			.listar_usuario article .buttons > *{
				padding: 0.4rem;
				min-height: 30px;
				max-height: 30px;
				min-width: 40px;
				max-width: 40px;
				margin-left: 0.4rem;
			}
			.listar_usuario article .buttons > * i{
				margin: 0;
				font-size: 0.8rem;
			}
		</style>
		<section class="listar_usuario">
			<?php 
			$ls_usuario = $banco->query('select * from usuario where id != "1" order by permissao asc, nome asc')->fetchAll();
			foreach($ls_usuario as $usuario){ ?>
			<div class="col-12 col-sm-4 col-xxl-3 p-3">
				<article>
					<figure>
						<?php 
						if(file_exists('source/usuario/imagem/'.$usuario['imagem'])){ ?>
						<a href="<?=HOST_GERENCIADOR?>source/usuario/imagem/<?=$usuario['imagem']?>" data-fancybox="gallery">
							<img src="<?=HOST_GERENCIADOR?>source/usuario/imagem/<?=$usuario['imagem']?>" alt="<?=$usuario['nome']?>">
						</a>
						<?php }else{ ?>
							<a href="<?=HOST_GERENCIADOR?>source/images/user.webp" data-fancybox="gallery">
								<img src="<?=HOST_GERENCIADOR?>source/images/user.webp" alt="<?=$usuario['nome']?>">
							</a>
						<?php } ?>
					</figure>
					<div>
						<div class="w-100 d-flex justify-content-end">
							<span><?=date("d/m/Y", strtotime($usuario['data_alteracao']))?></span>
						</div>
						<div class="w-100 d-flex">
							<small>Usuário</small>
							<h2 class="w-100">
								<?=$usuario['nome']?>
							</h2>
						</div>
						<div class="buttons">
							<a class="btn btn-warning" href="<?=HOST_GERENCIADOR?>alterar_usuario/<?=$usuario['id']?>/<?=retirar_acento_espaco($usuario['nome'])?>">
								<i class="fa fa-edit"></i>
							</a>
							<a class="btn btn-danger excluir" data-href="<?=HOST_GERENCIADOR?>core/excluir-registro.php?id_deletado=<?=$usuario['id']?>&tabela=usuario">
								<i class="fa fa-close"></i>
							</a>
						</div>
					</div>
				</article>
			</div>
			<?php } ?>
		</section>		



	</main>
</section>



<div id="verifica_posicao"></div>
<script type="text/javascript">
    $(document).ready(function(){
      $(".atualizar-posicao").change(function(){
        var valor  = $(this).val();
        var idzera = $(this).data("id_usuario");
        var tabela = "usuario";

        $.ajax({
            url: "pages/verifica_posicao.php?id="+idzera+"&valor="+valor+"&tabela="+tabela,
            success: function (result) {
                $("#verifica_posicao").html(result);
            },
        });

      });
    });
</script>



<script>
	$("table a.btn-danger").click(function(e){
		var ahref = $(this);
		Swal.fire({
		  title: 'Você deseja excluir este registro? Não é possível recuperar este registro após a ação',
		  showDenyButton: false,
		  showCancelButton: true,
		  confirmButtonText: 'Excluir',
		  denyButtonText: `Cancelar`,
		  icon: 'info',
		}).then((result) => {
		  /* Read more about isConfirmed, isDenied below */
		  if (result.isConfirmed) {
		    window.location.href = ahref.data('href');
		    ahref.fadeOut(500);
		  }
		})

		e.preventDefault();
		e.stopPropagation();
	});
</script>
<!-- \\ ======================================================================================== // -->

