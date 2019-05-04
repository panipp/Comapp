<?php include 'connect.php';
	$_SESSION['proj'] = false;
	$_SESSION['staff'] = false;
	if(isset($_POST['staffsearchMng'])&& empty($_POST['projectsearchMng'])){
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
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/search.css">
    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->
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

                <!-- jQuery -->
                <script src="js/jquery.min.js"></script>
                <!-- jQuery Easing -->
                <script src="js/jquery.easing.1.3.js"></script>
                <!-- Bootstrap -->
                <script src="js/bootstrap.min.js"></script>
                <!-- Waypoints -->
                <script src="js/jquery.waypoints.min.js"></script>
                <!-- Flexslider -->
                <script src="js/jquery.flexslider-min.js"></script>
                <!-- Sticky Kit -->
                <script src="js/sticky-kit.min.js"></script>

                <!-- MAIN JS -->
                <script src="js/main.js"></script>
</body>

	<div id="colorlib-main">
		<div class="colorlib-work">
			<div class="row">
				<center>
					<h1> Search </h1>
					<form method="POST" name="searchMng" id="go">
					<input id="ssMng" name="staffsearchMng" type="search" placeholder="Staff">
					</form>
				</center>
			</div>
		</div>
	</div>


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
