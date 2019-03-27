$(document).ready(function() {

	
   
   function add_janelas(id, nome) {
   	 var html_add = '<div class="janela" id="jan_'+id+'"><div class="topo" id="'+id+'"><span>'+nome+'</span><a href="javascript:void(0);" id="fechar">X</a> </div><div id="corpo"><div class="mensagens"><ul class="listar> </ul> </div><input type="text" class="mensagem" id="'+id+'" maxlength="255"> </div></div>';
   	 $('#janelas').append(html_add)
   }

	function() {
	$('.comecar').live('click', function(){
		var id = $(this).attr('id');
		var nome = $(this).attr('nome');

        add_janelas(id, nome)
		$(this).removeClass('comecar');

		return false;
	})
})

     $('a#fechar').live('click', function() {

     	var id = $(this).parent().attr('id')

     	var parent = $(this).parent().parent().hide();

     	$('#contatos a#'+id+'').addClass('comecar');

     })

}