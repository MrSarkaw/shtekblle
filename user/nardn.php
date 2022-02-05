<!DOCTYPE html>

<?php 
	require("connection/conn.php"); 
		
	?>
<head>
  <title>شتێك بڵێ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	

	
	
	
	<?php require("connection/conn.php"); ?>
	
	
	<style>
		body{
			background: radial-gradient(#e66465, #9198e5);
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
	
    
		#logo{
			width: 120px;
			height: 120px;
			position: relative;
			top: -40px;
		}
		.navbar{
			background-color: #9198e5;
		}
		#myNavbar>ul>li>a{
margin-left: 10px;		}	
		#myNavbar>ul>li>a:hover{
			color: white;
		}
		#myNavbar>ul>li>img{
			width: 20px;height: 20px;
			position: relative; top: -35px;
		}
	
		
	div{
			margin-top: 10px;
		}
		.d1{
			border:1px solid #9198e5;
			border-radius: 40px;
			position: relative;
			left: 440px;
			top: 20px;
			color: white;
			font-size: 25px;
			transition: .5s;
			box-shadow: 0px 0px 10px 1px black;
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
				border-radius: 20px;
			}
		}
		input {
			height: 43px;border:none;outline: none;
			margin-bottom: 10px; background-color: #0A0A0A;border:1px solid #9198e5;
			color: #e66465;text-align: center;font-size: 14px;
			border-radius: 30px;width: 100%;box-shadow: 0px 0px 10px 1px black;
		}
		form>button{
			background-color: #131313 !important;
			border:1px solid #005143 !important; 
			transition: .4s;
		}
		form>button:hover{
			background-color: #e66465 !important;
		}
	</style>
</head>
<body>

<nav class="navbar navbar-inverse" style="overflow: hidden">
  <div class="container-fluid header">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand"  ><img src="logo/logo.png" id="logo"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
				  <form method="post" class="form-group">
  <li>
			  		<input type="search" name="search" placeholder="گه‌ڕان">  </li>
			<li> <center> <button type="submit" name="btnsearch" class="btn btn-success">گه‌ڕان</button></center></li>
			  	</form>
		

			  
			  
       
		</ul>
      <ul class="nav navbar-nav navbar-right">
		  <li>
		<form method="post" enctype="multipart/form-data">	 
			<center><button class="btn btn-danger" name="logout">‌<a href="index.php" style="color: white;text-decoration: none;">چوونه‌ژوره‌وه‌‌‌‌</a></button></center></form>
			  
			
			 
			  
		  </li></ul>

		  
		 
      </ul>
    </div>
  </div>
</nav>
  <div class="container">
		  <?php
			if(isset($_POST["btnsearch"])){
				$search=mysqli_real_escape_string($con,$_POST["search"]);
				$search=htmlspecialchars($search);
				
				$sql=mysqli_query($con,"select * from bakarhenar where full_name='".$search."'");
				
				if(mysqli_num_rows($sql)>0){
					while($r=mysqli_fetch_assoc($sql)){
						echo "<a href='nardn.php?id=$r[id_bakarhenar]'> ".$r["full_name"]." </a>";
					}
				}
				
				else {
				
			
			?>
			
			<script type="text/javascript">
			alert("نه‌دۆزرایه‌وه‌");
			</script>
			<?php
				}
			}
			?>
		  </div>
<?php
if(isset($_GET["id"])){?>
		  <div class="col-sm-12 col-md-8 col-lg-4 d1">
				

		<?php $qu=mysqli_query($con,"select * from bakarhenar where id_bakarhenar='".$_GET["id"]."'") ;
			
			while ($row=mysqli_fetch_array($qu)){
				?>
			<div class="col-sm-12"><img src="image/<?php echo $row['image'] ?>" class=" col-sm-12 dimg"> </div> <div class="col-sm-12" ><center><?php echo $row["full_name"];?></center></div> <?php } ?>
			<div class="col-sm-12" >
			  <div class="col-sm-12">
				  <form method="post">
				  <input type="text" name="message" placeholder="... نامه‌كه‌ت بنووسه‌ ">
				  <button type="submit" name="submit" class="col-sm-12 btn btn-success">ناردن</button></form>
				  				
<?php
if(isset($_POST["submit"])){
	$message=mysqli_real_escape_string($con,$_POST["message"]);
	$message=htmlspecialchars($message);

 if(empty($message)){
	 ?>
			
			<script type="text/javascript">
			alert("‌‌نامه‌كه‌ت به‌تاڵه‌");
			</script>
			<?php
 }
	else {
		$d=date("Y-m-d  h:i:s");
		$insert=mysqli_query($con,"insert into namakan (id_bakarhenar,nama,date) values('".$_GET["id"]."','".$message."','".$d."')");
		if(isset($insert)){
			 ?>
			
			<script type="text/javascript">
			alert("‌‌نامه‌كه‌ت نێردرا‌");
			</script>
			<?php
		}
		
	}

?>
				</div>
			  </div>

			<?php
			}
					  }


			?>	
	</div>
		  </div>


		
</body>
</html>
