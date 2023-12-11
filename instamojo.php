<?php

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/v2/payment_requests/');
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER,array("X-Api-Key:test_86209b3df2c103ecfac87138784","X-Auth-Token:test_6fbd4856965b9951a110b9f443f"));

    $payload = Array(
      'purpose' => 'order something',
      'amount' => '2500',
      'buyer_name' => 'John',
      'email' => 'rohit.mishra@netnivaran.com',
      'phone' => '9910787483',
      'redirect_url' => 'localhost/pay/redirect.php',
      'send_email' => 'True',
      //'webhook' => 'http://www.example.com/webhook/',
      'allow_repeated_payments' => 'False',
    );

  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
  $response = curl_exec($ch);
  curl_close($ch); 

  $response= json_decode($response);

  header('location:'.$response->payment_request->longurl);
  die();
    
?>