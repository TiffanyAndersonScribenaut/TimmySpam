<?php
error_reporting(0);

$filename = "tokens.txt";
$invite = $_GET['join'];
$msg = $_GET['message'];
$channelid = $_GET['channelid'];


$fp = @fopen($filename, 'r'); 


if ($fp) {
   $array = explode("\n", fread($fp, filesize($filename)));
}

echo "Com amor do Priday.<br><hr>";
echo "Para os bots entrarem do index.php?join={invite}<br>Como spammar index.php?channelid={channelid}&message={message you wish to spam}<br><hr>";

if (isset($invite)) {
foreach ($array as &$token) {
	
	   $url = 'https://discordapp.com/api/v6/invite/'.$invite;
       $ch = curl_init($url);
        $options = array(
                CURLOPT_RETURNTRANSFER => true,        
                CURLOPT_HEADER         => false,       
                CURLOPT_FOLLOWLOCATION => false,        
               // CURLOPT_ENCODING       => "utf-8",           
                CURLOPT_AUTOREFERER    => true,         
                CURLOPT_CONNECTTIMEOUT => 20,         
                CURLOPT_TIMEOUT        => 20,          
                CURLOPT_POST            => 1,          
                CURLOPT_POSTFIELDS     => $request,    
                CURLOPT_SSL_VERIFYHOST => 0,            
                CURLOPT_SSL_VERIFYPEER => false,       
                CURLOPT_VERBOSE        => 1,
                CURLOPT_HTTPHEADER     => array(
                    "Authorization: $token"
                )

        );

        curl_setopt_array($ch,$options);
        $data = curl_exec($ch);
        $curl_errno = curl_errno($ch);
        $curl_error = curl_error($ch);
        
        curl_close($ch);
        echo "$token: $data<br>";
    }
}

if (isset($channelid)) {
while(true) {
foreach ($array as &$token) {
	
		if($msg == "") {
			die("Please enter a message.");
		}
	
	   $url = 'https://discordapp.com/api/v6/channels/'.$channelid.'/messages';
	   
		$request2 = array(
			'content'      => $msg
		);
		
		$request = json_encode($request2);
       $ch = curl_init($url);
        $options = array(
                CURLOPT_RETURNTRANSFER => true,        
                CURLOPT_HEADER         => false,       
                CURLOPT_FOLLOWLOCATION => false,        
               // CURLOPT_ENCODING       => "utf-8",       
                CURLOPT_AUTOREFERER    => true,         
                CURLOPT_CONNECTTIMEOUT => 20,          
                CURLOPT_TIMEOUT        => 20,         
                CURLOPT_POST            => 1,            
                CURLOPT_POSTFIELDS     => $request,    
                CURLOPT_SSL_VERIFYHOST => 0,            
                CURLOPT_SSL_VERIFYPEER => false,        
                CURLOPT_VERBOSE        => 1,
                CURLOPT_HTTPHEADER     => array(
                    "Authorization: $token"
                )

        );

        curl_setopt_array($ch,$options);
        $data = curl_exec($ch);
        $curl_errno = curl_errno($ch);
        $curl_error = curl_error($ch);
        
        curl_close($ch);
        echo "$token: $data<br>";
    }
}
}
