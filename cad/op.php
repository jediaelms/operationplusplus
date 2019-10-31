<!-- Basic Card Example -->
<div class="card shadow mb-4 col-offset-6">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Infomações</h6>
    </div>
    <div class="card-body">
        <form class="user">
            <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <small>Operação:</small>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Nome">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                    </small>Tipo de Operação:</small>
                    <select class="form-control form-control-user">
                        <option>Apendicectomia</option>
                        <option>Perfusão Extracorpórea</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    </small>Paciente:</small>
                    <select class="form-control form-control-user">
                        <option>Ermenegildo Fagundes</option>
                        <option>Virgulino da Silva Podovisk</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <small>Observações:</small>
                <textarea class="form-control form-control-user" style="border-radius: 18px;" placeholder="Entre com as observações">
                </textarea>
            </div>
            <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <small>Início:</small>
                        <input type="date" class="form-control form-control-user" id="cpf" placeholder="Data Início">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <small>Fim:</small>
                        <input type="date" class="form-control form-control-user" id="cpf" placeholder="Data Fim">
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