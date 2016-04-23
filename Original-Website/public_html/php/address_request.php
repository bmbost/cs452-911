<?php
	// initialize variables if first use
  $residencyCheck = '';
	if (!isset($firstName)) { $firstName = ''; }
	if (!isset($lastName)) { $lastName = ''; }
  if (!isset($reqArea1)) { $reqArea1 = ''; }
  if (!isset($reqFirstThree1)) { $reqFirstThree1 = ''; }
  if (!isset($reqLastFour1)) { $reqLastFour1 = ''; }
  if (!isset($reqArea2)) { $reqArea2 = ''; }
  if (!isset($reqFirstThree2)) { $reqFirstThree2 = ''; }
  if (!isset($reqLastFour2)) { $reqLastFour2 = ''; }
	if ((isset($residency)) && ($residency == 'Y')) { $residencyCheck = 'checked'; }
	if (!isset($resFirstName)) { $resFirstName = ''; }
	if (!isset($resLastName)) { $resLastName = ''; }
  if (!isset($resArea1)) { $resArea1 = ''; }
  if (!isset($resFirstThree1)) { $resFirstThree1 = ''; }
  if (!isset($resLastFour1)) { $resLastFour1 = ''; }
  if (!isset($resArea2)) { $resArea2 = ''; }
  if (!isset($resFirstThree2)) { $resFirstThree2 = ''; }
  if (!isset($resLastFour2)) { $resLastFour2 = ''; }

	// set drop down box to selected option if it was filled out
	$house = '';
	$manufhome = '';
	$otherHome = '';
	if (!isset($structure)) { $structure = ''; }
	else if ($structure == 'house') { $house = 'selected'; }
	else if ($structure == 'manufhome') { $manufhome = 'selected'; }
	else if ($structure == 'other') { $otherHome = 'selected'; }

	// Continue initializing variables
	if (!isset($details)) { $details = ''; }
	if (!isset($northadd)) { $northadd = ''; }
	if (!isset($southadd)) { $southadd = ''; }
	if (!isset($eastadd)) { $eastadd = ''; }
	if (!isset($westadd)) { $westadd = ''; }
	if (!isset($markers)) { $markers = ''; }
	if (!isset($others)) { $others = ''; }
	if (!isset($expMonth)) { $expMonth = ''; }
	if (!isset($expDay)) { $expDay = ''; }
	if (!isset($expYear)) { $expYear = ''; }
	if (!isset($roadstreet)) { $roadstreet = ''; }
?>


<!DOCTYPE html>
<html>

	<head>

		<title>Address Request Form</title>

		<link href="css/forms-style.css" type="text/css" rel="stylesheet"/>
     	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="dist/jquery.validate.js"></script>


	</head>


	<body>

		<div class="wrapsheetborder">

		<!-- banner residing at top of form with ALC911 logo-->
		<a target="_blank" href="http://www.alc911.org">
				<div class="banner"><img class="top" src="media/banner2.png" alt="Athens-Limestone County 911" /></div>
		</a>

		<!-- Below is the Address Request Form -->

		<form id="addreqform" class="elegant-aero" action="addressform.php" method="post">


		<h1>Address Request Form</h1>

				<hr />

				<p style="text-align:center"><i>Use this form to request an address...</i></p>

				<!-- Line Break in page-->

				<hr />

        <?php
          if (!empty($message)) {
            echo $message;
          }
        ?>

		<h2>Request and Contact Information</h2> </br>

		<div class="formenclosure">
			<span class="appinstructionsheaders">Requestor Details</span><br /><br />

			<span class="explanatoryformtext"><em><span style="color:red;">*</span> Indicates required field</em></span>
			<br />
			<br />

			<table class="table2">

				<tr>
						<!--Form Field 2: Requestor - person submitting address request (either resident or someone submitting on behalf of resident)
						Field Validation: *Required, Should be text and spaces only - no numbers or other special characters -->

						<td  width ="15%">
							<label>Requestor First Name: <span style="color:red;" >*</span><br />

								<input type="text" name="requestor_firstName" size="20" maxlength="60" required value="<?php echo htmlspecialchars($firstName); ?>"/>

							</label><br />
						</td>

						<!--Form Field 3: Requestor - person submitting address request (either resident or someone submitting on behalf of resident)
						Field Validation: *Required, Should be text and spaces only - no numbers or other special characters -->

						<td width ="15%">
							<label>Requestor Last Name: <span style="color:red;">*</span><br />

								<input type="text" name="requestor_lastName" size="20" maxlength="60" required value="<?php echo htmlspecialchars($lastName); ?>" />

							</label><br />
						</td>

						<!--Form Field 4: Req Phone 1 - primary contact number for requestor
						Field Validation: *Required, Must contain 10 numerals only (must include area code), set up validation to ensure 10 numerals present with
						no text or special characters. Display in format (###) ###-##### -->

						<td width ="15%">
							<label>Requestor Phone 1: <span style="color:red;">*</span><br />
								(
								<input type="text" name="reqArea1" size = "3" maxlength="3" required value="<?php echo htmlspecialchars($reqArea1); ?>" /> )
								<input type="text" name="reqFirstThree1" size="3" maxlength="3" required value="<?php echo htmlspecialchars($reqFirstThree1); ?>" /> -
								<input type="text" name="reqLastFour1" size="4" maxlength="4" value="<?php echo htmlspecialchars($reqLastFour1); ?>" />

							</label><br />
						</td>

						<!--Form field 5: Req Phone 2 - secondary contact number for requestor
						Field Validation: must contain 10 numerals only (must include area code), set up validation to ensure 10 numerals present with
						no text or special characters. Display in format (###) ###-#### -->
						<td  width ="15%">
							<label>Requestor Phone 2: <span style="color:red;">*</span><br />

								<!--input type="text" name="reqphon2" size = "20" maxlength="14" required/ -->

															(
								<input type="text" name="reqArea2" size = "3" maxlength="3" value="<?php echo htmlspecialchars($reqArea2); ?>" /> )
								<input type="text" name="reqFirstThree2" size="3" maxlength="3" value="<?php echo htmlspecialchars($reqFirstThree2); ?>" /> -
								<input type="text" name="reqLastFour2" size="4" maxlength="4" value="<?php echo htmlspecialchars($reqLastFour2); ?>" />

							</label><br />
						</td>
				</tr>
			</table>

				<!--*NOTE**********************************************************-->

				<!-- Could possibly add another check box field here that asks if the

					 requestor is the same as the resident. This would automatically

					 fill the resident name and contact information using the info

					 entered into Requestor section. Would eliminate duplication of

					 efforts for a resident who submits the form.-->

				<!--***************************************************************-->



				<!--Checkbox field test (see above)-->
				<br / >

					<p>Check the box if the requestor is also the resident for the new address:

						<input type="checkbox" name="reqisresYN" value="Y" <?php echo htmlspecialchars($residencyCheck); ?>/>

					</p>

				<br />




			<span class="appinstructionsheaders">Resident Details</span><br /><br />

			<table class="table2">
				<tr>
						<!--Form Field 6: Resident - person that will be residing in new address

						Field Validation: *Required, Should be text and spaces only - no numbers or other special characters -->

					<td width ="15%">
						<label>Resident First Name: <span style="color:red;">*</span><br />

							<input type="text" name="resident_firstName" size="20" maxlength="60" required value="<?php echo htmlspecialchars($resFirstName); ?>"/>

						</label><br />
					</td>

						<!--Form Field 7: Resident - person that will be residing in new address

						Field Validation: *Required, Should be text and spaces only - no numbers or other special characters -->

					<td width ="15%">
						<label>Resident Last Name: <span style="color:red;">*</span><br />

							<input type="text" name="resident_lastName" size="20" maxlength="60" required value="<?php echo htmlspecialchars($resLastName); ?>"/>

						</label><br />
					</td>


						<!--Form Field 8: Res Phone 1 - primary contact number for resident

						Field Validation: *Required, Must contain 10 numerals only (must include area code), set up validation to ensure 10
						numerals present with

						no text or special characters. Display in format (###) ###-##### -->

					<td width ="15%">
						<label >Resident Phone 1: <span style="color:red;">*</span><br />

							(
							<input type="text" name="resArea1" size = "3" maxlength="3" required value="<?php echo htmlspecialchars($resArea1); ?>" /> )
							<input type="text" name="resFirstThree1" size="3" maxlength="3" required value="<?php echo htmlspecialchars($resFirstThree1); ?>" /> -
							<input type="text" name="resLastFour1" size="4" maxlength="4" required value="<?php echo htmlspecialchars($resLastFour1); ?>" />

						</label><br />
					</td>


						<!--Form field 9: Res Phone 2 - secondary contact number for resident

						Field Validation: Must contain 10 numerals only (must include area code), set up validation to ensure 10 numerals present with

						no text or special characters. Display in format (###) ###-#### -->

					<td width ="15%">
						<label>Resident Phone 2: <span style="color:red;">*</span><br />

							(
							<input type="text" name="resArea2" size = "3" maxlength="3" value="<?php echo htmlspecialchars($resArea2); ?>" /> )
							<input type="text" name="resFirstThree2" size="3" maxlength="3" value="<?php echo htmlspecialchars($resFirstThree2); ?>" /> -
							<input type="text" name="resLastFour2" size="4" maxlength="4" value="<?php echo htmlspecialchars($resLastFour2); ?>" />

						</label><br />
					</td>

				</tr>


			</table>

				<!-- Line Break in page-->
				<br />
				<hr />
				<br />


			<span class="appinstructionsheaders">Structure Details</span><br /><br />


			<table class="table2">
				<tr>
						<!--Form Field 10: Structure Type - drop down for user to select the type of structure

						Field Validation: *Required -->
						<td width="80%">What type of structure will be associated with the new address? Please select from the following options. </td>
				</tr>
				<tr>
						<td>
							<select name="structype">

								<option value="house" <?php echo $house; ?> >House</option>

								<option value="manufhome" <?php echo $manufhome; ?> >Manufactured Home</option>

								<option value="other" <?php echo $otherHome; ?> >Other Structure Type</option>

							</select>
						</td>
				</tr>
						<!--Form Field 11: Structure Details - user should enter any other details about the structure, such as color or structure type

						if user selected Other Structure Type for Structure Type

						Field Validation: *Required -->
				<tr>
					<td>
						<p>Please explain what type of structure. Include any other details such as color or how the property is marked.</p>

						<textarea name="strucdetails" cols="30" rows="7" value="<?php echo htmlspecialchars($details); ?>" > </textarea> <br /> <br />
					</td>

				</tr>
			</table>

			<br />
			<br />


			<span class="appinstructionsheaders">Address Details</span><br /><br />

			<table class="table2">

				<tr>
					<!-- Form 12: Direction - User will enter will fill out which direction the address is located in

					Field Validation: *Required -->

					<td width ="15%">

						<label>North of Address # <span style="color:red;">*</span><br />

							<input type="text" name="northadd" size="20" maxlength="15" required value="<?php echo htmlspecialchars($northadd); ?>" />

						</label>
					</td>

					<td width ="15%">

						<label>South of Address # <span style="color:red;">*</span><br />

							<input type="text" name="southadd" size="20" maxlength="15" required value="<?php echo htmlspecialchars($southadd); ?>" />

						</label>
					</td>

					<td width ="15%">

						<label>East of Address # <span style="color:red;">*</span><br />

							<input type="text" name="eastadd" size="20" maxlength="15" required value="<?php echo htmlspecialchars($eastadd); ?>" />

						</label>
					</td>

					<td width ="15%">

						<label>West of Address # <span style="color:red;">*</span><br />

							<input type="text" name="westadd" size="20" maxlength="15" required value="<?php echo htmlspecialchars($westadd); ?>" />

						</label>
					</td>
				</tr>
			</table>

			<br /><br />
			<span class="appinstructionsheaders">Other Information</span><br /><br />

			<table class="table2">
				<tr>
					<td>

					<!-- Form 13: Markers - User will input what type of markers there are

					Field Validation: *Required -->

						<p>Markers:</p>

						<textarea name="markers" cols="30" rows="5" value="<?php echo htmlspecialchars($markers); ?>" > </textarea> <br />


						<p>Other:</p>

						<textarea name="others" cols="30" rows="5" value="<?php echo htmlspecialchars($others); ?>" > </textarea> <br />

						<!-- Line Break in page-->


						<!-- Form 14: Eperation Date - User will enter experiation date

						Field Validation: * Required -->

						<label>Expected Date:<br />


							<input type="text" name="expMonth" maxlength="2" size="2" value="<?php echo htmlspecialchars($expMonth); ?>" /> /
							<input type="text" name="expDay" maxlength="2" size="2" value="<?php echo htmlspecialchars($expDay); ?>" /> /
							<input type="text" name="expYear" maxlength="4" size="4" value="<?php echo htmlspecialchars($expYear); ?>" />

						</label><br />


						<hr />

						<!-- Form 15: Road Street - User will enter street name

						Field Validation: * Required -->

						<label>Road-Street: <span style="color:red;">*</span><br />

							<input type="text" name="roadstreet" size="50" maxlength="50" required value="<?php echo htmlspecialchars($roadstreet); ?>" />

						</label><br />
					</td>
				</tr>
			</table>

			<br />
			<br />

			<input id="submitbutton"  type="submit" name="submit" value="Submit!">

			<br />
			<br />


		</div>
			<!-- banner residing at bottom of form-->
			<a target="_blank" href="http://www.athens.edu">
				<div class="banner">
					<img class="bottom" src="media/banner-bottom.png" alt="Athens State University" />
				</div>
			</a>


			</form>
			<script>
			$("#addreqform").validate();
			</script>

	</body>
</html>
