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
		if(isset($_POST['submit'])){ 

			// Jika user mengklik tombol Import
			$nama_file_baru = 'data'.$iden.'.xlsx';
		
			// Load librari PHPExcel nya
			require_once '../..\assets\PHPExcel3\PHPExcel.php';
		
			$excelreader = new PHPExcel_Reader_Excel2007();
			$loadexcel = $excelreader->load('../..\tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
			$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
			$numrow = 1;
			foreach($sheet as $row){
				// Ambil data pada excel sesuai Kolom
					$id = $row['A']; 
					$kb = $row['B']; 
					$nmb= $row['C']; 
					$knd = $row['D']; 
					$mrk = $row['E']; 
					$tgr = $row['F']; 
					$tgp = $row['G']; 
					$rng = $row['H']; 
		
				
					// Cek jika semua data tidak diisi
					if($id == "" && $kd == "" && $nmb == "" && $knd  == "" && $mrk="" && $tgr=""
				 && $tgr ="" && $tgp ="" && $rng="")
						continue;

				if($numrow > 1){
					// Buat query Insert
					$mysqli->query( "INSERT INTO inventory  
					   VALUES('".$id."','".$kd."','".$nmb."','".$knd."','".$mrk."','".$tgr."','".$tgp."','".$rng."')");
}
				$numrow++; 
			}
		}?>
  <script>alert('Import Data Success')</script>";
  <script type='text/javascript'> document.location = '\../../index.php'; </script>"; 
