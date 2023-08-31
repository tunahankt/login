<?php

try{
    $db = new PDO("mysql:host=localhost; dbname=aktip; charset=utf8", 'root', '');
   // echo "Baglanti basarili";
}
catch(Exception $e)
{
    echo $e->getmessage();
}


?>