$(function(){

	$("#result").hide();
	$("#btnSender").click(function(){
		
		$("#result").hide(700);
		var str = $("#textSequence").val();
		if(/^(\d{300,60000})$/.test(str)){

		$("#result").show(700);
		$("#result").html("<div class=\"loader\"></div>");

		$.post('/site/textresiver',
		{
			text: $("#textSequence").val()
		},
 		function(data,status){
 				$("#result").hide(700);
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