<?php

namespace App\Jobs;

use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateReportJob implements ShouldQueue
{
    use Dispatchable, Queueable;

    public $report;

    public function __construct(Report $report)
    {
        $this->report = $report;
    }

    public function handle()
    {
        $this->report->update(['status' => 'processing']);
        sleep(5);
        $this->report->update(['status' => 'done']);
    }
}
