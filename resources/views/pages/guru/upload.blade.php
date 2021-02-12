@extends('layouts.app')
@section('content')
<div class="card">
   <form method="POST" action="{{route('guru.upload.action')}}" enctype="multipart/form-data">
       @csrf
       @method('POST')
       <div class="card-header">
           <h4>{{$title ?? null}}</h4>
       </div>
       <div class="card-body">
           <div class="row">
               <div class="form-group col-md-12 col-12">
                   <div class="custom-file">
                       <input type="file" class="custom-file-input" name="excel" id="excel">
                       <label class="custom-file-label" for="excel">Pilih Berkas</label>
                       @error('excel')
                           <div class="invalid-feedback">{{ $message }}</div>
                       @enderror
                   </div>
               </div>
           </div>
       </div>
       <div class="card-footer text-right">
           <a href="{{route('guru.index')}}" class="btn btn-warning">
               <i class="fa fa-arrow-left"></i> Kembali
           </a>
           <button class="btn btn-primary">
               <i class="fa fa-upload"></i> Unggah
           </button>
       </div>
   </form>
</div>
@endsection
