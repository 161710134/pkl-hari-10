@extends('layouts.admin')
@section('content')
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-heading">Anda Berhasil Masuk</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Selamat Anda Berhasil Masuk
                </div>
            </div>
      </div>
      </div>
      </div>
      </div>
      @endsection