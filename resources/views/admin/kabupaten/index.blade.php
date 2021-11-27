@extends('template.admin.default')
@section('title')
<h1><i class="fa fa-list"></i>Data Kabupaten</h1>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('kabupaten') }}

@endsection

@section('content')
@include('sweetalert::alert')
 <div class="col-md-12">
          <div class="tile">
          	<a href="{{route('kabupaten.create')}}" class="btn btn-success mb-3">Tambah Data</a>
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Kabupaten</th>
                      <th>Slug</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@php
                  		$no = 0;
                  	@endphp
                   @foreach($kabupatens as $kabupaten)
                   	@php
                   		$no++;
                   	@endphp
                    <tr>
                      <td>{{$no }}</td>
                      <td>{{$kabupaten->name}}</td>
                      <td>{{$kabupaten->slug}}</td>
                      <td>
                        <a href="{{route('kecamatan.index',$kabupaten)}}" class="btn btn-info btn-sm"><i class="fa fa-list"></i></a>

                      	<a href="{{route('kabupaten.edit',$kabupaten)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                      	<button id="delete" href="{{route('kabupaten.destroy',$kabupaten)}}" class="btn btn-danger btn-sm" data-title="{{$kabupaten->name}}"><i class="fa fa-trash"></i></button>
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
      title:"Apakah Sudah Yakin menghapus Data Kabupaten "+title+"?",
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