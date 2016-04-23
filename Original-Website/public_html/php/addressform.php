<?php
require('connect_db.php');

// Creates variables and filters input from user
$date = date('Y-m-d');
$firstName = filter_input(INPUT_POST, 'requestor_firstName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$lastName = filter_input(INPUT_POST, 'requestor_lastName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$reqArea1 = filter_input(INPUT_POST, 'reqArea1', FILTER_VALIDATE_INT);
$reqFirstThree1 = filter_input(INPUT_POST, 'reqFirstThree1', FILTER_VALIDATE_INT);
$reqLastFour1 = filter_input(INPUT_POST, 'reqLastFour1', FILTER_VALIDATE_INT);
$reqArea2 = filter_input(INPUT_POST, 'reqArea2', FILTER_VALIDATE_INT);
$reqFirstThree2 = filter_input(INPUT_POST, 'reqFirstThree2', FILTER_VALIDATE_INT);
$reqLastFour2 = filter_input(INPUT_POST, 'reqLastFour2', FILTER_VALIDATE_INT);
$residency = filter_input(INPUT_POST, 'reqisresYN', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$resFirstName = filter_input(INPUT_POST, 'resident_firstName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$resLastName = filter_input(INPUT_POST, 'resident_lastName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$resArea1 = filter_input(INPUT_POST, 'resArea1', FILTER_VALIDATE_INT);
$resFirstThree1 = filter_input(INPUT_POST, 'resFirstThree1', FILTER_VALIDATE_INT);
$resLastFour1 = filter_input(INPUT_POST, 'resLastFour1', FILTER_VALIDATE_INT);
$resArea2 = filter_input(INPUT_POST, 'resArea2', FILTER_VALIDATE_INT);
$resFirstThree2 = filter_input(INPUT_POST, 'resFirstThree2', FILTER_VALIDATE_INT);
$resLastFour2 = filter_input(INPUT_POST, 'resLastFour2', FILTER_VALIDATE_INT);
$structure = filter_input(INPUT_POST, 'structype', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$details = filter_input(INPUT_POST, 'strucdetails', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$northadd = filter_input(INPUT_POST, 'northadd', FILTER_VALIDATE_INT);
$southadd = filter_input(INPUT_POST, 'southadd', FILTER_VALIDATE_INT);
$eastadd = filter_input(INPUT_POST, 'eastadd', FILTER_VALIDATE_INT);
$westadd = filter_input(INPUT_POST, 'westadd', FILTER_VALIDATE_INT);
$markers = filter_input(INPUT_POST, 'markers', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$others = filter_input(INPUT_POST, 'others', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$expMonth = filter_input(INPUT_POST, 'expMonth', FILTER_VALIDATE_INT);
$expDay = filter_input(INPUT_POST, 'expDay', FILTER_VALIDATE_INT);
$expYear = filter_input(INPUT_POST, 'expYear', FILTER_VALIDATE_INT);
$roadstreet = filter_input(INPUT_POST, 'roadstreet', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$message = '';

// Check and see if residency checkbox was marked 'Y', and if so add previously entered fields
if ($residency == 'Y') {
  $resFirstName = $firstName;
  $resLastName = $lastName;
  $resArea1 = $reqArea1;
  $resFirstThree1 = $reqFirstThree1;
  $resLastFour1 = $reqLastFour1;
  $resArea2 = $reqArea2;
  $resFirstThree2 = $reqFirstThree2;
  $resLastFour2 = $reqLastFour2;
}

// If residency wasn't checked, change it to the character 'N'
if ($residency === NULL) {
  $residency = 'N';
}

// First set of validations, check to make sure all required fields are entered.
if (($firstName === '') || ($firstName === NULL)) {
  $message .= '<p style="color: red; font-weight: bold">The first name of the requestor is required.</p>';
}

if (($lastName === '') || ($lastName === NULL)) {
  $message .- '<p style="color: red; font-weight: bold">The last name of the requestor is required.</p>';
}
if ($reqArea1 === NULL) {
  $message .= '<p style="color: red; font-weight: bold">The full telephone number of the requestor is required.</p>';
}
if ($reqFirstThree1 === NULL) {
  $message .= '<p style="color: red; font-weight: bold">The full telephone number of the requestor is required.</p>';
}
if ($reqLastFour1 === NULL) {
  $message .= '<p style="color: red; font-weight: bold">The full telephone number of the requestor is required.</p>';
}
if ((($reqArea2 != NULL) && ($reqFirstThree2 === NULL)) ||
          (($reqLastFour2 != NULL) && ($reqArea2 === NULL)) ||
          (($reqFirstThree2 != NULL) && ($reqLastFour2 === NULL)) ||
          (($reqArea2 === NULL) && ($reqFirstThree2 != NULL)) ||
          (($reqLastFour2 === NULL) && ($reqArea2 != NULL)) ||
          (($reqFirstThree2 === NULL) && ($reqLastFour2 != NULL))) {
  $message .= '<p style="color: red; font-weight: bold">If entering a second telephone number for the requestor, please enter the FULL number.</p>';
}
if (($resFirstName === '') || ($resFirstName === NULL)) {
  $message .= '<p style="color: red; font-weight: bold">The first name of the resident is required if the residency checkbox is not selected.</p>';
}
if (($resLastName === '') || ($resLastName === NULL)) {
  $message .= '<p style="color: red; font-weight: bold">The last name of the resident is required if the residency checkbox is not selected.</p>';
}
if ($resArea1 === NULL) {
  $message .= '<p style="color: red; font-weight: bold">The full telephone number of the resident is required if the residency checkbox is not selected.</p>';
}
if ($resFirstThree1 === NULL) {
  $message .= '<p style="color: red; font-weight: bold">The full telephone number of the resident is required if the residency checkbox is not selected.</p>';
}
if ($resLastFour1 === NULL) {
  $message .= '<p style="color: red; font-weight: bold">The full telephone number of the resident is required if the residency checkbox is not selected.</p>';
}
if ((($resArea2 != NULL) && ($resFirstThree2 === NULL)) ||
          (($resLastFour2 != NULL) && ($resArea2 === NULL)) ||
          (($resFirstThree2 != NULL) && ($resLastFour2 === NULL)) ||
          (($resArea2 === NULL) && ($resFirstThree2 != NULL)) ||
          (($resLastFour2 === NULL) && ($resArea2 != NULL)) ||
          (($resFirstThree2 === NULL) && ($resLastFour2 != NULL))) {
  $message .= '<p style="color: red; font-weight: bold">If entering a second telephone number for the resident, please enter the FULL number.</p>';
}
if ($details === NULL) {
  $message .= '<p style="color: red; font-weight: bold">The details for this property are required.</p>';
}
if ($northadd === NULL) {
  $message .= '<p style="color: red; font-weight: bold">The North of Address Number is required.</p>';
}
if ($southadd === NULL) {
  $message .= '<p style="color: red; font-weight: bold">The South of Address Number is required.</p>';
}
if ($eastadd === NULL) {
  $message .= '<p style="color: red; font-weight: bold">The East of Address Number is required.</p>';
}
if ($westadd === NULL) {
  $message .= '<p style="color: red; font-weight: bold">The West of Address Number is required.</p>';
}
if ($markers === NULL) {
  $message .= '<p style="color: red; font-weight: bold">The Markers section is required.</p>';
}
if ($expMonth === NULL) {
  $message .= '<p style="color: red; font-weight: bold">The expiration month is required.</p>';
}
if ($expDay === NULL) {
  $message .= '<p style="color: red; font-weight: bold">The expiration day is required.</p>';
}
if ($expYear === NULL) {
  $message .= '<p style="color: red; font-weight: bold">The expiration year is required.</p>';
}
if ($roadstreet === NULL) {
  $message .= '<p style="color: red; font-weight: bold">The road-street field is required.</p>';
}
if (strlen($reqArea1) != 3) { // Start checking number fields for correct amount of digits
  $message .= '<p style="color: red; font-weight: bold">You must have the correct number of digits in the requestor telephone field.</p>';
}
if (strlen($reqFirstThree1) != 3) {
  $message .= '<p style="color: red; font-weight: bold">You must have the correct number of digits in the requestor telephone field.</p>';
}
if (strlen($reqLastFour1) != 4) {
  $message .= '<p style="color: red; font-weight: bold">You must have the correct number of digits in the requestor telephone field.</p>';
}
if (strlen($resArea1) != 3) {
  $message .= '<p style="color: red; font-weight: bold">You must have the correct number of digits in the resident telephone field.</p>';
}
if (strlen($resFirstThree1) != 3) {
  $message .= '<p style="color: red; font-weight: bold">You must have the correct number of digits in the resident telephone field.</p>';
}
if (strlen($resLastFour1) != 4) {
  $message .= '<p style="color: red; font-weight: bold">You must have the correct number of digits in the resident telephone field.<p>';
}
if ($reqArea2 != NULL) { // Makes sure a number has been entered in the second requestor field before checking digits
  if (strlen($reqArea2) != 3) {
    $message .= '<p style="color: red; font-weight: bold">You must have the correct number of digits in the requestor\'s second telephone field.</p>';
  } else if (strlen($reqFirstThree2) != 3) {
    $message .= '<p style="color: red; font-weight: bold">You must have the correct number of digits in the requestor\'s second telephone field.</p>';
  } else if (strlen($reqLastFour2) != 4) {
    $message .= '<p style="color: red; font-weight: bold">You must have the correct number of digits in the requestor\'s second telephone field.</p>';
  }
}
if ($resArea2 != NULL) { // Makes sure a number has been entered in the second resident field before checking digits
  if (strlen($resArea2) != 3) {
    $message .= '<p style="color: red; font-weight: bold">You must have the correct number of digits in the resident\'s second telephone field.</p>';
  } else if (strlen($resFirstThree2) != 3) {
    $message .= '<p style="color: red; font-weight: bold">You must have the correct number of digits in the resident\'s second telephone field.</p>';
  } else if (strlen($resLastFour2) != 4) {
    $message .= '<p style="color: red; font-weight: bold">You must have the correct number of digits in the resident\'s second telephone field.</p>';
  }
}
if (strlen($expMonth) != 2) {
  $message .= '<p style="color: red; font-weight: bold">Two digits must be entered for the Expiration Month field.</p>';
}
if (strlen($expDay) != 2) {
  $message .= '<p style="color: red; font-weight: bold">Two digits must be entered for the Expiration Day field.</p>';
}
if (strlen($expYear) != 4) {
  $message .= '<p style="color: red; font-weight: bold">Four digits must be entered for the Expiration Year field.</p>';
}
if (($expMonth < 1) || ($expMonth > 12)) {
  $message .= '<p style="color: red; font-weight: bold">You must enter a number between 1 and 12 for the month.</p>';
}
if (($expMonth == 1) || ($expMonth == 3) || ($expMonth == 5) || ($expMonth == 7) || ($expMonth == 8) || ($expMonth == 10) || ($expMonth == 12)) {
  if (($expDay < 1) || ($expDay > 31)) {
    $message .= '<p style="color: red; font-weight: bold">You must enter a date between 1 and 31 for the month chosen.</p>';
  }
}
if (($expMonth == 4) || ($expMonth == 6) || ($expMonth == 9) || ($expMonth == 11)) {
  if (($expDay < 1) || ($expDay > 30)) {
    $message .= '<p style="color: red; font-weight: bold">You must enter a date between 1 and 30 for the month chosen.</p>';
  }
}
if ($expMonth < date('m')) {
  $message .= '<p style="color: red; font-weight: bold">You must enter a valid future date for the expiration date.</p>';
}
if ($expDay < date('d')) {
  $message .= '<p style="color: red; font-weight: bold">You must enter a valid future date for the expiration date.</p>';
}
if ($expYear < date('Y')) {
  $message .= '<p style="color: red; font-weight: bold">You must enter a valid future date for the expiration date.</p>';
}
if (($expYear % 4) == 0) {
  if ($expMonth == 2) {
    if (($expDay < 1) || ($expDay > 29)) {
      $message .= '<p style="color: red; font-weight: bold">You must enter a date between 1 and 29 for the month and year selected.</p>';
    }
  }
}
if (($expYear % 4) != 0) {
  if ($expMonth == 2) {
    if (($expDay < 1) || ($expDay > 28)) {
      $message .= '<p style="color: red; font-weight: bold">You must enter a date between 1 and 29 for the month and year selected.</p>';
    }
  }
}

if ($message != '') {
  include('address_request.php');
  exit();
}

$name = $firstName . ' ' . $lastName;
$resident = $resFirstName . ' ' . $resLastName;
$phone1 = '(' . $reqArea1 . ') ' . $reqFirstThree1 . '-' . $reqLastFour1;
$phone2 = '(' . $reqArea2 . ') ' . $reqFirstThree2 . '-' . $reqLastFour2;
$resphone1 = '(' . $resArea1 . ') ' . $resFirstThree1 . '-' . $resLastFour1;
$resphone2 = '(' . $reqArea2 . ') ' . $reqFirstThree2 . '-' . $reqLastFour2;
$expdate = $expYear . '-' . $expMonth . '-' . $expDay;

$sql = "INSERT INTO address_form (request_date, requestor, requestor_phone1,
        requestor_phone2, residency, resident, resident_phone1, resident_phone2,
        structure_type, structure_details, north_add_num, south_add_num,
        east_add_num, west_add_num, markers, others, expiration_date, road_street)
        VALUES ('$date', '$name', '$phone1', '$phone2', '$residency', '$resident',
        '$resphone1', '$resphone2', '$structure', '$details', '$northadd', '$southadd',
        '$eastadd', '$westadd', '$markers', '$others', '$expdate', '$roadstreet')";

if (mysqli_query($dbhandle, $sql)) {
  echo "<p>Address request successfully submitted.</p>";
  echo "<p>Thank you for your submission. A representative with the Athens-Limestone
       County 911 Center will contact you soon.</p>";
}
else {
  echo "<p>Database entry failed.</p>" . mysqli_error($dbhandle);
}

mysqli_close($dbhandle); // Close the database.

require('Mail.php'); // Include the PEAR Mail header

// Create all of the options to use to set up the mailer object
$options = array();
$options['host'] = 'smtp-mail.outlook.com';
$options['port'] = 587;
$options['auth'] = true;
$options['username'] = 'alc911@outlook.com';
$options['password'] = 'Limestone911';

$mailer = Mail::factory('smtp', $options); // Create mailer object

// Set up headers
$headers = array();
$headers['From'] = 'alc911@outlook.com';
$headers['To'] = 'bmbost1983@gmail.com';
$headers['Subject'] = $name . ' Address Request Form Submission';

$recipients = 'bmbost1983@gmail.com';
$body = "$name has just submitted an address request form. Please log into the ALC911 page to view the submission and to print the form.";

$result = $mailer->send($recipients, $headers, $body); // Send the message

// Print error message if failed
if (PEAR::isError($result)) {
  $error = 'Error sending email: ' . $result->getMessage();
  echo htmlspecialchars($error);
}
?>
