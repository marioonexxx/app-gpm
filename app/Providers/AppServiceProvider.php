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
        $ProgramPending = Program::where('status_usulan','Pending')->count();
        $ProgramApprove = Program::where('status_usulan','Disetujui')->count();
        $ProgramReject = Program::where('status_usulan','Ditolak')->count();
        $view->with(compact('ProgramCount','ProgramPending','ProgramApprove','ProgramReject'));
    });
    }
}
