<!-- Basic Card Example -->
    <div class="card col mb-6 col-offset-2">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Informações</h6>
        </div>
        <div class="card-body">
            <form class="user">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <small>Tipo de Operação:</small>
                        <input type="text" name="tipo" class="form-control form-control-user" id="exampleFirstName" placeholder="...">
                    </div>
                    <div class="col-sm-6">
                    <?php
                    // TODO Alterar estilo do select
                    // require("blank.php");
?>
                    <small>Status:</small>
                    <select name="status" class="form-control form-control-user">
                        <option>Ativa</option>
                        <option>Desativada</option>
                    </select>
                </div>
                </div>
                <a href="index.php" class="btn btn-primary btn-user btn-block">
                    Salvar
                </a>
                <a href="index.php" class="btn btn-primary btn-user btn-block">
                    Limpar
                </a>
                <hr>
            </form>
        </div>
    </div>