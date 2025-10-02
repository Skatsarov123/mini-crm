<?php

use App\Models\User;
use App\Models\Report;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\Route;

Route::post('/register', function () {
    $user = User::factory()->create();
    event(new UserRegistered($user));
    return response()->json($user);
});

Route::post('/reports', function () {
    $report = Report::create(['user_id' => 1, 'type' => 'monthly', 'status' => 'pending']);
    dispatch(new \App\Jobs\GenerateReportJob($report));
    return response()->json($report);
});
