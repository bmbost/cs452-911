<?php
require('connect_db.php');

if (isset($_POST['dateofreq'])) { // If date is entered,
  $date = $_POST['dateofreq']; // store date provided in form.
}

if (isset($_POST['requestor'])) { // If name is entered,
  $name = htmlentities($_POST['requestor'], ENT_QUOTES); // cleanse data and store in $name.
}

if (isset($_POST['reqphone1'])) {// If phone # 1 is entered,
  $phone1 = htmlentities($_POST['reqphone1'], ENT_QUOTES); // cleanse data and store in $phone1.
}

if (isset($_POST['reqphone2'])) { // If phone # 2 is entered,
  $phone2 = htmlentities($_POST['reqphone2'], ENT_QUOTES); // cleanse data and store in $phone2.
}

if (isset($_POST['reqisresYN'])) { // If the checkbox for residency is marked,
  $residency = $_POST['reqisresYN']; // Stores the state of the residency checkmark box.
} else { // Else if the checkbox was not marked,
  $residency = 'N'; // Place N for No into the variable.
}

if ($residency == 'N') {
  if (isset($_POST['resident'])) { // Check if name for resident was entered,
    $resident = htmlentities($_POST['resident'], ENT_QUOTES); // cleanse data and store in $resident.
  }

  if (isset($_POST['resphone1'])) { // If resident phone # 1 is entered,
    $resphone1 = htmlentities($_POST['resphone1'], ENT_QUOTES); // cleanse data and store in $resphone1.
  }

  if (isset($_POST['resphone2'])) { // If resident phone #2 is entered,
    $resphone2 = htmlentities($_POST['resphone2'], ENT_QUOTES); // cleanse data and store in $resphone2.
  }
}
else {
  $resident = $name;
  $resphone1 = $phone1;
  $resphone2 = $phone2;
}

if (isset($_POST['structype'])) { // If the structure type is selected,
  $structure = $_POST['structype']; // store the type of structure in $structure.
}

if (isset($_POST['strucdetails'])) { // If data was entered for the structure details,
  $details = htmlentities($_POST['strucdetails'], ENT_QUOTES); // cleanse data and store in $details.
}

if (isset($_POST['northadd'])) { // Check for north of address number,
  $northadd = htmlentities($_POST['northadd'], ENT_QUOTES); // cleanse data and store in $northadd.
}

if (isset($_POST['southadd'])) { // Check for south of address number,
  $southadd = htmlentities($_POST['southadd'], ENT_QUOTES); // cleanse data and store in $southadd.
}

if (isset($_POST['eastadd'])) { // Check for east of address number,
  $eastadd = htmlentities($_POST['eastadd'], ENT_QUOTES); // cleanse data and store in $eastadd.
}

if (isset($_POST['westadd'])) { // Check for west of address number,
  $westadd = htmlentities($_POST['westadd'], ENT_QUOTES); // cleanse data and store in $westadd.
}

if (isset($_POST['markers'])) { // If data was entered for the markers textarea,
  $markers = htmlentities($_POST['markers'], ENT_QUOTES); // cleanse data and store in $markers.
}

if (isset($_POST['others'])) { // If data was entered for the others textarea,
  $others = htmlentities($_POST['others'], ENT_QUOTES); // cleanse data and store in $others
}

if (isset($_POST['expdate'])) { // If expiration date is entered,
  $expdate = $_POST['expdate']; // store in $expdate.
}

if (isset($_POST['roadstreet'])) { // If Road-Street is entered,
  $roadstreet = htmlentities($_POST['roadstreet'], ENT_QUOTES); // cleanse data and store in $roadstreet.
}

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

mysqli_close($dbhandle);
?>
