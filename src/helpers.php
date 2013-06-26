<?php

/**
 * Calculate the human-readable file size (with proper units).
 *
 * @param  int     $size
 * @return string
 */
function nice_bytesize($size)
{
	$units = array('Bytes', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB', 'EiB');
	return @round($size / pow(1024, ($i = max(floor(log($size, 1024)), 0))), 2).' '.$units[$i];
}

function formatVariables($variables = array(), $output = "")
{
	if($variables == NULL) return;
    $output .= "<ul>";
    foreach($variables as $node=>$children) {

    	if (is_array($children) || is_object($children)) {
    		$output.= "<li class='variablenode'>"."<span class='variablekey'>".$node." <span class='variabletype'>(".gettype($children).") [".count($children)."]</span>"."</span>";
    		$output .= formatVariables($children);
    	} else {
    		$output .= "<li><span class='variablekey'>$node</span> = <span class='lit'>".$children.'</span></li>';
    	}

    	
    }
        
    $output.= "</ul>";

    return $output;
}


