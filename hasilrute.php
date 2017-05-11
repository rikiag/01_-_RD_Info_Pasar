<!DOCTYPE html>
<html>
	<body>
		
		<?php
		
		$host = "localhost";
		$username = "root";
		$address = "";
		$database = "rutejasa";
		
		$connect = mysqli_connect ($host, $username, $address, $database) or die ("gagal terkoneksi ke databse");
		
		$username = $_POST["username"];
		$address  = $_POST["address"];
		
		mysqli_query ($connect, "insert into biodata (username, address) values('$username', '$address')");
		?> 
		
		username     : <?php echo $_POST['username']; ?> <br>
		address      : <?php echo $_POST['address']; ?> <br>
		
	</body>
</html>