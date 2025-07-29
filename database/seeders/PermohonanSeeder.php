<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permohonan;
use App\Models\Jawatan;

class PermohonanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample catatan (notes) for applications
        $sampleCatatan = [
            'Saya berminat untuk memohon jawatan ini kerana saya mempunyai pengalaman yang berkaitan.',
            'Saya yakin dapat memberikan sumbangan yang bermakna kepada organisasi.',
            'Dengan latar belakang pendidikan dan pengalaman kerja saya, saya sesuai untuk jawatan ini.',
            'Saya bersedia untuk belajar dan berkembang dalam jawatan ini.',
            'Pengalaman kerja saya selama ini telah mempersiapkan saya untuk tanggungjawab ini.',
            'Saya mempunyai kemahiran yang diperlukan dan bersedia untuk mencabar diri.',
            'Jawatan ini selaras dengan matlamat kerjaya saya.',
            'Saya berkomitmen untuk memberikan yang terbaik jika diberi peluang.',
            'Dengan dedikasi dan usaha gigih, saya yakin dapat berjaya dalam jawatan ini.',
            'Saya amat berminat untuk menyertai pasukan dan memberikan sumbangan.'
        ];

        // Sample status options
        $statusOptions = [
            Permohonan::STATUS_PENDING,
            Permohonan::STATUS_ACCEPTED,
            Permohonan::STATUS_REJECTED
        ];

        // Get available jawatan IDs (assuming there are some jawatan records)
        // If no jawatan exists, we'll use IDs 1-5 as sample
        $jawatanIds = Jawatan::pluck('id')->toArray();
        if (empty($jawatanIds)) {
            $jawatanIds = [1, 2, 3, 4, 5]; // Default jawatan IDs
        }

        // Create 10 sample applications for user IDs 2-11
        for ($i = 0; $i < 10; $i++) {
            Permohonan::create([
                'user_id' => $i + 2, // User IDs 2-11
                'jawatan_id' => $jawatanIds[array_rand($jawatanIds)], // Random jawatan
                'catatan' => $sampleCatatan[array_rand($sampleCatatan)], // Random note
                'status' => $statusOptions[array_rand($statusOptions)], // Random status
            ]);
        }
    }
}
