<?php	
	include 'connect.php';
	if(isset($_POST['setNews'])){
		$topic = $_POST['topic'];
        $detail = $_POST['information'];
		$sql =  "INSERT INTO news (topic,detail) VALUES ('$topic','$detail')";
		mysqli_query($db,$sql);
		echo '<script>alert("Success");window.location.href="news_hr.php";</script>';
	}
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>News</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <link rel="shortcut icon" href="favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
	<script src="js/main.js"></script> 
    
</head>
<body>
	<form method="POST">
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
					<?php 
						$sql = "SELECT * FROM news";
						$result = mysqli_query($db,$sql);
						if(mysqli_num_rows($result) > 0){
							while($row = mysqli_fetch_array($result)){
								$topic = $row['topic'];
								$detail= $row['detail'];
								echo '<legend><b>'.$topic.'</b></legend>
									<p>'.$detail.'</p>';
							}
						}
						
					?>
						<br /><br />
						<legend>Add News</legend>
						<label class="col control-label" for="topic">Topic</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-sticky-note-o"></i>
							</div>
							<input id="topic" name="topic" type="text" class="form-control input-md">
						</div>
						<label class="col control-label" for="details">Details</label>
						<div class="col">
							<textarea class="form-control" rows="10" id="details" name="information" placeholder="Enter details here"></textarea>
						</div>
							<div class="form-group">
								<label class="col control-label"></label>
								<div class="col">
									<button class="btn btn-success" name="setNews"><span class="glyphicon glyphicon-thumbs-up"></span>submit</button>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</form>
    
</body>
</html>
