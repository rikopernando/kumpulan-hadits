<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KumpulanHadits;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;


class PencarianHaditsController extends Controller
{
	public function pencarianHadits(Request $request){

		$search = $request->search;
		$search = $this->stopwordRemoval($search); /// stopwordRemoval
		$search = $this->menghilangkanKarakter($search);// TOKENIZING
		$search = title_case($search);
		$jumlah_kata = str_word_count($search);	
		$pisah_kata = explode(" ", $search);

		if ($jumlah_kata >= 3) {
			// misal keyword atau kata kunci yang dimasukan user "Shalat Gerhana Matahari", maka urutan keyword yang akan di cari terlebih dulu adalah seperti dibawah ini
			$keyword_pertama = $pisah_kata[1];
			$keyword_kedua = $pisah_kata[0] . " " . $pisah_kata[1];
			$keyword_ketiga = $pisah_kata[0] . " " . $pisah_kata[2];
			$keyword_keempat = $pisah_kata[1] . " " . $pisah_kata[2];
			$keyword_kelima = $pisah_kata[0];
			$keyword_keenam = $pisah_kata[2];

			$kumpulan_hadits = KumpulanHadits::select('NoHdt','Isi_Indonesia','tipe_hadits','Isi_Arab')->where(function($query) use ($search,$request){
				$query->Where('Isi_Indonesia', 'LIKE', '%'.$search . '%')
				->where(function($query) use ($request){
					$query->orWhere('tipe_hadits',$request->abudaud)
					->orWhere('tipe_hadits',$request->bukhari)
					->orWhere('tipe_hadits',$request->malik)
					->orWhere('tipe_hadits',$request->ahmad);
				});
			})->orWhere(function($query) use ($request,$keyword_pertama){
				$query->orWhere('Isi_Indonesia', 'LIKE', '%'.$keyword_pertama . '%')
				->where(function($query) use ($request){
					$query->orWhere('tipe_hadits',$request->abudaud)
					->orWhere('tipe_hadits',$request->bukhari)
					->orWhere('tipe_hadits',$request->malik)
					->orWhere('tipe_hadits',$request->ahmad);
				});
			})->orWhere(function($query) use ($request,$keyword_kedua){
				$query->orWhere('Isi_Indonesia', 'LIKE', '%'.$keyword_kedua . '%')
				->where(function($query) use ($request){
					$query->orWhere('tipe_hadits',$request->abudaud)
					->orWhere('tipe_hadits',$request->bukhari)
					->orWhere('tipe_hadits',$request->malik)
					->orWhere('tipe_hadits',$request->ahmad);
				});
			})->orWhere(function($query) use ($request,$keyword_ketiga){
				$query->orWhere('Isi_Indonesia', 'LIKE', '%'.$keyword_ketiga . '%')
				->where(function($query) use ($request){
					$query->orWhere('tipe_hadits',$request->abudaud)
					->orWhere('tipe_hadits',$request->bukhari)
					->orWhere('tipe_hadits',$request->malik)
					->orWhere('tipe_hadits',$request->ahmad);
				});
			})->orWhere(function($query) use ($request,$keyword_keempat){
				$query->orWhere('Isi_Indonesia', 'LIKE', '%'.$keyword_keempat . '%')
				->where(function($query) use ($request){
					$query->orWhere('tipe_hadits',$request->abudaud)
					->orWhere('tipe_hadits',$request->bukhari)
					->orWhere('tipe_hadits',$request->malik)
					->orWhere('tipe_hadits',$request->ahmad);
				});
			})->orWhere(function($query) use ($request,$keyword_kelima){
				$query->orWhere('Isi_Indonesia', 'LIKE', '%'.$keyword_kelima . '%')
				->where(function($query) use ($request){
					$query->orWhere('tipe_hadits',$request->abudaud)
					->orWhere('tipe_hadits',$request->bukhari)
					->orWhere('tipe_hadits',$request->malik)
					->orWhere('tipe_hadits',$request->ahmad);
				});
			})->orWhere(function($query) use ($request,$keyword_keenam){
				$query->orWhere('Isi_Indonesia', 'LIKE', '%'.$keyword_keenam . '%')
				->where(function($query) use ($request){
					$query->orWhere('tipe_hadits',$request->abudaud)
					->orWhere('tipe_hadits',$request->bukhari)
					->orWhere('tipe_hadits',$request->malik)
					->orWhere('tipe_hadits',$request->ahmad);
				});
			})->orderByRaw(
				'CASE
				when Isi_Indonesia LIKE "%'.$search.'%" then 1 
				when Isi_Indonesia LIKE "%'.$keyword_pertama.'%" then 2 
				when Isi_Indonesia LIKE "%'.$keyword_kedua.'%" then 3 
				when Isi_Indonesia LIKE "%'.$keyword_ketiga.'%" then 4 
				when Isi_Indonesia LIKE "%'.$keyword_keempat.'%" then 5 
				when Isi_Indonesia LIKE "%'.$keyword_kelima.'%" then 6 
				when Isi_Indonesia LIKE "%'.$keyword_keenam.'%" then 7
				END'
			);

		}else if ($jumlah_kata == 2) {
			
			$keyword_pertama = $pisah_kata[0];
			$keyword_kedua = $pisah_kata[1];

			$kumpulan_hadits = KumpulanHadits::select('NoHdt','Isi_Indonesia','tipe_hadits','Isi_Arab')->where(function($query) use ($search,$request){
				$query->Where('Isi_Indonesia', 'LIKE', '%'.$search . '%')
				->where(function($query) use ($request){
					$query->orWhere('tipe_hadits',$request->abudaud)
					->orWhere('tipe_hadits',$request->bukhari)
					->orWhere('tipe_hadits',$request->malik)
					->orWhere('tipe_hadits',$request->ahmad);
				});
			})->orWhere(function($query) use ($request,$keyword_pertama){
				$query->orWhere('Isi_Indonesia', 'LIKE', '%'.$keyword_pertama . '%')
				->where(function($query) use ($request){
					$query->orWhere('tipe_hadits',$request->abudaud)
					->orWhere('tipe_hadits',$request->bukhari)
					->orWhere('tipe_hadits',$request->malik)
					->orWhere('tipe_hadits',$request->ahmad);
				});
			})->orWhere(function($query) use ($request,$keyword_kedua){
				$query->orWhere('Isi_Indonesia', 'LIKE', '%'.$keyword_kedua . '%')
				->where(function($query) use ($request){
					$query->orWhere('tipe_hadits',$request->abudaud)
					->orWhere('tipe_hadits',$request->bukhari)
					->orWhere('tipe_hadits',$request->malik)
					->orWhere('tipe_hadits',$request->ahmad);
				});
			})->orderByRaw(
				'CASE
				when Isi_Indonesia LIKE "%'.$search.'%" then 1 
				when Isi_Indonesia LIKE "%'.$keyword_pertama.'%" then 2 
				when Isi_Indonesia LIKE "%'.$keyword_kedua.'%" then 3 
				END'
			);

		}else if ($jumlah_kata == 1) {

			$kumpulan_hadits = KumpulanHadits::Where('Isi_Indonesia', 'LIKE', '%'.$search . '%')
			->where(function($query) use ($request){
				$query->orWhere('tipe_hadits',$request->abudaud)
				->orWhere('tipe_hadits',$request->bukhari)
				->orWhere('tipe_hadits',$request->malik)
				->orWhere('tipe_hadits',$request->ahmad);
			});
		}else if (is_numeric($search) OR $search == '') {
			$kumpulan_hadits = KumpulanHadits::Where('NoHdt', $search)
			->where(function($query) use ($request){
				$query->orWhere('tipe_hadits',$request->abudaud)
				->orWhere('tipe_hadits',$request->bukhari)
				->orWhere('tipe_hadits',$request->malik)
				->orWhere('tipe_hadits',$request->ahmad);
			});
		}

		return Datatables::of($kumpulan_hadits)->addColumn('action', function ($kumpulan_hadits) use ($jumlah_kata,$request,$search){
			// JIKA JUMLAH KATA SAMA DENGAN 3 ATAU LEBIH

			$Isi_Indonesia = $kumpulan_hadits->Isi_Indonesia;
			if ($jumlah_kata >= 3) { 

				$terjemahanHadisKeIndonesia = $this->blockTigaJumlahKata($Isi_Indonesia,$search);

				return $kumpulan_hadits->Isi_Arab."<br><br>".$terjemahanHadisKeIndonesia;
				// tampilkan text arab hadis serta arti hadis
			}else if($jumlah_kata == 2){

				$terjemahanHadisKeIndonesia = $this->blockDuaJumlahKata($Isi_Indonesia,$search);

				return $kumpulan_hadits->Isi_Arab."<br><br>".$terjemahanHadisKeIndonesia;
				// tampilkan text arab hadis serta arti hadis
			}else{				
				$terjemahanHadisKeIndonesia = $this->blockSatuJumlahKata($Isi_Indonesia,$search);

				return $kumpulan_hadits->Isi_Arab."<br><br>".$terjemahanHadisKeIndonesia;
				// tampilkan text arab hadis serta arti hadisuse 
			}
		})->addColumn('tipe_hadits', function ($kumpulan_hadits) use ($search){
			if ($kumpulan_hadits->tipe_hadits == 1) { 

				return "Abu Daud"; 
			}else if ($kumpulan_hadits->tipe_hadits == 2) { 
				return "Bukhari"; 
			}else if ($kumpulan_hadits->tipe_hadits == 3) { 
				return "Malik"; 
			}else if ($kumpulan_hadits->tipe_hadits == 4) { 
			}
		})->make(true);
	}

	public function blockTigaJumlahKata($Isi_Indonesia,$search){			
		$pisah_kata = explode(" ", $search);// PISAHKAN KATA
							// fungsi strtolower akan membuat kata atau keyword menjadi huruf kecil semua
		$keyword_pertama_dengan_huruf_kecil = strtolower($pisah_kata[0]);
		$keyword_kedua_dengan_huruf_kecil = strtolower($pisah_kata[1]);
		$keyword_ketiga_dengan_huruf_kecil = strtolower($pisah_kata[2]);

					// fungsi title_case untul Mengubah Huruf Pertama Awal keyword menjadi hruf besar
		$keyword_pertama_dengan_huruf_awal_kata_kapital = title_case($pisah_kata[0]);
		$keyword_kedua_dengan_huruf_awal_kata_kapital = title_case($pisah_kata[1]);
		$keyword_ketiga_dengan_huruf_awal_kata_kapital = title_case($pisah_kata[2]);


		$block_keyword_pertama_huruf_kecil = "<b style='color:red'>".$keyword_pertama_dengan_huruf_kecil."</b>";
				// KATA PERTAMA DI BLOCK ATAU DI TEBALKAN DAN DIBERI WARNA MERAH
		$block_keyword_kedua_huruf_kecil = "<b style='color:red'>".$keyword_kedua_dengan_huruf_kecil."</b>";
				// KATA KEDUA DI BLOCK ATAU DI TEBALKAN DAN DIBERI WARNA MERAH
		$block_keyword_ketiga_huruf_kecil = "<b style='color:red'>".$keyword_ketiga_dengan_huruf_kecil."</b>";
				// KATA KETIGA DI BLOCK ATAU DI TEBALKAN DAN DIBERI WARNA MERAH

		$block_keyword_pertama_Awal_kata_huruf_Kapital = "<b style='color:red'>".$keyword_pertama_dengan_huruf_awal_kata_kapital."</b>";
				// KATA PERTAMA DI BLOCK ATAU DI TEBALKAN DAN DIBERI WARNA MERAH
		$block_keyword_kedua_Awal_kata_huruf_Kapital = "<b style='color:red'>".$keyword_kedua_dengan_huruf_awal_kata_kapital."</b>";
				// KATA KEDUA DI BLOCK ATAU DI TEBALKAN DAN DIBERI WARNA MERAH
		$block_keyword_ketiga_Awal_kata_huruf_Kapital = "<b style='color:red'>".$keyword_ketiga_dengan_huruf_awal_kata_kapital."</b>";
				// KATA KETIGA DI BLOCK ATAU DI TEBALKAN DAN DIBERI WARNA MERAH

		$Isi_Indonesia = str_replace($keyword_pertama_dengan_huruf_kecil, $block_keyword_pertama_huruf_kecil , $Isi_Indonesia);
				// arti hadis yang katanya mirip dengan kata pertama di replcae dengan variable $block_keyword_pertama
		$Isi_Indonesia = str_replace($keyword_kedua_dengan_huruf_kecil, $block_keyword_kedua_huruf_kecil ,$Isi_Indonesia);
				// arti hadis yang katanya mirip dengan kata kedua di replcae dengan variable $block_keyword_pertama
		$Isi_Indonesia = str_replace($keyword_ketiga_dengan_huruf_kecil, $block_keyword_ketiga_huruf_kecil ,$Isi_Indonesia);
				// arti hadis yang katanya mirip dengan kata ketiga di replcae dengan variable $block_keyword_pertama

		$Isi_Indonesia = str_replace($keyword_pertama_dengan_huruf_awal_kata_kapital, $block_keyword_pertama_Awal_kata_huruf_Kapital , $Isi_Indonesia);
				// arti hadis yang katanya mirip dengan kata pertama di replcae dengan variable $block_keyword_pertama
		$Isi_Indonesia = str_replace($keyword_kedua_dengan_huruf_awal_kata_kapital, $block_keyword_kedua_Awal_kata_huruf_Kapital ,$Isi_Indonesia);
				// arti hadis yang katanya mirip dengan kata kedua di replcae dengan variable $block_keyword_pertama
		$Isi_Indonesia = str_replace($keyword_ketiga_dengan_huruf_awal_kata_kapital, $block_keyword_ketiga_Awal_kata_huruf_Kapital ,$Isi_Indonesia);
				// arti hadis yang katanya mirip dengan kata ketiga di replcae dengan variable $block_keyword_pertama
		return $Isi_Indonesia;
	}

	public function blockDuaJumlahKata($Isi_Indonesia,$search){			
		$pisah_kata = explode(" ", $search);// PISAHKAN KATA
							// fungsi strtolower akan membuat kata atau keyword menjadi huruf kecil semua
		$keyword_pertama_dengan_huruf_kecil = strtolower($pisah_kata[0]);
		$keyword_kedua_dengan_huruf_kecil = strtolower($pisah_kata[1]);

					// fungsi title_case untul Mengubah Huruf Pertama Awal keyword menjadi hruf besar
		$keyword_pertama_dengan_huruf_awal_kata_kapital = title_case($pisah_kata[0]);
		$keyword_kedua_dengan_huruf_awal_kata_kapital = title_case($pisah_kata[1]);


		$block_keyword_pertama_huruf_kecil = "<b style='color:red'>".$keyword_pertama_dengan_huruf_kecil."</b>";
				// KATA PERTAMA DI BLOCK ATAU DI TEBALKAN DAN DIBERI WARNA MERAH
		$block_keyword_kedua_huruf_kecil = "<b style='color:red'>".$keyword_kedua_dengan_huruf_kecil."</b>";
				// KATA KEDUA DI BLOCK ATAU DI TEBALKAN DAN DIBERI WARNA MERAH

		$block_keyword_pertama_Awal_kata_huruf_Kapital = "<b style='color:red'>".$keyword_pertama_dengan_huruf_awal_kata_kapital."</b>";
				// KATA PERTAMA DI BLOCK ATAU DI TEBALKAN DAN DIBERI WARNA MERAH
		$block_keyword_kedua_Awal_kata_huruf_Kapital = "<b style='color:red'>".$keyword_kedua_dengan_huruf_awal_kata_kapital."</b>";
				// KATA KEDUA DI BLOCK ATAU DI TEBALKAN DAN DIBERI WARNA MERAH

		$Isi_Indonesia = str_replace($keyword_pertama_dengan_huruf_kecil, $block_keyword_pertama_huruf_kecil , $Isi_Indonesia);
				// arti hadis yang katanya mirip dengan kata pertama di replcae dengan variable $block_keyword_pertama
		$Isi_Indonesia = str_replace($keyword_kedua_dengan_huruf_kecil, $block_keyword_kedua_huruf_kecil ,$Isi_Indonesia);
				// arti hadis yang katanya mirip dengan kata kedua di replcae dengan variable $block_keyword_pertama

		$Isi_Indonesia = str_replace($keyword_pertama_dengan_huruf_awal_kata_kapital, $block_keyword_pertama_Awal_kata_huruf_Kapital , $Isi_Indonesia);
				// arti hadis yang katanya mirip dengan kata pertama di replcae dengan variable $block_keyword_pertama
		$Isi_Indonesia = str_replace($keyword_kedua_dengan_huruf_awal_kata_kapital, $block_keyword_kedua_Awal_kata_huruf_Kapital ,$Isi_Indonesia);
				// arti hadis yang katanya mirip dengan kata kedua di replcae dengan variable $block_keyword_pertama
		return $Isi_Indonesia;
	}

	public function blockSatuJumlahKata($Isi_Indonesia,$search){			
							// fungsi strtolower akan membuat kata atau keyword menjadi huruf kecil semua
		$keyword_pertama_dengan_huruf_kecil = strtolower($search);

					// fungsi title_case untul Mengubah Huruf Pertama Awal keyword menjadi hruf besar
		$keyword_pertama_dengan_huruf_awal_kata_kapital = title_case($search);

		$block_keyword_pertama_huruf_kecil = "<b style='color:red'>".$keyword_pertama_dengan_huruf_kecil."</b>";
				// KATA PERTAMA DI BLOCK ATAU DI TEBALKAN DAN DIBERI WARNA MERAH
		$block_keyword_pertama_Awal_kata_huruf_Kapital = "<b style='color:red'>".$keyword_pertama_dengan_huruf_awal_kata_kapital."</b>";
				// KATA PERTAMA DI BLOCK ATAU DI TEBALKAN DAN DIBERI WARNA MERAH

		$Isi_Indonesia = str_replace($keyword_pertama_dengan_huruf_kecil, $block_keyword_pertama_huruf_kecil , $Isi_Indonesia);
				// arti hadis yang katanya mirip dengan kata pertama di replcae dengan variable $block_keyword_pertama
		$Isi_Indonesia = str_replace($keyword_pertama_dengan_huruf_awal_kata_kapital, $block_keyword_pertama_Awal_kata_huruf_Kapital , $Isi_Indonesia);
				// arti hadis yang katanya mirip dengan kata pertama di replcae dengan variable $block_keyword_pertama
		return $Isi_Indonesia;
	}

	public function menghilangkanKarakter($search){
		// FUNGSI INI BERFUNGSI UNTUK MENGHILANGKAN KARAKTER-KARAKTER TERTENTU SEPERTI DIGIT, ANGKA, TANDA HUBUNG DAN TANDA BACA
		if (is_numeric($search)) {

		}else{

		 $hapusSemuaKarakterKecualiSpasi = preg_replace('/[^A-Za-z0-9\ ]/', '', $search); // MENGHAPUS SEMUA KARAKTER KECUALI KARAKTER n (DITENTUKAN), DISNI KARAKTER YANG TIDAK DIHAPUS ADALAH SPASI


		 $hapusSemuaAngka = preg_replace('/\d/', '', $hapusSemuaKarakterKecualiSpasi);
		 $search = $hapusSemuaAngka;
		}
		

		return $search;
	}
	public function stopwordRemoval($search){

		$stopwordRemoval = array('yang', 'di', 'dan', 'itu', 'dengan', 'untuk', 'tidak', 'ini', 'dari', 'dalam', 'akan', 'pada', 'juga', 'saya', 'ke', 'karena', 'tersebut', 'bisa', 'ada', 'mereka', 'kata', 'sudah', 'atau', 'saat', 'oleh', 'menjadi', 'ia', 'telah', 'adalah', 'seperti', 'sebagai', 'bahwa', 'dapat', 'para', 'harus', 'namun', 'kita', 'masih', 'hanya', 'mengatakan', 'kepada', 'kami', 'setelah', 'melakukan', 'lalu', 'belum', 'lain', 'dia', 'kalau', 'terjadi', 'menurut', 'anda', 'hingga', 'tak', 'baru', 'beberapa', 'ketika', 'saja', 'jalan', 'sekitar', 'secara', 'dilakukan', 'sementara', 'tapi', 'sangat', 'hal', 'sehingga', 'seorang', 'bagi', 'besar', 'lagi', 'selama', 'antara', 'sebuah', 'jika', 'sampai', 'jadi', 'terhadap', 'serta', 'pun', 'salah', 'merupakan', 'atas', 'sejak', 'membuat', 'baik', 'memiliki', 'kembali', 'selain', 'tetapi', 'memang', 'pernah', 'apa', 'mulai', 'sama', 'tentang', 'bukan', 'agar', 'semua', 'sedang', 'kali', 'kemudian', 'hasil', 'sejumlah', 'juta', 'persen', 'sendiri', 'katanya', 'demikian', 'masalah', 'mungkin', 'umum', 'setiap', 'bagian', 'bila', 'lainnya', 'terus', 'luar', 'cukup', 'termasuk', 'sebelumnya', 'bahkan', 'wib', 'tempat', 'perlu', 'menggunakan', 'memberikan', 'sedangkan', 'langsung', 'apakah', 'pihak', 'melalui', 'diri', 'mencapai', 'aku', 'berada', 'tinggi', 'ingin', 'sebelum', 'tengah', 'kini', 'tahu', 'bersama', 'depan', 'begitu', 'merasa', 'berbagai', 'mengenai', 'maka', 'jumlah', 'masuk', 'katanya', 'mengalami', 'sering', 'ujar', 'kondisi', 'akibat', 'paling', 'mendapatkan', 'selalu', 'lima', 'meminta', 'melihat', 'sekarang', 'mengaku', 'mau', 'acara', 'menyatakan', 'proses', 'tanpa', 'sempat', 'adanya', 'maupun', 'seluruh', 'mantan', 'lama', 'jenis', 'segera', 'misalnya', 'mendapat', 'bawah', 'jangan', 'meski', 'terlihat', 'akhirnya', 'punya', 'yakni', 'terakhir', 'kecil', 'panjang', 'badan', 'juni', 'of', 'jelas', 'jauh', 'tentu', 'semakin', 'tinggal', 'kurang', 'mampu', 'posisi', 'asal', 'sekali', 'sesuai', 'sebesar', 'berat', 'dirinya', 'memberi', 'pagi', 'sabtu', 'ternyata', 'mencari', 'sumber', 'ruang', 'menunjukkan', 'biasanya', 'nama', 'sebanyak', 'utara', 'berlangsung', 'barat', 'kemungkinan', 'yaitu', 'berdasarkan', 'sebenarnya', 'cara', 'utama', 'pekan', 'terlalu', 'membawa', 'kebutuhan', 'suatu', 'menerima', 'penting', 'tanggal', 'bagaimana', 'terutama', 'tingkat', 'awal', 'sedikit', 'nanti', 'pasti', 'muncul', 'dekat', 'lanjut', 'biasa', 'dulu', 'kesempatan', 'ribu', 'akhir', 'membantu', 'terkait', 'sebab', 'menyebabkan', 'khusus', 'bentuk', 'ditemukan', 'diduga', 'mana', 'ya', 'kegiatan', 'sebagian', 'tampil', 'hampir', 'bertemu', 'usai', 'berarti', 'keluar', 'pula', 'digunakan', 'justru', 'padahal', 'menyebutkan', 'gedung', 'apalagi', 'program', 'milik', 'teman', 'menjalani', 'keputusan', 'sumber', 'upaya', 'mengetahui', 'mempunyai', 'berjalan', 'menjelaskan', 'mengambil', 'benar', 'lewat', 'belakang', 'ikut', 'barang', 'meningkatkan', 'kejadian', 'kehidupan', 'keterangan', 'penggunaan', 'masing-masing', 'menghadapi');

		return preg_replace('/\b('.implode('|',$stopwordRemoval).')\b/','',$search);
	}


}
