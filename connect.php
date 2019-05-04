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
			$sqlMng = "SELECT b.emp_id,b.citizenID,b.email,b.graduate,b.firstname,b.lastname,b.birthday,b.gender,b.address,b.phonenumber,b.maritalstatus,b.workingarea 
			FROM manager a,employee b WHERE a.emp_id = '$user' AND a.emp_id = b.emp_id";
				$resultMng = mysqli_query($db,$sqlMng);
			$sqlStaff = "SELECT b.emp_id,b.citizenID,b.email,b.graduate,b.firstname,b.lastname,b.birthday,b.gender,b.address,b.phonenumber,b.maritalstatus,b.workingarea 
			FROM staff a,employee b WHERE a.emp_id = '$user' AND a.emp_id = b.emp_id";
				$resultStaff = mysqli_query($db,$sqlStaff);
				
			if($row = mysqli_fetch_assoc($resultStaff)){
				$_SESSION['loginStaff'] = $row['emp_id'];
				$_SESSION['staffCitizenID'] = $row['citizenID'];
				$_SESSION['staffFirstname'] = $row['firstname'];
				$_SESSION['staffLastname'] = $row['lastname'];
				$_SESSION['staffGender'] = $row['gender'];
				$_SESSION['staffDob'] = $row['birthday'];
				$_SESSION['staffStatus'] = $row['maritalstatus'];
				$_SESSION['staffGraduate'] = $row['graduate'];
				$_SESSION['staffPhone'] = $row['phonenumber'];
				$_SESSION['staffEmail'] = $row['email'];
				$_SESSION['staffAddress'] = $row['address'];
				$_SESSION['staffArea'] = $row['workingarea'];
				header("Location: index.php?login=success");
				exit();
			} 
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
			if($row = mysqli_fetch_assoc($resultMng)){
				$_SESSION['loginMng'] = $row['emp_id'];
				$_SESSION['mngFirstname'] = $row['firstname'];
				$_SESSION['mngLastname'] = $row['lastname'];
				$_SESSION['mngCitizenID'] = $row['citizenID'];
				$_SESSION['mngGender'] = $row['gender'];
				$_SESSION['mngDob'] = $row['birthday'];
				$_SESSION['mngStatus'] = $row['maritalstatus'];
				$_SESSION['mngGraduate'] = $row['graduate'];
				$_SESSION['mngPhone'] = $row['phonenumber'];
				$_SESSION['mngEmail'] = $row['email'];
				$_SESSION['mngAddress'] = $row['address'];
				$_SESSION['mngArea'] = $row['workingarea'];
				header("Location: add_pj.php?login=success");
				exit();
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
			$famFirstname = $_POST['Firstname2'];
			$famLastname = $_POST['Lastname2'];
			$relation = $_POST['rel'];
			$parentPhone = $_POST['Phonenumber2'];
			
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
				$sqlFamily = "INSERT INTO family (firstname,lastname,relationship,phonenumber,emp_id) 
				VALUES ('$famFirstname','$famLastname','$relation','$parentPhone','$empID')";	
				mysqli_query($db,$sqlFamily);
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
	
	if(isset($_POST['nextPJ'])){
		if(preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $_POST["start"])
			&& preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $_POST["end"])){
			$pjID = $_POST['pj_id'];
			$_SESSION['spjID']=$pjID;
			$pjname = $_POST['pj'];
			$_SESSION['spjName']=$pjname;
			$pjlocation = $_POST['Address'];
			$_SESSION['spjLo']=$pjlocation;
			$start = $_POST['start'];
			$_SESSION['spjStart']=$start;
			$end = $_POST['end'];
			$_SESSION['spjEnd']=$end;
			$area = $_POST["area"];
			$_SESSION['pjArea'] = $area;
			$time = $_POST["time"];
			$_SESSION['spjTime']=$time;
			$customerF = $_POST["Firstname"];
			$customerL = $_POST["Lastname"];
			$customerGen = $_POST["Gender"];
			$customerEmail = $_POST["Email"];
			$customerPhone = $_POST["Phone"];
			
			$sqlPJ =  "INSERT INTO project (proj_id,project_name,finishdate,startdate,projectlocation,workingarea) 
			VALUES ('$pjID','$pjname','$end','$start','$pjlocation','$area')";
			mysqli_query($db,$sqlPJ);
			$sqlCustomer = "INSERT INTO customer (proj_id,gender,firstname,lastname,email,phonenumber) 
			VALUES ('$pjID','$customerGen','$customerF','$customerL','$customerEmail','$customerPhone')";	
			mysqli_query($db,$sqlCustomer);
			
			header("Location: assign.php");
		
		}else{
			echo '<script>alert("Wrong Date Pattern");</script>';
		}
		
	}
	
	if(isset($_POST['submitPJ'])){
		$empID = $_POST['employ'];
		$time = $_POST['time'];
		$sql = "UPDATE project SET emp_id='$empID', time='$time' WHERE proj_id='$_SESSION[spjID]'";
		mysqli_query($db,$sql);
		$sqlNoti =  "INSERT INTO noti (emp_id,proj_id,status) 
		VALUES ('$empID','$_SESSION[spjID]','unread')";
		mysqli_query($db,$sqlNoti);
		echo '<script>alert("Success");</script>';
	}
?>		