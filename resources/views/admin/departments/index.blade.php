
@extends('admin.layouts.master')
@section('breadcrumbs')
@section('title','All Departments')
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
                            <li><a href="{{ route('departments.index') }}">All Departments</a></li>
                            <li><a href="{{ route('departments.create') }}">Add Department</a></li>
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
                <strong class="card-title">Departments</strong>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($departments as $department)
                        <tr>
                            <th scope="row">{{$department->id}}</th>
                            <td>{{$department->name}}</td>
                            <td>
                                <a href="{{route('departments.show',[$department->id])}}" style="color:lightblue">show</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection


