<?php
/*
 * 	This function gets the message label from the existing language.
 * 
 * 	when you ask for t('portName'), you will get the result acording to the active language.
 * 
 * 	English: This is the Jeddah Port.
 * 	Arabic: هذا هو ميناء جدة.
 * 
 */

function t($label, $param1=false, $param2=false){
	$ci =& get_instance(); 
	if(!empty($param1))
		$rs = sprintf($ci->lang->line($label), $param1, $param2);
	else 
		$rs = $ci->lang->line($label);
	if($rs)
		return $rs;
	else 
		return $label;
}