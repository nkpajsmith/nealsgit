<?php
if (!session_id()) {
    /* session not started already */
    session_start();
}

function check_consumer_access() {
    if(!isset($_SESSION['consumer']) || $_SESSION['consumer']=="") {
        redirect_to('../index.php');
    }
}

function check_provider_access() {
    if(!isset($_SESSION['provider']) || $_SESSION['provider']=="") {
        redirect_to('index.php');
    }
}

//for redirection if the error occures before header.
function redirect_to($url) {
    print("<script> window.location.href='".$url."'</script>");
}

function redirect_too($url) {
    print("<script> alert('Oops, you need to be logged in to access this page, and it looks like you are not.  Please login and try again.')</script>");
    print("<script> window.location.href='".$url."'</script>");
}

// returns the document root
function getDocRoot() {
    $path2 = dirname(__FILE__);
    $path2 = str_replace("\\", "/", $path2);
    $docRoot= explode("techmatcher",$path2);
    return $docRoot[0];
}

function getImageFileSource($imagename) {
    $doc_root = getDocRoot();
    $filename  = $doc_root."techmatcher/provider/charts/tempimages/".$imagename;
    return $filename;
}

function getDefaultImgSrc($imagename) {
    $doc_root = getDocRoot();
    $filename  = $doc_root."techmatcher/provider/charts/defaultimages/".$imagename;
    return $filename;
}

function maskCreditCard($cc) {
    // Get the cc Length
    $cc_length = strlen($cc);
    // Replace all characters of credit card except the last four and dashes
    for($i=0; $i<$cc_length-4; $i++) {
        $cc[$i] = 'X';
    }
    // Return the masked Credit Card #
    return $cc;
}

function parseReplaceXML($strXML,$c_no) {
    // parsing xml extracting value and then writing the new mask value to the xml again
    $xml = simplexml_load_string($strXML);
    $cc_no = $xml->creditcard->cardnumber[0];
    $credit_card = maskCreditCard($c_no);
    $find = "<cardnumber>".$c_no."</cardnumber>";
    $replace = "<cardnumber>".$credit_card."</cardnumber>";
    $str=str_replace($find,$replace,$strXML);
    return $str;
}

function output_file($file, $name, $mime_type='')
{
 /*
 This function takes a path to a file to output ($file), 
 the filename that the browser will see ($name) and 
 the MIME type of the file ($mime_type, optional).
 
 If you want to do something on download abort/finish,
 register_shutdown_function('function_name');
 */
 if(!is_readable($file)) die('File not found or inaccessible!  '.$file);
 
 $size = filesize($file);
 $name = rawurldecode($name);
 
 /* Figure out the MIME type (if not specified) */
 $known_mime_types=array(
	"doc" => "application/msword",
	"csv" => "text/comma-separated-values",
	"php" => "text/plain"
 );
 
 if($mime_type==''){
	 $file_extension = strtolower(substr(strrchr($file,"."),1));
	 if(array_key_exists($file_extension, $known_mime_types)){
		$mime_type=$known_mime_types[$file_extension];
	 } else {
		$mime_type="application/force-download";
	 };
 };
 
 @ob_end_clean(); //turn off output buffering to decrease cpu usage
 
 // required for IE, otherwise Content-Disposition may be ignored
 if(ini_get('zlib.output_compression'))
  ini_set('zlib.output_compression', 'Off');
 
 header('Content-Type: ' . $mime_type);
 header('Content-Disposition: attachment; filename="'.$name.'"');
 header("Content-Transfer-Encoding: binary");
 header('Accept-Ranges: bytes');
 
 /* The three lines below basically make the 
    download non-cacheable */
 header("Cache-control: private");
 header('Pragma: private');
 header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
 
 // multipart-download and download resuming support
 if(isset($_SERVER['HTTP_RANGE']))
 {
	list($a, $range) = explode("=",$_SERVER['HTTP_RANGE'],2);
	list($range) = explode(",",$range,2);
	list($range, $range_end) = explode("-", $range);
	$range=intval($range);
	if(!$range_end) {
		$range_end=$size-1;
	} else {
		$range_end=intval($range_end);
	}
 
	$new_length = $range_end-$range+1;
	header("HTTP/1.1 206 Partial Content");
	header("Content-Length: $new_length");
	header("Content-Range: bytes $range-$range_end/$size");
 } else {
	$new_length=$size;
	header("Content-Length: ".$size);
 }
 
 /* output the file itself */
 $chunksize = 1*(1024*1024); //you may want to change this
 $bytes_send = 0;
 if ($file = fopen($file, 'r'))
 {
	if(isset($_SERVER['HTTP_RANGE']))
	fseek($file, $range);
 
	while(!feof($file) && 
		(!connection_aborted()) && 
		($bytes_send<$new_length)
	      )
	{
		$buffer = fread($file, $chunksize);
		print($buffer); //echo($buffer); // is also possible
		flush();
		$bytes_send += strlen($buffer);
	}
 fclose($file);
 } else die('Error - can not open file.');
 
die();
}	

?>