<h2>Data Kategori</h2>
<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   

</head>
<body>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Nama Kategori</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $ambil=$koneksi->query("SELECT * FROM kategori"); ?>
        <?php while($pecah = $ambil ->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['kategori']; ?></td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>

    </tbody>
</table>
</body>
</html>
