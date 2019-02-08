$(function(){

	$("#result").hide();
	$("#btnSender").click(function(){
		var str = $("#textSequence").val();
		if(/^(\d{300,})$/.test(str)){
		$.post('/site/textresiver',
		{
			text: $("#textSequence").val()
		},
 		function(data,status){
     	 		$("#result").html(data);
     	 		$("#result").show(700);
    		});
		}
		});
	$('#textSequence').keypress(function(e) {
    
		var k = e.which;
 		if (!(k >= "0".charCodeAt(0) && k <="9".charCodeAt(0)))
      		e.preventDefault();
		});	

	});