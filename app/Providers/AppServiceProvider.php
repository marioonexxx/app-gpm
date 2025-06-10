<?php

namespace App\Providers;

use App\Models\Periode_tahun;
use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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



        View::composer(['layouts.partial.sidebar', 'sekretaris.dashboard', 'subseksi.dashboard', 'seksi.dashboard'], function ($view) {

            // PROGRAM on SEKRETARIS, KEUANGAN, LITBANG
            $ProgramCount = Program::count();
            $ProgramPending = Program::where('status_usulan', '1')->count();
            $ProgramPrasidang = Program::where('status_usulan', '2')->count();
            $ProgramApprove = Program::where('status_usulan', '3')->count();
            $ProgramReject = Program::where('status_usulan', '4')->count();

            // PROGRAM on SUB SEKSI
            $ProgramSubseksiCount = Program::where('sub_seksi_id', Auth::user()->sub_seksi_id)->count();
            $ProgramSubseksiPending = Program::where('status_usulan', '1')->where('sub_seksi_id', Auth::user()->sub_seksi_id)->count();
            $ProgramSubseksiPrasidang = Program::where('status_usulan', '2')->where('sub_seksi_id', Auth::user()->sub_seksi_id)->count();
            $ProgramSubseksiApprove = Program::where('status_usulan', '3')->where('sub_seksi_id', Auth::user()->sub_seksi_id)->count();
            $ProgramSubseksiReject = Program::where('status_usulan', '4')->where('sub_seksi_id', Auth::user()->sub_seksi_id)->count();

            // PROGRAM on SEKSI
            $ProgramSeksiCount = Program::where('sub_seksi_id', Auth::user()->seksi_id)->count();
            $ProgramSeksiPending = Program::where('status_usulan', '1')->where('sub_seksi_id', Auth::user()->seksi_id)->count();
            $ProgramSeksiPrasidang = Program::where('status_usulan', '2')->where('sub_seksi_id', Auth::user()->seksi_id)->count();
            $ProgramSeksiApprove = Program::where('status_usulan', '3')->where('sub_seksi_id', Auth::user()->seksi_id)->count();
            $ProgramSeksiReject = Program::where('status_usulan', '4')->where('sub_seksi_id', Auth::user()->seksi_id)->count();


            // MONEV
            $MonevWaitVerifikasi = Program::where('status_monev', '2')->where('status_usulan', '3')->count();
            $MonevWaitInput = Program::where('status_monev', '1')->where('status_usulan', '3')->count();
            $MonevVerifikasiAccept = Program::where('status_monev', '3')->where('status_usulan', '3')->count();
            $MonevRevisi = Program::where('status_monev', '4')->where('status_usulan', '3')->count();


            // MONEV on SUB SEKSI

            $MonevSubseksiWaitVerifikasi = Program::where('status_monev', '2')->where('status_usulan', '3')->where('sub_seksi_id', Auth::user()->sub_seksi_id)->count();
            $MonevSubseksiWaitInput = Program::where('status_monev', '1')->where('status_usulan', '3')->where('sub_seksi_id', Auth::user()->sub_seksi_id)->count();
            $MonevSubseksiVerifikasiAccept = Program::where('status_monev', '3')->where('status_usulan', '3')->where('sub_seksi_id', Auth::user()->sub_seksi_id)->count();
            $MonevSubseksiRevisi = Program::where('status_monev', '4')->where('status_usulan', '3')->where('sub_seksi_id', Auth::user()->sub_seksi_id)->count();

            // MONEV on SEKSI
            $MonevSeksiWaitVerifikasi = Program::where('status_monev', '2')->where('status_usulan', '3')->where('sub_seksi_id', Auth::user()->seksi_id)->count();
            $MonevSeksiWaitInput = Program::where('status_monev', '1')->where('status_usulan', '3')->where('sub_seksi_id', Auth::user()->seksi_id)->count();
            $MonevSeksiVerifikasiAccept = Program::where('status_monev', '3')->where('status_usulan', '3')->where('sub_seksi_id', Auth::user()->seksi_id)->count();
            $MonevSeksiRevisi = Program::where('status_monev', '4')->where('status_usulan', '3')->where('sub_seksi_id', Auth::user()->seksi_id)->count();




            $view->with(compact(
                'ProgramSubseksiCount',
                'ProgramSubseksiPending',
                'ProgramSubseksiPrasidang',
                'ProgramSubseksiApprove',
                'ProgramSubseksiReject',
                'MonevSubseksiWaitVerifikasi',
                'MonevSubseksiWaitInput',
                'MonevSubseksiVerifikasiAccept',
                'MonevSubseksiRevisi',
                'ProgramSeksiCount',
                'ProgramSeksiPending',
                'ProgramSeksiPrasidang',
                'ProgramSeksiApprove',
                'ProgramSeksiReject',
                'MonevSeksiWaitVerifikasi',
                'MonevSeksiWaitInput',
                'MonevSeksiVerifikasiAccept',
                'MonevSeksiRevisi',
                'ProgramCount',
                'ProgramPending',
                'ProgramPrasidang',
                'ProgramApprove',
                'ProgramReject',
                'MonevWaitVerifikasi',
                'MonevWaitInput',
                'MonevVerifikasiAccept',
                'MonevRevisi'
            ));
        });


        // Data global ringan
        View::share('TahunAktif', Periode_tahun::where('status', 1)->first());
    }
}
