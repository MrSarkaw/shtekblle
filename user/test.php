
<form method="post"><input type="text" name="nama" placeholder="... نامه‌كه‌ بنووسه‌ " ><button type="submit" name="nardn" class="btn btn-success col-sm-12">ناردن</button></form></div>
	</div>
<?php
require("connection/conn.php");
if(isset($_POST["nardn"])){
	$nama=mysqli_real_escape_string($con,$_POST["nama"]);
	$nama=htmlspecialchars($nama);
	if(empty($nama)){
		?>
<script type="text/javascript">
alert('نامه‌كه‌ به‌تاڵه‌');
</script>
<?php
	}
	else {
	$sql=mysqli_query($con,"INSERT INTO namakan ( id_bakarhenar, nama) VALUES ('10', '".$nama."')");
		if(isset($sql)){
			?>
<script type="text/javascript">
alert('نامه‌كه‌ به‌ سه‌ركه‌وتووی نێردرا');
</script>
<?php
		}
	}
}


?>