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

function get_class_name($classlist, $clsname) {
	if ($classlist && $clsname) {
		for ($i = 0; $i < count($classlist); $i++)  {
			if ($classlist[$i] && $classlist[$i] == $clsname) {
				return 1;
			}
		}
	}
	return 0;
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


function show_mark($mark="*") {
	echo("<font color=red><b>" . $mark . "</b></font>");
}

if ( ! function_exists('get_semester'))
{
	function get_semester($semester=FALSE)
	{
		if ($semester===FALSE) {
			$m = date('n');
			$d = date('d');
			switch ($m) {
			case 1:
				if ($d < 15)
					$semester = "Fall";
				break;
			case 7:
				if ($d > 5)
					$semester = "Summer";
				break;
			case 8:
				$semester = "Summer";
				break;
			case 9:
				if ($d < 10)
					$semester = "Summer";
				else 
					$semester = "Fall";
				break;
			case 10:
			case 11:
			case 12:
				$semester = "Fall";
				break;
			default :
				$semester = "Spring";
				break;
			}
		}
		return $semester;
	}
}

if ( ! function_exists('get_year'))
{
	function get_year($annee=FALSE)
	{
		if ($annee===FALSE) {
			$annee = date('Y');
		}
		return $annee;
	}
}

if ( ! function_exists('semester_period'))
{
	function semester_period($semester='summer', $annee=2018)
	{
		$str = strtolower($semester);
		if ($str == "fall") {
			$d1 = date("d", strtotime("second monday september $annee"))+5;
			$d2 = date("d", strtotime("third monday december $annee")) + 5;
			$ret = (get_month(9). " ".$d1.", " .$annee. " - " .get_month(12). " ".$d2.", " .$annee);
		}
		else if ($str == "spring") {
			$d1 = date("d", strtotime("second monday january $annee"))+5;
			$d2 = date("d", strtotime("second monday June $annee")) + 5;
			$ret = (get_month(1). " ".$d1.", " .$annee. " - " .get_month(6). " ".$d2.", " .$annee);
		}
		else {
			$d1 = date("d", strtotime("first monday july $annee"));
			$d2 = date("d", strtotime("second monday august $annee")) + 3;
			$ret = (get_month(7). " ".$d1. ", " .$annee. " - " .get_month(8). " ".$d2. ", " .$annee);
		}
		return $ret;
	}
}



?>
