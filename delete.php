<?php
    if(isset($_GET) && isset($_GET['campo']) && !empty($_GET['campo']) && isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['tabela']) && !empty($_GET['tabela'])){
        require('validate.php');

        $sql = "DELETE FROM `{$_GET['tabela']}` WHERE `{$_GET['campo']}` = '{$_GET['id']}'";
        $result = $conn->query($sql);
        //var_dump($sql);
        /*if ($result) {
            echo "<span style='color: green'>Deletado com sucesso!</span>";
        }
        else{
            echo "Erro.";
        }*/
        echo "<script> history.back(-2); </script>"; 
    }
?>