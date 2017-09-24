<?php


	
	//	test classes pulling data from shopify & vendq accounts
	$myStitchlightapisdata = new stitchlightapisdata();
	$myGetAPIVendConfig  = $myStitchlightapisdata->getAPIVendConfig();
	$mygetAPIShopifyConfig  = $myStitchlightapisdata->getAPIShopifyConfig();

	$myStitchlightapis = new Stitchlightapis();
	$myvendqExec =  $myStitchlightapis->vendqExec($myGetAPIVendConfig);
	
	// uncomment below 
	//var_dump  ($myvendqExec);
	
	$mygetAPIShopifyRecords =  $myStitchlightapis->shopifyGetRecords($mygetAPIShopifyConfig);
	// uncomment below
	//var_dump  ($mygetAPIShopifyRecords);


	/**
	 * class: Stitchlightapis
	 * Purpose: call Vendor APIs: vendq & shopify
	 *
	 */

	final class Stitchlightapis
	{
		/**
		 * Function: vendqExec
		 * Purpose: Exec curl command to get files.
		 *
		 * @param  array  $vend          :  account data
		 *
		 * @return obj   $vendq_products  :  product object
		 *
		 */
		function vendqExec($vend)
		{
			$vendq_products = shell_exec("curl -X GET {$vend[STORE_URL]} -H 'authorization: Bearer {$vend[ACCESS_TOKEN]}'  ");
			return $vendq_products;
		}
 
		/**
		 * Function: shopifyGetRecords
		 * Purpose:  curl command to get shopify records for account.
		 *
		 * @param  array $shopify :  account data array
		 *
		 * @return array   $data  :  json decoded record data
		 *
		 */
		function shopifyGetRecords($shopify)
		{
			//Set up access
			$Url = "https://" . $shopify[API_KEY] . ":" . $shopify[API_PASSWORD] . "@" . $shopify[STORE_URL] . "/admin/" . $shopify[SERVICE];

			$session = curl_init();
			curl_setopt($session, CURLOPT_URL, $Url);
			curl_setopt($session, CURLOPT_CUSTOMREQUEST, "GET");
			curl_setopt($session, CURLOPT_CONNECTTIMEOUT, 30); //seconds to allow for connection
			curl_setopt($session, CURLOPT_TIMEOUT, 30); //seconds to allow for cURL commands
			curl_setopt($session, CURLOPT_HEADER, false); //include header info in return value ?
			curl_setopt($session, CURLOPT_RETURNTRANSFER, true); //return response as a string
			curl_setopt($session, CURLOPT_PUT, 1);
			//curl_setopt($session, CURLOPT_POSTFIELDS, $payload);
			curl_setopt($session, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
			$data = curl_exec($session);
			curl_close($session);
			return json_decode($data);
		}

	}


	/**
	 * class: stitchlightapisdata
	 * Purpose: get account data for  vendq & shopify
	 *
	 */
	final class stitchlightapisdata
	{
		public function getAPIVendConfig()
		{
			//Scalable: placeholder to be populated from db table of client API connections

			$vend = [];
			$vend[STORE_URL] = "https://egaytanstitch.vendhq.com/api/2.0/products";
			$vend[CLIENT_ID] = "4KIdhmiYKeCnS37VxwJbR4wxdcEu2XFM";
			$vend[CLIENT_SECRET] = "QYBbSQsi3tefDEjhHetdLm0kZmOPgMyK";
			$vend[ACCESS_TOKEN] = "5OtjwgBqfHfGe4ZWdG3Ue_pJbNl3lFZ0DbOvwz30";
			$vend[TOKEN_TYPE] = "Bearer";

			return $vend;

		}
		public function getAPIShopifyConfig()
		{
			//Scalable: placeholder to be populated from db table of client API connections
			$SHOPIFY = [];
			$SHOPIFY[API_KEY] = "bc2da52d40a7f9d3b6862227d46d9f20";
			$SHOPIFY[API_PASSWORD] = "7f5b398734ef8831d6fe3e34acb850a8";
			$SHOPIFY[SECRET] = "68cf3bcf288c1e79a8d7bd2c14d3bc52";
			$SHOPIFY[TOKEN] = "8d620ece236723749142f189f502bb01";
			$SHOPIFY[STORE_URL] = "egaytan-stitch.myshopify.com";
			$SHOPIFY[shop] = "egaytan-stitch";
			$SHOPIFY[SERVICE] = "products.json";

			return $SHOPIFY;
		}

	}

?>