DELIMITER //
 
CREATE PROCEDURE cadAlertaPontual(codPaciente INT(11), titulo VARCHAR(100), dataini DATE)
BEGIN
    INSERT INTO `alerta` (`descricao`, `tipo_alerta`, `data`, `paciente_cod_paciente`) VALUES
    (titulo, b'1', dataini, codPaciente);
    SELECT LAST_INSERT_ID();
END //

CREATE PROCEDURE cadAlertaEspacado(codPaciente INT(11), titulo VARCHAR(100), num INT, dataini DATETIME, datafim DATETIME)
BEGIN
    INSERT INTO `alerta` (`descricao`, `tipo_alerta`, `data`, `paciente_cod_paciente`) VALUES
    (titulo, b'0', dataini, codPaciente);
    
    DECLARE codAlerta INT(11) DEFAULT LAST_INSERT_ID();

    INSERT INTO `alerta_espacado` (`data_ini`, `data_fim`, `num_registros`, `alerta_cod_alerta`) VALUES (dataini, datafim, num, codAlerta);
    SELECT LAST_INSERT_ID();
END //
-- Criar VIEW
CREATE TEMPORARY TABLE idsOperacoes ( id_op int(11) );

CREATE PROCEDURE cadInstrucao(titulo VARCHAR(100), conteudo TEXT())
BEGIN
    CREATE c CURSOR FOR SELECT id_op FROM idsOperacoes;
    DECLARE done INT DEFAULT 0;
    DECLARE CONTINUE HANDLER FOR NOT FOUND done = 1;
    DECLARE id INT(11);
    INSERT INTO `instrucao` (`titulo`, `conteudo`) VALUES (titulo, conteudo);
    DECLARE codInstrucao INT(11) DEFAULT LAST_INSERT_ID();
    OPEN c;
    REPEAT
        FETCH c INTO id;
        INSERT INTO `instrucao_tipo_operacao` (`cod_tip_op`, `instrucao_cod_instrucao`) VALUES (id, codInstrucao);
        UNTIL NOT done;
    END REPEAT;
    CLOSE c;

    DROP TEMPORARY TABLE IF EXISTS idsOperacoes;
END //

CREATE PROCEDURE cadTipOp(nome VARCHAR(100), descricao VARCHAR(45))
BEGIN
    IF (nome <> '') THEN
        INSERT INTO `tipo_operacao` (`cod_tip_op`, `nome`, `descricao`) VALUES (nome, descricao);
    ELSE
        SELECT 'Preencha o campo de título';
END //
DELIMITER ;