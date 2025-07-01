
<?php
/*echo "<h1> Data Mahasiswa Tanpa Model </h1>";
echo "<table>";
echo "<tr>" .
    "<td>No.</td>" .
    "<td>Nim</td>" .
    "<td>Nama</td>" .
    "<td>Prodi</td>" .
    "</tr>";
$no = 1;
foreach ($mahasiswa as $_data) {
    echo "<tr>" .
        "<td>" . $no . "</td>" .
        "<td>" . $_data->nim . "</td>" .
        "<td>" . $_data->nama . "</td>" .
        "<td>" . $_data->prodi . "</td>" .
        "</tr>";
    $no++;
}
echo "</table>";*/

echo "<h1> <b> Data Mahasiswa Dengan Model </b> </h1>";
echo "<a href='Add'>Tambah Data</a>";
echo "<table>";
echo "<tr>" .
    "<td> Action </td>".
	"<td>No.</td>" .
    "<td>Nim</td>" .
    "<td>Nama</td>" .
    "<td>Prodi</td>" .
    "</tr>";
$no = 1;
foreach ($mahasiswa_model as $_dataModel) {
    echo "<tr>" .
		"<td>
			<a href='Edit/$_dataModel->nim'> Edit</a>
			<a href='Hapus/$_dataModel->nim'> Hapus</a>
		</td>".
        "<td>" . $no . "</td>" .
        "<td>" . $_dataModel->nim . "</td>" .
        "<td>" . $_dataModel->nama . "</td>" .
        "<td>" . $_dataModel->prodi . "</td>" .
        "</tr>";
    $no++;
}
echo "</table>";
