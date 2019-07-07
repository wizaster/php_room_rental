<?php
include('./Classes/CalendrierManipulation.class.php');
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