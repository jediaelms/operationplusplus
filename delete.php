<?php
    if(isset($_GET) && isset($_GET['campo']) && !empty($_GET['campo']) && isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['tabela']) && !empty($_GET['tabela'])){
        require('validate.php');
        if($_GET['tabela'] == 'instrucao')
        {
            $sql = "DELETE FROM `instrucao_tipo_operacao` WHERE `instrucao_cod_instrucao` = '{$_GET['id']}'";
            $query = $mysqli->query($sql);
        }
        $sql = "DELETE FROM `{$_GET['tabela']}` WHERE `{$_GET['campo']}` = '{$_GET['id']}'";
        $result = $mysqli->query($sql);
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