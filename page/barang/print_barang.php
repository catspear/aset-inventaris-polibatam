<?php
 global $mysqli;
 $host="localhost";
 $user="root";
 $pass="";
 $database="dbadminlte";
 $mysqli=new mysqli($host,$user,$pass,$database);
 if (mysqli_connect_errno()) {
   trigger_error('Koneksi ke database gagal: '  . mysqli_connect_error(), E_USER_ERROR); 
 }
?>
<style>
    table{
        border-collapse : collapse;
        table-layout:fixed;
        width :483px;

    }
    table td{
        width:15%;
    }
</style>
<html>
<body>
<!-- kop surat -->
<table border="1" cellpading="1">
    <tr>
        <td style="width:40%; align=center;">
            <img src="../../assets/img/logo_polbat.png" width = "480" height="100" alt="">
        </td colspan="">
        <td style="width:80%;">
          <h3 style="text-align: center;">
          REPORT DATA BARANG
        </h3>
        </td>
        <td style="align=center;width:35%;">
            Jl. Ahmad Yani Batam Kota. Kota
        </td>
      </tr>
    </table>
    <br><br>
<!-- isi report -->
<table  border="1" cellpading="1">
<thead>
    <tr>
       <th>NO</th>
                        
            
                        <th>Nama Barang</th>
                        <th>Kondisi</th>
                        <th>Merk</th>
                        <th>Tgl_Rekam</th>
                        <th>Tgl_Perolehan</th>
                        <th>Nilai_Perolehan</th>
                        <th>Ruangan</th>
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
        <td style="width:10%;"><?php echo $no ; ?></td>
        
        <td style="width:30%;"><?php echo $m['nama_barang']; ?></td>
        <td style="width:15%;"><?php echo $m['kondisi']; ?></td>
        <td style="width:30%;"><?php echo $m['merk'];?></td>
        <td style="width:15%;"><?php echo $m['tgl_rekam'];?></td>
        <td style="width:15%;"><?php echo $m['tgl_perolehan'];?></td>
        <td style="width:15%;"><?php echo $m['nilai_perolehan'];?></td>
        <td style="width:15%;"><?php echo $m['ruangan'];?></td>        
    </tr>
    <?php } ?>
</tbody>

</table>
</body>
</html>

<?php
    $html = ob_get_contents();
    ob_end_clean();
    
    require_once('../../assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P','A4','en');
    $pdf->WriteHTML($html);
    $pdf->Output('report_user.pdf','D');
?>