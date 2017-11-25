<?php
require "../ongkir/koneksi.php";
include "../core/init.php";
//session_start();
$id = $_GET["q"];
$kode_pemb = $_SESSION["kode_pembeli1"];
$id_kota = "";
$sql = mysqli_query($db, "SELECT* from pembeli where kode_pembeli = '$kode_pemb'");
while ($hasil1 = mysqli_fetch_array($sql)) {
	$id_kota = $hasil1["kode_kot"];
}
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=365&destination=$id_kota&weight=1&courier=jne",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: $APIKeyRaja"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
$service = "";
curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
$hasil = json_decode($response, true);
	$nama_service = "JNE ".$hasil['rajaongkir']['results'][0]['costs'][$id]['service']." ("
					.$hasil['rajaongkir']['results'][0]['costs'][$id]['description'].")";
	$biaya = $hasil['rajaongkir']['results'][0]['costs'][$id]['cost'][0]['value'];
	$lama = $hasil['rajaongkir']['results'][0]['costs'][$id]['cost'][0]['etd'];
	$service = "<div class=\"well\" style=\"border:1px ;border-radius: 3px\">
					
					Biaya kirim : Rp " .number_format($biaya,0,",","."). " /kg <br>
					Lama kirim  : " .$lama. " hari
					<input type='hidden' name='nama_service' value='" .$nama_service. "'/>
					<input type='hidden' name='biaya' value='" .$biaya. "'/>
					<input type='hidden' name='lama' value='" .$lama. " hari'/>
				</div>";
}


// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($service=="") {
  $response="";
} else {
  $response=$service;
}

//output the response
echo $response;
?>
