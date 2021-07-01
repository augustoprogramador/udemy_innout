<?php

    session_start();
    requireValidSession();

    loadModel('WorkingHours');

    $date = (new DateTime())->getTimestamp();
    $today = strftime('%d de %B de %Y', $date);

    // $user = $_SESSION['user'];
    // $records = WorkingHours::loadFromUserAndDate($user->id, date('Y-m-d'));
    // $records = WorkingHours::loadFromUserAndDate($user->id, '2021-06-26');

    loadTemplateView('day_records', [
        'today' => $today
        // 'records' => $records
    ]);