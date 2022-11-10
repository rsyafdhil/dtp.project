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
                    <input type="text" name="name" class="form-control @error('name') 
                    is-invalid @enderror"

                    name="example-text-input" placeholder="Insert Name" value={{old ('name') }}>
                    @error('name')
                        <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                    <div class="mb-3">
                    <label for="" class="form-label">Telepon</label>
                    <input type="text" name="phone_number" class="form-control  @error('phone_number') 
                    is-invalid @enderror" placeholder="Insert Phone Number"

                    name="example-text-input" placeholder="Insert Phone Number" value={{old ('[phone_number]') }}>
                    @error('phone_number')
                        <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                    <div class="mb-3">
                    <label for="" class="form-label">Alamat</label>
                    <input type="text" name="address" class="form-control @error('address') 
                    is-invalid @enderror"

                    name="example-text-input" placeholder="Insert Address" value={{old ('address') }}>
                    @error('address')
                        <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                    <div class="mb-3">
                    <label for="" class="form-label">Kelas</label>
                    <input type="text" name="class" class="form-control @error('class') 
                    is-invalid @enderror"

                    name="example-text-input" placeholder="Insert Class" value={{old ('class') }}>
                    @error('class')
                        <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                    <div class="mb-3">
                    <input type="submit" value="Simpan" class="btn btn-info">
                </div>
            </form>
        </div>
        
</div>

@endsection