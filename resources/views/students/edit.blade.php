@extends('templates.app')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('students.update', $student->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="mb-3">
                <label for="" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control @error('name') 
                is-invalid @enderror" value="{{$student->name}}" placeholder="Insert Name"

                name="example-text-input" value={{old ('name') }}>
                    @error('name')
                        <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                <div class="mb-3">
                    <label for="" class="form-label">Photo</label>
                    <img src="{{ asset('storage/'.$student->photo) }}" width="100px" alt="">
                    <input type="file" name="photo" id="" class="form-control @error('photo')
                        is-invalid
                    @enderror" value="{{ old('photo') }}">
                    @error('photo')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                <label for="" class="form-label">Telepon</label>
                <input type="text" name="phone_number" class="form-control @error('phone_number') 
                is-invalid @enderror"  placeholder="Insert Phone Number" value="{{$student->phone_number}}"
                name="example-text-input" value={{old ('phone_number') }}>
                    @error('phone_number')
                        <span class="invalid-feedback">{{$message}}</span>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Alamat</label>
                <input type="text" name="address" class="form-control @error('address') 
                is-invalid @enderror"  placeholder="Insert Phone Number" value="{{$student->address}}"
                name="example-text-input" value={{old ('address') }}>
                    @error('address')
                        <span class="invalid-feedback">{{$message}}</span>
                    @enderror
            </div>
            <div class="mb-3">
            <label for="" class="form-label">Kelas</label>
            <input type="text" name="class" class="form-control @error('class') 
            is-invalid @enderror" value="{{$student->class}}" placeholder="Insert Class"

            name="example-text-input" value={{old ('class') }}>
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