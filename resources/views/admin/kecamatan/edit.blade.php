@extends('template.admin.default')
@section('title')
<h1><i class="fa fa-list"></i>Edit Data Kecamatan</h1>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('Edit Data Kecamatan',$kabupaten,$kecamatan) }}

@endsection

@section('content')
<div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Form Edit Data Kecamatan</h3>
            <div class="tile-body">
              <form action="{{route('kecamatan.update',[$kabupaten,$kecamatan])}}" method="POST" class="needs-validation" novalidate>
              	@csrf
                @method('PUT')
                <div class="form-group">
                  <label class="control-label">Nama Kecamatan</label>
                  <input type="hidden" name="kabupaten" value="{{$kabupaten->id}}">
                  <input class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan" type="text" placeholder="Masukkan Nama Kecamatan" value="{{$kecamatan->name}}">
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