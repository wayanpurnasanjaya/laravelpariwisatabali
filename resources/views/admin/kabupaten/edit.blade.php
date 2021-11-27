@extends('template.admin.default')
@section('title')
<h1><i class="fa fa-list"></i>Edit Data Kabupaten</h1>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('Edit Data Kabupaten',$kabupaten) }}

@endsection

@section('content')
<div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Form Edit Data Kabupaten</h3>
            <div class="tile-body">
              <form action="{{route('kabupaten.update',$kabupaten)}}" method="POST" class="needs-validation" novalidate>
              	@csrf
                @method('PUT')
                <div class="form-group">
                  <label class="control-label">Nama Kabupaten</label>
                  <input class="form-control @error('kabupaten') is-invalid @enderror" name="kabupaten" type="text" placeholder="Masukkan Nama Kabupaten" value="{{$kabupaten->name}}">
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