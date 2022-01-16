			//e.preventDefault();
			$(document).ready(function(){
				
			 	$("#BtnInfoPerso").on('click', function(e){

				
					var first_name = $('#first_name').val();
					var name = $('#name').val();
					var phone = $('#phone').val();
					var FormInfoPerso = $("#FormInfoPerso");

					var checkform = true;
					if (first_name == '') {
						$('#first_name_error').text('champ requis');
						checkform = false;
					} 
					if (name == '') {
						$('#name_error').text('champ requis');
						checkform = false;
					} 
					if (phone == '') {
						$('#phone_error').text('champ requis');
						checkform = false;
					}
					// if (checkform) {
					
					// 	alert('ok');
					// }
			 	});
			});