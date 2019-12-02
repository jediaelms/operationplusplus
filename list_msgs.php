<?php
require('validate.php');
$title = "Operation++ - Registro";
$H1_Title = "Central de Mensagens";
$link = "";
$table = "tables/msg.php";
$content =  $table;
require("blank.php");
?>
<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
<script>
$(".fa-plus-circle").parent().remove();
</script>