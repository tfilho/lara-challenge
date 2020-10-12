<?php

namespace App\Http\Controllers;

use App\Events\NewReportHasRegisteredEvent;
use App\Events\NewReportPDFHasCreatedEvent;
use App\Http\Requests\StoreReport;
use App\Http\Requests\UpdateReport;
use App\Jobs\ReportEmailJob;
use App\Profile;
use App\Report;

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
        /*$report = new Report(request(['profile_id','topic','description']));
        $report->save();*/ //TODO remove this comment

        //Is the code bellow cleaner than above? Yeah!
        $report = Report::create($request->validated());

        event(new NewReportHasRegisteredEvent($report));

        return redirect(route('reports.index'));
    }

    public function show(Report $report)
    {
        return view('report.show',['report' => $report]);
    }

    public function edit(Report $report)
    {

        $profiles = Profile::latest()->get();
        return view('reports.edit', compact('report','profiles'));
    }

    public function update(Report $report, UpdateReport $request)
    {
        $report->update($request->validated());

        return redirect('/reports');
    }

    public function destroy(Report $report)
    {
        $report->delete();

        return redirect('/reports');
    }
}
