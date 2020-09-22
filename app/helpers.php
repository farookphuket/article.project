<?php


function xxs_clean($text){

    $bad = array("<script>","</script>");
    $replace = array("&lt;script&gt;","&lt;/script&gt;");
    return str_replace($bad,$replace,$text);
}


?>
