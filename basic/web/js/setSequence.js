$(function(){

	$("#result").hide();
	$("#btnSender").click(function(){
		$.post('textresiver',
		{
			text: $("#textSequence").val()
		},
 		function(data,status){
     	 	alert("\nStatus: " + status);
    		});
		
		});
	$('#textSequence').keypress(function(e) {
    
		var k = e.which;
 		if (!(k >= "0".charCodeAt(0) && k <="9".charCodeAt(0)))
      		e.preventDefault();
		});	

	});