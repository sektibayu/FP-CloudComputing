<?php
	if(!(isset($_SESSION['nrp']) && isset($_SESSION['nama']))) header("location: ../../");
	include "../../database/connect.php";
	session_start();
	echo "NRP: ".$_SESSION['nrp']."<br>";
	echo "Nama: ".$_SESSION['nama']."<br>";

	if(isset($_POST['matkul'])){
		$id_matkul = $_POST['matkul'];
		$nrp = $_SESSION['nrp'];
		$nama = $_SESSION['nama'];
		$sql = "INSERT INTO mengambil_kelas(id_kelas,nrp,nama_mahasiswa)VALUE('".$id_matkul."','".$nrp."','".$nama."')";
		$result = mysqli_query($conn, $sql);
		if($result){
			echo "<font color='green'>anda berhasil mengambil</font>";
		}else{
			echo "<font color='red'>anda sudah mengambil</font>";
		}
	}
?>
<br>
<form action="" method="post">
  <div class="container">
  	Ambil Mata Kuliah:
    <select name="matkul">
    <?php
    	$sql = "SELECT id_kelas,nama_kelas FROM kelas";
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)) { ?>
		  <option value="<?php echo $row['id_kelas'] ?>"><?php echo $row['nama_kelas'] ?></option>
		<?php } ?>
	</select>
    <button type="submit">Ambil</button>
  </div>
</form>


