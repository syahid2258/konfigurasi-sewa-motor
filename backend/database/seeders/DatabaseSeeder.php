<?php

namespace Database\Seeders;

use App\Models\AppInfo;
use App\Models\Booking;
use App\Models\Category;
use App\Models\ChatDetail;
use App\Models\Faq;
use App\Models\Message;
use App\Models\Motor;
use App\Models\Notification;
use App\Models\PointHistory;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // =============================================
        // USERS
        // =============================================
        $reza = User::create([
            'name'        => 'Reza Maulana',
            'email'       => 'reza.maulana@gmail.com',
            'password'    => Hash::make('password123'),
            'phone'       => '081234567890',
            'avatar'      => 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?q=80&w=200',
            'birth_date'  => '15 Agustus 1998',
            'gender'      => 'Laki-laki',
            'occupation'  => 'Software Engineer',
            'address'     => 'Jl. Sudirman No. 123, Jakarta Selatan, DKI Jakarta',
            'points'      => 2450,
        ]);

        $akbar = User::create([
            'name'        => 'Akbar',
            'email'       => 'akbar@gmail.com',
            'password'    => Hash::make('admin'),
            'phone'       => '089876543210',
            'avatar'      => 'https://images.unsplash.com/photo-1599566150163-29194dcaad36?q=80&w=200',
            'birth_date'  => '10 Mei 2000',
            'gender'      => 'Laki-laki',
            'occupation'  => 'Mahasiswa',
            'address'     => 'Jl. Kaliurang Km 5, Sleman, DI Yogyakarta',
            'points'      => 150,
        ]);

        // =============================================
        // CATEGORIES
        // =============================================
        $matic  = Category::create(['name' => 'Matic']);
        $sport  = Category::create(['name' => 'Sport']);
        $retro  = Category::create(['name' => 'Retro']);

        // =============================================
        // MOTORS
        // =============================================
        $imgUrl = 'https://images.unsplash.com/photo-1625234199148-356b7c53d5fa?q=80&w=400';

        $vario = Motor::create([
            'category_id'  => $matic->id,
            'name'         => 'Honda Vario 125',
            'brand'        => 'Honda',
            'image'        => $imgUrl,
            'price'        => 85000,
            'year'         => 2023,
            'cc'           => 125,
            'transmission' => 'Matic',
            'fuel_type'    => 'Bensin',
            'color'        => 'Putih',
            'rating'       => 4.8,
            'review_count' => 128,
            'plate_number' => 'AB 1234 CD',
            'is_available' => true,
            'description'  => 'Motor matic Honda Vario 125 sangat hemat dan nyaman untuk digunakan sehari-hari.',
        ]);

        $nmax = Motor::create([
            'category_id'  => $matic->id,
            'name'         => 'Yamaha NMAX 155',
            'brand'        => 'Yamaha',
            'image'        => $imgUrl,
            'price'        => 110000,
            'year'         => 2023,
            'cc'           => 155,
            'transmission' => 'Matic',
            'fuel_type'    => 'Bensin',
            'color'        => 'Biru',
            'rating'       => 4.9,
            'review_count' => 214,
            'plate_number' => 'AB 5678 EF',
            'is_available' => true,
            'description'  => 'Yamaha NMAX 155 adalah skuter premium dengan performa tinggi dan desain sporty.',
        ]);

        $beat = Motor::create([
            'category_id'  => $matic->id,
            'name'         => 'Honda Beat',
            'brand'        => 'Honda',
            'image'        => $imgUrl,
            'price'        => 70000,
            'year'         => 2022,
            'cc'           => 110,
            'transmission' => 'Matic',
            'fuel_type'    => 'Bensin',
            'color'        => 'Merah',
            'rating'       => 4.7,
            'review_count' => 98,
            'plate_number' => 'AB 9012 GH',
            'is_available' => true,
            'description'  => 'Honda Beat adalah pilihan tepat untuk keliling kota dengan harga terjangkau.',
        ]);

        $aerox = Motor::create([
            'category_id'  => $matic->id,
            'name'         => 'Yamaha Aerox 155',
            'brand'        => 'Yamaha',
            'image'        => $imgUrl,
            'price'        => 100000,
            'year'         => 2023,
            'cc'           => 155,
            'transmission' => 'Matic',
            'fuel_type'    => 'Bensin',
            'color'        => 'Hitam',
            'rating'       => 4.8,
            'review_count' => 176,
            'plate_number' => 'AB 3456 IJ',
            'is_available' => true,
            'description'  => 'Yamaha Aerox hadir dengan desain agresif dan teknologi terkini untuk pengalaman berkendara terbaik.',
        ]);

        $cbr = Motor::create([
            'category_id'  => $sport->id,
            'name'         => 'Honda CBR 150R',
            'brand'        => 'Honda',
            'image'        => $imgUrl,
            'price'        => 150000,
            'year'         => 2023,
            'cc'           => 150,
            'transmission' => 'Manual',
            'fuel_type'    => 'Bensin',
            'color'        => 'Merah',
            'rating'       => 4.9,
            'review_count' => 87,
            'plate_number' => 'AB 7890 KL',
            'is_available' => true,
            'description'  => 'Honda CBR 150R adalah motor sport dengan tenaga besar dan tampilan yang menawan.',
        ]);

        $fazzio = Motor::create([
            'category_id'  => $retro->id,
            'name'         => 'Yamaha Fazzio',
            'brand'        => 'Yamaha',
            'image'        => $imgUrl,
            'price'        => 95000,
            'year'         => 2023,
            'cc'           => 125,
            'transmission' => 'Matic',
            'fuel_type'    => 'Bensin',
            'color'        => 'Krem',
            'rating'       => 4.6,
            'review_count' => 54,
            'plate_number' => 'AB 2345 MN',
            'is_available' => true,
            'description'  => 'Yamaha Fazzio hadir dengan desain retro modern yang elegan dan stylish.',
        ]);

        // =============================================
        // BOOKINGS (for Reza - currentUser)
        // =============================================
        Booking::create([
            'user_id'          => $reza->id,
            'motor_id'         => $vario->id,
            'start_date'       => '20 Mei 2024',
            'end_date'         => '22 Mei 2024',
            'duration_days'    => 2,
            'total_price'      => 170000,
            'status'           => 'Aktif',
            'payment_method'   => 'QRIS',
            'pickup_location'  => 'Cabang Mataram City Center',
        ]);

        Booking::create([
            'user_id'          => $reza->id,
            'motor_id'         => $nmax->id,
            'start_date'       => '10 Mei 2024',
            'end_date'         => '12 Mei 2024',
            'duration_days'    => 2,
            'total_price'      => 220000,
            'status'           => 'Selesai',
            'payment_method'   => 'Transfer Bank',
            'pickup_location'  => 'Cabang Surakarta',
        ]);

        // =============================================
        // MESSAGES & CHAT DETAILS (for Reza)
        // =============================================
        $msgAdmin = Message::create([
            'user_id'      => $reza->id,
            'sender_name'  => 'Admin MotorKU',
            'avatar'       => 'https://ui-avatars.com/api/?name=Admin+M&background=7A58E6&color=fff&rounded=true&bold=true',
            'text'         => 'Pesanan Honda Vario 125 Anda sudah kami konfirmasi. Silahkan...',
            'time'         => '10:30',
            'unread_count' => 2,
            'is_online'    => true,
        ]);

        ChatDetail::create(['message_id' => $msgAdmin->id, 'text' => 'Halo Mas Akbar, pesanan motor Vario 125 untuk tanggal 20 Mei sudah kami terima dan konfirmasi ya.', 'time' => '10:00', 'is_me' => false]);
        ChatDetail::create(['message_id' => $msgAdmin->id, 'text' => 'Baik Pak, terima kasih. Untuk pengambilan motornya nanti bagaimana prosesnya?', 'time' => '10:05', 'is_me' => true]);
        ChatDetail::create(['message_id' => $msgAdmin->id, 'text' => 'Silakan datang langsung ke lokasi cabang Mataram City Center (MCC). Nanti tinggal tunjukkan E-Tiket atau QR Code yang ada di aplikasi ke petugas kami di lapangan.', 'time' => '10:07', 'is_me' => false]);
        ChatDetail::create(['message_id' => $msgAdmin->id, 'text' => 'Oke siap Pak, besok pagi jam 10 saya meluncur ke lokasi.', 'time' => '10:10', 'is_me' => true]);
        ChatDetail::create(['message_id' => $msgAdmin->id, 'text' => 'Baik ditunggu kedatangannya Mas Akbar. Hati-hati di jalan! 🙏', 'time' => '10:42', 'is_me' => false]);

        $msgBudi = Message::create([
            'user_id'      => $reza->id,
            'sender_name'  => 'Pak Budi (Pengirim Motor)',
            'avatar'       => 'https://images.unsplash.com/photo-1599566150163-29194dcaad36?q=80&w=200&auto=format&fit=crop',
            'text'         => 'Halo kak, saya sudah di depan lokasi pengantaran ya. Sesuai t...',
            'time'         => 'Kemarin',
            'unread_count' => 1,
            'is_online'    => true,
        ]);
        ChatDetail::create(['message_id' => $msgBudi->id, 'text' => 'Halo kak, saya sudah di depan lokasi pengantaran ya, sesuai alamat yang tertera.', 'time' => '08:30', 'is_me' => false]);
        ChatDetail::create(['message_id' => $msgBudi->id, 'text' => 'Siap Pak, saya segera keluar.', 'time' => '08:32', 'is_me' => true]);

        $msgCS = Message::create([
            'user_id'      => $reza->id,
            'sender_name'  => 'CS Bantuan',
            'avatar'       => 'https://ui-avatars.com/api/?name=CS&background=E5E7EB&color=2D3142&rounded=true&bold=true',
            'text'         => 'Baik kak, keluhan mengenai helm sudah kami catat dan akan sege...',
            'time'         => '12/05',
            'unread_count' => 0,
            'is_online'    => false,
        ]);
        ChatDetail::create(['message_id' => $msgCS->id, 'text' => 'Baik kak, keluhan mengenai helm sudah kami catat dan akan segera ditindaklanjuti.', 'time' => '14:00', 'is_me' => false]);

        $msgPromo = Message::create([
            'user_id'      => $reza->id,
            'sender_name'  => 'Promo & Info',
            'avatar'       => 'https://ui-avatars.com/api/?name=%25&background=F3F0FF&color=7A58E6&rounded=true&bold=true',
            'text'         => 'Diskon 50% untuk sewa minimal 3 hari! Gunakan kode promo: GASS...',
            'time'         => '10/05',
            'unread_count' => 0,
            'is_online'    => false,
        ]);
        ChatDetail::create(['message_id' => $msgPromo->id, 'text' => 'Diskon 50% untuk sewa minimal 3 hari! Gunakan kode promo: GASSMOTOR. Berlaku s/d 31 Mei 2024.', 'time' => '09:00', 'is_me' => false]);

        // =============================================
        // NOTIFICATIONS (for Reza)
        // =============================================
        Notification::create([
            'user_id'     => $reza->id,
            'title'       => 'Pembayaran Berhasil',
            'description' => 'Pembayaran untuk Honda Vario 125 telah berhasil dikonfirmasi.',
            'time'        => '10 Menit yang lalu',
            'type'        => 'Pembayaran',
            'is_read'     => false,
        ]);

        Notification::create([
            'user_id'     => $reza->id,
            'title'       => 'Promo Spesial Akhir Pekan!',
            'description' => 'Diskon 20% untuk semua jenis motor matic. Gunakan kode MATIC20.',
            'time'        => '2 Jam yang lalu',
            'type'        => 'Promo',
            'is_read'     => false,
        ]);

        Notification::create([
            'user_id'     => $reza->id,
            'title'       => 'Masa Sewa Akan Habis',
            'description' => 'Masa sewa Yamaha NMAX Anda akan habis dalam 2 jam.',
            'time'        => 'Kemarin',
            'type'        => 'Booking',
            'is_read'     => true,
        ]);

        // =============================================
        // VOUCHERS
        // =============================================
        Voucher::create([
            'title'            => 'Diskon 20% Akhir Pekan',
            'description'      => 'Potongan harga maksimal Rp 50.000 untuk penyewaan di hari Sabtu & Minggu.',
            'discount_percent' => 20,
            'points_cost'      => 500,
            'expiry_date'      => 'Berlaku s/d 30 Mei 2024',
            'is_active'        => true,
        ]);

        Voucher::create([
            'title'            => 'Potongan Rp 25.000 Pengguna Baru',
            'description'      => 'Khusus pengguna baru yang melakukan booking pertama kali melalui aplikasi.',
            'discount_percent' => 25,
            'points_cost'      => 750,
            'expiry_date'      => 'Berlaku s/d 15 Juni 2024',
            'is_active'        => true,
        ]);

        // =============================================
        // POINT HISTORIES (for Reza)
        // =============================================
        PointHistory::create([
            'user_id'   => $reza->id,
            'title'     => 'Sewa Honda Vario 125',
            'points'    => 150,
            'is_earned' => true,
            'date'      => '20 Mei 2024',
        ]);

        PointHistory::create([
            'user_id'   => $reza->id,
            'title'     => 'Tukar Voucher Diskon 20%',
            'points'    => 500,
            'is_earned' => false,
            'date'      => '15 Mei 2024',
        ]);

        PointHistory::create([
            'user_id'   => $reza->id,
            'title'     => 'Bonus Pengguna Baru',
            'points'    => 1000,
            'is_earned' => true,
            'date'      => '01 Mei 2024',
        ]);

        // =============================================
        // FAQS
        // =============================================
        Faq::create(['question' => 'Bagaimana cara menyewa motor?', 'answer' => 'Anda dapat menyewa motor dengan memilih motor yang tersedia di halaman Beranda, lalu pilih tanggal penyewaan dan ikuti proses pembayaran hingga selesai.']);
        Faq::create(['question' => 'Apakah ada jaminan yang harus diberikan?', 'answer' => 'Ya, kami membutuhkan e-KTP asli sebagai jaminan selama masa penyewaan. Dokumen akan dikembalikan setelah motor dikembalikan dalam kondisi baik.']);
        Faq::create(['question' => 'Bagaimana jika motor mengalami kerusakan di jalan?', 'answer' => 'Harap segera hubungi layanan pelanggan kami melalui menu Bantuan. Kami akan mengirimkan tim teknisi atau memberikan motor pengganti jika diperlukan.']);
        Faq::create(['question' => 'Apakah bisa memperpanjang masa sewa?', 'answer' => 'Tentu bisa. Anda dapat memperpanjang masa sewa melalui menu Riwayat Booking sebelum masa sewa aktif Anda berakhir.']);

        // =============================================
        // APP INFOS
        // =============================================
        // Terms
        AppInfo::create(['title' => '1. Persyaratan Peminjam', 'content' => 'Peminjam harus berusia minimal 18 tahun, memiliki e-KTP asli yang valid, serta SIM C yang masih berlaku.', 'type' => 'terms']);
        AppInfo::create(['title' => '2. Kebijakan Penggunaan', 'content' => 'Motor hanya boleh digunakan di dalam wilayah yang telah disepakati. Dilarang keras memindahtangankan motor kepada pihak ketiga tanpa izin.', 'type' => 'terms']);
        AppInfo::create(['title' => '3. Denda & Keterlambatan', 'content' => 'Keterlambatan pengembalian akan dikenakan denda sebesar Rp 10.000 per jam. Jika lebih dari 24 jam, akan dihitung sebagai sewa 1 hari penuh.', 'type' => 'terms']);

        // Privacy
        AppInfo::create(['title' => '1. Pengumpulan Data', 'content' => 'Kami mengumpulkan data pribadi Anda seperti nama, nomor telepon, alamat email, dan foto KTP untuk keperluan verifikasi keamanan.', 'type' => 'privacy']);
        AppInfo::create(['title' => '2. Penggunaan Data', 'content' => 'Data Anda digunakan secara eksklusif untuk memproses transaksi, menghubungi Anda jika terjadi keadaan darurat, dan peningkatan layanan.', 'type' => 'privacy']);
        AppInfo::create(['title' => '3. Keamanan Informasi', 'content' => 'Kami menggunakan sistem enkripsi standar industri untuk melindungi data sensitif Anda dari akses yang tidak sah.', 'type' => 'privacy']);
    }
}
