
<?php
if (!isset($_POST['token']) || empty($_POST['token'])) {
    die("Token tidak dikirim.");
}

$token = $_POST['token'];
$header = array("Authorization: Bearer " . $token);

$query = http_build_query(array("page" => '1'));

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://bukaolshop.net/api/v1/produk/list?" . $query);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$hasil = curl_exec($ch);
curl_close($ch);

echo $hasil;
