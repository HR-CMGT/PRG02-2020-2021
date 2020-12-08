<?php
/**
 * Calculate difference & convert to days
 *
 * @param int $firstDate Timestamp in seconds
 * @param int $lastDate  Timestamp in seconds
 * @return float
 */
function getDifferenceBetweenDates($firstDate, $lastDate)
{
    $difference = $lastDate - $firstDate;
    $differenceDays = round( $difference / (24 * 60 * 60) );

    return $differenceDays;
}

/**
 * Retrieve nights till your next Birthday
 *
 * @param int $birthday Timestamp in seconds
 * @return float
 */
function getNightsTillBirthday($birthday)
{
    $today = time();//mktime(0, 0, 0, date("m"), date("d"), date("Y"));

    //Birthday is in the past, so we need to add a year
    while ($birthday < $today) {
        $birthday = strtotime("+1 year", $birthday);
    }

    //Number round down to prevent weird 'half' nights
    $differenceDays = getDifferenceBetweenDates($today, $birthday);
    return ceil($differenceDays);
}
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Opdracht 2.1</title>
	</head>
	<body >
        <section>
            <h1>Dates</h1>

            <div>Datum vandaag: <?= date("d-m-y H:i") ?></div>
            <div>Datum vorige week: <?= date("d-m-y H:i", strtotime("-1 week")) ?></div>
            <div>Verschil tussen dagen: <?= getDifferenceBetweenDates( strtotime('05-02-2015'), strtotime('12-08-2015') ) ?></div>
            <div>Nachtjes tot verjaardag: <?= getNightsTillBirthday(strtotime('05-02-1999')) ?></div>
        </section>
	</body>
</html>










