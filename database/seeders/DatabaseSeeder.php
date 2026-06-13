<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Berita;
use App\Models\Galeri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        Admin::create([
            'nama' => 'Rizky Pratama',
            'email' => 'rizky@unjaya.ac.id',
            'password' => Hash::make('Rizky#789'),
            'jabatan' => 'Administrator',
            'no_hp' => '081234567890',
        ]);

        Admin::create([
            'nama' => 'Siti Nurhaliza',
            'email' => 'siti@unjaya.ac.id',
            'password' => Hash::make('Siti!456'),
            'jabatan' => 'Administrator',
            'no_hp' => '081234567891',
        ]);

        Admin::create([
            'nama' => 'Bambang Supriyadi',
            'email' => 'bambang@unjaya.ac.id',
            'password' => Hash::make('Bambang@123'),
            'jabatan' => 'Kepala Humas',
            'no_hp' => '081234567892',
        ]);

        Berita::create(['judul_berita' => 'Seminar Cyber Security 2026', 'deskripsi' => 'Seminar nasional tentang keamanan siber dan ancaman digital.', 'penulis' => 'UKM IT', 'foto' => '/uploads/berita/cyber.jpg', 'jenis_berita' => 'events', 'tanggal' => '2026-01-15 08:30:00']);
        Berita::create(['judul_berita' => 'Pengumuman Maintenance Server', 'deskripsi' => 'Server kampus akan mengalami maintenance selama 2 jam.', 'penulis' => 'IT Support', 'foto' => '/uploads/berita/maintenance.jpg', 'jenis_berita' => 'lainnya', 'tanggal' => '2026-02-01 09:00:00']);
        Berita::create(['judul_berita' => 'Mahasiswa Juara KTI Nasional', 'deskripsi' => 'Prestasi di bidang penelitian dan penulisan ilmiah.', 'penulis' => 'Humas', 'foto' => '/uploads/berita/kti.jpg', 'jenis_berita' => 'prestasi', 'tanggal' => '2026-01-21 19:15:00']);
        Berita::create(['judul_berita' => 'Kegiatan Gotong Royong Kampus', 'deskripsi' => 'Aktivitas kebersihan lingkungan kampus bersama mahasiswa.', 'penulis' => 'BEM', 'foto' => '/uploads/berita/gotong.jpg', 'jenis_berita' => 'aktivitas', 'tanggal' => '2026-01-04 07:00:00']);
        Berita::create(['judul_berita' => 'Job Fair Kampus 2026', 'deskripsi' => 'Bursa kerja untuk mahasiswa dan alumni.', 'penulis' => 'Career Center', 'foto' => '/uploads/berita/jobfair.jpg', 'jenis_berita' => 'beasiswa-karir', 'tanggal' => '2026-01-27 10:00:00']);
        Berita::create(['judul_berita' => 'Pengumuman Jadwal UTS Semester Genap', 'deskripsi' => 'Informasi resmi terkait jadwal UTS seluruh fakultas.', 'penulis' => 'BAAK', 'foto' => '/uploads/berita/uts.jpg', 'jenis_berita' => 'pengumuman-akademik', 'tanggal' => '2026-01-12 08:00:00']);
        Berita::create(['judul_berita' => 'Workshop UI/UX Beginner', 'deskripsi' => 'Pelatihan desain UI/UX untuk pemula.', 'penulis' => 'UKM IT', 'foto' => '/uploads/berita/uiux_workshop.jpg', 'jenis_berita' => 'events', 'tanggal' => '2026-01-02 13:30:00']);
        Berita::create(['judul_berita' => 'Info Perubahan Ruang Kuliah', 'deskripsi' => 'Beberapa kelas dipindahkan karena renovasi gedung.', 'penulis' => 'BAAK', 'foto' => '/uploads/berita/ruang.jpg', 'jenis_berita' => 'lainnya', 'tanggal' => '2026-02-02 10:30:00']);
        Berita::create(['judul_berita' => 'Mahasiswa Raih Medali Emas PIMNAS', 'deskripsi' => 'Prestasi nasional dalam ajang ilmiah mahasiswa.', 'penulis' => 'Humas', 'foto' => '/uploads/berita/pimnas.jpg', 'jenis_berita' => 'prestasi', 'tanggal' => '2026-01-01 18:45:00']);
        Berita::create(['judul_berita' => 'Program Magang Nasional Batch 2 Dibuka', 'deskripsi' => 'Kesempatan magang bagi mahasiswa semester akhir.', 'penulis' => 'Career Center', 'foto' => '/uploads/berita/magang.jpg', 'jenis_berita' => 'beasiswa-karir', 'tanggal' => '2026-01-08 09:00:00']);
        Berita::create(['judul_berita' => 'Seminar Literasi Digital', 'deskripsi' => 'Edukasi penggunaan internet yang aman dan produktif.', 'penulis' => 'UKM IT', 'foto' => '/uploads/berita/literasi.jpg', 'jenis_berita' => 'events', 'tanggal' => '2026-01-18 14:00:00']);
        Berita::create(['judul_berita' => 'Pengumuman Registrasi Ulang Mahasiswa', 'deskripsi' => 'Proses registrasi ulang semester genap.', 'penulis' => 'BAAK', 'foto' => '/uploads/berita/registrasi.jpg', 'jenis_berita' => 'pengumuman-akademik', 'tanggal' => '2026-01-19 08:15:00']);
        Berita::create(['judul_berita' => 'Update Sistem Portal Akademik', 'deskripsi' => 'Perbaikan sistem untuk meningkatkan performa website kampus.', 'penulis' => 'Admin IT', 'foto' => '/uploads/berita/system.jpg', 'jenis_berita' => 'lainnya', 'tanggal' => '2026-01-31 20:00:00']);
        Berita::create(['judul_berita' => 'Turnamen Futsal Antar Fakultas', 'deskripsi' => 'Kompetisi olahraga antar mahasiswa seluruh fakultas.', 'penulis' => 'BEM', 'foto' => '/uploads/berita/futsal.jpg', 'jenis_berita' => 'aktivitas', 'tanggal' => '2026-01-14 16:30:00']);
        Berita::create(['judul_berita' => 'Mahasiswa Unjaya Raih Juara Hackathon Nasional', 'deskripsi' => 'Prestasi membanggakan di ajang kompetisi teknologi nasional.', 'penulis' => 'Humas', 'foto' => '/uploads/berita/prestasi1.jpg', 'jenis_berita' => 'prestasi', 'tanggal' => '2026-01-05 20:10:00']);
        Berita::create(['judul_berita' => 'Pendaftaran Beasiswa Pemerintah 2026', 'deskripsi' => 'Informasi pendaftaran beasiswa dari pemerintah.', 'penulis' => 'BAAK', 'foto' => '/uploads/berita/beasiswa2.jpg', 'jenis_berita' => 'beasiswa-karir', 'tanggal' => '2026-01-13 09:30:00']);
        Berita::create(['judul_berita' => 'Festival Teknologi Kampus', 'deskripsi' => 'Pameran inovasi teknologi mahasiswa.', 'penulis' => 'UKM IT', 'foto' => '/uploads/berita/festival.jpg', 'jenis_berita' => 'events', 'tanggal' => '2026-01-28 15:00:00']);
        Berita::create(['judul_berita' => 'Pengumuman Hasil Seleksi Beasiswa', 'deskripsi' => 'Hasil seleksi penerima beasiswa diumumkan.', 'penulis' => 'BAAK', 'foto' => '/uploads/berita/hasil_beasiswa.jpg', 'jenis_berita' => 'pengumuman-akademik', 'tanggal' => '2026-01-25 11:00:00']);
        Berita::create(['judul_berita' => 'Kegiatan LDO Mahasiswa Baru', 'deskripsi' => 'Pelatihan dasar organisasi mahasiswa.', 'penulis' => 'BEM', 'foto' => '/uploads/berita/ldo.jpg', 'jenis_berita' => 'aktivitas', 'tanggal' => '2026-01-29 07:45:00']);
        Berita::create(['judul_berita' => 'Beasiswa Prestasi Akademik Dibuka', 'deskripsi' => 'Beasiswa untuk mahasiswa dengan IPK tinggi.', 'penulis' => 'BAAK', 'foto' => '/uploads/berita/beasiswa.jpg', 'jenis_berita' => 'beasiswa-karir', 'tanggal' => '2026-01-11 10:00:00']);
        Berita::create(['judul_berita' => 'Kegiatan Bakti Sosial HIMSI 2026', 'deskripsi' => 'Kegiatan pengabdian masyarakat oleh mahasiswa Sistem Informasi.', 'penulis' => 'HIMSI', 'foto' => '/uploads/berita/baksos.jpg', 'jenis_berita' => 'aktivitas', 'tanggal' => '2026-01-03 08:00:00']);
        Berita::create(['judul_berita' => 'Pengumuman Kalender Akademik Baru', 'deskripsi' => 'Jadwal akademik resmi tahun 2026.', 'penulis' => 'Akademik', 'foto' => '/uploads/berita/kalender.jpg', 'jenis_berita' => 'pengumuman-akademik', 'tanggal' => '2026-01-30 12:00:00']);
        Berita::create(['judul_berita' => 'Lowongan Kerja Fresh Graduate', 'deskripsi' => 'Informasi lowongan kerja untuk lulusan baru.', 'penulis' => 'Career Center', 'foto' => '/uploads/berita/loker.jpg', 'jenis_berita' => 'beasiswa-karir', 'tanggal' => '2026-01-17 10:30:00']);
        Berita::create(['judul_berita' => 'Seminar Teknologi AI Masa Depan', 'deskripsi' => 'Pembahasan perkembangan AI di dunia industri.', 'penulis' => 'UKM IT', 'foto' => '/uploads/berita/ai.jpg', 'jenis_berita' => 'events', 'tanggal' => '2026-01-23 19:30:00']);
        Berita::create(['judul_berita' => 'Mahasiswa Juara Debat Nasional', 'deskripsi' => 'Prestasi dalam kompetisi debat tingkat nasional.', 'penulis' => 'Humas', 'foto' => '/uploads/berita/debat.jpg', 'jenis_berita' => 'prestasi', 'tanggal' => '2026-01-26 16:00:00']);
        Berita::create(['judul_berita' => 'Survey Kepuasan Mahasiswa 2026', 'deskripsi' => 'Mahasiswa diminta mengisi survey kepuasan layanan kampus.', 'penulis' => 'Akademik', 'foto' => '/uploads/berita/survey.jpg', 'jenis_berita' => 'lainnya', 'tanggal' => '2026-02-03 13:30:00']);
        Berita::create(['judul_berita' => 'Workshop Data Science Dasar', 'deskripsi' => 'Kegiatan pelatihan pengenalan data science untuk mahasiswa baru.', 'penulis' => 'Admin Kampus', 'foto' => '/uploads/berita/data1.jpg', 'jenis_berita' => 'events', 'tanggal' => '2026-01-10 09:00:00']);
        Berita::create(['judul_berita' => 'Pelatihan Kepemimpinan Mahasiswa', 'deskripsi' => 'Program pengembangan softskill kepemimpinan.', 'penulis' => 'BEM', 'foto' => '/uploads/berita/leadership.jpg', 'jenis_berita' => 'aktivitas', 'tanggal' => '2026-01-20 14:30:00']);
        Berita::create(['judul_berita' => 'Career Talk Industry Expert', 'deskripsi' => 'Sharing session dengan praktisi industri teknologi.', 'penulis' => 'Career Center', 'foto' => '/uploads/berita/career.jpg', 'jenis_berita' => 'events', 'tanggal' => '2026-01-07 15:00:00']);
        Berita::create(['judul_berita' => 'Mahasiswa Raih Best UI/UX Award', 'deskripsi' => 'Prestasi desain antarmuka terbaik tingkat nasional.', 'penulis' => 'Humas', 'foto' => '/uploads/berita/uiux.jpg', 'jenis_berita' => 'prestasi', 'tanggal' => '2026-01-06 20:30:00']);
        Berita::create(['judul_berita' => 'Pengumuman Jadwal Libur Tambahan', 'deskripsi' => 'Tambahan hari libur nasional untuk civitas akademika.', 'penulis' => 'BAAK', 'foto' => '/uploads/berita/libur.jpg', 'jenis_berita' => 'lainnya', 'tanggal' => '2026-02-04 07:30:00']);
        Berita::create(['judul_berita' => 'Program Beasiswa Unggulan Nasional', 'deskripsi' => 'Beasiswa penuh untuk mahasiswa berprestasi.', 'penulis' => 'BAAK', 'foto' => '/uploads/berita/unggulan.jpg', 'jenis_berita' => 'beasiswa-karir', 'tanggal' => '2026-01-22 08:45:00']);
        Berita::create(['judul_berita' => 'Seminar Cyber Security 2026', 'deskripsi' => 'Seminar nasional tentang keamanan siber dan ancaman digital.', 'penulis' => 'UKM IT', 'foto' => '/uploads/berita/cyber.jpg', 'jenis_berita' => 'events', 'tanggal' => '2026-01-15 09:00:00']);
        Berita::create(['judul_berita' => 'Mahasiswa Raih Juara KTI Nasional', 'deskripsi' => 'Prestasi di bidang penelitian dan penulisan ilmiah.', 'penulis' => 'Humas', 'foto' => '/uploads/berita/kti.jpg', 'jenis_berita' => 'prestasi', 'tanggal' => '2026-01-21 18:30:00']);
        Berita::create(['judul_berita' => 'Info Pembaruan Aplikasi Kampus Mobile', 'deskripsi' => 'Versi baru aplikasi kampus sudah tersedia di Play Store.', 'penulis' => 'IT Support', 'foto' => '/uploads/berita/app.jpg', 'jenis_berita' => 'lainnya', 'tanggal' => '2026-02-05 18:00:00']);
        Berita::create(['judul_berita' => 'Pengumuman Wisuda Periode Januari', 'deskripsi' => 'Jadwal pelaksanaan wisuda universitas.', 'penulis' => 'Akademik', 'foto' => '/uploads/berita/wisuda.jpg', 'jenis_berita' => 'pengumuman-akademik', 'tanggal' => '2026-01-16 08:00:00']);

        Galeri::create(['judul_galeri' => 'Suasana Seminar AI di Aula Utama', 'deskripsi' => 'Ruang aula dipenuhi peserta yang antusias mengikuti pemaparan materi AI, dengan layar besar menampilkan visualisasi teknologi masa depan.', 'foto' => '/uploads/galeri/ai1.jpg']);
        Galeri::create(['judul_galeri' => 'Praktik Desain UI di Lab Komputer', 'deskripsi' => 'Mahasiswa terlihat fokus mengerjakan desain antarmuka menggunakan laptop masing-masing dalam suasana kerja kelompok.', 'foto' => '/uploads/galeri/uiux1.jpg']);
        Galeri::create(['judul_galeri' => 'Kegiatan Sosial di Desa Binaan', 'deskripsi' => 'Mahasiswa berinteraksi langsung dengan warga desa sambil membagikan bantuan dan membantu kegiatan edukasi sederhana.', 'foto' => '/uploads/galeri/baksos1.jpg']);
        Galeri::create(['judul_galeri' => 'Momen Haru Wisuda Kampus', 'deskripsi' => 'Para lulusan mengenakan toga sambil berfoto bersama keluarga di halaman kampus dengan suasana penuh kebahagiaan.', 'foto' => '/uploads/galeri/wisuda1.jpg']);
        Galeri::create(['judul_galeri' => 'Pertandingan Futsal Antar Fakultas', 'deskripsi' => 'Pertandingan berlangsung sengit dengan sorakan supporter yang memenuhi sisi lapangan olahraga kampus.', 'foto' => '/uploads/galeri/futsal1.jpg']);
        Galeri::create(['judul_galeri' => 'Demo Keamanan Jaringan', 'deskripsi' => 'Instruktur menunjukkan simulasi serangan dan pertahanan sistem jaringan di depan peserta seminar.', 'foto' => '/uploads/galeri/cyber1.jpg']);
        Galeri::create(['judul_galeri' => 'Aksi Donor Darah di Kampus', 'deskripsi' => 'Mahasiswa antre dengan tertib untuk mengikuti kegiatan donor darah yang berlangsung di gedung serbaguna.', 'foto' => '/uploads/galeri/donor1.jpg']);
        Galeri::create(['judul_galeri' => 'Pameran Karya Teknologi Mahasiswa', 'deskripsi' => 'Berbagai booth inovasi teknologi dipamerkan dengan mahasiswa menjelaskan langsung hasil proyek mereka.', 'foto' => '/uploads/galeri/festival1.jpg']);
        Galeri::create(['judul_galeri' => 'Latihan Kepemimpinan Mahasiswa Baru', 'deskripsi' => 'Peserta duduk melingkar mengikuti diskusi dan simulasi kepemimpinan dalam kelompok kecil.', 'foto' => '/uploads/galeri/leadership1.jpg']);
        Galeri::create(['judul_galeri' => 'Suasana Ramai Job Fair Kampus', 'deskripsi' => 'Ratusan mahasiswa mengantre di berbagai booth perusahaan untuk menyerahkan CV dan mengikuti wawancara singkat.', 'foto' => '/uploads/galeri/jobfair1.jpg']);
        Galeri::create(['judul_galeri' => 'Kelas Literasi Digital Interaktif', 'deskripsi' => 'Dosen dan mahasiswa berdiskusi aktif mengenai penggunaan media digital yang aman dan produktif.', 'foto' => '/uploads/galeri/literasi1.jpg']);
        Galeri::create(['judul_galeri' => 'Kerja Bakti Area Kampus', 'deskripsi' => 'Mahasiswa membersihkan halaman kampus sambil bekerja sama menjaga lingkungan tetap bersih dan nyaman.', 'foto' => '/uploads/galeri/gotong1.jpg']);
        Galeri::create(['judul_galeri' => 'Praktikum Data Science Pemula', 'deskripsi' => 'Mahasiswa mencoba analisis data sederhana menggunakan dataset dan tools pemrograman dasar.', 'foto' => '/uploads/galeri/datascience1.jpg']);
        Galeri::create(['judul_galeri' => 'Presentasi Karya PIMNAS', 'deskripsi' => 'Mahasiswa mempresentasikan hasil penelitian mereka di depan juri dengan penuh percaya diri.', 'foto' => '/uploads/galeri/pimnas1.jpg']);
        Galeri::create(['judul_galeri' => 'Sharing Session Dunia Kerja', 'deskripsi' => 'Narasumber industri berbagi pengalaman nyata tentang tantangan dan peluang di dunia profesional.', 'foto' => '/uploads/galeri/career1.jpg']);
        Galeri::create(['judul_galeri' => 'Aktivitas Administrasi Akademik', 'deskripsi' => 'Staf dan mahasiswa mengurus dokumen akademik di ruang layanan kampus.', 'foto' => '/uploads/galeri/akademik1.jpg']);
        Galeri::create(['judul_galeri' => 'Rapat Organisasi Mahasiswa', 'deskripsi' => 'Para pengurus organisasi berdiskusi menyusun program kerja di ruang sekretariat.', 'foto' => '/uploads/galeri/orgmahasiswa1.jpg']);
        Galeri::create(['judul_galeri' => 'Diskusi Startup Mahasiswa', 'deskripsi' => 'Mahasiswa berdiskusi santai mengenai ide bisnis digital yang sedang mereka kembangkan.', 'foto' => '/uploads/galeri/startup1.jpg']);
        Galeri::create(['judul_galeri' => 'Kunjungan Booth Expo Kampus', 'deskripsi' => 'Pengunjung melihat berbagai stan informasi program studi dan aktivitas kampus.', 'foto' => '/uploads/galeri/expo1.jpg']);
        Galeri::create(['judul_galeri' => 'Pelatihan Dasar Organisasi', 'deskripsi' => 'Mahasiswa baru mengikuti simulasi kerja organisasi dan belajar koordinasi tim.', 'foto' => '/uploads/galeri/ldo1.jpg']);
    }
}
