<?php

########################################################
# Login information for the SMS Gateway
########################################################
function sms_credentail() {
	
	$smsAccess = array(
		'ip'              => 'apps.eocean.us/sindhsec/sindhsec.php',
        'port'            => '24555',
        'username'        => 'sindh_sec_99095',
        'password'        => 'P@256982',
		'originator'      => '99095',
		'sms_mode'        => 'live',
        'security_code'   => 'FVDCROIUN5jnh%vfd'
	);
    return	$smsAccess;
}


########################################################
# Functions used to send the SMS message
########################################################
function httpRequest($url){
    $pattern = "/http...([0-9a-zA-Z-.]*).([0-9]*).(.*)/";
    preg_match($pattern,$url,$args);
    $in = "";
    $fp = fsockopen("$args[1]", $args[2], $errno, $errstr, 30);
    if (!$fp) {
       return("$errstr ($errno)");
    } else {
        $out = "GET /$args[3] HTTP/1.1\r\n";
        $out .= "Host: $args[1]:$args[2]\r\n";
        $out .= "User-agent: PHP Web SMS client\r\n";
        $out .= "Accept: */*\r\n";
        $out .= "Connection: Close\r\n\r\n";

        fwrite($fp, $out);
        while (!feof($fp)) {
           $in.=fgets($fp, 128);
        }
    }
    fclose($fp);
    return($in);
}

function sendsms($number, $message)
{
    $smsAccess = sms_credentail(); // get sms ip, port, username, password
	$number = rawurlencode($number);
    $message = rawurlencode($message);
    
        $url = "http://".$smsAccess['ip']."?security_code=".$smsAccess['security_code']."&messagedata=".$message."&recipient=".$number."&originator=".$smsAccess['originator'];
		// echo $url; exit;
		$xml = simplexml_load_file($url);

        $response = $xml->data->acceptreport->statusmessage;
        if($response == "Message accepted for delivery"){
            return 'Message Succesfully sent';
        } else {
            return 'Message could not sent';
        }

}


function sendsms_without_text($number, $message)
{
    $smsAccess = sms_credentail(); // get sms ip, port, username, password
	$number = rawurlencode($number);
    $message = rawurlencode($message);
    
        $url = "http://".$smsAccess['ip']."?security_code=".$smsAccess['security_code']."&messagedata=".$message."&recipient=".$number."&originator=".$smsAccess['originator'];
        $xml = simplexml_load_file($url);

        $response = $xml->data->acceptreport->statusmessage;
        if($response == "Message accepted for delivery"){
            return TRUE;
        } else {
            return FALSE;
        }

}


// sending email notifications
function sendemail($id, $to, $message, $from)
{
    $CI = get_instance();
    $CI->load->model('cron_model');
    // Load EMAIL library.
    $CI->load->library('email');
    $CI->email->initialize( $CI->config->item('email'));
    $e=$CI->config->item('email');

    // Sending EMAIL
    $CI->email->from($e["smtp_user"], $from['name']);
    $CI->email->to($to);

    $CI->email->subject('Immediate Notification From '.$from['name'].'('.$from['email'].')');
    $CI->email->message($message);

    if($CI->email->send()) {

        // set dispatched status to 1
        $CI->cron_model->set_dispatched_by_id($id);
        echo "<span style='color:green'>Email successfully sent to ".$to."</span><br>";

    } else {
        echo "<span style='color:red'>An error ouccured while sending E-MAIL to ".$to."</span><br>";
    }
    //echo $CI->email->print_debugger();
    //exit;
}

/*
 * get all category shortcuts for currently logged in user
 */
function category_shortcuts($catprivileges){
    $CI = get_instance();
    $CI->load->model('Content_model');

    $cats=$CI->Content_model->get_categories( $catprivileges );
     foreach($cats as $cat){
?>
    shortcut.add("<?php echo $cat->catShortCut;?>",function() {
    window.open('<?php echo site_url()?>content/add/<?php echo $cat->id;?>');
    });
<?php
     }
}
?>