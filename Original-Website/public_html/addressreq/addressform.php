<?php
ini_set("include_path", '/home/athens911/php:' . ini_get("include_path") );

// Created by Athens State University CS452 Senior Engineering Project
// Members: Mallory Patterson, Brandon Bost, Jordan Hopkins, Keith Robinson

// Check reCAPTCHA to see if it is valid, then execute code if it is.
// Parts of code obtained from codeforgeek.com tutorial (https://www.codeforgeek.com/2014/12/google-recaptcha-tutorial/)
if (isset($_POST['g-recaptcha-response'])) { $captcha = $_POST['g-recaptcha-response']; }

if (!$captcha) {
  include("address_form_header.html");
  echo "<p>You must verify your identity with the reCAPTCHA. Press the Back button to continue.</p>";
  include("address_form_footer.html");
  exit();
}

// Set up variables with secret key, ip address, and response.
$secret = "6LfoNR4TAAAAAEnCW4z91WSqBzMFdBzad6VXKwPY";
$ip = $_SERVER['REMOTE_ADDR'];
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
$responseKeys = json_decode($response, true);

// If response is false, display error. Otherwise, complete code.
if (intval($responseKeys["success"]) !== 1) {
  include("address_form_header.html");
  echo "<h1>The CAPTCHA could not verify that you are not a spambot.</h1>";
  include("address_form_footer.html");
} else {

// Call to database connection. NOT IMPLEMENTED due to client change of SOW.
/*
require('connect_db.php');
*/
// Creates variables and filters input from user
$date = date('Y-m-d');
$firstName = filter_input(INPUT_POST, 'reqFirst', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$lastName = filter_input(INPUT_POST, 'reqLast', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$reqArea1 = filter_input(INPUT_POST, 'requArea1', FILTER_VALIDATE_INT);
$reqFirstThree1 = filter_input(INPUT_POST, 'requFirstThree1', FILTER_VALIDATE_INT);
$reqLastFour1 = filter_input(INPUT_POST, 'requLastFour1', FILTER_VALIDATE_INT);
$reqArea2 = filter_input(INPUT_POST, 'requArea2', FILTER_VALIDATE_INT);
$reqFirstThree2 = filter_input(INPUT_POST, 'requFirstThree2', FILTER_VALIDATE_INT);
$reqLastFour2 = filter_input(INPUT_POST, 'requLastFour2', FILTER_VALIDATE_INT);
$residency = filter_input(INPUT_POST, 'reqisresYN', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$resFirstName = filter_input(INPUT_POST, 'resFirst', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$resLastName = filter_input(INPUT_POST, 'resLast', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$resArea1 = filter_input(INPUT_POST, 'resiArea1', FILTER_VALIDATE_INT);
$resFirstThree1 = filter_input(INPUT_POST, 'resiFirstThree1', FILTER_VALIDATE_INT);
$resLastFour1 = filter_input(INPUT_POST, 'resiLastFour1', FILTER_VALIDATE_INT);
$resArea2 = filter_input(INPUT_POST, 'resiArea2', FILTER_VALIDATE_INT);
$resFirstThree2 = filter_input(INPUT_POST, 'resiFirstThree2', FILTER_VALIDATE_INT);
$resLastFour2 = filter_input(INPUT_POST, 'resiLastFour2', FILTER_VALIDATE_INT);
$structure = filter_input(INPUT_POST, 'structype', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$details = filter_input(INPUT_POST, 'strucdetails', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$northadd = filter_input(INPUT_POST, 'northADDR', FILTER_VALIDATE_INT);
$southadd = filter_input(INPUT_POST, 'southADDR', FILTER_VALIDATE_INT);
$eastadd = filter_input(INPUT_POST, 'eastADDR', FILTER_VALIDATE_INT);
$westadd = filter_input(INPUT_POST, 'westADDR', FILTER_VALIDATE_INT);
$markers = filter_input(INPUT_POST, 'markersINFO', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$others = filter_input(INPUT_POST, 'othersINFO', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$roadstreet = filter_input(INPUT_POST, 'roadname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$gps = filter_input(INPUT_POST, 'GPScoordinates', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$lotNumber = filter_input(INPUT_POST, 'lotNumber', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

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


if ($message != '') {
  include("address_form_header.html");
  echo $message;
  echo "<p>Please press the Back button and correct these issues in your submission.</p>";
  include("address_form_footer.html");
  exit();
}

$name = $firstName . ' ' . $lastName;
$resident = $resFirstName . ' ' . $resLastName;
$phone1 = '(' . $reqArea1 . ') ' . $reqFirstThree1 . '-' . $reqLastFour1;
$phone2 = '(' . $reqArea2 . ') ' . $reqFirstThree2 . '-' . $reqLastFour2;
$resphone1 = '(' . $resArea1 . ') ' . $resFirstThree1 . '-' . $resLastFour1;
$resphone2 = '(' . $reqArea2 . ') ' . $reqFirstThree2 . '-' . $reqLastFour2;

// Database insertion

/*
$sql = "INSERT INTO address_form (request_date, requestor, requestor_phone1,
        requestor_phone2, residency, resident, resident_phone1, resident_phone2,
        structure_type, structure_details, north_add_num, south_add_num,
        east_add_num, west_add_num, markers, others, road_street, lotNumber, gps)
        VALUES ('$date', '$name', '$phone1', '$phone2', '$residency', '$resident',
        '$resphone1', '$resphone2', '$structure', '$details', '$northadd', '$southadd',
        '$eastadd', '$westadd', '$markers', '$others', '$roadstreet', '$lotNumber', '$gps')";

if (mysqli_query($dbhandle, $sql)) {
  include("address_form_header.html");
  echo '<p style="padding-left: 15px">Address request successfully submitted.</p>';
  echo '<p style="padding-left: 15px">Thank you for your submission. A representative with the Athens-Limestone
       County 911 Center will contact you soon.</p>';
  include("address_form_footer.html");
}
else {
  include("address_form_header.html");
  echo '<p style="padding-left: 15px">Database entry failed.</p>' . mysqli_error($dbhandle);
  include("address_form_footer.html");
}

mysqli_close($dbhandle); // Close the database.
*/
require('Mail.php'); // Include the PEAR Mail header

// Create all of the options to use to set up the mailer object
$options = array();
$options['host'] = 'ssl://p3plcpnl0095.prod.phx3.secureserver.net';
$options['port'] = 465;
$options['auth'] = true;
$options['username'] = 'donotrespond@alc911.org';
$options['password'] = 'Athens911';

$mailer = Mail::factory('smtp', $options); // Create mailer object

// Set up headers
$headers = array();
$headers['From'] = 'ACL911 Automated Mailer <donotrespond@alc911.org>';
$headers['To'] = 'jackson@alc911.org, brandon@alc911.org';
$headers['Subject'] = $name . ' Address Request Form Submission';
$headers['Content-type'] = 'text/html';

$recipients = 'jackson@alc911.org, brandon@alc911.org';
//the message body of the email that contains all the table html info
$body = '<html><body>';
$body .= '<h1>Address Request Form for '. $name . '</h1><br><br>';
$body .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$body .= "<tr style='background: #eee;'><td><strong>Date of Request:</strong> </td><td>". $date . "</tr>";
$body .= "<tr><td><strong>Requestor First Name:</strong> </td><td>" . strip_tags($firstName) . "</td></tr>";
$body .= "<tr><td><strong>Requestor Last Name:</strong> </td><td>" . strip_tags($lastName) . "</td></tr>";
$body .= "<tr><td><strong>Requestor Phone 1:</strong> </td><td>(" . strip_tags($reqArea1) .") "
. strip_tags($reqFirstThree1) . "-" . strip_tags($reqLastFour1) ."</tr>";
$body .= "<tr><td><strong>Requestor Phone 2:</strong> </td><td>(" . strip_tags($reqArea2) .") "
. strip_tags($reqFirstThree2) . "-" . strip_tags($reqLastFour2) ."</tr>";
$body .= "<tr><td><strong>Resident First Name:</strong> </td><td>" . strip_tags($resFirstName) . "</td></tr>";
$body .= "<tr><td><strong>Resident Last Name:</strong> </td><td>" . strip_tags($resLastName) . "</td></tr>";
$body .= "<tr><td><strong>Resident Phone 1:</strong> </td><td>(" . strip_tags($resArea1) .") "
. strip_tags($resFirstThree1) . "-" . strip_tags($resLastFour1) ."</tr>";
$body .= "<tr><td><strong>Resident Phone 2:</strong> </td><td>(" . strip_tags($resArea2) .") "
. strip_tags($resFirstThree2) . "-" . strip_tags($resLastFour2) ."</tr>";
$body .= "<tr><td><strong>Type of Structure:</strong> </td><td>" . strip_tags($structure) . "</td></tr>";
$body .= "<tr><td><strong>Explanation of Structure:</strong> </td><td>" . strip_tags($details) . "</td></tr>";
$body .= "<tr><td><strong>North of Address #:</strong> </td><td>" . strip_tags($northadd) . "</td></tr>";
$body .= "<tr><td><strong>South of Address #:</strong> </td><td>" . strip_tags($southadd) . "</td></tr>";
$body .= "<tr><td><strong>East of Address #:</strong> </td><td>" . strip_tags($eastadd) . "</td></tr>";
$body .= "<tr><td><strong>West of Address #:</strong> </td><td>" . strip_tags($westadd) . "</td></tr>";
$body .= "<tr><td><strong>Markers Information:</strong> </td><td>" . strip_tags($markers) . "</td></tr>";
$body .= "<tr><td><strong>Other Information:</strong> </td><td>" . strip_tags($others) . "</td></tr>";
$body .= "<tr><td><strong>Road Name:</strong> </td><td>" . strip_tags($roadstreet) . "</td></tr>";
$body .= "<tr><td><strong>Lot Number:</strong> </td><td>" . strip_tags($lotNumber) . "</td></tr>";
$body .= "<tr><td><strong>GPS Coordinates:</strong> </td><td>" . strip_tags($gps) . "</td></tr>";
$body .= "</table>";
$body .= "</body></html>";

$result = $mailer->send($recipients, $headers, $body); // Send the message

// Print error message if failed
if (PEAR::isError($result)) {
  $error = 'Error sending email: ' . $result->getMessage();
  echo htmlspecialchars($error);
}

include("address_form_header.html");
echo '<p style="padding-left: 15px">Address request successfully submitted.</p>';
echo '<p style="padding-left: 15px">Thank you for your submission. A representative with the Athens-Limestone
     County 911 Center will contact you soon.</p>';
include("address_form_footer.html");

} // end reCAPTCHA else
?>
