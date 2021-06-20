@extends('layouts.app')

@section('content')

<div class="container-fluid">
    
    @if (session('success'))
    <section class="alert-added">
        <div class="alert alert-success col-12 d-flex justify-content-between">
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
                        <h4 style="float: left"><i class="fas fa-box"></i> Products</h4>
                        <a href="#" style="float: right" class="btn btn-dark add-item" 
                        data-toggle="modal" data-target="#addproduct">
                            <i class="fas fa-plus"> Add New Products</i></a></div>
                    <div class="card-body">
                        <table class="table table-bordered table-left">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Alert Stock</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->brand}}</td>
                                    <td>{{number_format($product->price,2)}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>@if ($product->alert_stock >= $product->quantity) 
                                        <span class="badge badge-danger">
                                        Low Stock: must be > {{$product->alert_stock}}</span>
                                    @else
                                        <span class="badge badge-success">{{$product->alert_stock}}</span>
                                    @endif
                                        </td>
                                    <td>{{$product->description}}</td>
                                    
                                   <td>
                                       <div class="btn-group">
                                           <a href="#" class="btn btn-info btnt-sm"
                                           data-toggle="modal" 
                                           data-target="#editproduct{{$product->id}}">
                                               <i class="fas fa-edit"> Edit</i></a>
                                               <a href="#"  data-toggle="modal" 
                                               data-target="#deleteproduct{{$product->id}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                       </div>
                                   </td>
                                </tr>
                                <div class="modal right fade" id="editproduct{{$product->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title" id="staticBackdropLabel">Edit product</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                      {{$product->id}}   
                                    </div>
                                    <div class="modal-body">
                                      <form action="{{route('products.update', $product->id)}}" method="POST">
                                    
                                        @csrf
                                        @method('put')
                                        <div class="form-group">
                                            <label for="">Product Name</label>
                                            <input type="text" name="product_name" id="" value="{{$product->product_name}}" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Brand</label>
                                            <input type="text" name="brand" id="" value="{{$product->brand}}" class="form-control">

                                        </div>            

                                        <div class="form-group">
                                            <label for="">Price</label>
                                            <input type="number" name="price" id="" value="{{$product->price}}"class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Quantity</label>
                                            <input type="number" name="quantity" id="" value="{{$product->quantity}}" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Alert Stock</label>
                                            <input type="number" name="alert_stock" id="" value="{{$product->alert_stock}}" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea name="description" id=""cols="30" rows="2" class="form-control">{{$product->description}}</textarea>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button class="btn btn-primary btn-block">Update Product</button>
                                        </div>
                                    </form>
                                      
                                    </div>
                                    
                                  </div>
                                    </div>
                                </div>

                                <div class="modal right fade" id="deleteproduct{{$product->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title" id="staticBackdropLabel">Delete product</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                      {{$product->id}}   
                                    </div>
                                    <div class="modal-body">
                                      <form action="{{route('products.destroy', $product->id)}}" method="POST">
                                    
                                        @csrf
                                        @method('delete')
                                    <p>Are you sure you want to delete this {{$product->product_name}}?</p>
                                        <div class="modal-footer">
                                            <button class="btn btn-info" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </form>
                                      
                                    </div>
                                    
                                  </div>
                                    </div>
                                </div>
                                @endforeach
                                {{ $products->links() }}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3"><div class="card">
                <div class="card-header"><h4>Search product</h4></div>
                    <div class="card-body">
                        ...
                    </div>
            </div></div>
        </div>
    </div>
</div>
    <div class="modal right fade" id="addproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="staticBackdropLabel">Add product</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>   
        </div>
        <div class="modal-body">
          <form action="{{route('products.store')}}" method="POST">
        
            @csrf

            <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" name="product_name" value="{{ old('product_name') }}" id="" class="form-control @error('product_name') border border-danger @enderror">
                @error('product_name')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Brand</label>
                <input type="text" name="brand" id="" class="form-control">

            </div>            

            <div class="form-group">
                <label for="">Price</label>
                <input type="number" name="price" id="" class="form-control @error('price') border border-danger @enderror" value="{{ old('price') }}">
                @error('price')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Quantity</label>
                <input type="number" name="quantity" id="" class="form-control @error('quantity') border border-danger @enderror" value="{{ old('quantity') }}">
                @error('quantity')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Alert Stock</label>
                <input type="number" name="alert_stock" id="" class="form-control @error('alert_stock') border border-danger @enderror" value="{{ old('alert_stock') }}">
                @error('alert_stock')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" id="" cols="30" rows="2" class="form-control @error('description') border border-danger @enderror" value="{{ old('description') }}"></textarea>
                @error('description')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            
            <div class="modal-footer">
                <button class="btn btn-primary btn-block">Save Product</button>
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
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection
