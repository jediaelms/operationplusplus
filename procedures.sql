-- PROCEDURES 
-- 
-- 
-- 
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

CREATE PROCEDURE getMessages(new BOOLEAN, reme INT(11), desti INT(11))
BEGIN
    IF new = 1 THEN
    BEGIN
        SELECT nome FROM usuario WHERE cod_usuario = desti;
        SELECT * FROM bate_papo WHERE (usuario_remetente = reme AND usuario_destinatario = desti) OR (usuario_remetente = desti AND usuario_destinatario = reme) ORDER BY data_hora
    END
    ELSE
        SELECT * FROM bate_papo WHERE usuario_remetente = reme AND usuario_destinatario = desti AND visualizado = 0 ORDER BY data_hora;
    UPDATE bate_papo SET visualizado = 1 WHERE `usuario_remetente` = reme AND `usuario_destinatario` = desti AND `visualizado` = 0;
END //






-- TRIGGERS 
-- 
-- 
CREATE TRIGGER marca_concluido_espacado AFTER UPDATE ON alerta_espacado FOR EACH ROW
BEGIN
    IF NEW.num_registros = NEW.num_registrados THEN
        UPDATE alerta SET concluido = 1 WHERE cod_alerta = OLD.alerta_cod_alerta;
END //


CREATE TRIGGER marca_concluido_pontual AFTER UPDATE ON alerta_espacado FOR EACH ROW
BEGIN
   IF NEW.concluido IS NOT NULL THEN
        UPDATE alerta SET concluido = 1 WHERE cod_alerta = OLD.alerta_cod_alerta;
END //

CREATE TRIGGER logg_operacao BEFORE DELETE ON operacao FOR EACH ROW
BEGIN
    INSERT INTO `log_operacao`(`cod_operacao`, `nome`, `descricao`, `cod_paciente`, `horario`, `horario_fim`, `fim_acompanhamento`, `tipo_operacao_cod_tip_op`, `data_exclusao`) VALUES(OLD.cod_operacao, OLD.nome, OLD.descricao, OLD.cod_paciente, OLD.horario, OLD.horario_fim, OLD.fim_acompanhamento, OLD.tipo_operacao_cod_tip_op, NOW());
END //

CREATE TRIGGER logg_paciente BEFORE DELETE ON paciente FOR EACH ROW
BEGIN
    INSERT INTO `log_paciente`(`cod_paciente`, `usuario_cod_usuario`, `data_nasc`, `sexo`, `data_exclusao`) VALUES(OLD.cod_paciente, OLD.usuario_cod_usuario, OLD.data_nasc, OLD.sexo, NOW());

    INSERT INTO `log_usuario`(`cod_usuario`, `email`, `senha`, `nome`, `cpf`, `telefone`, `rua`, `numero`, `bairro`, `cidade_cod_cidade`, `tipo`) VALUES(OLD.cod_usuario, OLD.email, OLD.senha, OLD.nome, OLD.cpf, OLD.telefone, OLD.rua, OLD.numero, OLD.bairro, OLD.cidade_cod_cidade, OLD.tipo);
END //

CREATE TRIGGER logg_funcionario BEFORE DELETE ON paciente FOR EACH ROW
BEGIN
    INSERT INTO `log_funcionario`(`cod_funcionario`, `cod_tip_fun`, `usuario_cod_usuario`, `crm`, `data_exclusao`) VALUES(OLD.cod_funcionario, OLD.cod_tip_fun, OLD.usuario_cod_usuario, OLD.crm, NOW());
    
    INSERT INTO `log_usuario`(`cod_usuario`, `email`, `senha`, `nome`, `cpf`, `telefone`, `rua`, `numero`, `bairro`, `cidade_cod_cidade`, `tipo`) VALUES(OLD.cod_usuario, OLD.email, OLD.senha, OLD.nome, OLD.cpf, OLD.telefone, OLD.rua, OLD.numero, OLD.bairro, OLD.cidade_cod_cidade, OLD.tipo);
END //

DELIMITER ;