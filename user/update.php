
	<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	

	
	

	
	<style>
	
		div{
			margin-top: 10px;
		}
		.d1{
			border-radius: 40px;
			color: white;
			font-size: 25px;
			transition: .5s;
		}
		.d1 > center >button{
			margin-top: 30px;
			padding: 15px;
		}
		.dimg{
			border-radius: 40px;
			width: 100%;
		}
		.inpreg{
			height: 43px;border:none;outline: none;width: 80%;
			margin: 20px;background-color: #0A0A0A;border:1px solid #e66465;
			color: #e66465;text-align: center;font-size: 18px;position: relative;left: 40px;
			border-radius: 30px;
		}
		@media only screen and (max-width:414px)
		{
			.inpreg{
				position: relative;left: 0px;
				width: 100%;
				margin: 0px;
				margin-top: 10px;
				margin-bottom: 10px;
			}
		}
	</style>
</head>
	<body>
		<?php require("nav.php"); ?>
	
		
		<div class="container d1">
			<center>	<button class="btn btn-primary" data-toggle="modal" data-target="#foremail">گۆڕینی ئیمه‌یل</button>
				<button class="btn btn-primary" data-toggle="modal" data-target="#forpassword"> گۆڕینی پاسۆرد</button>
				<button class="btn btn-primary" data-toggle="modal" data-target="#name">گۆڕینی ناو </button>
				<button class="btn btn-primary" data-toggle="modal" data-target="#forimg">گۆڕینی ڕه‌سم </button>
				<button class="btn btn-danger" data-toggle="modal" data-target="#fordelete">سڕینه‌وه‌ی هه‌ژمار </button></center>

			
	</div>
	<?php  
		$select=mysqli_query($con,"select * from bakarhenar where id_bakarhenar='".$_SESSION["id_bakarhenar"]."'");
		while($row=mysqli_fetch_array($select)){
		?>
	<div id="foremail" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 style="text-align: center">تازه‌كردنه‌وه‌ی ئیمه‌یل</h4>
			</div>
			
			<div class="modal-body">
				<form method="post" enctype="multipart/form-data">
	<input class="inpreg" name="email" type="email" placeholder="ئیمه‌یڵ بنووسه‌"
		   value=' <?php echo $row["email"]; ?>'><br> 
	<?php 
				if(isset($_POST["btnemail"])){
					$email=mysqli_real_escape_string($con,$_POST["email"]);
					$email=htmlspecialchars($email);
					
					if(empty($email)){
						?>
					<script type="text/javascript">
					alert("به‌تاڵه‌");
					</script>
					<?php
					}
					else {
						$update=mysqli_query($con,"update bakarhenar set email='".$email."' where id_bakarhenar='".$_SESSION["id_bakarhenar"]."'");
							if(isset($update)){
								?>
					<script type="text/javascript">
						alert("تازه‌ كرایه‌وه‌ و گۆڕا بۆ <?php echo $email ?>");
						window.history.back;
					</script>
					<?php
							}
					}
					
				}	
					?>
	
					
	
	<center><button type="submit" name="btnemail" class="btn btn-success">تازه‌كردنه‌وه‌</button></center></form>
				<div class="modal-footer">
					<button class="btn btn-link" data-dismiss="modal"><h4>داخستن</h4></button>
				</div>
			</div>
		</div>
	</div>
</div>
		
	
		
		
		<div id="name" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 style="text-align: center">تازه‌كردنه‌وه‌ی ناو</h4>
			</div>
			
			<div class="modal-body">
				<form method="post" enctype="multipart/form-data">
	<input class="inpreg" name="name" type="text" placeholder="ناو بنووسه‌"
		   value=' <?php echo $row["full_name"]; ?>'><br> 
	<?php 
				if(isset($_POST["btnname"])){
					$name=mysqli_real_escape_string($con,$_POST["name"]);
					$name=htmlspecialchars($name);
					
					if(empty($name)){
						?>
					<script type="text/javascript">
					alert("به‌تاڵه‌");
					</script>
					<?php
					}
					else {
						$update=mysqli_query($con,"update bakarhenar set full_name='".$name."' where id_bakarhenar='".$_SESSION["id_bakarhenar"]."'");
							if(isset($update)){
								?>
					<script type="text/javascript">
						alert("تازه‌ كرایه‌وه‌ و گۆڕا بۆ <?php echo $name ?>");
						window.history.back;
					</script>
					<?php
							}
					}
					
				}	
					?>
	
					
	
	<center><button type="submit" name="btnname" class="btn btn-success">تازه‌كردنه‌وه‌</button></center></form>
				<div class="modal-footer">
					<button class="btn btn-link" data-dismiss="modal"><h4>داخستن</h4></button>
				</div>
			</div>
		</div>
	</div>
</div>
		
	
		
		
		
				
		
		
		
		<div id="fordelete" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 style="text-align: center">سڕینه‌وه‌ی هه‌ژمار</h4>
			</div>
			
			<div class="modal-body">
				<h3 style="text-align: right">ئه‌ته‌وێت هه‌ژماره‌كه‌ت بسڕیته‌وه‌ ؟</h3>
				<form method="post">
	<h4 style="text-align: center">به‌ڵێ</h4><input class="inpreg" name="radioyes" type="radio"><br> 
	<h4 style="text-align: center">نه‌خێر</h4><input class="inpreg"  type="radio"><br> 
	<?php
		
			if(isset($_POST["btndelete"])){
					if(isset($_POST["radioyes"])){
						
					
				$sql=mysqli_query($con,"delete from bakarhenar where id_bakarhenar='".$_SESSION["id_bakarhenar"]."'	");
				if(isset($sql)){
								?>
					<script type="text/javascript">
						alert("هه‌ژماره‌كه‌ت سڕایه‌وه‌");
						
					</script>
					<?php
					session_unset($_SESSION["id_bakarhenar"]);
					session_destroy();
				}
			}}
		
		?>	
					
					<?php
							}	
					
					 
						
					
					
					
					?>
	
					
	
	<center><button type="submit" name="btndelete" class="btn btn-success">ئه‌نجامدان</button></center></form>
				<div class="modal-footer">
					<button class="btn btn-link" data-dismiss="modal"><h4>داخستن</h4></button>
				</div>
			</div>
		</div>
	</div>
</div>
		
		
		
		<div id="forimg" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 style="text-align: center">تازه‌كردنه‌وه‌ی وێنه‌</h4>
			</div>
			
			<div class="modal-body">
				<form method="post" enctype="multipart/form-data">
	<input class="inpreg" name="file" type="file"><br> 
	<?php 
				if(isset($_POST["btnimg"])){
					
	$types=array("image/jpg","image/png","image/jpeg");
	$target="image/".basename($_FILES["file"]["name"]);
	$image=$_FILES["file"]["name"];
					if(in_array($_FILES["file"]["type"],$types)){
						
					$update=mysqli_query($con,"update bakarhenar set image='".$image."' where id_bakarhenar='".$_SESSION["id_bakarhenar"]."'");
							if(isset($update)){
								?>
					<script type="text/javascript">
						alert("تازه‌ كرایه‌وه‌ و گۆڕا ");
						window.history.back;
					</script>
					<?php
							}	
					}
					 
						
					}
					
					
					?>
	
					
	
	<center><button type="submit" name="btnimg" class="btn btn-success">تازه‌كردنه‌وه‌</button></center></form>
				<div class="modal-footer">
					<button class="btn btn-link" data-dismiss="modal"><h4>داخستن</h4></button>
				</div>
			</div>
		</div>
	</div>
</div>
		
	
		
		
		
		
	<div id="forpassword" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 style="text-align: center">تازه‌كردنه‌وه‌ی پاسۆرد</h4>
			</div>
			
			<div class="modal-body">
				<form method="post" enctype="multipart/form-data">
	<input class="inpreg" name="passwordold" type="password" placeholder="پاسۆردی كۆن بنووسه‌"><br> 
	<input class="inpreg" name="passwordnew" type="password" placeholder=" پاسۆردی تازه‌ بنووسه‌"><br> 
	<input class="inpreg" name="passwordnew2" type="password" placeholder="پاسۆردی تازه‌ دووباره‌ بكه‌ره‌وه‌"><br> 
	<?php 
				if(isset($_POST["btnpass"])){
					if(empty($_POST["passwordold"]) || empty($_POST["passwordnew"])|| empty($_POST["passwordnew2"]) ){
						echo("خانه‌یه‌ك به‌تاڵه‌");
					}
					else {
					$old=mysqli_real_escape_string($con,$_POST["passwordold"]);
					$old=htmlspecialchars($old);
					$old=md5($old);
					
					$new=mysqli_real_escape_string($con,$_POST["passwordnew"]);
					$new=htmlspecialchars($new);
					
					$new2=mysqli_real_escape_string($con,$_POST["passwordnew2"]);
					$new2=htmlspecialchars($new);
					
					$query=mysqli_query($con,"select * from bakarhenar where id_bakarhenar='".$_SESSION["id_bakarhenar"]."'");
					if(isset($query)){
						while($rowpas=mysqli_fetch_assoc($query)){
							if($rowpas["password"]==$old){
								if($new==$new2){
									$new=md5($new);
									$updatepass=mysqli_query($con,"update bakarhenar set passwaro='".$new."' where id_bakarhenar='".$_SESSION["id_bakarheanr"]."'");
									
									if(isset($updatepass)){
										?> 
					<script type="text/javascript">
					alert("پاسۆرده‌كه‌ت نوێ كرایه‌وه‌");
					</script>
					<?php
									}
								}
							else{
									?> 
					<script type="text/javascript">
					alert("پاسۆرده‌كانت وه‌ك یه‌ك نین !");
					</script>
					<?php
								
							}
							}
							else{
					?> 
					<script type="text/javascript">
					alert("پاسۆرده‌كه‌ت هه‌ڵه‌یه‌‌‌");
					</script>
					<?php
					} 
				
				}
			
						
					}
						}?>
	
					
	
	<center><button type="submit" name="btnpass" class="btn btn-success">تازه‌كردنه‌وه‌</button></center></form>
				<div class="modal-footer">
					<button class="btn btn-link" data-dismiss="modal"><h4>داخستن</h4></button>
				</div>
			</div>
		</div>
	</div>
</div>
		
		
		<?php
				
		}
					
		?>
</body>
</html>
