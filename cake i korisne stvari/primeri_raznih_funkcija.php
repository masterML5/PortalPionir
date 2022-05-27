<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META content="text/html; charset=utf8" http-equiv="Content-Type"><TITLE>Test primeri</TITLE>
</HEAD>
<BODY>



<?php
$num = cal_days_in_month(CAL_GREGORIAN, 8, 2003); // 31
echo "Ima $num dana u avgustu 2003";
echo "<br><br>";
?>


<?php
function get_days_in_month($month, $year)
{
   return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year %400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
}

echo "<br><br>";
echo "pogodine u kom mesecu ima ".get_days_in_month(06, 2012)." dana";
echo "<br><br>";
?>



<?php 
if (!function_exists('cal_days_in_month')) 
{ 
    function cal_days_in_month($calendar, $month, $year) 
    { 
        return date('t', mktime(0, 0, 0, $month, 1, $year)); 
    } 
} 
if (!defined('CAL_GREGORIAN')) 
    define('CAL_GREGORIAN', 1); 
	
echo "U junu 2012. godine ima ".cal_days_in_month(CAL_GREGORIAN, 06, 2012)." dana";
echo "<br><br>";
?>

<?php 
/* 
 * days_in_month($month, $year) 
 * Returns the number of days in a given month and year, taking into account leap years. 
 * 
 * $month: numeric month (integers 1-12) 
 * $year: numeric year (any integer) 
 * 
 * Prec: $month is an integer between 1 and 12, inclusive, and $year is an integer. 
 * Post: none 
 */ 
// corrected by ben at sparkyb dot net 
function days_in_month($month, $year) 
{ 
// calculate number of days in a month 
return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31); 
} 
?> 

<?php
function getMonthDays($Month, $Year)
{
   //Si la extensión que mencioné está instalada, usamos esa.
   if( is_callable("cal_days_in_month"))
   {
      return cal_days_in_month(CAL_GREGORIAN, $Month, $Year);
   }
   else
   {
      //Lo hacemos a mi manera.
      return date("d",mktime(0,0,0,$Month+1,0,$Year));
   }
}
 
//Obtenemos la cantidad de días que tiene septiembre del 2008
echo "<br><br>".getMonthDays(9, 2008)."<br><br>";
?>



<?php
$date = getdate();
print_r($date);

echo "<br><br>";

$date = getdate();
echo "mesec u današnjem datumu je ".$date['mon'];
//... $date['year'] ...;

echo "<br><br>";


?> 

<?php
//razlièiti prikaz datuma

$ts = strtotime('next week');
echo $ts, '<br />';
echo date('Y-m-d', $ts), '<br />';

$ts = strtotime('next tuesday');
echo $ts, '<br />';
echo date('Y-m-d', $ts), '<br />';

$ts = strtotime('last thursday');
echo $ts, '<br />';
echo date('Y-m-d', $ts), '<br />';

$ts = strtotime('2 weeks ago');
echo $ts, '<br />';
echo date('Y-m-d', $ts), '<br />';

$ts = strtotime('+ 1 month');
echo $ts, '<br />';
echo date('Y-m-d', $ts), '<br />';

?> 



<?php
//The JDDayOfWeek() function returns the day of a week.
// Syntax:	jddayofweek(jd,mode)
// Parameters: 
//	jd (Required) = A number (a Julian day count); 
//	mode (Optional) = Defines what to return (integer or string). Mode values:
//		0 - Default. Returns the day number as an int (0=Sunday, 1=Monday, etc)
//		1 - Returns a string that contains the day of week (English-Gregorian)
//		2 - Returns a string that contains the abbreviated day of week (English-Gregorian)

echo "<br><br>dan u nedelji";

$jd=cal_to_jd(CAL_GREGORIAN,date("m"),date("d"),date("Y"));
echo(jddayofweek($jd,0));
echo(jddayofweek($jd,1));
echo(jddayofweek($jd,2));

echo "<br><br>";
?>



<?php
# PHP Calendar (version 2.3), written by Keith Devens

function generate_calendar($year, $month, $days = array(), $day_name_length = 3, $month_href = NULL, $first_day = 0, $pn = array()){
    $first_of_month = gmmktime(0,0,0,$month,1,$year);

    #remember that mktime will automatically correct if invalid dates are entered
    # for instance, mktime(0,0,0,12,32,1997) will be the date for Jan 1, 1998
    # this provides a built in "rounding" feature to generate_calendar()

    $day_names = array(); #generate all the day names according to the current locale
    for($n=0,$t=(3+$first_day)*86400; $n<7; $n++,$t+=86400) #January 4, 1970 was a Sunday
        $day_names[$n] = ucfirst(gmstrftime('%A',$t)); #%A means full textual day name

    list($month, $year, $month_name, $weekday) = explode(',',gmstrftime('%m,%Y,%B,%w',$first_of_month));
    $weekday = ($weekday + 7 - $first_day) % 7; #adjust for $first_day
    $title   = htmlentities(ucfirst($month_name)).'&nbsp;'.$year;  #note that some locales don't capitalize month and day names

    #Begin calendar. Uses a real <caption>. See http://diveintomark.org/archives/2002/07/03
    @list($p, $pl) = each($pn); @list($n, $nl) = each($pn); #previous and next links, if applicable
    if($p) $p = '<span class="calendar-prev">'.($pl ? '<a href="'.htmlspecialchars($pl).'">'.$p.'</a>' : $p).'</span>&nbsp;';
    if($n) $n = '&nbsp;<span class="calendar-next">'.($nl ? '<a href="'.htmlspecialchars($nl).'">'.$n.'</a>' : $n).'</span>';
    $calendar = '<table class="calendar">'."\n".
        '<caption class="calendar-month">'.$p.($month_href ? '<a href="'.htmlspecialchars($month_href).'">'.$title.'</a>' : $title).$n."</caption>\n<tr>";

    if($day_name_length){ #if the day names should be shown ($day_name_length > 0)
        #if day_name_length is >3, the full name of the day will be printed
        foreach($day_names as $d)
            $calendar .= '<th abbr="'.htmlentities($d).'">'.htmlentities($day_name_length < 4 ? substr($d,0,$day_name_length) : $d).'</th>';
        $calendar .= "</tr>\n<tr>";
    }

    if($weekday > 0) $calendar .= '<td colspan="'.$weekday.'">&nbsp;</td>'; #initial 'empty' days
    for($day=1,$days_in_month=gmdate('t',$first_of_month); $day<=$days_in_month; $day++,$weekday++){
        if($weekday == 7){
            $weekday   = 0; #start a new week
            $calendar .= "</tr>\n<tr>";
        }
        if(isset($days[$day]) and is_array($days[$day])){
            @list($link, $classes, $content) = $days[$day];
            if(is_null($content))  $content  = $day;
            $calendar .= '<td'.($classes ? ' class="'.htmlspecialchars($classes).'">' : '>').
                ($link ? '<a href="'.htmlspecialchars($link).'">'.$content.'</a>' : $content).'</td>';
        }
        else $calendar .= "<td>$day</td>";
    }
    if($weekday != 7) $calendar .= '<td colspan="'.(7-$weekday).'">&nbsp;</td>'; #remaining "empty" days

    return $calendar."</tr>\n</table>\n";
}
echo generate_calendar(2012, 06, 16, 1, NULL, 1, 15, $first_of_month, $day_names, $day_names[$n]);
#echo generate_calendar($year, $month, $days,$day_name_length,$month_href,$first_day,$pn);
?>


<?php
echo "<br><br>Jednostavan kalendar sa http://php.about.com/od/finishedphp1/ss/php_calendar.htm <br><br>";

//This gets today's date 
 $date =time () ; 

 //This puts the day, month, and year in seperate variables 
 $day = date('d', $date) ; 
 $month = date('m', $date) ; 
 $year = date('Y', $date) ;

 //Here we generate the first day of the month 
 $first_day = mktime(0,0,0,$month, 1, $year) ; 

 //This gets us the month name 
 $title = date('F', $first_day) ; 

 //Here we find out what day of the week the first day of the month falls on 
 $day_of_week = date('D', $first_day) ; 

//Once we know what day of the week it falls on, we know how many blank days occure before it. If the first day of the week is a Sunday then it would be zero
 switch($day_of_week){ 
 case "Mon": $blank = 0; break; 
 case "Tue": $blank = 1; break; 
 case "Wed": $blank = 2; break; 
 case "Thu": $blank = 3; break; 
 case "Fri": $blank = 4; break; 
 case "Sat": $blank = 5; break; 
 case "Sun": $blank = 6; break; 
 }

//We then determine how many days are in the current month
 $days_in_month = cal_days_in_month(0, $month, $year) ; 

 //Here we start building the table heads 
 echo "<table border=1 width=294>";
 echo "<tr><th colspan=7> $title $year </th></tr>";
 //echo "<tr><td width=42>S</td><td width=42>M</td><td width=42>T</td><td width=42>W</td><td width=42>T</td><td width=42>F</td><td width=42>S</td></tr>";
 echo "<tr><td width=42>P</td><td width=42>U</td><td width=42>S</td><td width=42>È</td><td width=42>P</td><td width=42>S</td><td width=42>N</td></tr>";

 //This counts the days in the week, up to 7
 $day_count = 1;

 echo "<tr>";

 //first we take care of those blank days
 while ( $blank > 0 ) 
 { 
 echo "<td></td>"; 
 $blank = $blank-1; 
 $day_count++;
 } 

 //sets the first day of the month to 1 

 $day_num = 1;

 //count up the days, untill we've done all of them in the month
 while ( $day_num <= $days_in_month ) 
 { 
 echo "<td> $day_num </td>"; 
 $day_num++; 
 $day_count++;

 //Make sure we start a new row every week
 if ($day_count > 7)
 {
 echo "</tr><tr>";
 $day_count = 1;
 }
 } 

//Finaly we finish out the table with some blank details if needed
 while ( $day_count >1 && $day_count <=7 ) 
 { 
 echo "<td> </td>"; 
 $day_count++; 
 } 
 
echo "</tr></table>"; 
 
echo "<br><br>";
?>












</BODY>
</HTML>