@extends('template.admin.default')
@section('title')
<h1><i class="fa fa-list"></i>Tambah Data Kecamatan Pada Kabupaten {{ $kabupaten->name }}</h1>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('Tambah Data Kecamatan',$kabupaten) }}

@endsection

@section('content')
<div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Form Tambah Data Kecamatan</h3>
            <div class="tile-body">
              <form action="{{route('kecamatan.store',$kabupaten)}}" method="POST">
              	@csrf
                <div class="form-group">
                  <label class="control-label">Nama Kecamatan</label>
                  <input type="hidden" name="kabupaten" value="{{$kabupaten->id}}">
                  <input class="form-control @error('kabupaten') is-invalid @enderror" name="kecamatan" type="text" placeholder="Masukkan Nama Kecamatan">
                  @error('kecamatan')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{route('kecamatan.index',$kabupaten)}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
           </form>
          </div>
        </div>
@endsection