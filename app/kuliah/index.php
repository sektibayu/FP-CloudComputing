<?php include "../database/connect.php"; ?>
<form action="" method="post">
  <div class="container">
  	Lihat Peserta Mata Kuliah:
    <select name="matkul">
    <?php
    	$sql = "SELECT id_kelas,nama_kelas FROM kelas";
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)) { ?>
		  <option value="<?php echo $row['id_kelas'] ?>"><?php echo $row['nama_kelas'] ?></option>
		<?php } ?>
	</select>
    <button type="submit">Lihat</button>
  </div>
</form>

<?php
if(isset($_POST['matkul'])){
	include "../database/connect.php";
	$id_matkul = $_POST['matkul'];
	$sql = "SELECT nrp,nama_mahasiswa FROM mengambil_kelas WHERE id_kelas='".$id_matkul."'";
	$result = mysqli_query($conn, $sql);
?>
	<table>
	  <tr>
	    <th>NRP</th>
	    <th>Nama</th>
	  </tr>
	  <?php while($row = mysqli_fetch_assoc($result)) { ?>
	  <tr>
	    <td><?php echo $row["nrp"] ?></td>
	    <td><?php echo $row["nama_mahasiswa"] ?></td>
	  </tr>
	  <?php } ?>
	</table> 
<?php	
}
?>