<?php

function chek_session()
{
    $CI= & get_instance();
    $session=$CI->session->userdata('roleid');
    if($session!='1')
    {
        redirect('index');
    }
}

?>