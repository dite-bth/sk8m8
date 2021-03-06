var expanded = false;
var photonDone = false;

$(document).ready(function () {

	$("#backButton").hide();
	$("#startPhoton").hide();
	$("#info").hide();
	$("#arrow").hide();
	$("#submitDiv").hide();
	$("#aboutText").hide();

	$('#box').click(function() {
			
				$("#photonDiv").slideToggle("slow");
				if (expanded) {
					$("#arrow").hide();
					$("#backButton").hide();
					$("#startPhoton").hide();
					$("#info").hide();
					$("#submitDiv").hide();
					$("#infoText").text("To begin hit Start and wait for your Photon to light up. You then have 6 seconds to perform one, two or three ollies.");
					$("#infoText2").text("");
					$("#submitDiv").text("");
					$("#startPhoton").text("Start");
					$(this).css('font-size', '350%');
					$(this).text('Begin Session');
					setTimeout(function() {
						expanded = false;
						$("#history").show();
						$("#about").show();
						$(this).css('opacity', '0.6');
					}, 600);
					
					
				}
				else{
					
					$(this).css('opacity', '1.0');
					$(this).text('^');
					$(this).css('font-size', '500%');
					$("#startPhoton").text("Start");
					$("#history").hide();
					$("#about").hide();
					setTimeout(function() {
						$("#startPhoton").show();
						$("#info").show();
					}, 600);
					
					expanded = true;
				}
				
	});

	$('#history').click(function() {
		

				if (expanded) {
					$("#historyDiv").slideToggle("slow");

					//$(this).css('margin-top', '10%')
					$(this).css('font-size', '50px');
					$(this).text('');

					setTimeout(function() {
						expanded = false;
						$("#box").show();
						$("#about").show();
						$("#history").text('History');
						$(this).css('opacity', '0.6');

					}, 1500);

					/*
					setTimeout(function() {
					
					}, 1000);
					*/
					setTimeout(function() {
						$("#history").animate({
					    marginTop: "120px",
					   
					  }, 500, function() {
					    // Animation complete.
					  });
						
					}, 800);
					
					photonDone = false;
				}
				else{
					setTimeout(function() {
						$("#historyDiv").slideToggle("slow");
					}, 1000);

					$("#history").animate({
					    marginTop: 0,
					   
					  }, 1000, function() {
					    // Animation complete.
					  });
					$(this).css('margin-top', '0px')
					$(this).text('Start Session');
					$(this).css('opacity', '1.0');
					$(this).text('');
					$(this).css('font-size', '500%');
					$("#box").hide();
					$("#about").hide();
					setTimeout(function() {
						$('#history').text('^');

					}, 1400);


					photonDone = false;
					expanded = true;
				}
					
	});

	$('#about').click(function() {
		

				if (expanded) {
					$("#aboutDiv").slideToggle("slow");

					//$(this).css('margin-top', '10%')
					$(this).css('font-size', '50px');
					$(this).text('');

					setTimeout(function() {
						expanded = false;
						$("#box").show();
						$("#history").show();
						$("#about").text('About');
						$(this).css('opacity', '0.6');

					}, 1500);

					/*
					setTimeout(function() {
					
					}, 1000);
					*/
					setTimeout(function() {
						$("#about").animate({
					    marginTop: "240px",
					   
					  }, 500, function() {
					    // Animation complete.
					  });
						
					}, 800);
					
					
				}
				else{
					setTimeout(function() {
						$("#aboutDiv").slideToggle("slow");
					}, 1000);

					$("#about").animate({
					    marginTop: 0,
					   
					  }, 1000, function() {
					    // Animation complete.
					  });
					$(this).css('margin-top', '0px')
					$(this).text('Start Session');
					$(this).css('opacity', '1.0');
					$(this).text('');
					$(this).css('font-size', '500%');
					$("#box").hide();
					$("#history").hide();
					setTimeout(function() {
						$('#about').text('^');
						$("#aboutText").show();
					}, 1400);
					expanded = true;
				}
					
	});
	

	$(".mainButtons").mouseover(function(){
		if (expanded == false) {
			$(this).css('opacity', '1.0');
		}
	});
	$(".mainButtons").mouseout(function(){
		if (expanded == false) {
			$(this).css("opacity", "0.6");
		}
	});

	$(".buttons").mouseover(function(){
		
		$(this).css('opacity', '1.0');
		
	});
	$(".buttons").mouseout(function(){
		
		$(this).css("opacity", "0.6");
		
	});

	$('#startPhoton').click(function() {
		if (photonDone) {
			$("#submitDiv").hide();
			$("#startPhoton").text("Start");
			$("#infoText").text("To begin hit Start and wait for your Photon to light up. You then have 6 seconds to perform one, two or three ollies.");
			$("#infoText2").text("");
			$("#startPhoton").css('margin-top', '5%');
			photonDone = false;

		}
		else {
			$(this).hide();
			$("#infoText").css('font-size', '40px');
			$("#infoText").text("Running Photon");
			setTimeout(function() {
				$("#infoText").text("Running Photon.");
			}, 1000);
			setTimeout(function() {
				$("#infoText").text("Running Photon..");
			}, 2000);
			setTimeout(function() {
				$("#infoText").text("Running Photon...");
				$.ajax({url: 'RunPhoton.php'});
			}, 3000);
			
			setTimeout(function() {
				$.ajax({
	   			url: 'AirtimeCalculator.php',
	   			success: function (response) {
	   				var commaCheck = response.includes(",");
		   			if (response == 0) {
		   				$("#infoText").css('font-size', '20px');
		   				var result = "invalid. Either you didn't jump, or you're cheating";
		   			}
		   			else {
		   				if (commaCheck) {
		   					var jumps = response.split(",");
		   					var result = Math.max.apply(Math, jumps);
		   				}
		   				else {
		   					var result = response;
		   				}
		   				$("#submitDiv").show();
		   				$("#infoText2").text("Would you like to add your result to the leaderboard?");
		   				$("#startPhoton").css('margin-top', '-5%');
		   			}
		   			
		   			$("#time").val(result);
		   			$("#infoText").css('font-size', '20px');
		     		$("#infoText").text("Your best airtime was " + result + " second(s).");
		     		//$("#infoText2").text("Would you like to add your result to the leaderboard?");
		     		//$("#submitDiv").show();
		     		$("#startPhoton").show();
		     		$("#startPhoton").text("Retry?");
		     		//$("#startPhoton").css('margin-top', '-5%');
		     		photonDone = true;
	   				}
				});

			}, 15000);

		}
	});
	/*$('#postBtn').click(function() {
		var nameString = $('#nameInput').val();
		
		$.ajax({
   			url: 'InsertToDatabase.php',
   			success: function (response) {
   				$("#infoText").text(response);
   				}
			});
	});*/

	$('#reg-form').submit(function(e){
		
    e.preventDefault(); // Prevent Default Submission
		
    $.ajax({
	url: 'InsertingToDatabase.php',
	type: 'POST',
	data: $(this).serialize(), // it will serialize the form data
        dataType: 'html'
    })
    .done(function(data){
	    $('#submitDiv', '#info').fadeOut('slow', function(){
	         $('#info').fadeIn('slow').text(data);
	         setTimeout(function() {
				location.reload();
			}, 4000);
        });
    })
    .fail(function(){
	alert('Ajax Submit Failed ...');	
    });
});
});