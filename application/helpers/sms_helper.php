<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('sendSms'))
{    
    function sendSms($mobile, $message ,$template_id)
    {
    	$CI = get_instance();
		$api_key = '363942AWqo9MQfm62fb2269P1';//$msgData->msg_username; // Username of the account
		$mobile = $mobile;
		$message = urlencode($message) ; // Message to be sent
		$sendername = 'CODEPX';//$msgData->msg_senderid; // Sender Id/From clause in the SMS message
		
		$Url="http://otpsms.vision360solutions.in/api/sendhttp.php?authkey=".$api_key."&mobiles=".$mobile."&message=".$message."&sender=".$sendername."&route=4&country=91&DLT_TE_ID=".$template_id;
		
		// is curl installed?
    	if (!function_exists('curl_init')){ 
			echo('CURL is not installed!');
        	die('CURL is not installed!');
    	}
 
		// create a new curl resource
    	$ch = curl_init($Url);
 
     	// set URL to download
    	curl_setopt($ch, CURLOPT_URL, $Url);
    	//curl_setopt($ch, CURLOPT_URL, urlencode($Url));
    	//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	//echo $Url;
 
    	// remove header? 0 = yes, 1 = no
    	curl_setopt($ch, CURLOPT_HEADER, 0);
 
    	// should curl return or print the data? true = return, false = print
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
    	// timeout in seconds
    	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
 
		// if using proxy
		/*if($useproxy)
		{
			// set proxy server and port
			curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1); 
			curl_setopt($ch, CURLOPT_PROXY, $server.":".$port); 

			// set proxy credential
			if($proxyUsername != '')
			{
				curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyUsername.":".$proxyPassword); 
			}
		}*/

    	// download the given URL, and return output
    	$output = curl_exec($ch);

    	// close the curl resource, and free system resources
    	curl_close($ch);

    	//print $output;
    	//echo($output);
    	return $output;
    }  



    function sending_sms($user_mobile, $message) {
     	// Account details
		$apiKey = urlencode('MHwLo0vLeYE-zFiBmjUOD6XLn2rtmxxVYouBq3FCXO');
		
		// Message details
		/*$numbers = array(8605717860,9960028195);
		$sender = urlencode('TXTLCL');
		$message = rawurlencode('This is your message');*/
	 
		//$numbers = implode(',', $numbers);

		$message = rawurlencode($message);
		$sendername = urlencode('MULTIC');
	 
		// Prepare data for POST request
		$data = array('apikey' => $apiKey, 'numbers' => $user_mobile, "sender" => $sendername, "message" => $message);
	 
		// Send the POST request with cURL
		$ch = curl_init('https://api.textlocal.in/send/');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		
		// Process your response here
		//echo $response;

		return $response;
     } 

}