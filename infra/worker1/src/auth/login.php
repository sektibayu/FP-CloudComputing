<?php
	include "../database/connect.php";

	$user = $_POST["username"];
	$pass = $_POST["password"];
    // echo $user,$pass;
	$sql = "SELECT nrp,nama FROM mahasiswa WHERE nrp='".$user."' AND password='".$pass."'";
	// echo $sql;
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
		session_start();
		while($row = mysqli_fetch_assoc($result)) {
			$_SESSION['nrp'] = $row['nrp'];
			$_SESSION['nama'] = $row['nama'];
			// echo "nrp: " . $_SESSION["nrp"]. " - Nama: " . $_SESSION["nama"]."<br>";
			header("location: ../kuliah/ambil");
			break;
		}
	}else{
		echo "Salah NRP atau Password";
	}
	// if (mysqli_num_rows($result) > 0) {
	//     while($row = mysqli_fetch_assoc($result)) {
	//         echo "nrp: " . $row["nrp"]. " - Nama: " . $row["nama"]."<br>";
	//     }
	// } else {
	//     echo "0 results";
	// }
?>