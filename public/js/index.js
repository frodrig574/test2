$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
$(document).on("click",".adddocuments",function()
	{
		$("#addDocuments").css("display","block");
		$(".listDocuments").css("display","none");
	});
$(document).on("click",".addsalida",function()
	{
		$("#addSalida").css("display","block");
		$(".listSalida").css("display","none");
	});
$(document).on("click","#cancelDocuments",function()
	{
		$("#addDocuments").css("display","none");
		$(".listDocuments").css("display","block");
	    $(".err > p").remove();
	if($("#inputhide >#id").length){
		$("#inputhide >#id").remove();
	}

	});
  $(document).on("click","#cancelSalida",function()
  	{
  		$("#addSalida").css("display","none");
  		$(".listSalida").css("display","block");
  	    $(".err > p").remove();
  	if($("#inputhide >#id").length){
  		$("#inputhide >#id").remove();
  	}

  	});
//Peticiones ajax
//lista de roles
$(document).ready(function()
	{
	    $.ajax({
	    	url:"http://localhost/test/ajax_selection/selectEntrada",
	    }).done(function(dataRol)
	    {
	    	$(".listDocuments").append(dataRol);
	    }
	    ).fail(function()
	    {
	    	$(".listDocuments").append('<div class="messageNullRol">No hay documentos registrados</div>');
	    });
      $.ajax({
        url:"http://localhost/test/ajax_selection/selectSalida",
      }).done(function(dataRol)
      {
        $(".listSalida").append(dataRol);
      }
      ).fail(function()
      {
        $(".listSalida").append('<div class="messageNullRol">No hay documentos registrados</div>');
      });
	});

//functions
var edit = function(id){
	$("#addDocuments").css("display","block");
	$(".listDocuments").css("display","none");
  $("#inputhide").append("<input type='hidden' id='id' name='id' value='"+id+"'>");
  $.ajax({
		url:"http://localhost/test/ajax_selection/selectEntradaId/"+id,
	}).done(function(data)
	{
		var dat = JSON.parse(data);
		$("#numero").val(dat[0].numero);
		$("#dependencia").val(dat[0].dependencia);
		$("#fecha").val(dat[0].fecha);
		$("#fecha_recibido").val(dat[0].fecha_recibido);
		$("#asunto").val(dat[0].asunto);
		$("#tipo").val(dat[0].tipo);
		$("#resumen").val(dat[0].resumen);
	});

};
var editSalida = function(id){
	$("#addSalida").css("display","block");
	$(".listSalida").css("display","none");
  $("#inputhide").append("<input type='hidden' id='id' name='id' value='"+id+"'>");
  $.ajax({
		url:"http://localhost/test/ajax_selection/selectSalidaId/"+id,
	}).done(function(data)
	{
		var dat = JSON.parse(data);
		$("#numero").val(dat[0].numero);
		$("#dependencia").val(dat[0].dependencia);
		$("#fecha").val(dat[0].fecha);
		$("#fecha_recibido").val(dat[0].fecha_recibido);
		$("#asunto").val(dat[0].asunto);
		$("#tipo").val(dat[0].tipo);
		$("#resumen").val(dat[0].resumen);
	});

};
var deleteEntrada = function(id)
{
	var sus = confirm("Seguro que deseas eliminar este documento ");
	if(sus==true)
	{
		window.location="/test/userlog/deleteEntrada/"+id;
	}
}
var deleteSalida = function(id)
{
	var sus = confirm("Seguro que deseas eliminar este documento ");
	if(sus==true)
	{
		window.location="/test/userlog/deleteSalida/"+id;
	}
}
