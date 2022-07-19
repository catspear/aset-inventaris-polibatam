<?php
    $edit = $mysqli->query("SELECT * FROM inventory WHERE id = '$_GET[kode]'");
    $e = mysqli_fetch_array($edit);
?>
<form role="form" method="post" action="index.php?page=update_barang">
    <div class="card-body">
        <div class="form-group">
       <label for="exampleInputEmail1">KODE BARANG</label>
                    <input type="text" class="form-control" name="kode_barang"  value="<?php echo $e['kode_barang']; ?>" placeholder="Isi Kode Barang Anda">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">NAMA BARANG</label>
                    <input type="text" class="form-control" name="nama_barang"  value="<?php echo $e['nama_barang']; ?>" placeholder="Isi Nama Barang Anda">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">KONDISI</label>
                    <input type="text" class="form-control" name="kondisi" id="kondisi" value="<?php echo $e['kondisi']; ?>" placeholder="Isi Kondisi Barang Anda">
                  </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">MERK</label>
                    <input type="text" class="form-control" name="merk"  value="<?php echo $e['merk']; ?>" placeholder="Isi Merk Barang Anda">
                  </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">TGL REKAM</label>
                    <input type="date" class="form-control" name="tgl_rekam"  value="<?php echo $e['tgl_rekam']; ?>" placeholder="Tanggal Rekam ">
                  </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">TGL PEROLEHAN</label>
                    <input type="date" class="form-control" name="tgl_perolehan"  value="<?php echo $e['tgl_perolehan']; ?>"placeholder="Tanggal Perolehan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">NILAI PEROLEHAN PERTAMA</label>
                    <input type="text" class="form-control"  value="<?php echo $e['nilai_perolehan']; ?>" name="nilai_perolehan"  placeholder="Isi Harga Barang ">
                  </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">RUANGAN</label>
                    <input type="text" class="form-control" value="<?php echo $e['ruangan']; ?>" name="ruangan"  placeholder="Lokasi Barang">
           </div>
    
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>