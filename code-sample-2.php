<section id="main-content">
  <section class="wrapper site-min-height">
  	<h2><i class="fa fa-angle-right"></i>Listagem de Parceiros
        <button class       ="btn btn-primary btn-xs" 
                data-toggle ="modal" 
                data-target ="#modalParceiro" 
                data-type   ="new"
        >
           <i class="fas fa-plus-square"></i> Novo
        </button>
    </h2>
  	<div class="row mt">
      <div class="col-md-12">
          <div class="content-panel">
            <form method="POST" action="" id="pesquisa" name="pesquisa">
              <div class="form-group">
                    <div class="col-sm-4">
                      <label class="col-sm-12 col-sm-12 control-label">Organizar por</label>
                        <?php
                          $Attr['type']    = "input_select";
                          $Attr['attr']    = array( 'name'      => 'attribute',
                                                    'id'        => 'attribute',
                                                    'class'     =>'form-control round-form',);
                          $Attr['options'] = array( 'nome'      => "Nome",);
                          $Attr['selected']= $filtros->getAttribute();
                          echo getInput($Attr);
                        ?>
                    </div>

                    <div class="col-sm-4">
                      <label class="col-sm-12 col-sm-12 control-label">Tipo de ordenação</label>
                        <?php
                          $Order['type']    = "input_select";
                          $Order['attr']    = array( 'name'   => 'order_by',
                                                     'id'     => 'order_by',
                                                     'class'  =>'form-control round-form',);
                          $Order['options'] = array( 'ASC'    => "Alfabética crescente",
                                                     'DESC'   => "Alfabética decrescente",);
                          $Order['selected']= $filtros->getOrderBy();
                          echo getInput($Order);
                        ?>
                    </div>

                    <div class="col-sm-4">
                      <label class="col-sm-12 col-sm-12 control-label">Quantidade</label>
                        <?php
                          $Qntd['type']    = "input_select";
                          $Qntd['attr']    = array( 'name'  => 'quantidade',
                                                    'id'    => 'quantidade',
                                                    'class' =>'form-control round-form',);
                          $Qntd['options'] = array( 10 => 10,
                                                    20 => 20,
                                                    50 => 50,
                                                    100 => 100);
                          $Qntd['selected']= $filtros->getLimit();
                          echo getInput($Qntd);
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                      <br/>
                      <?php
                      $Search['type']  = "input_text";
                      $Search['label'] = "Nome";
                      $Search['attr']  = array( 'name'        => 'search_by',
                                                'id'          => 'search_by',
                                                'maxlength'   => 255,
                                                'class'       => 'form-control round-form',
                                                'placeholder' => 'Pesquisar por nome da parceiro.');
                      echo getInput($Search);
                      ?>
                    </div>
                    <div class="col-sm-2">
                        <br/>
                        <button type="submit" class="btn col-sm-12 btn-round btn-theme" value="Pesquisar">Pesquisar </button>
                    </div>
                </div>
              </form>

              <br><br><br>

              <div class="col-sm-12 message">
                <?php
                if($this->session->flashdata('success') == TRUE){
                  echo '<br><br><div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Sucesso!</strong> ' . htmlentities($this->session->flashdata('success')) . '</div><br>'; 
                }
                if($this->session->flashdata('danger') == TRUE){
                  echo '<br><br><div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Erro!</strong> ' . htmlentities($this->session->flashdata('danger')) . '</div><br>'; 
                }
                ?>
              </div>

              <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                      <th><i class="fa fa-font"></i> Nome</th>
                      <th class="hidden-phone"><i class="fa fa-question-circle"></i> Site</th>
                      <th></th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach ($parceiros as $key => $parceiro) : ?>
                      <tr>
                          <td><?=$parceiro->getNome()?></td>
                          <td><?=$parceiro->getSite()?></td>
                          <td>

                              <button class           ="btn btn-primary btn-xs" 
                                      data-toggle     ="modal" 
                                      data-target     ="#modalParceiro" 
                                      data-type       ="update"
                                      data-id         ="<?=$parceiro->getID()?>" 
                                      data-nome       ="<?=$parceiro->getNome()?>"
                                      data-site       ="<?=$parceiro->getSite()?>"
                                      data-imagem     ='<?=$parceiro->getImagemJSON()?>'>

                                  <i class="fas fa-pencil-alt"></i>

                              </button>

                              <button class="btn btn-danger btn-xs"
                                      data-toggle ="modal"
                                      data-target ="#modalParceiroExcluir"
                                      data-id     ="<?=$parceiro->getID()?>"  >
                                  <i class="fas fa-trash-alt"></i>
                              </button>

                          </td>
                      </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
              <?php echo $paginacao; ?>
          </div>
      </div>
      </div>
      <?php
      $input[0]['type']  = "input_text";
      $input[0]['label'] = "Nome";
      $input[0]['attr']  = array(
                                'name'        => 'nome',
                                'id'          => 'nome',
                                'maxlength'   => 255,
                                'required'   =>  'required',
                                'class'       => 'form-control',);

      $input[1]['type']  = "input_file";
      $input[1]['label'] = "Imagem - Dimensão máxima de 1400x768";
      $input[1]['attr']  = array(
                                'name'        => 'imagem[]',
                                'id'          => 'imagem',
                                'class'       => 'form-control',);

      $input[2]['type']  = "input_text";
      $input[2]['label'] = "Site";
      $input[2]['attr']  = array(
                                'name'        => 'site',
                                'id'          => 'site',
                                'class'       => 'form-control',);

      echo modalForm("modalParceiro", "ParceiroLabel", "", "formParceiro", $input, "multipart/form-data"); 
      ?>

      <div class="modal fade in" id="modalParceiroExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Deletar Parceiro</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                      <p>Tem certeza que desaja excluir o registro?</p>
                  </div>
                </div>
                <div class="modal-footer">
                      <a href="" id="linkdelete" class="btn btn-round btn-theme">Excluir </a>
                      <button type="button" class="btn btn-round btn-secundary" data-dismiss="modal"> Fechar </button>
                </div>
            </div>
        </div>
      </div>

</section>
  </section>
<link href="<?php echo base_url('assets/css/gallery.css'); ?>" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    function fechaDivMessage(){
        $('#message').fadeOut('slow');
    }
  $("#imagem").parent().append("<br/><ul class='list-inline gallery collapse in' style='margin: auto; 'id='imgview'></ul>");
    function fechaDivMessage(){
        $('#message').fadeOut('slow');
    }

  $('#modalParceiro').on('show.bs.modal', function (event) {
      var button    = $(event.relatedTarget)
      var action    = button.data('type')
      var modal = $(this)
      $("#imgview").html("")

      if(action == "new")
      {
        modal.find('#ParceiroLabel').text("Novo Parceiro")
        modal.find('#mandabala').text("Salvar")
        modal.find('#id').hide()
        modal.find('#formParceiro').attr("action", "<?=base_url('Parceiro/insert')?>")
        modal.find('#id').val("")
        modal.find('#nome').val("")
        modal.find('#site').val("")
      }
      else if(action == "update")
      {
        var id      = button.data('id') // Extract info from data-* attributes
        modal.find('#ParceiroLabel').text("Editar Parceiro")
        modal.find('#mandabala').text("Editar")
        modal.find('#id').show()
        modal.find('#formParceiro').attr("action", "<?=base_url('Parceiro/update')?>")

        var nome      = button.data('nome')
        var site      = button.data('site')
        var imagem    = button.data('imagem')

        $('#imgview').append("<li style='width:100%'></li>")
        img = $('<img />',
           { id: imagem.id,
             src: '<?=base_url('uploads/')?>' + imagem.name, 
             style:  'margin:auto',
             width: 200,
             height: 150,
             style:  'margin:auto',
             class: 'thumbnail zoom'
           }).appendTo($('#imgview li').last());

        modal.find('#id').val(id)
        modal.find('#nome').val(nome)
        modal.find('#site').val(site)
      }
  })

  $('#modalParceiroExcluir').on('show.bs.modal', function (event) {
      var button  = $(event.relatedTarget) // Button that triggered the modal
      var id      = button.data('id') // Extract info from data-* attributes
      var link    = "<?=base_url('Parceiro/delete/')?>" + id
      var modal = $(this)
      modal.find('#linkdelete').attr("href", link);
      modal.find('#nome').val(nome)
      modal.find('#site').val(site)
  })

  $( "input[type='file']" ).change(function() {
    var input = $(this);
    var nome_arquivo = $("#imagem").val().split("\\").pop();
    $("#imgview").html("");
    if (nome_arquivo.length > 0)
    {
      $.each( input.prop('files'), function(key, image){
        if (image) {
        var reader = new FileReader();
        reader.onload = function (e) {
          // alert(e.target.result);
          $('#imgview').append("<li style='width:100%'></li>")
          img = $('<img />',
             { src: '<?=base_url('uploads/default.png')?>', 
               style:  'margin:auto',
               width: 200,
               height: 150,
               class: 'thumbnail zoom'
             }).appendTo( $("#imgview li").last());
          $('#imgview li img').last().attr('src', e.target.result);
        }
        reader.readAsDataURL(image);
      }
      })
    }
    else
    {
      $('#projetoimg').attr('src', "<?=base_url('uploads/default.jpg')?>");
    }
  })
  
});
</script>