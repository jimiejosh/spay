<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*       The MIT License (MIT)
	*	Copyright (c) 2015 josh jimie <joshjimie@gmail.com>
	*
	*	Permission is hereby granted, free of charge, to any person obtaining a copy
	*	 of this software and associated documentation files (the "Software"), to deal
	*	 in the Software without restriction, including without limitation the rights
	*	 to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
	*	 copies of the Software, and to permit persons to whom the Software is
	*	 furnished to do so, subject to the following conditions:
	*
	*	The above copyright notice and this permission notice shall be included in
	*	all copies or substantial portions of the Software.
	*
	*	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
	*	IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
	*	FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
	*	AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
	*	LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
	*	OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
	*	THE SOFTWARE.
	*	 
	*/
	
	
class Simplepay extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('Vgniter_lib');  
		 
	}
	
	function index()
	{
			 $param = array(
							"customid" => '1255634',
							"freeclient" => 'N',
							"Demo" => '', // if you are testing the application
							"button" => '',
							"price" => '',
							"quantity" => '',
							"period" => '',
							"trial" => '',
							"escrow" => '',
							"action" => '', // action product/donation/subscription/payment
							"pname" => '',
							"desc" => '',
							"setupfee" => '',
							"tax" => '',
							"shipping" => '',
							"comments" => '',
							"button" => 'accepted'  // pay / subscribe / escrow / accepted / donation 
							);
	}
	
	function notify()
	{
	
$action= $_POST["action"];
$pid= $_POST["pid"];
$buyer= $_POST["buyer"];
$total= $_POST["total"];
$comments= $_POST["comments"];
$referer= $_POST["referer"];
$customid= $_POST["customid"];
$transaction_id=$_POST["transaction_id"];
$val=@json_encode($_POST);
// For Loging $val can be used
if($referer=="https://simplepay4u.com" || $referer=="https://www.simplepay4u.com") //1st level checking
{

		if(!empty($transaction_id)) //2nd level checking
		{
				/*** Server side verification. Your server is communicating with Simplepay Server Internally**/
				//$simplepay_url="https://simplepay4u.com/processverify.php"; // Live URL
				$simplepay_url="http://simplepay4u.com/processverify.php";
				$curldata["cmd"]="_notify-validate";
				foreach ($_REQUEST as $key =>  $value)
				{
					if ($key != 'view'&&  $key != 'layout')
					{
					  $value = urlencode ($value);
					  $curldata[$key]=$value;
					}
				}
				$handle=curl_init();
				curl_setopt($handle, CURLOPT_URL, $simplepay_url);
				curl_setopt($handle, CURLOPT_POST, 1);
				curl_setopt($handle, CURLOPT_POSTFIELDS, $curldata);
				curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($handle, CURLOPT_TIMEOUT, 90);
				$result=curl_exec($handle);
				curl_close($handle);
				if( 'VERIFIED' == trim($result) )
				{

					//  IMPLEMENTATION CODE & aPPLICATION lOGIC WILL GO HER TO UPDATE THE ACCOUNT

				}

		}
		}
	}
	
	/*You can do anything you want now with the transaction details or the merchant reference.
	You should query your database with the merchant reference and fetch the records you saved for this transaction.
	Then you should compare the $transaction['total'] with the total from your database.*/
	
	
	function failed()
	{
	$this->load->view('failed');
	
	}
	
	function success()
	{
	$this->load->view('success');
	
	}
	
	
	
	}
