<?php
/**
 * 
 */
class Json 
{	
	function __construct() 
	{
		
	}
	function jsonReturn($data)
	{
		$CI=& get_instance();
		$CI->output->set_header('Cache-Control: no-cache, must-revalidate');
		$CI->output->set_header('Expires: '.date('r', time()+(86400*365)));
		
		// Log the data being returned
		log_message('debug', 'JSON Response: ' . json_encode($data));
		
		$CI->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
}
