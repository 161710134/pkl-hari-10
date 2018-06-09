@extends('layouts.admin')
@section('content')
<br>
<br>
<br>
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Data Jurusan
			  	<div class="panel-title pull-right"><a href="{{ route('jurusans.create') }}">Tambah</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
					  <th>Jurusan </th>
					  <th>Keterangan </th>
						<th>Fasilitas</th>
						<th>Industri Yang Bekerja Sama</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
						<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($jurusan as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td>{{ $data->jurusan }}</td>
							<td>{{ $data->keterangan }}</td>
							<td>@foreach($data->fasilitas as $fasilitas)<li>{{ $fasilitas->nama }}@endforeach</li></td>
							<td>@foreach($data->industri as $industri)<li>{{ $industri->nama }}@endforeach</li></td>
						<td>
							<a class="btn btn-warning" href="{{ route('jurusans.edit',$data->id) }}">Edit</a>
						</td>
						<td>
							<a href="{{ route('jurusans.show',$data->id) }}" class="btn btn-success">Show</a>
						</td>
						<td>
							<form method="post" action="{{ route('jurusans.destroy',$data->id) }}">
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