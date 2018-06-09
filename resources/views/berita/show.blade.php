@extends('layouts.admin')
@section('content')
<br>
<br>
<br>
<br>
<br>
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Berita Yang Di Upload
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group {{ $errors->has('judul') ? ' has-error' : '' }}">
			  			<label class="control-label">Judul Berita Yang Di Upload</label>	
			  			<input type="text" name="judul" class="form-control" value="{{ $berita->judul }}" readonly>
			  			@if ($errors->has('judul'))
                            <span class="help-block">
                                <strong>{{ $errors->first('judul') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('tgl_rilis') ? ' has-error' : '' }}">
			  			<label class="control-label">Tanggal Rilis Berita</label>	
			  			<input type="text" name="tgl_rilis" class="form-control" value="{{ $berita->tgl_rilis }}" readonly>
			  			@if ($errors->has('tgl_rilis'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tgl_rilis') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection