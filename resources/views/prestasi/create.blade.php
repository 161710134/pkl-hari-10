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
			  <div class="panel-heading"> Tambah Data Prestasi
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('prestasis.store') }}" method="post" >
			  		{{ csrf_field() }}
			  		
			  		<div class="form-group {{ $errors->has('prestasi') ? ' has-error' : '' }}">
			  			<label class="control-label">Prestasi Yang Di Peroleh</label>	
			  			<input type="text" name="prestasi" class="form-control"  required>
			  			@if ($errors->has('prestasi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('prestasi') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		
					<div class="form-group {{ $errors->has('keterangan') ? ' has-error' : '' }}">
			  			<label class="control-label">keterangan</label>	
			  			<input type="text" name="keterangan" class="form-control" required>
			  			@if ($errors->has('keterangan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('keterangan') }}</strong>
                            </span>
                        @endif
			  		</div>

					  <div class="form-group {{ $errors->has('id_eskul') ? ' has-error' : '' }}">
			  			<label class="control-label">Eskul Yang Memperoleh Prestasi</label>	
			  			<select name="id_eskul" class="form-control">
			  				@foreach($eskul as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('id_eskul'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_eskul') }}</strong>
                            </span>
                        @endif
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