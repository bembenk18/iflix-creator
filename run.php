<?php 
function post($url = null, $data = null, $headers = null) {
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLINFO_HEADER_OUT, true);
	curl_setopt($ch, CURLOPT_POST, true);

	if ($data != "") {
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	}

	if ($headers != "") {
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	}

	return $result = curl_exec($ch);
	curl_close($ch);
}


function get($url = null, $headers = null) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	if ($headers != "") {
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	}

	return $result = curl_exec($ch);
	curl_close($ch);
}


function number($length) {
	$characters = '0123456789';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

function create_iflix() {
	$name_fake = get('https://name-fake.com/id_ID');
	preg_match('/<div class="subj_div_45g45gg" id="copy1">(.*?)<\/div>/s', $name_fake, $name);
	preg_match('/<div id="copy4">(.*?)<\/div>/s', $name_fake, $email);


	$headers = [
		'Host: www.iflix.com',
		'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:76.0) Gecko/20100101 Firefox/76.0',
		'Accept: application/json',
		'Referer: https://www.iflix.com/id/en/browse?register=true',
		'Content-Type: application/json',
		'Cookie: build-release=stable; _u=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6NDQsInZlcnNpb24iOjIsImEiOjQ3MjA4MTk3NCwicCI6NDcxNjQ3MDQ1LCJlIjo1NTA1MjQ2MTQsImkiOiIiLCJpZGVudGl0eVR5cGUiOiJ2aXNpdG9yIiwiaTRhIjp0cnVlLCJmbCI6ZmFsc2UsImdsb2JhbCI6ZmFsc2UsImF1dGhvcml6YXRpb24iOiJCZWFyZXIgMGNmODczMzQtYzk5NC00ZWIwLTg4ZjItMDJlYWNmYzAzOTY4Iiwic2lkIjoiNmFjMmUxODdlMzRjM2VjMmZkODE2ZjFmOTBiMmI4M2IxNzgyZDQ2N35BOENEQURFMkU0QTdGOEM2QTU0RTQ5QzM3NjJDNkE2NCIsIm5hbWUiOiIiLCJ2aWQiOjQ0LCJ1bmlxdWVJRCI6IjU0MzUwOWU2LWMwN2ItNGQzMi05ZWQyLWNkNzFjZTViZTgxNy1peGRqIiwibWF4UmF0aW5nIjoiYWR1bHRzIiwibGFuZyI6ImVuX1VTIiwidmlzaXRvciI6dHJ1ZSwiZUlhdCI6MTU5MDA4NjQ5MSwiYUlhdCI6MTU5MDA4NjYzMCwiZXhwIjoxNTkyNTA1ODMwLCJpYXQiOjE1OTAwODY2MzAsImlzcyI6Imh0dHBzOi8vaWQuaWZsaXguY29tIn0.gZICBR32CfPwE87RTEPSk_uD8IM2kUNOP4pJusYHYqA; lux_uid=15900864'.number(10).'; _ga=GA1.2.794169197.1590086494; _ga_XEVBJ0MPS7=GS1.1.1590086493.1.1.1590086635.0; _gcl_au=1.1.1079203672.1590086496; _gid=GA1.2.1717001541.1590086496; _fbp=fb.1.1590086500634.523061093; afUserId=430f6b89-577a-4787-9c6d-48311a345c18-p; _gat_UA-60124943-7=1'
	];

	$register = post('https://www.iflix.com/api/identity/v4/register', '{"deviceId":"543509e6-c07b-4d32-9ed2-cd71ce5be817-ixdj","deviceName":"Win32","name":"'.$name[1].'","email":"'.$email[1].'","password":"rhxfiles"}', $headers);

	if (strripos($register, '"account"')) {
		echo $data = "\n[+] ".$email[1]." | rhxfiles\r";
		$fh = fopen("result_iflix.txt", "a");
        fwrite($fh, $data);
        fclose($fh);

	} else {
		echo "[!] \n";
	}
}
echo  "\n 
	  
";
echo "=====================================================================================================\n\n";



echo "		Iflix Account Creator	\n";
echo "+++++++++++++++++++++++++++++++++++++++++++++++++++++\n";
echo "	   Created by Bayu Putra Herlambang\n";
echo "=======================================================\n";
echo "[Input Jumlah]=>>";

$banyak = trim(fgets(STDIN));
for ($i = 0; $i < $banyak ; $i++) {
	create_iflix();
}
echo "Hasil kesimpen di result_iflix.txt\n";



?>
