@extends('templates.app')

@php
    $title= 'Data Siswa';
    $pretitle= 'Tambah Data Siswa'; 
@endphp

@section('content')
<div class="card">
        <div class="card-body">
            <form action="{{route ("students.store") }}" method="post">
            @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" placeholder="Insert Name">
                </div>
                    <div class="mb-3">
                    <label for="" class="form-label">Telepon</label>
                    <input type="text" name="phone_number" class="form-control" placeholder="Insert Phone Number">
                </div>
                    <div class="mb-3">
                    <label for="" class="form-label">Alamat</label>
                    <input type="text" name="address" class="form-control" placeholder="Insert Address">
                </div>
                    <div class="mb-3">
                    <label for="" class="form-label">Kelas</label>
                    <input type="text" name="class" class="form-control" placeholder="Insert Class">
                </div>
                    <div class="mb-3">
                    <input type="submit" value="Simpan" class="btn btn-info">
                </div>
            </form>
        </div>
        
</div>

@endsection