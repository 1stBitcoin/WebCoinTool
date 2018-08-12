<?php

function build_table($array){
    // start table
    $html = '<table>';
    // header row
    $html .= '<tr>';
    foreach($array[0] as $key=>$value){
            $html .= '<th>' . htmlspecialchars($key) . '</th>';
		if($key=='addr'){
		$html .= '<th>place</th>';
		}
        }
    $html .= '</tr>';

    // data rows
    foreach( $array as $key=>$value){
        $html .= '<tr>';
        foreach($value as $key2=>$value2){
            $html .= '<td>' . htmlspecialchars($value2) . '</td>';

		// in case of ip is true, add td with country info
		$value3 = explode(":", $value2);
		if(filter_var($value3[0], FILTER_VALIDATE_IP)) {
		$html .= '<td>' . get_ip_country($value3[0]) . '</td>';
		}
        }
        $html .= '</tr>';
    }

    // finish table and return it
    $html .= '</table>';
return $html;
}




function get_ip_country($ip=null){
    $path = 'ip/';
    if($ip == null) return 0;
    $iplong = 0;
	$ip2long = ip2long($ip);
    if(file_exists($path.$ip2long.'_long.txt')){
        $fp = fopen($path.$ip2long.'_long.txt', "r");
        $iplong = fread($fp, 2048);
        fclose($fp);
    }else{
        $fp = fopen($path.$ip2long.'_long.txt', "w+"); // To allow writing ownership & mod of ip folder needs change 
    	$iplong = get_api($ip); // finds the actual country of the ip
        fwrite($fp, $iplong); 
        fclose($fp);
    }
return $iplong;
}
function make_array($json){ $data = json_decode($json, TRUE); return $data; }

function get_api($ip_api){
$page = 'https://1stbitco.in/api/?ip=' . $ip_api;
$ch = curl_init();
curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
curl_setopt($ch, CURLOPT_URL, $page);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);   
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 2000; Windows NT 6.0)");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 2);
$data = curl_exec($ch);
curl_close($ch);
$data = make_array($data);
return $data['country_name'];
}


