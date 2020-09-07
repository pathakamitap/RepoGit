<?php
// This example uses the cURL library available for PHP versions 4.0.2 and on.
 
// initialize the curl variable
$ch = curl_init('https://api.dataonesoftware.com/webservices/vindecoder/decode');
$post_vars = 'client_id=16926 &authorization_code=5578e7fa44dadcf4e070274a21a1ed1089eea3d5 &decoder_query=';
$post_vars .= '
<decoder_query>
<decoder_settings>
<version>7.2.0</version>
<display>full</display>
<styles>on</styles>
<style_data_packs>
<basic_data>on</basic_data>
<pricing>on</pricing>
<engines>on</engines>
<transmissions>on</transmissions>
<standard_specifications>on</standard_specifications>
<standard_generic_equipment>on</standard_generic_equipment>
<oem_options>on</oem_options>
<colors>on</colors>
<warranties>on</warranties>
<fuel_efficiency>on</fuel_efficiency>
</style_data_packs>
<common_data>on</common_data>
<common_data_packs>
<basic_data>on</basic_data>
<pricing>on</pricing>
<engines>on</engines>
<transmissions>on</transmissions>
<standard_specifications>on</standard_specifications>
<standard_generic_equipment>on</standard_generic_equipment>
</common_data_packs>
</decoder_settings>
<query_requests>
<query_request identifier="2FMDK4JC6ABA07722">
<vin>2FMDK4JC6ABA07722</vin>
<year/>
<make/>
<model/>
<trim/>
<model_number/>
<package_code/>
<drive_type/>
<vehicle_type/>
<body_type/>
<doors/>
<bedlength/>
<wheelbase/>
<msrp/>
<invoice_price/>
<engine description="">
<block_type/>
<cylinders/>
<displacement/>
<fuel_type/>
</engine>
<transmission description="">
<trans_type/>
<trans_speeds/>
</transmission>
<optional_equipment_codes/>
<installed_equipment_descriptions/>
<interior_color description="">
<color_code/>
</interior_color>
<exterior_color description="">
<color_code/>
</exterior_color>
</query_request>
</query_requests>
</decoder_query>
';
 
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vars);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // this accepts any SSL certificate
//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
 
$result = curl_exec($ch); // $result now contains the response JSON or XML.

$xml=simplexml_load_string($result) or die("Error: Cannot create object");
$arr=(array)$xml;
//var_dump($arr);
$y=(array)$arr['decoder_messages'];
var_dump($y);
$z=(array)$y['decoder_errors'];
//$z=$xml->decoded_data->decoder_messages->service_provider;
var_dump($z);
//echo "<br><br>".$z[0];
/*
foreach($arr as $x => $x_value) {
    echo "Key=" . $x . ", Value=" .var_dump($x_value);
    echo "<br>";
}*/

//$array = array($xml->getName() => $array);
?>
