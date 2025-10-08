<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\siswa;
use App\Models\ekskul;

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
        $jumlah_siswa = siswa::count();
        $jenis_kelamin_chart = siswa::selectRaw("jenis_kelamin, COUNT(*) as total")
        ->groupBy('jenis_kelamin')
        ->pluck('total', 'jenis_kelamin');

        
       $jumlahLaki = Siswa::where('jenis_kelamin', 'Laki-Laki')->count();
        $jumlahPerempuan = Siswa::where('jenis_kelamin', 'Perempuan')->count();

        View::share('jumlah_siswa', $jumlah_siswa);
        View::share('jenis_kelamin_chart', $jenis_kelamin_chart);
      
        view::share('jumlahLaki',$jumlahLaki);
        view::share('jumlahPerempuan',$jumlahPerempuan);

        $jumlah_ekskul = ekskul::count();
        View::share('jumlah_ekskul', $jumlah_ekskul);

        $jumlah_ekskul = ekskul::count();
        View::share('jumlah_ekskul', $jumlah_ekskul);


    // Jumlah siswa per ekskul
    $siswa_per_ekskul = siswa::selectRaw('ekskul_id, COUNT(*) as total')
        ->groupBy('ekskul_id')
        ->pluck('total', 'ekskul_id');

    // Ambil nama ekskul berdasarkan ID
    $nama_ekskul = ekskul::whereIn('id', $siswa_per_ekskul->keys())->pluck('nama_ekskul', 'id');

    // Format data akhir untuk chart
    $ekskul_chart = [];
    foreach ($siswa_per_ekskul as $id => $jumlah) {
        $ekskul_chart[$nama_ekskul[$id]] = $jumlah;
    }

    View::share('ekskul_chart', $ekskul_chart);
    
    
    $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

    $ekskulPerHari = [];
    foreach ($hariList as $hari) {
        $ekskulPerHari[$hari] = ekskul::where('jadwal', $hari)->pluck('nama_ekskul')->toArray();
    }

    $jumlahEkskul = array_map(fn($e) => count($e), $ekskulPerHari);

    View::share('hariList', $hariList);
    View::share('jumlahEkskul', $jumlahEkskul);
    View::share('ekskulPerHari', $ekskulPerHari);

    
}
}
