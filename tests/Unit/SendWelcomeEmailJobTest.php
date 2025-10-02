<?php

namespace Tests\Unit;

use App\Jobs\SendWelcomeEmailJob;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class SendWelcomeEmailJobTest extends TestCase
{
    public function test_job_sends_notification()
    {
        Notification::fake();
        $user = User::factory()->create();
        $job = new SendWelcomeEmailJob($user);
        $job->handle();
        Notification::assertSentTo($user, \App\Notifications\WelcomeNotification::class);
    }
}
