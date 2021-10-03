<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MonthlyIndicator;

class MonthlyIndicatorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        MonthlyIndicator::create([
            "id"=>"9001",
            "name"=>"Penyampaian LPJ Bendahara",
            "period"=>"bulan",
            "type"=>"rutin",
            "description"=>"<strong>Laporan Pertanggungjawaban Bendahara (LPJ Bendahara) adalah laporan yang dibuat oleh Bendahara Penerimaan/Pegeluaran atas uang/surat berharga yang dikelolanya sebagai pertanggungjawaban pengelolaan uang.<br /><Satker wajib menyampaikan LPJ Bendahara yang dihasilkan dari aplikasi SAS ke aplikasi SPRINT secara rutin setiap bulan dengan batas waktu&nbsp;<strong>10 (sepuluh) hari kerja</strong>&nbsp;setelah bulan bersangkutan berakhir atau pada hari kerja sebelumnya jika tanggal 10 adalah hari libur.",
            "dasar_hukum"=>'<ol>
                <li>Peraturan Menteri Keuangan Nomor&nbsp;<a href="https://jdih.kemenkeu.go.id/FullText/2013/162~PMK.05~2013Per.HTM">162/PMK.05/2013</a>&nbsp;tentang Kedudukan dan Tanggung Jawab Bendahara pada Satuan Kerja Pengelola Anggaran Pendapatan dan Belanja Negara.</li>
                <li>Peraturan Menteri Keuangan Nomor&nbsp;<a href="https://jdih.kemenkeu.go.id/FullText/2013/162~PMK.05~2013Per.HTM">230/PMK.05/2016</a>&nbsp;tentang Perubahan atas Peraturan Menteri Keuangan Nomor 162/PMK.05/2013 Tentang Kedudukan dan Tanggung Jawab Bendahara pada Satuan Kerja Pengelola Anggaran Pendapatan dan Belanja Negara</li>
                <li>Peraturan Direktur Jenderal Perbendaharaan Nomor&nbsp;<a href="https://drive.google.com/file/d/1NR66wSomrZ7mn4qd_Bb4y25UqEr6pvzv/view?usp=sharing">PER-03/PB/2014</a>&nbsp;tentang Petunjuk Teknis Penatausahaan, Pembukuaan, dan Pertanggungjawaban Bendahara pada Satuan Kerja Pengelola Anggaran Pendapatan dan Belanja Negara serta Verifikasi Laporan Pertanggungjawaban Bendahara</li>
                </ol>',
                            "lampiran"=>"<ol>
                <li>Laporan Pertanggungjawaban (LPJ) Bendahara Pengeluaran sesuai format PER-03/PB/2014 dari aplikasi SAS atau SAKTI (Khusus bagi Bendahara satker di wilayah kerja KPPN Kotabumi yang mengelola dana APBN)</li>
                <li>Laporan Saldo Rekening Bendahara (dapat dicetak di SILABI bersamaan dengan pencetakan LPJ)</li>
                <li>Copy Rekening Koran Bendahara Pengeluaran</li>
                </ol>",
            "start_day"=>1,
            "end_day"=>10,
        ]);

        MonthlyIndicator::create([
            "id"=>"9002",
            "name"=>"Konfirmasi Data Capaian Output",
            "period"=>"bulan",
            "type"=>"rutin",
            "description"=>"Pelaporan data capaian output merupakan bagian dari monev pelaksanaan anggaran yang bertujuan untuk mewujudkan belanja berkualitas sesuai dengan prinsip penganggaran berbasis kinerja. Selain itu, data capaian output dipergunakan dalam rangka penilaian kinerja anggaran. Batas akhir pelaporan bagi Satker pengguna Aplikasi SAS&nbsp;<strong>paling lambat 10 hari kerja pada bulan berikutnya<strong>",
            "dasar_hukum"=>'<ol> <li>Peraturan Menteri Keuangan Nomor 195/PMK.05/2018 tentang Monitoring Dan Evaluasi Pelaksanaan Anggaran Belanja Kementerian Negara/Lembaga</li> <li>Peraturan Dirjen Perbendaharaan Nomor PER-4/PB/2021 tentang Petunjuk Teknis Penilaian Indikator Kinerja Pelaksanaan Anggaran Belanja Kementerian Negara/Lembaga</li> <li>Nota Dinas Direktur Jenderal Perbendaharaan Nomor ND-1/PB/PB.2/2021 hal Pelaksanaan dan Petunjuk Teknis Pelaporan Data Capaian Output Tahun 2021 Bagi Satker Pengguna Aplikasi SAS</li> </ol>',
            "lampiran"=>"",
            "start_day"=>1,
            "end_day"=>10,
            ]);

            MonthlyIndicator::create([
            "id"=>"9003",
            "name"=>"Pengajuan SPM Gaji Induk",
            "period"=>"bulan",
            "type"=>"rutin",
            "description"=>"Surat Perintah Membayar Langsung, yang selanjutnya disingkat SPM-LS, adalah SPM langsung kepada Bendahara Pengeluaran atau Penerima Hak yang diterbitkan oleh PA/KPA atau pejabat lain yang ditunjuk atas dasar kontrak kerja, surat keputusan, surat tugas atau surat perintah kerja lainnya.SPM-LS untuk pembayaran gaji induk disampaikan kepada KPPN <strong>paling lambat tanggal 15 sebelum bulan pembayaran</strong>.Dalam hal tanggal 15 merupakan hari libur atau hari yang dinyatakan libur, penyampaian SPM-LS untuk pembayaran gaji induk kepada KPPN dilakukan paling lambat 1 (satu) hari kerja sebelum tanggal 15",
            "dasar_hukum"=>'<ol> <li>Peraturan Menteri Keuangan Nomor&nbsp;<a href=""https://jdih.kemenkeu.go.id/fullText/2012/190~PMK.05~2012Per.HTM"">190/PMK.05/2012</a>&nbsp;tentang Tata Cara Pembayaran Dalam Rangka Pelaksanaan Anggaran Pendapatan dan Belanja Negara</li> <li>Peraturan Menteri Keuangan Nomor&nbsp;<a href=""https://jdih.kemenkeu.go.id/fullText/2018/178~PMK.05~2018Per.pdf"">178/PMK.05/2018</a>&nbsp;tentang Perubahan atas PMK 190/PMK.05/2012 tentang Tata Cara Pembayaran Dalam Rangka Pelaksanaan Anggaran Pendapatan dan Belanja Negara</li> <li>Peraturan Menteri Keuangan Nomor&nbsp;<a href=""https://jdih.kemenkeu.go.id/fullText/2018/196~PMK.05~2018Per.pdf"">43/PMK.05/20</a>20&nbsp;tentang tentang Mekanisme Pelaksanaan Anggaran Belanja Negara dalam Penanganan Pandemi Corona Virus Disease 2019</li> </ol>',
            "lampiran"=>"<ol> <li>SPM 2 lembar beserta Arsip Data Komputer (ADK)nya;</li> <li>Daftar Perubahan Data Pegawai beserta ADK Perubahan Data Pegawai (.PRB);</li> <li>ADK Gaji (.GPP);</li> <li>Surat Setoran Pajak (SSP);</li> <li>Daftar Rekening Terlampir (penerima lebih dari 1 pegawai);</li> <li>Apabila Pegawai Baru CPNS, ADK kirim pegawai baru (.krm) setelah SK,SPMT, data keluarga direkam pada aplikasi GPP dengan lengkap dan benar.</li> <li>Apabila Pegawai Baru Pindahan: ADK kirim pegawai baru (.krm)</li> </ol>",
            "start_day"=>1,
            "end_day"=>15,
            ]);

            MonthlyIndicator::create([
            "id"=>"9004",
            "name"=>"Pengajuan SPM Penghasilan PPNPN Induk",
            "period"=>"bulan",
            "type"=>"rutin",
            "description"=>"Penyelenggaran administratrasi pembayaran penghasilan PPNPN harus menggunakan Aplikasi SAS. Perekaman/perubahan elemen data pada Aplikasi SAS meliputi data identitas PPNPN, surat keputusan/perjanjian kerja/kontrak PPNPN, jumlah penghasilan dan data keluarga. Pembayaran penghasilan PPNPN setiap bulan dibuat dalam suatu Daftar Pembayaran Penghasilan PPNPN dari Aplikasi SAS.",
            "dasar_hukum"=>'<ol> <li> Perdirjen Perbendaharaan Nomor <a href="https://www.dropbox.com/s/ud7874umvsk2u9d/per_31_pb_2016.pdf?dl=0" > PER-31/PB/2016 </a> Tentang Tata Cara Pembayaran Penghasilan Bagi PPNPN Yang Dibebankan Pada APBN </li> <li> Perdirjen Perbendaharaan Nomor <a href="https://jdih.kemenkeu.go.id/FullText/2019/PER-8~PB~2019PerDJPB.pdf" > PER-8/PB/2019 </a> Tentang Perubahan atas Peraturan Direktur Jenderal Perbendaharaan Nomor Nomor PER-31/PB/2016 Tentang Tata Cara Pembayaran Penghasilan Bagi PPNPN Yang Dibebankan Pada APBN <br/> </li> <li> Perdirjen Perbendaharaan Nomor PER-22/PB/2019 tentang Perubahan Kedua Atas Peraturan Direktur Jenderal Perbendaharaan Nomor PER-31/PB/2016 Tentang Tata Cara Pembayaran Penghasilan Bagi PPNPN Yang Dibebankan Pada APBN </li> <li> Perdirjen Perbendaharaan Nomor <a href="https://e-dropbox.kemenkeu.go.id/index.php/s/lq3c0DN5JpOY70C"> PER-15/PB/2020 </a> tentang Perubahan Ketiga Atas Peraturan Direktur Jenderal Perbendaharaan Nomor PER-31/PB/2016 Tentang Tata Cara Pembayaran Penghasilan Bagi PPNPN Yang Dibebankan Pada APBN </li> </ol>',
            "lampiran"=>"<div><strong>Syarat Pengajuan SPM Penghasilan PPNPN :<br /></strong></div> <ol> <li><strong>SPM-LS PPNPN 2 (dua) rangkap</strong></li> <li><strong>ADK SPM yang sudah diinject PIN oleh PPSPM</strong></li> <li><strong>ADK PPNPN (*.npn)</strong></li> <li><strong>Surat Pernyataan Tanggung Jawab Mutlak (SPTJM) yang ditandatangani KPA/PPK</strong></li> <li><strong>Daftar rekening penerima pembayaran (Cetakan Lampiran SPM)</strong></li> <li><strong>Daftar pembayaran gaji PPNPN (Dicetak dari Aplikasi SAS user PPK menu PPNPN)</strong></li> <li><strong>SSP PPh Pasal 21 (dalam hal terdapat potongan PPh Pasal 21)</strong></li> </ol>",
            "start_day"=>21,
            "end_day"=>26,
            ]);

    }
}
