<?php

print_r($_POST);
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];

$txt_msg = "Name%20=%20$name,%0APhone%20=%20$phone,%0AEmail%20=%20$email,%0AMessage%20=%20$message";

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://email-sender1.p.rapidapi.com/?txt_msg=".$txt_msg."&to=nick.napat123%40gmail.com&from=V1-AutoMail&subject=%20Contact%20Requirement",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "{\n    \"key1\": \"value\",\n    \"key2\": \"value\"\n}",
	CURLOPT_HTTPHEADER => [
		"content-type: application/json",
		"x-rapidapi-host: email-sender1.p.rapidapi.com",
		"x-rapidapi-key: 252c7c4571msh1d3d7d6eb7935e7p18fbc8jsn57c4b220c8f8"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if($err){
	echo "<script>window.top.window.showResult('2');</script>";
}else{
	echo "<script>window.top.window.showResult('1');</script>";
}
?>