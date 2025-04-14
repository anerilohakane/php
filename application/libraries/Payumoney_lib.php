<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Payumoney_lib

{

	/*

	* CI Instance

	*/

	public $ci;

	/*

	* Constructor

	*/

	/*public function __construct($config = array())

	{

		$this->ci =& get_instance();

		$this->ci->config->load('payments', true);

		$defaults = array(

			'mode' => $this->ci->config->item('mode', 'payments'),

			'force_secure_connection' => $this->ci->config->item('force_secure_connection', 'payments')

		);

		$config = array_merge($defaults, $config);

		require(dirname(__DIR__)."/src/php-payments/lib/payments.php");

		$this->php_payments = new PHP_Payments($config);

		//Ignore CI classes so our autoloader doesn't interfere

		Payment_Utility::$autoload_ignore = array(

			'CI_'

		);

	}*/

	/*

	* Caller Magic (Overloaded) Method

	*/

	/*public function __call($method, $params)

	{

		$gateway = $params[0];

		$args = $params[1];

		if(file_exists(dirname(__DIR__)."/config/drivers/{$gateway}.php"))

		{

			$this->ci->load->config("drivers/{$gateway}.php");

			$config = $this->ci->config->item($gateway);

		}

		else

		{

			$config = (isset($params[2])) ? $params[2] : null;

		}

		return $this->php_payments->$method($gateway, $args, $config);

	}*/







	function onlinePayment($fname,$order_data)

    {

    	//print_r($order_data);

    	$CI = get_instance();

    	//echo 'hi';

    	// You may need to load the model if it hasn't been pre-loaded

	    // $CI->load->model('master_model');

	    // $msgData = $CI->master_model->fetchMessageDeatails();

	    //print_r($msgData);

	    //echo 'transaction Id = '.$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

	    // Merchant key here as provided by Payu

		//$MERCHANT_KEY = "JBZaLc";

		$MERCHANT_KEY = "H019Tlp2";



		// Merchant Salt as provided by Payu

		//$SALT = "GQs7yium";

		$SALT = "FY2RfUO92x";



		// End point - change to https://secure.payu.in for LIVE mode

		//$PAYU_BASE_URL = "https://test.payu.in";

		$PAYU_BASE_URL = "https://secure.payu.in";

		$action = '';



		if((isset($order_data) && !empty($order_data)) && (isset($fname) && !empty($fname)))

 		{

 			$txnId = $order_data['transcation_id'];			

 			$key = $MERCHANT_KEY;

 			$shipping_charge = 0;

 			if(isset($order_data['membership_amt']) && !empty($order_data['membership_amt']))

 			{

 				$amount = $order_data['membership_amt'];

 			}

 			

 			$productinfo = 'SHIVBANDHAN';

 			$firstname = $fname; 			

 			$email = $order_data['email'];

 			$phone = $order_data['mobile'];

 			$service_provider = 'payu_paisa';

 			$surl = base_url().'order_success';

 			$furl = base_url().'order_failure';

 		}

 		else

 		{



 			 //$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

 		}



 		//$hashSequence = "key|txnid|amount|productinfo|firstname|email||||||||||";



		if(empty($key) || empty($txnId) || empty($amount) || empty($firstname) || empty($email) || empty($phone) || empty($productinfo) || empty($surl) || empty($furl) || empty($service_provider)) 

		{

    		$formError = 1;

    		

  		} 

  		else 

  		{

  			

		    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));

			//$hashVarsSeq = explode('|', $hashSequence);

		    //$hash_string = '';	

			/*foreach($hashVarsSeq as $hash_var) 

			{

		      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';

		      $hash_string .= '|';

		    }*/



		    //$hash_string = $key.'|'.$txnId.'|'.$amount.'|'.$firstname.'|'.$email.'|'.$phone.'|'.$productinfo.'|'.$surl.'|'.$furl.'|'.$service_provider;



		    //echo $hash_string;

		    //$hash_string = "$MERCHANT_KEY|$txnId|$amount|$productinfo|$firstname|$email";

		    $hash_string = $MERCHANT_KEY.'|'.$txnId.'|'.$amount.'|'.$productinfo.'|'.$firstname.'|'.$email.'|||||||||||';

		    //$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

		    

		    $hash_string .= $SALT;		    

		    

		    $hash = strtolower(hash('sha512', $hash_string));

		    $action = $PAYU_BASE_URL . '/_payment';



		    $payu_args = array(

						'key' => $MERCHANT_KEY,

						'txnid' => $txnId ,

						'amount' => $amount,

						'productinfo' => $productinfo,

						'firstname' => $firstname,

						'email' => $email,

						'phone' =>$phone,

						'surl' =>$surl,

						'furl' =>$furl,

						'hash' =>$hash,

						'service_provider' =>$service_provider

				);





		    //$this->submit_payu_post($PAYU_BASE_URL,$post_data);



		    /*$payu_args_array = array();

	        foreach($payu_args as $key => $value){

	          	$payu_args_array[] = "<input type='hidden' name='$key' value='$value'/>";

	        }*/



	        //$data['post_data']=$payu_args;

	       //$this->load->view("pay_u",$data); onLoad=\"document.forms['payuForm'].submit();\"

	        echo "<!DOCTYPE html>\n";

	        echo "<html lang=\"en\">\n";

	        echo "<head><title>Processing Payment...</title></head>\n";

	        echo "<body onLoad=\"document.forms['payuForm'].submit();\">\n";

	        echo "<center><h2>Please wait, your order is being processed and you";

	        echo " will be redirected to the Online payment.</h2></center>\n";

	        echo "<form method=\"post\" name=\"payuForm\" ";

	        echo "action=\"".$action."\">\n";

	        

	        foreach ($payu_args as $name => $value) {

	            echo "<input type=\"hidden\" name=\"$name\" value=\"$value\"/>\n";

	        }

	        echo "<center><br/><br/>If you are not automatically redirected to ";

	        echo "Online payment within 5 seconds...<br/><br/>\n";

	        echo "<input type=\"submit\" value=\"Click Here\"></center>\n";

	       // echo '<input type="hidden" name="service_provider" value="payu_paisa" size="64" />';

	        echo "</form>\n";

	        echo "</body>\n";

	        echo "</html>\n";

	        /*echo '<html><head><title>Processing Payment...</title></head><body onload="submitPayuForm()"><form action="'.$action.'" method="post" id="payu_payment_form" name="payuForm">

            ' . implode('', $payu_args_array) . '

            <input type="submit" class="button-alt" id="submit_payu_payment_form" value="Submit"/>

            <script type="text/javascript">

				function submitPayuForm() {			      

			      	var payuForm = document.forms.payuForm;

			      	payuForm.submit();

			    }

			</script>

            </form></body></html>';*/

		    //print_r($fields);

		   //$fields_string = '';



			//url-ify the data for the POST

			/*foreach($fields as $key=>$value) 

			{ 

				$fields_string .= $key.'='.$value.'&'; 

			}*/

			/*rtrim($fields_string, '&');



			$options = array(

		        'http' => array(

		            'header'  => "Content-type: application/x-www-form-urlencoded",

		            'method'  => 'POST',

		            'content' => http_build_query($fields),

		        ),

		    );

		    $context  = stream_context_create($options);

		    file_get_contents($action, false, $context);*/



		    /*// is curl installed?

	    	if (!function_exists('curl_init')){ 

				echo('CURL is not installed!');

	        	die('CURL is not installed!');

	    	}	    	

	 

			// create a new curl resource

	    	$ch = curl_init();



	    	//set the url, number of POST vars, POST data

			curl_setopt($ch,CURLOPT_URL, $action);

			curl_setopt($ch,CURLOPT_POST, count($fields));

			curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);*/

	 

	     	/*// set URL to download

	    	curl_setopt($ch, CURLOPT_URL, $action);

	 

	    	// remove header? 0 = yes, 1 = no

	    	curl_setopt($ch, CURLOPT_HEADER, 0);

	 

	    	// should curl return or print the data? true = return, false = print

	    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	 

	    	// timeout in seconds

	    	curl_setopt($ch, CURLOPT_TIMEOUT, 10);*/

	 

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

	    	/*$output = curl_exec($ch);



	    	// close the curl resource, and free system resources

	    	curl_close($ch);



	    	// print output

	    	//echo($output);

	    	print_r($output);*/

	    	//return $output;

		}

    } 

    /*public function submit_payu_post($pay_u_url,$post_data) {

		//onLoad=\"document.forms['paypal_form'].submit();\"

       $data['post_data']=$post_data;

       //$this->load->view("pay_u",$data);

        echo "<html>\n";

        echo "<head><title>Processing Payment...</title></head>\n";

        echo "<body onLoad=\"document.forms['payuForm'].submit();\" >\n";

        echo "<center><h2>Please wait, your order is being processed and you";

        echo " will be redirected to the Online payment.</h2></center>\n";

        echo "<form method=\"post\" name=\"payuForm\" ";

        echo "action=\"".$pay_u_url."\">\n";

        

        foreach ($post_data as $name => $value) {

            echo "<input type=\"hidden\" name=\"$name\" value=\"$value\"/>\n";

        }

        echo "<center><br/><br/>If you are not automatically redirected to ";

        echo "Online payment within 5 seconds...<br/><br/>\n";

        echo "<input type=\"submit\" value=\"Click Here\"></center>\n";

       // echo '<input type="hidden" name="service_provider" value="payu_paisa" size="64" />';

        echo "</form>\n";

        echo "</body></html>\n";

    }*/







    function do_onlinePayment($fname,$order_data)

    {

    	$CI = get_instance();



	    // Merchant key here as provided by Payu

		//$MERCHANT_KEY = "JBZaLc";

		$MERCHANT_KEY = "H019Tlp2";



		// Merchant Salt as provided by Payu

		//$SALT = "GQs7yium";

		$SALT = "FY2RfUO92x";



		// End point - change to https://secure.payu.in for LIVE mode

		//$PAYU_BASE_URL = "https://test.payu.in";

		$PAYU_BASE_URL = "https://secure.payu.in";

		$action = '';



		if((isset($order_data) && !empty($order_data)) && (isset($fname) && !empty($fname)))

 		{

 			$txnId = $order_data['transcation_id'];			

 			$key = $MERCHANT_KEY;

 			$shipping_charge = 0;

 			if(isset($order_data['membership_amt']) && !empty($order_data['membership_amt']))

 			{

 				$amount = $order_data['membership_amt'];

 			}

 			

 			$productinfo = 'SHIVBANDHAN';

 			$firstname = $fname; 			

 			$email = $order_data['email'];

 			$phone = $order_data['mobile'];

 			$service_provider = 'payu_paisa';

 			$surl = base_url().'do_order_success';

 			$furl = base_url().'do_order_failure';

 		}

 		else

 		{



 			 //$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

 		}



		if(empty($key) || empty($txnId) || empty($amount) || empty($firstname) || empty($email) || empty($phone) || empty($productinfo) || empty($surl) || empty($furl) || empty($service_provider)) 

		{

    		$formError = 1;

    		

  		} 

  		else 

  		{

  			

		    $hash_string = $MERCHANT_KEY.'|'.$txnId.'|'.$amount.'|'.$productinfo.'|'.$firstname.'|'.$email.'|||||||||||';

		    

		    $hash_string .= $SALT;		    

		    

		    $hash = strtolower(hash('sha512', $hash_string));

		    $action = $PAYU_BASE_URL . '/_payment';



		    $payu_args = array(

						'key' => $MERCHANT_KEY,

						'txnid' => $txnId ,

						'amount' => $amount,

						'productinfo' => $productinfo,

						'firstname' => $firstname,

						'email' => $email,

						'phone' =>$phone,

						'surl' =>$surl,

						'furl' =>$furl,

						'hash' =>$hash,

						'service_provider' =>$service_provider

				);



	        echo "<!DOCTYPE html>\n";

	        echo "<html lang=\"en\">\n";

	        echo "<head><title>Processing Payment...</title></head>\n";

	        echo "<body onLoad=\"document.forms['payuForm'].submit();\">\n";

	        echo "<center><h2>Please wait, your order is being processed and you";

	        echo " will be redirected to the Online payment.</h2></center>\n";

	        echo "<form method=\"post\" name=\"payuForm\" ";

	        echo "action=\"".$action."\">\n";

	        

	        foreach ($payu_args as $name => $value) {

	            echo "<input type=\"hidden\" name=\"$name\" value=\"$value\"/>\n";

	        }

	        echo "<center><br/><br/>If you are not automatically redirected to ";

	        echo "Online payment within 5 seconds...<br/><br/>\n";

	        echo "<input type=\"submit\" value=\"Click Here\"></center>\n";

	        echo "</form>\n";

	        echo "</body>\n";

	        echo "</html>\n";

		}

    }





   	/*public function online($fname,$order_data)

    {

    	date_default_timezone_set('Asia/Calcutta');

		$datenow = date("d/m/Y h:m:s");

		$transactionDate = str_replace(" ", "%20", $datenow);



		$transactionId = $order_data['transcation_id'];	



		$transactionRequest = new TransactionRequest();



		//Setting all values here

		$transactionRequest->setMode("test");

		$transactionRequest->setLogin(197);

		$transactionRequest->setPassword("Test@123");

		$transactionRequest->setProductId("NSE");

		$transactionRequest->setAmount($order_data['membership_amt']);

		$transactionRequest->setTransactionCurrency("INR");

		$transactionRequest->setTransactionAmount($order_data['membership_amt']);

		$transactionRequest->setReturnUrl(base_url().'response');

		$transactionRequest->setClientCode(123);

		$transactionRequest->setTransactionId($transactionId);

		$transactionRequest->setTransactionDate($transactionDate);

		$transactionRequest->setCustomerName($order_data['customer_name']);

		$transactionRequest->setCustomerEmailId($order_data['email']);

		$transactionRequest->setCustomerMobile($order_data['mobile']);

		$transactionRequest->setCustomerBillingAddress("Pune");

		$transactionRequest->setCustomerAccount("639827");

		$transactionRequest->setReqHashKey("KEY123657234");





		$url = $transactionRequest->getPGUrl();



		header("Location: $url");



    }*/

    /*for Testing*/
    
    /*public function online($fname,$order_data)
    {
    	date_default_timezone_set('Asia/Calcutta');
		$datenow = date("d/m/Y h:m:s");
		$transactionDate = str_replace(" ", "%20", $datenow);

		$transactionId = $order_data['transcation_id'];	

		$transactionRequest = new TransactionRequest();

		//Setting all values here
		$transactionRequest->setMode("test");
		$transactionRequest->setLogin(197);
		$transactionRequest->setPassword("Test@123");
		$transactionRequest->setProductId("NSE");
		$transactionRequest->setAmount($order_data['membership_amt']);
		$transactionRequest->setTransactionCurrency("INR");
		$transactionRequest->setTransactionAmount($order_data['membership_amt']);
		$transactionRequest->setReturnUrl(base_url().'response');
		$transactionRequest->setClientCode(123);
		$transactionRequest->setTransactionId($transactionId);
		$transactionRequest->setTransactionDate($transactionDate);
		$transactionRequest->setCustomerName($order_data['customer_name']);
		$transactionRequest->setCustomerEmailId($order_data['email']);
		$transactionRequest->setCustomerMobile($order_data['mobile']);
		$transactionRequest->setCustomerBillingAddress("Pune");
		$transactionRequest->setCustomerAccount("639827");
		$transactionRequest->setReqHashKey("KEY123657234");


		$url = $transactionRequest->getPGUrl();

		header("Location: $url");

    }*/



    public function online($fname,$order_data)

    {

    	date_default_timezone_set('Asia/Calcutta');
        $datenow = date("d/m/Y h:m:s");
        $transactionDate = str_replace(" ", "%20", $datenow);
        require_once 'TransactionRequest.php';
		//$transactionId = $order_data['transcation_id'];	
		$transactionRequest = new TransactionRequest();
		//Setting all values here

		$transactionRequest->setMode("live");

		$transactionRequest->setLogin(86677);

		$transactionRequest->setPassword("983c0161");

		$transactionRequest->setProductId("SHIV");

		$transactionRequest->setAmount($order_data['membership_amt']);

		$transactionRequest->setTransactionCurrency("INR");

		$transactionRequest->setTransactionAmount(0);

		$transactionRequest->setReturnUrl(base_url().'response');

		//$transactionRequest->setReturnUrl('https://shivbandhan.com/response');

		//$transactionRequest->setReturnUrl('https://payentzuat.atomtech.in/paynetzclient/ResponseParam.jsp');

		$transactionRequest->setClientCode(123);

		$transactionRequest->setTransactionId($order_data['transcation_id']);

		$transactionRequest->setTransactionDate($transactionDate);

		$transactionRequest->setCustomerName($order_data['customer_name']);

		$transactionRequest->setCustomerEmailId($order_data['email']);

		$transactionRequest->setCustomerMobile($order_data['mobile']);

		$transactionRequest->setCustomerBillingAddress("Pune");

		$transactionRequest->setCustomerAccount("639827");

		$transactionRequest->setReqHashKey("232e7872c740e4c3d7");

		$url = $transactionRequest->getPGUrl();

		header("Location: $url");
    }


    //for testing url
    /*public function app_online($fname,$order_data)
    {
    	date_default_timezone_set('Asia/Calcutta');
		$datenow = date("d/m/Y h:m:s");
		$transactionDate = str_replace(" ", "%20", $datenow);

		$transactionId = $order_data['transcation_id'];	

		$transactionRequest = new TransactionRequest();

		//Setting all values here
		$transactionRequest->setMode("test");
		$transactionRequest->setLogin(197);
		$transactionRequest->setPassword("Test@123");
		$transactionRequest->setProductId("NSE");
		$transactionRequest->setAmount($order_data['membership_amt']);
		$transactionRequest->setTransactionCurrency("INR");
		$transactionRequest->setTransactionAmount($order_data['membership_amt']);
		$transactionRequest->setReturnUrl(base_url().'app_response');
		$transactionRequest->setClientCode(123);
		$transactionRequest->setTransactionId($transactionId);
		$transactionRequest->setTransactionDate($transactionDate);
		$transactionRequest->setCustomerName($order_data['customer_name']);
		$transactionRequest->setCustomerEmailId($order_data['email']);
		$transactionRequest->setCustomerMobile($order_data['mobile']);
		$transactionRequest->setCustomerBillingAddress("Pune");
		$transactionRequest->setCustomerAccount("639827");
		$transactionRequest->setReqHashKey("KEY123657234");


		$url = $transactionRequest->getPGUrl();

		$json = array("url"=>$url);
      	
      	echo json_encode($json);

    }*/


    public function app_online($fname,$order_data)
    {

    	date_default_timezone_set('Asia/Calcutta');

		$datenow = date("d/m/Y h:m:s");

		$transactionDate = str_replace(" ", "%20", $datenow);


		$transactionId = $order_data['transcation_id'];	

		$transactionRequest = new TransactionRequest();

		//Setting all values here

		$transactionRequest->setMode("live");

		$transactionRequest->setLogin(86677);

		$transactionRequest->setPassword("983c0161");

		$transactionRequest->setProductId("SHIV");

		$transactionRequest->setAmount($order_data['membership_amt']);

		$transactionRequest->setTransactionCurrency("INR");

		$transactionRequest->setTransactionAmount(0);

		$transactionRequest->setReturnUrl(base_url().'app_response');

		//$transactionRequest->setReturnUrl('https://shivbandhan.com/response');

		//$transactionRequest->setReturnUrl('https://payentzuat.atomtech.in/paynetzclient/ResponseParam.jsp');

		$transactionRequest->setClientCode(123);

		$transactionRequest->setTransactionId($transactionId);

		$transactionRequest->setTransactionDate($transactionDate);

		$transactionRequest->setCustomerName($order_data['customer_name']);

		$transactionRequest->setCustomerEmailId($order_data['email']);

		$transactionRequest->setCustomerMobile($order_data['mobile']);

		$transactionRequest->setCustomerBillingAddress("Pune");

		$transactionRequest->setCustomerAccount("639827");

		$transactionRequest->setReqHashKey("232e7872c740e4c3d7");

		$url = $transactionRequest->getPGUrl();

		$json = array("url"=>$url);
      	
      	echo json_encode($json);

    }





}