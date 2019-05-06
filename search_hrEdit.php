<?php
	include 'connect.php';

	if (!$_SESSION['hr_loggedin']){
		echo "<script language='javascript'> alert('กรุณาเข้าสู่ระบบก่อน');window.location='login.php';</script>";
}
	$_SESSION['staff'] = true;
	$searching = preg_replace("#[^0-9a-z]#i","",$_GET['input']);
	$query2 = "SELECT * FROM employee WHERE emp_id LIKE '%$searching%' OR firstname LIKE '%$searching%' OR lastname LIKE '%$searching%'";
	$result2 = mysqli_query($db,$query2);
	if(isset($_POST['staffsearchHR'])){
		if(empty( $_POST['staffsearchHR'])){
			echo '<script>alert("No Match Found");</script>';
			$_SESSION['staff'] = true;
		}
		else{
			$mngstaff = $_POST['staffsearchHR'];
			$searching = preg_replace("#[^0-9a-z]#i","",$mngstaff);
			$query = "SELECT * FROM employee WHERE emp_id LIKE '%$searching%' OR firstname LIKE '%$searching%' OR lastname LIKE '%$searching%'";
			$result = mysqli_query($db,$query);
			$check = mysqli_num_rows($result);
			if($check == 0){
				echo '<script>alert("No Match Found");</script>';
			}
			else{
				header("Location: search_hrEdit.php?input=".$mngstaff."");
				$_SESSION['staff'] = true;
			}
		}
		
	}

	if(isset($_POST['delete'])){
		$del = $_POST['d'];
		$sql = "DELETE FROM employee WHERE emp_id = '$del'";
		mysqli_query($db,$sql);
	}
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css'>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/search.css">
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
        </aside>
    </div>
	<form method="post" name="searchHR">
		<div id="colorlib-main">
			<div class="colorlib-work">
				<div class="row">
					<center>
						<h1> Search </h1>
						<input id="ssHR" name="staffsearchHR" type="search" placeholder="Staff">
					</center>
					<br />
					<table class="table striped">
						<thead>

							<?php
								if($_SESSION['staff']){
									echo ' <tr>
								<th>Emp. ID</th>
								<th>Name</th>
								<th>Department</th>

							</tr>';
								while($row = mysqli_fetch_array($result2)){
								$empID = $row['emp_id'];
								$staffName = $row['firstname'];
								$staffLName = $row['lastname'];
								$staffDep = "";
								$sqlHR = "SELECT * FROM hr WHERE emp_id = '$empID'";
								$resultD1 = mysqli_query($db,$sqlHR);
								$resultCheck1 = mysqli_num_rows($resultD1);
								if($resultCheck1 > 0){
									$staffDep = "HR";
								}
								$sqlManager = "SELECT * FROM manager WHERE emp_id = '$empID'";
								$resultD2 = mysqli_query($db,$sqlManager);
								$resultCheck2 = mysqli_num_rows($resultD2);
								if($resultCheck2 > 0){
									$staffDep = "Manager";
								}
								$sqlStaff = "SELECT * FROM staff WHERE emp_id = '$empID'";
								$resultD3 = mysqli_query($db,$sqlStaff);
								$resultCheck3 = mysqli_num_rows($resultD3);
								if($resultCheck3 > 0){
									$staffDep = "Staff";
								}

								echo '
								<tr>
									<td>'.$empID.'</td>
									<td>'.$staffName.' '.$staffLName.'</td>
									<td>'.$staffDep.'</td>
									<td><li>
									<a href="member_edit.php?employeeID='.$empID.'">Edit</a>&#160;&#160;&#160;&#160;<a href="search_hr.php" id="delete" del_id="'.$empID.'">Delete</a></li>
								</td>
								</tr>';
							}
								$_SESSION['staff'] = false;
								}
							?>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</form>
    </div>
    <script src="js/main.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.3/vue.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js'></script>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	var input = document.getElementById("ssHR");
	input.addEventListener("keyup", function(event) {
		event.preventDefault();
		if (event.keyCode === 13) {
			document.searchHR.submit();
		}
	});
	$("body").delegate("#delete","click",function(event){
		var remove = $(this).parent().parent().parent();
		var remove_id = remove.find("#delete").attr("del_id");
		$.ajax({
			url : "search_hrEdit.php",
			method  : "POST",
			data  : {delete:1,d:remove_id},
			success : function(data){

				$(".colorlib-work").html(data);
			}
		})
    })
</script>
</html>
