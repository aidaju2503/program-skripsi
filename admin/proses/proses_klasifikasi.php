 <?php

 	include('../../koneksi.php');

 	$id_film  = $_POST['id_film'];
    $komentar = $_POST['komentar'];

    // simpan ke tabel tb_data_uji
    $simpan = mysqli_query($koneksi,"INSERT INTO tb_data_uji (id_film, data_uji) VALUES('$id_film', '$komentar')")or die (mysqli_error($koneksi));

 	$hapus = mysqli_query($koneksi,"TRUNCATE tb_tf_idf_uji");
 	$hapus = mysqli_query($koneksi,"TRUNCATE tb_cosine_similarity");

 	class Filtering{
	 	private $stopwords = array("ada", "adalah", "adanya", "adapun", "agak", "agaknya", "agar", "akan", "akankah", "akhir", "akhiri", "akhirnya", "aku", "akulah", "amat", "amatlah", "anda", "andalah", "antar", "antara", "antaranya", "apa", "apaan", "apabila", "apakah", "apalagi", "apatah", "artinya", "asal", "asalkan", "atas", "atau", "ataukah", "ataupun", "awal", "awalnya", "bagai", "bagaikan", "bagaimana", "bagaimanakah", "bagaimanapun", "bagi", "bagian", "bahkan", "bahwa", "bahwasanya", "baik", "bakal", "bakalan", "balik", "banyak", "bapak", "baru", "bawah", "beberapa", "begini", "beginian", "beginikah", "beginilah", "begitu", "begitukah", "begitulah", "begitupun", "bekerja", "belakang", "belakangan", "belum", "belumlah", "benar", "benarkah", "benarlah", "berada", "berakhir", "berakhirlah", "berakhirnya", "berapa", "berapakah", "berapalah", "berapapun", "berarti", "berawal", "berbagai", "berdatangan", "beri", "berikan", "berikut", "berikutnya", "berjumlah", "berkali-kali", "berkata", "berkehendak", "berkeinginan", "berkenaan", "berlainan", "berlalu", "berlangsung", "berlebihan", "bermacam", "bermacam-macam", "bermaksud", "bermula", "bersama", "bersama-sama", "bersiap", "bersiap-siap", "bertanya", "bertanya-tanya", "berturut", "berturut-turut", "bertutur", "berujar", "berupa", "besar", "betul", "betulkah", "biasa", "biasanya", "bila", "bilakah", "bisa", "bisakah", "boleh", "bolehkah", "bolehlah", "buat", "bukan", "bukankah", "bukanlah", "bukannya", "bulan", "bung", "cara", "caranya", "cukup", "cukupkah", "cukuplah", "cuma", "dahulu", "dalam", "dan", "dapat", "dari", "daripada", "datang", "dekat", "demi", "demikian", "demikianlah", "dengan", "depan", "di", "dia", "diakhiri", "diakhirinya", "dialah", "diantara", "diantaranya", "diberi", "diberikan", "diberikannya", "dibuat", "dibuatnya", "didapat", "didatangkan", "digunakan", "diibaratkan", "diibaratkannya", "diingat", "diingatkan", "diinginkan", "dijawab", "dijelaskan", "dijelaskannya", "dikarenakan", "dikatakan", "dikatakannya", "dikerjakan", "diketahui", "diketahuinya", "dikira", "dilakukan", "dilalui", "dilihat", "dimaksud", "dimaksudkan", "dimaksudkannya", "dimaksudnya", "diminta", "dimintai", "dimisalkan", "dimulai", "dimulailah", "dimulainya", "dimungkinkan", "dini", "dipastikan", "diperbuat", "diperbuatnya", "dipergunakan", "diperkirakan", "diperlihatkan", "diperlukan", "diperlukannya", "dipersoalkan", "dipertanyakan", "dipunyai", "diri", "dirinya", "disampaikan", "disebut", "disebutkan", "disebutkannya", "disini", "disinilah", "ditambahkan", "ditandaskan", "ditanya", "ditanyai", "ditanyakan", "ditegaskan", "ditujukan", "ditunjuk", "ditunjuki", "ditunjukkan", "ditunjukkannya", "ditunjuknya", "dituturkan", "dituturkannya", "diucapkan", "diucapkannya", "diungkapkan", "dong", "dua", "dulu", "empat", "enggak", "enggaknya", "entah", "entahlah", "guna", "gunakan", "hal", "hampir", "hanya", "hanyalah", "hari", "harus", "haruslah", "harusnya", "hendak", "hendaklah", "hendaknya", "hingga", "ia", "ialah", "ibarat", "ibaratkan", "ibaratnya", "ibu", "ikut", "ingat", "ingat-ingat", "ingin", "inginkah", "inginkan", "ini", "inikah", "inilah", "itu", "itukah", "itulah", "jadi", "jadilah", "jadinya", "jangan", "jangankan", "janganlah", "jauh", "jawab", "jawaban", "jawabnya", "jelas", "jelaskan", "jelaslah", "jelasnya", "jika", "jikalau", "juga", "jumlah", "jumlahnya", "justru", "kala", "kalau", "kalaulah", "kalaupun", "kalian", "kami", "kamilah", "kamu", "kamulah", "kan", "kapan", "kapankah", "kapanpun", "karena", "karenanya", "kasus", "kata", "katakan", "katakanlah", "katanya", "ke", "keadaan", "kebetulan", "kecil", "kedua", "keduanya", "keinginan", "kelamaan", "kelihatan", "kelihatannya", "kelima", "keluar", "kembali", "kemudian", "kemungkinan", "kemungkinannya", "kenapa", "kepada", "kepadanya", "kesampaian", "keseluruhan", "keseluruhannya", "keterlaluan", "ketika", "khususnya", "kini", "kinilah", "kira", "kira-kira", "kiranya", "kita", "kitalah", "kok", "kurang", "lagi", "lagian", "lah", "lain", "lainnya", "lalu", "lama", "lamanya", "lanjut", "lanjutnya", "lebih", "lewat", "lima", "luar", "macam", "maka", "makanya", "makin", "malah", "malahan", "mampu", "mampukah", "mana", "manakala", "manalagi", "masa", "masalah", "masalahnya", "masih", "masihkah", "masing", "masing-masing", "mau", "maupun", "melainkan", "melakukan", "melalui", "melihat", "melihatnya", "memang", "memastikan", "memberi", "memberikan", "membuat", "memerlukan", "memihak", "meminta", "memintakan", "memisalkan", "memperbuat", "mempergunakan", "memperkirakan", "memperlihatkan", "mempersiapkan", "mempersoalkan", "mempertanyakan", "mempunyai", "memulai", "memungkinkan", "menaiki", "menambahkan", "menandaskan", "menanti", "menanti-nanti", "menantikan", "menanya", "menanyai", "menanyakan", "mendapat", "mendapatkan", "mendatang", "mendatangi", "mendatangkan", "menegaskan", "mengakhiri", "mengapa", "mengatakan", "mengatakannya", "mengenai", "mengerjakan", "mengetahui", "menggunakan", "menghendaki", "mengibaratkan", "mengibaratkannya", "mengingat", "mengingatkan", "menginginkan", "mengira", "mengucapkan", "mengucapkannya", "mengungkapkan", "menjadi", "menjawab", "menjelaskan", "menuju", "menunjuk", "menunjuki", "menunjukkan", "menunjuknya", "menurut", "menuturkan", "menyampaikan", "menyangkut", "menyatakan", "menyebutkan", "menyeluruh", "menyiapkan", "merasa", "mereka", "merekalah", "merupakan", "meski", "meskipun", "meyakini", "meyakinkan", "minta", "mirip", "misal", "misalkan", "misalnya", "mula", "mulai", "mulailah", "mulanya", "mungkin", "mungkinkah", "nah", "naik", "namun", "nanti", "nantinya", "nyaris", "nyatanya", "oleh", "olehnya", "pada", "padahal", "padanya", "pak", "paling", "panjang", "pantas", "para", "pasti", "pastilah", "penting", "pentingnya", "per", "percuma", "perlu", "perlukah", "perlunya", "pernah", "persoalan", "pertama", "pertama-tama", "pertanyaan", "pertanyakan", "pihak", "pihaknya", "pukul", "pula", "pun", "punya", "rasa", "rasanya", "rata", "rupanya", "saat", "saatnya", "saja", "sajalah", "saling", "sama", "sama-sama", "sambil", "sampai", "sampai-sampai", "sampaikan", "sana", "sangat", "sangatlah", "satu", "saya", "sayalah", "se", "sebab", "sebabnya", "sebagai", "sebagaimana", "sebagainya", "sebagian", "sebaik", "sebaik-baiknya", "sebaiknya", "sebaliknya", "sebanyak", "sebegini", "sebegitu", "sebelum", "sebelumnya", "sebenarnya", "seberapa", "sebesar", "sebetulnya", "sebisanya", "sebuah", "sebut", "sebutlah", "sebutnya", "secara", "secukupnya", "sedang", "sedangkan", "sedemikian", "sedikit", "sedikitnya", "seenaknya", "segala", "segalanya", "segera", "seharusnya", "sehingga", "seingat", "sejak", "sejauh", "sejenak", "sejumlah", "sekadar", "sekadarnya", "sekali", "sekali-kali", "sekalian", "sekaligus", "sekalipun", "sekarang", "sekarang", "sekecil", "seketika", "sekiranya", "sekitar", "sekitarnya", "sekurang-kurangnya", "sekurangnya", "sela", "selain", "selaku", "selalu", "selama", "selama-lamanya", "selamanya", "selanjutnya", "seluruh", "seluruhnya", "semacam", "semakin", "semampu", "semampunya", "semasa", "semasih", "semata", "semata-mata", "semaunya", "sementara", "semisal", "semisalnya", "sempat", "semua", "semuanya", "semula", "sendiri", "sendirian", "sendirinya", "seolah", "seolah-olah", "seorang", "sepanjang", "sepantasnya", "sepantasnyalah", "seperlunya", "seperti", "sepertinya", "sepihak", "sering", "seringnya", "serta", "serupa", "sesaat", "sesama", "sesampai", "sesegera", "sesekali", "seseorang", "sesuatu", "sesuatunya", "sesudah", "sesudahnya", "setelah", "setempat", "setengah", "seterusnya", "setiap", "setiba", "setibanya", "setidak-tidaknya", "setidaknya", "setinggi", "seusai", "sewaktu", "siap", "siapa", "siapakah", "siapapun", "sini", "sinilah", "soal", "soalnya", "suatu", "sudah", "sudahkah", "sudahlah", "supaya", "tadi", "tadinya", "tahu", "tahun", "tak", "tambah", "tambahnya", "tampak", "tampaknya", "tandas", "tandasnya", "tanpa", "tanya", "tanyakan", "tanyanya", "tapi", "tegas", "tegasnya", "telah", "tempat", "tengah", "tentang", "tentu", "tentulah", "tentunya", "tepat", "terakhir", "terasa", "terbanyak", "terdahulu", "terdapat", "terdiri", "terhadap", "terhadapnya", "teringat", "teringat-ingat", "terjadi", "terjadilah", "terjadinya", "terkira", "terlalu", "terlebih", "terlihat", "termasuk", "ternyata", "tersampaikan", "tersebut", "tersebutlah", "tertentu", "tertuju", "terus", "terutama", "tetap", "tetapi", "tiap", "tiba", "tiba-tiba", "tidak", "tidakkah", "tidaklah", "tiga", "tinggi", "toh", "tunjuk", "turut", "tutur", "tuturnya", "ucap", "ucapnya", "ujar", "ujarnya", "umum", "umumnya", "ungkap", "ungkapnya", "untuk", "usah", "usai", "waduh", "wah", "wahai", "waktu", "waktunya", "walau", "walaupun", "wong", "yaitu", "yakin", "yakni", "yang");

	 	public function filter($id, $kata){
	 		$filter = str_word_count($kata, 1);
	        array_walk($filter, array(
	           $this,
	           'filter'
	        ));
	        $filter = array_diff($filter, $this->stopwords);
	        $wordCount = array_count_values($filter);
	        arsort($wordCount);

	        $jumlah = count($wordCount);
	        foreach ($wordCount as $hasil_kata=>$hasil) 
	        {
	  		     return $hasil_kata;
	        }
	 	}

 	}


 	include "stemming.php"; //memanggil file dari luar file ini
 	$jalankan = new Filtering();

 	$data = mysqli_query($koneksi,"SELECT * FROM tb_data_training order by id desc");
 	//jumlah data training
 	$jumlah_data_training = mysqli_num_rows($data);

    
	$komentar = $_POST['komentar'];

	//rubah alfabet besar menjadi kecil CASE FOLDING
	$komentar = strtolower($komentar);

	//hilangkan tanda baca
    $komentar = str_replace("'", " ", $komentar);	 
    $komentar = str_replace("-", " ", $komentar);	 
    $komentar = str_replace(")", " ", $komentar);	 
    $komentar = str_replace("(", " ", $komentar);	 	    
    $komentar = str_replace("\"", " ", $komentar);	 
    $komentar = str_replace("/", " ", $komentar);	 
    $komentar = str_replace("=", " ", $komentar);	 
    $komentar = str_replace(".", " ", $komentar);	 
    $komentar = str_replace(",", " ", $komentar);	 
    $komentar = str_replace(":", " ", $komentar);	 
    $komentar = str_replace(";", " ", $komentar);	 
    $komentar = str_replace("!", " ", $komentar);	
   	$komentar = str_replace("?", " ", $komentar);	
  	$komentar = str_replace("`", " ", $komentar);
  	$komentar = str_replace("~", " ", $komentar);
  	$komentar = str_replace("@", " ", $komentar);
  	$komentar = str_replace("#", " ", $komentar);
  	$komentar = str_replace("$", " ", $komentar);
  	$komentar = str_replace("%", " ", $komentar);
  	$komentar = str_replace("^", " ", $komentar);
  	$komentar = str_replace("&", " ", $komentar);
  	$komentar = str_replace("*", " ", $komentar);
  	$komentar = str_replace("_", " ", $komentar);
  	$komentar = str_replace("+", " ", $komentar);
  	$komentar = str_replace("[", " ", $komentar);
  	$komentar = str_replace("]", " ", $komentar);
  	$komentar = str_replace("<", " ", $komentar);
  	$komentar = str_replace(">", " ", $komentar);

// Proses Tokenisasi
  	$kata = str_word_count($komentar, 1);
  	foreach ($kata as $key=>$hasil_kata)
  	{
  		//proses stopwords removal
		$kata = $jalankan->filter(1, $hasil_kata);
		if($kata != ''){
			//hasil dari stemming
			$kata = stemming($kata);

			// proses hitung TF
			// cek dulu di tabel tb_tf_idf
			$simpan     = mysqli_query($koneksi,"SELECT kata FROM tb_tf_idf_uji WHERE kata = '$kata'")or die (mysqli_error($koneksi));
			$total_kata = mysqli_num_rows($simpan); 

			if($total_kata == 0){
				$simpan = mysqli_query($koneksi,"INSERT INTO tb_tf_idf_uji (kata, jumlah) VALUES('$kata', 1)")or die (mysqli_error($koneksi));
			}else{
				$total_katanya = $total_kata + 1;
				$simpan = mysqli_query($koneksi,"UPDATE tb_tf_idf_uji SET jumlah = $total_katanya WHERE kata = '$kata'")or die (mysqli_error($koneksi));
			}
		}
  	}
   

    // proses hitung IDF

    $ambil_data_tf =  mysqli_query($koneksi,"SELECT * FROM tb_tf_idf_uji ORDER BY id");
	while($row = mysqli_fetch_array($ambil_data_tf))
	{	
	    $id   = $row['id'];
	    $kata = $row['kata'];       
	    $tf   = $row['jumlah'];
	           
	    //berapa jumlah dokumen yang mengandung kata tersebut?, N
	    $ambil_kata       = mysqli_query($koneksi,"SELECT Count(*) as N FROM tb_tf_idf  WHERE kata = '$kata'");
	    $row_kata         = mysqli_fetch_array($ambil_kata);
	    $jumlah_kata      = $row_kata['N']; // nilai df
	   
	    //PROSES Hitung TF-IDF
	    //$w = tf * log (n/df)
	    $w      = @($tf * log10($jumlah_data_training/$jumlah_kata));
	    $tf_idf = round($w, 4); //pembulatan 
	   
	    //update bobot dari term tersebut
	    $update =  mysqli_query($koneksi,"UPDATE tb_tf_idf_uji SET tf_idf = $tf_idf WHERE id = $id");             
	}

    // akhir proses hitung TF IDF

	$hasil_dot_product                     = 0;
	$hasil_pemangkatan_bobot_uji           = 0;
	$hasil_pemangkatan_bobot_data_training = 0;
	$array_cosine_similarity = [];

//MANGGIL DATA TRAINING

	$ambil_id_data_training = mysqli_query($koneksi,"SELECT * FROM tb_data_training ORDER BY id")  or die(mysqli_error()); 
    while($row = mysqli_fetch_array($ambil_id_data_training))
	{   
	    $id_data_training = $row['id'];

		$ambil_data_tf_idf_uji = mysqli_query($koneksi,"SELECT * FROM tb_tf_idf_uji ORDER BY id")  or die(mysqli_error()); 
	    while($row = mysqli_fetch_array($ambil_data_tf_idf_uji))
	    {   
	        $id        			   = $row['id'];
	        $kata      			   = $row['kata'];
	        $bobot_uji 			   = $row['tf_idf']; // Bobot data uji

	        $ambil_tf_idf = mysqli_query($koneksi,"SELECT tf_idf FROM tb_tf_idf WHERE kata = '$kata' AND id_data_training = $id_data_training")  or die(mysqli_error()); 
	        while($row     	  = mysqli_fetch_array($ambil_tf_idf))
	        {
	            $bobot_data_training = $row['tf_idf']; // Bobot data_training
	           
	            //hitung Dot Product
	            $dot_product = $bobot_uji * $bobot_data_training; // hitung perkalian antara Bobot uji dan Bobot Data Training
	            $dot_product = round($dot_product, 4);

	            $hasil_dot_product += $dot_product;

	            $pemangkatan_bobot_uji       = $bobot_uji * $bobot_uji;
	            $pemangkatan_bobot_uji       = round($pemangkatan_bobot_uji, 4);
		        $hasil_pemangkatan_bobot_uji += $pemangkatan_bobot_uji;
	        }
	 	}

	 	$ambil_tf_idf = mysqli_query($koneksi,"SELECT tf_idf FROM tb_tf_idf WHERE id_data_training = $id_data_training")  or die(mysqli_error()); 
        while($row    = mysqli_fetch_array($ambil_tf_idf))
        {
            $bobot_data_training = $row['tf_idf']; // Bobot data_training

	        $pemangkatan_bobot_data_training 		= $bobot_data_training * $bobot_data_training;
            $pemangkatan_bobot_data_training 		= round($pemangkatan_bobot_data_training, 4);
	        $hasil_pemangkatan_bobot_data_training += $pemangkatan_bobot_data_training;
        }
	 		//CROSS PRODUCT

        $cross_product = $hasil_pemangkatan_bobot_uji * $hasil_pemangkatan_bobot_data_training;
        $cross_product = round($cross_product, 4);

        $hasil_akar    = sqrt($cross_product);
        $hasil_akar    = round($hasil_akar, 4);

//PERHITUNGAN COSINE SIMILARITY

        $cosine_similarity = @($hasil_dot_product / $hasil_akar);
        $cosine_similarity = round($cosine_similarity, 4);     

        // masukan kedalam array
        // array_push($array_cosine_similarity, $cosine_similarity);

        // simpan ke tabel cosine similarity
        $simpan = mysqli_query($koneksi,"INSERT INTO tb_cosine_similarity (id_data_training, cosine_similarity) VALUES('$id_data_training', '$cosine_similarity')")or die (mysqli_error($koneksi));

	 	$hasil_dot_product                     = 0;
	    $hasil_pemangkatan_bobot_uji 		   = 0;
	    $hasil_pemangkatan_bobot_data_training = 0;
	}

	// $nilai_terbesar = max($array_cosine_similarity);

	//ambil hasil cosine similarity yang terbesar (PERANGKINGAN)
	$ambil_id_data_uji = mysqli_query($koneksi,"SELECT * FROM tb_data_uji ORDER BY id DESC LIMIT 1")  or die(mysqli_error()); 
    while($row    = mysqli_fetch_array($ambil_id_data_uji))
    {
    	$id_data_uji = $row['id'];

//NGAMBIL DATA TERBESAR
		$ambil_hasil_cosine_similarity_terbesar = mysqli_query($koneksi,"SELECT * FROM tb_cosine_similarity ORDER BY cosine_similarity DESC LIMIT 1")  or die(mysqli_error()); 
	    while($row    = mysqli_fetch_array($ambil_hasil_cosine_similarity_terbesar))
	    {
	        $id_data_training  = $row['id_data_training'];
	        $cosine_similarity = $row['cosine_similarity'];

	        //updtae hasil terakhir di tb_data_uji (HASIL SENTIMEN)
	        $update = mysqli_query($koneksi,"UPDATE tb_data_uji SET id_data_training = $id_data_training, cosine_similarity = $cosine_similarity WHERE id = $id_data_uji ")  or die(mysqli_error()); 
	    }
	}

	echo "<script> document.location.href='../hasil_klasifikasi.php?pesan=sukses'; </script>";	

?>