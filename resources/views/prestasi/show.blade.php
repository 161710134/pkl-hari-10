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
			  <div class="panel-heading">Show Data Prestasi
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group {{ $errors->has('prestasi') ? ' has-error' : '' }}">
			  			<label class="control-label">Prestasi</label>	
			  			<input type="text" name="prestasi" class="form-control" value="{{ $prestasi->prestasi }}" readonly>
			  			@if ($errors->has('prestasi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('prestasi') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('keterangan') ? ' has-error' : '' }}">
			  			<label class="control-label">Keterangan</label>	
			  			<input type="text" name="keterangan" class="form-control" value="{{ $prestasi->keterangan }}" readonly>
			  			@if ($errors->has('keterangan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('keterangan') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Eskul Yang Memperoleh Prestasi</label>	
			  			<input type="text" name="id_eskul" class="form-control" value="{{ $prestasi->eskul->nama }}"  readonly>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection