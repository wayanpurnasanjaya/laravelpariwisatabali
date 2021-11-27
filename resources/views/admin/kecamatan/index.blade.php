@extends('template.admin.default')
@section('title')
<h1><i class="fa fa-list"></i>Data Kecamatan Pada Kabupaten {{$kabupaten->name}}</h1>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('Kecamatan',$kabupaten) }}

@endsection

@section('content')
@include('sweetalert::alert')
 <div class="col-md-12">
          <div class="tile">
          	<a href="{{route('kecamatan.create',$kabupaten)}}" class="btn btn-success mb-3">Tambah Data</a>
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Kecamatan</th>
                      <th>Slug</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@php
                  		$no = 0;
                  	@endphp
                   @foreach($kecamatans as $kecamatan)
                   	@php
                   		$no++;
                   	@endphp
                    <tr>
                      <td>{{$no }}</td>
                      <td>{{$kecamatan->name}}</td>
                      <td>{{$kecamatan->slug}}</td>
                      <td>
                        
                      	<a href="{{route('kecamatan.edit',[$kabupaten,$kecamatan])}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                      	<button id="delete" href="{{route('kecamatan.delete',[$kabupaten,$kecamatan])}}" class="btn btn-danger btn-sm" data-title="{{$kecamatan->name}}"><i class="fa fa-trash"></i></button>
                      </td>
                      <form method="POST" id="deleteForm">
                        @csrf
                        @method("DELETE")
                        <input type="submit" style="display: none;">
                      </form>
                    </tr>
                   @endforeach
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
@endsection
@push('scripts')
<script type="text/javascript" src="{{ asset('admin/js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/plugins/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
  $('button#delete').on('click',function(){
    var href = $(this).attr('href');
    var title = $(this).data('title')

    swal({
      title:"Apakah Sudah Yakin menghapus Data Kecamatan "+title+"?",
      text:"Data Yang Sudah di Hapus Tidak dapat dikembalikan",
      icon :"warning",
      buttons:true,
      dangerMode:true,
    })
    .then((willDelete)=> {
      if(willDelete){
        document.getElementById('deleteForm').action = href;
        document.getElementById('deleteForm').submit();
        swal("Data Berhasil Di hapus",{
          icon:"success",
        });
      }
    });
  });
</script>

@endpush