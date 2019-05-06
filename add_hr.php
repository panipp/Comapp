<?php
	include 'connect.php';
	
	if (!$_SESSION['hr_loggedin']){
		echo "<script language='javascript'> alert('กรุณาเข้าสู่ระบบก่อน');window.location='login.php';</script>";
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Member</title>
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
                </ul>
            </nav>

            <div class="colorlib-footer">
            </div>

        </aside>
        <div id="colorlib-main">
            <div class="colorlib-work">
				<form method="POST">
					<div class="container-fluid">
						<fieldset>
							<legend>Employee profile form</legend>
							<div class="form-group">
								<label class="col control-label" for="id">Employee ID</label>
								<div class="col">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-briefcase"></i>
										</div>
										<input id="empID" name="empID" type="text" placeholder="Employee ID" class="form-control input-md">
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
										<input id="Firstname" name="Firstname" type="text" placeholder="Firstname" class="form-control input-md">
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
										<input id="Lastname" name="Lastname" type="text" placeholder="Lastname" class="form-control input-md">
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
										<input id="Citizen" name="Citizen" type="text" placeholder="Citizen ID" class="form-control input-md">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col control-label" for="Gender">Gender</label>
								<div class="col">
									<label class="radio-inline" for="Gender-0">
										<input type="radio" name="Gender" id="Gender-0" value="Male" checked="checked">
										Male
									</label>
									<label class="radio-inline" for="Gender-1">
										<input type="radio" name="Gender" id="Gender-1" value="Female">
										Female
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col control-label" for="dep">Department</label>
								<div class="col">
									<label class="radio-inline" for="d-0">
										<input type="radio" name="dep" id="d-0" value="Normal" checked="checked">
										Normal
									</label>
									<label class="radio-inline" for="d-1">
										<input type="radio" name="dep" id="d-1" value="HR">
										HR
									</label>
									<label class="radio-inline" for="d-0">
										<input type="radio" name="dep" id="d-0" value="Manager">
										Manager
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col control-label" for="Date Of Birth">Date Of Birth</label>
								<div class="col">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-birthday-cake"></i>
										</div>
										<input id="Date Of Birth" name="dob" type="text" placeholder="Date Of Birth(YYYY-MM-DD)" class="form-control input-md">
									</div>
								</div>
							</div>


							<div class="form-group">
								<label class="col control-label" for="radios">Marital Status:</label>
								<div class="col">
									<label class="radio-inline" for="radios-0">
										<input type="radio" name="status" id="radios-0" value="Married" checked="checked">
										Married
									</label>
									<label class="radio-inline" for="radios-1">
										<input type="radio" name="status" id="radios-1" value="Unmarried">
										Unmarried
									</label>
								</div>
							</div>

							<div class="form-group">
								<label class="col control-label" for="Skills">Graduation</label>
								<div class="col">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-graduation-cap"></i>
										</div>
										<input id="grad" name="grad" type="text" placeholder="Graduate" class="form-control input-md">
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
										<input id="Phone number " name="Phonenumber" type="text" placeholder="Tel." class="form-control input-md">
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
										<input id="Email Address" name="Email" type="text" placeholder="Email Address" class="form-control input-md">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col control-label" for="Address">Address</label>
								<div class="col">
									<textarea class="form-control" rows="10" id="Address" name="Address" placeholder="Address (max 200 words)"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col control-label" for="area">Working area</label>
								<div class="col">
									<label class="radio-inline" for="area-0">
										<input type="radio" name="area" id="area-0" value="Central" checked="checked">
										Central
									</label>
									<label class="radio-inline" for="area-1">
										<input type="radio" name="area" id="area-1" value="Northern">
										Northern
									</label>
									<label class="radio-inline" for="area-2">
										<input type="radio" name="area" id="area-2" value="Northeastern">
										Northeastern
									</label>
									<label class="radio-inline" for="area-3">
										<input type="radio" name="area" id="area-3" value="Southern">
										Southern
									</label>
									<label class="radio-inline" for="area-4">
										<input type="radio" name="area" id="area-4" value="Eastern">
										Eastern
									</label>
									<label class="radio-inline" for="area-5">
										<input type="radio" name="area" id="area-5" value="Western">
										Western
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col control-label"></label>
								<div class="col">
									<button class="btn btn-success" name="submitHR"><span class="glyphicon glyphicon-thumbs-up"></span>Submit</button>
								</div>
							</div>
						</fieldset>
					</div>
				</form>
            </div>
        </div>
    </div>
    <script src="js/main.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
</body>
</html>
