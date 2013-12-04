			
			
			//variables
			var $submit = $(".contactSubmit");
			var $required = $(".requiredText");
			
			//functions
			
			function nameContainsBlanks(){
				var blanks = $("#name").map(function(){ return $(this).val() == "";});
				return $.inArray(true, blanks) != -1;
			}
			
			function messageContainsBlanks(){
				var blanks = $("#message").map(function(){ return $(this).val() == "";});
				return $.inArray(true, blanks) != -1;
			}

			function isValidEmail(email){
				if ((email.indexOf("@") === -1) || (email.indexOf(".") === -1) ){
					return false;
				}
				
				else {
					return true;
				}
			}

			function requiredFilledIn(){
				if(nameContainsBlanks() == true || messageContainsBlanks() == true || isValidEmail($("#email").val()) == false) {
					$submit.attr("disabled","disabled");}
				else 
					$submit.removeAttr("disabled");
			}
			
			function switchIcon(){
				console.log("switchIcon fired");
				$(this).parent().prev().children(".valid").fadeIn("slow");
				$(this).parent().prev().children(".error").fadeOut("fast");
			}
			
			//main code
			$(".error").hide();
			$(".valid").hide();
			
			//On focus if there are blanks display error
			$("#name").focus(function(){
				if(nameContainsBlanks() == true){
					$(this).parent().prev().children(".error").fadeIn("slow");
				}});
				
			$("#message").focus(function(){
				if(messageContainsBlanks() == true){
					$(this).parent().prev().children(".error").fadeIn("slow");
				}});
				
			$("#email").focus(function(){
				if(!isValidEmail($(this).val())){
					$(this).parent().prev().children(".error").fadeIn("slow");
				}
			});
			//Following keystrokes change error to valid
			$("#name").keyup(function(){
				if(nameContainsBlanks() == false ){
					$(this).parent().prev().children(".valid").fadeIn("slow");
					$(this).parent().prev().children(".error").fadeOut("fast");
					requiredFilledIn();
				}});
				
			$("#message").keyup(function(){
				if(messageContainsBlanks() == false){
					console.log("message keyup fired");
					$(this).parent().prev().children(".valid").fadeIn("slow");
					$(this).parent().prev().children(".error").fadeOut("fast");
					requiredFilledIn();
				}});


			//validate email (email must contain @ and . )
			
			
			$("#email").keyup(function(){
				if(isValidEmail($(this).val())){
					$(this).parent().prev().children(".error").fadeOut("fast");
					$(this).parent().prev().children(".valid").fadeIn("slow");
					
				}
			});
			
			//validate entire form and activate button
			requiredFilledIn();
			// End of main code