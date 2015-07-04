// Ajax User Check
$(document).ready(function(){
	$("#username").keyup(function() {
	var name = $('#username').val();
			if(name=="")
			{
			  $("#disp").hide();
			}
			else
			{
			$.ajax({
			type: "POST",
			url: "usercheck.php",
			data:"username="+ name+"&method=verify",
			success: function(msg)
			{	
				if(msg=="no"){
					$('#username').css('border-color','#CC0000').css('color','#CC0000');
					$("#disp").fadeTo(100,1,function()
						{							
							$(this).html("Username Already In Use").removeClass('msgok').addClass('msgerror');
						}).show();
				}
				else if(msg=="yes"){
					alert('reached');
					}
			}
		});
	}
	});
});