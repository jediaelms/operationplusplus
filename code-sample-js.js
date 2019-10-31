<script type="text/javascript">
  function toggleRemoveImg(id, image)
    {
      if($("input[type=hidden][value="+id+"]").val() == undefined)
      {
        $(image).addClass("gray");
        $(".id_imgsremove").append("<input type=\"hidden\" name=\"imagens[]\" value=\""+id+"\" />");
      }
      else
      {
        $(image).removeClass("gray");
        $("input[type=hidden][value="+id+"]").remove();
      }
    }
$(document).ready(function () {
    $("#imagem").parent().append("<br/><ul class='list-inline gallery collapse in' id='imgview'></ul>");
    function fechaDivMessage(){
        $('#message').fadeOut('slow');
    }

  $('#modalNoticia').on('show.bs.modal', function (event) {
      var button    = $(event.relatedTarget)
      var action    = button.data('type')
      var modal = $(this)
      $(".id_imgsremove").html("")
      $("#imgview").html("")

      if(action == "new")
      {
        $("#imgsalvas").parent().hide();
        modal.find('#NoticiaLabel').text("Nova Notícia")
        modal.find('#mandabala').text("Salvar")
        modal.find('#id').hide()
        modal.find('#formNoticia').attr("action", "<?=base_url('Noticia/insert')?>")
        modal.find('#id').val("")
        modal.find('#titulo').val("")
        modal.find('#descricao').val("")
        modal.find('#data').val("")
      }
      else if(action == "update")
      {
        var id      = button.data('id') // Extract info from data-* attributes
        modal.find('#NoticiaLabel').text("Editar Projeto")
        modal.find('#mandabala').text("Editar")
        modal.find('#id').show()
        modal.find('#formNoticia').attr("action", "<?=base_url('Noticia/update')?>")

        var titulo      = button.data('titulo')
        var data     = button.data('data')
        var descricao = button.data('descricao')
        var imagens    = button.data('imagens')


        console.log(imagens)


        $('#imgsalvas').html("")
        $("#imgsalvas").parent().show();

       
        $.each(imagens, function(key, image){
          $('#imgsalvas').append("<li></li>")

          img = $('<img />',
             { id: image.id,
               src: '<?=base_url('uploads/')?>' + image.name, 
               width: 150,
               height: 100,
               alt: 'Imagem da Notícia',
               title: 'Imagem da Notícia',
               class: 'thumbnail zoom',
               onclick: 'toggleRemoveImg(' + image.id + ', this)'

             })
              .appendTo($('#imgsalvas li').last());
        })

        modal.find('#id').val(id)
        modal.find('#titulo').val(titulo)
        modal.find('#data').val(data)
        modal.find('#descricao').val(descricao)
        // modal.find('#projetoimg').attr("src", "<?=base_url()?>" + imagem)
      }
  })

  $('#modalNoticiaExcluir').on('show.bs.modal', function (event) {
      var button  = $(event.relatedTarget) // Button that triggered the modal
      var id      = button.data('id') // Extract info from data-* attributes
      var link    = "<?=base_url('Noticia/delete/')?>" + id
      var modal = $(this)
      modal.find('#linkdelete').attr("href", link);
      modal.find('#titulo').val(titulo)
      modal.find('#descricao').val(descricao)
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
          $("#imgview").append("<li></li>");
          img = $('<img />',
             { src: '<?=base_url('uploads/default.png')?>', 
               width: 150,
               height: 100,
               alt: 'Imagem do Projeto',
               title: 'Imagem do Projeto',
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
      // $('#projetoimg').attr('src', "<?=base_url('uploads/default.jpg')?>");
    }
  })
});
</script>