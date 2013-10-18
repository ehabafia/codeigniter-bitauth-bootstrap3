// remap jQuery to $
(function($){

	/* trigger when page is ready */
	$(document).ready(function (){

		$("a.blockUser, a.unblockUser").on("click",function(e){
			e.preventDefault();

			var url = $(this).attr('id').split('-');

			action = url[0];
			user_id = url[1];

			$.get('/main/checkSession', function(data) {
				if( data == "Expired" ) {
					window.location.replace("/login");
				}
			});

			var json = {};

			if(action == "block") {
				json.table 		= "bitauth_users";
				json.flag	 	=  0;
				json.fieldName 	= "enabled";
				json.user_id 	= user_id;
				json.action		= "block";
				method			= "userBlock";
			} else if(action 	== "unblock") {
				json.table 		= "bitauth_users";
				json.flag	 	= 1;
				json.fieldName 	= "enabled";
				json.user_id		= user_id;
				json.action		= "unblock";
				method			= "userBlock";
			}

			$.ajax ({
				type: 'POST',
				url: '/users/'+ method,
				data: json,
				dataType: 'json',
				cache: false,
				timeout: 7000,
				success: function(data){
					if (data.status == 'success' && data.hclass == 'unblockUser') {
						$('a#block-'+data.user_id).attr('alt', data.message).attr('title', data.message );
						$('a#block-'+data.user_id).toggleClass("unblockUser blockUser").css('display', 'none').fadeIn(1000);
						$('#info #'+data.user_id).toggleClass("label-success label-danger").css('display', 'none').fadeIn(1000);
						$('a#block-'+data.user_id).html( 'Blocked' );
						$('a#block-'+data.user_id).attr('id', 'unblock-'+data.user_id);
					} else if(data.status == 'success' && data.hclass == 'blockUser'){
						$('a#unblock-'+data.user_id).attr('alt', data.message).attr('title', data.message );
						$('a#unblock-'+data.user_id).toggleClass("blockUser unblockUser").css('display', 'none').fadeIn(1000);
						$('#info #'+data.user_id).toggleClass("label-danger label-success").css('display', 'none').fadeIn(1000);
						$('a#unblock-'+data.user_id).html( 'Active' );
						$('a#unblock-'+data.user_id).attr('id', 'block-'+data.user_id);
						alert(htclass);
					}
					
				},
				error: function(XMLHttpRequest, textStatus, errorThrown){

				},
				complete: function(XMLHttpRequest, status){
	
				}
			});
		});

		// Link to open the dialog
		$( ".delusr" ).click(function( event ) {
			event.preventDefault();

			var url = $(this).attr('id').split('-');
			action = url[0];
			user_id = url[1];

			var json = {};

			json.action = action;
			json.user_id = user_id;
			
			$( "#dialog" ).dialog({
				autoOpen: false,
				bgiframe: true,
				resizable: false,
				height:170,
				modal: true,
				overlay: {
					backgroundColor: '#000',
					opacity: 0.5
				},
				buttons: [
					{
						text: "Ok",
						click: function() {
							$( this ).dialog( "close" );
							doDelete(json);
						}
					},
					{
						text: "Cancel",
						click: function() {
							$( this ).dialog( "close" );
						}
					}
				]
			});
			$("#dialog").dialog("open");
		});

		function doDelete(json){

			$.get('/main/checkSession', function(data) {
				if( data == "Expired" ) {
					window.location.replace("main");
				}
			});

			$.ajax ({
				type: 'POST',
				url: '/users/'+ action,
				data: json,
				dataType: 'json',
				cache: false,
				timeout: 7000,
				success: function(data){
					if (data.status == 'success') {
						var options = {};
						// run the effect
						$('#user-'+data.user_id).effect('highlight', options, 1500 , callback);
					};
					function callback() {
						$('#user-'+data.user_id).remove();
					};
				},
				error: function(XMLHttpRequest, textStatus, errorThrown){

				},
				complete: function(XMLHttpRequest, status){

				}
			});
		}



	});
})(window.jQuery);