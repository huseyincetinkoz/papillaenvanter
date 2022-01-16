$(function() {

    // Atribui evento e função para limpeza dos campos
    $('#busca').on('input', limpaCampos);

    // Dispara o Autocomplete a partir do segundo caracter
    $( "#busca" ).autocomplete({
	    minLength: 2,
	    source: function( request, response ) {
	        $.ajax({
	            url: "consulta.php",
	            dataType: "json",
	            data: {
	            	acao: 'autocomplete',
	                parametro: $('#busca').val()
	            },
	            success: function(data) {
	               response(data);
	            }
	        });
	    },
	    focus: function( event, ui ) {
	        $("#busca").val( ui.item.barkod_no );
	        carregarDados();
	        return false;
	    },
	    select: function( event, ui ) {
	        $("#busca").val( ui.item.barkod_no );
	        return false;
	    }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<a>" + item.barkod_no + "</a></li>" )
        .appendTo( ul );
    };

    // Função para carregar os dados da consulta nos respectivos campos
    function carregarDados(){
    	var busca = $('#busca').val();

    	if(busca != "" && busca.length >= 2){
    		$.ajax({
	            url: "consulta.php",
	            dataType: "json",	
	            data: {
	            	acao: 'consulta',
	                parametro: $('#busca').val()
	            },
	            success: function( data ) {
	               $('#musteri_id').val(data[0].id);
	               $('#adi_soyadi').val(data[0].adi_soyadi);
	               $('#adres').val(data[0].acik_adres);
	               $('#e_posta').val(data[0].e_posta);
	               $('#tc_no').val(data[0].tc_no);
	               $('#cep_telefon').val(data[0].cep_telefon);
	               $('#sabit_telefon').val(data[0].sabit_tel);
	            }
	        });
    	}
    }

    // Função para limpar os campos caso a busca esteja vazia
    function limpaCampos(){
       var busca = $('#busca').val();

       if(busca == ""){
	   $('#adi_soyadi').val('');
	   $('#adres').val('');
	   $('#e_posta').val('');
	   $('#tc_no').val('');
	   $('#cep_telefon').val('');
	   $('#sabit_tel').val('');


       }
    }
});