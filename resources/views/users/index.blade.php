@extends('layouts.app')

@section('content')

<div class="container-fluid">
    @if (session('success'))
    <section class="alert-added col-12">
        <div class="alert alert-success d-flex justify-content-between">
            <div>
                {{ session('success') }}
            </div>
            <div>
                <button class="close-alert btn-close"></button>
            </div>
        </div>
    </section>
    @endif
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left"><i class="fas fa-user"></i> Users</h4>
                        <a href="#" style="float: right" class="btn btn-dark add-item" 
                        data-toggle="modal" data-target="#addUser">
                            <i class="fas fa-plus"> Add New Users</i></a></div>
                    <div class="card-body overflow-auto">
                        <section id="search-table">
                            @livewire('table',['tableColumns' => array_keys($users->first()->toArray()), 'excludedColumns' => ['id','email_verified_at','created_at','updated_at'], 'tableTitle' => 'Search Users'])
                        </section>  
                        <table class="table table-bordered table-left" id="main-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>@if ($user->is_admin ==1)Admin
                                        @else Cashier
                                    @endif </td>
                                   <td>
                                       <div class="btn-group">
                                           <a href="#" class="btn btn-info btnt-sm"
                                           data-toggle="modal" 
                                           data-target="#editUser{{$user->id}}">
                                               <i class="fas fa-edit"> Edit</i></a>
                                               <a href="#"  data-toggle="modal" 
                                               data-target="#deleteUser{{$user->id}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                       </div>
                                   </td>
                                </tr>
                                <div class="modal right fade" id="editUser{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title" id="staticBackdropLabel">Edit User</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                      {{$user->id}}   
                                    </div>
                                    <div class="modal-body">
                                      <form action="{{route('users.update', $user->id)}}" method="POST">
                                    
                                        @csrf
                                        @method('put')
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name" id="" value="{{$user->name}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email" id="" value="{{$user->email}}" class="form-control">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" name="password"  id="" readonly value="{{$user->password}}" class="form-control">
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="">Role</label>
                                            <select name="is_admin" id="" class="form-control">
                                                <option value="1" @if ($user->is_admin ==1)
                                                   selected  
                                                @endif>Admin</option>
                                                <option value="2"@if ($user->is_admin ==2)
                                                    selected  
                                                 @endif>Cashier</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-warning btn-block">Update</button>
                                        </div>
                                    </form>
                                      
                                    </div>
                                    
                                  </div>
                                    </div>
                                </div>

                                <div class="modal right fade" id="deleteUser{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title" id="staticBackdropLabel">Delete User</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                      {{$user->id}}   
                                    </div>
                                    <div class="modal-body">
                                      <form action="{{route('users.destroy', $user->id)}}" method="POST">
                                    
                                        @csrf
                                        @method('delete')
                                    <p>Are you sure you want to delete this {{$user->name}} ?</p>
                                        <div class="modal-footer">
                                            <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </form>
                                      
                                    </div>
                                    
                                  </div>
                                    </div>
                                </div>
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header"><h4>Search user</h4></div>
                    <div class="card-body">
                        @livewire('item-search',['searchModel' => 'Users','searchColumns' => ['name','email','id'] ])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="modal right fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="staticBackdropLabel">Add User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>   
        </div>
        <div class="modal-body">
          <form action="{{route('users.store')}}" method="POST">
        
            @csrf

            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="" class="form-control @error('name') border border-danger @enderror" value="{{ old('name') }}">
                @error('name')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror  
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" id="" class="form-control @error('email') border border-danger @enderror" value="{{ old('email') }}">
                @error('email')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror 
            </div>

            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="" class="form-control @error('password') border border-danger @enderror">
                @error('password')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror 
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" name="confirm_password" id="" class="form-control @error('confirm_password') border border-danger @enderror">
                @error('confirm_password')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror 
            </div>
            <div class="form-group">
                <label for="">Role</label>
                <select name="is_admin" id="" class="form-control @error('is_admin') border border-danger @enderror" value="{{ old('is_admin') }}">
                    <option value="1">Admin</option>
                    <option value="2">Cashier</option>
                </select>
                @error('is_admin')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-block">Save User</button>
            </div>
        </form>
          
        </div>
        
      </div>
        </div>
    </div>

  <style>
      .modal.right .modal-dialog{
          top: 0;
          right: 0;
          margin-right: 3vh;
      }

      .modal-fade:not(.in).right .modal-dialog{
          -webkit-transform: translate3d(25%,0,0);
          transform: translate3d(25%, 0, 0);
      }
  </style>

@endsection