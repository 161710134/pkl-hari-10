@extends('layouts.admin')
@section('content')
<br>
<br>
<br>
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Data Guru Dan Staf
			  	<div class="panel-title pull-right"><a href="{{ route('gurustafs.create') }}">Tambah</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table">
				  	<thead>
			  		<tr>
			  		<th>No</th>
						<th>Foto</th>
					  <th>Nama Guru Atau Staf</th>
					  <th>Staf Atau Mata Pelajaran Yang Diajarkan</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		@php $no = 1; @endphp
				  		@foreach($gurustaf as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
							<td><img src="{{ asset('assets/admin/images/icon/'.$data->foto )}}" style="max-height:60px; max-width: 60px; margin-top: 6px;"></td>
				    	<td>{{ $data->nama }}</td>
				    	<td>{{ $data->mapel }}</td>
						<td>
							<a class="btn btn-warning" href="{{ route('gurustafs.edit',$data->id) }}">Edit</a>
						</td>
						<td>
							<a href="{{ route('gurustafs.show',$data->id) }}" class="btn btn-success">Show</a>
						</td>
						<td>
							<form method="post" action="{{ route('gurustafs.destroy',$data->id) }}">
								<input name="_token" type="hidden" value="{{ csrf_token() }}">
								<input type="hidden" name="_method" value="DELETE">

								<button type="submit" class="btn btn-danger">Delete</button>
							</form>
						</td>
				      </tr>
				      @endforeach	
				  	</tbody>
				  </table>
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection