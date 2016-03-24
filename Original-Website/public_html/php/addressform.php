<?php
require('connect_db.php');

// Creates variables and filters input from user
$date = date('m/d/Y');
$firstName = filter_input(INPUT_POST, 'requestor_firstName');
$lastName = filter_input(INPUT_POST, 'requestor_lastName');
$reqArea1 = filter_input(INPUT_POST, 'reqArea1');
$reqFirstThree1 = filter_input(INPUT_POST, 'reqFirstThree1');
$reqLastFour1 = filter_input(INPUT_POST, 'reqLastFour1');
$reqArea2 = filter_input(INPUT_POST, 'reqArea2');
$reqFirstThree2 = filter_input(INPUT_POST, 'reqFirstThree2');
$reqLastFour2 = filter_input(INPUT_POST, 'reqLastFour2');
$residency = filter_input(INPUT_POST, 'reqisresYN');
$resFirstName = filter_input(INPUT_POST, 'resident_firstName');
$resLastName = filter_input(INPUT_POST, 'resident_lastName');
$resArea1 = filter_input(INPUT_POST, 'resArea1');
$resFirstThree1 = filter_input(INPUT_POST, 'resFirstThree1');
$resLastFour1 = filter_input(INPUT_POST, 'resLastFour1');
$resArea2 = filter_input(INPUT_POST, 'resArea2');
$resFirstThree2 = filter_input(INPUT_POST, 'resFirstThree2');
$resLastFour2 = filter_input(INPUT_POST, 'resLastFour2');
$structure = filter_input(INPUT_POST, 'structype');
$details = filter_input(INPUT_POST, 'strucdetails');
$northadd = filter_input(INPUT_POST, 'northadd');
$southadd = filter_input(INPUT_POST, 'southadd');
$eastadd = filter_input(INPUT_POST, 'eastadd');
$westadd = filter_input(INPUT_POST, 'westadd');
$markers = filter_input(INPUT_POST, 'markers');
$others = filter_input(INPUT_POST, 'others');
$expMonth = filter_input(INPUT_POST, 'expMonth');
$expDay = filter_input(INPUT_POST, 'expDay');
$expYear = filter_input(INPUT_POST, 'expYear');
$roadstreet = filter_input(INPUT_POST, 'roadstreet');

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
