<?php 
$semuadata=array();
$tanggal_mulai="-";
$tanggal_selesai="-";

if(isset($_POST["kirim"])){
    $tanggal_mulai = $_POST["tglm"];
    $tanggal_selesai = $_POST["tgls"];
    $ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON
        pm.id_pelanggan=pl.id_pelanggan WHERE tanggal_pembelian BETWEEN '$tanggal_mulai' AND '$tanggal_selesai'");
    while($pecah = $ambil->fetch_assoc()){
        $semuadata[] = $pecah;
    }
    //echo "<pre>";
    //print_r ($semuadata);
    //echo "</pre>";
}
?>


<h2>Laporan Pembelian</h2>
<hr>

<form method="post">
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" class="form-control" name="tglm" value="<?php echo $tanggal_mulai?>">
            </div>
        </div>
        <div class="col-md-5">
        <div class="form-group">
                <label>Tanggal Selesai</label>
                <input type="date" class="form-control" name="tgls" value="<?php echo $tanggal_selesai?>">
            </div>
        </div>
        <div class="col-md-2">
            <label>&nbsp;</label><br>
            <button class="btn btn-primary" name="kirim">Lihat Laporan</button>
        </div>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>NO</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $total=0;?>
        <?php foreach ($semuadata as $key => $value): ?>
        <?php $tanggal = $value['tanggal_pembelian'];?>
        <?php $total+=$value['total_pembelian'];?>
        <tr>
            <td><?php echo $key+1;?></td>
            <td><?php echo $value["nama_pelanggan"];?></td>
            <td><?php echo date('d-m-Y',strtotime($tanggal)); ?></td>
            <td>Rp. <?php echo number_format ($value["total_pembelian"]);?></td>
            <td><?php echo $value["status_pembelian"];?></td>
        </tr>
        <?php endforeach?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3">Total</th>
            <th>Rp. <?php echo number_format($total)?></th>
            <th></th>
        </tr>
    </tfoot>
</table>