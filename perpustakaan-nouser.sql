--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int NOT NULL,
  `kategori_id` int NOT NULL,
  `cover` text NOT NULL,
  `file` text NOT NULL,
  `judul` text NOT NULL,
  `slug` text NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `deskripsi` text NOT NULL,
  `rak_buku` varchar(10) NOT NULL,
  `total_buku` int NOT NULL,
  `total_peminjam` int NOT NULL,
  `stok_buku` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `kategori_id`, `cover`, `file`, `judul`, `slug`, `penulis`, `penerbit`, `tanggal_terbit`, `deskripsi`, `rak_buku`, `total_buku`, `total_peminjam`, `stok_buku`) VALUES
(1, 1, 'A_School_Frozen_in_Time_Book_3.jpg', 'A School Frozen in Time Book 3.pdf', 'A School Frozen in Time', 'a-school-frozen-in-time', 'Muziki Tsujimura', 'm&c!', '2024-10-10', 'Setelah kejadian sebelumnya merenggut tiga orang di antara delapan murid SMA Seinan\r\nGakuin yang terjebak dalam waktu, kini mereka hanya memiliki dua pilihan: tidur semua\r\natau terjaga semua. Demi menghindari peristiwa buruk menimpa pada pukul 05.53,\r\nmereka pun memutuskan untuk tidur.', '1', 10, 0, 10),
(2, 1, 'Demon_Slayer_Kimetsu_no_Yaiba_20.jpg', 'Demon_Slayer_kimetsu_no_yaiba_20.pdf', 'Demon Slayer Kimetsu No Yaiba', 'demon-slayer-kimetsu-no-yaiba', 'Koyoharu Gotouge', 'Elex Media komputindo', '2024-09-27', 'Iwabashira Himejima beserta Kazebashira Shinazugawa berusaha mati-matian bergumul\r\nmelawan Jyogen no Ichi!! Di tengah pertempuran sengit itu, kedua Hashira mendapatkan\r\n“tanda” dan mampu melancarkan serangan berturut-turut. Meski demikian, mereka\r\ndihadang kekuatan musuh yang luar biasa.', '1', 10, 0, 10),
(3, 1, 'Komik_Alam_Kubur.jpg', 'alam kubur.pdf', 'Alam Kubur', 'alam-kubur', 'Abu Mahdi', 'Salsabila', '2024-07-05', 'Alam Kubur adalah persinggahan sementara manusia setelah kematiannya. Di sinilah manusia menunggu datangnya Hari Penghisaban segala amal perbuatan hingga Kiamat tiba.', '1', 10, 0, 10),
(4, 1, 'Komik_Baik_Bisnis_Spot_Foto_Argha,_Kecil_Kecil_Punya_Bisnis.jpg', 'Komik Baik_Bisnis Spot Foto Argha, Kecil-Kecil Punya Bisnis.pdf', 'bisnis spot foto argha, kecil-kecil punya bisnis', 'bisnis-spot-foto-argha,-kecil-kecil-punya-bisnis', 'aan wulandari u', 'Gema insani', '2024-06-22', 'Argha, Chandra, dan Laras adalah tiga sahabat yang kompak. Chandra yang banyak ide, Argha yang tekun dan mandiri, serta Laras yang jail dan senang membantu adalah kombinasi yang pas.', '1', 10, 0, 10),
(5, 1, 'Komik_Next_G_vol_582_CCTV_Lama.png', 'Komik Next G vol. 582_ CCTV Lama.pdf', 'CCTV Lama', 'cctv-lama', 'aliyya mufida Dzakira ', 'Dar! Mizan', '2024-09-17', 'Selama ini, Nia tidak takut pulang sekolah sendirian karena jalan yang dilaluinya dipasangi CCTV. Tapi, belakangan ini CCTV-nya jadi sering mati. Bagaimana kalau terjadi sesuatu padanya? Adakah yang dapat menolongnya?', '1', 10, 0, 10),
(6, 1, 'Komik_Next_G_Vol_585_Mal_Kosong.png', 'Komik Next G Vol. 585_Mal Kosong.pdf', 'mal kosong', 'mal-kosong', 'muhamad rifqi ansari', 'Dar! Mizan', '2024-09-17', 'Sepulang bermain, Arun, Lisa, dan Desi melewati sebuah gedung mal besar yang sudah lama tutup. Menurut cerita yang beredar, banyak sekali kejadian menyeramkan di mal itu. Namun, mereka tidak mau percaya sebelum membuktikan sendiri kebenarannya. Dan sepertinya, ini misteri yang harus mereka selidiki! Kira-kira, apa yang mereka temukan di dalam mal kosong itu?', '1', 10, 0, 10),
(7, 1, 'Komik_Next_G_Vol_586_Pentingnya_Halal.png', 'Komik Next G Vol. 586_Pentingnya Halal.pdf', 'Pentingnya Halal', 'pentingnya-halal', 'afifah nur adithya M.', 'Dar! Mizan', '2024-09-17', 'Di sekolah Ani, banyak siswa yang sering memanjat pohon jambu milik kepala sekolah dan memakan buahnya tanpa izin. Padahal, perbuatan itu sama saja dengan mencuri. Sudah diperingatkan pun tetap saja mereka bandel. Harus dengan cara apa ya, supaya mereka sadar pentingnya memakan makanan yang halal?', '1', 10, 0, 10),
(8, 1, 'Komik_Next_G_Vol_Rahasia_Sampo_Temanku.png', 'Komik Next G Vol. 588_Rahasia Sampo Temanku.pdf', 'Rahasia Sampo Temanku', 'rahasia-sampo-temanku', 'tsabitah Nurika Zahwah', 'Dar! Mizan', '2024-09-17', 'Rivy kagum melihat rambut Sera yang selalu tampak indah dan berkilau. Rivy juga ingin punya rambut sehat seperti Sera. Saking penasarannya, Rivy sampai memaksa Sera untuk memberi tahu rahasia rambut indahnya. Apa benar Sera hanya pakai sampo biasa? ', '1', 10, 0, 10),
(9, 1, 'Tetangga_Kanibal.jpg', 'Tetangga Kanibal.pdf', 'Tetangga Kanibal', 'tetangga-kanibal', 'Erby S', 'Anak Hebat Indonesia', '2024-09-13', 'Andri menebarkan karakusan terhadap istri dan kedua anak-anaknya. Mereka kesulitanuntuk membedakan makanan yang seharusnya tidak layak dimakan. Alasannya mudah ditebak. Semua berawal ketika kelaparan menyelimuti mereka. Mereka berpendapat, semua orang berhak memakan daging, termasuk daging yang tidak seharusnya mereka makan', '1', 10, 0, 10),
(10, 1, 'Narnia_2_The_Lion_The_Witch_and_The_Wardrobe_cov_page-0001.jpg', 'The Chronicles of Narnia #2_The Lion, the Witch and the Wardrobe (Sang Singa, sang Penyihir, dan Lemari).pdf', 'The Chronicles of Narnia #2 The Lion, the Witch and the Wardrobe (Sang Singa, sang Penyihir, dan Lemari).', 'the-chronicles-of-narnia-#2-the-lion,-the-witch-and-the-wardrobe-(sang-singa,-sang-penyihir,-dan-lemari).', 'C.S.LEWIS', 'Gramedia Pustaka Media', '2022-06-22', 'Clive Staples Lewis (1898 - 1963) adalah mahasiswa cerdas, penulis yang dikagumi, kritikus sastra, dan apologet Kristen. Dia dihormati terutama atas kontribusinya dalam kritik sastra, apologetika, dan kesusastraan anak dan fantasi.', '1', 10, 0, 10),
(11, 1, 'Biola_Langit.jpg', 'Biola Langit.pdf', 'biola langit', 'biola-langit', 'eya grimonia', 'Bitread Digital Publishing', '2018-04-17', 'Banyak yang tak terlihat dari balik pertunjukan nan gemerlap. Tak banyak yang tahu, apa\r\nyang dilalui musisi untuk menjadi dirinya saat ini. \"Biola Langit\" adalah penggalan perjalanan\r\npanjang violinis Eya Grimonia. Dia bagikan pengalaman manis dan pahit, dia kenang\r\nkomentar merdu dan sumbang. Eya mengajak Anda melihat hal-hal yang tak terbayangkan\r\nsebelumnya, tentang rahasia musiknya, rahasia hidupnya..', '2', 10, 0, 10),
(12, 2, 'Bulan.jpg', 'Bulan.pdf', 'bulan', 'bulan', 'tere liye', 'PENERBIT SABAK GRIP', '2022-09-05', 'Petualangan Raib, Seli, dan Ali berlanjut.Beberapa bulan setelah peristiwa klan bulan,\r\nMiss Selena akhirnya muncul di sekolah. Ia membawa kabar menggembirakan untuk\r\nanak-anak yang berjiwa petualang seperti Raib, Seli, dan Ali', '2', 10, 0, 10),
(13, 2, 'Bumi.jpg', 'Bumi.pdf', 'bumi', 'bumi', 'tere liye', 'SABAKGRIP', '2022-08-23', '“Namaku Raib, usiaku 15 tahun, kelas sepuluh. Aku anak perempuan seperti kalian, adik-adik kalian,\r\ntetangga kalian. Aku punya dua kucing, namanya si Putih dan si Hitam. Mama dan papaku\r\nmenyenangkan. Guru-guru di sekolahku seru. Teman-temanku baik dan kompak.”\r\n', '2', 10, 0, 10),
(14, 2, 'Five_Nights_At_Freddys_Graphic_Novel_The_Fourth_Closet.jpg', 'Five Nights At Freddys Graphic Novel #3_The Fourth Closet.pdf', 'Five Nights At Freddys Graphic Novel #3_The Fourth Closet', 'five-nights-at-freddys-graphic-novel-#3_the-fourth-closet', 'scott chawton', 'Scholastic', '2022-10-18', 'Five Nights At Freddys Graphic Novel #3: The Fourth Closet', '2', 10, 0, 10),
(15, 2, 'Indahnya_Lukisan_Langit.jpg', 'Indahnya Lukisan Langit.pdf', 'Indahnya Lukisan Langit', 'indahnya-lukisan-langit', 'rasi', 'Rasi Terbit', '2015-03-25', 'Sebuah buku yanag membuat kita takjub akan keindahan alam yang terlukis dilangit.indahnya\r\nmatahari senja, indahnya pelangi,bintang,dan lukisan langit lainnya.', '2', 10, 0, 10),
(16, 2, 'INSPIRASI_DARI_LANGIT_KETUJUH.jpg', 'INSPIRASI DARI LANGIT KETUJUH.pdf', 'INSPIRASI DARI LANGIT KETUJUH', 'inspirasi-dari-langit-ketujuh', 'mahmud', 'Media Pressindo', '2015-09-15', '“Aku (Allah) sesuai dengan prasangka hamba-Ku. Jika ia menyangka baik, maka ia\r\nmendapat kebaikan. Dan jika ia menyangka buruk, maka ia akan mendapatkan\r\nkeburukan.” (Hadits Qudsi)', '2', 10, 0, 10),
(17, 2, 'Langit_Terbuka.jpg', 'langit terbuka.pdf', 'langit terbuka', 'langit-terbuka', 'rayni', 'Prenada Media', '2017-05-01', 'Melarikan diri ke tempat baru dan membuka lembaran baru adalah pilihan yang sering\r\ndipilih saat orang-orang lelah dengan kehidupan mereka yang lama, kehidupan yang\r\nmungkin penuh dengan tanda tanya dan hambar tanpa rasa.', '2', 10, 0, 10),
(18, 2, 'Novel_Grafis_Tidak_Jatuh_Cinta.jpg', 'Novel Grafis_Tidak Jatuh Cinta.pdf', 'Novel Grafis Tidak Jatuh Cinta', 'novel-grafis-tidak-jatuh-cinta', 'rayni', 'Penerbit Buku Kompas', '2024-06-26', 'Demas manusia Bumi. Ia punya usaha jualan pernak-pernik unik futuristik. Tiba-tiba ia\r\nkedatangan tamu dari planet luar bernama Karmen. Karmen yang jatuh cinta pada Demas\r\nkemudian mengajaknya travelling ke luar angkasa. ', '2', 10, 0, 10),
(19, 2, 'rumus_kebenaran_musim_panas_a_midsummers_equation(manatsu_no_hoteishiki).jpg', 'Rumus Kebenaran Musim Panas.pdf', 'Rumus Kebenaran Musim Panas', 'rumus-kebenaran-musim-panas', 'keigo', 'Gramedia Pustaka Utama', '2023-12-15', 'Dalam kunjungannya ke Harigaura untuk menghadiri diskusi rencana proyek penggalian\r\nsumber daya bawah laut, Profesor Yukawa Manabu menyaksikan panasnya perdebatan di\r\nantara warga lokal.', '2', 20, 0, 20),
(20, 2, 'Saudagar_Langit.jpg', 'saudagar langit.pdf', 'saudagar langit', 'saudagar-langit', 'ahmad', 'Elex Media Komputindo', '2017-03-02', 'Sekali duduk, Abdurrahman bin Auf mengeluarkan sedekah 64 miliar. Umar bin Khattab\r\nmenerima passive income 2,8 triliun per tahun dari bisnis properti. Ustman bin Affan\r\nmewariskan properti sepanjang wilayah Aris dan Khaibar.', '2', 10, 0, 10),
(21, 3, 'Buku_Interaktif_Bahasa_Inggris_untuk_SMAMASMKMAK_Kelas_10_Semester_2.jpg', 'Buku Interaktif Bahasa Inggris untuk SMA_MA_SMK_MAK Kelas 10 Semester 2.pdf', 'Buku Interaktif Bahasa Inggris untuk SMA/MA/SMK/MAK Kelas 10 Semester 2', 'buku-interaktif-bahasa-inggris-untuk-sma/ma/smk/mak-kelas-10-semester-2', 'yuniarti dwi arini', 'intan pariwara', '2022-12-05', 'Dunia berubah sangat cepat. Semua lini kehidupan, termasuk dunia pendidikan, terkena imbasnya. Oleh karena itu, semua, termasuk buku pelajaran dan faktor-faktor pendukungnya, juga harus berubah untuk menyesuaikan diri. Dengan demikian, semua bisa berjalan selaras dan seimbang untuk mencapai tujuan optimal. ', '3', 10, 0, 10),
(22, 3, 'Buku_Interakti_Bahasa_Indonesia_Untuk_SMAMA_Kelas_11_Edisi_Revisi.jpg', 'Buku Interaktif_ Bahasa Indonesia Untuk SMA_MA Kelas 11 Edisi Revisi.pdf', 'Buku Interaktif:Bahasa Indonesia Untuk SMA/MA Kelas 11 Edisi Revisi', 'buku-interaktif:bahasa-indonesia-untuk-sma/ma-kelas-11-edisi-revisi', 'Raden Dwi Gita Apriliyani', 'PT PENERBIT INTAN PARIWARA', '2021-06-06', 'Terasa lamakah Anda belajar dari rumah selama pandemi? Anda terbiasa belajar daring, belajar dengan model PJJ, dan belajar melalui teleconference (Zoom atau Google Meet). Melalui cara belajar ini, sungguh cakap Anda mengoperasikan peranti belajar, seperti telepon genggam, komputer, dan laptop. ', '3', 10, 0, 10),
(23, 3, 'Buku_Mandiri_Matematika_Peminatan_Kurikulum_2013_SMA_MA_Kelas_12.jpg', 'Buku Mandiri Matematika Peminatan Kurikulum 2013 SMA_MA Kelas 12.pdf', 'Buku Mandiri Matematika Peminatan Kurikulum 2013 SMA/MA Kelas 12', 'buku-mandiri-matematika-peminatan-kurikulum-2013-sma/ma-kelas-12', 'M.ikhwan', 'Perbit Erlangga', '2021-06-18', 'Buku Seri Soal MANDIRI (Mengasah Kemampuan Diri) Matematika ini sangat ideal bagi pelengkap dan pendamping buku Matematika SMA/MA Kelompok Peminatan Matematika dan Ilmu-Ilmu Alam. Sebagai buku soal, buku ini didesain khusus agar siswa dapat mengasah kompetensi diri secara mandiri. ', '3', 10, 0, 10),
(24, 3, 'buku_prisma_tematik.jpg', 'Buku Prisma Tematik Superkomplet untuk SD Kelas 2.pdf', 'Buku Prisma Tematik Superkomplet untuk SD Kelas 2', 'buku-prisma-tematik-superkomplet-untuk-sd-kelas-2', 'tim sahabat literasi', 'CHASISSA PUBLISHING', '2020-07-13', 'Buku pelajaran atau buku teks menjadi salah satu komponen utama dalam kegiatan belajar mengajar. Buku teks ini berperan sebagai bahan ajar atau media instruksional yang dominan selama kegiatan belajar mengajar berlangsung. ', '3', 10, 0, 10),
(25, 3, 'Buku_Teks_Pendamping_Sejarah_Indonesia_Jilid_3_K_13_SMA_MA_SMK_MAK_Kelas_XII.jpg', 'Buku Teks Pendamping Sejarah Indonesia Jilid 3 K_13 SMA_MA_SMK-MAK Kelas XII.pdf', 'Buku Teks Pendamping Sejarah Indonesia Jilid 3 K:13 SMA/MA/SMK-MAK Kelas XII', 'buku-teks-pendamping-sejarah-indonesia-jilid-3-k:13-sma/ma/smk-mak-kelas-xii', 'ADITYA WISHNU WARDHANA', 'yrama widya', '2022-07-09', 'Bagi anda yang sedang mencari buku pelajaran Sejarah Indonesia untuk kelas 12, maka buku ini merupakan pilihan yang tepat. Buku Sejarah Indonesia untuk Siswa SMA-MA/SMK-MAK ini merupakan buku siswa berdasarkan implementasi Kurikulum 2013 Edisi Revisi.', '3', 10, 0, 10),
(26, 3, 'Pendalaman_Buku_Teks_Ekonomi_SMA_Kelas_12_Kurikulum_2013_Revisi.jpg', 'Pendalaman Buku Teks Ekonomi SMA Kelas 12 Kurikulum 2013 Revisi.pdf', 'Pendalaman Buku Teks Ekonomi SMA Kelas 12 Kurikulum 2013 Revisi', 'pendalaman-buku-teks-ekonomi-sma-kelas-12-kurikulum-2013-revisi', 'eri kasman', 'Pt yudhistira Ghalia Indonesia', '2018-04-01', 'Ekonomi berasal dari bahasa Yunani, oikos yang berarti rumah tangga atau keluarga. Ilmu Ekonomi berarti ilmu yang membahas segala perilaku manusia yang berkaitan dengan aktivitas produksi, distribusi, dan konsumsi terhadap produk barang dan jasa. Pelajaran Ilmu Ekonomi di jenjang SMA/MA pasti akan diampu oleh siswa yang mengambil jurusan Ilmu Sosial.', '3', 10, 0, 10),
(27, 3, 'Pendalaman_Buku_Teks_Kimia_Jilid_1A_SMA_Kelas_10_Kurikulum_2013_Revisi.jpg', 'Pendalaman Buku Teks Kimia Jilid 1A SMA Kelas 10 Kurikulum 2013 Revisi.pdf', 'Pendalaman Buku Teks Kimia Jilid 1A SMA Kelas 10 Kurikulum 2013 Revisi', 'pendalaman-buku-teks-kimia-jilid-1a-sma-kelas-10-kurikulum-2013-revisi', 'Abdul haris w', 'Pt yudhistira Ghalia indonesia', '2018-02-01', 'Materi pelajaran kimia mendetail secara eksklusif mulai diberikan di jenjang SMA, utamanya bagi siswa pada konsentrasi jurusan MIPA. Konsep pelajaran kimia yang diajarkan pada siswa di mulai pengenalan dasar sifat-sifat kimia dan tentunya istilah-istilah lainnya yang akan sering muncul. Semakin tinggi jenjang kelas tentu akan semakin rumit bahasan konsep kimia yang diajarkan.', '3', 10, 0, 10),
(28, 3, 'PPKN_2b_kls_XI.jpg', 'Pendalaman Buku Teks PPKn untuk SMA Kelas 11 Jilid 2B.pdf', 'Pendalaman Buku Teks PPKn untuk SMA Kelas 11 Jilid 2B', 'pendalaman-buku-teks-ppkn-untuk-sma-kelas-11-jilid-2b', 'niken yuliasih dkk.', 'Yudhistira Ghalia Indonesia', '2018-06-18', 'Buku pelajaran atau buku teks menjadi salah satu komponen utama dalam kegiatan belajar mengajar. Buku teks ini berperan sebagai bahan ajar atau media instruksional yang dominan selama kegiatan belajar mengajar berlangsung. Dengan kata lain, buku itu berguna untuk menyampaikan materi yang ditentukan oleh kurikulum.', '3', 10, 0, 10),
(29, 3, 'Prinsip_Prinsip_Manajemen_Keuangan_Buku_1_Edisi_13.jpg', 'Prinsip-Prinsip Manajemen Keuangan Buku 1 Edisi 13.pdf', 'Prinsip-Prinsip Manajemen Keuangan Buku 1 Edisi 13', 'prinsip-prinsip-manajemen-keuangan-buku-1-edisi-13', 'JamesC. Van Horne', 'salemba empat', '2012-02-12', 'Apakah Anda ingin memahami bagaimana keputusan keuangan dapat berpengaruh terhadap nilai sebuah perusahaan? Jika manajemen keuangan merupakan hal yang baru bagi Anda atau Anda sedang belajar untuk mencapai suatu kualifikasi profesi tertentu, ini adalah buku pelajaran yang membantu Anda dapat memahami tantangan di dunia bisnis dengan mudah pada saat ini yang terus berubah dengan cepat.', '3', 10, 0, 10),
(30, 3, 'Sma_Buku_Interaktif_Kl.10_Ilmu_Pengetahuan_Sosial_Thn.202.jpg', 'SMA_MA Buku Interaktif Kelas 10 Ilmu Pengetahuan Sosial Thn.2022.pdf', 'SMA/MA Buku Interaktif Kelas 10 Ilmu Pengetahuan Sosial Thn.2022', 'sma/ma-buku-interaktif-kelas-10-ilmu-pengetahuan-sosial-thn.2022', 'Nova Tri Pamungkas', 'PT PENERBIT INTAN PARIWARA', '2023-01-28', 'Dr. Benson Soong, pakar pendidikan lulusan Cambridge University adalah salah satu pendiri platform Jelajah Ilmu dan pedagogy adviser Penerbit Intan Pariwara.', '3', 10, 0, 10),
(31, 4, 'Attitude-Is-Everything-Sikap-Mental-Adalah-Segalanya.jpg', 'attitude is everything.pdf', 'attitude is everything', 'attitude-is-everything', 'jeff keller', 'renebook', '2022-11-17', '“Penemuan terbesar generasi saya adalah bahwa manusia dapat mengubah hidupnya dengan mengubah sikap mentalnya.” — William James, sejarawan dan psikolog', '4', 10, 0, 10),
(32, 4, 'Il-Principe-( Sang Pangeran )-Buku-Pedoman-Para-Diktator.jpg', 'il principe.pdf', 'il principle', 'il-principle', 'niccolo machiavelli', 'narasi', '2021-01-23', 'Sinopsis Niccolo Machiavelli dilahirkan di Florence, Italia, pada tahun 1469. Ia sempat dipecat, ditahan, dan disiksa karena dituduh berkomplot melawan penguasa Medici. ', '4', 10, 0, 10),
(33, 4, 'LAWS-OF-HUMAN-NATURE.jpg', 'LAWS OF HUMAN NATURE.pdf', 'LAWS OF HUMAN NATURE', 'laws-of-human-nature', 'robert greene', 'penguin Us', '2018-10-16', 'Buku ini memberikan wawasan dan nasihat yang berharga. Hal ini kompleks sekaligus kontradiktif. Penulis menggali jauh ke dalam kisah hidup individu terpilih yang telah mencapai puncak karier mereka. Menyaring esensi dari sifat mereka dan merangkum tindakan yang perlu dilakukan seseorang.', '4', 10, 0, 10),
(34, 4, 'rich-dad-poor-dad-.jpg', 'Rich Dad Poor Dad.pdf', 'rich dad poor dad', 'rich-dad-poor-dad', 'robert t.kiyosaki', 'Gramedia Pustaka Media', '2016-08-22', 'Rich Dad Poor Dad akan:\r\n•Menghancurkan mitos “Anda perlu memiliki penghasilan tinggi agar bisa kaya”\r\n•Menantang keyakinan bahwa rumah Anda adalah asset\r\n•Menunjukkan kepada orangtua kenapa mereka tidak bisa mengandalkan sistem pendidikan untuk mengajari anak mereka tentang uang\r\n•Mendefinisikan aset dan liabilitas secara jelas', '4', 10, 0, 10),
(35, 4, 'Strategi-Perang-Digital-Marketing.jpg', 'Strategi Perang Digital Marketing.pdf', 'strategi perang digital marketing', 'strategi-perang-digital-marketing', 'tom liwafa', 'Elex Media komputindo', '2024-02-28', '\"Strategi Perang Digital Marketing\" adalah panduan komprehensif bagi para pedagang UMKM yang ingin bertransformasi menjadi miliarder dengan membangun personal branding yang tangguh di era digital. ', '4', 10, 0, 10),
(36, 4, 'The-Charisma-Myth.jpg', 'The Charisma Myth.pdf', 'the charisma myth', 'the-charisma-myth', 'olivia fox cabane', 'renebook', '2024-01-11', '“Selagi kita butuh menampilkan sisi terbaik diri, memperkuat kemampuan memimpin, sekaligus kekuatan memengaruhi orang lain (secara positif, tentu saja!), maka buku ini adalah pilihan yang tepat!”\r\n–Rizqiani Putri, CEO Sinergi Bicara dan Communication Lecturer\r\n', '4', 10, 0, 10),
(37, 4, 'The-Kremlin-School-of-Negotiation.jpg', 'The Kremlin School of Negotiation.pdf', 'the kremlin school of negotiation', 'the-kremlin-school-of-negotiation', 'igor ryzov', 'gemilang', '2023-04-09', 'Apa yang dimaksud dengan negosiasi-sebuah ilmu, atau seni? Banyak yang akan berpendapat bahwa, tentu saja, negosiasi adalah sebuah ilmu: apalagi, negosiasi memiliki hukum yang jelas, sistem dan metode halus yang, begitu dikuasai, memberi Anda segala hal yang Anda butuhkan untuk menjadi negosiator yang baik. Benar, hal tersebut memang tak diragukan lagi.', '4', 10, 0, 10),
(38, 4, 'the-miracle-of-hypnotic-persuasion.jpg', 'The Miracle of Hypnotic Persuasion.pdf', 'the miracle of hypnotic persuasion', 'the-miracle-of-hypnotic-persuasion', 'IDRUS PUTRA', 'media pressindo', '2022-03-10', 'Selama ini banyak orang yang beranggapan bahwa belajar Teknik Komunikasi itu tidaklah mudah, dalam buku ini “The Miracle of Conversational Hypnosis” pembaca akan dibuat mengerti dengan mudah tentang teknik komunikasi. ', '4', 10, 0, 10),
(39, 4, 'The-Psychology-of-Money-Edisi-Revisi.jpg', 'The Psychology of Money Edisi Revisi.pdf', 'The Psychology of Money Edisi Revisi', 'the-psychology-of-money-edisi-revisi', 'JASON ZWEIG', 'Baca', '2024-02-02', 'Kesuksesan dalam mengelola uang tidak selalu tentang apa yang Anda ketahui. Ini tentang bagaimana Anda berperilaku. Dan perilaku sulit untuk diajarkan, bahkan kepada orang yang sangat pintar sekalipun. Seorang genius yang kehilangan kendali atas emosinya bisa mengalami bencana keuangan. Sebaliknya, orang biasa tanpa pendidikan finansial bisa kaya jika mereka punya sejumlah keahlian terkait perilaku yang tak berhubungan dengan ukuran kecerdasan formal.', '4', 10, 0, 10),
(40, 4, 'The-Secret-Of-Personal-Magnetism.jpg', 'The Secret Of Personal Magnetism.pdf', 'The Secret Of Personal Magnetism', 'the-secret-of-personal-magnetism', 'THERON Q. DUMONT', 'shira media', '2022-11-23', 'DALAM KARYA SAYA SEBELUMNYA, The Art and Science of Personal Magnetism, saya memaparkan prinsip dan aturan dasar pengembangan kekuatan dan pengaruh pribadi.', '4', 10, 0, 10),
(41, 5, '7_in_1_Pemrograman_Web_untuk_Pemula_(Update_Version).jpg', '7 in 1 Pemrograman Web untuk Pemula (Update Version).pdf', '7 in 1 Pemrograman Web untuk Pemula (Update Version)', '7-in-1-pemrograman-web-untuk-pemula-(update-version)', 'rohi abdulloh', 'Elex Media komputindo', '2023-05-23', 'Teknologi pemrograman web terus berkembang begitu cepat. Bagi pemula, tentu akan sangat tertinggal jika tidak cepat mengejar. Buku ini membahas 7 materi pemrograman web sekaligus yang menjadi materi utama dalam mempelajari pemrograman web. Dengan demikian, akan sangat membantu pemula yang ingin menguasai pemrograman web untuk mengejar ketertinggalanya dan menjadi web programmer dalam waktu singkat.', '5', 10, 0, 10),
(42, 5, 'Algoritma_&_Pemrograman_Implementasi_dengan_Python_pada_Google_Colab.jpg', 'Algoritma & Pemrograman Implementasi dengan Python pada Google Colab.pdf', 'Algoritma & Pemrograman Implementasi dengan Python pada Google Colab', 'algoritma-&-pemrograman-implementasi-dengan-python-pada-google-colab', 'falahah,s.si.,m.t', 'Pt Remaja Rosdakarya', '2023-09-06', 'Algoritma dan pemrograman merupakan mata kuliah wajib bagi mahasiswa pada program studi rumpun informatika.', '5', 10, 0, 10),
(43, 5, 'Belajar_Pemrograman_Web_untuk_Pemula.jpg', 'Belajar Pemrograman Web untuk Pemula.pdf', 'Belajar Pemrograman Web untuk Pemula', 'belajar-pemrograman-web-untuk-pemula', 'kristianto haryodi', 'Anak Hebat Indonesia', '2023-01-15', 'Buku ini adalah panduan praktis untuk pemula yang ingin belajar pengembangan web. Dalam buku ini Anda akan diperkenalkan pada konsep dasar pemrograman web melalui pendekatan 7 in 1 pemrograman web untuk pemula.', '5', 10, 0, 10),
(44, 5, 'Langkah_Mudah_Belajar_Pemrograman_C++_untuk_Pemula.jpg', 'Langkah Mudah Belajar Pemrograman C++ untuk Pemula.pdf', 'Langkah Mudah Belajar Pemrograman C++ untuk Pemula', 'langkah-mudah-belajar-pemrograman-c++-untuk-pemula', 'nabila chairunnisa, s.kom', 'Anak Hebat Indonesia', '2024-08-12', 'Buku ini dirancang untuk membantu pembaca memahami konsep dasar dan lanjutan dalam pemrograman menggunakan bahasa C++. Melalui buku ini, pembaca dari dasar hingga mampu mengimplementasikan algoritma kompleks dengan menggunakan C++.', '5', 10, 0, 10),
(45, 5, 'Langkah_Mudah_Belajar_Pemrograman_Scratch_untuk_Pemula.jpg', 'Langkah Mudah Belajar Pemrograman Scratch untuk Pemula.pdf', 'Langkah Mudah Belajar Pemrograman Scratch untuk Pemula', 'langkah-mudah-belajar-pemrograman-scratch-untuk-pemula', 'Abdul kadir', 'Elex Media komputindo', '2024-02-19', 'Scratch dikenal sebagai pelopor bahasa pemrograman berbasis blok untuk anak-anak dan remaja. Tujuannya adalah agar program komputer dapat dipelajari dengan cara yang cepat, mudah, dan menyenangkan. Buku ini mengenalkan dunia pemrograman komputer untuk anak-anak dan remaja dan dilengkapi dengan banyak contoh dan penjelasan yang mudah dimengerti. ', '5', 10, 0, 10),
(46, 5, 'Langkah_Mudah_Belajar_Pemrograman_WEB_dengan_HTML_CSS_&_Javascript_untuk_Pemula.jpg', 'Langkah Mudah Belajar Pemrograman WEB dengan HTML, CSS & Javascript untuk Pemula.pdf', 'Langkah Mudah Belajar Pemrograman WEB dengan HTML, CSS & Javascript untuk Pemula', 'langkah-mudah-belajar-pemrograman-web-dengan-html,-css-&-javascript-untuk-pemula', 'ahmad istakim', 'Anak Hebat Indonesia', '2024-06-11', 'Buku ini adalah panduan esensial bagi siapa saja yang ingin memulai perjalanan mereka dalam dunia pengembangan web.', '5', 10, 0, 10),
(47, 5, 'Pemrograman_Python_Komplet.jpg', 'Pemrograman Python Komplet.pdf', 'Pemrograman Python Komplet', 'pemrograman-python-komplet', 'jubilee enterprise', 'Elex Media komputindo', '2024-08-27', 'Buku “Pemrograman Python Komplet” ini dapat dibaca bagi mereka yang memiliki pengalaman nol sampai mahir tentang pemrograman Python. ', '5', 10, 0, 10),
(48, 5, 'Python_Implementasi_Algoritma_Kompleks_dalam_Era_Industri_5.0_dan_Society_5.0.jpg', 'Python_Implementasi Algoritma Kompleks dalam Era Industri 5.0 dan Society 5.0.pdf', 'Python:Implementasi Algoritma Kompleks dalam Era Industri 5.0 dan Society 5.0', 'python:implementasi-algoritma-kompleks-dalam-era-industri-5.0-dan-society-5.0', 'I Gus Ngurah Suryantara', 'Elex Media komputindo', '2024-09-23', 'Algoritma kompleks adalah serangkaian langkah terstruktur yang dirancang untuk memecahkan masalah yang rumit dan sulit. Ketika masalah yang dihadapi tidak dapat diselesaikan dengan pendekatan sederhana, pemahaman tentang algoritma kompleks menjadi sangat penting. Algoritma ini memungkinkan kita untuk menangani masalah berskala besar, mengurangi waktu eksekusi, dan memaksimalkan efisiensi sumber daya.', '5', 10, 0, 10),
(49, 5, 'Semua_Bisa_Menjadi_Programmer_Node_js_Basic.jpg', 'Semua Bisa Menjadi Programmer Node.js Basic.pdf', 'Semua Bisa Menjadi Programmer Node.js Basic', 'semua-bisa-menjadi-programmer-node.js-basic', 'ir.yuniar supardi', 'Elex Media komputindo', '2024-07-04', 'Buku yang akan memandu Anda untuk belajar Node.js dari dasar hingga program database dengan mudah dan sistematik. Node.js merupakan program skrip server untuk JavaScript. Node.js digunakan oleh pengembang pengguna Bahasa JavaScript untuk dapat membuat skrip web, baik untuk sisi klien dan server.', '5', 10, 0, 10),
(50, 5, 'Semua_Bisa_Menjadi_Programmer_Web_PHP_Basic.jpg', 'Semua Bisa Menjadi Programmer Web PHP Basic.pdf', 'Semua Bisa Menjadi Programmer Web PHP Basic', 'semua-bisa-menjadi-programmer-web-php-basic', 'IR. Yuniar Supardi', 'Elex Media komputindo', '2024-05-17', 'Buku Semua Bisa Menjadi Programmer Web PHP Basic ini merupakan buku memandu Anda dalam belajar PHP dari dasar hingga program memakai database MySQL serta membuat web nilai. Bahasa skrip PHP merupakan bahasa skrip yang paling banyak komunitasnya di dunia, dengan belajar PHP Anda akan lebih mudah mencari skrip-skrip yang berhubungan dengan PHP di internet. ', '5', 10, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Komik'),
(2, 'Novel'),
(3, 'Pelajaran'),
(4, 'Keterampilan'),
(5, 'Pemograman');

-- --------------------------------------------------------

--
-- Table structure for table `koleksi`
--

CREATE TABLE `koleksi` (
  `id_koleksi` int NOT NULL,
  `user_id` int NOT NULL,
  `buku_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int NOT NULL,
  `user_id` int NOT NULL,
  `buku_id` int NOT NULL,
  `trid` varchar(10) NOT NULL,
  `total_buku_dipinjam` int NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `status_pengembalian` enum('Dipinjam','Dikembalikan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int NOT NULL,
  `user_id` int NOT NULL,
  `buku_id` int NOT NULL,
  `trid` varchar(10) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status_pengembalian` enum('Dipinjam','Dikembalikan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int NOT NULL,
  `user_id` int NOT NULL,
  `buku_id` int NOT NULL,
  `ulasan` text NOT NULL,
  `rating` enum('1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `level` enum('Admin','Petugas','Peminjam') NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `reference_table_kategori` (`kategori_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `koleksi`
--
ALTER TABLE `koleksi`
  ADD PRIMARY KEY (`id_koleksi`),
  ADD KEY `reference_table_user` (`user_id`),
  ADD KEY `reference_table_buku` (`buku_id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `reference_table_user` (`user_id`),
  ADD KEY `reference_table_buku` (`buku_id`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `reference_table_user` (`user_id`),
  ADD KEY `reference_table_buku` (`buku_id`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `reference_table_user` (`user_id`),
  ADD KEY `reference_table_buku` (`buku_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `koleksi`
--
ALTER TABLE `koleksi`
  MODIFY `id_koleksi` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `kategori_buku` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `koleksi`
--
ALTER TABLE `koleksi`
  ADD CONSTRAINT `koleksi_buku` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id_buku`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `koleksi_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjam_buku` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id_buku`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `peminjam_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_buku` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id_buku`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `pengembalian_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_buku` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id_buku`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ulasan_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;