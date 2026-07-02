<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    private function getMockScholarships()
    {
        return [
            [
                'id' => 'lpdp-2026',
                'title' => 'Beasiswa LPDP Tahap 2',
                'provider' => 'Kementerian Keuangan Republik Indonesia',
                'description' => 'Beasiswa penuh untuk putra-putri terbaik Indonesia untuk menempuh pendidikan Magister (S2) dan Doktor (S3) di universitas terbaik dunia dan dalam negeri.',
                'level' => 'S2 & S3',
                'level_tag' => 's2-s3',
                'funding_type' => 'Fully Funded',
                'funding_tag' => 'full',
                'location' => 'Dalam & Luar Negeri',
                'location_tag' => 'hybrid',
                'country' => 'Global',
                'deadline' => '15 Agustus 2026',
                'badge_color' => 'bg-emerald-50 text-emerald-700 dark:bg-emerald-950/30 dark:text-emerald-400 border-emerald-200/50 dark:border-emerald-900/50',
                'logo_gradient' => 'from-emerald-500 to-teal-600',
                'requirements' => [
                    'Warga Negara Indonesia (WNI)',
                    'Sudah lulus S1/D4 (untuk pendaftar S2) atau S2 (untuk pendaftar S3)',
                    'IPK minimal 3.00 (S2) atau 3.25 (S3) pada skala 4.00',
                    'Sertifikat kemampuan bahasa asing (IELTS min. 6.5 atau TOEFL iBT min. 80)',
                    'Surat rekomendasi dari akademisi atau tokoh masyarakat',
                    'Rencana studi (proposal penelitian untuk Doktor)'
                ],
                'coverage' => [
                    'Biaya Pendaftaran & SPP (Tuition Fee)',
                    'Tunjangan Buku & Tesis/Disertasi',
                    'Uang Saku Bulanan & Tunjangan Kedatangan',
                    'Biaya Visa & Tiket Pesawat PP kelas ekonomi',
                    'Asuransi Kesehatan & Keadaan Darurat'
                ],
                'link' => 'https://lpdp.kemenkeu.go.id/',
                'image' => 'card_academic.png'
            ],
            [
                'id' => 'australia-awards-2026',
                'title' => 'Australia Awards Scholarships (AAS)',
                'provider' => 'Pemerintah Australia (DFAT)',
                'description' => 'Beasiswa bergengsi bagi calon pemimpin masa depan Indonesia untuk menempuh program Master (S2) dan PhD (S3) di universitas terkemuka di Australia.',
                'level' => 'S2 & S3',
                'level_tag' => 's2-s3',
                'funding_type' => 'Fully Funded',
                'funding_tag' => 'full',
                'location' => 'Luar Negeri',
                'location_tag' => 'abroad',
                'country' => 'Australia',
                'deadline' => '30 April 2026',
                'badge_color' => 'bg-indigo-50 text-indigo-700 dark:bg-indigo-950/30 dark:text-indigo-400 border-indigo-200/50 dark:border-indigo-900/50',
                'logo_gradient' => 'from-indigo-600 to-blue-500',
                'requirements' => [
                    'Warga Negara Indonesia (WNI) menetap di Indonesia',
                    'IPK minimal 2.90 dari skala 4.00 (untuk pendaftar S2)',
                    'Memiliki kemampuan bahasa Inggris (IELTS min 6.0 / TOEFL iBT min 69)',
                    'Sudah memiliki gelar S1 (pendaftar S2) atau S2 (pendaftar S3)',
                    'Memilih bidang studi yang relevan dengan pembangunan prioritas Indonesia'
                ],
                'coverage' => [
                    'Biaya kuliah penuh (Full tuition fees)',
                    'Pelatihan bahasa Inggris sebelum keberangkatan (EAP)',
                    'Uang saku bulanan selama masa studi',
                    'Tunjangan kedatangan (Establishment allowance)',
                    'Tiket pesawat PP Indonesia-Australia',
                    'Asuransi kesehatan mahasiswa asing (OSHC)'
                ],
                'link' => 'https://www.australiaawardsindonesia.org/',
                'image' => 'card_global.png'
            ],
            [
                'id' => 'mext-japan-2026',
                'title' => 'Monbukagakusho (MEXT) Research Students',
                'provider' => 'Pemerintah Jepang (Kementerian Pendidikan, Kebudayaan, Olahraga, IPTEK)',
                'description' => 'Kesempatan emas belajar di Negeri Sakura tanpa ikatan dinas. Mencakup program Research Student (persiapan) sebelum masuk ke S2/S3.',
                'level' => 'S2 & S3',
                'level_tag' => 's2-s3',
                'funding_type' => 'Fully Funded',
                'funding_tag' => 'full',
                'location' => 'Luar Negeri',
                'location_tag' => 'abroad',
                'country' => 'Jepang',
                'deadline' => '15 Mei 2026',
                'badge_color' => 'bg-rose-50 text-rose-700 dark:bg-rose-950/30 dark:text-rose-400 border-rose-200/50 dark:border-rose-900/50',
                'logo_gradient' => 'from-rose-500 to-red-600',
                'requirements' => [
                    'Warga Negara Indonesia (WNI)',
                    'Usia maksimal 34 tahun saat pendaftaran',
                    'Lulusan S1 atau S2 dengan IPK minimal 3.20',
                    'Memiliki sertifikat JLPT (min N3/N2) atau bahasa Inggris (IELTS/TOEFL) setara min 5.5 / 72',
                    'Bersedia belajar bahasa Jepang dasar saat program persiapan'
                ],
                'coverage' => [
                    'Pembebasan biaya pendaftaran, ujian masuk, dan SPP sekolah penuh',
                    'Tunjangan hidup bulanan sekitar 143.000 - 145.000 Yen',
                    'Tiket pesawat ekonomi PP Jakarta/Surabaya - Tokyo',
                    'Biaya program sekolah persiapan bahasa Jepang (6 bulan)'
                ],
                'link' => 'https://www.id.emb-japan.go.id/',
                'image' => 'card_global.png'
            ],
            [
                'id' => 'djarum-beasiswa-plus',
                'title' => 'Djarum Beasiswa Plus 2026',
                'provider' => 'Djarum Foundation',
                'description' => 'Program beasiswa prestasi untuk mahasiswa D4/S1 aktif semester 4 di Indonesia. Dilengkapi pelatihan soft-skills (leadership, character building).',
                'level' => 'S1 / Undergraduate',
                'level_tag' => 's1',
                'funding_type' => 'Partial Funded',
                'funding_tag' => 'partial',
                'location' => 'Dalam Negeri',
                'location_tag' => 'domestic',
                'country' => 'Indonesia',
                'deadline' => '20 Mei 2026',
                'badge_color' => 'bg-amber-50 text-amber-700 dark:bg-amber-950/30 dark:text-amber-400 border-amber-200/50 dark:border-amber-900/50',
                'logo_gradient' => 'from-amber-500 to-orange-600',
                'requirements' => [
                    'Sedang menempuh pendidikan D4/S1 pada semester IV',
                    'IPK minimum 3.00 pada semester III',
                    'Dapat mempertahankan IPK minimum 3.00 hingga akhir semester IV',
                    'Aktif mengikuti organisasi kampus maupun luar kampus',
                    'Tidak sedang menerima beasiswa dari pihak lain'
                ],
                'coverage' => [
                    'Uang saku bulanan sebesar Rp 1.000.000,- selama 1 tahun (12 bulan)',
                    'Pelatihan Soft Skills (Character Building, Leadership Development, Nation Building)',
                    'Kesempatan mengikuti kompetisi Writing Competition & Community Empowerment'
                ],
                'link' => 'https://djarumbeasiswaplus.org/',
                'image' => 'card_foundation.png'
            ],
            [
                'id' => 'chevening-uk-2026',
                'title' => 'Chevening Award Scholarships',
                'provider' => 'Pemerintah Inggris (FCDO)',
                'description' => 'Beasiswa global pemerintah Inggris untuk meraih gelar Master (S1 satu tahun) di universitas manapun di Inggris raya, membangun relasi internasional.',
                'level' => 'S2 / Master',
                'level_tag' => 's2',
                'funding_type' => 'Fully Funded',
                'funding_tag' => 'full',
                'location' => 'Luar Negeri',
                'location_tag' => 'abroad',
                'country' => 'Inggris (UK)',
                'deadline' => '05 November 2026',
                'badge_color' => 'bg-purple-50 text-purple-700 dark:bg-purple-950/30 dark:text-purple-400 border-purple-200/50 dark:border-purple-900/50',
                'logo_gradient' => 'from-purple-600 to-fuchsia-600',
                'requirements' => [
                    'Warga Negara Indonesia (WNI) dan bersedia kembali ke Indonesia minimal 2 tahun setelah selesai studi',
                    'Memiliki gelar sarjana (S1) dengan prestasi akademis memuaskan',
                    'Memiliki minimal 2 tahun pengalaman kerja (setara 2.800 jam)',
                    'Mendaftar ke 3 pilihan universitas/program studi berbeda di UK yang memenuhi syarat'
                ],
                'coverage' => [
                    'Biaya kuliah penuh (Full tuition fees)',
                    'Tunjangan bulanan untuk biaya hidup pribadi',
                    'Biaya transportasi kedatangan dan kepulangan (tiket pesawat ekonomi PP)',
                    'Tunjangan kedatangan (Settling-in allowance) & biaya visa UK'
                ],
                'link' => 'https://www.chevening.org/',
                'image' => 'card_global.png'
            ],
            [
                'id' => 'kip-kuliah-2026',
                'title' => 'KIP Kuliah Merdeka',
                'provider' => 'Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi RI',
                'description' => 'Jaminan pembiayaan kuliah penuh bagi lulusan SMA/SMK/sederajat berprestasi namun menghadapi kendala ekonomi untuk kuliah di PTN maupun PTS.',
                'level' => 'S1 / Undergraduate',
                'level_tag' => 's1',
                'funding_type' => 'Fully Funded',
                'funding_tag' => 'full',
                'location' => 'Dalam Negeri',
                'location_tag' => 'domestic',
                'country' => 'Indonesia',
                'deadline' => '31 Oktober 2026',
                'badge_color' => 'bg-sky-50 text-sky-700 dark:bg-sky-950/30 dark:text-sky-400 border-sky-200/50 dark:border-sky-900/50',
                'logo_gradient' => 'from-sky-500 to-cyan-500',
                'requirements' => [
                    'Siswa SMA/SMK/MA/sederajat lulusan tahun berjalan atau maksimal lulus 2 tahun sebelumnya',
                    'Lolos seleksi penerimaan mahasiswa baru (SNBP, SNBT, atau Mandiri)',
                    'Memiliki potensi akademik baik tetapi memiliki keterbatasan ekonomi dibuktikan kepemilikan kartu KIP/PKH/KKS atau pendapatan kotor gabungan orang tua maks. Rp 4.000.000'
                ],
                'coverage' => [
                    'Pembebasan biaya pendaftaran seleksi masuk perguruan tinggi',
                    'Pembebasan biaya kuliah (SPP/UKT) langsung dibayarkan ke PTN/PTS pilihan',
                    'Tunjangan biaya hidup bulanan berkisar Rp 800.000 hingga Rp 1.400.000 (sesuai indeks wilayah PT)'
                ],
                'link' => 'https://kip-kuliah.kemdikbud.go.id/',
                'image' => 'card_academic.png'
            ],
            [
                'id' => 'fulbright-indonesia',
                'title' => 'Fulbright Master & PhD Program',
                'provider' => 'Pemerintah AS via AMINEF',
                'description' => 'Program pertukaran pendidikan prestisius untuk menempuh gelar Master atau Doktor di universitas terkemuka Amerika Serikat.',
                'level' => 'S2 & S3',
                'level_tag' => 's2-s3',
                'funding_type' => 'Fully Funded',
                'funding_tag' => 'full',
                'location' => 'Luar Negeri',
                'location_tag' => 'abroad',
                'country' => 'Amerika Serikat',
                'deadline' => '15 Februari 2026',
                'badge_color' => 'bg-blue-50 text-blue-700 dark:bg-blue-950/30 dark:text-blue-400 border-blue-200/50 dark:border-blue-900/50',
                'logo_gradient' => 'from-blue-700 to-indigo-700',
                'requirements' => [
                    'Warga Negara Indonesia (WNI) berkepribadian kepemimpinan kuat',
                    'IPK minimal 3.00 dari skala 4.00',
                    'Skor TOEFL ITP minimal 550 atau TOEFL iBT 80 (untuk S2), atau TOEFL ITP 575 / iBT 90 (untuk S3)',
                    'Bersedia kembali ke Indonesia setelah menyelesaikan studi'
                ],
                'coverage' => [
                    'Bantuan uang kuliah penuh (Tuition fee assistance)',
                    'Uang saku bulanan selama masa studi',
                    'Tiket pesawat PP Indonesia-Amerika Serikat',
                    'Asuransi kesehatan dan kecelakaan dasar (J-1 visa sponsor)'
                ],
                'link' => 'https://www.aminef.or.id/',
                'image' => 'card_global.png'
            ]
        ];
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $level = $request->input('level');
        $location = $request->input('location');
        $funding = $request->input('funding');

        $scholarships = collect($this->getMockScholarships());

        // Apply filters
        if ($search) {
            $scholarships = $scholarships->filter(function ($item) use ($search) {
                return stripos($item['title'], $search) !== false 
                    || stripos($item['provider'], $search) !== false
                    || stripos($item['description'], $search) !== false
                    || stripos($item['country'], $search) !== false;
            });
        }

        if ($level && $level !== 'all') {
            $scholarships = $scholarships->filter(function ($item) use ($level) {
                if ($level === 's1') {
                    return strpos($item['level_tag'], 's1') !== false;
                }
                if ($level === 's2') {
                    return strpos($item['level_tag'], 's2') !== false;
                }
                if ($level === 's3') {
                    return strpos($item['level_tag'], 's3') !== false;
                }
                return false;
            });
        }

        if ($location && $location !== 'all') {
            $scholarships = $scholarships->filter(function ($item) use ($location) {
                return $item['location_tag'] === $location || $item['location_tag'] === 'hybrid';
            });
        }

        if ($funding && $funding !== 'all') {
            $scholarships = $scholarships->filter(function ($item) use ($funding) {
                return $item['funding_tag'] === $funding;
            });
        }

        return view('scholarships.index', [
            'scholarships' => $scholarships,
            'filters' => [
                'search' => $search,
                'level' => $level ?? 'all',
                'location' => $location ?? 'all',
                'funding' => $funding ?? 'all',
            ]
        ]);
    }
}
