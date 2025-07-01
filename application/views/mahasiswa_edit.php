<html>


<body>
	<h1>Update Data Mahasiswa</h1>
	<?php foreach ($mahasiswa as $_rowData); ?>
	<?= form_open('Mahasiswa/Update'); ?>
	<table>
		<tr>
			<td>NIM</td>
			<td>
				<input type="hidden" name="old_nim" value="<?= $_rowData->nim; ?>" />
				<input type="text" name="nim" value="<?= $_rowData->nim; ?>" required>

			</td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>
				<input type="text" name="nama" value="<?= $_rowData->nama; ?>" required>
			</td>
		</tr>
		<tr>
			<td>Prodi</td>
			<td>
				<select name="id_prodi">
					<?php foreach ($prodi as $_prodi) { ?>
						<option value="<?= $_prodi->id; ?>"> <?= $_prodi->nama; ?> </option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" Value="Update">
			</td>
		</tr>
	</table>
	</form>
</body>

</html>