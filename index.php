<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/jumbotron-narrow.css">
        <style>
            .thumbnail {
                padding:0;
            }
            .error{ color: #c00;}
        </style>
    </head>


<?php  
$host = "127.0.0.1";
$user = "root";
$pass = "";
$db = "meetingsched";

$connection = mysqli_connect($host, $user, $pass, $db);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$q = "select * from meetings";
$result = mysqli_query($connection, $q);


?>
    <body>
            <div class="container">

            <form>
              <div class="jumbotron">
                <h1>Meet With Duncan</h1>
                <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>

                

                <div id="regform">
                    <small>All fields are required.</small>
                      <div class="form-group">

                        <label for="firstname" class="pull-left" id="firstnamelabel">First Name</label>
                        <input type="text" class="form-control" id="firstname" placeholder="First Name">
                        <br />
                        <label for="lastname" class="pull-left" id="lastnamelabel">Last Name</label>
                        <input type="text" class="form-control" id="lastname" placeholder="Last Name">
                        <br />
                        <label for="department" class="pull-left" id="departmentlabel">Department</label>
                        <input type="text" class="form-control" id="department" placeholder="Department">
                        <br />
                        <label for="email" class="pull-left" id="emaillabel">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Email">
                      </div>

                 </div>
              </div>

              <div class="row marketing">

                <div class="row" id="meetingtimes">
                <center>
                <h2 id="meetingheader">Select a Time</h2>
                </center>
                <?php
                while($row = $result->fetch_assoc()){
                ?>
                    <div class="col-sm-4">
                        <div class="thumbnail">
                            <div class="caption">
                                <center>
                                    <?php
                                    if( $row['seats'] <= 0) {
                                    ?>
                                    <h2>FULL</h2>
                                    <?php } else { ?>
                                    <h2><?=$row['seats']?> seats</h2>
                                    <?php
                                    }
                                    ?>
                                    
                                    <h4 class=""><?=$row['meeting_date']?> <br /><?=$row['meeting_time']?></h4>
                                    <p class=""><?=$row['meeting_location']?></p> 
                                    
                                    <?php
                                    if( $row['seats'] <= 0) {
                                    ?>
                                    <p>&nbsp;</p>
                                    <?php } else { ?>
                                    <p><input type="radio" name="optionsMeeting" value="<?=$row['id']?>"> &nbsp; Select this meeting</p>
                                    <?php
                                    }
                                    ?>
                                    
                                </center>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                                                  

                </div>                                


              </div>


              <p><a id="submit" class="btn btn-lg btn-success" href="#" role="button">Send Registration</a></p> 
              
            </div>


        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/send.js"></script>
    </body>

</html>