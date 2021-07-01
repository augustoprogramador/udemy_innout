<?php

    Database::executeSQL('DELETE FROM working_hours');
    Database::executeSQL('DELETE FROM users WHERE id > 5');

    function getDayTemplateByOdds($regularRate, $extraRate, $lazyRate)
    {
        $regularDayTemplate = [
            'time1' => '08:00:00',
            'time3' => '12:00:00',
            'time2' => '13:00:00',
            'time4' => '18:00:00',
            'worked_time' => DAILY_TIME
        ];
        
        $extraHourDayTemplate = [
            'time1' => '08:00:00',
            'time3' => '12:00:00',
            'time2' => '13:00:00',
            'time4' => '18:00:00',
            'worked_time' => DAILY_TIME + 3600
        ];
        
        $lazyDayTemplate = [
            'time1' => '08:30:00',
            'time3' => '12:00:00',
            'time2' => '13:00:00',
            'time4' => '17:00:00',
            'worked_time' => DAILY_TIME - 1800
        ];

        $value = rand(0, 100);

        if ($value <= $regularRate) {
            return $regularDayTemplate;
        } else if ($value <= $regularRate + $extraRate) {
            return $extraHourDayTemplate;
        } else {
            return $lazyDayTemplate;
        }

    }

    function populateWorkingHours($userId, $initialDate, $regularRate, $extraRate, $lazyRate)
    {
        $currentDate = $initialDate;
        // $today = new DateTime();
        $lastDay= date('Y-m-t');
        // $today->modify('+3 days');
        $columns = ['user_id' => $userId, 'work_date' => $currentDate];
        
        // while (isBefore($currentDate, $today))
        while (isBefore($currentDate, $lastDay))
        {
            if (!isWeekend($currentDate)) {
                $template = getDayTemplateByOdds($regularRate, $extraRate, $lazyRate);
                $columns = array_merge($columns, $template);
                $workingHours = new WorkingHours($columns);
                $workingHours->insert();
                // echo "cheguei aqui"; die;
            }
            $currentDate = getNextDay($currentDate)->format('Y-m-d');
            $columns['work_date'] = $currentDate;
        }
    }

    // $lastMonth = strtotime('first day of last month');
    populateWorkingHours(1, date('Y-m-2'), 70, 20, 10);
    // populateWorkingHours(2, date('Y-m-1'), 20, 75, 5);
    // populateWorkingHours(3, date('Y-m-d', $lastMonth), 20, 70, 10);

    echo "Tudo certo";
    // echo '<pre>';
    // print_r(getDayTemplateByOdds(10, 20, 70));