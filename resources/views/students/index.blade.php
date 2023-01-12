@extends('templates.app')

@section('content')

<?php 
        $x = 1
        ?>
    <div class="col-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Photo</th>
                          <th>Phone</th>
                          <th>Address</th>
                          <th>Class</th>
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($students as $student)
                        <tr>
                        
                        {{-- Edit --}}
                      <tr>
                              <tr>
                                <td>{{$student->name}}</td>
                                <td>
                                  <img src="{{ asset('storage/' . $student->photo) }}" width="60px" alt="">
                                </td>
                                <td class="text-muted">{{$student->phone_number}}</td>
                                <td>{{$student->address}}</td>
                                <td>{{$student->class}}</td>
                                <td>    
                                    <a class="btn btn-primary btn-sm" href="{{ route('students.edit', $student->id) }}">Edit</a>
                                    <form action="{{ route('students.destroy', $student) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                    <button class="btn btn-danger btn-sm"onclick="return confirm('Yakin masbro?')">Delete</button>
                                        </form> 
                                </td>
                            </tr> 
                          </div>
                        </div>
                        

                      </div>
                        @endforeach
                      </tbody>
                    </table>
                  </div
                  <div class="card-footer">
                    {{ $students->links('pagination::bootstrap-4') }}
                  </div>
@endsection