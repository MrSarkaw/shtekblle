<!DOCTYPE html>

<?php 
	require("connection/conn.php"); 
		session_start();
	if(isset($_SESSION["id_bakarhenar"])){
		
		if(isset($_POST["logout"])){
			session_unset($_SESSION["id_bakarhenar"]);
			session_destroy();
				header("location: index.php");

		}
	}
else {
	header("location: index.php");
}

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
		::-webkit-scrollbar {
        width: 7px;
		background: #9198e5;
    }

    ::-webkit-scrollbar-thumb {
        border-radius: 10px;
        background-color: #e66465;
		border-radius: 30px;
    }
		
    
		#logo{
			width: 130px;
			height: 130px;
			position: relative;
			top: -65px;
			box-shadow: 0px 0px 10px 0.2px black;
		}
		.navbar{
			background-color: #9198e5;
			border:none;
		}
		#myNavbar>ul>li>a{
margin-left: 10px;		
		color: black;}	
		#myNavbar>ul>li>a:hover{
			color: white;
		}
		#myNavbar>ul>li>img{
			width: 20px;height: 20px;
			position: relative; top: -35px;
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

		  <li><a href="home.php">ماڵه‌وه‌</a></li>
		  <li><a href="update.php">‌چاكسازی</a></li>
			  
			  
       
		</ul>
      <ul class="nav navbar-nav navbar-right">
		  <li>
		<form method="post" enctype="multipart/form-data">	 
			<center><button class="btn btn-danger" name="logout">‌چوونه‌ ده‌ره‌وه‌</button></center></form>
			  
			
			 
			  
		  </li></ul>

		  
		 
      </ul>
    </div>
  </div>
</nav>
  
</body>
</html>
