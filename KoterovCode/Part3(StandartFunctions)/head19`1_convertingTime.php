<?php

//Our task is

/*
    1 - Getting current timestamp-format according to GMT. Exactly this timestamp showing the clock on Grinwich.
        we will save it in DB
    2 -  Getting text showing of date if GMT-timestamp and goal timezone is known. Will be echode in Browser of User
*/


function local12gm($localStamp = false){
    // counting timestamp in Grinwich which fitted to local timestamp-format
    if ($localStamp === false) $localStamp = time();
    //getting shift of the timezone in seconds
    $tzOffSet = date("Z",$localStamp);
        //counting the difference and getting time on GMT
        return $localStamp - $tzOffSet;

}

//Counting local timestamp in Grinwich which fitted to GMT-standart
function gm2local($gmStamp = false,$tzOffSet = false){
    if ($gmStamp === false) return time();
    if ($tzOffSet === false) 
        $tzOffSet = date("Z",$gmStamp); // returning the shift in seconds current timezone according to Grinwich
    else {
        $tzOffSet *= 60*60;
    }
    return $gmStamp + $tzOffSet;
}

    //local12gm - allow us to add time to database
        //local12gm(time())
    //to echo time from database into browser 
        //echo date($format,gm2local($stampGMT,$tz));
        //$format is - string of formatting date (Y-m-d H:i);
        //$stampGMT --- format timestamp according to Grinwich from database
        //$tz - timezone of user
?>