<?php 

/*
*  acf_esc_html
*
*  This function will encode <script> tags for safe output
*
*  @type	function
*  @date	25/6/17
*  @since	5.6.0
*
*  @param	string (string)
*  @return	(string)
*/

function acf_esc_html( $string = '' ) {
	
	// replace
	$string = str_replace('<script', htmlspecialchars('<script'), $string);
	$string = str_replace('</script', htmlspecialchars('</script'), $string);
	
	
	// return
	return $string;
	
}


/*
function acf_test_esc_html( $string = '' ) {
	
	$s = '';
	
	
	$time_start = microtime(true);
	$s .= wp_kses_post( $string );
	$s .= ' = ('. (microtime(true) - $time_start) .')';
	
	$s .= '-----';

	
	$time_start = microtime(true);
	$s .= str_replace(array('<script', '</script'), array(htmlspecialchars('<script'), htmlspecialchars('</script')), $string);
	$s .= ' = ('. (microtime(true) - $time_start) .')';
	

	$time_start = microtime(true);
	if( strpos($string, '<script') ) {
		$s .= str_replace(array('<script', '</script'), array(htmlspecialchars('<script'), htmlspecialchars('</script')), $string);
	}
	$s .= ' = ('. (microtime(true) - $time_start) .')';
	
	return $s;
	
}
*/


 ?>