<?php

function build_calendar($month, $year) {

  // Array with days of the week
  $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
  // First day of the month
  $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
  // Number of days in month
  $numberDays = date('t', $firstDayOfMonth);

  $dateComponents = getdate($firstDayOfMonth);

  $monthName = $dateComponents['month'];

  $dayOfWeek = $dateComponents['wday'];

  // Current date






  $dateToday = date('Y-m-d');



  $calendar = "<table class='table table-bordered'>";
  $calendar .= "<center><h2>$monthName $year</h2>";
  $calendar .= "<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month-1, 1,
    $year))."&year=".date('Y', mktime(0,0,0,$month-1,1,$year))."'>Previous Month</a> ";

  $calendar .= " <a class='btn btn-xs btn-primary' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a> ";

  $calendar .= "<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month+1, 1,
    $year))."&year=".date('Y', mktime(0,0,0,$month+1,1,$year))."'>Next Month</a></center><br />";

  $calendar .= "<tr>";

  // Calendar Headers

  foreach ($daysOfWeek as $day) {
    $calendar .= "<th class='header'>$day</th>";
  }





  $currentDay = 1;

  $calendar .= "</tr><tr>";





  if($dayOfWeek > 0) {
    for ($i=0; $i < $dayOfWeek; $i++) {
      $calendar .= "<td class='empty'></td>";

    }
  }


  $month = str_pad($month,2,"0",STR_PAD_LEFT);

  while ($currentDay <= $numberDays) {

    //start new row at seventh col

    if ($dayOfWeek == 7) {

      $dayOfWeek = 0;
      $calendar .= "</tr><tr>";

    }

      $currentDayRel = str_pad($currentDay,2,"0",STR_PAD_LEFT);
      $date = "$year-$month-$currentDayRel";

      $dayname = strtolower(date('|', strtotime($date)));
      $eventNum = 0;
      $today = $date==date('Y-m-d')?"today":"";
      if ($date<date('Y-m-d')) {
        $calendar.="<td><h4>$currentDay</h4><button class='btn btn-danger btn-xs'>N/A</button>";
      }else {
        $calendar.="<td class='$today'><h4>$currentDay</h4><a href='book.php?date=".$date."'
          class='btn btn-success btn-xs'>Book</a>";
      }


      $calendar .= "</td>";

      $currentDay++;
      $dayOfWeek++;
  }

  if($dayOfWeek != 7) {
    $remainingDays = 7-$dayOfWeek;
    for ($i=0; $i < $remainingDays; $i++) {
      $calendar .= "<td></td>";
    }
  }

  $calendar .= "</tr>";
  $calendar .= "</table>";

  echo $calendar;
}
?>
