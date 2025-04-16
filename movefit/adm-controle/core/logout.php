<?php
include('../lib/config.php');
session_destroy();
?>
<title>Logout</title>
<script>
	window.location.href = '<?=HOST_GERENCIADOR?>login';
</script>