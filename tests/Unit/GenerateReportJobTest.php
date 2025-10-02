<?php

namespace Tests\Unit;

use App\Jobs\GenerateReportJob;
use App\Models\Report;
use App\Models\User;
use Tests\TestCase;

class GenerateReportJobTest extends TestCase
{
    public function test_job_updates_report_status()
    {
        $user = User::factory()->create();
        $report = Report::create(['user_id' => $user->id, 'type' => 'monthly', 'status' => 'pending']);
        $job = new GenerateReportJob($report);
        $job->handle();
        $this->assertEquals('done', $report->fresh()->status);
    }
}
