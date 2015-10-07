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
	
class Spay {
	
	
	
	function __construct()
	{
	
		$this->ci =& get_instance();
		//$this->ci->load->helper('url_helper');
		$this->ci->config->load('simplepay', TRUE);
		$this->ci->load->helper( 'url');
		$this->ci->load->helper('form');
		//$config['base_url'] = site_url((config_item('index_page') == '' ? SELF : '').$config['base_url']);
		//log_message('debug', 'HybridAuthLib Class Initalized');
	}
	
	

	
	function spay_form( $param ){

	// create form "<form method='POST' action='https://www.simplepay4u.com/process.php'>";
	// Attributes can be added by passing an associative array to the second parameter, like this
	if ($param['demo'] == 'Y' ){
	 $code = form_open('https://sandbox.simplepay4u.com/process.php');
	 } else {
	 $code = form_open('https://www.simplepay4u.com/process.php');
	 }
	///////////////////////////
	
	$username = $this->ci->config->item('username',  'simplepay');
	$email = $this->ci->config->item('email',  'simplepay');
	$cmaccountid = $this->ci->config->item('cmaccountid',  'simplepay');
	$site_logo = $this->ci->config->item('site_logo',  'simplepay');
	$member = isset($username) ? $username : $email;
	$escrow = isset($param['escrow']) ? $param['escrow'] : $this->ci->config->item('escrow',  'simplepay');
	$action = isset($param['action']) ? $param['action'] : 'payment';
	$code .= '<input type="hidden" name="escrow" value="'.$escrow.'" />
			<input type="hidden" name="member" value="'.$member.'" />
			<input type="hidden" name="CMAccountid" value="'.$cmaccountid.'" />
			<input type="hidden" name="site_logo" value="'.$site_logo.'" />
			<input type="hidden" name="action" value="'.$action.'" />';
			
	$ureturn = isset($param['ureturn']) ? $param['ureturn'] : $this->ci->config->item('return_url',  'simplepay');
	$unotify = isset($param['unotify']) ? $param['unotify'] : $this->ci->config->item('notification_url',  'simplepay');
	$ucancel = isset($param['ucancel']) ? $param['ucancel'] : $this->ci->config->item('cancel_url',  'simplepay');
	$comments = isset($param['comments']) ? $param['comments'] : $this->ci->config->item('defaultcomment',  'simplepay');
	$freeclient = isset($param['freeclient']) ? $param['freeclient'] : $this->ci->config->item('freeclient',  'simplepay');
		
			
			$code .= '<input type="hidden" name="product" value="'.$param['pname'].'" />
			<input type="hidden" name="price" value="'.$param['price'].'" />
			<input type="hidden" name="ureturn" value="'.$ureturn.'" />
			<input type="hidden" name="freeclient" value="'.$freeclient.'" />
			<input type="hidden" name="comments" value="'.$comments.'" />
			<input type="hidden" name="unotify" value="'.$unotify.'" />
			<input type="hidden" name="ucancel" value="'.$ucancel.'" />';
 
	if( $param['quantity'] != ''){ $code .= "<input type='hidden' name='quantity' value='".$param['quantity']."' />"; }
	if( $param['period'] != ''){ $code .= "<input type='hidden' name='period' value='".$param['period']."' />"; }
	if( $param['trial'] != ''){ $code .= "<input type='hidden' name='trial' value='".$param['trial']."' />"; }
	if( $param['setupfee'] != ''){ $code .= "<input type='hidden' name='setup' value='".$param['setupfee']."' />"; }
	if( $param['tax'] != ''){ $code .= "<input type='hidden' name='tax' value='".$param['tax']."' />"; }
	if( $param['shipping'] != ''){ $code .= "<input type='hidden' name='shipping' value='".$param['shipping']."' />"; }
	if( $param['customid'] != ''){ $code .= "<input type='hidden' name='customid' value='".$param['customid']."' />"; }
	
	
	
	/*
	https://simplepay4u.com/hlib/images/client_img/simplepaylogo.gif        Pay
	https://simplepay4u.com/hlib/images/client_img/simplepaysubscribe.gif   Subcribe
	https://simplepay4u.com/hlib/images/client_img/simplepaylogoescrow.gif  Escrow
	https://simplepay4u.com/hlib/images/client_img/spaccepted.png           Accepted
	https://simplepay4u.com/hlib/images/client_img/simplepaydonatenow.gif   Donation
	*/
	
	switch ($param['button']):
    case 'pay':
		$imgsrc = 'https://simplepay4u.com/hlib/images/client_img/simplepaylogo.gif';
        break;
    case 'subscribe':
        $imgsrc = 'https://simplepay4u.com/hlib/images/client_img/simplepaysubscribe.gif';
        break;
    case 'escrow':
        $imgsrc = 'https://simplepay4u.com/hlib/images/client_img/simplepaylogoescrow.gif';
        break;
    case 'accepted':
        $imgsrc = 'https://simplepay4u.com/hlib/images/client_img/spaccepted.png';
        break;
    case 'donation':
        $imgsrc = 'https://simplepay4u.com/hlib/images/client_img/simplepaydonatenow.gif';
        break;
    default:
        $imgsrc = 'https://simplepay4u.com/hlib/images/client_img/simplepaylogo.gif';
endswitch;

        $code .= '<input type="image" src="'.$imgsrc.'">';
		$code .= '</form>';
		return $code;
	}
		
	
		
}
