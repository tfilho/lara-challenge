<?php

namespace App\Listeners;

use App\Mail\NewReportMail;
use App\Report;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Log\Logger;

class NewReportListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param \App\Events\NewReportHasRegisteredEvent $event
     * @return void
     */
    public function handle(\App\Events\NewReportHasRegisteredEvent $event)
    {
        $this->createPdf($event);
        Mail::to($event->report->profile->user->email)->send(new NewReportMail($event));
    }

    private function createPdf($event)
    {
        $pdf = PDF::loadView('reports.pdf.index', ['reports' => Report::whereId($event->report->id)->get()]);
        $attachDir = $this->getPdfFilename($event->report);
        Storage::put($attachDir, $pdf->output());
        $event->report->attachDir =  $attachDir;
    }

    private function getPdfFilename($report)
    {
        return 'reports-'.Carbon::now()->format('m-d-Y_H-i-s').md5($report->id).'.pdf';
    }
}
