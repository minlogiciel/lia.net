<?php

if ( ! function_exists('document_root'))
{
    
    function document_root()
    {
        return $_SERVER['DOCUMENT_ROOT'] . '/lia.net/application/';
    }
}

if ( ! function_exists('includes_path'))
{
    
    function includes_path()
    {
        return document_root(). 'includes/';
    }
}

if ( ! function_exists('utils_root'))
{
    
    function utils_root()
    {
        return document_root(). 'views/utils/';
    }
}

if ( ! function_exists('lia_school'))
{
    
    function lia_school()
    {
        return '<b><font color=orange>L.I.A.</font></b>';
    }
}

if ( ! function_exists('lia_address'))
{
    
    function lia_address()
    {
        return '303 Sunnyside Blvd. Suite 10, Plainview, NY 11803, USA';
    }
}

if ( ! function_exists('lia_phone'))
{
    
    function lia_phone()
    {
        return '(516) 364-2121';
    }
}

if ( ! function_exists('lia_fax'))
{
    
    function lia_fax()
    {
        return '(516) 364-2121';
    }
}

if ( ! function_exists('lia_site'))
{
    
    function lia_site()
    {
        return "<a href='http://longislandacademy.net'>http://longislandacademy.net<a>";
    }
}

if ( ! function_exists('lia_email'))
{
    
    function lia_email()
    {
        return "<a href='mailto:liacademy@aol.com'>liacademy@aol.com</a>";
    }
}

if ( ! function_exists('lia_announce'))
{
    
    function lia_announce()
    {
        return "<a href='mailto:liacademy@aol.com'>liacademy@aol.com</a>";
    }
}

if ( ! function_exists('current_date'))
{
    
    function current_date()
    {
        return date("m/d/Y - H:i:s");
    }
}

function get_month_simple($m) {
    $m = (int)$m - 1;
    $MONTH = array("Jan",  "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec");
    return $MONTH[$m];
}

function get_month($m) {
    $m = (int)$m - 1;
    $MONTH = array("January",  "February", "March", "April", "May", "June", "July", "August",  "September", "October", "November", "December");
    return $MONTH[$m];
}

if ( ! function_exists('semester_period'))
{
    
    function semester_period($semester='summer', $annee=2018)
    {
        $str = strtolower($semester);
        if ($str == "summer") {
            $ret = (get_month(7). " 5, " .$annee. " - " .get_month(8). " 20, " .$annee);
        }
        else if ($str == "fall") {
            $ret = (get_month(9). " 10, " .$annee. " - " .get_month(12). " 17, " .$annee);
        }
        else if ($str == "spring") {
            $ret = (get_month(1). " 21, " .$annee. " - " .get_month(6). " 2, " .$annee);
        }
        else {
            $m = date('M');
            if ($m < 7) {
                $ret = semester_period('spring', $annee);
            }
            else if ($m > 8) {
                $ret = semester_period('fall', $annee);
            }
            else {
                $ret = semester_period('summer', $annee);
            }
        }
        return $ret;
    }
}



?>
