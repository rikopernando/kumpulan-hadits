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

		return Datatables::of($kumpulan_hadits)
		->addColumn('isi_hadits', function ($kumpulan_hadits){
			return $kumpulan_hadits->Isi_Arab."<br>".$kumpulan_hadits->Isi_Indonesia;
		})
		->editColumn('tipe_hadits', function ($kumpulan_hadits){
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

}
