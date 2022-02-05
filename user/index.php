<!DOCTYPE html><?php 
session_start();
?>
<head>
  <title>شتێك بڵێ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	

	
	
	<?php 
	require("connection/conn.php"); 
	
	
	
	?>
	
	
	<style>
		body{
			background: radial-gradient(#e66465, #9198e5);;
			background-position: center top;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
			font-family: "nrt";
       
    }
    @font-face{
		
        font-family:"nrt";
        src:url("nrt.ttf");
    }
	
		input {
			height: 43px;border:none;outline: none;width: 60%;
			margin: 20px;background-color: #0A0A0A;border:1px solid #e66465;
			color: #e66465;text-align: center;font-size: 18px;position: relative;left: 160px;
			border-radius: 30px;
		}	
		.inpreg, select{
			height: 43px;border:none;outline: none;width: 80%;
			margin: 20px;background-color: #0A0A0A;border:1px solid #e66465;
			color: #e66465;text-align: center;font-size: 18px;position: relative;left: 40px;
			border-radius: 30px;
		}
		.lg{
			background-color: #131313;position: absolute;top: 100px;left: 200px;border-radius: 30px;
		}
		.btnlog{
			margin-bottom: 10px;font-size: 20px;font-weight: bold;
		}
		@media only screen and (max-width:414px){
			.lg{
				position: absolute;
				left: 0px;width: 100%;
				
			}
			input{
				position: relative;left: 0px;
				width: 100%;
				margin: 0px;
				margin-top: 10px;
				margin-bottom: 10px;
			}
			.inpreg, select{
				position: relative;left: 0px;
				width: 100%;
				margin: 0px;
				margin-top: 10px;
				margin-bottom: 10px;
			}
			#we{
				left: 146px !important;
				width: 220px !important;
			height: 300px !important;
				top: 520px !important;
			}}
		h4{
			text-align: right;color: white;font-weight: bold;cursor: pointer;
		}
		
		#we{
			position: absolute;
			left: 960px;
			width: 330px;
			height: 480px;
			top: 130px;
		}
	</style>
</head>
<body>
	
	<?php 
	$error=["email"=>'',"password"=>''];

if(isset($_POST["login"])){

	if(empty($_POST["email"])){
		$error["email"]="! ئیمه‌یڵكه‌ت به‌تاڵه‌";
	}
	if(empty($_POST["password"])){
		$error["password"]="! پاسۆرده‌كه‌ت به‌تاڵه‌";
	}
	
	$email=htmlspecialchars($_POST["email"]);
	$email=mysqli_real_escape_string($con,$email);
	
	
		
	$password=htmlspecialchars($_POST["password"]);
	$password=mysqli_real_escape_string($con,$password);
	
	if(!array_filter($error)){
		
		$password=md5($password);
		$query=mysqli_query($con,"select * from bakarhenar where email='$email' and password='$password'");
		if(mysqli_num_rows($query)>0){
					while($row=mysqli_fetch_array($query)){
						$user_id=$row["id_bakarhenar"];
   					$_SESSION["id_bakarhenar"]=$user_id;
					}
			header("location: home.php");
		}
		else {
		?>	
<script type="text/javascript">
	alert("دڵنیا به‌ره‌وه‌ له‌ ئیمه‌یڵ یان پاسۆرده‌كه‌ت‌");
</script><?php
}
	}
	
	
	
}

?>
	<div class="col-sm-12 col-md-8 col-lg-8 lg">
		<h4 data-toggle="modal" data-target="#forreg">دروستكردنی هه‌ژماری نوێ</h4>
		
		<center><img src="icon/login.png" style="width: 140px;height: 140px;margin-top: 10px;"></center><br>
			<form method="post">
				<div class="form-group">
			<input type="email" name="email" placeholder="ئیمه‌یڵ" value="<?php if(isset($_POST['login'])){echo  $_POST['email'];}  ?>"><br>
			<center><span class="text-danger" style="font-weight: bold"> <?php echo  $error["email"]; ?></span></center>
				</div>
				<div class="form-group">
			<input type="password" name="password" placeholder="وشه‌ی نهێنی"><br>
			<center><span class="text-danger" style="font-weight: bold"><?php echo  $error["password"]; ?></span></center>
						</div>
		<center><button class="btn btn-primary btnlog" name="login" >چونه‌ژووره‌وه‌</button></center>
				<br>
				<h4><?php $sql=mysqli_query($con,"select * from bakarhenar"); echo mysqli_num_rows($sql);?> : ژماره‌ی به‌كارهێنه‌ر</h4>
		<hr style="border:2px solid #e66465;width: 103%;position: relative;left: -14px;">
	<!--	<h4 data-toggle="modal" data-target="#forpass">له‌بیرچوونه‌وه‌ی وشه‌ی نهێنی</h4> -->
		</form>
	</div>
</div>

<img src="kisspng-cartoon-handsome-man-5a91662eaf25d6.6057957815194783187174.png" id="we">











<div id="forreg" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 style="text-align: center;color: black;">خۆتۆماركردن</h4>
			</div>
			
			<div class="modal-body">
				<form method="post" enctype="multipart/form-data">
	<input class="inpreg" name="email" type="email" placeholder="ئیمه‌یڵ بنووسه‌" require=""><br> 
	
	<input class="inpreg" name="pass" type="password" placeholder="وشه‌ی نهێنی بنووسه‌" require=""><br> 
	
	<input class="inpreg" name="name" type="text" placeholder="ناوی ته‌واو بنووسه‌" require=""><br>

	<h3 style="text-align: center;font-weight: bold">وێنه‌یه‌ك هه‌ڵبژێره‌</h3><br>
					
					<input class="inpreg" name="file" type="file" id="file"><br>
					
					
	
	<center><button type="submit" name="m" class="btn btn-success">تۆماركردن</button></center></form>
				<div class="modal-footer">
					<button class="btn btn-link" data-dismiss="modal"><h4 style="color: black;">داخستن</h4></button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 

if(isset($_POST["m"])){
	
	
	if(empty($_POST["email"])){
		?>
<script type="text/javascript">
	alert("! ئیمه‌ڵه‌كه‌ت به‌تاڵه‌");
</script>
<?php
	}
		
	else if(empty($_POST["pass"])){
		?>
<script type="text/javascript">
	alert("! پاسۆرده‌كه‌ت به‌تاڵه‌");
</script>
<?php
	}
	
		else if(empty($_POST["name"])){
		?>
<script type="text/javascript">
	alert("! ناوه‌كه‌ت به‌تاڵه‌");
</script>
<?php
	}
	else if ($_FILES["file"]["name"]==null){
		?>
<script type="text/javascript">
	alert("! وێنه‌كه‌ت به‌تاڵه‌");
</script>
<?php
	}
			
		else {
			$email=mysqli_real_escape_string($con,$_POST["email"]);
$email=htmlspecialchars($email);
$email=strtolower($email);

$password=mysqli_real_escape_string($con,$_POST["pass"]);
$password=htmlspecialchars($password);
$password=md5($password);
	
$name=$_POST["name"];
$name=strtolower($name);
	
	
	$types=array("image/jpg","image/png","image/jpeg");
	$target="image/".basename($_FILES["file"]["name"]);
	$image=$_FILES["file"]["name"];
	
	if(in_array($_FILES["file"]["type"],$types)){
		
		if($_FILES["file"]["size"]<10000000){
			$select=mysqli_query($con,"insert into bakarhenar(email,password,full_name,image) values('".$email."','".$password."','".$name."',
'".$image."')");
if(isset($select)and move_uploaded_file($_FILES["file"]["tmp_name"],$target)){
		?>
<script type="text/javascript">
		alert("هه‌ژماره‌كه‌ به‌ سه‌ركه‌وتووی دروستكرا");
</script>
<?php
}}
	
else {
	?>
<script type="text/javascript">
		alert("تكایه‌با جۆری ڕه‌سمه‌كه‌ png يان jpeg بێت");
</script>
<?php
}
	}
			else{
				?>
<script type="text/javascript">
		alert("قه‌باره‌ی وێنه‌كه‌ت زۆر گه‌وره‌یه‌ ، تكایه‌ بیگۆڕه‌");
</script>
<?php
			}
}
}
?>
		
		
		
	
	
	




</body>
</html>
