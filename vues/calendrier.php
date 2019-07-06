<?php
include_once('./Classes/Location.class.php');
require_once('./Classes/LocationDAO.class.php');
// Set your timezone
date_default_timezone_set('America/New_York');
// Get prev & next month
if (isset($_REQUEST['ym'])) {
    $ym = $_REQUEST['ym'];
} else {
    // This month
    $ym = date('Y-m');
}
// Check format
$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}
$location = LocationDAO::findDatesBySalleId($_SESSION['salleId']);
if (count($location) > 0) {
    $datesLoc = array();
    foreach ($location as $ficheLoc) {
        if (DateTime::createFromFormat("Y-m-d", $ficheLoc->getDateDebut())->format("Y-m") == $ym
            || DateTime::createFromFormat("Y-m-d", $ficheLoc->getDateFin())->format("Y-m") == $ym) {
            array_push($datesLoc, $ficheLoc);
        }
    }
    $dateReserve = array();
    if ($datesLoc >= 1) {
        foreach ($datesLoc as $dateLoc) {
            $debLoc = DateTime::createFromFormat("Y-m-d", $dateLoc->getDateDebut());
            $finLoc = DateTime::createFromFormat("Y-m-d", $dateLoc->getDateFin());
            for ($i = $debLoc->format("d"); $i <= $finLoc->format("d"); $i++) {
                array_push($dateReserve, (int)$i);
            }
        }
    }
}
// Today
$today = date('Y-m-j', time());
// For H3 title
$html_title = date('Y / m', $timestamp);
// Create prev & next month link     mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) - 1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) + 1, 1, date('Y', $timestamp)));
// You can also use strtotime!
// $prev = date('Y-m', strtotime('-1 month', $timestamp));
// $next = date('Y-m', strtotime('+1 month', $timestamp));
// Number of days in the month
$day_count = date('t', $timestamp);

// 0:Sun 1:Mon 2:Tue ...
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
//$str = date('w', $timestamp);
// Create Calendar!!
$weeks = array();
$week = '';
// Add empty cell
$week .= str_repeat('<td></td>', $str);
for ($day = 1, $loc = 0; $day <= $day_count; $day++, $str++) {

    $date = $ym . '-' . $day;
    if (count($dateReserve) > 0) {
        if ($dateReserve[$loc] == $day) {
            $week .= '<td class="reserver">' . $day;
            if ($loc + 1 < count($dateReserve)) {
                $loc++;
            }
        } elseif ($today == $date) {
            $week .= '<td class="today">' . $day;
        } else {
            $week .= '<td>' . $day;
        }
    } elseif ($today == $date) {
        $week .= '<td class="today">' . $day;

    } else {
        $week .= '<td>' . $day;
    }
    $week .= '</td>';

    // End of the week OR End of the month
    if ($str % 7 == 6 || $day == $day_count) {
        if ($day == $day_count) {
            // Add empty cell
            $week .= str_repeat('<td></td>', 6 - ($str % 7));
        }
        $weeks[] = '<tr>' . $week . '</tr>';
        // Prepare for new week
        $week = '';
    }
}

?>

<div class="container_calendar">
    <h3><a href="?action=calendrier&ym=<?php echo $prev; ?>">&lt;</a> <?php echo $html_title; ?> <a
                href="?action=calendrier&ym=<?php echo $next; ?>">&gt;</a></h3>
    <table class="table table-bordered">
        <tr>
            <th>S</th>
            <th>M</th>
            <th>T</th>
            <th>W</th>
            <th>T</th>
            <th>F</th>
            <th>S</th>
        </tr>
        <?php
        foreach ($weeks as $week) {
            echo $week;
        }
        ?>
    </table>
</div>