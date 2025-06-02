<?php

namespace App\Providers;

use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale('id');

       

        View::composer('layouts.partial.sidebar', function ($view) {
        $ProgramCount = Program::count();
        $ProgramPending = Program::where('status_usulan','1')->count();
        $ProgramPrasidang = Program::where('status_usulan','2')->count();
        $ProgramApprove = Program::where('status_usulan','3')->count();
        $ProgramReject = Program::where('status_usulan','4')->count();
        $MonevWaitVerifikasi = Program::where('status_monev', '2')->count();
        $MonevWaitInput = Program::where('status_monev','1')->where('status_usulan','3')->count();
        $MonevVerifikasiAccept = Program::where('status_monev','3')->where('status_usulan','3')->count();
        $MonevRevisi = Program::where('status_monev','4')->where('status_usulan','3')->count();

        $view->with(compact('ProgramCount','ProgramPending','ProgramPrasidang','ProgramApprove','ProgramReject','MonevWaitVerifikasi','MonevWaitInput','MonevVerifikasiAccept','MonevRevisi'));
    });
    }
}
