// Function that executes when the HTML document is ready
jQuery(document).ready(function($) {
	
	// This allows you to bypass Javascript validation when testing the form
	// Set testmode to false to enable Javascript validation. 
	var testmode = true;
	
	//call getDate() when loading the page
	getDate();
	
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
	// Function:	stemployY "Yes" Radio Button Click
	//---------------------------------------------------------------------------------------------------------------------
	// Description: Show the agencyname textarea field and make it required.
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	This action is to display an additional field if the user answers "Yes" that they are a state employee.
	//				The field is hidden by default; however, if applicable, the user will be required to enter the agency name.
	//---------------------------------------------------------------------------------------------------------------------	
	$('#stemployY').click( // when the "Yes" radio button is clicked...
	function(){
		
		// If the "Yes" radio button is truly checked...
		if ( $(this).is(':checked') ){
			
			$('#agencynamerow').show();   			// show the table row containing the field with agency name
			
		}
	}
	); // end stemployY "Yes" Radio Button Click Function


	//---------------------------------------------------------------------------------------------------------------------
	// Function:	stemployN "No" Radio Button Click
	//---------------------------------------------------------------------------------------------------------------------
	// Description: Hide the agencyname textarea field and make it not required.
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	This action is to hide an additional field if the user answers "No" that they are not a state employee.
	//				The field is hidden by default. Also removes the required property and clears any present values.
	//---------------------------------------------------------------------------------------------------------------------	
	$('#stemployN').click( // when the "No" radio button is clicked...
	function(){
		
		// If the "No" radio button is truly checked...
		if ( $(this).is(':checked') ){

			$('#agencynamerow').hide();   				// hide the table row containing the field with agency name
			$("#agencyname").val("");					// clear out any present values
			$("#agencyname").tooltipster('hide');		// hide the tooltip, if error is present
			$( "#agencyname" ).removeClass( "error" );	// remove the error class so formatting reverts back to normal
		}
	}
	); // end stemployY "Yes" Radio Button Click Function
	

	//---------------------------------------------------------------------------------------------------------------------
	// Function:	Other Race (#otherraceTF) Check Box Change
	//---------------------------------------------------------------------------------------------------------------------
	// Description: When check box is changed, show/hide and clear the textarea field (#otherracename) following the Other Race  
	//				check box on Part 5 of form (#jobappform5).
	//				Check box is in response to "What race or culture do you consider yourself?"
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	The #otherracename field is hidden by default. If the user checks the Other Race check box, then this
	//				field should be made visible so the user can enter additional information. If the user unchecks the
	//				Other Race check box, then the field is hidden and the value is cleared.
	//---------------------------------------------------------------------------------------------------------------------	
	$("#otherraceTF").change(function(){ // if the Other Race check box is changed (either checked or unchecked)...
		
		// Toggle the visibility of the #otherracename textarea field
		$("#otherracename").toggle();
		
		// If the Other Race check box is NOT checked....
		if(!$("#otherraceTF").is(':checked')) {
			
			$("#otherracenamefield").val("");					// Clear the value in the #otherracename field
			$("#otherracenamefield").tooltipster('hide');		// hide the tooltip, if error is present
			$("#otherracenamefield").removeClass( "error" );	// remove the error class so formatting reverts back to normal
		}
		
	});	// end Other Race (#otherraceTF) Check Box Change Function	
	
	
	//---------------------------------------------------------------------------------------------------------------------
	// Function:	ActiveDutyY "Yes" Radio Button Click
	//---------------------------------------------------------------------------------------------------------------------
	// Description: Show the following unordered list and span "#veteraninfo" and "vetinstructions"
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	This action is to display additional fields if the user answers "Yes" that they have been active duty in
	//				the  US Armed Forces. The fields are hidden by default; however, if applicable, the user will need to 
	//				enter the dates served and information about Vietnam service and Disability.
	//---------------------------------------------------------------------------------------------------------------------
	$('#activedutyY').click( // when the "Yes" radio button is clicked regarding question "Have you ever been on active duty in the US Armed Forces?"
	function(){
		// If the "Yes" radio button is checked...
		if ( $(this).is(':checked') ){
			
			$('#veteraninfo').show(); // show unordered list containing veteran fields
			$('#vetinstructions').show(); // show the span containing instructions to complete the next form page
			
		}
	}
	); // end ActiveDutyY Radio Button Click Function

	
	//---------------------------------------------------------------------------------------------------------------------
	// Function:	ActiveDutyN "No" Radio Button Click
	//---------------------------------------------------------------------------------------------------------------------
	// Description: Hide the following unordered list and span "#veteraninfo" and "vetinstructions" and clear all child 
	//				fields
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	This action is to hide and clear all additional fields if the user answers "No" that they have not been 
	//				active duty in the  US Armed Forces.
	//---------------------------------------------------------------------------------------------------------------------
	$('#activedutyN').click( // when the "No" radio button is clicked regarding question "Have you ever been on active duty in the US Armed Forces?"
	function(){
		// If the "Yes" radio button is checked...
		if ($(this).is(':checked')){
							
			// clear active duty service dates, remove any errors
			$('#actdutyfromdate').val("");
			$('#actdutytodate').val("");
			$("#actdutyfromdate").tooltipster('hide');		// hide the tooltip, if error is present
			$("#actdutyfromdate").removeClass( "error" );	// remove the error class so formatting reverts back to normal
			$("#actdutytodate").tooltipster('hide');		// hide the tooltip, if error is present
			$("#actdutytodate").removeClass( "error" );	// remove the error class so formatting reverts back to normal
			
			// clear and hide the Vietnam service dates, remove any errors
			$("#vietnamfromdate").val("");
			$("#vietnamtodate").val("");
			$("#vietnamdates").hide();
			$("#vietnamfromdate").tooltipster('hide');		// hide the tooltip, if error is present
			$("#vietnamfromdate").removeClass( "error" );	// remove the error class so formatting reverts back to normal
			$("#vietnamtodate").tooltipster('hide');		// hide the tooltip, if error is present
			$("#vietnamtodate").removeClass( "error" );	// remove the error class so formatting reverts back to normal
			
			// Check the "No" radio button to serving in the Republic of Vietnam and hide
			$("#repubofvietnamN").prop("checked", true);
			$("#repubofvietnam").hide();
			
			// Uncheck the Vietnam Era Veteran
			$("#vietnamvetTF").prop("checked", false);
			
			// Remove disability %, uncheck Disabled Veteran and hide, remove any errors
			$("#pdisablednum").val("");
			$("#disabledvetTF").prop("checked", false);
			$("#pdisabled").hide();
			$("#pdisablednum").tooltipster('hide');		// hide the tooltip, if error is present
			$("#pdisablednum").removeClass( "error" );	// remove the error class so formatting reverts back to normal
			
			// hide the entire unordered list containing all active duty veteran fields
			$('#veteraninfo').hide();
			
			// hide the span containing instructions to complete the next form page
			$('#vetinstructions').hide();
			
		}
	}
	); // end ActiveDutyN Radio Button Click Function
	

	//---------------------------------------------------------------------------------------------------------------------
	// Function:	Vietnam Era Veteran (#vietnamvetTF) Check Box Change
	//---------------------------------------------------------------------------------------------------------------------
	// Description: When check box is changed, show/hide and clear all child fields following the Vietnam Era Veteran check 
	// 				box on Part 5 of form (#jobappform5).
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	The #vietnamvetTF has several child fields containing a question regarding service in the Republic of
	//				Vietnam and dates served. When user checks the box indicating that they are a Vietnam Vet, show the 
	//				subsequent fields. If the same check box is unchecked, hide and clear all subsequent fields.
	//---------------------------------------------------------------------------------------------------------------------	
	$("#vietnamvetTF").change(function(){ // if the Vietnam Era veteran check box is changed...
		
		// Toggle the visibility of the #repubofvietnam list item containing the question regarding service in the Republic
		// of Vietnam and service dates
		$("#repubofvietnam").toggle();

		// Perform a check to see if the user has answered 'Yes,' indicating that they served in the Repub of Vietnam
		// If true, clear service date fields and hide them
		if($("#repubofvietnamY").is(':checked')){ // If yes is checked...
			
			$("#vietnamfromdate").val(""); 	// clear the Vietnam service "from" date
			$("#vietnamtodate").val("");	// clear the Vietnam service "to" date
			$("#vietnamdates").hide();	 	// hide the Vietnam service dates altogether
			
			$("#vietnamfromdate").tooltipster('hide');		// hide the tooltip, if error is present
			$("#vietnamfromdate").removeClass( "error" );	// remove the error class so formatting reverts back to normal
			$("#vietnamtodate").tooltipster('hide');		// hide the tooltip, if error is present
			$("#vietnamtodate").removeClass( "error" );	// remove the error class so formatting reverts back to normal
			
			// Check the "No" radio button regarding service in Republic of Vietnam
			$("#repubofvietnamN").prop("checked", true);
		}
	}); // end Vietnam Era Veteran (#vietnamvetTF) Check Box Change Function

	
	//---------------------------------------------------------------------------------------------------------------------
	// Function:	#repubofvietnamY "Yes" Radio Button Click
	//---------------------------------------------------------------------------------------------------------------------
	// Description: When radio button is selected, show the Vietnam service date fields on Part 5 of form #jobappform5).
	//				Radio Button "Yes" is in response to "Did you serve in the Republic of Vietnam?"
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	The #repubofvietnamY has child fields to capture Vietnam service dates. If the user answers "Yes," then
	// 				the user needs to enter the dates of service. This function shows the service dates fields, which are
	//				hidden by default.
	//---------------------------------------------------------------------------------------------------------------------		
	$("#repubofvietnamY").change(function(){ // if the user clicks "Yes"...
		
		// Show the Vietnam service date fields
		$("#vietnamdates").show();
		
	}); // end #repubofvietnamY "Yes" Radio Button Click Function
	

	//---------------------------------------------------------------------------------------------------------------------
	// Function:	#repubofvietnamN "No" Radio Button Click
	//---------------------------------------------------------------------------------------------------------------------
	// Description: When radio button is selected, hide and clear Vietnam service date fields on Part 5 of form (#jobappform5).
	//				Radio Button "No" is in response to "Did you serve in the Republic of Vietnam?"
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	The #repubofvietnamN has child fields to capture Vietnam service dates. If the user answers "No," then
	// 				the user does not need to enter the dates of service. This function hides the service dates fields and
	//				resets the value in these fields.
	//---------------------------------------------------------------------------------------------------------------------	
	$("#repubofvietnamN").change(function(){ // if the user clicks "No"...
	
		$("#vietnamfromdate").val(""); 	// clear the Vietnam service "from" date
		$("#vietnamtodate").val("");	// clear the Vietnam service "to" date
		
		$("#vietnamfromdate").tooltipster('hide');		// hide the tooltip, if error is present
		$("#vietnamfromdate").removeClass( "error" );	// remove the error class so formatting reverts back to normal
		$("#vietnamtodate").tooltipster('hide');		// hide the tooltip, if error is present
		$("#vietnamtodate").removeClass( "error" );	// remove the error class so formatting reverts back to normal
		
		// Hide the Vietnam service date fields
		$("#vietnamdates").hide();		
		
	});	// end #repubofvietnamN "No" Radio Button Click Function
	

	//---------------------------------------------------------------------------------------------------------------------
	// Function:	Disabled Veteran (#disabledvetTF) Check Box Change
	//---------------------------------------------------------------------------------------------------------------------
	// Description: When check box for Disabled Veteran is changed, show/hide and clear disabled % field on Part 5 of form 
	//				(#jobappform5).
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	The #disabledvetTF has a child field to collect the percent of disability if the veteran is disabled.
	//				If the user checks that they are disabled, show the % disability field. If box is unchecked, hide and
	//				clear the value in the % disabled field.
	//---------------------------------------------------------------------------------------------------------------------		
	$("#disabledvetTF").change(function(){ // if the check box is changed...
	
		// Toggle the visibility of the % disabled field
		$("#pdisabled").toggle();
		
		// If the check box has been unchecked, indicating that the user is NOT a disabled veteran...
		if($('#disabledvetTF').prop('checked')==false){
			// clear the value in the % disabled field
			$("#pdisablednum").val("");
			
			$("#pdisablednum").tooltipster('hide');		// hide the tooltip, if error is present
			$("#pdisablednum").removeClass( "error" );	// remove the error class so formatting reverts back to normal

		}
	});	// end Disabled Veteran (#disabledvetTF) Check Box Change Function
	

	//---------------------------------------------------------------------------------------------------------------------
	// Function:	#honotactdutyY "Yes" Radio Button Click
	//---------------------------------------------------------------------------------------------------------------------
	// Description: When user answers "Yes" to the question "Have you served honorably in the Armed Forces of the United
	//				States on active duty for reasons other than Active Duty Training (ADT)?" on Part 6 of form 
	//				(#jobappform6), show all child fields. Copy over the service dates from Part 5 of the form.
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	If the person answers "Yes," they will need to complete several other fields about their service. This
	//				makes those fields available, because they are hidden by default. Also, the function will transfer over
	//				the service dates from the Veteran section of the Affirmative Action page so the user does not have to
	//				enter redundant information.
	//---------------------------------------------------------------------------------------------------------------------	
	$('#honoractdutyY').click( // if the user clicks the "Yes" radio button...
	function(){
		
		// If the "Yes" button is checked...
		if ( $(this).is(':checked') ){
			
			// show the unordered list containing additional veteran info fields
			$('#veteranaddlinfo').show();		

			// transfer beginning active duty service date from previous page
			$("#honoractdutyfromdate").val($("#actdutyfromdate").val());
			
			// transfer ending active duty service date from previous page
			$("#honoractdutytodate").val($("#actdutytodate").val());
			
		}
	}
	); // end #honotactdutyY "Yes" Radio Button Click Function
	
	
	//---------------------------------------------------------------------------------------------------------------------
	// Function:	#honotactdutyY "No" Radio Button Click
	//---------------------------------------------------------------------------------------------------------------------
	// Description: When user answers "No" to the question "Have you served honorably in the Armed Forces of the United
	//				States on active duty for reasons other than Active Duty Training (ADT)?" on Part 6 of form 
	//				(#jobappform6), hide and clear all child fields.
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	If the person answers "No," they will not need to complete several other fields about their service. This
	//				makes those fields unavailable and clears out any previous values.
	//---------------------------------------------------------------------------------------------------------------------	
	$('#honoractdutyN').click( // if the user clicks the "No" radio button...
	function(){
		
		// If the "No" button is checked...
		if ( $(this).is(':checked') ){
			
			// clear the active duty from date
			$("#honoractdutyfromdate").val("");
			
			// clear the active duty to date
			$("#honoractdutytodate").val("");
			
			// reset the Type of Discharge field
			$("#typeofdischarge").val("none");
			
			// clear the textarea for campaign medals received
			$("#medals").val("");
			
			$("#honoractdutyfromdate").tooltipster('hide');		// hide the tooltip, if error is present
			$("#honoractdutyfromdate").removeClass( "error" );	// remove the error class so formatting reverts back to normal
			$("#honoractdutytodate").tooltipster('hide');		// hide the tooltip, if error is present
			$("#honoractdutytodate").removeClass( "error" );	// remove the error class so formatting reverts back to normal
			
			$('#veteranaddlinfo').hide();							
		}
	}
	); // end #honotactdutyY "No" Radio Button Click Function
	
	
	//---------------------------------------------------------------------------------------------------------------------
	// Function:	#disabledspouseY "Yes" Radio Button Click
	//---------------------------------------------------------------------------------------------------------------------
	// Description: When user answers "Yes" to the question "Are you the spouse of an honorably discharged veteran who has
	//				a service conntected permanent or total disability?" on Part 6 of form #jobappform6), show all child
	//				fields.
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	If the person answers "Yes," they will need to enter the % of spouse's disability. This function makes
	//				the % disability field available, because it is hidden by default.
	//---------------------------------------------------------------------------------------------------------------------		
	$('#disabledspouseY').click( // if the user clicks "Yes"...
	function(){
		
		// If the "Yes" radio button is truly checked...
		if ( $(this).is(':checked') ){
			
			// show the % spouse disability field
			$('#disabledspouseinfo').show();							
		}
	}
	); // end #disabledspouseY "Yes" Radio Button Click Function
	
	
	//---------------------------------------------------------------------------------------------------------------------
	// Function:	#disabledspouseN "No" Radio Button Click
	//---------------------------------------------------------------------------------------------------------------------
	// Description: When user answers "No" to the question "Are you the spouse of an honorably discharged veteran who has
	//				a service conntected permanent or total disability?" on Part 6 of form #jobappform6), hide/clear all 
	//				child fields.
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	If the person answers "No," they will not need to enter the % of spouse's disability. This function makes
	//				the % disability field unavailable and clears any present values.
	//---------------------------------------------------------------------------------------------------------------------		
	$('#disabledspouseN').click( // if the user click "No"...
	function(){
		
		// if the "No" radio button is truly checked...
		if ( $(this).is(':checked') ){
			
			// clear the % spouse disability value
			$('#pspousedisablednum').val("");
			
			$("#pspousedisablednum").tooltipster('hide');		// hide the tooltip, if error is present
			$("#pspousedisablednum").removeClass( "error" );	// remove the error class so formatting reverts back to normal
			
			// hide the spouse disability info
			$('#disabledspouseinfo').hide();							
		}
	}
	); // end #disabledspouseN "No" Radio Button Click Function
	
	
	//---------------------------------------------------------------------------------------------------------------------
	// Function:	#survivingspouseY "Yes" Radio Button Click
	//---------------------------------------------------------------------------------------------------------------------
	// Description: When user answers "Yes" to the question "Are you the surviving spouse of a veteran who died from service
	//				related activities?" on Part 6 of form #jobappform6), show all child fields.
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	If the person answers "Yes," they will need to enter any medals their spouse received in service. This 
	//				function makes the spouse medals field available, which is hidden by default.
	//---------------------------------------------------------------------------------------------------------------------		
	$('#survivingspouseY').click( // if the user clicks "Yes"...
	function(){
		
		// if the "Yes" radio button is truly clicked...
		if ( $(this).is(':checked') ){
			
			// show the deceased spouse fields
			$('#deceasedspouseinfo').show();	
			
		}
	}
	); // #survivingspouseY "Yes" Radio Button Click Function
	
	
	//---------------------------------------------------------------------------------------------------------------------
	// Function:	#survivingspouseN "No" Radio Button Click
	//---------------------------------------------------------------------------------------------------------------------
	// Description: When user answers "No" to the question "Are you the surviving spouse of a veteran who died from service
	//				related activities?" on Part 6 of form #jobappform6), hide/clear all child fields.
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	If the person answers "No," they will not need to enter any medals their spouse received in service. This 
	//				function makes the spouse medals field unavailable and clears any values, if present.
	//---------------------------------------------------------------------------------------------------------------------		
	$('#survivingspouseN').click( // if the user clicks "No"....
	function(){
		
		// if the "No" radio button is truly checked...
		if ( $(this).is(':checked') ){
			
			// clear the spouse medals field
			$('#spousemedals').val("");
			
			// hide the deceased spouse fields
			$('#deceasedspouseinfo').hide();
			
		}
	}
	); // end #survivingspouseN "No" Radio Button Click Function
		
		
	//---------------------------------------------------------------------------------------------------------------------
	// Function:	jQuery UI Accordion Config
	//---------------------------------------------------------------------------------------------------------------------
	// Description: This function sets creates an accordion widget with the #employmenthistory div
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	The purpose of this widget is to create collapsible employers. A user can enter as many as 10 employers
	// 				as part of their employment history. If all 10 employment sections are displayed at once, it uses a lot
	//				of space on the web page. The accordion widget collapses the previous employer when a new one is dynamically 
	//				added. The user may go back and select a previous employer to edit; however, only one employer section 
	//				may be open at any given time.
	//---------------------------------------------------------------------------------------------------------------------	
	$(function() {
	$( "#employmenthistory" ).accordion({
		heightStyle: "content"
		});
    }); // end jQuery UI Accordion Config Function
  
  
	//---------------------------------------------------------------------------------------------------------------------
	// Function:	jQuery UI Date Picker Config
	//---------------------------------------------------------------------------------------------------------------------
	// Description: This function sets the defaults for all elements with the "datepicker" class. It also validates the
	// 				current datepicker element when it is changed.
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	Date fields have the class called datepicker. This is a jQuery UI function that forces a calendar to
	//				pop up when the field is activated. The user can pick a date as opposed to typing it in; however, they
	//				will stil have that option. Also, when a datepicker element is changed, the valid() function is called
	//				to ensure that the date selected is valid.
	//---------------------------------------------------------------------------------------------------------------------	
	$(function() {
		$( ".datepicker" ).datepicker({
			changeMonth: true, // enables capability for user to select month from dropdown
			changeYear: true, // enables capiability for user to select year from dropdown
			yearRange: '1900:2050', // restricts the years that a user may select from the dropdown
			dateFormat: 'mm/dd/yy', // formats the date selected
			defaultDate: null // sets the default date to null (no date)
		}).on('change', function(){ // when an element with the datepicker class is changed...
			$(this).valid(); // trigger the validation test that is configured using the jQuery validate plugin
		});
	}); // end jQuery UI Date Picker Config Function
	
	
	//---------------------------------------------------------------------------------------------------------------------
	// Function:	Tooltipster Plugin Config
	//---------------------------------------------------------------------------------------------------------------------
	// Description: The following 6 functions initializes the Tooltipster Plugin for all of the jobappforms (1-6).
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	The purpose of the tooltipster plugin is to work alongside the jQuery Validation plugin. Instead of 
	//				writing jQuery Validate error messages beside or beneath a given field, the error messages display in a
	//				configurable tooltip beneath the field.
	//---------------------------------------------------------------------------------------------------------------------	
	// 1. Initialize tooltipsters for jobappform1 - Part 1. General Information
	$('#jobappform1 input[type="text"], #jobappform1 input[type="radio"], #jobappform1 textarea').tooltipster({
		trigger: 'custom',
		onlyOne: false,
		position: 'bottom'
	});
	// 2. Initialize tooltipsters for jobappform2 - Part 2. Background Information
	$('#jobappform2 input[type="text"], #jobappform2 input[type="radio"], #jobappform2 textarea').tooltipster({
		trigger: 'custom',
		onlyOne: false,
		position: 'bottom'
	});
	// 3. Initialize tooltipsters for jobappform3 - Part 3. Education and Training
	$('#jobappform3 input[type="text"], #jobappform3 input[type="radio"], #jobappform3 textarea').tooltipster({
		trigger: 'custom',
		onlyOne: false,
		position: 'bottom'
	});
	// 4. Initialize tooltipsters for jobappform4 - Part 4. Employment History
	$('#jobappform4 input[type="text"], #jobappform4 input[type="radio"], #jobappform4 textarea').tooltipster({
		trigger: 'custom',
		onlyOne: false,
		position: 'bottom'
	});
	// 5. Initialize tooltipsters for jobappform5 - Part 5. Affirmative Action
	$('#jobappform5 input[type="text"], #jobappform5 input[type="radio"], #jobappform5 textarea').tooltipster({
		trigger: 'custom',
		onlyOne: false,
		position: 'bottom'
	});
	// 6. Initialize tooltipsters for jobappform6 - Part 6. Veteran's Information
	$('#jobappform6 input[type="text"], #jobappform6 input[type="radio"], #jobappform6 textarea').tooltipster({
		trigger: 'custom',
		onlyOne: false,
		position: 'bottom'
	});
	// end Tooltipster Plugin Config Functions 1-6
	//---------------------------------------------------------------------------------------------------------------------	

	
	//---------------------------------------------------------------------------------------------------------------------
	// Function:	jQuery Validation Plugin - Custom Methods Config
	//---------------------------------------------------------------------------------------------------------------------
	// Description: The following 2 functions add custom validation methods to the jQuery Validation plugin.
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	While jQuery Validate has many useful validation methods, they do not provide some specific methods
	//				necessary to ensure that the jobappform is valid. The following methods will ensure that licenses are
	//				not expired and that letters are entered into a field where only letters are appropriate.
	//---------------------------------------------------------------------------------------------------------------------	
	// 1. Add custom validation method to make sure only letters are entered into a field 
	jQuery.validator.addMethod("lettersonly",function(value,element) {
		return this.optional(element) || /^[a-zA-Z]+$/i.test(value);}, "Please enter letters only.");
		
	// 2. Add custom validation method to ensure expiration dates are not expired for licenses
	jQuery.validator.addMethod("expiration",function(value,element) {
	var expDate= new Date(value);
	var currentDate = new Date();
	
	if(expDate <= currentDate){
		return false;
	}
	
	return true;
	
	;}, "The license is expired.");
	// end jQuery Validation Plugin - Custom Methods Config Functions 1-2
	//---------------------------------------------------------------------------------------------------------------------	
	
	
	//---------------------------------------------------------------------------------------------------------------------
	// Function:	jQuery Validation Plugin Config
	//---------------------------------------------------------------------------------------------------------------------
	// Description: The following 6 functions add jQuery validation to the fields in all jobappforms. 
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	The jQuery validation plugin is fully configurable. Each field has been given a validation method that
	//				is appropriate to ensure that all data submitted in the ALC911 Job Application form is valid. Custom
	//				messages have been configured for each error. Error messages have been configured to display in tooltips
	//				and works alongside the Tooltipster plugin.
	//---------------------------------------------------------------------------------------------------------------------			
	// 1. Validate on on keyup and 'Next' or 'Back' for jobappform1 - Part 1. General Information
if(!testmode){ 
	$("#jobappform1").validate({ // call the validate function on document ready for jobappform1...
		// configuration of the validation rules for form fields
		rules: {
			position: {
				required: true
			} ,
			recruitnum: {
				number: true
			},
			firstname: {
				required: true,
				lettersonly: true
			},
			lastname: {
				required: true,
				lettersonly: true
			},
			DOB: {
				required: true,
				date: true
			},
			mailingaddr: {
				required: true
			},
			emailaddr: {
				email: true
			},
			homephone: {
				required: true
			},
			city: {
				required: true,
				lettersonly: true
			},
			county: {
				required: true,
				lettersonly: true
			},
			state: {
				required: true,
				lettersonly: true,
				minlength: 2
			},
			zipcd: {
				required: true,
				minlength: 5
			},
			stemployYN: {
				required: true
			},
			agencyname: {
				required: function(element){
							return $("#stemployY").is(':checked');
						  }
			},
			testassistYN: {
				required: true
			},
			willingtotravelYN: {
				required: true
			}
		},
		// configuration of custom error messages for fields that fail validation
		messages: {
			position: {
				required: "Please enter the job title."
			},
			recruitnum: {
				number: "Please enter only numeric values."
			},
			firstname: {
				required: "Please enter your first name."
			},
			lastname: {
				required: "Please enter your last name."
			},
			DOB: {
				required: "Please enter your date of birth.",
				date: "Please enter a valid date."
			},
			mailingaddr: {
				required: "Please enter your mailing address."
			},
			emailaddr: {
				email: "Please enter a valid email address."
			},
			homephone: {
				required: "Please enter your home telephone number."
			},
			city: {
				required: "Please enter your city."
			},
			county: {
				required: "Please enter your county."
			},
			state: {
				required: "Please enter your state.",
				minlength: "Please enter a valid 2 character state code."
			},
			zipcd: {
				required: "Please enter your zip code.",
				minlength: "Please enter a valid 5 digit zip code."
			},
			stemployYN: {
				required: "Please answer yes or no."
			},
			agencyname: {
				required: "Please enter the agency name."
			},
			testassistYN: {
				required: "Please answer yes or no."
			},
			willingtotravelYN: {
				required: "Please answer yes or no."
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
	}); // end jQuery Validation Config for jobappform1 - Part 1. General Information
	
	// 2. Validate on on keyup and 'Next' or 'Back' for jobappform2 - Part 2. Background Information
	$("#jobappform2").validate({ // call the validate function on document ready for jobappform2...
		// configuration of the validation rules for form fields
		rules: {
			DLNumber: {
				number: true,
				required: function(element){ // require if driver's license expiration is present
							return $("#DLExpDate").val()!="";
						  }
		    },
			DLExpDate: {
				date: true,
				expiration: true, // check to make sure license is not expired (custom jQuery function)
				required: function(element){ // require if driver's license # is present
							return $("#DLNumber").val()!="";
						  }
		    },
			CDLNumber: {
				number: true,
				required: function(element){ // require if CDL expiration is present
							return $("#CDLExpDate").val()!="";
						  }
		    },
			CDLExpDate: {
				date: true,
				expiration: true, // check to make sure license is not expired (custom jQuery function)
				required: function(element){ // require if CDL # is present
							return $("#CDLNumber").val()!="";
						  }
			},
			OtherLNumber: {
				number: true,
				required: function(element){ // require if other license expiration date is present
							return $("#OtherLExpDate").val()!="";
						  }
		    },
			OtherLExpDate: {
				date: true,
				expiration: true, // check to make sure license is not expired (custom jQuery function)
				required: function(element){ // require if other license # is present
							return $("#OtherLNumber").val()!="";
						  }
			},
			convictedYN: {
				required: true
			}
		},
		// configuration of custom error messages for fields that fail validation
		messages: {
			DLNumber: {
				number: "Please enter only numeric values.",
				required: "Please enter your driver's license number."
			},
			DLExpDate: {
				date: "Please enter a valid expiration date.",
				required: "Please enter the expiration date for your driver's license."
			},
			CDLNumber: {
				number: "Please enter only numeric values.",
				required: "Please enter your CDL number."
			},
			CDLExpDate: {
				date: "Please enter a valid expiration date.",
				required: "Please enter your CDL expiration date."
			},
			OtherLNumber: {
				number: "Please enter only numeric values.",
				required: "Please enter your license number."
			},
			OtherLExpDate: {
				date: "Please enter a valid expiration date.",
				required: "Please enter your license expiration date."
			},
			convictedYN: {
				required: "Please answer yes or no."
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
	}); // end jQuery Validation Config for jobappform2 - Part 2. Background Information
	
	// 3. Validate on on keyup and 'Next' or 'Back' for jobappform3 - Part 3. Education and Training
	$("#jobappform3").validate({
		// configuration of the validation rules for form fields
		rules: {
			highschoolGEDYN: {
				required: true
			}
		},
		// configuration of custom error messages for fields that fail validation
		messages: {
			highschoolGEDYN: {
				required: "Please answer yes or no."
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
	}); // end jQuery Validation Config for jobappform3 - Part 3. Education and Training
	
	// 4. Validate on on keyup and 'Next' or 'Back' for jobappform4 - Part 4. Employment History
	/* WARNING!!!!!
	   THIS IS DISABLED, BECAUSE THE JQUERY VALIDATION METHOD IS NOT WORKING FOR DYNAMICALLY CREATED ELEMENTS
	   WORKS FOR 1 EMPLOYER BUT BREAKS WHEN YOU ADD 2. FORM WILL NOT VALIDATE USING THE ARRAY FORM FIELDS.
	   WILL RESEARCH AT A LATER TIME. UNTIL THEN, THERE IS NO VALIDATION ON THE JOBAPPFORM4 FOR EMPLOYMENT
	   HISTORY (ASIDE FROM THE ISNUM() AND ISALPHA() FUNCTIONS THAT ARE TRIGGERED BY THE CLASS)
	$("#jobappform4").validate({
		rules: {
			'employer[]': {
				required: true
			},
			'empaddr[]': {
				required: true
			},
			'empphone[]': {
				required: true,
				phoneUS: true
			},
			'emptitle[]': {
				required: true
			},
			'empstartMY[]': {
				required: true
			}
		},
		messages: {
			'employer[]': {
				required: "Please enter your employer."
			},
			'empaddr[]': {
				required: "Please enter the employer address."
			},
			'empphone[]': {
				required: "Please enter the employer phone number.",
				phoneUS: "Please enter a valid phone number."
			},
			'emptitle[]': {
				required: "Please enter your job title."
			},
			'empstartMY[]': {
				required: "Please enter the month and year."
			}
		},			
		errorPlacement: function (error, element) {
			$(element).tooltipster('update', $(error).text());
			$(element).tooltipster('show');
		},
		success: function (label, element) {
			$(element).tooltipster('hide');
		}
	});  end end jQuery Validation Config for jobappform4 - Part 4. Employment History */

	// 5. Validate on on keyup and 'Next' or 'Back' for jobappform5 - Part 5. Affirmative Action
	$("#jobappform5").validate({
		// configuration of the validation rules for form fields
		rules: {
			otherracename: {
				required: function(element){ // require if "Yes" is checked for disabled veteran
							return $("#otherraceTF").is(':checked');
						  }
			},
			actdutyfromdate: {
				date: true,
				required: function(element){ // require if "Yes" is checked for active duty service
							return $("#activedutyY").is(':checked');
						  }
			},
			actdutytodate: {
				date: true
			},
			vietnamfromdate: {
				date: true,
				required: function(element){ // require if "Yes" is checked for service in Republic of Vietnam
							return $("#repubofvietnamY").is(':checked');
						  }
			},
			vietnamtodate: {
				date: true
			},
			pdisablednum: {
				number: true,
				required: function(element){ // require if "Yes" is checked for disabled veteran
							return $("#disabledvetTF").is(':checked');
						  }
			}
		},
		// configuration of custom error messages for fields that fail validation
		messages: {
			otherracename: {
				required: "Please enter other race(s)."
			},
			actdutyfromdate: {
				date: "Please enter a valid date.",
				required: "Please enter the date your active duty service began."
			},
			actdutytodate: {
				date: "Please enter a valid date."
			},
			vietnamfromdate: {
				date: "Please enter a valid date.",
				required: "Please enter the date your Vietnam service began."
			},
			vietnamtodate: {
				date: "Please enter a valid date."
			},
			pdisablednum: {
				number: "Please enter only numeric values.",
				required: "Please enter the % disability."
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
	}); // end jQuery Validation Config for jobappform5 - Part 5. Affirmative Action	

	// 6. Validate on on keyup and 'Next' or 'Back' for jobappform6 - Part 6. Veteran's Information
	$("#jobappform6").validate({
		// configuration of the validation rules for form fields
		rules: {
			honoractdutyfromdate: {
				date: true,
				required: function(element){ // require if "Yes" is clicked for active duty service
							return $("#honoractdutyY").is(':checked');
						  }
			},
			honoractdutytodate: {
				date: true
			},
			pspousedisablednum: {
				number: true,
				required: function(element){ // require if "Yes" is clicked for disabled spouse
							return $("#disabledspouseY").is(':checked');
						  }
			}
		},
		// configuration of custom error messages for fields that fail validation
		messages: {
			honoractdutyfromdate: {
				date: "Please enter a valid date.",
				required: "Please enter the date your active duty service began."
			},
			honoractdutytodate: {
				date: "Please enter a valid date."
			},
			pspousedisablednum: {
				number: "Please enter only numeric values.",
				required: "Please enter the % of your spouse's disability."
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
	}); // end jQuery Validation Config for jobappform6 - Part 6. Veteran's Information
}	
	// end jQuery Validation Plugin Config Functions
	//---------------------------------------------------------------------------------------------------------------------

	
	//---------------------------------------------------------------------------------------------------------------------
	// Function:	Ajax Form Submission Using jQuery
	//---------------------------------------------------------------------------------------------------------------------
	// Description: Submits all 6 forms
	//---------------------------------------------------------------------------------------------------------------------
	// Purpose: 	There are 6 seperate forms. When the final submit button is clicked, it "posts" all jobappforms to the
	//				action defined on jobappform1, which is "jobappform-processing.php." It also uses the jQuery serialize
	//				function to combine the data from all 6 forms prior to submission.
	//---------------------------------------------------------------------------------------------------------------------		
	$("#submitbutton").click(function() {
		
	  // Hide the div that makes up the current page
	  var page=document.getElementById('formpage_8');
	  page.style.visibility='hidden';
	  page.style.display='none';
		
	  // Hide the div that makes up the current page
	  var page=document.getElementById('directions');
	  page.style.visibility='hidden';
	  page.style.display='none';
	  
	  // Display the success div
	  page=document.getElementById('submitSuccess');
	  page.style.display='block';
	  page.style.visibility='visible';
	  
		$.ajax({
			type : 'POST',
			url  : 'jobappform-processing.php',
			data : $('#jobappform1, #jobappform2, #jobappform3, #jobappform4, #jobappform5, #jobappform6').serialize(),
			success: function(data){
				// Act upon the data returned, setting it to #submitSuccess <div>
				$("#submitSuccess").html ( data );
			}
		});
	}); // Ajax Form Submission Using jQuery
	
}); // end Document Ready Function


function getDate()
{
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm}
    today = yyyy+""+mm+""+dd;

    document.getElementById("applicationdate").value = today;
}

	
//Function that masks the input of various fields such as phone numbers & zipcodes-->
jQuery(function($){
   $("#homephone").mask("(999) 999-9999");
   $("#workphone").mask("(999) 999-9999? x99999");
   $("#zipcd").mask("99999?-9999")
});


// Function that controls the "page change" buttons from one page div to the next(or previous) div
function pagechange(frompage, topage) {
	
	
	switch(frompage)
	{
		case 2:
		{	
			if(!$("#jobappform1").valid())
			{
				alert("Please correct invalid fields.");
				return false;
			}
			break;
		}
		case 3:
		{
			if(!$("#jobappform2").valid())
			{
				alert("Please correct invalid fields.");
				return false;
			}
			break;
		}
		case 4:
		{
			if(!$("#jobappform3").valid())
			{
				alert("Please correct invalid fields.");
				return false;
			}
			break;
		}
		case 5:
		{
			if(!$("#jobappform4").valid())
			{
				alert("Please correct invalid fields.");
				return false;
			}
			break;
		}
		case 6:
		{
			if(!$("#jobappform5").valid())
			{
				alert("Please correct invalid fields.");
				return false;
			}
			break;
		}
		case 7:
		{
			if(!$("#jobappform6").valid())
			{
				alert("Please correct invalid fields.");
				return false;
			}
			break;
		}
		default:
		{
			break;
		}
	}
		
		
	  // Hide the div that makes up the current page
	  var page=document.getElementById('formpage_'+frompage);
	  if (!page) return false;
	  page.style.visibility='hidden';
	  page.style.display='none';
		
	  // Display the next div (page)
	  page=document.getElementById('formpage_'+topage);
	  if (!page) return false;
	  page.style.display='block';
	  page.style.visibility='visible';
		
		return true;
}


// Function that adds a row to the Education table up to 5 rows
function addRow(tableID) {

	var table = document.getElementById(tableID);

	var rowCount = table.rows.length;
	
	// define the maximum number of employers a user is allowed to add to the page-->
	const MAX_EDUCATION = 5;
	
	if(rowCount<=MAX_EDUCATION) {
	var row = table.insertRow(rowCount);
	
		// Add the School Name and Location textarea field-->
		var cell1 = row.insertCell(0);
		var element1 = document.createElement("textarea");
		cell1.className="table3";
		element1.id="schoonameandloc" + rowCount;
		element1.name="edu[" + rowCount + "][schoonameandloc]";
		element1.placeholder="Enter School " + rowCount + " Name and Location";
		element1.className="table3";
		element1.rows="2";
		element1.style.width="255px";
		cell1.appendChild(element1);

		// Add the Month/Year Started textarea field-->
		var cell2 = row.insertCell(1);
		var element2 = document.createElement("textarea");
		cell2.className="table3";
		element2.id="schoolstartMY" + rowCount;
		element2.name="edu[" + rowCount + "][schoolstartMY]";
		element2.placeholder="Ex. Jan 2001";
		element2.className="table3";
		element2.rows="2";
		element2.style.width="60px";
		cell2.appendChild(element2);

		// Add the Month/Year Ended textarea field-->
		var cell3 = row.insertCell(2);
		var element3 = document.createElement("textarea");
		cell3.className="table3";
		element3.id="schoolendMY" + rowCount;
		element3.name="edu[" + rowCount + "][schoolendMY]";
		element3.placeholder="Ex. Jan 2001";
		element3.className="table3";
		element3.rows="2";
		element3.style.width="60px";
		cell3.appendChild(element3);
		
		// Add the Credits textarea field-->
		var cell4 = row.insertCell(3);
		var element4 = document.createElement("textarea");
		cell4.className="table3";
		element4.id="credits" + rowCount;
		element4.name="edu[" + rowCount + "][credits]";
		element4.className="table3";
		element4.rows="2";
		element4.style.width="35px";
		element4.className="IsNum";
		cell4.appendChild(element4);
		document.getElementById("credits" + rowCount).maxLength = "5";

		// Add the Major textarea field-->
		var cell5 = row.insertCell(4);
		var element5 = document.createElement("textarea");
		cell5.className="table3";
		element5.id="major" + rowCount;
		element5.name="edu[" + rowCount + "][major]";
		element5.className="table3";
		element5.rows="2";
		element5.style.width="185px";
		cell5.appendChild(element5);
		
		// Add the Degree Type textarea field-->
		var cell6 = row.insertCell(5);
		var element6 = document.createElement("textarea");
		cell6.className="table3";
		element6.id="degreetype" + rowCount;
		element6.name="edu[" + rowCount + "][degreetype]";
		element6.className="table3";
		element6.rows="2";
		element6.style.width="65px";
		cell6.appendChild(element6);
		
		// Add the Degree Year textarea field-->
		var cell7 = row.insertCell(6);
		var element7 = document.createElement("textarea");
		cell7.className="table3";
		element7.id="degreeyear" + rowCount;
		element7.name="edu[" + rowCount + "][degreeyear]";
		element7.className="table3";
		element7.rows="2";
		element7.style.width="40px";
		element7.className="IsNum";
		cell7.appendChild(element7);
		document.getElementById("degreeyear" + rowCount).maxLength = "4";
		
		// determine how many education rows are displayed on the page
		var eduNum = $("#numEducation").val();
		
		// increment the number of education rows and store for later use-->
		var neweduNum = Number(eduNum)+ 1;
		var newVal = neweduNum.toString();
		
		// update the number of employers stored in the hidden input field
		$("#numEducation").val(newVal);	
		
		if(rowCount==MAX_EDUCATION) {
			document.getElementById("shownextrow").disabled = true;
		}
		
	}

}  // end AddRow function to add education rows to page


	// Add another employer to the employer history page up to MAX_EMPLOYERS (current defined as 10)
	function addEmployer() {
		
		// define the maximum number of employers a user is allowed to add to the page-->
		const MAX_EMPLOYERS = 10;
		
		// determine how many employers are displayed on the page
		var empNum = $("#numEmployers").val();
		
		// verify that number of employers does not exceed 16-->
		if(empNum < MAX_EMPLOYERS)
		{	
			// increment the number of employers and store for later use-->
			var newEmpNum = Number(empNum)+ 1;
			var newVal = newEmpNum.toString();
			
			// calculate the div ids of the previous employer and the new employer for reference-->
			var prevEmpID = "employer" + empNum;
			var newEmpID = "employer" + newEmpNum;
							
			// create a new div for the employer class and set the id element using calculated variable above-->
			var newEmpDiv = document.createElement("div");
			newEmpDiv.className = "employer";
			newEmpDiv.id = newEmpID;
											
			// append new employer div to previous employer div-->
			var currentEmpDiv = document.getElementById(prevEmpID);
			$(newEmpDiv).insertAfter(currentEmpDiv);

			// create a h3 element and append it to the previous employer div
			var newheader = document.createElement("h3");
			var headertext = document.createTextNode("Employer " + newVal);
			newheader.appendChild(headertext);	
			$(newheader).insertBefore(newEmpDiv);
			
			
			// add form fields, labels and other form content-->
			
			//-------------------------------------------------------------------------------->
			// 1. Create the Present or Last Employer label and input field-->
			
				// Create span to encompass form field label and input, set the Class attribute to formfieldpair-->
				var fieldspan = document.createElement("SPAN");
				fieldspan.className = "formfieldpair";
				
				// add the span to the new div-->
				newEmpDiv.appendChild(fieldspan);
				
				// create a label element-->
				var employerLabel = document.createElement("LABEL");
				employerLabel.htmlFor = "employer" + newVal;
				employerLabel.style.width="265px";
				employerLabel.style.marginLeft="2px";
				
				// create the text that will comprise the label-->
				var labeltext = newVal + ". Present or Last Employer";
				var label = document.createTextNode(labeltext);
				
				// append the label text to the label-->
				employerLabel.appendChild(label);
				
				// append the label to the span-->
				fieldspan.appendChild(employerLabel);
				
				// create an input field element and insert after the label-->
				var employerInput = document.createElement("input");
				employerInput.type="text";
				employerInput.id="employer" + newVal;
				employerInput.name="emp[" + newVal + "][empname]";
				employerInput.style.width="265px";
				employerInput.style.marginLeft="2px";
				employerInput.maxlength="100";
				$(employerInput).insertAfter(employerLabel);
			//-------------------------------------------------------------------------------->
			
			//-------------------------------------------------------------------------------->
			// 2. Create the Employer Address label and input field-->
			
				// Create span to encompass form field label and input, set the Class attribute to formfieldpair-->
				fieldspan = document.createElement("SPAN");
				fieldspan.className = "formfieldpair";
				
				// add the span to the new div-->
				newEmpDiv.appendChild(fieldspan);
				
				// create a label element-->
				var empaddrLabel = document.createElement("LABEL");
				empaddrLabel.htmlFor = "empaddr" + newVal;
				empaddrLabel.style.width="300px";
				empaddrLabel.style.marginLeft="6px";
				
				// create the text that will comprise the label-->
				label = document.createTextNode("Employer Address");
				
				// append the label text to the label-->
				empaddrLabel.appendChild(label);
				
				// append the label to the span-->
				fieldspan.appendChild(empaddrLabel);
				
				// create an input field element and insert after the label-->
				var empaddrInput = document.createElement("input");
				empaddrInput.type="text";
				empaddrInput.id="empaddr" + newVal;
				empaddrInput.name="emp[" + newVal + "][empaddr]";
				empaddrInput.style.width="300px";
				empaddrInput.style.marginLeft="6px";
				empaddrInput.maxlength="100";
				$(empaddrInput).insertAfter(empaddrLabel);
			//-------------------------------------------------------------------------------->

			//-------------------------------------------------------------------------------->
			// 3. Create the Employer Telephone label and input field-->
			
				// Create span to encompass form field label and input, set the Class attribute to formfieldpair-->
				fieldspan = document.createElement("SPAN");
				fieldspan.className = "formfieldpair";
				
				// add the span to the new div-->
				newEmpDiv.appendChild(fieldspan);
				
				// create a label element-->
				var empphoneLabel = document.createElement("LABEL");
				empphoneLabel.htmlFor = "empphone" + newVal;
				empphoneLabel.style.width="125px";
				empphoneLabel.style.marginLeft="6px";
				
				// create the text that will comprise the label-->
				label = document.createTextNode("Employer Telephone");
				
				// append the label text to the label-->
				empphoneLabel.appendChild(label);
				
				// append the label to the span-->
				fieldspan.appendChild(empphoneLabel);
				
				// create an input field element and insert after the label-->
				var empphoneInput = document.createElement("input");
				empphoneInput.type="text";
				empphoneInput.id="empphone" + newVal;
				empphoneInput.name="emp[" + newVal + "][empphone]";
				empphoneInput.style.width="125px";
				empphoneInput.style.marginLeft="6px";
				empphoneInput.maxlength="100";
				$(empphoneInput).insertAfter(empphoneLabel);
			// ------------------------------------------------------------------------------>				


			// ------------------------------------------------------------------------------>
			// 4. Create the Your Title label and input field-->
			
				// Create span to encompass form field label and input, set the Class attribute to formfieldpair-->
				fieldspan = document.createElement("SPAN");
				fieldspan.className = "formfieldpair";
				
				// add the span to the new div-->
				newEmpDiv.appendChild(fieldspan);
				
				// create a label element-->
				var emptitleLabel = document.createElement("LABEL");
				emptitleLabel.htmlFor = "emptitle" + newVal;
				emptitleLabel.style.width="265px";
				emptitleLabel.style.marginLeft="2px";
				
				// create the text that will comprise the label-->
				label = document.createTextNode("Your Title");
				
				// append the label text to the label-->
				emptitleLabel.appendChild(label);
				
				// append the label to the span-->
				fieldspan.appendChild(emptitleLabel);
				
				// create an input field element and insert after the label-->
				var emptitleInput = document.createElement("input");
				emptitleInput.type="text";
				emptitleInput.id="emptitle" + newVal;
				emptitleInput.name="emp[" + newVal + "][emptitle]";
				emptitleInput.style.width="265px";
				emptitleInput.style.marginLeft="2px";
				emptitleInput.maxlength="100";
				$(emptitleInput).insertAfter(emptitleLabel);
			// ------------------------------------------------------------------------------>					
				
				
			// ------------------------------------------------------------------------------>
			// 5. Create the Start Month/Year label and input field-->
			
				// Create span to encompass form field label and input, set the Class attribute to formfieldpair-->
				fieldspan = document.createElement("SPAN");
				fieldspan.className = "formfieldpair";
				
				// add the span to the new div-->
				newEmpDiv.appendChild(fieldspan);
				
				// create a label element-->
				var empstartMYLabel = document.createElement("LABEL");
				empstartMYLabel.htmlFor = "empstartMY" + newVal;
				empstartMYLabel.style.width="90px";
				empstartMYLabel.style.marginLeft="6px";
				
				// create the text that will comprise the label-->
				label = document.createTextNode("Start Month/Year");
				
				// append the label text to the label-->
				empstartMYLabel.appendChild(label);
				
				// append the label to the span-->
				fieldspan.appendChild(empstartMYLabel);
				
				// create an input field element and insert after the label-->
				var empstartMYInput = document.createElement("input");
				empstartMYInput.type="text";
				empstartMYInput.id="empstartMY" + newVal;
				empstartMYInput.name="emp[" + newVal + "][empstartMY]";
				empstartMYInput.style.width="90px";
				empstartMYInput.style.marginLeft="6px";
				empstartMYInput.maxlength="100";
				empstartMYInput.placeholder="Ex. Jan 2001";
				$(empstartMYInput).insertAfter(empstartMYLabel);
			// ------------------------------------------------------------------------------>						

			
			// ------------------------------------------------------------------------------>
			// 6. Create the End Month/Year label and input field-->
			
				// Create span to encompass form field label and input, set the Class attribute to formfieldpair-->
				fieldspan = document.createElement("SPAN");
				fieldspan.className = "formfieldpair";
				
				// add the span to the new div-->
				newEmpDiv.appendChild(fieldspan);
			
			// create a label element-->
			var empendMYLabel = document.createElement("LABEL");
			empendMYLabel.htmlFor = "empendMY" + newVal;
			empendMYLabel.style.width="90px";
			empendMYLabel.style.marginLeft="6px";
			
			// create the text that will comprise the label-->
			label = document.createTextNode("End Month/Year");
			
			// append the label text to the label-->
			empendMYLabel.appendChild(label);
			
			// append the label to the span-->
			fieldspan.appendChild(empendMYLabel);
			
			// create an input field element and insert after the label-->
			var empendMYInput = document.createElement("input");
			empendMYInput.type="text";
			empendMYInput.id="empendMY" + newVal;
			empendMYInput.name="emp[" + newVal + "][empendMY]";
			empendMYInput.style.width="90px";
			empendMYInput.style.marginLeft="6px";
			empendMYInput.maxlength="100";
			empendMYInput.placeholder="Ex. Jan 2001";
			$(empendMYInput).insertAfter(empendMYLabel);
		// ------------------------------------------------------------------------------>						

		
		// ------------------------------------------------------------------------------>
		// 7. Create the Total Months label and input field-->
		
			// Create span to encompass form field label and input, set the Class attribute to formfieldpair-->
			fieldspan = document.createElement("SPAN");
			fieldspan.className = "formfieldpair";
			
			// add the span to the new div-->
			newEmpDiv.appendChild(fieldspan);
			
			// create a label element-->
			var emptotalmthsLabel = document.createElement("LABEL");
			emptotalmthsLabel.htmlFor = "emptotalmths" + newVal;
			emptotalmthsLabel.style.width="40px";
			emptotalmthsLabel.style.marginLeft="6px";
			
			// create the text that will comprise the label-->
			label = document.createTextNode("Total Months");
			
			// append the label text to the label-->
			emptotalmthsLabel.appendChild(label);
			
			// append the label to the span-->
			fieldspan.appendChild(emptotalmthsLabel);
			
			// create an input field element and insert after the label-->
			var emptotalmthsInput = document.createElement("input");
			emptotalmthsInput.type="text";
			emptotalmthsInput.className="IsNum";
			emptotalmthsInput.id="emptotalmths" + newVal;
			emptotalmthsInput.name="emp[" + newVal + "][emptotalmths]";
			emptotalmthsInput.style.width="40px";
			emptotalmthsInput.style.marginLeft="6px";
			emptotalmthsInput.maxlength="100";
			$(emptotalmthsInput).insertAfter(emptotalmthsLabel);
		// ------------------------------------------------------------------------------>					


		// ------------------------------------------------------------------------------>
		// 8. Create the Average Hours label and input field-->
		
			// Create span to encompass form field label and input, set the Class attribute to formfieldpair-->
			fieldspan = document.createElement("SPAN");
			fieldspan.className = "formfieldpair";
			
			// add the span to the new div-->
			newEmpDiv.appendChild(fieldspan);
			
			// create a label element-->
			var empavghrsLabel = document.createElement("LABEL");
			empavghrsLabel.htmlFor = "empavghrs" + newVal;
			empavghrsLabel.style.width="40px";
			empavghrsLabel.style.marginLeft="6px";
			
			// create the text that will comprise the label-->
			label = document.createTextNode("Average Hours");
			
			// append the label text to the label-->
			empavghrsLabel.appendChild(label);
			
			// append the label to the span-->
			fieldspan.appendChild(empavghrsLabel);
			
			// create an input field element and insert after the label-->
			var empavghrsInput = document.createElement("input");
			empavghrsInput.type="text";
			empavghrsInput.className="IsNum";
			empavghrsInput.id="empavghrs" + newVal;
			empavghrsInput.name="emp[" + newVal + "][empavghrs]";
			empavghrsInput.style.width="40px";
			empavghrsInput.style.marginLeft="6px";
			empavghrsInput.maxlength="100";
			$(empavghrsInput).insertAfter(empavghrsLabel);
			
			// Create another span to encompass the "/week" text (indicating hours per week), set the Class attribute to explanatoryformtext-->
			fieldspan2 = document.createElement("SPAN");
			fieldspan2.className = "explanatoryformtext";
			fieldspan2.style.fontSize=".80em";
			
			// add the span to the new div-->
			fieldspan.appendChild(fieldspan2);					
			
			// add the /week text, indicating hours per week-->
			$(fieldspan2).append("<i>/week</i>");
		// ------------------------------------------------------------------------------>	


		// ------------------------------------------------------------------------------>
		// 9. Create the Last Salary label and input field-->
		
			// Create span to encompass form field label and input, set the Class attribute to formfieldpair-->
			fieldspan = document.createElement("SPAN");
			fieldspan.className = "formfieldpair";
			
			// add the span to the new div-->
			newEmpDiv.appendChild(fieldspan);
			
			// create a label element-->
			var emplastsalaryLabel = document.createElement("LABEL");
			emplastsalaryLabel.htmlFor = "emplastsalary" + newVal;
			emplastsalaryLabel.style.width="95px";
			emplastsalaryLabel.style.marginLeft="6px";
			
			// create the text that will comprise the label-->
			label = document.createTextNode("Last Salary");
			
			// append the label text to the label-->
			emplastsalaryLabel.appendChild(label);
			
			// append the label to the span-->
			fieldspan.appendChild(emplastsalaryLabel);
			
			// create an input field element and insert after the label-->
			var emplastsalaryInput = document.createElement("input");
			emplastsalaryInput.type="text";
			emplastsalaryInput.className="IsNum";
			emplastsalaryInput.id="emplastsalary" + newVal;
			emplastsalaryInput.name="emp[" + newVal + "][emplastsalary]";
			emplastsalaryInput.style.width="95px";
			emplastsalaryInput.style.marginLeft="6px";
			emplastsalaryInput.maxlength="100";
			$(emplastsalaryInput).insertAfter(emplastsalaryLabel);
		// ------------------------------------------------------------------------------>		


		// ------------------------------------------------------------------------------>
		// 10. Create the Supervisor Name label and input field-->
		
			// Create span to encompass form field label and input, set the Class attribute to formfieldpair-->
			fieldspan = document.createElement("SPAN");
			fieldspan.className = "formfieldpair";
			
			// add the span to the new div-->
			newEmpDiv.appendChild(fieldspan);
			
			// create a label element-->
			var empsupervisorLabel = document.createElement("LABEL");
			empsupervisorLabel.htmlFor = "empsupervisor" + newVal;
			empsupervisorLabel.style.width="185px";
			empsupervisorLabel.style.marginLeft="2px";
			
			// create the text that will comprise the label-->
			label = document.createTextNode("Supervisor Name");
			
			// append the label text to the label-->
			empsupervisorLabel.appendChild(label);
			
			// append the label to the span-->
			fieldspan.appendChild(empsupervisorLabel);
			
			// create an input field element and insert after the label-->
			var empsupervisorInput = document.createElement("input");
			empsupervisorInput.type="text";
			empsupervisorInput.className="IsAlpha";
			empsupervisorInput.id="empsupervisor" + newVal;
			empsupervisorInput.name="emp[" + newVal + "][empsupervisor]";
			empsupervisorInput.style.width="185px";
			empsupervisorInput.style.marginLeft="2px";
			empsupervisorInput.maxlength="100";
			$(empsupervisorInput).insertAfter(empsupervisorLabel);
		// ------------------------------------------------------------------------------>	
		
		
		// ------------------------------------------------------------------------------>
		// 11. Create the Reason for Leaving label and input field-->
		
			// Create span to encompass form field label and input, set the Class attribute to formfieldpair-->
			fieldspan = document.createElement("SPAN");
			fieldspan.className = "formfieldpair";
			
			// add the span to the new div-->
			newEmpDiv.appendChild(fieldspan);
			
			// create a label element-->
			var empreasonforleavingLabel = document.createElement("LABEL");
			empreasonforleavingLabel.htmlFor = "empreasonforleaving" + newVal;
			empreasonforleavingLabel.style.width="320px";
			empreasonforleavingLabel.style.marginLeft="6px";
			
			// create the text that will comprise the label-->
			label = document.createTextNode("Reason for Leaving");
			
			// append the label text to the label-->
			empreasonforleavingLabel.appendChild(label);
			
			// append the label to the span-->
			fieldspan.appendChild(empreasonforleavingLabel);
			
			// create an input field element and insert after the label-->
			var empreasonforleavingInput = document.createElement("input");
			empreasonforleavingInput.type="text";
			empreasonforleavingInput.id="empreasonforleaving" + newVal;
			empreasonforleavingInput.name="emp[" + newVal + "][empreasonforleaving]";
			empreasonforleavingInput.style.width="320px";
			empreasonforleavingInput.style.marginLeft="6px";
			empreasonforleavingInput.maxlength="100";
			$(empreasonforleavingInput).insertAfter(empreasonforleavingLabel);
		// ------------------------------------------------------------------------------>	
		
		
		// ------------------------------------------------------------------------------>
		// 12. Create the Volunteer Hours label and input field-->
		
			// Create span to encompass form field label and input, set the Class attribute to formfieldpair-->
			fieldspan = document.createElement("SPAN");
			fieldspan.className = "formfieldpair";
			
			// add the span to the new div-->
			newEmpDiv.appendChild(fieldspan);
			
			// create a label element-->
			var empvolunteerhrsLabel = document.createElement("LABEL");
			empvolunteerhrsLabel.htmlFor = "empvolunteerhrs" + newVal;
			empvolunteerhrsLabel.style.width="50px";
			empvolunteerhrsLabel.style.marginLeft="6px";
			
			// create the text that will comprise the label-->
			label = document.createTextNode("Volunteer Hours");
			
			// append the label text to the label-->
			empvolunteerhrsLabel.appendChild(label);
			
			// append the label to the span-->
			fieldspan.appendChild(empvolunteerhrsLabel);
			
			// create an input field element and insert after the label-->
			var empvolunteerhrsInput = document.createElement("input");
			empvolunteerhrsInput.type="text";
			empvolunteerhrsInput.className="IsNum";
			empvolunteerhrsInput.id="empvolunteerhrs" + newVal;
			empvolunteerhrsInput.name="emp[" + newVal + "][empvolunteerhrs]";
			empvolunteerhrsInput.style.width="50px";
			empvolunteerhrsInput.style.marginLeft="6px";
			empvolunteerhrsInput.maxlength="100";
			$(empvolunteerhrsInput).insertAfter(empvolunteerhrsLabel);
		// ------------------------------------------------------------------------------>	


		// ------------------------------------------------------------------------------>
		// 13. Create the Number of Employees Supervised label and input field-->
		
			// Create span to encompass form field label and input, set the Class attribute to formfieldpair-->
			fieldspan = document.createElement("SPAN");
			fieldspan.className = "formfieldpair";
			
			// add the span to the new div-->
			newEmpDiv.appendChild(fieldspan);
			
			// create a label element-->
			var empsupervisedLabel = document.createElement("LABEL");
			empsupervisedLabel.htmlFor = "empsupervised" + newVal;
			empsupervisedLabel.style.width="125px";
			empsupervisedLabel.style.marginLeft="6px";
			
			// create the text that will comprise the label-->
			label = document.createTextNode("# of Employees Supervised");
			
			// append the label text to the label-->
			empsupervisedLabel.appendChild(label);
			
			// append the label to the span-->
			fieldspan.appendChild(empsupervisedLabel);
			
			// create an input field element and insert after the label-->
			var empsupervisedInput = document.createElement("input");
			empsupervisedInput.type="text";
			empsupervisedInput.className="IsNum";
			empsupervisedInput.id="empsupervised" + newVal;
			empsupervisedInput.name="emp[" + newVal + "][empsupervised]";
			empsupervisedInput.style.width="125px";
			empsupervisedInput.style.marginLeft="6px";
			empsupervisedInput.maxlength="100";
			$(empsupervisedInput).insertAfter(empsupervisedLabel);
		// ------------------------------------------------------------------------------>	
		
		
		// ------------------------------------------------------------------------------>
		// 14. Create the Specific Duties label and input field-->
		
			// Create span to encompass form field label and input, set the Class attribute to formfieldpair-->
			fieldspan = document.createElement("SPAN");
			fieldspan.className = "formfieldpair";
			
			// add the span to the new div-->
			newEmpDiv.appendChild(fieldspan);
			
			// create a label element-->
			var empdutiesLabel = document.createElement("LABEL");
			empdutiesLabel.htmlFor = "empduties" + newVal;
			empdutiesLabel.style.width="720px";
			empdutiesLabel.style.marginLeft="2px";
			
			// create the text that will comprise the label-->
			label = document.createTextNode("Specific Duties");
			
			// append the label text to the label-->
			empdutiesLabel.appendChild(label);
			
			// append the label to the span-->
			fieldspan.appendChild(empdutiesLabel);
			
			// create an input field element and insert after the label-->
			var empdutiesInput = document.createElement("textarea");
			empdutiesInput.id="empduties" + newVal;
			empdutiesInput.name="emp[" + newVal + "][empduties]";
			empdutiesInput.rows="4";
			empdutiesInput.style.width="720px";
			empdutiesInput.style.marginLeft="2px";
			empdutiesInput.maxlength="100";
			empdutiesInput.placeholder="Please elaborate on your responsibilities in this position...";
			$(empdutiesInput).insertAfter(empdutiesLabel);
		// ------------------------------------------------------------------------------>	
		
		// update the number of employers stored in the hidden input field
		$("#numEmployers").val(newVal);		
		
		// update the accordion collapsible employer panes and activate the new accordion
		$("#employmenthistory").accordion( "refresh" );
		$("#employmenthistory").accordion( "option", "active", newEmpNum-1 );
		
		if(newEmpNum==MAX_EMPLOYERS) {
			// disable the Add Another Employer button-->
			document.getElementById("addemployer").disabled = true;
		}
	}					
	}
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
	$('#jobappform1')[0].reset();
	$('#jobappform2')[0].reset();
	$('#jobappform3')[0].reset();
	$('#jobappform4')[0].reset();
	$('#jobappform5')[0].reset();
	$('#jobappform6')[0].reset();
	
	// reset number of employers stored in the hidden input field to 1
	$("#numEmployers").val("1");

};

EnableSubmit = function(val)
{
	var sbmt = document.getElementById("submitbutton");

	if (val.checked == true)
	{
		sbmt.disabled = false;
	}
	else
	{
		sbmt.disabled = true;
	}
}
