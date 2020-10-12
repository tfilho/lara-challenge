<?php

namespace App\Http\Controllers;

use App\Events\NewReportHasRegisteredEvent;
use App\Events\NewReportPDFHasCreatedEvent;
use App\Http\Requests\StoreReport;
use App\Http\Requests\UpdateReport;
use App\Jobs\ReportEmailJob;
use App\Mail\OLDReportMail;
use App\Profile;
use App\Report;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ReportsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('reports.index',[
            'reports' => Report::latest()->get()
        ]);
    }

    public function create()
    {
        return view('reports.create',[
            'profiles' => Profile::all()
        ]);
    }

    public function store(StoreReport $request)
    {
        $report = new Report(request(['profile_id','topic','description']));
        //$report->user_id = 1; //auth()->id() or  //auth()->user()-reports()->create($report); TODO CHECK THIS
        $report->save();

        //Cleaner?
        //$report = Report::create($this->validateReport());

        /*$pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();*/
        /*$pdf = PDF::loadView('reports.pdf.index', ['reports' => Report::whereId($report->id)->get()]);
        $fileDir = $this->getPdfFilename($report);
        Storage::put($fileDir, $pdf->output());*/

        //event(new NewReportPDFHasCreatedEvent($report));

        event(new NewReportHasRegisteredEvent($report));
        //Mail::to($report->profile->user->email)->send(new OLDReportMail());
            //->later(now()->addSeconds(5),$message);


        /*Mail::raw('It works!', function ($message) use ($report){
            $message
                ->to($report->profile->user->email)
                ->subject('Test - ' . $this->getPdfFilename($report))
                ->attach(public_path() . '/' .$this->getPdfFilename($report));
        });*/
        //return $pdf->download('reports.pdf');

        //$report->tags()->attach(request('tags')); TODO CHECK THIS TOO

        return redirect(route('reports.index'));
    }

    public function show(Report $report)
    {
        return view('report.show',['report' => $report]);
    }

    public function edit(Report $report)
    {
        $result = $report;
        //$report =
        $profiles = Profile::latest()->get();
        //dd($result);
        return view('reports.edit', compact('report','profiles'));
    }

    public function update(Report $report, UpdateReport $request)
    {
        //$user->update($request->validated());
        $report->update($request->validated());

        return redirect('/reports');
    }

    public function destroy(Report $report)
    {
        $report->delete();

        return redirect('/reports');
    }

    public function validateReport()
    {
        return request()->validate([
            'profile_id' => 'required',
            'topic' => 'required',
            'description' => 'required',
            //'profiles' => 'exists:profiles,id'
        ]);
    }

    private function getPdfFilename($report)
    {
        return 'reports-'.Carbon::now()->format('m-d-Y_H-i-s'). md5($report->id).'.pdf';
    }
}
