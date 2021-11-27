@extends('template.admin.default')
@section('title')
<h1><i class="fa fa-list"></i>Edit Data Content</h1>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('Edit Data Content', $content) }}

@endsection

@section('content')
<div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Form Edit Data Content</h3>
            <div class="tile-body">
              <form action="{{route('content.update', $content)}}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
              	@csrf
                @method("PUT")

                <div class="form-group">
                  <label class="control-label">Pilih Kecamatan</label>
                  <select name="kecamatan" id="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror" >
                    <option value="0">--Pilih Kecamatan--</option>
                    @foreach($kecamatans as $kecamatan)
                    <option value="{{$kecamatan->id}}"
                      @if ($content->kecamatan_id == $kecamatan->id)
                        selected
                      @endif
                      >{{$kecamatan->name}}</option>
                    @endforeach
                  </select>
                    @error('kecamatan')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  
                </div>

                <div class="form-group">
                  <label class="control-label">Judul</label>
                  <input class="form-control @error('title') is-invalid @enderror" name="title" type="text" placeholder="Masukkan Judul Content" value="{{$content->title}}">
                  @error('title')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="control-label">Isi Kontent</label>
                  <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content">{{$content->content}}</textarea> 
                  @error('content')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="control-label">Thumbnail</label>
                  <input class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail" type="file" >
                  @error('thumbnail')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{route('content.index')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
           </form>
          </div>
        </div>
@endsection
@push('scripts')
<script src="{{asset('admin/js/plugins/select2.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
  $('#kecamatan').select2();
  CKEDITOR.replace( 'content' );
</script>
@endpush