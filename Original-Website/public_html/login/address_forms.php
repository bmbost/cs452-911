<!-- Created by Athens State University CS452 Senior Project -->
<!-- Members: Mallory Patterson, Brandon Bost, Jordan Hopkins, Keith Robinson -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Address Form Submission Management</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/business-casual.css" rel="stylesheet">

     <!-- Fonts -->


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

</head>

<body>




    <div class="container">

        <div class="row">
            <div class="bannerBox">
                <div class="col-lg-12 text-center">  <!--size of banner-->
                        <!-- Indicators -->


                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-wide" src="../img/Banner2.png" alt="">
                            </div>

                        </div>


                    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">Athens/Limestone County 911 Center</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="Div1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="GIS.html">GIS</a>
                    </li>
                    <li>
                        <a href="addressing.html">Addressing</a>
                    </li>
                    <li><a href="smart911.html">Smart 911</a></li>
                    <li>
                        <a href="links.html">Links</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="box">
                <div class="col-lg-12"> <!--text for welcome-->
                  <h2>Address Forms:</h2>
                    <?php
                    require('../php/connect_db.php'); // Connect to the database

                    // If page is first loaded, or OK button from Delete / Display page is selected,
                    // or if the Refresh button is selected, display the initial set of database entries to choose from
                    if ((isset($_POST['submit']) == NULL) || ($_POST['submit'] == "Ok") || ($_POST['submit'] == 'Refresh')) {
                      // Query the database for any entries
                      $query = "SELECT id, requestor, request_date
                                FROM address_form";

                      $db = mysqli_query($dbhandle, $query);

                      if (mysqli_num_rows($db) > 0) { // If there is at least one entry, display data
                        echo '<form method="post" action="address_forms.php">';
                        foreach($db as $line) {
                          echo '<input type="radio" name="selection" value=\'' . $line['id'] . '\']> ' . $line['requestor'] . ' --- ' . $line['request_date'] . '</input><br>';
                        }
                        echo '<br />
                              <input type="submit" name="submit" value="Select" />
                              <input type="submit" name="submit" value="Delete" />
                              <input type="submit" name="submit" value="Refresh" />
                              <a href="index.html">Back</a>
                              </form>';
                      } else { // If no entries are found, display message and refresh button.
                        echo "<p>There are currently no address requests submitted.</p>";
                        echo '<form method="post" action="address_forms.php">
                                <input type="submit" name="submit" value="Refresh" />
                              </form>';
                      }

                      mysqli_close($dbhandle);
                    }

                    // If the Select button from the main page is clicked, display the data for that specific entry
                    else if ($_POST['submit'] == 'Select') {
                      $query = "SELECT *
                                FROM address_form
                                WHERE id = " . $_POST['selection'];

                      $db = mysqli_query($dbhandle, $query);

                      // If it finds the data requested, fetch that line and display the data.
                      if (mysqli_num_rows($db) == 1) {
                        $result = mysqli_fetch_array($db);
                        echo '<p>Date of request: <b>' . $result['request_date'] . '</b><br />
                                 Requestor Name: <b>' . $result['requestor'] . '</b><br />
                                 Requestor Phone #1: <b>' . $result['requestor_phone1'] . '</b><br />
                                 Requestor Phone #2: <b>' . $result['requestor_phone2'] . '</b><br />
                                 Is the requestor the resident?: <b>' . $result['residency'] . '</b><br />
                                 <br />
                                 Resident Name: <b>' . $result['resident'] . '</b><br />
                                 Resident Phone #1: <b>' . $result['resident_phone1'] . '</b><br />
                                 Resident Phone #2: <b>' . $result['resident_phone2'] . '</b><br />
                                 <br />
                                 Structure Type: <b>' . $result['structure_type'] . '</b><br />
                                 Structure Details:</p>
                                 <p style="text-indent: 20px"><b>' . $result['structure_details'] . '</b></p>
                                 <p>North of Address #: <b>' . $result['north_add_num'] . '</b><br />
                                 South of Address #: <b>' . $result['south_add_num'] . '</b><br />
                                 East of Address #: <b>' . $result['east_add_num'] . '</b><br />
                                 West of Address #: <b>' . $result['west_add_num'] . '</b><br />
                                 Markers:</p>
                                 <p style="text-indent: 20px"><b>' . $result['markers'] . '</b></p>
                                 <p>Others:</p>
                                 <p style="text-indent: 20px"><b>' . $result['others'] . '</b></p>
                                 <p>Road Street Name: <b>' . $result['road_street'] . '</b></p>
                              <form method="post" action="address_forms.php">
                                <input type="submit" name="submit" value="Ok" />
                              </form>';
                      }
                    }

                    // If the Delete button is selected, delete the entry that was selected.
                    else if ($_POST['submit'] == 'Delete') {
                      $query = "DELETE FROM address_form
                                WHERE id = " . $_POST['selection'];

                      $deleted_rows = mysqli_query($dbhandle, $query);
                      if ($deleted_rows == 1) {
                        echo '<p>The selected entry has been deleted.</p>
                              <form method="post" action="address_forms.php">
                                <input type="submit" name="submit" value="Ok" />
                              </form>';
                      } else {
                        echo '<p>An error has occurred. Please check the database to make sure nothing has been deleted.</p>
                              <form method="post" action="address_forms.php">
                                <input type="submit" name="submit" value="Ok" />
                              </form>';
                      }

                      mysqli_close($dbhandle);
                    }

                    ?>
                </div>
            </div>
        </div>



    </div>








    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>1250 W. Elm St.| P.O. Box 1111 Athens, AL 35612 | (256) 230-0911
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
