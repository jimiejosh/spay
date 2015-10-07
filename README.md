## Spay - Codeigniter - SimplePay Payment Library
	library to integrate Simplepay Payment Gateway API on codeigniter

## Class Features

- Pay with Simplepay!
- Add auto generated items 
- Light weight
- Need no instal and has no database, just copy files to the right folder
- Can be integrated to any Codeigniter application
- Tested with codeigniter version 3.0 but backward compactible with version 2.0
- Compatible with PHP 5.0 and later
- Much more!

## Why you might need it

 To manually integrate simplepay into your website. When you're done, you will have added a SimplePay button and supporting code to your website so that customers can click to place orders through simplepay.

## License

This software is distributed under the MIT license. Please read LICENSE.txt for information on the
software availability and distribution.

## Installation & loading



    Drop the provided files into the CodeIgniter project
    Configure your simplepay details inside the application/config/simplepay.php file. refer to http://simplepay.com/developer.php
    Modify the controller example supplied (application/controller/simplepay.php) to fit your needs

	
## A Simple Example

  To use library Spay, load the library in your controller
```php
  $this->load->library('spay');
```

   To use library 
   populate the param array with your values or you can view http://simplepay.com/developer.php for more details on the fields (array elements)
```php
 $param = array(
							"customid" => '1255634',
							"freeclient" => 'N',
							"demo" => 'Y', // if you are testing the application [ Y / N ]
							"price" => '1000',
							"quantity" => '3',
							"period" => '',
							"trial" => '',
							"escrow" => '',
							"action" => 'payment', // action product/donation/subscription/payment
							"pname" => 'Gucci Shoes',
							"desc" => 'Imported Classic Gucci Shoes',
							"setupfee" => '',
							"tax" => '',
							"shipping" => '',
							"comments" => '',
							"button" => 'accepted'  // pay / subscribe / escrow / accepted / donation 
							);
							$form = $this->spay->spay_form( $param );
							echo $form;
```
	it auto close the form variable



		View sample controller code below
```php
class Simplepay extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('spay');  
		 
	}
	
	function index()
	{
			 $param = array(
							"customid" => '1255634',
							"freeclient" => 'N',
							"demo" => 'Y', // if you are testing the application [ Y / N ]
							"price" => '1000',
							"quantity" => '3',
							"period" => '',
							"trial" => '',
							"escrow" => '',
							"action" => 'payment', // action product/donation/subscription/payment
							"pname" => 'Gucci Shoes',
							"desc" => 'Imported Classic Gucci Shoes',
							"setupfee" => '',
							"tax" => '',
							"shipping" => '',
							"comments" => '',
							"button" => 'accepted'  // pay / subscribe / escrow / accepted / donation 
							);
							$form = $this->spay->spay_form( $param );
							echo $form;
	}
}	
	
```

You'll find it easy to implement.

That's it. You should now be ready to use Spay!

## Localization
Spay defaults to English
