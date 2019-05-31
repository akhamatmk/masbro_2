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

function buildMenu($array, $class = 'main-tree-menu')
{
    echo '<ul class="'.$class.'">';
    foreach ($array as $item)
    {
        echo '<li data-id="'.$item->id.'">';
        echo $item->name;
        if (count($item->children))
            buildMenu($item->children, '');

        echo '</li>';
    }
    echo '</ul>';
}

function checkLike($user_id, $post_id)
{
    $like = App\Models\PostLike::where('user_id', $user_id)->where('post_id', $post_id)->first();
    if($like)
        return $like->type;

    return 0;
}

function getLengthOfWork($experience = null)
{
    if($experience->currently == 1)
    {
        $month_until = (int) date('m');
        $year_until = (int) date('Y');
    } else {
        $month_until = $experience->until_month;
        $year_until = $experience->until_year;
    }

    $month_from = (int) $experience->from_month;
    $year_from = (int) $experience->from_year;

    if($year_from > $year_until)
        return null;
    else if($year_from < $year_until){
        $month_until+=12;
    }

    if($month_until < $month_from)
        return null;

    $sum_month = $month_until - $month_from +24;
    if($sum_month < 12)
        return '( '.$sum_month.' Bulan)';

    $year = (int) ($sum_month / 12 );
    $month = $sum_month % 12;
    $string= "( ".$year." Tahun";
    if($month > 0)
        $string.= " ".$month." Bulan";
    $string.= " )";
    
    return $string;
}