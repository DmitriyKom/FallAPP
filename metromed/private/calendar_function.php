<?php

  function build_calendar_test($month, $year) {

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


    ////////Days With Appointments
    $appointment_set = find_appointments_by_user($_SESSION['user_id']);
    $app_r = [];
    while($appointment = mysqli_fetch_assoc($appointment_set)) {
      $app_r[] = h($appointment['app_dt']);
    }


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

        $appointment = in_array($date, $app_r)?"appointment":"";
        $select = in_array($date, $app_r)?"View Appointment":"Schedule Appointment";



        if ($date<date('Y-m-d')) {
          $calendar.="<td><h4>$currentDay</h4><button class='btn btn-danger btn-xs' style='visibility: hidden'>N/A</button>";




        } else {
          // $calendar.="<td class='$today'><h4>$currentDay</h4><a href='book.php?date=".$date."'
          //   class='btn btn-success btn-xs'>Book</a>";

        $book = url_for('booking/index.php');

        // echo $book;
          $calendar.="<td class='$today $appointment' style='height:120px;width:110px;'><h4 style='position: absolute;'>$currentDay</h4>

          <a href='".$book."?date=".$date."'id='click' style='margin:0, -12px; display:block; height:100%;'>$select</a>";

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
