/**
 * Site : http:www.smarttutorials.net
 * @author muni
 */


//adds extra table rows
var i=$('table#invoiceTable tr').length;
$("#ekle").on('click',function(){
	html = '<tr class="satir">';
	html += '<td><input class="case" type="checkbox"/></td>';
	html += '<td><input type="text" data-type="stok_adi" name="stok_adi['+i+']" id="itemName_'+i+'" class="form-control autocomplete_txt" autocomplete="off"></td>';
	html += '<input type="hidden" data-type="id" name="s_id['+i+']" id="itemid_'+i+'" class="form-control autocomplete_txt" autocomplete="off">';
	html += '<td><input type="text" data-type="satis_fiyati" name="sip_birim_fiyati['+i+']" id="itemsatis_'+i+'" class="fiyat hesaplama form-control autocomplete_txt" autocomplete="off"></td>';
	html += '<td><input type="text" name="sip_urun_adedi['+i+']"  class="adet hesaplama form-control autocomplete_txt" autocomplete="off"></td>';
	html += '<td><input name="sip_kdvsiz_fiyat['+i+']" class="kdvsiztoplam form-control" id="kdvsiztoplam" value="" readonly="readonly"/></td>';
	html += '<td><input name="sip_kdv_orani['+i+']" class="kdvoran hesaplama form-control"  value="" /></td>';
	html += '<td><input name="sip_kdv_tutari['+i+']" class="kdvtutar form-control" id="kdvtutar" value="" readonly="readonly"/>';
	html += '<td><input name="sip_genel_toplam['+i+']" class="kdvlitutar form-control" id="kdvlitutar" value="" readonly="readonly"/></td>';
html += '</tr>';
	$('table#invoiceTable').append(html);
	i++;
});

//to check all checkboxes
$(document).on('change','#check_all',function(){
	$('input[class=case]:checkbox').prop("checked", $(this).is(':checked'));
});

//deletes the selected table rows
$("#delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
	$('#check_all').prop("checked", false); 
	calculateTotal();
});

//autocomplete script
$(document).on('focus','.autocomplete_txt',function(){
	type = $(this).data('type');
	
	if(type =='stok_adi' )autoTypeNo=0; 	
	if(type =='id' )autoTypeNo=1; 	
	if(type =='satis_fiyati' )autoTypeNo=2; 	
	
	$(this).autocomplete({
		source: function( request, response ) {
			$.ajax({
				url : 'ajax.php',
				dataType: "json",
				method: 'post',
				data: {
				   name_startsWith: request.term,
				   type: type
				},
				 success: function( data ) {
					 response( $.map( data, function( item ) {
					 	var code = item.split("|");
						return {
							label: code[autoTypeNo],
							value: code[autoTypeNo],
							data : item
						}
					}));
				}
			});
		},
		autoFocus: true,	      	
		minLength: 0,
		select: function( event, ui ) {
			var names = ui.item.data.split("|");						
			id_arr = $(this).attr('id');
	  		id = id_arr.split("_");
			$('#itemName_'+id[1]).val(names[0]);
			$('#itemid_'+id[1]).val(names[1]);
			$('#itemsatis_'+id[1]).val(names[2]);
			calculateTotal();
		}		      	
	});
});

     $(document).ready(function () {




    // calculate everything
    $(document).on("keyup", ".hesaplama", calcAll); //
     $(".hesaplama").on("change", calcAll); });
     function calcAll() {
         // calculate total for one row
    $(".satir").each(function () {
        var adet = 0;
        var fiyat = 0;
        var kdvoran = 0;

        if (!isNaN(parseFloat($(this).find(".adet").val()))) {
            adet = parseFloat($(this).find(".adet").val());
        }
        if (!isNaN(parseFloat($(this).find(".fiyat").val()))) {
            fiyat = parseFloat($(this).find(".fiyat").val());
        }
        if (!isNaN(parseFloat($(this).find(".kdvoran").val()))) {
            kdvoran = parseFloat($(this).find(".kdvoran").val());
        }
        kdvsiztoplam = adet * fiyat;
        $(this).find(".kdvsiztoplam").val(kdvsiztoplam.toFixed(2));
        kdvtutar = kdvsiztoplam * kdvoran/100;
        $(this).find(".kdvtutar").val(kdvtutar.toFixed(2));
        kdvlitutar = kdvsiztoplam + kdvtutar;
        $(this).find(".kdvlitutar").val(kdvlitutar.toFixed(2)); }); //
         var toplam = 0;
     $(".hesaplama").each(function () {
          if (!isNaN(this.value) && this.value.length != 0) {
              toplam *= parseFloat(this.value);
          }
               $("#toplam").val(toplam.toFixed(2));
          if (!isNaN($(this).find(".adet"))) {

          } });
     var aratoplam = 0;
     var kdvtoplam = 0;
     $(".kdvsiztoplam").each(function () {
         if (!isNaN(this.value) && this.value.length != 0)
         { aratoplam += parseFloat(this.value); } });
     $(".kdvtutar").each(function () {
         if (!isNaN(this.value) && this.value.length != 0) {
             kdvtoplam += parseFloat(this.value); } });
     $("#aratoplam").val(aratoplam.toFixed(2));
     $("#kdvtoplam").val(kdvtoplam.toFixed(2));
     $("#geneltoplam").val(parseFloat(aratoplam.toFixed(2)) + parseFloat(($("#kdvtoplam").val())));
     }