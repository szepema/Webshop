<?php
    function atalakitas_link($sz){
        return str_replace([',', ' ', 'á', 'é', 'í', 'ó', 'ö', 'ő', 'ú', 'ü', 'ű'],['', '-', 'a', 'e', 'i', 'o', 'o', 'o', 'u', 'u', 'u'],strtolower($sz));
    }
?>