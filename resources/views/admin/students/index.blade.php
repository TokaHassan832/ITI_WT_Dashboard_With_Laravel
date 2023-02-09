
@extends('admin.layouts.master')
@section('breadcrumbs')
@section('title','All Students')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="{{ route('students.index') }}">All Students</a></li>
                                <li><a href="{{ route('students.create') }}">Add Student</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

   @section('content')
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Students</strong>
                        </div>
                        <div class="card-body">
                            @if(\Illuminate\Support\Facades\Session::has('msg'))
                                <div class="alert alert-success">
                                    {{ \Illuminate\Support\Facades\Session::get('msg') }}
                                </div>
                            @endif
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">name</th>
                                    <th scope="col">email</th>
                                    <th scope="col">phone</th>
                                    <th scope="col">department</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                <tr>
                                    <th scope="row">{{$student->id}}</th>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->phone}}</td>
                                    <td>{{$student->department_id}}</td>
                                    <td>
                                        <a href="{{route('students.show',[$student->id])}}" style="color:lightblue">show</a>
                                        <a href="{{route('students.edit',[$student->id])}}" style="color:lightgreen">edit</a>
                                        <a href="#" style="color:red">delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection


