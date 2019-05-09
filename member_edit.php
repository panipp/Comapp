<?php
 	include 'connect.php';

		if (!$_SESSION['hr_loggedin']){
			echo "<script language='javascript'> alert('กรุณาเข้าสู่ระบบก่อน');window.location='login.php';</script>";
	}

	$empID = $_GET['employeeID'];
	$sql = "SELECT* FROM employee WHERE emp_id = '$empID'";
	$result = mysqli_query($db,$sql);
	if($row = mysqli_fetch_assoc($result)){
		$eID = $row['emp_id'];
		$cID = $row['citizenID'];
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$gender = $row['gender'];
		$dob = $row['birthday'];
		$status = $row['maritalstatus'];
		$graduate = $row['graduate'];
		$phone = $row['phonenumber'];
		$email = $row['email'];
		$address = $row['address'];
		$area = $row['workingarea'];
	}
	if(isset($_POST['update'])){
		$eID = $_POST['id'];
		$cID = $_POST['Citizen'];
		$firstname = $_POST['Firstname'];
		$lastname = $_POST['Lastname'];
		$gender = $_POST['Gender'];
		$dob = $_POST['date'];
		$status = $_POST['radios'];
		$graduate = $_POST['grad'];
		$phone = $_POST['phoneNum'];
		$email = $_POST['email'];
		$address = $_POST['Address'];
		$area = $_POST['area'];
		$department = $_POST['dep'];

		$sql = "UPDATE employee SET emp_id='$eID',citizenID='$cID',firstname ='$firstname',lastname ='$lastname',
		gender='$gender',birthday='$dob',maritalstatus='$status',graduate='$graduate',phonenumber='$phone',email='$email',
		address='$address',workingarea='$area'
		WHERE emp_id ='$empID'";
		mysqli_query($db,$sql);
		if($department=="Normal"){
			$sqlDep = "UPDATE staff SET dep_id = '20000',emp_id='eID' WHERE emp_id ='$empID'";
			mysqli_query($db,$sqlDep);
		}
		if($department=="HR"){
			$sqlDep = "UPDATE hr SET dep_id = '10000',emp_id='eID' WHERE emp_id ='$empID'";
			mysqli_query($db,$sqlDep);
		}
		if($department=="Manager"){
			$sqlDep = "UPDATE manager SET dep_id = '30000',emp_id='eID' WHERE emp_id ='$empID'";
			mysqli_query($db,$sqlDep);
		}
		echo '<script>alert("Success")</script>';
	}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Member</title>
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
					<li><a href="login.php" style="color:red;">Logout</a></li>
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
							<legend>Edit Member Information</legend>
								<div class="form-group">
									<label class="col control-label" for="Firstname">Firstname</label>
									<div class="col">
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-user">
												</i>
											</div>
											<input id="Firstname" name="Firstname" type="text" placeholder="<?php echo $firstname;?>" value="<?php echo $firstname;?>"class="form-control input-md">
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
											<input id="Lastname" name="Lastname" type="text" placeholder="<?php echo $lastname;?>" value="<?php echo $lastname;?>" class="form-control input-md">
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
										<input id="Citizen" name="Citizen" type="text" placeholder="<?php echo $cID;?>" value="<?php echo $cID;?>" class="form-control input-md">
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
								<label class="col control-label" for="Date Of Birth">Date Of Birth</label>
								<div class="col">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-birthday-cake"></i>
										</div>
										<input id="Date Of Birth" name="date" type="text" placeholder="<?php echo $dob;?>" value="<?php echo $dob;?>"class="form-control input-md">
									</div>
								</div>
							</div>


							<div class="form-group">
								<label class="col control-label" for="radios">Marital Status:</label>
								<div class="col">
									<label class="radio-inline" for="radios-0">
										<input type="radio" name="radios" id="radios-0" value="Married" checked="checked">
										Married
									</label>
									<label class="radio-inline" for="radios-1">
										<input type="radio" name="radios" id="radios-1" value="Unmarried">
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
										<input id="grad" name="grad" type="text" placeholder="<?php echo $graduate;?>" value="<?php echo $graduate;?>"class="form-control input-md">
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
										<input id="Phone number " name="phoneNum" type="text" placeholder="<?php echo $phone;?>" value="<?php echo $phone;?>"class="form-control input-md">
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
										<input id="Email Address" name="email" type="text" placeholder="<?php echo $email;?>" value="<?php echo $email;?>"class="form-control input-md">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col control-label" for="Address">Address</label>
								<div class="col">
									<textarea class="form-control" rows="10" id="Address" name="Address" placeholder='<?php echo $address;?>' value='<?php echo $address;?>'></textarea>
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
									<button class="btn btn-success" name="update"><span class="glyphicon glyphicon-thumbs-up"></span>Update</button>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
			</form>
        </div>
    </div>
    <script src="js/main.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
</body>
</html>
