<?php
	
	session_start();
	
	$db = mysqli_connect("localhost","root","","company") or die ("Connection failed: " . mysqli_connect_error()); 
	mysqli_set_charset($db, "utf8");
	
	if(isset($_POST['submit'])){
		$user = $_POST['username'];
        $pass = $_POST['pass'];
		$user = stripcslashes($user);
        $pass = stripcslashes($pass);
        $user = mysqli_real_escape_string($db,$user);
		$pass = mysqli_real_escape_string($db,$pass);
		
		$sql = "SELECT * FROM employee WHERE emp_id = '$user' AND citizenID ='$pass'";
        $result = mysqli_query($db,$sql);
        $resultCheck = mysqli_num_rows($result);

		if($resultCheck < 1){
			echo '<script>alert("Incorrect Email or Password");window.location.href="login.php";</script>';
			exit();
		}
		else{
			$sqlHr = "SELECT b.emp_id,b.citizenID,b.email,b.graduate,b.firstname,b.lastname,b.birthday,b.gender,b.address,b.phonenumber,b.maritalstatus,b.workingarea 
			FROM hr a,employee b WHERE a.emp_id = '$user' AND a.emp_id = b.emp_id";
				$resultHr = mysqli_query($db,$sqlHr);
			if($row = mysqli_fetch_assoc($resultHr)){
				$_SESSION['loginHR'] = $row['emp_id'];
				$_SESSION['hrFirstname'] = $row['firstname'];
				$_SESSION['hrLastname'] = $row['lastname'];
				$_SESSION['hrCitizenID'] = $row['citizenID'];
				$_SESSION['hrGender'] = $row['gender'];
				$_SESSION['hrDob'] = $row['birthday'];
				$_SESSION['hrStatus'] = $row['maritalstatus'];
				$_SESSION['hrGraduate'] = $row['graduate'];
				$_SESSION['hrPhone'] = $row['phonenumber'];
				$_SESSION['hrEmail'] = $row['email'];
				$_SESSION['hrAddress'] = $row['address'];
				$_SESSION['hrArea'] = $row['workingarea'];
				header("Location: add_hr.php?login=success");
				exit();
			}
			else{
				echo '<script>alert("For HR only");</script>';
			}
		}
	}
		
	if(isset($_POST['submitHR'])){
		if(preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $_POST["dob"])){
			$empID = $_POST['empID'];
			$firstname = $_POST['Firstname'];
			$lastname = $_POST['Lastname'];
			$cID = $_POST['Citizen'];
			$gender = $_POST['Gender'];
			$department = $_POST['dep'];
			$dob = $_POST["dob"];
			$status = $_POST["status"];
			$graduate = $_POST["grad"];
			$phonenum = $_POST['Phonenumber'];
			$email = $_POST['Email'];
			$address = $_POST['Address'];
			$area = $_POST['area'];
			
			$sql = "SELECT * FROM employee WHERE emp_ID = '$empID'";
			$result = mysqli_query($db,$sql);
            $check = mysqli_num_rows($result);
			if($check > 0){
				echo '<script>alert("Already Have This Employee In Company")</script>';
			}
			else{
				$sqlEmployee =  "INSERT INTO employee (emp_id,citizenID,email,graduate,firstname,lastname,birthday,gender,address,phonenumber,maritalstatus,workingarea) 
				VALUES ('$empID','$cID','$email','$graduate','$firstname','$lastname','$dob','$gender','$address','$phonenum','$status','$area')";
				mysqli_query($db,$sqlEmployee);
				if($department=="Normal"){
					$sqlDep = "INSERT INTO staff (dep_id,emp_id) 
					VALUES ('20000','$empID')";	
					mysqli_query($db,$sqlDep);
				}
				if($department=="HR"){
					$sqlDep = "INSERT INTO hr (dep_id,emp_id) 
					VALUES ('10000','$empID')";	
					mysqli_query($db,$sqlDep);
				}
				if($department=="Manager"){
					$sqlDep = "INSERT INTO manager (dep_id,emp_id) 
					VALUES ('30000','$empID')";	
					mysqli_query($db,$sqlDep);
				}
				echo '<script>alert("Success")</script>';
			}			
		}else{
			echo '<script>alert("Wrong Date Pattern");</script>';
		}
	}
?>		