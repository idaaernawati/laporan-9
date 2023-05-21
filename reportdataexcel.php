<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Jenis Pendaftaran');
$sheet->setCellValue('C1', 'Taggal Masuk Sekolah');
$sheet->setCellValue('D1', 'NISN');
$sheet->setCellValue('E1', 'Nomor Peserta Ujian');
$sheet->setCellValue('F1', 'Apakah Pernah PAUD');
$sheet->setCellValue('G1', 'Apakah Pernah TK');
$sheet->setCellValue('H1', 'No. Seri SKHUN Sebelumnya');
$sheet->setCellValue('I1', 'No. Seri Ijazah Sebelumnya');
$sheet->setCellValue('J1', 'Hobi');
$sheet->setCellValue('K1', 'Cita-Cita');


$sheet->setCellValue('A5', 'No');
$sheet->setCellValue('B5', 'Nama Lengkap');
$sheet->setCellValue('C5', 'Jenis Kelamin');
$sheet->setCellValue('D5', 'NISN');
$sheet->setCellValue('E5', 'NIK');
$sheet->setCellValue('F5', 'Tempat Lahir');
$sheet->setCellValue('G5', 'Tanggal Lahir');
$sheet->setCellValue('H5', 'Agama');
$sheet->setCellValue('I5', 'Berkebutuhan Khusus');
$sheet->setCellValue('J5', 'Alamat Jalan');
$sheet->setCellValue('K5', 'RT');
$sheet->setCellValue('L5', 'RW');
$sheet->setCellValue('M5', 'Nama Dusun');
$sheet->setCellValue('N5', 'Nama Kelurahan/Desa');
$sheet->setCellValue('O5', 'Kecamatan');
$sheet->setCellValue('P5', 'Kode Pos');
$sheet->setCellValue('Q5', 'Tempat Tinggal');
$sheet->setCellValue('R5', 'Moda Transportasi');
$sheet->setCellValue('S5', 'Nomor HP');
$sheet->setCellValue('T5', 'E-mail Pribadi');
$sheet->setCellValue('U5', 'Penerima KPS/PKH/KIP    ');
$sheet->setCellValue('V5', 'No.KPS/KK/PKH/KIP');
$sheet->setCellValue('W5', 'Kewarganegaraan');
$sheet->setCellValue('X5', 'Nama Negara');


$sheet->setCellValue('A9', 'No');
$sheet->setCellValue('B9', 'Nama Ayah Kandung');
$sheet->setCellValue('C9', 'Tahun Lahir');
$sheet->setCellValue('D9', 'Pendidikan');
$sheet->setCellValue('E9', 'Pekerjaan');
$sheet->setCellValue('F9', 'Penghasilan Bulanan');
$sheet->setCellValue('G9', 'Berkebutuhan Khusus');


$sheet->setCellValue('A13', 'No');
$sheet->setCellValue('B13', 'Nama Ibu Kandung');
$sheet->setCellValue('C13', 'Tahun Lahir');
$sheet->setCellValue('D13', 'Pendidikan');
$sheet->setCellValue('E13', 'Pekerjaan');
$sheet->setCellValue('F13', 'Penghasilan Bulanan');
$sheet->setCellValue('G13', 'Berkebutuhan Khusus');

$koneksi = mysqli_connect("localhost", "root", "", "tgspendaftaran");
$query = mysqli_query($koneksi, "SELECT * FROM registrasi");

$i = 2;
$no = 1;
while ($row = mysqli_fetch_array($query)) {
    $sheet->setCellValue('A' . $i, $no++);
    $sheet->setCellValue('B' . $i, $row['jenis_pendaftaran']);
    $sheet->setCellValue('C' . $i, $row['tgl_masuk']);
    $sheet->setCellValue('D' . $i, $row['nis']);
    $sheet->setCellValue('E' . $i, $row['no_peserta_ujian']);
    $sheet->setCellValue('F' . $i, $row['pernah_paud']);
    $sheet->setCellValue('G' . $i, $row['pernah_tk']);
    $sheet->setCellValue('H' . $i, $row['no_skhun']);
    $sheet->setCellValue('I' . $i, $row['no_ijazah']);
    $sheet->setCellValue('J' . $i, $row['hobi']);
    $sheet->setCellValue('K' . $i, $row['cita_cita']);
    $i++;
}

$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];
$sheet->getStyle('A1:K' . ($i - 1))->applyFromArray($styleArray);


$koneksi = mysqli_connect("localhost", "root", "", "tgspendaftaran");
$query = mysqli_query($koneksi, "SELECT registrasi.*, pribadi.*
                                FROM registrasi
                                JOIN pribadi ON registrasi.id_regis = pribadi.id_pribadi");

$i = 6;
$no = 1;
while ($row = mysqli_fetch_array($query)) {
    $sheet->setCellValue('A' . $i, $no++);
    $sheet->setCellValue('B' . $i, $row['nama']);
    $sheet->setCellValue('C' . $i, $row['jenis_kelamin']);
    $sheet->setCellValue('D' . $i, $row['nisn']);
    $sheet->setCellValue('E' . $i, $row['nik']);
    $sheet->setCellValue('F' . $i, $row['tempat_lahir']);
    $sheet->setCellValue('G' . $i, $row['tanggal_lahir']);
    $sheet->setCellValue('H' . $i, $row['agama']);
    $sheet->setCellValue('I' . $i, $row['berkebutuhan_khusus']);
    $sheet->setCellValue('J' . $i, $row['alamat']);
    $sheet->setCellValue('K' . $i, $row['rt']);
    $sheet->setCellValue('L' . $i, $row['rw']);
    $sheet->setCellValue('M' . $i, $row['dusun']);
    $sheet->setCellValue('N' . $i, $row['kelurahan']);
    $sheet->setCellValue('O' . $i, $row['kecamatan']);
    $sheet->setCellValue('P' . $i, $row['kode_pos']);
    $sheet->setCellValue('Q' . $i, $row['tempat_tinggal']);
    $sheet->setCellValue('R' . $i, $row['moda_transportasi']);
    $sheet->setCellValue('S' . $i, $row['no_hp']);
    $sheet->setCellValue('T' . $i, $row['email']);
    $sheet->setCellValue('U' . $i, $row['kip']);
    $sheet->setCellValue('V' . $i, $row['no_kip']);
    $sheet->setCellValue('W' . $i, $row['kewarganegaraan']);
    $sheet->setCellValue('X' . $i, $row['negara']);
    $i++;
}

$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];
$sheet->getStyle('A5:X' . ($i - 1))->applyFromArray($styleArray);


$koneksi = mysqli_connect("localhost", "root", "", "tgspendaftaran");
$query = mysqli_query($koneksi, "SELECT registrasi.*, pribadi.*, ayah.*
                                FROM registrasi
                                JOIN pribadi ON registrasi.id_regis = pribadi.id_pribadi
                                JOIN ayah ON registrasi.id_regis = ayah.id_ayah");

$i = 10;
$no = 1;
while ($row = mysqli_fetch_array($query)) {
    $sheet->setCellValue('A' . $i, $no++);
    $sheet->setCellValue('B' . $i, $row['nama_ayah']);
    $sheet->setCellValue('C' . $i, $row['tahun_lahir']);
    $sheet->setCellValue('D' . $i, $row['pendidikan']);
    $sheet->setCellValue('E' . $i, $row['pekerjaan']);
    $sheet->setCellValue('F' . $i, $row['penghasilan_bulan']);
    $sheet->setCellValue('G' . $i, $row['berkebutuhan_khusus']);
    $i++;
}

$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];
$sheet->getStyle('A9:G' . ($i - 1))->applyFromArray($styleArray);


$koneksi = mysqli_connect("localhost", "root", "", "tgspendaftaran");
$query = mysqli_query($koneksi, "SELECT registrasi.*, pribadi.*, ayah.*, ibu.*
                                FROM registrasi
                                JOIN pribadi ON registrasi.id_regis = pribadi.id_pribadi
                                JOIN ayah ON registrasi.id_regis = ayah.id_ayah
                                JOIN ibu ON registrasi.id_regis = ibu.id_ibu");

$i = 14;
$no = 1;
while ($row = mysqli_fetch_array($query)) {
    $sheet->setCellValue('A' . $i, $no++);
    $sheet->setCellValue('B' . $i, $row['nama_ibu']);
    $sheet->setCellValue('C' . $i, $row['tahun_lahir']);
    $sheet->setCellValue('D' . $i, $row['pendidikan']);
    $sheet->setCellValue('E' . $i, $row['pekerjaan']);
    $sheet->setCellValue('F' . $i, $row['penghasilan_bulan']);
    $sheet->setCellValue('G' . $i, $row['berkebutuhan_khusus']);
    $i++;
}

$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];
$sheet->getStyle('A13:G' . ($i - 1))->applyFromArray($styleArray);

$writer = new Xlsx($spreadsheet);
$writer->save('data.xlsx');
?>