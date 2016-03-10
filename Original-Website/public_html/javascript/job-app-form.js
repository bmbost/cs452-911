			jQuery(document).ready(function($) {
			$('#activedutyY').click(
			function(){
				if ( $(this).is(':checked') ){
					$('#veteraninfo').show();
					$('#vetinstructions').show();
				}
				else{
					$('#veteraninfo').hide();
				}
			}
			);
			$('#activedutyN').click(
			function(){
				if ( $(this).is(':checked') ){
					$('#veteraninfo').hide();
					
					$('#actdutyfromdate').val("");
					$('#actdutytodate').val("");
					
					$("#vietnamfromdate").val("");
					$("#vietnamtodate").val("");
					$("#vietnamdates").hide();
					
					$("#repubofvietnamN").prop("checked", true);
					$("#repubofvietnam").hide();
					
					$("#vietnamvetTF").prop("checked", false);
					
					$("#pdisablednum").val("");
					$("#disabledvetTF").prop("checked", false);
					$("#pdisabled").hide();
					
					$('#vetinstructions').hide();
								
				}
				else{
					$('#veteraninfo').show();
				}
			}
			);
			$("#otherraceTF").change(function(){
				$("#otherracename").toggle();
			});	
			$("#vietnamvetTF").change(function(){
				$("#repubofvietnam").toggle();

				if($("#repubofvietnamY").is(':checked')){
					$("#vietnamfromdate").val("");
					$("#vietnamtodate").val("");
					$("#vietnamdates").hide();
						
					$("#repubofvietnamN").prop("checked", true);
				}
			});			
			$("#repubofvietnamY").change(function(){
				$("#vietnamdates").toggle();
			});	
			$("#repubofvietnamN").change(function(){
				$("#vietnamdates").toggle();
			});	
			$("#disabledvetTF").change(function(){
				$("#pdisabled").toggle();
				
				if($('#disabledvetTF').prop('checked')==false){
					$("#pdisablednum").val("");
				}
			});	
		  $(function() {
			$( "#employmenthistory" ).accordion({
			heightStyle: "content"
			});
		  });
			$(function() {

				$( ".datepicker" ).datepicker();
			});
			$('#honoractdutyY').click(
			function(){
				if ( $(this).is(':checked') ){
					$('#veteranaddlinfo').show();							
				}
				else{
					$('#veteranaddlinfo').hide();
				}
			}
			);
			$('#honoractdutyN').click(
			function(){
				if ( $(this).is(':checked') ){
					$('#veteranaddlinfo').hide();							
				}
				else{
					$('#veteranaddlinfo').show();
				}
			}
			);
			$('#disabledspouseY').click(
			function(){
				if ( $(this).is(':checked') ){
					$('#disabledspouseinfo').show();							
				}
				else{
					$('#disabledspouseinfo').hide();
				}
			}
			);
			$('#disabledspouseN').click(
			function(){
				if ( $(this).is(':checked') ){
					$('#disabledspouseinfo').hide();							
				}
				else{
					$('#disabledspouseinfo').show();
				}
			}
			);
			$('#survivingspouseY').click(
			function(){
				if ( $(this).is(':checked') ){
					$('#deceasedspouseinfo').show();							
				}
				else{
					$('#deceasedspouseinfo').hide();
				}
			}
			);
			$('#survivingspouseN').click(
			function(){
				if ( $(this).is(':checked') ){
					$('#deceasedspouseinfo').hide();							
				}
				else{
					$('#deceasedspouseinfo').show();
				}
			}
			);
			// initialize tooltipster for jobappform1
			$('#jobappform1 input[type="text"], #jobappform1 input[type="radio"], #jobappform1 textarea').tooltipster({
				trigger: 'custom',
				onlyOne: false,
				position: 'bottom'
			});
			// initialize tooltipster for jobappform2
			$('#jobappform2 input[type="text"], #jobappform2 input[type="radio"], #jobappform2 textarea').tooltipster({
				trigger: 'custom',
				onlyOne: false,
				position: 'bottom'
			});
			// add custom validation method to make sure only letters are entered into a field 
			jQuery.validator.addMethod("lettersonly",function(value,element) {
			return this.optional(element) || /^[a-zA-Z]+$/i.test(value);}, "Please enter letters only.");
			// validate jobappform1 on keyup and 'Next' or 'Back'
			$("#jobappform1").validate({
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
						required:"input[name='stemployYN'][value='yes']:checked"
					},
					testassistYN: {
						required: true
					},
					willingtotravelYN: {
						required: true
					}
				},
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
				errorPlacement: function (error, element) {
					$(element).tooltipster('update', $(error).text());
					$(element).tooltipster('show');
				},
				success: function (label, element) {
					$(element).tooltipster('hide');
				}
			});
			// validate jobappform2 on keyup and 'Next' or 'Back'
			$("#jobappform2").validate({
				rules: {
					DLNumber: {
						required: true
					},
					DLExpDate: {
						required: true,
						date: true
					},
					CDLExpDate: {
						date: true
					},
					OtherLExpDate: {
						date: true
					},
					convictedYN: {
						required: true
					}
				},
				messages: {
					DLNumber: {
						required: "Please enter your driver's license number."
					},
					DLExpDate: {
						required: "Please enter your license expiration date.",
						date: "Please enter a valid expiration date."
					},
					CDLExpDate: {
						date: "Please enter a valid expiration date."
					},
					OtherLExpDate: {
						date: "Please enter a valid expiration date."
					},
					convictedYN: {
						required: "Please answer yes or no."
					}
				},			
				errorPlacement: function (error, element) {
					$(element).tooltipster('update', $(error).text());
					$(element).tooltipster('show');
				},
				success: function (label, element) {
					$(element).tooltipster('hide');
				}
			});
		});
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
		//Function that masks the input of various fields such as phone numbers, SSN#, & zipcodes-->
		jQuery(function($){
		   $("#homephone").mask("(999) 999-9999");
		   $("#workphone").mask("(999) 999-9999? x99999");
		   $("#ssn").mask("999-99-9999");
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
					
					break;
				}
				case 5:
				{
					
					break;
				}
				case 6:
				{
					
					break;
				}
				case 7:
				{
					
					break;
				}
				case 8:
				{
					
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
			
			if(rowCount<=5) {
			var row = table.insertRow(rowCount);
			
				// Add the School Name and Location textarea field-->
				var cell1 = row.insertCell(0);
				var element1 = document.createElement("textarea");
				cell1.className="table3";
				element1.name="schoonameandloc" + rowCount;
				element1.placeholder="Enter School " + rowCount + " Name and Location";
				element1.className="table3";
				element1.rows="2";
				element1.style.width="255px"
				cell1.appendChild(element1);

				// Add the Month/Year Started textarea field-->
				var cell2 = row.insertCell(1);
				var element2 = document.createElement("textarea");
				cell2.className="table3";
				element2.name="schoolstartMY" + rowCount;
				element2.placeholder="Ex. Jan 2001";
				element2.className="table3";
				element2.rows="2";
				element2.style.width="60px"
				cell2.appendChild(element2);

				// Add the Month/Year Ended textarea field-->
				var cell3 = row.insertCell(2);
				var element3 = document.createElement("textarea");
				cell3.className="table3";
				element3.name="schoolendMY" + rowCount;
				element3.placeholder="Ex. Jan 2001";
				element3.className="table3";
				element3.rows="2";
				element3.style.width="60px"
				cell3.appendChild(element3);
				
				// Add the Credits textarea field-->
				var cell4 = row.insertCell(3);
				var element4 = document.createElement("textarea");
				cell4.className="table3";
				element4.name="credits" + rowCount;
				element4.className="table3";
				element4.rows="2";
				element4.style.width="35px"
				cell4.appendChild(element4);

				// Add the Major textarea field-->
				var cell5 = row.insertCell(4);
				var element5 = document.createElement("textarea");
				cell5.className="table3";
				element5.name="major" + rowCount;
				element5.className="table3";
				element5.rows="2";
				element5.style.width="185px"
				cell5.appendChild(element5);
				
				// Add the Degree Type textarea field-->
				var cell6 = row.insertCell(5);
				var element6 = document.createElement("textarea");
				cell6.className="table3";
				element6.name="degreetype" + rowCount;
				element6.className="table3";
				element6.rows="2";
				element6.style.width="65px"
				cell6.appendChild(element6);
				
				// Add the Degree Year textarea field-->
				var cell7 = row.insertCell(6);
				var element7 = document.createElement("textarea");
				cell7.className="table3";
				element7.name="degreeyear" + rowCount;
				element7.className="table3";
				element7.rows="2";
				element7.style.width="40px"
				cell7.appendChild(element7);
				
				if(rowCount==5) {
					document.getElementById("shownextrow").disabled = true;
				}
			}

		}
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
					employerInput.name="employer" + newVal;
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
					empaddrInput.name="empaddr" + newVal;
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
					empphoneInput.name="empaddr" + newVal;
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
					emptitleInput.name="emptitle" + newVal;
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
					empstartMYInput.name="empstartMY" + newVal;
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
					empendMYInput.name="empendMY" + newVal;
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
					emptotalmthsInput.name="emptotalmths" + newVal;
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
					empavghrsInput.name="empavghrs" + newVal;
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
					emplastsalaryInput.name="emplastsalary" + newVal;
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
					empsupervisorInput.name="empsupervisor" + newVal;
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
					empreasonforleavingInput.name="empreasonforleaving" + newVal;
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
					empvolunteerhrsInput.name="empvolunteerhrs" + newVal;
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
					empsupervisedInput.name="empsupervised" + newVal;
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
					empdutiesInput.name="empduties" + newVal;
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
		// before the page reloads or refreshes...
		window.onbeforeunload = function(event)
		{
			// reset number of employers stored in the hidden input field to 1
			$("#numEmployers").val("1");	
		};
