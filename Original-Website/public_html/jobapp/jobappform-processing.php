<?php
// Check reCAPTCHA to see if it is valid, then execute code if it is.
// Parts of code obtained from codeforgeek.com tutorial (https://www.codeforgeek.com/2014/12/google-recaptcha-tutorial/)
if (isset($_POST['g-recaptcha-response'])) { $captcha = $_POST['g-recaptcha-response']; }

if (!$captcha) {
  include("jobapp_header.html");
  echo '<p style="padding-left: 15px">You must verify your identity with the reCAPTCHA. Press the Back button to continue.</p>';
  include("jobapp_footer.html");
  exit();
}

// Set up variables with secret key, ip address, and response.
$secret = "6LfoNR4TAAAAAEnCW4z91WSqBzMFdBzad6VXKwPY";
$ip = $_SERVER['REMOTE_ADDR'];
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
$responseKeys = json_decode($response, true);

// If response is false, display error. Otherwise, complete code.
if (intval($responseKeys["success"]) !== 1) {
  include("jobapp_header.html");
  echo "<h1>The CAPTCHA could not verify that you are not a spambot.</h1>";
  include("jobapp_footer.html");
} else {

//Initializing part 1 of form
$poS = $recNum = $firstN = $middleIN = $lastN = $dateOf = $mAddr = $eAddr =
$homeP = $cityNum = $countyNum = $stateNum = $zipcdNum = $workphoneNum = $radio1 = $radio2 = $radio3 =
$shiftNum1 = $shiftNum2 = $shiftNum3 = $shiftNum4 = $scheduleNum1 = $scheduleNum2 = $scheduleNum3 = $scheduleNum4 =
$scheduleNum5 = $convictYN = $hisYN = $genderMF = $raceNum1 = $raceNum2 = $raceNum3 = $raceNum4 = $raceNum5 = $raceNum6 = $raceNum7 =
$activeYN = $conditionYN = " ";

//Initiazling part 2 of form
$driversL = $driversEXP = $cdlNum = $cdlEXP = $otherL = $otherEXP = $lang = $convictYN = " ";
//Initiazling part 3 of form

//Initiazling part 4 of form

//Initiazling part 5 of form

//Initiazling part 6 of form


//Connecting to database
// mysql_connect("localhost", "root", "");
// mysql_select_db("jobapptestjh");

if($_POST["submit"] == "Submit Application")
{
	echo "Record Saved  ";

	var_dump($_POST['person']);

	$eduPerson = $_POST['person'];
	/*echo "SchoolNameandLocation: ";
	echo $eduPerson[0]['schoonameandloc'];
	echo " ";
	for($i = 2; $i<=5; $i++){
	echo "SchoolNameandLocation: ";
	echo $eduPerson[$i]['schoonameandloc'];
	}*/

	//Initiazize page 1 HTML variables to PHP POST
	$poS = $_POST['position'];
	$recNum = $_POST['recruitnum'];
	$firstN = $_POST['firstname'];
	$middleIN = $_POST['middleinit'];
	$lastN = $_POST['lastname'];
	$dateOf = $_POST['DOB'];
	$mAddr = $_POST['mailingaddr'];
	$eAddr = $_POST['emailaddr'];
	$homeP = $_POST['homephone'];
	$cityNum = $_POST['city'];
	$countyNum = $_POST['county'];
	$stateNum = $_POST['state'];
	$zipcdNum = $_POST['zipcd'];
	$workphoneNum = $_POST['workphone'];

	if(!empty($_POST['stemployYN'])) {
        $radio1=$_POST['stemployYN'];
        }
	if(!empty($_POST['testassistYN'])) {
        $radio2=$_POST['testassistYN'];
		}
	if(!empty($_POST['willingtotravelYN'])) {
        $radio3=$_POST['willingtotravelYN'];
        }
	if(!empty($_POST['shift1'])) {
        $shiftNum1=$_POST['shift1'];
        }
	if(!empty($_POST['shift2'])) {
        $shiftNum2=$_POST['shift2'];
        }
	if(!empty($_POST['shift3'])) {
        $shiftNum3=$_POST['shift3'];
        }
	if(!empty($_POST['shift4'])) {
        $shiftNum4=$_POST['shift4'];
        }
	if(!empty($_POST['schedule1'])) {
        $scheduleNum1=$_POST['schedule1'];
        }
	if(!empty($_POST['schedule2'])) {
        $scheduleNum2=$_POST['schedule2'];
        }
	if(!empty($_POST['schedule3'])) {
        $scheduleNum3=$_POST['schedule3'];
        }
	if(!empty($_POST['schedule4'])) {
        $scheduleNum4=$_POST['schedule4'];
        }
	if(!empty($_POST['schedule5'])) {
        $scheduleNum5=$_POST['schedule5'];
        }

	//Setting Checkboxes to ON/OFF values
	if($shiftNum1 == "on")
		$shiftNum1 = "Available";
	else $shiftNum1 = "Unavailable";

	if($shiftNum2 == "on")
		$shiftNum2 = "Available";
	else $shiftNum2 = "Unavailable";

	if($shiftNum3 == "on")
		$shiftNum3 = "Available";
	else $shiftNum3 = "Unavailable";

	if($shiftNum4 == "on")
		$shiftNum4 = "Available";
	else $shiftNum4 = "Unavailable";

	if($scheduleNum1 == "on")
		$scheduleNum1 = "Interested";
	else $scheduleNum1 = "Uninterested";

	if($scheduleNum2 == "on")
		$scheduleNum2 = "Interested";
	else $scheduleNum2 = "Uninterested";

	if($scheduleNum3 == "on")
		$scheduleNum3 = "Interested";
	else $scheduleNum3 = "Uninterested";

	if($scheduleNum4 == "on")
		$scheduleNum4 = "Interested";
	else $scheduleNum4 = "Uninterested";

	if($scheduleNum5 == "on")
		$scheduleNum5 = "Interested";
	else $scheduleNum5 = "Uninterested";

	//Initiazize page 2 HTML variables to PHP POST
	$driversL = $_POST['DLNumber'];
	$driversEXP = $_POST['DLExpDate'];
	$cdlNum = $_POST['CDLNumber'];
	$cdlEXP = $_POST['CDLExpDate'];
	$otherL = $_POST['OtherLNumber'];
	$otherEXP = $_POST['OtherLExpDate'];
	$lang = $_POST['otherlanguages'];
	if(!empty($_POST['convictedYN'])) {
        $convictYN=$_POST['convictedYN'];
        }

	//Initiazize page 3 HTML variables to PHP POST

	//Initiazize page 4 HTML variables to PHP POST

	//Initiazize page 5 HTML variables to PHP POST
	if(!empty($_POST['hispanicYN'])) {
        $hisYN=$_POST['hispanicYN'];
        }
	if(!empty($_POST['gender'])) {
        $genderMF=$_POST['gender'];
        }
	if(!empty($_POST['race1'])) {
        $raceNum1=$_POST['race1'];
        }
	if(!empty($_POST['race2'])) {
        $raceNum2=$_POST['race2'];
        }
	if(!empty($_POST['race3'])) {
        $raceNum3=$_POST['race3'];
        }
	if(!empty($_POST['race4'])) {
        $raceNum4=$_POST['race4'];
        }
	if(!empty($_POST['race5'])) {
        $raceNum5=$_POST['race5'];
        }
	if(!empty($_POST['race6'])) {
        $raceNum6=$_POST['race6'];
        }
	if(!empty($_POST['race7'])) {
        $raceNum7=$_POST['race7'];
        }
	if(!empty($_POST['activedutyYN'])) {
        $activeYN=$_POST['activedutyYN'];
        }
	if(!empty($_POST['ltconditionYN'])) {
        $conditionYN=$_POST['ltconditionYN'];
        }

	//Setting Checkboxes to ON/OFF values

	if($raceNum1 == "on")
		$raceNum1 = "American Indian";
	if($raceNum2 == "on")
		$raceNum2 = "Alaskan Native";
	if($raceNum3 == "on")
		$raceNum3 = "Native Hawaiian or Other Pacific Islander";
	if($raceNum4 == "on")
		$raceNum4 = "Asian";
	if($raceNum5 == "on")
		$raceNum5 = "Black/African American";
	if($raceNum6 == "on")
		$raceNum6 = "White/Caucasian";
	if($raceNum7 == "on")
		$raceNum7 = "Other Race";



	//Initiazize page 6 HTML variables to PHP POST

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
  $headers['Subject'] = $name . ' Job Application Submission';
  $headers['Content-type'] = 'text/html';

  $recipients = 'bmbost1983@gmail.com';

  //the message body of the email that contains all the table html info
  //page 1 email data
  $message = '<html><body>';
  $message .= '<h1><img src="//css-tricks.com/examples/WebsiteChangeRequestForm/images/wcrf-header.png" alt="Job Application Form" /></h1><br><br>';
  $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
  /*$message .= "<tr style='background: #eee;'><td><strong>Date of Request:</strong> </td><td>". strip_tags($) ."/"
  . strip_tags($reqDay) ."/" . strip_tags($reqYear) . "</tr>";*/
  $message .= "<tr><td><strong>Position (Job Title):</strong> </td><td>" . strip_tags($poS) . "</td></tr>";
  $message .= "<tr><td><strong>Recruitment Announcement #:</strong> </td><td>" . strip_tags($recNum) . "</td></tr>";
  /*$message .= "<tr><td><strong>Requestor Phone 1:</strong> </td><td>(" . strip_tags($reqArea1) .") "
  . strip_tags($reqFirstThree1) . "-" . strip_tags($reqLastFour1) ."</tr>";
  $message .= "<tr><td><strong>Requestor Phone 2:</strong> </td><td>(" . strip_tags($reqArea2) .") "
  . strip_tags($reqFirstThree2) . "-" . strip_tags($reqLastFour2) ."</tr>";*/
  $message .= "<tr><td><strong>First Name:</strong> </td><td>" . strip_tags($firstN) . "</td></tr>";
  $message .= "<tr><td><strong>Middle Initial:</strong> </td><td>" . strip_tags($middleIN) . "</td></tr>";
  /*$message .= "<tr><td><strong>Resident Phone 1:</strong> </td><td>(" . strip_tags($resArea1) .") "
  . strip_tags($resFirstThree1) . "-" . strip_tags($resLastFour1) ."</tr>";
  $message .= "<tr><td><strong>Resident Phone 2:</strong> </td><td>(" . strip_tags($resArea2) .") "
  . strip_tags($resFirstThree2) . "-" . strip_tags($resLastFour2) ."</tr>";*/
  $message .= "<tr><td><strong>Last Name:</strong> </td><td>" . strip_tags($lastN) . "</td></tr>";
  $message .= "<tr><td><strong>Date of Birth:</strong> </td><td>" . strip_tags($dateOf) . "</td></tr>";
  $message .= "<tr><td><strong>Mailing Address:</strong> </td><td>" . strip_tags($mAddr) . "</td></tr>";
  $message .= "<tr><td><strong>Email Address:</strong> </td><td>" . strip_tags($eAddr) . "</td></tr>";
  $message .= "<tr><td><strong>Home Telephone:</strong> </td><td>" . strip_tags($homeP) . "</td></tr>";
  $message .= "<tr><td><strong>City:</strong> </td><td>" . strip_tags($cityNum) . "</td></tr>";
  $message .= "<tr><td><strong>County:</strong> </td><td>" . strip_tags($countyNum) . "</td></tr>";
  $message .= "<tr><td><strong>State:</strong> </td><td>" . strip_tags($stateNum) . "</td></tr>";
  $message .= "<tr><td><strong>Zip Code:</strong> </td><td>" . strip_tags($zipcdNum) . "</td></tr>";
  $message .= "<tr><td><strong>Work Telephone:</strong> </td><td>" . strip_tags($workphoneNum) . "</td></tr>";
  $message .= "<tr><td><strong>Are you currently a permanent City, County or State of Alabama employee?:
  </strong> </td><td>" . strip_tags($radio1) . "</td></tr>";
  $message .= "<tr><td><strong>Do you need testing assistance such as sign language, interpreter, reader, etc?:
  </strong> </td><td>" . strip_tags($radio2) . "</td></tr>";
  $message .= "<tr><td><strong>Are you willing to travel as part of this job?:</strong> </td><td>" . strip_tags($radio3) . "</td></tr>";
  $message .= "<tr><td><strong>Day Shift:</strong> </td><td>" . strip_tags($shiftNum1) . "</td></tr>";
  $message .= "<tr><td><strong>Swing Shift:</strong> </td><td>" . strip_tags($shiftNum2) . "</td></tr>";
  $message .= "<tr><td><strong>Graveyard Shift:</strong> </td><td>" . strip_tags($shiftNum3) . "</td></tr>";
  $message .= "<tr><td><strong>Rotating Shift:</strong> </td><td>" . strip_tags($shiftNum4) . "</td></tr>";
  $message .= "<tr><td><strong>Full-Time:</strong> </td><td>" . strip_tags($scheduleNum1) . "</td></tr>";
  $message .= "<tr><td><strong>Part-Time:</strong> </td><td>" . strip_tags($scheduleNum2) . "</td></tr>";
  $message .= "<tr><td><strong>Non-Permanent:</strong> </td><td>" . strip_tags($scheduleNum3) . "</td></tr>";
  $message .= "<tr><td><strong>Seasonal:</strong> </td><td>" . strip_tags($scheduleNum4) . "</td></tr>";
  $message .= "<tr><td><strong>On-Call:</strong> </td><td>" . strip_tags($scheduleNum5) . "</td></tr>";
  /*$message .= "<tr style='background: #eee;'><td><strong>Date Expected:</strong> </td><td>". strip_tags($expiMonth) ."/"
  . strip_tags($expiDay) ."/" . strip_tags($expiYear) . "</tr>";*/

  //page 2 email data
  $message .= "<tr><td><strong>Driver's License State/License #:</strong> </td><td>" . strip_tags($driversL) . "</td></tr>";
  $message .= "<tr><td><strong>Driver's License Expiration Date:</strong> </td><td>" . strip_tags($driversEXP) . "</td></tr>";
  $message .= "<tr><td><strong>CDL State License #:</strong> </td><td>" . strip_tags($cdlNum) . "</td></tr>";
  $message .= "<tr><td><strong>CDL Expiration Date:</strong> </td><td>" . strip_tags($cdlEXP) . "</td></tr>";
  $message .= "<tr><td><strong>Other License State/License #:</strong> </td><td>" . strip_tags($otherL) . "</td></tr>";
  $message .= "<tr><td><strong>Other Expiration Date:</strong> </td><td>" . strip_tags($otherEXP) . "</td></tr>";
  $message .= "<tr><td><strong>Languages Understood other than English:</strong> </td><td>" . strip_tags($lang) . "</td></tr>";
  $message .= "<tr><td><strong>Have you been convicted of a misdemeanor or felony within the past ten years?:
  </strong> </td><td>" . strip_tags($convictYN) . "</td></tr>";

  //page 3 email data

  //page 4 email data

  //page 5 email data
  $message .= "<tr><td><strong>Are you hispanic?:</strong> </td><td>" . strip_tags($hisYN) . "</td></tr>";
  $message .= "<tr><td><strong>Please indicate your gender:</strong> </td><td>" . strip_tags($genderMF) . "</td></tr>";
  if($raceNum1 == "American Indian")
    $message .= "<tr><td><strong>What race or culture do you consider yourself?:</strong> </td><td>" . strip_tags($raceNum1) . "</td></tr>";
  if($raceNum2 == "Alaskan Native")
    $message .= "<tr><td><strong>What race or culture do you consider yourself?:</strong> </td><td>" . strip_tags($raceNum2) . "</td></tr>";
  if($raceNum3 == "Native Hawaiin or Other Pacific Islander")
    $message .= "<tr><td><strong>What race or culture do you consider yourself?:</strong> </td><td>" . strip_tags($raceNum3) . "</td></tr>";
  if($raceNum4 == "Asian")
    $message .= "<tr><td><strong>What race or culture do you consider yourself?:</strong> </td><td>" . strip_tags($raceNum4) . "</td></tr>";
  if($raceNum5 == "Black/African American")
    $message .= "<tr><td><strong>What race or culture do you consider yourself?:</strong> </td><td>" . strip_tags($raceNum5) . "</td></tr>";
  if($raceNum6 == "White/Caucasian")
    $message .= "<tr><td><strong>What race or culture do you consider yourself?:</strong> </td><td>" . strip_tags($raceNum6) . "</td></tr>";
  if($raceNum7 == "Other")
    $message .= "<tr><td><strong>What race or culture do you consider yourself?:</strong> </td><td>" . strip_tags($raceNum7) . "</td></tr>";
  $message .= "<tr><td><strong>Have you ever been on active duty in the US Armed Forces?:</strong> </td><td>" . strip_tags($activeYN) . "</td></tr>";
  $message .= "<tr><td><strong>Do you have a long term condition?:</strong> </td><td>" . strip_tags($conditionYN) . "</td></tr>";

  //page 6 email data



  $message .= "</table>";
  $message .= "</body></html>";

  $result = $mailer->send($recipients, $headers, $message); // Send the message

  // Print error message if failed
  if (PEAR::isError($result)) {
    $error = 'Error sending email: ' . $result->getMessage();
    echo htmlspecialchars($error);
  }

/*	//begin database inserts

	//Inserting into "root table"
	$select = "insert into pinfo
	(Position, RecruitNumber, FirstName) values
	('".$poS."', '".$recNum."', '".$firstN."')";

	//Inserting into one-to-one table -- Uses "LAST_INSERT_ID() to do so"
	$select2 = "insert into binfo
	(ApplicationID, LicenseNumber, LicenseExp, CdlNumber, CdlExp) values
	(LAST_INSERT_ID(), '".$driversL."', '".$driversEXP."', '".$cdlNum."', '".$cdlEXP."')";

	//CODE ONLY INSERTS LAST ROW --EDUCATION 5
	foreach( $eduPerson as $key => $n){
		//print_r ($n);
		$select3 = "insert into eduinfo
		(ApplicationID, SchoolInfo) values
		(LAST_INSERT_ID(), '".$n['schoonameandloc']."')";
	}*/

	/*for($i=2;$i<5;$i++){
		$select3 = "insert into eduinfo
		(ApplicationID, SchoolInfo) values
		(LAST_INSERT_ID(), '".$eduPerson[$i]['schoonameandloc']."')";
	}
	$i = 0;
	$select3 = "insert into eduinfo
	(ApplicationID, SchoolInfo) values
	(LAST_INSERT_ID(), '".$eduPerson[$i]['schoonameandloc']."')";

	//queries for inserts
	$sql=mysql_query($select);
	$sql=mysql_query($select2);
	$sql=mysql_query($select3);

	mysql_close();	*/
}

} // end else captcha
?>
