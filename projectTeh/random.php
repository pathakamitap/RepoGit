<?php

function rand_string( $length ) {

       $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz@#$&*";  

       $size = strlen( $chars );
       $random="";
       for( $i = 0; $i < $length; $i++ ) {

              $str= $chars[ rand( 0, $size - 1 ) ];

              $random=$random.$str;

       }
       return $random;

}


?>