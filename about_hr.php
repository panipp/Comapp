<?php
	include 'connect.php';
	session_start();
	if (!$_SESSION['hr_loggedin']){
		echo "<script language='javascript'> alert('กรุณาเข้าสู่ระบบก่อน');window.location='login.php';</script>";

}
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>About</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="colorlib-page">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        <aside id="colorlib-aside" role="complementary" class="border js-fullheight">
            <h1 id="colorlib-logo"><a href="add_hr.php"><span>Wo</span><span>rk</span></a></h1>
            <nav id="colorlib-main-menu" role="navigation">
                <ul>
                    <li><a href="add_hr.php">Add Emp.</a></li>
                    <li><a href="about_hr.php">About</a></li>
                    <li><a href="news_hr.php">News</a></li>
                    <li><a href="search_hr.php">Search</a></li>
                    <li><a href="login.php">Logout</a></li>
                </ul>
            </nav>
            <div class="colorlib-footer">
            </div>
        </aside>
        <div id="colorlib-main">
            <div class="colorlib-work">
                <div class="container-fluid">
                    <fieldset>
                        <legend>About Me</legend>
                        <div class="form-group">

                            <label class="col control-label" for="id">Employee ID</label>
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-briefcase"></i>
                                    </div>
                                    <input id="id" name="id" type="text" placeholder="<?php echo''.$_SESSION["loginHR"].'';?>" class="form-control input-md" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col control-label" for="Firstname">Firstname</label>
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user">
                                        </i>
                                    </div>
                                    <input id="Firstname" name="Firstname" type="text" placeholder="<?php echo''.$_SESSION["hrFirstname"].'';?>" class="form-control input-md" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col control-label" for="Lastname">Lastname</label>
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user">
                                        </i>
                                    </div>
                                    <input id="Lastname" name="Lastname" type="text" placeholder="<?php echo''.$_SESSION["hrLastname"].'';?>" class="form-control input-md" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col control-label" for="Citizen">Citizen ID</label>
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-sticky-note-o"></i>
                                    </div>
                                    <input id="Citizen" name="Citizen" type="text" placeholder="<?php echo''.$_SESSION['hrCitizenID'].'';?>" class="form-control input-md" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col control-label" for="Gender">Gender: <?php echo''.$_SESSION['hrGender'].'';?></label>

                        </div>
                        <div class="form-group">
                            <label class="col control-label" for="dep">Department: HR</label>

                        </div>
                        <div class="form-group">
                            <label class="col control-label" for="Date Of Birth">Date Of Birth</label>
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-birthday-cake"></i>
                                    </div>
                                    <input id="Date Of Birth" name="Date Of Birth" type="text" placeholder="<?php echo''.$_SESSION["hrDob"].'';?>" class="form-control input-md" disabled>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col control-label" for="radios">Marital Status: <?php echo''.$_SESSION['hrStatus'].'';?></label>

                        </div>

                        <div class="form-group">
                            <label class="col control-label" for="Skills">Graduation</label>
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-graduation-cap"></i>
                                    </div>
                                    <input id="grad" name="grad" type="text" placeholder="<?php echo''.$_SESSION['hrGraduate'].'';?>" class="form-control input-md" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col control-label" for="Phone number ">Phone number </label>
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input id="Phone number " name="Phone number " type="text" placeholder="<?php echo''.$_SESSION['hrPhone'].'';?>" class="form-control input-md" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col control-label" for="Email Address">Email Address</label>
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <input id="Email Address" name="Email Address" type="text" placeholder="<?php echo''.$_SESSION['hrEmail'].'';?>" class="form-control input-md" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col control-label" for="Address">Address</label>
                            <div class="col">
                                <textarea class="form-control" rows="10" id="Address" name="Address" disabled><?php echo''.$_SESSION['hrAddress'].'';?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col control-label" for="area">Working area: <?php echo''.$_SESSION['hrArea'].'';?></label>

                        </div>
                        <!--ข้อมูลญาติ-->

                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    <script src="js/main.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
</body>
</html>
