<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        <h4 style="float: left">Order Products</h4>
                        <a href="#" style="float: right" class="btn btn-dark" data-toggle="modal"
                            data-target="#addproduct">
                            <i class="fas fa-plus"> Add New Products</i></a>
                    </div>

                    <form action="{{ route('orders.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="my-2">
                                {{ $product_code }}
                                <input type="text" name="" wire:model="product_code" id="" class="form-control" placeholder="Enter product code">
                            </div>
                            <table class="table table-bordered table-left">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Discount(%)</th>
                                        <th>Total</th>
                                        <th><a href="#" class="btn btn-sm btn-success rounded-circle add_more"><i
                                                    class="fas fa-plus-circle"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody class="addMoreProduct">
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <select name="product_id[]" id="product_id" class="form-control product_id">
                                                <option value="">Select Item</option>
                                                @foreach ($products as $product)
                                                    <option data-price="{{ $product->price }}"
                                                        value="{{ $product->id }}">{{ $product->product_name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </td>
                                        <td>
                                            <input type="number" name="quantity[]" id="quantity"
                                                class="form-control quantity">
                                        </td>
                                        <td>
                                            <input type="number" name="price[]" id="price" class="form-control price">
                                        </td>
                                        <td>
                                            <input type="number" name="discount[]" id="discount"
                                                class="form-control discount">
                                        </td>
                                        <td>
                                            <input type="number" name="total_amount[]" id="total_amount"
                                                class="form-control total_amount">
                                        </td>
                                        <td><a href="#" class="btn btn-sm btn-danger rounded-circle"><i
                                                    class="fas fa-trash"></i></a></td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Total <b class="total"> 0.00</b></h4>
                    </div>
                    <div class="card-body">
                        <div class="btn-group">
                            <button type="button" onclick="PrintReceiptContent('print')" class="btn btn-dark">
                                <i class="fas fa-print"></i> Print
                            </button>
                            <button type="button" onclick="PrintReceiptContent('print')" class="btn btn-primary">
                                <i class="fas fa-print"></i> History
                            </button>
                            <button type="button" onclick="PrintReceiptContent('print')" class="btn btn-danger">
                                <i class="fas fa-chart"></i> Report
                            </button>
                        </div>
                        <div class="panel">
                            <div class="row">
                                <table class="table table-striped">
                                    <tr>
                                        <td>

                                            <label for="">Customer Name</label>
                                            <input type="text" name="customer_name" id="form-control">
                                        </td>
                                        <td>
                                            <label for="">Customer Phone Number</label>
                                            <input type="number" name="customer_phone" id="form-control">
                                        </td>
                                    </tr>
                                </table>
                                <td>
                                    Payment Method <br>
                                    <span class="radio-item">
                                        <input type="radio" name="payment_method" id="payment_method" class="true"
                                            value="cash" checked="checked">
                                        <label for="payment_method"><i class="fas fa-money-bill text-success"></i>
                                            Cash</label>
                                    </span>
                                    <span class="radio-item">
                                        <input type="radio" name="payment_method" id="payment_method" class="true"
                                            value="bank transfer">
                                        <label for="payment_method"><i class="fas fa-university text-danger"></i>
                                            Bank</label>
                                    </span>
                                    <span class="radio-item">
                                        <input type="radio" name="payment_method" id="payment_method" class="true"
                                            value="credit card">
                                        <label for="payment_method"><i class="fas fa-credit-card text-info"></i> Credit
                                            Card</label>
                                    </span>
                                </td> <br>
                                <td>
                                    Payment
                                    <input type="number" name="paid_amount" id="paid_amount" class="form-control">
                                </td>
                                <td>
                                    Change
                                    <input type="number" readonly name="balance" id="balance" class="form-control">
                                </td>
                                <td>
                                    <button class="btn-primary btn-lg btn-block mt-3">Save</button>
                                </td>
                                <td>
                                    <button class="btn-danger btn-lg btn-block mt-2">Calculator</button>
                                </td>
                                <br>
                                <div class="text-center">
                                    <a href="#" class="text-danger"><i class="fas fa-sign-out-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal right fade" id="addproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Add product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.store') }}" method="POST">

                    @csrf

                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" name="product_name" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Brand</label>
                        <input type="text" name="brand" id="" class="form-control">

                    </div>

                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" name="price" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="number" name="quantity" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Alert Stock</label>
                        <input type="number" name="alert_stock" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" id="" cols="30" rows="2" class="form-control"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary btn-block">Save Product</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
