<?php
include_once('./Classes/Location.class.php');
require_once('./Classes/LocationDAO.class.php');
date_default_timezone_set('America/New_York');
if (isset($_REQUEST['ym'])) {
    $ym = $_REQUEST['ym'];
} else {
    $ym = date('Y-m');
}
$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}
$location = LocationDAO::findDatesBySalleId($_SESSION['salleId']);
$_SESSION['location'] = serialize($location);
if (count($location) > 0) {
    $datesLoc = array();
    foreach ($location as $ficheLoc) {
        if (DateTime::createFromFormat("Y-m-d", $ficheLoc->getDateDebut())->format("Y-m") == $ym
            || DateTime::createFromFormat("Y-m-d", $ficheLoc->getDateFin())->format("Y-m") == $ym
            || (DateTime::createFromFormat("Y-m-d", $ficheLoc->getDateDebut())->format("Y-m") < $ym)
            && DateTime::createFromFormat("Y-m-d", $ficheLoc->getDateFin())->format("Y-m") > $ym) {
            array_push($datesLoc, $ficheLoc);
        }
    }
    $dateReserve = array();
    if (count($datesLoc) > 0) {
        foreach ($datesLoc as $dateLoc) {
            $debLoc = DateTime::createFromFormat("Y-m-d", $dateLoc->getDateDebut());
            $finLoc = DateTime::createFromFormat("Y-m-d", $dateLoc->getDateFin());
            $duree = $debLoc->diff($finLoc)->format('%a') + 1;
            $time = $debLoc;
            for ($i = 0; $i <= $duree; $i++) {
                $time = $time->modify('+1 day');
                if ($time->format('Y-m') == $ym) {
                    array_push($dateReserve, date($time->format('Y-m-d')));
                }
            }
        }
    }
}
$today = date('Y-m-j', time());
$html_title = date('Y / m', $timestamp);
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) - 1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) + 1, 1, date('Y', $timestamp)));
$day_count = date('t', $timestamp);
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
$weeks = array();
$week = '';
$week .= str_repeat('<td></td>', $str);
for ($day = 1, $loc = 0; $day <= $day_count; $day++, $str++) {
    if ($day < 10) {
        $date = $ym . '-0' . $day;
    } else {
        $date = $ym . '-' . $day;
    }
    if (!empty($dateReserve) && $dateReserve != null) {
        if (count($dateReserve) > 0) {
            if ($dateReserve[$loc] == $date) {
                $week .= '<td class="reserver">' . $day;
                if ($loc + 1 < count($dateReserve)) {
                    $loc++;
                }
            } elseif ($today == $date) {
                $week .= '<td class="today">' . $day;
            } else {
                $week .= '<td>' . $day;
            }
        }
    } elseif ($today == $date) {
        $week .= '<td class="today">' . $day;

    } else {
        $week .= '<td>' . $day;
    }
    $week .= '</td>';
    if ($str % 7 == 6 || $day == $day_count) {
        if ($day == $day_count) {
            $week .= str_repeat('<td></td>', 6 - ($str % 7));
        }
        $weeks[] = '<tr>' . $week . '</tr>';
        $week = '';
    }
}
