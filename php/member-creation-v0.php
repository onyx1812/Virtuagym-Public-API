<?php 
define('API_URL', 'https://virtuagym.com/api/v0/'); 
define('API_KEY', ''); 
define('CLUB_ID', ''); 
define('CLUB_KEY', '');  // business-settings -> general -> advanced -> club key
 
$fname = "Peter"; 
$lname = "Smith"; 
$email = "peter@test.gmail.com"; 
$customer_data = array( 
    "firstname" => $fname, 
    "lastname" => $lname, 
    "email" => $email, 
    "is_pro" => true, 
    "send_invite_email" => true 
); 
$data_string = json_encode($customer_data); 
 
$url = API_URL.'club/'.CLUB_ID.'/member?api_key='.API_KEY.'&club_secret='.CLUB_KEY; 
$ch = curl_init($url); 
curl_setopt_array($ch, array( 
        CURLOPT_CUSTOMREQUEST => 'PUT', 
        CURLOPT_POSTFIELDS => $data_string, 
        CURLOPT_RETURNTRANSFER => true, 
        CURLOPT_SSL_VERIFYPEER => false // not the best way, but it works (might want to validate the certificate) 
    ) 
); 
$result = curl_exec($ch); 
curl_close($ch); 
 
$response = json_decode($result); 
 
echo 'Response: <br /><br />'; 
echo '<pre>'; 
var_dump($response); 
echo '</pre>'; 
?>
