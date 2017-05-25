<!DOCTYPE html>
<html>
	<body>
		
		<?php
		
		$host = "localhost";
		$username = "root";
		$address = "";
		$addresstuju = "";
		$database = "rutejasaantar";
		
		$connect = mysqli_connect ($host, $username, $address, $addresstuju, $database) or die ("gagal terkoneksi ke databse");
		
		$username = $_POST["username"];
		$address  = $_POST["address"];
		$addresstuju  = $_POST["addresstuju"];
		
		mysqli_query ($connect, "insert into biodata (username, address, addresstuju) values('$username', '$address', '$addresstuju')");
		?> 
		
		username          : <?php echo $_POST['username']; ?> <br>
		address user      : <?php echo $_POST['address']; ?> <br>
		address pengiriman: <?php echo $_POST['addresstuju']; ?> <br>
		
	</body>
</html>