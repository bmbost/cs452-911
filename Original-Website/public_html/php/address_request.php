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
	if ($residency == 'Y') { $residencyCheck = 'checked'; }
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
	if (!isset($expDate)) { $expDate = ''; }
	if (!isset($expYear)) { $expYear = ''; }
	if (!isset($roadstreet)) { $roadstreet = ''; }
?>

<!DOCTYPE html>
<html>



	<head>

		<title>Address Request Form</title>

		<link href="../css/forms-style.css" type="text/css" rel="stylesheet"/>

	</head>



	<body>



		<!-- Below is the Address Request Form -->

		<form id="addreqform" class="elegant-aero" action="addressform.php" method="post">



			<h1>Address Request Form</h1>

				<p>Use this form to request an address...<p>



				<!-- Line Break in page-->

				<hr />

        <?php
          if (!empty($message)) {
            echo '<p style="color: red; font-weight: bold">' . $message . '</p>';
          }
        ?>


				<h2> Request and Contact Information</h2>



				<fieldset>

					<legend>Requestor Details</legend>


				<!--Form Field 2: Requestor - person submitting address request (either resident or someone submitting on behalf of resident)

					Field Validation: *Required, Should be text and spaces only - no numbers or other special characters -->

					<label>Requestor First Name:<br />

						<input type="text" name="requestor_firstName" size="20" maxlength="60" value="<?php echo htmlspecialchars($firstName); ?>" />

					</label><br />


					<!--Form Field 3: Requestor - person submitting address request (either resident or someone submitting on behalf of resident)

					Field Validation: *Required, Should be text and spaces only - no numbers or other special characters -->

					<label>Requestor Last Name:<br />

						<input type="text" name="requestor_lastName" size="20" maxlength="60" value="<?php echo htmlspecialchars($lastName); ?>" />

					</label><br />



				<!--Form Field 4: Req Phone 1 - primary contact number for requestor

					Field Validation: *Required, Must contain 10 numerals only (must include area code), set up validation to ensure 10 numerals present with

					no text or special characters. Display in format (###) ###-##### -->

					<label>Requestor Phone 1: (

						<input type="text" name="reqArea1" size = "3" maxlength="3" value="<?php echo htmlspecialchars($reqArea1); ?>" /> )
            <input type="text" name="reqFirstThree1" size="3" maxlength="3" value="<?php echo htmlspecialchars($reqFirstThree1); ?>" /> -
            <input type="text" name="reqLastFour1" size="4" maxlength="4" value="<?php echo htmlspecialchars($reqLastFour1); ?>" />

					</label><br />



				<!--Form field 5: Req Phone 2 - secondary contact number for requestor

					Field Validation: must contain 10 numerals only (must include area code), set up validation to ensure 10 numerals present with

					no text or special characters. Display in format (###) ###-#### -->

					<label>Requestor Phone 2: (

            <input type="text" name="reqArea2" size = "3" maxlength="3" value="<?php echo htmlspecialchars($reqArea2); ?>" /> )
            <input type="text" name="reqFirstThree2" size="3" maxlength="3" value="<?php echo htmlspecialchars($reqFirstThree2); ?>" /> -
            <input type="text" name="reqLastFour2" size="4" maxlength="4" value="<?php echo htmlspecialchars($reqLastFour2); ?>" />

					</label><br />

				</fieldset><br />



				<!--*NOTE**********************************************************-->

				<!-- Could possibly add another check box field here that asks if the

					 requestor is the same as the resident. This would automatically

					 fill the resident name and contact information using the info

					 entered into Requestor section. Would eliminate duplication of

					 efforts for a resident who submits the form.-->

				<!--***************************************************************-->



				<!--Checkbox field test (see above)-->

				<p>Check the box below if requestor is also the resident for the new address<br />

					<input type="checkbox" name="reqisresYN" value="Y" <?php echo htmlspecialchars($residencyCheck); ?> />

				</p><br />





				<fieldset>

					<legend>Resident Details</legend>

				<!--Form Field 6: Resident - person that will be residing in new address

					Field Validation: *Required, Should be text and spaces only - no numbers or other special characters -->

					<label>Resident First Name:<br />

						<input type="text" name="resident_firstName" size="20" maxlength="60" value="<?php echo htmlspecialchars($resFirstName); ?>" />

					</label><br />


					<!--Form Field 7: Resident - person that will be residing in new address

					Field Validation: *Required, Should be text and spaces only - no numbers or other special characters -->

					<label>Resident Last Name:<br />

						<input type="text" name="resident_lastName" size="20" maxlength="60" value="<?php echo htmlspecialchars($resLastName); ?>" />

					</label><br />



					<!--Form Field 8: Res Phone 1 - primary contact number for resident

					Field Validation: *Required, Must contain 10 numerals only (must include area code), set up validation to ensure 10
					numerals present with

					no text or special characters. Display in format (###) ###-##### -->

					<label >Resident Phone 1: (

            <input type="text" name="resArea1" size = "3" maxlength="3" value="<?php echo htmlspecialchars($resArea1); ?>" /> )
            <input type="text" name="resFirstThree1" size="3" maxlength="3" value="<?php echo htmlspecialchars($resFirstThree1); ?>" /> -
            <input type="text" name="resLastFour1" size="4" maxlength="4" value="<?php echo htmlspecialchars($resLastFour1); ?>" />

					</label><br />



				<!--Form field 9: Res Phone 2 - secondary contact number for resident

					Field Validation: Must contain 10 numerals only (must include area code), set up validation to ensure 10 numerals present with

					no text or special characters. Display in format (###) ###-#### -->

					<label>Resident Phone 2: (

            <input type="text" name="resArea2" size = "3" maxlength="3" value="<?php echo htmlspecialchars($resArea2); ?>" /> )
            <input type="text" name="resFirstThree2" size="3" maxlength="3" value="<?php echo htmlspecialchars($resFirstThree2); ?>" /> -
            <input type="text" name="resLastFour2" size="4" maxlength="4" value="<?php echo htmlspecialchars($resLastFour2); ?>" />

					</label><br />

				</fieldset><br />



				<!-- Line Break in page-->

				<hr />



				<h2>Structure and Address Details</h2>

				<!--Form Field 10: Structure Type - drop down for user to select the type of structure

					Field Validation: *Required -->

					<p>What type of structure will be associated with the new address? Please select from the following options.</p>

					<select name="structype">

						<option value="house" <?php echo $house; ?> >House</option>

						<option value="manufhome" <?php echo $manufhome; ?> >Manufactured Home</option>

						<option value="other" <?php echo $otherHome; ?> >Other Structure Type</option>

					</select>



				<!--Form Field 11: Structure Details - user should enter any other details about the structure, such as color or structure type

					if user selected Other Structure Type for Structure Type

					Field Validation: *Required -->

					<p>Please explain what type of structure. Include any other details such as color or how the property is marked.</p>

					<textarea name="strucdetails" cols="50" rows="10"> </textarea> <br />


			<!-- Form 12: Direction - User will enter will fill out which direction the address is located in

				Field Validation: *Required -->

				<label>North of ADD#<br />

						<input type="text" name="northadd" size="20" maxlength="15" />

					</label><br />

				</fieldset><br />


				<label>South of ADD#<br />

						<input type="text" name="southadd" size="20" maxlength="15" />

					</label><br />

				</fieldset><br />


				<label>East of ADD#<br />

						<input type="text" name="eastadd" size="20" maxlength="15" />

					</label><br />

				</fieldset><br />


				<label>West of ADD#<br />

						<input type="text" name="westadd" size="20" maxlength="15" />

					</label><br />

				</fieldset><br />



         <!-- Form 13: Markers - User will input what type of markers there are

				Field Validation: *Required -->

			<p>Markers:</p>

					<textarea name="markers" cols="30" rows="5"> </textarea> <br />


			<p>Other:</p>

					<textarea name="others" cols="30" rows="5"> </textarea> <br />



		<!-- Line Break in page-->


		<!-- Form 14: Eperation Date - User will enter experiation date

				Field Validation: * Required -->

				<label>Exp Date (in MM / DD / YYYY format):

						<input type="text" name="expMonth" maxlength="2" size="2" /> /
						<input type="text" name="expDay" maxlength="2" size="2" /> /
						<input type="text" name="expYear" maxlength="4" size="4" />

					</label><br />


				<hr />

		<!-- Form 15: Road Street - User will enter street name

				Field Validation: * Required -->

				<label>Road-Street:<br />

						<input type="text" name="roadstreet" size="20" maxlength="10" />

					</label><br />


				<hr />



				<input type="submit" name="submit" value="Submit!">



		</form>





	</body>



</html>
