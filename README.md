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
    Configure your vougepay details inside the application/config/simplepay.php file. refer to http://simplepay.com/developer.php
    Modify the controller example supplied (application/controller/simplepay.php) to fit your needs

	
## A Simple Example

  To use Spay load the library in your controller
```php
  $this->load->library('spay');
```

   To add 
   Initiate the library with
```php

  //spay_form( $form, name of item ,  description for the item, price of the item);
  $form = $this->spay->$voguepay_add_item( &$form, 'Face Cap',  'beautiful facecap for use', 1000);
```
	Dont forget to close the form variable



		View sample controller code below
```php
<?php
 	
class Spay extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('Spay');  
		 
	}
	
	function index()
	{

	// create form with default values set in config i.e merchant_ref, merchant_id, e.t.c
	$form = $this->spay->spay_form( &$form, 'Laban T-shirt', $desc = 'Labeled T-shirts', 4500);

	echo $finalform;
	}
	
}	
	
```

You'll find it easy to implement.

That's it. You should now be ready to use Spay!

## Localization
Spay defaults to English
