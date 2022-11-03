@extends('templates.app')

@section('content')
    <div class="col-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Nama Kelas</th>
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($kelas as $kelas)

                        <tr>
                        <td>{{$kelas->id}}</td>
                        <td>{{$kelas->nama_kelas}}</td>
                        </tr>
                        @endforeach
@endsection