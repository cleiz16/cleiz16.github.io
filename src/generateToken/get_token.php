<?php
if(!isset($_SESSION)) 
    { 
	session_set_cookie_params(9000,"/",".iotkc01.me");
	session_start();
	}

	require_once($_SERVER['DOCUMENT_ROOT'].'/pr3tcurl/src/controller/account.php');
	function get_token(){
		GLOBAL $token;
		GLOBAL $refreshToken;
		GLOBAL $username_tb;
		GLOBAL $password_tb;
		GLOBAL $url_server;
		$data = "{\"username\":\"".$username_tb."\",\"password\":\"".$password_tb."\"}"	;
		$url = $url_server."/api/auth/login";
		$headers =array(
			'Content-Type:application/json',
			'Accept:application/json'
		);
		$ch= curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);			
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// Thực thi CURL
		$json = curl_exec($ch);
		// Ngắt CURL, giải phóng
		$result = curl_close($ch);
		// Giải mã chuỗi JSON
		$obj = json_decode($json,true);
		//Lưu trữ giá trị trả về
		$_SESSION["token"] = $obj["token"];
		$_SESSION["refreshToken"] = $obj["refreshToken"];

		return $obj;
	}
	function f5token($tokenAPI,$refreshTokenAPI){
		GLOBAL $token;
		GLOBAL $refreshToken;

		$data = "{\"refreshToken\":\"". $refreshTokenAPI . "\"}";
		$headers =array(
			'Content-Type:application/json',
			'Accept:Bearer ' . $tokenAPI
		);
		$ch= curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://104.40.7.210:8080/api/auth/token");
		curl_setopt($ch, CURLOPT_POST,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);			
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// Thực thi CURL
		$json = curl_exec($ch);
		// Ngắt CURL, giải phóng
		$result = curl_close($ch);
		//Giải mã chuỗi JSON trả về
		$obj = json_decode($json,true);
		// Gán giá trị vào biến toàn cục
		$token = $obj["token"];
		$refreshToken = $obj["refreshToken"];
		// In kết quả ra màn hình
		return $obj;
	}
	// echo $_SESSION["token"];
	if(!isset($_SESSION["token"])){
		get_token();
	}
	// echo "Token: ".$_SESSION["token"];
	// echo "<br>";
	// echo "refreshToken: ".$_SESSION["refreshToken"];

    // f5token( $_SESSION["token"], $_SESSION["refreshToken"]);
	// echo $_SESSION["token"]."\n";
	// echo $_SESSION["refreshToken"];
?>