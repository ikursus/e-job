<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jawatan;
use Carbon\Carbon;

class JawatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jawatanData = [
            [
                'title' => 'Pegawai Teknologi Maklumat',
                'description' => 'Bertanggungjawab untuk menguruskan sistem teknologi maklumat, membangunkan aplikasi web, dan memberikan sokongan teknikal kepada pengguna. Memerlukan pengalaman dalam PHP, Laravel, dan pengurusan pangkalan data.',
                'date_from' => Carbon::now()->format('Y-m-d'),
                'date_till' => Carbon::now()->addMonths(3)->format('Y-m-d'),
                'quota' => 2,
                'status' => 'open'
            ],
            [
                'title' => 'Penolong Pegawai Tadbir',
                'description' => 'Membantu dalam urusan pentadbiran harian, pengurusan dokumen, dan koordinasi aktiviti pejabat. Memerlukan kemahiran komunikasi yang baik dan pengalaman dalam kerja pentadbiran.',
                'date_from' => Carbon::now()->format('Y-m-d'),
                'date_till' => Carbon::now()->addMonths(2)->format('Y-m-d'),
                'quota' => 3,
                'status' => 'open'
            ],
            [
                'title' => 'Pegawai Sumber Manusia',
                'description' => 'Mengendalikan proses pengambilan pekerja, latihan kakitangan, dan pengurusan rekod pekerja. Memerlukan ijazah dalam bidang Sumber Manusia atau bidang berkaitan.',
                'date_from' => Carbon::now()->addDays(7)->format('Y-m-d'),
                'date_till' => Carbon::now()->addMonths(4)->format('Y-m-d'),
                'quota' => 1,
                'status' => 'open'
            ],
            [
                'title' => 'Juruteknik Komputer',
                'description' => 'Memberikan sokongan teknikal untuk perkakasan dan perisian komputer, menyelenggara rangkaian, dan membantu pengguna menyelesaikan masalah teknikal.',
                'date_from' => Carbon::now()->subDays(10)->format('Y-m-d'),
                'date_till' => Carbon::now()->addMonth()->format('Y-m-d'),
                'quota' => 2,
                'status' => 'open'
            ],
            [
                'title' => 'Pegawai Kewangan',
                'description' => 'Menguruskan akaun kewangan, menyediakan laporan kewangan, dan memastikan pematuhan kepada prosedur kewangan. Memerlukan kelayakan dalam bidang perakaunan atau kewangan.',
                'date_from' => Carbon::now()->addDays(14)->format('Y-m-d'),
                'date_till' => Carbon::now()->addMonths(6)->format('Y-m-d'),
                'quota' => 1,
                'status' => 'closed'
            ]
        ];

        foreach ($jawatanData as $data) {
            Jawatan::create($data);
        }
    }
}