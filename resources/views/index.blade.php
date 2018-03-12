@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <center><img alt="Kumpulan Hadis" src="image/kumpulanhadis.png" height="200" width="400" /></center>

            <div class="jumbotron searchForm">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="" name="abudaud" id="abudaud">
                    Abu Daud
                </label>
                <label>
                    <input type="checkbox" value="" name="bukhari" id="bukhari">
                    Bukhari
                </label>
                <label>
                    <input type="checkbox" value="" name="malik" id="malik">
                    Malik
                </label>
                <label>
                    <input type="checkbox" value="" name="ahmad" id="ahmad">
                    Ahmad
                </label>
            </div>


            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </span>
            <input type="text" class="form-control" placeholder="Search ..." aria-describedby="sizing-addon2" name="search" id="search">
            <span class="input-group-btn">
                <button class="btn btn-default" id="cariHadits" type="button">Search</button>
            </span>
        </div>
        <br>
        <div class="table-responsive" id="tableHadits" style="display: none">
         <table class="table table-bordered" id="table-hadits">
            <thead>
                <tr>
                    <th>No. Hadits</th>
                    <th>Isi Hadits</th>
                    <th>Tipe hadits</th>
                </tr>
            </thead>
        </table>
    </div>


</div>
</div>
</div>

</div>

@endsection

@section('scripts')
<script>
    $(function() {

        $(document).on('click','#cariHadits',function(){
            if ($('#abudaud').is(":checked"))
            {
             var abudaud = 1; 
         }else{
            var abudaud = 0;
        }
        if ($('#bukhari').is(":checked"))
        {
            var bukhari = 2; 
        }else{
            var bukhari = 0;
        }  
        if ($('#malik').is(":checked"))
        {
            var malik = 3; 
        }else{
            var malik = 0;
        }
        if ($('#ahmad').is(":checked"))
        {
            var ahmad = 4; 
        }else{
            var ahmad = 0;
        }
        var search = $("#search").val();
        $("#tableHadits").show();
        $('#table-hadits').DataTable().destroy();

        $('#table-hadits').DataTable({
            processing: true,
            serverSide: true,
            "ajax": {
                url: '{{ Url("/pencarian-hadits") }}',
                "data": function ( d ) {
                    d.abudaud = abudaud;
                    d.bukhari = bukhari;
                    d.malik = malik;
                    d.ahmad = ahmad;
                    d.search = search;
                      // d.custom = $('#myInput').val();
                      // etc
                  },
                  type:'GET',
                  'headers': {
                      'X-CSRF-TOKEN': '{{ csrf_token() }}'
                  },
              },
              columns: [
              { data: 'NoHdt', name: 'NoHdt' },
              { data: 'Isi_Indonesia', name: 'Isi_Indonesia' },
              { data: 'tipe_hadits', name: 'tipe_hadits' },
              ]
          });    
    });
    });
</script>

@endsection

