@extends('template.admin.default')
@section('title')
<h1><i class="fa fa-list"></i>Tambah Data Kabupaten</h1>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('Tambah Data Kabupaten') }}

@endsection

@section('content')
<div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Form Tambah Data Kabupaten</h3>
            <div class="tile-body">
              <form action="{{route('kabupaten.store')}}" method="POST" class="needs-validation" novalidate>
              	@csrf
                <div class="form-group">
                  <label class="control-label">Nama Kabupaten</label>
                  <input class="form-control @error('kabupaten') is-invalid @enderror" name="kabupaten" type="text" placeholder="Masukkan Nama Kabupaten">
                  @error('kabupaten')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{route('kabupaten.index')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
           </form>
          </div>
        </div>
@endsection