<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Barang</h3>
                <br>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default">
                <i class = "fa fa-add"> Tambah Barang </i>
                </button>
                <a href="index.php?page=import_barang">
                <button type="button" class="btn btn-light">
                <i class = "fa fa-save"> Import Barang </i>
                </a>
                </button>
                <br><br>

                <a href="page/barang/print_barang.php">
                <button type="button" class="btn btn-success" >
                  <i class = "fa fa-print"> Print Barang </i>
                </button>
                </a>
                <a href="page/barang/export_barang.php">
                <button type="button" class="btn btn-danger" >
                  <i class = "fa fa-print"> Export Barang </i>
                </button>
                </a>
               
              </div>

                <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>QRCode</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Kondisi</th>
                        <th>Merk</th>
                        <th>Tgl_Rekam</th>
                        <th>Tgl_Perolehan</th>
                        <th>Ruangan</th>
                        <th>Action</th>
                    </tr>
                </thead>

 <tbody>
                    <?php
                        $no = 0;
                        $admin=$mysqli->query("SELECT * FROM inventory");
                        while($m=mysqli_fetch_array($admin)){
                        $no++;  
                    ?>
                    <tr>
                        <td><?php echo $no ; ?></td>
                        <td>
                          <?php
                            $kode = "PBL436/".$m['kode_barang']."/".$m['nama_barang']."/".$m['kondisi']."/".$m['merk']."/".$m['tgl_rekam']."/".$m['tgl_perolehan']."/".$m['ruangan']."";
                            require_once('assets/qrcode/qrlib.php');
                            QRcode::png("$kode","kode".$no.".png","M", 2,2);
                          ?>
                          <img src="kode<?= $no ?>.png" alt="">
                        </td>
                        <td><?php echo $m['kode_barang']; ?></td>
                        <td><?php echo $m['nama_barang']; ?></td>
                        <td><?php echo $m['kondisi']; ?></td>
                        <td><?php echo $m['merk']; ?></td>
                        <td><?php echo $m['tgl_rekam']; ?></td>
                        <td><?php echo $m['tgl_perolehan']; ?></td>
                        <td><?php echo $m['ruangan']; ?></td>
      
                  
                        <td>
                        <a href="index.php?page=edit_barang&kode=<?php echo $m['id'];?>">
                          <button type="button" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                        </a>
                        <a href="index.php?page=delete_barang&kode=<?php echo $m['id'];?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')">
                          <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </a>
                          <a href="index.php?page=print_qrcode&kode=<?php echo $m['id'];?>">
                          <button type="button" class="btn btn-info"><i class="fa fa-print"></i></button>
                        </a>
                        </td>
                        
                    </tr>
                        <?php } ?>
                </tbody>
                </table>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

                <!-- /.content -->
      <!-- modal form tambah data -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">FORM TAMBAH BARANG</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" method="post" action="index.php?page=create_barang">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">KODE BARANG</label>
                    <input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Isi Kode Barang Anda">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">NAMA BARANG</label>
                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Isi Nama Barang Anda">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">KONDISI</label>
                    <input type="text" class="form-control" name="kondisi" id="kondisi" placeholder="Isi Kondisi Barang Anda">
                  </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">MERK</label>
                    <input type="text" class="form-control" name="merk" id="merk" placeholder="Isi Merk Barang Anda">
                  </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">TGL REKAM</label>
                    <input type="date" class="form-control" name="tgl_rekam" id="tgl_rekam" placeholder="Tanggal Rekam ">
                  </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">TGL PEROLEHAN</label>
                    <input type="date" class="form-control" name="tgl_perolehan" id="tgl_perolehan" placeholder="Tanggal Perolehan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">NILAI PEROLEHAN PERTAMA</label>
                    <input type="text" class="form-control" name="nilai_perolehan" id="nilai_perolehan" placeholder="Isi Harga Barang ">
                  </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">RUANGAN</label>
                    <input type="text" class="form-control" name="ruangan" id="ruangan" placeholder="Lokasi Barang">
                  </div>
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>