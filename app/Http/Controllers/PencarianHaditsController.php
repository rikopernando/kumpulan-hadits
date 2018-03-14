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

			$kumpulan_hadits = KumpulanHadits::select('NoHdt','Isi_Indonesia','tipe_hadits','Isi_Arab')->where(function($query) use ($request){
				$query->Where('Isi_Indonesia', 'LIKE', '%'.$request->search . '%')
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
				when Isi_Indonesia LIKE "%'.$request->search.'%" then 1 
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

			$kumpulan_hadits = KumpulanHadits::select('NoHdt','Isi_Indonesia','tipe_hadits','Isi_Arab')->where(function($query) use ($request){
				$query->Where('Isi_Indonesia', 'LIKE', '%'.$request->search . '%')
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
				when Isi_Indonesia LIKE "%'.$request->search.'%" then 1 
				when Isi_Indonesia LIKE "%'.$keyword_pertama.'%" then 2 
				when Isi_Indonesia LIKE "%'.$keyword_kedua.'%" then 3 
				END'
			);

		}else if ($jumlah_kata == 1) {

			$kumpulan_hadits = KumpulanHadits::Where('Isi_Indonesia', 'LIKE', '%'.$request->search . '%')
			->where(function($query) use ($request){
				$query->orWhere('tipe_hadits',$request->abudaud)
				->orWhere('tipe_hadits',$request->bukhari)
				->orWhere('tipe_hadits',$request->malik)
				->orWhere('tipe_hadits',$request->ahmad);
			});
		}else if (is_numeric($request->search)) {
			$kumpulan_hadits = KumpulanHadits::Where('NoHdt', $request->search)
			->where(function($query) use ($request){
				$query->orWhere('tipe_hadits',$request->abudaud)
				->orWhere('tipe_hadits',$request->bukhari)
				->orWhere('tipe_hadits',$request->malik)
				->orWhere('tipe_hadits',$request->ahmad);
			});
		}

		return Datatables::of($kumpulan_hadits)->addColumn('action', function ($kumpulan_hadits) use ($jumlah_kata,$request){
			// JIKA JUMLAH KATA SAMA DENGAN 3 ATAU LEBIH

			$Isi_Indonesia = $kumpulan_hadits->Isi_Indonesia;
			if ($jumlah_kata >= 3) { 

				$terjemahanHadisKeIndonesia = $this->blockTigaJumlahKata($Isi_Indonesia,$request->search);

				return $kumpulan_hadits->Isi_Arab."<br><br>".$terjemahanHadisKeIndonesia;
				// tampilkan text arab hadis serta arti hadis
			}else if($jumlah_kata == 2){

				$terjemahanHadisKeIndonesia = $this->blockDuaJumlahKata($Isi_Indonesia,$request->search);

				return $kumpulan_hadits->Isi_Arab."<br><br>".$terjemahanHadisKeIndonesia;
				// tampilkan text arab hadis serta arti hadis
			}else{				
				$terjemahanHadisKeIndonesia = $this->blockSatuJumlahKata($Isi_Indonesia,$request->search);

				return $kumpulan_hadits->Isi_Arab."<br><br>".$terjemahanHadisKeIndonesia;
				// tampilkan text arab hadis serta arti hadis
			}
		})->addColumn('tipe_hadits', function ($kumpulan_hadits){
			if ($kumpulan_hadits->tipe_hadits == 1) {
				return "Abu Daud";
			}else if ($kumpulan_hadits->tipe_hadits == 2) {
				return "Bukhari";
			}else if ($kumpulan_hadits->tipe_hadits == 3) {
				return "Malik";
			}else if ($kumpulan_hadits->tipe_hadits == 4) {
				return "Ahmad";
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
}
