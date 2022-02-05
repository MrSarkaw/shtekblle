
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
			border:2px solid #9198e5;
			border-radius: 40px;
			position: relative;
			left: 440px;
			top: 20px;
			color: white;
			font-size: 25px;
			transition: .5s;
			box-shadow: 0px 0px 20px 1px black;
		}
		.d1:hover{
			color: black;
		}
		.dimg{
			border-radius: 40px;
			width: 100%;
		}
		.btnlog{
			position:relative;
		}
		@media only screen and (max-width:414px)
		{
			.d1{
				position: relative;
				left: 40px;
				width: 80%;
				border-radius: 20px;	
			}
		
			.dimg{
				border-radius: 40px;
				width: 110%;position: relative;left: -10px;
			}
			.d4{
				width: 97% !important;
			}
		}
		#dnama{
		position: relative;
			top: 48px;
			clear: both;
		}
		.d4{
			background-color: none;
			border:1px solid #e66465;
			box-shadow: 0px 0px 20px 1px black;
			margin: 10px;padding: 20px;
			width: 30%;float: left;color: black;
			border-radius: 20px;
		}
		h5>a{
			text-shadow: 0px 0px 1px white;
			font-size: 15px;
		}
	</style>
</head>
	<body>
		<?php require("nav.php"); ?>
	
		
		<div class="col-sm-12 col-md-8 col-lg-4 d1">
				

		<?php $qu=mysqli_query($con,"select * from bakarhenar where id_bakarhenar='".$_SESSION["id_bakarhenar"]."'") ;
			
			while ($row=mysqli_fetch_array($qu)){
				?>
			<div class="col-sm-12"><img src="image/<?php echo $row['image'] ?>" class=" col-sm-12 dimg"> </div> <div class="col-sm-12" ><center><?php echo $row["full_name"];?></center></div>
			<div class="col-sm-12" ><center><h5>لینكه‌كه‌ت <br><a href="nardn.php?id=<?php echo $row["id_bakarhenar"] ?>"> http://shtekblle.ml/nardn.php?id=<?php echo $row['id_bakarhenar'] ?>   </a> </h5></center></div>

			<?php
			}
			
			?>	
	</div>
		<div class="container-fulid" id="dnama">
					<h3 style="text-align: center;color: black;text-shadow: 0px 0px 1px black;
">نامه‌كانت</h3>
					<h3 style="text-align: center;color: black;text-shadow: 0px 0px 1px black;
">
			<?php 
						$count=mysqli_query($con,"select * from namakan where id_bakarhenar = (select id_bakarhenar from bakarhenar where id_bakarhenar='".$_SESSION["id_bakarhenar"]."')");
						echo mysqli_num_rows($count);
						?>
			</h3>
			<hr style="border:3px solid text-shadow: 0px 0px 1px white;
;"> 	
				<?php 
					$sql2=mysqli_query($con,"select * from namakan where id_bakarhenar=(select id_bakarhenar from bakarhenar where id_bakarhenar='".$_SESSION["id_bakarhenar"]."') order by id_nama desc");
					while($row=mysqli_fetch_assoc($sql2)){
						echo '<div class="d4"><h5>';

						echo $row["nama"];
						
						
				echo "</h5> <br> <a href='home.php?delete=$row[id_nama]'><img src='icon/delete.png' style='width:40px;height:40px;'></a> 
				<h5 style='float:right'>".$row["date"]."</h5></div>";
					}
					?>
			
				<?php
			
			if(isset($_GET["delete"])){
				$delete=mysqli_query($con,"delete from namakan where id_nama='".$_GET["delete"]."'");
			}
			
			?>
		</div>
	
</body>
</html>
