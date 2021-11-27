@extends('template.admin.default')
@section('title')
<h1><i class="fa fa-list"></i>Data User</h1>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('user') }}

@endsection

@section('content')
@include('sweetalert::alert') 
 <div class="col-md-12">
          <div class="tile">
          	<a href="{{route('user.create') }}" class="btn btn-success mb-3">Tambah Data</a>
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama User</th>
                      <th>Email</th>
                      <th>Hak Akses</th>
                      <th>Foto</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@php
                  		$no = 0;
                  	@endphp
                   @foreach($users as $user)
                   	@php
                   		$no++;
                   	@endphp
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ str_replace(array('[',']','"'),'',$user->roles()->pluck('name') )}}</td>
                      <td><img src="{{$user->getImage() }}" class="img-thumbnail" width="50px" height="50px"></td>
                      <td>
                       	<a href="{{route('user.edit',$user)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                      	<button id="delete" href="{{route('user.destroy',$user)}}" class="btn btn-danger btn-sm" data-title="{{$user->name}}"><i class="fa fa-trash"></i></button>
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
      title:"Apakah Sudah Yakin menghapus Data User "+title+"?",
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