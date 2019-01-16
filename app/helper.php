<?php

function k99_relative_time($date) { 
	$post_date = strtotime($date);
    $delta = time() - $post_date;

    if ( $delta < 60 ) {
        return 'Less than a minute ago';
    }
    elseif ($delta > 60 && $delta < 120){
        return 'About a minute ago';
    }
    elseif ($delta > 120 && $delta < (60*60)){
        return strval(round(($delta/60),0)).' minutes ago';
    }
    elseif ($delta > (60*60) && $delta < (120*60)){
        return 'About an hour ago';
    }
    elseif ($delta > (120*60) && $delta < (24*60*60)){
        return strval(round(($delta/3600),0)).' hours ago';
    }



    $delta = ceil((time() -  $post_date) / (60 * 60 * 24));
    
    if($delta < 31)
    	return $delta.' day ago'; 

    $delta = ceil(floor($delta / 31));
    	return $delta.' month ago'; 
}