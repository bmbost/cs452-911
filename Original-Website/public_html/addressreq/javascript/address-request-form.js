// Function that executes when the HTML document is ready
jQuery(document).ready(function($) {
	
	document.getElementById('requestdate').value = Date();
	
	//---------------------------------------------------------------------------------------------------------------------
	// Function: 	Call CheckIsNum
	//---------------------------------------------------------------------------------------------------------------------
	// Description: Function that calls the checkIsNum function on a keydown event for any element in the IsNum class.
	//---------------------------------------------------------------------------------------------------------------------		
	// Purpose: 	The purpose of this is to prevent user from using keystrokes to enter alpha or
	// 				special characters in a numeric field. This will also pertain to new dynamically
	// 				added fields of the IsNum class.
	//---------------------------------------------------------------------------------------------------------------------
	$(document).on('keydown','.IsNum', function(event){ // when the user presses a key in attempt to enter a value in a field
														// with the IsNum class
		
		return checkIsNum(event);
		
	}); // end Call CheckIsNum Function
	
	
	//---------------------------------------------------------------------------------------------------------------------
	// Function:	Call CheckIsAlpha
	//---------------------------------------------------------------------------------------------------------------------
	// Description: Function that calls the checkIsAlpha function on a keydown event for any element in the IsAlpha class. 
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	The purpose of this is to prevent user from using keystrokes to enter numeric or
	// 				special characters in field where only letters are valid. This will also pertain to
	// 				new dynamically added fields of the IsAlpha class.
	//---------------------------------------------------------------------------------------------------------------------
	$(document).on('keydown','.IsAlpha', function(event){ // when the user presses a key in attempt to enter a value in a field
														  // with the IsAlpha class
		
		return checkIsAlpha(event);
		
	}); // end Call CheckIsAlpha Function
  	

	//---------------------------------------------------------------------------------------------------------------------
	// Function:	#reqisresYN Check Box Change
	//---------------------------------------------------------------------------------------------------------------------
	// Description: Copies requestor information to resident information and disables resident fields.
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	If the person filling out the form (the requestor) will also be residing in the new property (the resident),
	//				then the check box is present to prevent the user from having to enter duplicate contact information.
	//				Both resident and requestor information is required; however, if the user checks the box - the function
	//				will copy the requestor information to the resident fields and disable them. If the box is unchecked,
	//				then the function will simply enable the fields so the user may edit them.
	//---------------------------------------------------------------------------------------------------------------------	
	$("#reqisresYN").change(function(){ // if the #reqisresYN check box is changed (either checked or unchecked)...
				
		// If the #reqisresYN check box is NOT checked....
		if($("#reqisresYN").is(':checked')) {
			
			var validator = $( "#addreqform" ).validate();
			
			if(validator.element( "#reqFirst" ) && validator.element( "#reqLast" ) && validator.element( "#requArea1" ) && validator.element( "#requFirstThree1" ) && validator.element( "#requLastFour1" ) && validator.element( "#requArea2" ) && validator.element( "#requFirstThree2" ) && validator.element( "#requLastFour2" ))
			{
				$("#resFirst").val($("#reqFirst").val());			// copy the first name
				$("#resFirst").prop('disabled', true);				// disable the first name
				$("#resFirst").tooltipster('hide');					// hide the tooltip, if error is present
				$("#resFirst").removeClass( "error" );				// remove the error class so formatting reverts back to normal
				
				$("#resLast").val($("#reqLast").val());				// copy the last name
				$("#resLast").prop('disabled', true);				// disable the last name
				$("#resLast").tooltipster('hide');					// hide the tooltip, if error is present
				$("#resLast").removeClass( "error" );				// remove the error class so formatting reverts back to normal
				
				$("#resiArea1").val($("#requArea1").val());			// copy the area code of primary phone number
				$("#resiArea1").prop('disabled', true);				// disable the area code of primary phone number
				$("#resiArea1").tooltipster('hide');				// hide the tooltip, if error is present
				$("#resiArea1").removeClass( "error" );				// remove the error class so formatting reverts back to normal
				
				$("#resiFirstThree1").val($("#requFirstThree1").val());		// copy the first 3 digits of primary phone number
				$("#resiFirstThree1").prop('disabled', true);				// disable the first 3 digits of primary phone number
				$("#resiFirstThree1").tooltipster('hide');					// hide the tooltip, if error is present
				$("#resiFirstThree1").removeClass( "error" );				// remove the error class so formatting reverts back to normal
				
				$("#resiLastFour1").val($("#requLastFour1").val());			// copy the last 4 digits of primary phone number
				$("#resiLastFour1").prop('disabled', true);					// disable the last 4 digits of primary phone number
				$("#resiLastFour1").tooltipster('hide');					// hide the tooltip, if error is present
				$("#resiLastFour1").removeClass( "error" );					// remove the error class so formatting reverts back to normal

				$("#resiArea2").val($("#requArea2").val());					// copy the area code of secondary phone number
				$("#resiArea2").prop('disabled', true);						// disable the area code of secondary phone number
				$("#resiArea2").tooltipster('hide');						// hide the tooltip, if error is present
				$("#resiArea2").removeClass( "error" );						// remove the error class so formatting reverts back to normal
				
				$("#resiFirstThree2").val($("#requFirstThree2").val());		// copy the first 3 digits of secondary phone number
				$("#resiFirstThree2").prop('disabled', true);				// disable the first 3 digits of secondary phone number
				$("#resiFirstThree2").tooltipster('hide');					// hide the tooltip, if error is present
				$("#resiFirstThree2").removeClass( "error" );				// remove the error class so formatting reverts back to normal
				
				$("#resiLastFour2").val($("#requLastFour2").val());			// copy the last 4 digits of secondary phone number
				$("#resiLastFour2").prop('disabled', true);					// disable the last 4 digits of secondary phone number
				$("#resiLastFour2").tooltipster('hide');					// hide the tooltip, if error is present
				$("#resiLastFour2").removeClass( "error" );				// remove the error class so formatting reverts back to normal
			
			}
			else{
				
				$("#reqisresYN").prop('checked', false);
				
			}
		}
		else {
			
			$("#resFirst").prop('disabled', false);				// enable the first name
			$("#resLast").prop('disabled', false);				// enable the last name
			$("#resiArea1").prop('disabled', false);			// enable the area code of primary phone number
			$("#resiFirstThree1").prop('disabled', false);				// enable the first 3 digits of primary phone number
			$("#resiLastFour1").prop('disabled', false);				// enable the last 4 digits of primary phone number
			$("#resiArea2").prop('disabled', false);					// enable the area code of secondary phone number
			$("#resiFirstThree2").prop('disabled', false);				// enable the first 3 digits of secondary phone number
			$("#resiLastFour2").prop('disabled', false);				// enable the last 4 digits of secondary phone number
			
		}
		
	});	// end #reqisresYN Check Box Change Function	
	
	
	//---------------------------------------------------------------------------------------------------------------------
	// Function:	Requestor Input Change
	//---------------------------------------------------------------------------------------------------------------------
	// Description: Copies requestor information to resident information
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	If valid, function updates resident information if requestor information is changed 
	//---------------------------------------------------------------------------------------------------------------------	
	$("#reqFirst").change(function(){ // if the input is changed (either checked or unchecked)...
		
		var validator = $( "#addreqform" ).validate();
		
		// if the new input is valid and the check box signifying requestor = resident is checked....
		if(validator.element( "#reqFirst" ) && $("#reqisresYN").is(':checked') ){
			
			$("#resFirst").val($("#reqFirst").val());			// update the first name
			
		}
	
	});
	$("#reqLast").change(function(){ // if the input is changed (either checked or unchecked)...
		
		var validator = $( "#addreqform" ).validate();
		
		// if the new input is valid and the check box signifying requestor = resident is checked....
		if(validator.element( "#reqLast" ) && $("#reqisresYN").is(':checked')){
			
			$("#resLast").val($("#reqLast").val());				// update the last name
			
		}
	
	});
	$("#requArea1").change(function(){ // if the input is changed (either checked or unchecked)...
		
		var validator = $( "#addreqform" ).validate();
		
		// if the new input is valid and the check box signifying requestor = resident is checked....
		if(validator.element( "#requArea1" ) && $("#reqisresYN").is(':checked')){
			
			$("#resiArea1").val($("#requArea1").val());				// update primary area code
			
		}
	
	});
	$("#requFirstThree1").change(function(){ // if the input is changed (either checked or unchecked)...
		
		var validator = $( "#addreqform" ).validate();
		
		// if the new input is valid and the check box signifying requestor = resident is checked....
		if(validator.element( "#requFirstThree1" ) && $("#reqisresYN").is(':checked')){
			
			$("#resiFirstThree1").val($("#requFirstThree1").val());			// update first 3 digits of primary phone
			
		}
	
	});
	$("#requLastFour1").change(function(){ // if the input is changed (either checked or unchecked)...
		
		var validator = $( "#addreqform" ).validate();
		
		// if the new input is valid and the check box signifying requestor = resident is checked....
		if(validator.element( "#requLastFour1" ) && $("#reqisresYN").is(':checked')){
			
			$("#resiLastFour1").val($("#requLastFour1").val());			// update last 4 digits of primary phone
			
		}
	
	});
	$("#requArea2").change(function(){ // if the input is changed (either checked or unchecked)...
		
		var validator = $( "#addreqform" ).validate();
		
		// if the new input is valid and the check box signifying requestor = resident is checked....
		if(validator.element( "#requArea2" ) && $("#reqisresYN").is(':checked')){
			
			$("#resiArea2").val($("#requArea2").val());				// update secondary area code
			
		}
	
	});
	$("#requFirstThree2").change(function(){ // if the input is changed (either checked or unchecked)...
		
		var validator = $( "#addreqform" ).validate();
		
		// if the new input is valid and the check box signifying requestor = resident is checked....
		if(validator.element( "#requFirstThree2" ) && $("#reqisresYN").is(':checked')){
			
			$("#resiFirstThree2").val($("#requFirstThree2").val());			// update first 3 digits of secondary phone
			
		}
	
	});
	$("#requLastFour2").change(function(){ // if the input is changed (either checked or unchecked)...
		
		var validator = $( "#addreqform" ).validate();
		
		// if the new input is valid and the check box signifying requestor = resident is checked....
		if(validator.element( "#requLastFour2" ) && $("#reqisresYN").is(':checked')){
			
			$("#resiLastFour2").val($("#requLastFour2").val());			// update last 4 digits of secondary phone
			
		}
	
	});
	
	
	//---------------------------------------------------------------------------------------------------------------------
	// Function:	Tooltipster Plugin Config
	//---------------------------------------------------------------------------------------------------------------------
	// Description: The following 6 functions initializes the Tooltipster Plugin for the addreqform.
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	The purpose of the tooltipster plugin is to work alongside the jQuery Validation plugin. Instead of 
	//				writing jQuery Validate error messages beside or beneath a given field, the error messages display in a
	//				configurable tooltip beneath the field.
	//---------------------------------------------------------------------------------------------------------------------	
	// 1. Initialize tooltipsters for addreqform
	$('#addreqform input[type="text"], #addreqform input[type="radio"], #addreqform textarea').tooltipster({
		trigger: 'custom',
		onlyOne: false,
		position: 'bottom'
	});
	// end Tooltipster Plugin Config Function
	//---------------------------------------------------------------------------------------------------------------------	

	
	//---------------------------------------------------------------------------------------------------------------------
	// Function:	jQuery Validation Plugin - Custom Methods Config
	//---------------------------------------------------------------------------------------------------------------------
	// Description: The following function adds a custom validation method to the jQuery Validation plugin.
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	While jQuery Validate has many useful validation methods, they do not provide some specific methods
	//				necessary to ensure that the jobappform is valid. The following methods will ensure that letters are 
	//				entered into a field where only letters are appropriate.
	//---------------------------------------------------------------------------------------------------------------------	
	// 1. Add custom validation method to make sure only letters are entered into a field 
	jQuery.validator.addMethod("lettersonly",function(value,element) {
		return this.optional(element) || /^[a-zA-Z]+$/i.test(value);}, "Please enter letters only.");
	// end jQuery Validation Plugin - Custom Methods Config Function
	//---------------------------------------------------------------------------------------------------------------------	
	
	
	//---------------------------------------------------------------------------------------------------------------------
	// Function:	jQuery Validation Plugin Config
	//---------------------------------------------------------------------------------------------------------------------
	// Description: The following function add jQuery validation to the fields in the addreqform. 
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	The jQuery validation plugin is fully configurable. Each field has been given a validation method that
	//				is appropriate to ensure that all data submitted in the ALC911 Address Request form is valid. Custom
	//				messages have been configured for each error. Error messages have been configured to display in tooltips
	//				and works alongside the Tooltipster plugin.
	//---------------------------------------------------------------------------------------------------------------------			
	// Validate on on keyup and 'Next' or 'Back' for addreqform
	$("#addreqform").validate({ // call the validate function on document ready for addreqform...
		// configuration of the validation rules for form fields
		rules: {
			reqFirst: {
				required: true
			} ,
			reqLast: {
				required: true
			},
			requArea1: {
				required: true,
				number: true,
				minlength: 3
			},
			requFirstThree1: {
				required: true,
				number: true,
				minlength: 3
			},
			requLastFour1: {
				required: true,
				number: true,
				minlength: 4
			},
			requArea2: {
				required: function(element){
				return $("#requFirstThree2").val() != '' || $("#requLastFour2").val() != '';
						  },
				number: true,
				minlength: 3
			},
			requFirstThree2: {
				required: function(element){
				return $("#requArea2").val() != '' || $("#requLastFour2").val() != '';
						  },
				number: true,
				minlength: 3
			},
			requLastFour2: {
				required: function(element){
				return $("#requArea2").val() != '' || $("#requFirstThree2").val() != '';
						  },
				number: true,
				minlength: 4
			},
			resFirst: {
				required: true
			},
			resLast: {
				required: true
			},
			resiArea1: {
				required: true,
				number: true,
				minlength: 3
			},
			resiFirstThree1: {
				required: true,
				number: true,
				minlength: 3
			},
			resiLastFour1: {
				required: true,
				number: true,
				minlength: 4
			},
			resiArea2: {
				required: function(element){
				return $("#resiFirstThree2").val() != '' || $("#resiLastFour2").val() != '';
						  },
				number: true,
				minlength: 3
			},
			resiFirstThree2: {
				required: function(element){
				return $("#resiArea2").val() != '' || $("#resiLastFour2").val() != '';
						  },
				number: true,
				minlength: 3
			},
			resiLastFour2: {
				required: function(element){
				return $("#resiArea2").val() != '' || $("#resiFirstThree2").val() != '';
						  },
				number: true,
				minlength: 4
			},
			strucdetails: {
				required: true
			},
			roadname: {
				required: true
			},
			markersINFO: {
				required: true
			}
		},
		// configuration of custom error messages for fields that fail validation
		messages: {
			reqFirst: {
				required: "Please enter your first name."
			},
			reqLast: {
				required: "Please enter your last name."
			},
			requArea1: {
				number: "Please enter only numeric values."
			},
			requFirstThree1: {
				number: "Please enter only numeric values."
			},
			requLastFour1: {
				number: "Please enter only numeric values."
			},
			requArea2: {
				number: "Please enter only numeric values."
			},
			requFirstThree2: {
				number: "Please enter only numeric values."
			},
			requLastFour2: {
				number: "Please enter only numeric values."
			},
			resFirst: {
				required: "Please enter the resident's first name."
			},
			resLast: {
				required: "Please enter the resident's last name."
			},
			resiArea1: {
				number: "Please enter only numeric values."
			},
			resiFirstThree1: {
				number: "Please enter only numeric values."
			},
			resiLastFour1: {
				number: "Please enter only numeric values."
			},
			resiArea2: {
				number: "Please enter only numeric values."
			},
			resiFirstThree2: {
				number: "Please enter only numeric values."
			},
			resiLastFour2: {
				number: "Please enter only numeric values."
			},
			strucdetails: {
				required: "Please input the structure details."
			},
			roadname: {
				required: "Please enter the road/street name."
			}
		},
		// Show a Tooltipster tooltip on error, update tooltip if error changes
		errorPlacement: function (error, element) {
			$(element).tooltipster('update', $(error).text());
			$(element).tooltipster('show');
		},
		// Hide the tooltip as soon as error is cleared
		success: function (label, element) {
			$(element).tooltipster('hide');
		}
	}); // end jQuery Validation Config for addreqform

	// end jQuery Validation Plugin Config Functions
	//---------------------------------------------------------------------------------------------------------------------

	
}); // end Document Ready Function


//If this function returns false, the key pressed will not be recorded in the input 
function checkIsNum (e)
{
	//This is a variable where we are storing the value of the key key, which is a numeric value
	//that we will check later
	var test;
	
	//How to assign the numeric value to the variable
	test = e.which;

	 //Okay, the range 47 to 58 is checking if the keys 1 through 9 are pressed on the keyboard
	//while the values 95 through 106 are checking if the keys 1 through 9 are pressed on the keyboard.
	//The range 36 to 41 is testing if an arrow key was pressed while the value 8 is testing if backspace was
	//pressed. Finally 9 is testing if tab was pressed
	if((test > 47 && test < 58) || (test > 95 && test < 106) || (test > 36 && test < 41) || test == 8 || test == 9)
	{
		return true;
	}
	else
	{
		return false;
	}
}

//Exact same funcationality as checkIsNum
function checkIsAlpha (e)
{

	var test;
	test = e.which;
	
	//Okay, the range 64 to 91 is checking if a-z, either lower or upper case, was pressed
	//The range 36 to 41is testing if an arrow key was pressed while the value 8 is checking if backspace was
	//pressed. The value 9 is testing if tab was pressed and the value 32 is testing if space was pressed
	if((test > 64 && test < 91) || (test > 36 && test < 41) || test == 8 || test == 9 || test == 32)
	{
		return true;
	}
	else
	{
		return false;
	}

}		
// before the page reloads or refreshes...
window.onbeforeunload = function(event)
{
	$('#addreqform')[0].reset();

};

