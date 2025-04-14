<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('sendSms'))
{    
    function sendSms($mobile='9764640099', $message='This is Shivbandhan message')
    {
    	$CI = get_instance();

    	// You may need to load the model if it hasn't been pre-loaded
	    // $CI->load->model('master_model');
	    // $msgData = $CI->master_model->fetchMessageDeatails();
	    //print_r($msgData);

	 	$api_key = '251529Ao5GfcrlCLc5cb5ef0e';//$msgData->msg_username; // Username of the account
		//$password = 'industry1';//$msgData->msg_password; //  Password of the account 
		//$mobile = '91'.$mobileNumber; // Destination mobile no.
		$mobile = $mobile;
		$message = urlencode($message) ; // Message to be sent
		$sendername = 'SHIVBN';//$msgData->msg_senderid; // Sender Id/From clause in the SMS message
		
		//$Url="http://nimbusit.co.in/api/swsendSingle.asp?username=".$username."&password=".$password."&sender=".$sendername."&sendto=".$mobile."&message=".$message;
		//http://bulksms.vision360solutions.in/api/sendhttp.php?authkey=50540AmTxZGYV72i5a40a896&mobiles=9960034567&message=welcome&sender=SKGAUS&route=4
		
		//$Url="http://sms.rmtechnology.in/api/smsapi.aspx?username=".$username."&password=".$password."&to=".$mobile."&from=".$sendername."&message=".$message;

		//$Url="http://bulksms.vision360solutions.in/api/sendhttp.php?authkey=".$api_key."&mobiles=".$mobile."&message=".$message."&sender=".$sendername."&route=4";


		$Url="http://sms.globehost.com/api/sendhttp.php?authkey=".$api_key."&mobiles=".$mobile."&message=".$message."&sender=".$sendername."&route=4&country=091";
		
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
}