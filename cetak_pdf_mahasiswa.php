<?php
// <-- bagian: import pustaka Dompdf -->
require 'vendor/autoload.php';

use Dompdf\Dompdf;

// <-- bagian: logika ketika tombol submit ditekan -->
if (isset($_POST['submit'])) {
     // Ambil nilai input 'nama' dari form
    $nama = $_POST['nama'];
     // Ambil nilai input 'nim' dari form
    $nim = $_POST['nim'];

    // <-- bagian: inisialisasi objek Dompdf -->
    $dompdf = new Dompdf();
    
    // <-- bagian: membuat HTML yang akan dikonversi ke PDF -->
    $html = "
    <h1>Data Mahasiswa</h1>
    <p><strong>Nama:</strong> $nama</p>
    <p><strong>NIM:</strong> $nim</p>
    ";

    // <-- bagian: memuat HTML ke Dompdf -->
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait'); // <-- bagian: mengatur ukuran kertas -->
    $dompdf->render(); // <-- bagian: render PDF -->

    // <-- bagian: menampilkan PDF di browser tanpa download -->
    $dompdf->stream("data_mahasiswa.pdf", array("Attachment" => 0));
    exit; // <-- bagian: menghentikan eksekusi setelah PDF ditampilkan -->
}
?>

<!-- bagian: form HTML untuk input data mahasiswa -->
<!DOCTYPE html>
<html>
<head>
    <title>Form Cetak PDF</title>
</head>
<body>
    <h2>Form Input Mahasiswa</h2>
     <!-- bagian: form input nama dan NIM --> 
    <form method="post">
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>NIM:</label><br>
        <input type="text" name="nim" required><br><br>

        <button type="submit" name="submit">Cetak PDF</button>
    </form>
</body>
</html>
