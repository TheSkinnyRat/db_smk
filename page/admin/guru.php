<?php session_start();
if($_SESSION && $_SESSION['login'] == 'admin'){ ?>
<?php require_once('assets/header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->
<?php
$query = mysql_query("select * from tbl_guru");
?>

<div class="content">
	<div class="font">

		<div style="font-size: 25pt;">
			<center>DATA GURU</center>
		</div><hr>
		<a href="guru_form.php"><button class="button button1">+ Tambah</button></a>
		<?php if (isset($_SESSION['notif'])) echo $_SESSION['notif']; unset($_SESSION['notif']);?>
		<table style="text-align: center;" border="3" cellpadding="4" width="100%" height="auto">
			<tr>
				<th>NIP</th>
				<th>PASSWORD</th>
				<th>NAMA</th>
				<th>TEMPAT LAHIR</th>
				<th>TANGGAL LAHIR</th>
				<th>EMAIL</th>
				<th>NO TLP</th>
				<th>JK</th>
				<th colspan="2">ACTION</th>
			</tr>
			<?php
while ($data = mysql_fetch_assoc($query)) {
?>
			<tr>
				<td>
					<?php echo $data['nip'];  ?>
				</td>
				<td>
					<?php echo $data['password'];  ?>
				</td>
				<td>
					<?php echo $data['nama'];  ?>
				</td>
				<td>
					<?php echo $data['tempat_lahir']; ?>
				</td>
				<td>
					<?php echo $data['tanggal_lahir']; ?>
				</td>
				<td>
					<?php echo $data['email']; ?>
				</td>
				<td>
					<?php echo $data['no_tlp']; ?>
				</td>
				<td>
					<?php echo $data['jenis_kelamin']; ?>
				</td>
				<td>
					<form action="guru_form.php" method="post">
						<input type="hidden" name="nip" value="<?php echo $data['nip']; ?>">
						<input type="submit" name="edit" class="button button-info" value="Edit">
					</form>
				</td>
				<td>
					<form action="action/guru_act.php" method="post">
						<input type="hidden" name="nip" value="<?php echo $data['nip']; ?>">
						<input type="submit" name="hapus" class="button button-danger" value="Hapus">
					</form>
				</td>
			</tr>
			<?php
}
?>
		</table>

	</div>
</div>

<!-- WARNING END CONTENT ----------------------------------------------------------- -->
<?php require_once('assets/footer.php'); ?>
<?php }else{ ?>
<script language="javascript">
	document.location = '../../index.php'
</script>
<?php } ?>
