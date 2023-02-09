@extends('admin.layouts.master')
@section('title','Add Student')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Add Student</strong>
            </div>
            <div class="card-body card-block">
                @if(\Illuminate\Support\Facades\Session::has('msg'))
                    <div class="alert alert-success">
                        {{ \Illuminate\Support\Facades\Session::get('msg') }}
                    </div>
                @endif
                <form action="{{route('students.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                     @csrf
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="id" class=" form-control-label">Code</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="id" name="id" placeholder="Code" class="form-control @error('id') is-invalid @enderror" value="{{old('id')}}">
                            @error('id')
                            <small class="form-text text-muted" style="color: red !important;">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="name" class=" form-control-label">name</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                            @error('name')
                            <small class="form-text text-muted" style="color: red!important;">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="email" class=" form-control-label">email</label></div>
                        <div class="col-12 col-md-9"><input type="email" id="email" name="email" placeholder="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                            @error('email')
                            <small class="form-text text-muted" style="color: red!important;">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="phone" class=" form-control-label">phone</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="phone" name="phone" placeholder="Phone" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}">
                            @error('phone')
                            <small class="form-text text-muted" style="color: red!important;">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Department</label></div>
                        <div class="col-12 col-md-9">
                            <select name="department" id="select" class="form-control">
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm" name="add">
                            <i class="fa fa-dot-circle-o"></i> Add
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


