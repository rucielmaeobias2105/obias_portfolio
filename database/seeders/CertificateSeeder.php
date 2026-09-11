<?php

namespace Database\Seeders;

use App\Models\Certificate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CertificateSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $overrides = [
            'nc_2' => 'NC II',
            'ict_carrerprep' => 'ICT Career Prep',
            'TES' => 'TES',
        ];

        $certificates = collect(glob(public_path('cert_img/*.{png,jpg,jpeg,webp}'), GLOB_BRACE))
            ->map(function (string $path) use ($overrides): array {
                $file = basename($path);
                $filename = pathinfo($file, PATHINFO_FILENAME);

                return [
                    'title' => $overrides[$filename] ?? Str::headline($filename),
                    'org' => 'TESDA',
                    'year' => null,
                    'image' => 'cert_img/'.$file,
                    'pdf' => null,
                    'sort_order' => 0,
                ];
            })
            ->sortBy('title')
            ->values()
            ->each(function (array $cert, int $index): void {
                $cert['sort_order'] = $index + 1;

                Certificate::updateOrCreate(
                    ['image' => $cert['image']],
                    $cert,
                );
            });
    }
}
