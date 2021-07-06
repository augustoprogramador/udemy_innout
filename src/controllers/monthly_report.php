<?php

    session_start();
    requireValidSession();

    $currentDate = new DateTime();

    $user = $_SESSION['user'];
    // $registries = WorkingHours::getMonthlyReport($user->id, $currentDate);
    $registries = WorkingHours::getMonthlyReport($user->id, $currentDate);

    // print_r($registries); die;

    $report = [];
    $workday = 0;
    $sumOfWorkedTime = 0;
    $lastDay = getLastDayOfMonth($currentDate)->format('d');

    for ($day = 1; $day <= $lastDay; $day++) {

        $date = $currentDate->format('Y-m') . '-' . sprintf('%02d', $day);
        // print_r($registries[$date]); echo '<br>';
        $registry = $registries[$date];

        if (isPastWorkDay($date)) $workday++;

        if ($registry) {
            $sumOfWorkedTime += $registry->worked_time;
            array_push($report, $registry);
        } else {
            array_push($report, new WorkingHours([
                'work_date' => $date,
                'worked_time' => 0
            ]));
        }

    }

    $expectedTime = $workday * DAILY_TIME;
    $sign = ($sumOfWorkedTime >= $expectedTime) ? "+" : "-";
    // echo "$workday * " . DAILY_TIME . " = $expectedTime<br>";
    // echo getTimeStringFromSeconds(abs($sumOfWorkedTime - $expectedTime)); die;
    $balance = getTimeStringFromSeconds(abs($sumOfWorkedTime - $expectedTime));
    
    loadTemplateView('monthly_report', [
        'report' => $report,
        'sumOfWorkedTime' => getTimeStringFromSeconds($sumOfWorkedTime),
        'balance' => "{$sign}{$balance}"
    ]);