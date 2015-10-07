<?php
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

			// VoguePay sends a transaction id to the notification URL provided in your account for every transaction on that account.
		// To recieve a transaction id on your success or failure URL, you must set Send Transaction ID to Success and Failure Return URL to Yes on your account preferences page.
# Gateway Specific Variables
	
	$config['cmaaccountid'] = '';
	$config['freeclient'] = 'Y'; //Fee pay by client or Not,Default value is Y. Probable value [Y / N]
	$config['defaultcomment'] = 'Process Payment via SimplePay.';   // default custom message
	$config['username'] = ''; // your username
	$config['email'] = '';  // your email
	$config['escrow'] = 'N';   //Probable value  [Y / N]. Defaults N
	$config['notification_url'] = '';
	$config['cancel_url'] = '';
	$config['return_url'] = '';
	$config['site_logo'] = ''; // Url to your site logo
	
	// # Enter your code submit to the gateway...

	
	

	
	
