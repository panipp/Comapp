<?php
	include 'connect.php';

	if (!$_SESSION['hr_loggedin']){
		echo "<script language='javascript'> alert('กรุณาเข้าสู่ระบบก่อน');window.location='login.php';</script>";
		exit;
}
$searching = "Search";
	$_SESSION['staff'] = false;
	if(isset($_POST['staffsearchMng'])){
		if(!preg_match("/^[0-9]|[A-Z]|[a-z]$/",$_POST["staffsearchMng"]))	{
				echo "<script language='javascript'> alert('No Match Found');window.location='search_hr.php';</script>";
			exit();
		}
		else{
			$mngstaff = $_POST['staffsearchMng'];
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
					<li><a href="logout.php" style="color:red;">Logout</a></li>
                </ul>
            </nav>
        </aside>

        </div>

	<div id="colorlib-main">
		<div class="colorlib-work">
			<div class="row">
				<center>
					<h1> Search </h1>
					<form method="POST" name="searchMng" id="go">
					<input id="ssMng" name="staffsearchMng" type="search" placeholder="<?php echo $searching;?>">
					</form>
				</center>
			</div>
		</div>
	</div>
</body>
<!-- MAIN JS -->
<script src="js/main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	var input1 = document.getElementById("go");
	input1.addEventListener("keyup", function(event) {
		event.preventDefault();
		if (event.keyCode === 13) {
			document.searchMng.submit();
		}
	});
</script>
</html>
