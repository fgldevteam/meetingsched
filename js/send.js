$(document).ready(function() {

	//form submission:
	$("#submit").click(function(){
		return false;
	});
	
	$("#submit").click(function(){					   				   
		$(".error").hide();
		var hasError = false;
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		
		var fnameVal = $("#firstname").val();
		var lnameVal = $("#lastname").val();
		var emailVal = $("#email").val();
		var deptVal = $("#department").val();
		var selected_meeting = $("input:radio[name ='optionsMeeting']:checked").val();
		
		
		// console.log(fitnessVal);
		//validation
		if(fnameVal == '') {
			$("#firstnamelabel").css('color', '#c00');
			$("#firstnamelabel").after('<p class="error">Please enter your first name.</p>');
			hasError = true;
			$(window).scrollTop(0);
		}

		if(lnameVal == '') {
			$("#lastnamelabel").css('color', '#c00');
			$("#lastnamelabel").after('<p class="error">Please enter your last name.</p>');
			hasError = true;
			$(window).scrollTop(0);
		}

		if(emailVal == '') {
			$("#emaillabel").css('color', '#c00');
			$("#emaillabel").after('<p class="error">Please enter your email.</p>');
			hasError = true;
			$(window).scrollTop(0);
		}
		else if(!emailReg.test(emailVal)) {	
			$("#emaillabel").after('<p class="error">Please enter a valid email address.</p>');
			hasError = true;
		}	
		// if(extVal == '') {
		// 	$("#label-last").css('color', '#c00');
		// 	hasError = true;
		// 	$(window).scrollTop(0);
		// }	
		
		if(deptVal == '') {
			$("#departmentlabel").css('color', '#c00');
			$("#departmentlabel").after('<p class="error">Please enter your department.</p>');
			hasError = true;
			$(window).scrollTop(0);
		}	


		if(selected_meeting === undefined){
			$("#meetingheader").css('color', '#c00');
			$("#meetingheader").after('<p class="error">Please select a meeting time.</p>');
			hasError = true;
			$(window).scrollTop(0);

		}


					
		if(hasError == false) {
			//$(this).hide();
			//$("#sendEmail li.buttons").append('<img src="img/loading.gif" alt="Loading" id="loading" />');
			$(this).hide();


			$.post("send.php",
   				{ firstname: fnameVal,
   				  lastname: lnameVal,
   				  department: deptVal,   				  
   				  email : emailVal, 
   				  selected_meeting: selected_meeting
   				  
   				},
   					function(data){
   						$("#meetingtimes").hide();
   						$("#regform").hide();
   						$("#regform").after("<h3>Thank You</h3><p>Your registration has been received.</p>");											
   						
										  												
						
   					}
				 );
		}			
		
		return false;
	});

});	