<?php
ini_set("include_path", '/home/athens911/php:' . ini_get("include_path") );

// Check reCAPTCHA to see if it is valid, then execute code if it is.
// Parts of code obtained from codeforgeek.com tutorial (https://www.codeforgeek.com/2014/12/google-recaptcha-tutorial/)
if (isset($_POST['g-recaptcha-response'])) { $captcha = $_POST['g-recaptcha-response']; }

if (!$captcha) {
  echo "<p>You must verify your identity with the reCAPTCHA. Press the Back button to continue.</p>";
  exit();
}

// Set up variables with secret key, ip address, and response.
$secret = "6LfoNR4TAAAAAEnCW4z91WSqBzMFdBzad6VXKwPY";
$ip = $_SERVER['REMOTE_ADDR'];
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
$responseKeys = json_decode($response, true);

// If response is false, display error. Otherwise, complete code.
if (intval($responseKeys["success"]) !== 1) {
  echo "<h1>The CAPTCHA could not verify that you are not a spambot.</h1>";

} else {


	//Initializing part 1 of form
	$appDate = $poS = $recNum = $firstN = $middleIN = $lastN = $dateOf = $mAddr = $eAddr =
	$homeP = $cityNum = $countyNum = $stateNum = $zipcdNum = $workphoneNum = $radio1 = $agName = $radio2 = $radio3 =
	$shiftNum1 = $shiftNum2 = $shiftNum3 = $shiftNum4 = $scheduleNum1 = $scheduleNum2 = $scheduleNum3 = $scheduleNum4 =
	$scheduleNum5 = $convictYN = $hisYN = $genderMF = $raceNum1 = $raceNum2 = $raceNum3 = $raceNum4 = $raceNum5 = $raceNum6 = $raceNum7 =
	$activeYN = $conditionYN = " ";

	//Initiazling part 2 of form
	$driversL = $driversEXP = $cdlNum = $cdlEXP = $otherL = $otherEXP = $lang = $convictYN = " ";

	//Initiazling part 3 of form
	$maxEdu = $highSchool = $nameloc = $eduStart = $eduEnd = $eduCredits = $eduMajor = $eduDegree = $eduDegYear = " ";

	//Initiazling part 4 of form
	$maxEmp = $employmenthist = $maxEmp = $empName = $empAddr = $empPhone = $empTitle = $empStartMY = $empEndMY = $empTotalmths = $empAvghrs = $empLastsalary = $empSupervisor =
	$empReasonforleaving = $empVolunteerhrs = $empSupervised = $empDuties = " ";

	//Initiazling part 5 of form
	$hisYN = $genderMF = $raceNum1 = $raceNum2 = $raceNum3 = $raceNum4 = $raceNum5 = $raceNum6 = $raceNum7 = $activeYN = $actFrom = $actTo =
	$vietVet = $repVietYN = $repFrom = $repTo = $disVet = $perDis = $conditionYN = " ";

	//Initiazling part 6 of form
	$servAF = $servFromAF = $servToAF = $disc1 = $medRec = $milBen = $spouseDis =
	$spouseDisPer = $spouseSur = $spouseMed = " ";

/*
	//Initiazize page 1 HTML variables to PHP POST
	//Connecting to database
	mysql_connect("localhost", "root", "");
	mysql_select_db("jobapptestjh");
*/
	//Initiazize page 1 HTML variables to PHP POST
	$appDate = $_POST['applicationdate'];
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
	$agName = $_POST['agencyname'];

	if(!empty($_POST['stemployYN'])) {
        $radio1=$_POST['stemployYN'];
		$agName=$_POST['agencyname'];
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
	if(!empty($_POST['highschoolGEDYN'])) {
        $highSchool=$_POST['highschoolGEDYN'];
    }
	$educationhist = $_POST["edu"];
	$maxEdu = $_POST["numEducation"];

	//Initiazize page 4 HTML variables to PHP POST
	$employmenthist = $_POST["emp"];
	$maxEmp = $_POST["numEmployers"];

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

		if($activeYN == "yes"){
				$actFrom=$_POST['actdutyfromdate'];
				$actTo=$_POST['actdutytodate'];
				if(!empty($_POST['vietnamvetTF'])) {
					$vietVet=$_POST['vietnamvetTF'];
					if($vietVet == "on"){
						$vietVet = "Yes";
						if(!empty($_POST['repubofvietnamYN'])) {
							$repVietYN=$_POST['repubofvietnamYN'];
							if($repVietYN == "Yes"){
								$repFrom=$_POST['vietnamfromdate'];
								$repTo=$_POST['vietnamtodate'];
							}
						}
					}
				}
				if(!empty($_POST['disabledvetTF'])) {
					$disVet=$_POST['disabledvetTF'];
					if($disVet == "on"){
						$disVet = "Yes";
						$perDis=$_POST['pdisablednum'];
					}
				}
		}
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
	if(!empty($_POST['honoractdutyYN'])) {
        $servAF=$_POST['honoractdutyYN'];
		if($servAF == "yes"){
			$servFromAF=$_POST['honoractdutyfromdate'];
			$servToAF=$_POST['honoractdutytodate'];

			if(!empty($_POST['typeofdischarge'])) {
				$disc1=$_POST['typeofdischarge'];
			}
			$medRec=$_POST['medals'];
		}
    }
	if(!empty($_POST['militarybenefitYN'])) {
        $milBen=$_POST['militarybenefitYN'];
        }
	if(!empty($_POST['actdutyspouseYN'])) {
        $spouseDis=$_POST['actdutyspouseYN'];
		if($spouseDis == "yes"){
			$spouseDisPer = $_POST['pspousedisablednum'];
		}
    }
	if(!empty($_POST['survivingspouseYN'])) {
        $spouseSur=$_POST['survivingspouseYN'];
		if($spouseSur == "yes"){
			$spouseMed = $_POST['spousemedals'];
		}
    }
		//begin email

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
    $headers['To'] = 'brandon@alc911.org';
    $headers['Subject'] = $firstN . ' ' . $lastN . ' Job Application Submission';
    $headers['Content-type'] = 'text/html';

    $recipients = 'brandon@alc911.org';

		//the message body of the email that contains all the table html info
		//page 1 email data
		$message = '<html><body>';
		$message .= '<h1>Job Application for ' . $firstN . ' ' . $lastN . '</h1><br><br>';
		$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
		$message .= "<tr><td><strong>Date of Application:</strong> </td><td>" . strip_tags($appDate) . "</td></tr>";
		$message .= "<tr><td><strong>Position (Job Title):</strong> </td><td>" . strip_tags($poS) . "</td></tr>";
		$message .= "<tr><td><strong>Recruitment Announcement #:</strong> </td><td>" . strip_tags($recNum) . "</td></tr>";
		$message .= "<tr><td><strong>First Name:</strong> </td><td>" . strip_tags($firstN) . "</td></tr>";
		$message .= "<tr><td><strong>Middle Initial:</strong> </td><td>" . strip_tags($middleIN) . "</td></tr>";
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

		if($radio1 == "yes"){
			$message .= "<tr><td><strong>Agency Name:</strong> </td><td>" . strip_tags($agName) . "</td></tr>";
		}

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
		$message .= "<tr><td><strong>Did you graduate from high school or passed the GED?</strong> </td><td>" . strip_tags($highSchool) . "</td></tr>";
		for($i = 1; $i <= $maxEdu; $i++){
			$nameloc = $educationhist[$i]["schoonameandloc"];
			$eduStart = $educationhist[$i]["schoolstartMY"];
			$eduEnd = $educationhist[$i]["schoolendMY"];
			$eduCredits = $educationhist[$i]["credits"];
			$eduMajor = $educationhist[$i]["major"];
			$eduDegree = $educationhist[$i]["degreetype"];
			$eduDegYear = $educationhist[$i]["degreeyear"];
			$message .= "<tr><td><strong>Education $i:</strong> </td><td></td></tr>";
			$message .= "<tr><td><strong>School Name and Location:</strong> </td><td>" . strip_tags($nameloc) . "</td></tr>";
			$message .= "<tr><td><strong>Month/Year Started:</strong> </td><td>" . strip_tags($eduStart) . "</td></tr>";
			$message .= "<tr><td><strong>Month/Year Finished:</strong> </td><td>" . strip_tags($eduEnd) . "</td></tr>";
			$message .= "<tr><td><strong>Credits Earned:</strong> </td><td>" . strip_tags($eduCredits) . "</td></tr>";
			$message .= "<tr><td><strong>Major:</strong> </td><td>" . strip_tags($eduMajor) . "</td></tr>";
			$message .= "<tr><td><strong>Type of Degree Awarded:</strong> </td><td>" . strip_tags($eduDegree) . "</td></tr>";
			$message .= "<tr><td><strong>Type of Degree Received:</strong> </td><td>" . strip_tags($eduDegYear) . "</td></tr>";
		}

		//page 4 email data
		for($i = 1; $i <= $maxEmp; $i++){
			$empName = $employmenthist[$i]["empname"];
			$empAddr = $employmenthist[$i]["empaddr"];
			$empPhone = $employmenthist[$i]["empphone"];
			$empTitle = $employmenthist[$i]["emptitle"];
			$empStartMY = $employmenthist[$i]["empstartMY"];
			$empEndMY = $employmenthist[$i]["empendMY"];
			$empTotalmths = $employmenthist[$i]["emptotalmths"];
			$empAvghrs = $employmenthist[$i]["empavghrs"];
			$empLastsalary = $employmenthist[$i]["emplastsalary"];
			$empSupervisor = $employmenthist[$i]["empsupervisor"];
			$empReasonforleaving = $employmenthist[$i]["empreasonforleaving"];
			$empVolunteerhrs = $employmenthist[$i]["empvolunteerhrs"];
			$empSupervised = $employmenthist[$i]["empsupervised"];
			$empDuties = $employmenthist[$i]["empduties"];

			$message .= "<tr><td><strong>Employer $i:</strong> </td><td></td></tr>";
			$message .= "<tr><td><strong>Present or Last Employer:</strong> </td><td>" . strip_tags($empName) . "</td></tr>";
			$message .= "<tr><td><strong>Employer Address:</strong> </td><td>" . strip_tags($empAddr) . "</td></tr>";
			$message .= "<tr><td><strong>Employer Phone:</strong> </td><td>" . strip_tags($empPhone) . "</td></tr>";
			$message .= "<tr><td><strong>Job Title:</strong> </td><td>" . strip_tags($empTitle) . "</td></tr>";
			$message .= "<tr><td><strong>Start Month/Year:</strong> </td><td>" . strip_tags($empStartMY) . "</td></tr>";
			$message .= "<tr><td><strong>End Month/Year:</strong> </td><td>" . strip_tags($empEndMY) . "</td></tr>";
			$message .= "<tr><td><strong>Total Months:</strong> </td><td>" . strip_tags($empTotalmths) . "</td></tr>";
			$message .= "<tr><td><strong>Average Hours a Week:</strong> </td><td>" . strip_tags($empAvghrs) . "</td></tr>";
			$message .= "<tr><td><strong>Last Salary:</strong> </td><td>" . strip_tags($empLastsalary) . "</td></tr>";
			$message .= "<tr><td><strong>Name of Supervisor:</strong> </td><td>" . strip_tags($empSupervisor) . "</td></tr>";
			$message .= "<tr><td><strong>Reason for Leaving:</strong> </td><td>" . strip_tags($empReasonforleaving) . "</td></tr>";
			$message .= "<tr><td><strong>Number of Volunteer Hours:</strong> </td><td>" . strip_tags($empVolunteerhrs) . "</td></tr>";
			$message .= "<tr><td><strong>Number of Employees Supervised:</strong> </td><td>" . strip_tags($empSupervised) . "</td></tr>";
			$message .= "<tr><td><strong>Specific Duties:</strong> </td><td>" . strip_tags($empDuties) . "</td></tr>";
		}

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
		if($activeYN == "yes"){
			$message .= "<tr><td><strong>Active From:</strong> </td><td>" . strip_tags($actFrom) . "</td></tr>";
			$message .= "<tr><td><strong>Active To:</strong> </td><td>" . strip_tags($actTo) . "</td></tr>";
			if($vietVet == "Yes"){
				$message .= "<tr><td><strong>Are you a veteran from the Vietnam Era?</strong> </td><td>" . strip_tags($vietVet) . "</td></tr>";
				$message .= "<tr><td><strong>Did you serve in the Republic of Vietnam?</strong> </td><td>" . strip_tags($repVietYN) . "</td></tr>";
				if($repVietYN == "Yes"){
					$message .= "<tr><td><strong>Served From:</strong> </td><td>" . strip_tags($repFrom) . "</td></tr>";
					$message .= "<tr><td><strong>Served To:</strong> </td><td>" . strip_tags($repTo) . "</td></tr>";
				}
			}
			if($disVet == "Yes"){
				$message .= "<tr><td><strong>Are you a disabled veteran?</strong> </td><td>" . strip_tags($disVet) . "</td></tr>";
				$message .= "<tr><td><strong>Percentage of Disability:</strong> </td><td>" . strip_tags($perDis) . "</td></tr>";
			}
		}
		$message .= "<tr><td><strong>Do you have a long term condition?:</strong> </td><td>" . strip_tags($conditionYN) . "</td></tr>";

		//page 6 email data
		$message .= "<tr><td><strong>Have you served honorably in the Armed Forced of the United States on active duty for reasons other
		than Active Duty Training (ADT)?:</strong> </td><td>" . strip_tags($servAF) . "</td></tr>";
		if($servAF == "yes"){
			$message .= "<tr><td><strong>Served From:</strong> </td><td>" . strip_tags($servFromAF) . "</td></tr>";
			$message .= "<tr><td><strong>Served To:</strong> </td><td>" . strip_tags($servToAF) . "</td></tr>";
			$message .= "<tr><td><strong>Type of Discharge:</strong> </td><td>" . strip_tags($disc1) . "</td></tr>";
			$message .= "<tr><td><strong>Medals Received:</strong> </td><td>" . strip_tags($medRec) . "</td></tr>";
		}
		$message .= "<tr><td><strong>Are you receiving a monthly military retirement benefit?</strong> </td><td>" . strip_tags($milBen) . "</td></tr>";
		$message .= "<tr><td><strong>Are you the spouse of an honorably discharged veteran who has a service connected permanent or total disability?
		</strong> </td><td>" . strip_tags($spouseDis) . "</td></tr>";
		if($spouseDis == "yes"){
			$message .= "<tr><td><strong>Percentage of Spouse's Disability:</strong> </td><td>" . strip_tags($spouseDisPer) . "</td></tr>";
		}
		$message .= "<tr><td><strong>Are you the surviving spouse of a veteran who died from service related activities?
		</strong> </td><td>" . strip_tags($spouseSur) . "</td></tr>";
		if($spouseSur == "yes"){
			$message .= "<tr><td><strong>Medals Spouse Received:</strong> </td><td>" . strip_tags($spouseMed) . "</td></tr>";
		}
		$message .= "</table>";
		$message .= "</body></html>";

    $result = $mailer->send($recipients, $headers, $message); // Send the message

    // Print error message if failed
    if (PEAR::isError($result)) {
      $error = 'Error sending email: ' . $result->getMessage();
      echo htmlspecialchars($error);
    }

    echo "<br /><br /><br /><div class=\"textbox\">Thank you! We have received your employment application. You can expect to be notified of your application results about 3 weeks after the closing date.</div><br />";


	//begin database inserts

	/*//Inserting into "root table"
	$select = "insert into pinfo
	(Position, RecruitNumber, FirstName) values
	('".$poS."', '".$recNum."', '".$firstN."')";

	//Inserting into one-to-one table -- Uses "LAST_INSERT_ID() to do so"
	$select2 = "insert into binfo
	(ApplicationID, LicenseNumber, LicenseExp, CdlNumber, CdlExp) values
	(LAST_INSERT_ID(), '".$driversL."', '".$driversEXP."', '".$cdlNum."', '".$cdlEXP."')";

	//CODE ONLY INSERTS LAST ROW --EDUCATION 5
	/*foreach( $eduPerson as $key => $n){
		//print_r ($n);
		$select3 = "insert into eduinfo
		(ApplicationID, SchoolInfo) values
		(LAST_INSERT_ID(), '".$n['schoonameandloc']."')";
	}*/

	/*for($i=2;$i<5;$i++){
		$select3 = "insert into eduinfo
		(ApplicationID, SchoolInfo) values
		(LAST_INSERT_ID(), '".$eduPerson[$i]['schoonameandloc']."')";
	}*/
	/*$i = 0;
	$select3 = "insert into eduinfo
	(ApplicationID, SchoolInfo) values
	(LAST_INSERT_ID(), '".$eduPerson[$i]['schoonameandloc']."')";

	//queries for inserts
	$sql=mysql_query($select);
	$sql=mysql_query($select2);
	$sql=mysql_query($select3);

	mysql_close();
*/

} // end else for captcha
?>
