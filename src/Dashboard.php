<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Dashboard</title>
		<link rel="stylesheet" href="../css/login.css" />
	</head>

	<body>

		<div class="container">
			<div class="loginForm">
				<div class="formHeader">
					<div class="comName">
						<h3>Music Player</h3>
						<p>Enjoying same music list with others!</p>
					</div>
				</div>
                <br><br> 

			
				<?PHP 
				$con = mysqli_connect("localhost","Hanqk97","Chq@970713","Music");
				// $con->query("set names utf8");
				if(!$con){
					die(mysql_error());
				}
			
				$sql = mysqli_query($con,"SELECT musicname, musicid, artist FROM music");
				mysqli_query($con,"set musicname utf8");
				mysqli_query($con,"set artist utf8");
				$datarow = mysqli_num_rows($sql); 
				for($i=0;$i<$datarow;$i++){
					$sql_arr = mysqli_fetch_assoc($sql);
					$musicname = $sql_arr['musicname'];
					$artist = $sql_arr['artist'];
					$musicid = $sql_arr['musicid'];
					echo "$musicid     $musicname     $artist<br>";
				}
				echo"<br><br>";
				mysqli_close($con);
				?>

		
                <div class="form-submit">
                    <button type="submit" onclick="window.location.href = '../Player/page.html'" class="rbtn">Play</button>
                </div>  
				<br>
				<div class="form-submit">
                    <button type="submit" onclick="window.location.href = 'musicAddPage.html'" class="rbtn">Add New</button>
                </div>  
				<br>
				<div class="form-submit">
                    <button type="submit" onclick="window.location.href = 'musicEditPage.html'" class="rbtn">Edit Music</button>
                </div>  
				<br>
				<div class="form-submit">
                    <button type="submit" onclick="window.location.href = 'logout.php'" class="rbtn">Logout</button>
                </div> 

			</div>
		</div>
	</body>
</html>



