<?php
require('../conexao.php');
$sql = "SELECT COUNT(*) as qtd, MONTH(horario) as mes, YEAR(horario) as ano FROM operacao WHERE `horario` BETWEEN DATE_SUB(now(), INTERVAL 6 MONTH) AND CURRENT_DATE() GROUP BY YEAR(horario), MONTH(horario) ORDER BY ano, mes ASC;";
if($result = $mysqli->query($sql)){
    while ($row = $result->fetch_assoc())
    {
        $messages[] = $row;
    }
    echo json_encode($messages, JSON_PRETTY_PRINT);
}
?>