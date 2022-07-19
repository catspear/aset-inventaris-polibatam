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

	
  // Load librari PHPExcel nya
  require_once '../..\assets\PHPExcel3\PHPExcel.php';

    // Panggil class PHPExcel nya
    $excel = new PHPExcel();

// Settingan awal fil excel
$excel->getProperties()->setCreator('PBL436')
					   ->setLastModifiedBy('Admin')
					   ->setTitle("databarang")
					   ->setSubject("barang")
					   ->setDescription("Laporan databarang")
					   ->setKeywords("data barang");
// styler
	$style_col = array(
		'font' => array('bold' => true), // Set font nya jadi bold
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		),
		'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		),
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array('rgb' => 'ffff00')
		)
    );

    $style_row = array(
		'alignment' => array(
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		),
		
	);
	
// end styler

// header
	$excel->setActiveSheetIndex(0)->setCellValue('A1', "NO"); 
	$excel->setActiveSheetIndex(0)->setCellValue('B1', "KODE BARANG"); 
	$excel->setActiveSheetIndex(0)->setCellValue('C1', "NAMA BARANG"); 
	$excel->setActiveSheetIndex(0)->setCellValue('D1', "KONDISI"); 
	$excel->setActiveSheetIndex(0)->setCellValue('E1', "MERK"); 
	$excel->setActiveSheetIndex(0)->setCellValue('F1', "TGL REKAM"); 
	$excel->setActiveSheetIndex(0)->setCellValue('G1', "TGL PEROLEHAN"); 
	$excel->setActiveSheetIndex(0)->setCellValue('H1', "NILAI PEROLEHAN PERTAMA"); 
	$excel->setActiveSheetIndex(0)->setCellValue('I1', "RUANGAN"); 
	

	$excel->getActiveSheet()->getStyle('A1:I1')->applyFromArray($style_row);

	// Set height baris ke 1, 2 dan 3
	$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
	$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
	$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
	$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
	$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
	$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
	$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
	$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
	$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
// end header

// body
	// Buat query untuk menampilkan semua data
	$sql = $mysqli->query("SELECT * FROM inventory ORDER BY id ASC");

	$no = 1; 
	$numrow = 2; 
	while($m = mysqli_fetch_array($sql)){ 
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $m['kode_barang']);
		$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $m['nama_barang']);
		$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $m['kondisi']);
		$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $m['merk']);
		$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $m['tgl_rekam']);
		$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $m['tgl_perolehan']);
		$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $m['nilai_perolehan']);
		$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $m['ruangan']);

		
		// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
	
		$no++; 
		$numrow++; 
	}

	// Set width kolom
	$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom no A
	$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom sub B
	$excel->getActiveSheet()->getColumnDimension('C')->setWidth(20); // Set width kolom sub B
	$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
	$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
	$excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
	$excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
	$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
	$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15); // Set width kolom category C
// end body



// Set judul file excel page setup
	$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
	$excel->getActiveSheet(0)->setTitle("data_barang");
	$excel->setActiveSheetIndex(0);
// end judul

// Proses file excel
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment; filename="data_barang.xlsx"'); // Set nama file excel nya
	header('Cache-Control: max-age=0');
// end proses file excel

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');
?>
