<?php

namespace App\Models;

class Berita
{
    private static  $blog_posts = [
        [
            "title" => "Ini Enam Lowongan Pelatihan Berbasis Kompetensi dari UPTD Latihan Kerja NTT",
            "slug" => "ini-enam-lowongan-pelatihan",
            "body" => "KUPANG, VICTORY NEWS-Unit Pelatihan Terpadu Daerah (UPTD) Latihan Kerja Dinas Koperasi Tenaga Kerja dan Transmigrasi Provinsi NTT membuka enam program pelatihan berbasis kompetensi.
            Enam program pelatihan yang dibuka pada gelombang pertama tahun 2022 terdiri dari program pelatihan desain grafis muda, program pelatihan mengerjakan proses produksi furniture kayu, dan program pelatihan menjahit dengan mesin.
            Selain itu ada program pelatihan plate walder SMAW 1G, program pelatihan servis sepeda motor junior, dan program pelatihan teknisi akuntansi junior. Peserta pelatihan yang dibutuhkan sebanyak 96 orang. Masing-masing 16 peserta dari setiap program pelatihan, ungkap Kepala UPTD Latihan Kerja NTT Charles B M Foeh kepada Victory News, Rabu (12/01/2022) pagi.Bagi yang berminat silahkan mengakses link https://bit.ly/pendaftaranpbk2022. Setelah mengisi form online melalui Google form dilanjutkan ke pengisian sisnaker melalui akun kemnaker di https://pelatihan.kemnaker.go.id dan ikuti prosedur di dalamnya,tambah Charles."
        ],
        [
            "title" => "Diskopnakertrans Provinsi NTT dan PT Santan Borneo Abadi Gelar Pelatihan Calon Tenaga Kerja",
            "slug" => "diskopnakertrans-prov-ntt-dan-pt-santan",
            "body" => "POS-KUPANG.COM, KUPANG - Dinas Koperasi Tenaga Kerja Dan Transmigrasi Provinsi NTT bekerja sama dengan PT. Santan Borneo Abadi menggelar pelatihan berbasiskan pengguna bagi calon tenaga kerja asal Provinsi NTT.

            Pelatihan ini bertujuan menjawab Surat Keputusan (SK) Moratorium yang dikeluarkan oleh Gubernur NTT Viktor Laiskodat.
            
            Demikian dijelaskan Kadis Diskopnakertrans Provinsi NTT melalui Kepala seksi pelatihan dan promosi (UPTD) Latihan kerja dinas kopnakertrans Provinsi NTT, Jeremias Ata, ditemui POS-KUPANG saat membuka pelatihan di aula gedung Dinas Koperasi, Sub Dinas pengembangan sumber daya manusia, Jalan Palapa, Kota Kupang Selasa, 8 Februari 2022.

            Jeremias menjelaskan, tenaga kerja baik yang ke dalam atau luar negeri harus dibekali dengan pengetahuan, yang ditandai dengan pemberian sertifikat sebagai legalitas mereka untuk bekerja di suatu perusahaan."
        ]
        ];

        public static function all()
        {
            return collect(self::$blog_posts);
        }

        public static function find($slug)
        {
            $posts = static::all();            
            return $posts->firstWhere('slug', $slug);
        }
    
}
