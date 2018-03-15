@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<center><img id="image" alt="Kumpulan Hadis" src="image/kumpulanhadis.png" height="200" width="400" /></center>
		<div class="panel panel-primary">
			<!-- Default panel contentys -->
			<div class="panel-heading">Panduan Penggunaan Sistem</div>
			<div class="panel-body">
				<p>Dalam Sistem ini Pencarian dapat menggunakan kata kunci hadis dengan panduan sebagai berikut:
				</p>
			</div>
			<!-- List group -->
			<ul class="list-group">
				<li class="list-group-item">1. Pengguna Mengakses Sistem Pencarian 4 Kitab Hadis </li>
				<li class="list-group-item">2. Sistem menampilkan form pencarian untuk memasukan kata kunci</li>
				<li class="list-group-item">3. Pengguna memilih kitab hadis yang akan dicari</li>
				<li class="list-group-item">4. Kata Kunci harus yang terkandung dalam isi hadis dalam bahasa Indonesia, kecuali nama dan tempat</li>
				<li class="list-group-item">5. Maksimum kata yang dimasukan adalah 3 kata</li>
				<li class="list-group-item">6. Apabila memasukan no Hadis maka cukup dengan no Hadis</li>
				<li class="list-group-item">7. Kemudikan klik tombol search</li>
			</ul>
		</div>

	</div>
</div>

@endsection


