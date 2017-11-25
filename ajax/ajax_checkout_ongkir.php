<?php
include "../core/init.php";
$kd_plg = $_GET["q"];
$detail_alamat = "";
$sql1 = mysqli_query($db,"SELECT * FROM pembeli WHERE  kode_pembeli = '$kode_pembeli1'");
while ($hasil1 = mysqli_fetch_array($sql1)) {
	$id_kota = $hasil1['kota'];
	$APIKeyRaja = "43a32e5cdde092ace72281fac5bf0ace";
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://rajaongkir.com/api/starter/cost",
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
	$list_ongkir = "<option value=''>Pilih Kurir</option>";
	curl_close($curl);
	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	$hasil = json_decode($response, true);
		for($i=0; $i<count($hasil['rajaongkir']['results'][0]['costs']); $i++){
			for($ix=0; $ix<count($hasil['rajaongkir']['results'][0]['costs'][$i]['cost']); $ix++){
			$list_ongkir .= "<option value=".$i.">JNE ".$hasil['rajaongkir']['results'][0]['costs'][$i]['service']." (".$hasil['rajaongkir']['results'][0]['costs'][$i]['description'].")";
			}
		}
	}
}
if ($list_ongkir=="") {
  $response="";
} else {
  $response=$list_ongkir;
}

//output the response
echo $response;
?>