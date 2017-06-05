<?php
	session_start();
	if(!(isset($_SESSION['nrp']) && isset($_SESSION['nama']))) header("location: ../../");
	include "../../database/connect.php";
	echo "NRP: ".$_SESSION['nrp']."<br>";
	echo "Nama: ".$_SESSION['nama']."<br>";

	if(isset($_POST['matkul'])){
		$id_matkul = $_POST['matkul'];
		$id_kelas = $_POST['kelas'];
		$nrp = $_SESSION['nrp'];
		$sql = "INSERT INTO mengambil_kelas(nrp,id_matkul,id_kelas)VALUE('".$nrp."','".$id_matkul."','".$id_kelas."')";
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
    <select name="matkul" required>
    <option></option>
    <?php
    	$sql = "SELECT id_matkul,nama FROM mata_kuliah";
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)) { ?>
		  <option value="<?php echo $row['id_matkul'] ?>"><?php echo $row['nama'] ?></option>
		<?php } ?>
	</select>
	Kelas:
    <select name="kelas" required>
    <option></option>
    <?php
    	$sql = "SELECT id_kelas,nama FROM kelas";
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)) { ?>
		  <option value="<?php echo $row['id_kelas'] ?>"><?php echo $row['nama'] ?></option>
		<?php } ?>
	</select>
    <button type="submit">Ambil</button>
  </div>
</form>


