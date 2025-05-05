<?php
// Set the cookie
// $cookieName = "oodlesin";
// $cookieValue = "rex4@gmail.com";
// $expiryTime = time() + (60 * 60 * 24); // Expiry time set to 24 hours
// $cookiePath = "/";
// $cookieDomain = "oodlesin.com"; // Replace with the target domain

// setcookie($cookieName, $cookieValue, $expiryTime, $cookiePath, $cookieDomain);

// echo $cookieValue;


$cookieValue = 'rex4@gmail.com'; // Replace with the actual cookie value
$targetUrl = 'https://oodlesin.com'; // Replace with the desired target URL

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $targetUrl);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Cookie: oodles2=' . $cookieValue]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Other cURL options
// ...

$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($httpCode === 200) {
        // Request was successful
        echo 'Success';
        // Process the response as needed
        echo $response;
    } else {
        // Request failed with a non-200 HTTP status code
        echo 'Request failed with HTTP status code: ' . $httpCode;
    }
}

curl_close($ch);



