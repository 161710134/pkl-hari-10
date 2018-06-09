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
			  <div class="panel-heading"> Tambah Data Berita Yang Di Upload
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('beritas.store') }}" method="post" >
			  		{{ csrf_field() }}
			  		
			  		<div class="form-group {{ $errors->has('judul') ? ' has-error' : '' }}">
			  			<label class="control-label">Judul Berita</label>	
			  			<input type="text" name="judul" class="form-control"  required>
			  			@if ($errors->has('judul'))
                            <span class="help-block">
                                <strong>{{ $errors->first('judul') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		
					<div class="form-group {{ $errors->has('tgl_rilis') ? ' has-error' : '' }}">
			  			<label class="control-label">Tanggal Rilis Berita</label>	
			  			<input type="date" name="tgl_rilis" class="form-control" required>
			  			@if ($errors->has('tgl_rilis'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tgl_rilis') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Tambah</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection