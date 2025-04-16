<?php 
include('../includes/control-core-gerenciador.php');

error_reporting(0);

// // ========================================= | CRUD | ========================================= \\
$etapa_atual  = $banco->query('select * from etapa_funil where id = "'.$_POST['id_etapa'].'"')->fetch();
if($_POST['button'] == "voltar"){
        $etapa_new = $banco->query('select * from etapa_funil where posicao < "'.$etapa_atual['posicao'].'" order by posicao desc')->fetch();
}elseif($_POST['button'] == "avancar"){
        $etapa_new = $banco->query('select * from etapa_funil where posicao > "'.$etapa_atual['posicao'].'" order by posicao asc')->fetch();
}



$ultima_etapa = $banco->query('select * from etapa_funil order by posicao desc')->fetch();
if($etapa_new < 1 || $etapa_new['posicao'] > $ultima_etapa['posicao']){ ?>
        <script>
                Swal.fire(
                'Erro!',
                'Não é possível avançar/voltar!',
                'error'
                );

                setTimeout(function(){
                        history.go(0);
                },2000);

        </script>  
        <?php
        die();
}



$sql['id_etapa']       = $etapa_new['id'];
$sql['id_motivo']      = $_POST['id_motivo'];
$sql['id']             = $_POST['id_lead'];

$action = $banco->prepare('update lead set
        id_etapa       = :id_etapa,
        id_motivo      = :id_motivo
        where id = :id')->execute($sql);
// \\ ============================================================================================ //


// // ========================================= | CRUD | ========================================= \\
$sql_historico['id_etapa']   = $etapa_new['id'];
$sql_historico['id_usuario'] = $_SESSION['ID_GERENCIADOR'];
$sql_historico['id_motivo']  = $_POST['id_motivo'];
$sql_historico['id_lead']    = $_POST['id_lead'];
$sql_historico['ip']         = get_ip();

$action = $banco->prepare('insert into lead_historico
                (
                        id_etapa,
                        id_usuario,
                        id_motivo,
                        id_lead,
                        ip
                )
         values(
                        :id_etapa,
                        :id_usuario,
                        :id_motivo,
                        :id_lead,
                        :ip
                )')->execute($sql_historico);
// \\ ============================================================================================ //

if($_POST['button'] == "voltar"){ ?>
        <script>
                Swal.fire(
                'Ok!',
                'Lead Voltou com Sucesso!',
                'success'
                )
        </script>  
<?php }elseif($_POST['button'] == "avancar"){ ?>
        <script>
              Swal.fire(
              'Ok!',
              'Lead Avançou com Sucesso! <?=$_POST['id_lead']?>',
              'success'
              )  
        </script>
<?php } ?>

<script>
        var etapa_new_id      = '<?=$etapa_new['id']?>';
        var etapa_new_posicao = '<?=$etapa_new['posicao']?>';
</script>
<script src="<?=HOST?>js/jquery-ui-1.13.1/jquery-ui.min.js"></script>
<?php include('../js/funcoes.php'); ?>