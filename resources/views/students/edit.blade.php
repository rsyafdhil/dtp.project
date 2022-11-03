@extends('templates.app')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('students.update', $student->id) }}" method="post">
        @csrf
        @method('PUT')
            <div class="mb-3">
                <label for="" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" placeholder="Insert Name" value="{{$student->name}}">
            </div>
                <div class="mb-3">
                <label for="" class="form-label">Telepon</label>
                <input type="text" name="phone_number" class="form-control" placeholder="Insert Phone Number" value="{{$student->phone_number}}">
            </div>
                <div class="mb-3">
                <label for="" class="form-label">Alamat</label>
                <input type="text" name="address" class="form-control" placeholder="Insert Address" value="{{$student->address}}">
            </div>
                <div class="mb-3">
                <label for="" class="form-label">Kelas</label>
                <input type="text" name="class" class="form-control" placeholder="Insert Class" value="{{$student->class}}">
            </div>
                <div class="mb-3">
                <input type="submit" value="Simpan" class="btn btn-info">
            </div>
        </form>
    </div>
</div>
@endsection