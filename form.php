<?php
// Proses hanya jika ada data yang dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari formulir kontak
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Tentukan alamat email tujuan
    $to = "tujuan@example.com";

    // Bangun pesan email
    $email_message = "Nama: ".$name."\n";
    $email_message .= "Email: ".$email."\n";
    $email_message .= "Subjek: ".$subject."\n";
    $email_message .= "Pesan:\n".$message."\n";

    // Set header email
    $headers = "From: ".$email."\r\n".
               "Reply-To: ".$email."\r\n".
               "X-Mailer: PHP/".phpversion();

    // Kirim email
    if (mail($to, $subject, $email_message, $headers)) {
        // Pesan sukses jika email terkirim
        echo "Pesan Anda telah terkirim. Terima kasih!";
    } else {
        // Pesan error jika terjadi masalah saat mengirim email
        echo "Maaf, pesan Anda tidak dapat dikirim. Silakan coba lagi.";
    }
}
?>
