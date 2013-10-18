$(document).ready(function (){

	$('div #response #message-box').removeClass('message-text');
	$('div #response #message-image').removeClass('success-image');
	$('div #response').hide();
	
	$('#submit').click(function(e){

		e.preventDefault();
		
		$('div #response').removeAttr("style").css("height", '60px');
		$('div #response #message-box').removeClass().addClass('processing').append("<div class='processing-text'></div>").fadeIn('fast');

		var formData = $('form').serialize();

		submitForm(formData);
	});
});

function submitForm(formData){
	
	$.get('/main/checkSession', function(data) {
	     if( data == "Expired" ) {
	    	 window.location.replace("main");
	     }
	 });
	
	$.ajax ({
		type: 'POST',
		url: '/accounts/addAccount',
		data: formData,
		dataType: 'json',
		cache: false,
		timeout: 7000,
		success: function(data){
			
			// let the user know if there are erros with the form
			if (data.msgStatus == 'error') {
				
				$('div #response').removeClass().addClass('error')
					.html('<strong>Please correct the errors below.</strong>').fadeIn('fast');			
			}
			// let the user know something is happening behind the scenes
			// serialize the form data and send to our ajax function
			else {				

			console.log(JSON.stringify(data, null, 4));
			$('.processing-text').remove();
			$('div #response #message-box').removeClass('processing').addClass('message-text').css('display', 'none').append(data.msg).fadeIn(350);
			$('div #response #message-image').addClass('success-image').fadeIn('fast');

			if($('div #response #message-box').hasClass('message-text')){
				$('div #response').removeAttr("style").css("height", '75px');
				$('div #response #message-box').delay(2000).slideUp(1000, function (){
					$('#response #message-box #message').remove();
					$('div #response #message-box').removeClass('message-text');
					$('div #response #message-image').removeClass('success-image');
					$('#message-box').removeAttr("style");
					
				});
				$('div #response').delay(2350).slideUp(1000);
			}

			
			}			
			
		},
		error: function(XMLHttpRequest, textStatus, errorThrown){
			$('div #response').removeClass().addClass('error').html('<p>There was an<strong> ' + errorThrown +
					  '</strong> error due to a<strong> ' + textStatus +
			  '</strong> condition.</p>').fadeIn('fast');
		},
		complete: function(XMLHttpRequest, status){
			$('form')[0].reset();
		}
	});
	
}
