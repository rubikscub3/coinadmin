<?php

function refresh_token(){
    $ci = get_instance();
    $ci->load->database();
    /*SOAP REQUEST STARTS HERE*/
     //Data, connection, auth
    $soapUrl = $ci->config->item('soap_url'); // asmx URL of WSDL
    $soapUser = $ci->config->item('soap_user'); //  username
    $soapPassword = $ci->config->item('soap_pass'); // password
    $soapChannel = $ci->config->item('soap_channel'); // channel

    $randnum = rand(1111111111,9999999999);
    $soapTransNum = $randnum; // channel

    // xml post structure

    $xml_post_string = "<?xml version='1.0' encoding='utf-8'?>";
    $xml_post_string = "<soapenv:Envelope xmlns:soapenv='http://schemas.xmlsoap.org/soap/envelope/' xmlns:osb='http://osb.tempuri.org/'>";
        $xml_post_string .= "<soapenv:Header/>";
        $xml_post_string .= "<soapenv:Body>";
            $xml_post_string .= "<osb:GET_OAUTH_TOKEN_IN>";
                $xml_post_string .= "<osb:GET_OAUTH_TOKEN_REQ>";
                    $xml_post_string .= "<osb:_USER_ID_>".$soapUser."</osb:_USER_ID_>";
                    $xml_post_string .= "<osb:_PASSWORD_>".$soapPassword."</osb:_PASSWORD_>";
                    $xml_post_string .= "<osb:_CHANNEL_ID_>".$soapChannel."</osb:_CHANNEL_ID_>";
                    $xml_post_string .= "<osb:_TRANSACTION_NUMBER_>".$soapTransNum."</osb:_TRANSACTION_NUMBER_>";
                    $xml_post_string .= "<osb:_RESERVED_>ok</osb:_RESERVED_>";
                $xml_post_string .= "</osb:GET_OAUTH_TOKEN_REQ>";
            $xml_post_string .= "</osb:GET_OAUTH_TOKEN_IN>";
        $xml_post_string .= "</soapenv:Body>";
    $xml_post_string .= "</soapenv:Envelope>";

    //echo $xml_post_string;exit;
   $headers = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Pragma: no-cache",
        "SOAPAction: http://192.168.1.99:7005/ETNCONLINESERVICES/EXTLSRVS/SOAP/INBOUND/EXTEXP_EXCISEONLINESERVICES", 
        "Content-length: ".strlen($xml_post_string),
    ); //SOAPAction: your op URL

    
    // PHP cURL  for https connection with auth
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_URL, $soapUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERPWD, $soapUser.":".$soapPassword); // username and password - declared at the top of the doc
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // converting
    $response = curl_exec($ch); 
    curl_close($ch);
    /*SOAP REQUEST ENDS HERE*/

    $response = str_replace("soapenv:","",$response);
    $response = str_replace("osb:","",$response);
    
    $response = str_replace("<Body>","",$response);
    $response = str_replace("</Body>","",$response);

    //echo $response;exit;
    // convertingc to XML
    $parser = simplexml_load_string($response);
    
    // user $parser to get your data out of XML response and to display it.
    $token = $parser->GET_TOKEN_OUT->_TOKEN_;
    $expiry = $parser->GET_TOKEN_OUT->_EXPIRY_TIME_;
    
    if(isset($token)){

        $sql = "DELETE FROM oauth_token";
        $query = $ci->db->query($sql);

        $sql = "INSERT INTO oauth_token (token, expiry) VALUES('".$token."','".$expiry."');";
        $query = $ci->db->query($sql);

        return $token;
    } else{
        return false;
    }
}

function check_token(){ 
    $ci = get_instance();
    $ci->load->database();
    
    $sql = "SELECT token, expiry FROM oauth_token WHERE expiry > NOW()";
    $query = $ci->db->query($sql);
    if($query->num_rows() > 0)
    {
       $result = $query->result_array();
       return $result[0]['token'];
    } else{
        return refresh_token();
    }
    
}

function soap_request($serviceName,$soapBody){
    $ci = get_instance();
    /*SOAP REQUEST STARTS HERE*/
     //Data, connection, auth
    $soapUrl = $ci->config->item('soap_url'); // asmx URL of WSDL
    $soapUser = $ci->config->item('soap_user'); //  username
    $soapPassword = $ci->config->item('soap_pass'); // password
    $soapChannel = $ci->config->item('soap_channel'); // channel

    $token = check_token();
    $now = strtotime("now");
    $transmissionDate = date("Ymd",$now);
    $transmissionTime = date("H:i:s",$now);
    $soapTransNum = rand(1111111111,9999999999);
    // xml post structure

    $message_header = "<osb:MESSAGE_HEADER>
                        <osb:_TOKEN_>".$token."</osb:_TOKEN_>
                        <osb:_TRANSMISSION_DATE_>".$transmissionDate."</osb:_TRANSMISSION_DATE_>
                        <osb:_TRANSMISSION_TIME_>".$transmissionTime."</osb:_TRANSMISSION_TIME_>
                        <osb:_CHANNEL_ID_>".$soapChannel."</osb:_CHANNEL_ID_>
                        <osb:_SERVICE_NAME_>".$serviceName."</osb:_SERVICE_NAME_>
                        <osb:_TRANSACTION_IDENTIFIER_>100</osb:_TRANSACTION_IDENTIFIER_>
                        <osb:_TRANSACTION_NUMBER_>".$soapTransNum."</osb:_TRANSACTION_NUMBER_>
                        <osb:_RESERVED_DATA_>ok</osb:_RESERVED_DATA_>
                        <osb:_RESPONSE_CODE_>?</osb:_RESPONSE_CODE_>
                        <osb:_RESPONSE_DESCRIPTION_>?</osb:_RESPONSE_DESCRIPTION_>
                        <osb:_MESSAGE_STATUS_>?</osb:_MESSAGE_STATUS_>
                       </osb:MESSAGE_HEADER>";

    $xml = "<soapenv:Envelope xmlns:soapenv='http://schemas.xmlsoap.org/soap/envelope/' xmlns:osb='http://osb.tempuri.org/'>
               <soapenv:Header/>
               <soapenv:Body>
                  <osb:".$serviceName."_IN>";
    $xml .= $message_header;
    $xml .= $soapBody;
    $xml .= "</osb:".$serviceName."_IN>
               </soapenv:Body>
            </soapenv:Envelope>";
			
	// echo $xml; exit;

    $xml_post_string = $xml;

    //echo $xml_post_string;exit;
   $headers = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Pragma: no-cache",
        "SOAPAction: $soapUrl", 
        "Content-length: ".strlen($xml_post_string),
    ); //SOAPAction: your op URL
    
    // PHP cURL  for https connection with auth
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_URL, $soapUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERPWD, $soapUser.":".$soapPassword); // username and password - declared at the top of the doc
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // converting
    $response = curl_exec($ch); 
    curl_close($ch);
    /*SOAP REQUEST ENDS HERE*/

    $response = str_replace("soapenv:","",$response);
    $response = str_replace("osb:","",$response);
    
    $response = str_replace("<Body>","",$response);
    $response = str_replace("</Body>","",$response);

    // convertingc to XML
    $parser = simplexml_load_string($response);
    
    if(isset($parser)){
        return $parser;
    } else{
        return false;
    }
}

?>