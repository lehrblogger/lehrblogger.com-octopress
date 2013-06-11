<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SOAP Example: The Amazon Product Advertising API</title>
</head>

<style type="text/css">
body {
  font-family:Georgia, "Times New Roman", Times, serif;
}
img {
  float: left;
}
.product {
  background-color:#FFC;
  border: 1px solid #000;
  margin: 4px;
  padding: 3px;
  height: 120px;
}
.product h1 {
  font-size: 14px;
}
</style>

<body>

<?php
   // Amazon Web Services access ID and secret key
  $accessId = "[YOUR ACCESS ID HERE]";
  $secretKey = "[YOUR SECRET KEY HERE]";
  
  // Product Keywords to search for
  $keywords = "Cheese";
  
  // The Amazon Product Advertising API requires requests to be signed with a
	// hash of the secret key and a timestamp.
  $service = "AWSECommerceService";
  $timestamp = gmdate("Y-m-d\TH:i:s\Z");
  $hash_str = "ItemSearch" . $timestamp;
  $signature = base64_encode(
    hash_hmac("sha256", $hash_str, $secretKey, true));

  $client = new SoapClient(
  					 "https://webservices.amazon.com/AWSECommerceService/" .
						 "AWSECommerceService.wsdl",
						 array('exceptions' => 0));
  $headers = Array('AWSAccessKeyId' => $accessId,
                   'Timestamp' => $timestamp,
                   'Signature'=> $signature);
  $soapHeaders = Array();
  foreach ($headers as $key => $value) {
    array_push($soapHeaders,
               new SoapHeader('http://security.amazonaws.com/doc/2007-01-01/',
                              $key, $value));
  }
  $client->__setSoapHeaders($soapHeaders);
  $request = Array('Operation'=> 'ItemSearch',
                   'ItemPage' => 1,
                    'SearchIndex' => 'DVD',
                   'ResponseGroup' => 'Medium',
                   'Keywords' => $keywords);
  $wrappedRequest = Array("Service" => 'AWSECommerceService',
                           "AWSAccessKeyId" => $accessId,
                          "Operation" => "ItemSearch",
                          "Request" => $request);
  $response = $client->__soapCall('ItemSearch', array($wrappedRequest));
  foreach ($response->Items->Item as $item) {
    echo '<div class="product">';
      echo '<h1>' . $item->ItemAttributes->Title . '</h1>';
      echo '<img src="' . $item->SmallImage->URL . '" />';
      echo 'Sales Rank: ' . $item->SalesRank . '</br>';
      echo '<a href="' . $item->DetailPageURL . '"> Detail Page</a>';
    echo '</div>';
  }
?>

</body>
</html>