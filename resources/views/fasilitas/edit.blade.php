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
			  <div class="panel-heading">Edit Data Fasilitas
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('fasilitas.update',$fasilitas->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		
			  		<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Fasilitas</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $fasilitas->nama }}" required>
			  			@if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('keterangan') ? ' has-error' : '' }}">
			  			<label class="control-label">Keterangan Fasilitas</label>	
			  			<input type="text" name="keterangan" class="form-control" value="{{ $fasilitas->keterangan }}" required>
			  			@if ($errors->has('keterangan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('keterangan') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('id_jurusan') ? ' has-error' : '' }}">
			  			<label class="control-label">Jurusan</label>	
			  			<select name="id_jurusan" class="form-control">
			  				@foreach($jurusan as $data)
			  				<option value="{{ $data->id }}" {{ $selectedJurusan == $data->id ? 'selected="selected"' : '' }} >{{ $data->jurusan }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('id_jurusan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_jurusan') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Simpan Edit</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection