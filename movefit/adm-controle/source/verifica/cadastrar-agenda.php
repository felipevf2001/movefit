<?php 
include('../includes/control-core-gerenciador.php');


// // ========================================= | CRUD | ========================================= \\
$lead  = $banco->query('select * from lead        where id = "'.$_POST['id_lead'].'"')->fetch();
$etapa = $banco->query('select * from etapa_funil where id = "'.$lead['id_etapa'].'"')->fetch();

$sql['id_usuario']      = $_SESSION['ID_GERENCIADOR'];
$sql['id_lead']         = $lead['id'];
$sql['id_etapa']        = $etapa['id'];
$sql['id_tipo_contato'] = $_POST['id_tipo_contato'];
$sql['id_status']       = "1";
$sql['data']            = $_POST['data'];
$sql['hora']            = $_POST['hora'];
$sql['data_cadastro']   = date('Y-m-d H:i:s');

$action = $banco->prepare('insert into agenda
        (
            id_usuario,
            id_lead,
            id_etapa,
            id_tipo_contato,
            id_status,
            data,
            hora,
            data_cadastro
        )
  values(
            :id_usuario,
            :id_lead,
            :id_etapa,
            :id_tipo_contato,
            :id_status,
            :data,
            :hora,
            :data_cadastro
        )')->execute($sql);
// \\ ============================================================================================ //


if($action){ ?>
    <script>
        Swal.fire(
            'Ok!',
            'Adicionado a sua agenda!',
            'success'
        )
    </script>
<?php } ?>