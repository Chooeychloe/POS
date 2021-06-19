<a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-outline rounder-pill"><i class="fas fa-list"></i></a>
<a href="{{ route('users.index')}}" class="btn btn-outline rounder-pill"><i class="fas fa-user"></i> Users</a>
<a href="{{ route('products.index')}}" class="btn btn-outline rounder-pill"><i class="fas fa-box"></i> Products</a>
<a href="{{ route('orders.index')}}" class="btn btn-outline rounder-pill"><i class="fas fa-desktop"></i> Cashier</a>
<a href="#" class="btn btn-outline rounder-pill"><i class="fas fa-file"></i> Reports</a>
<a href="#" class="btn btn-outline rounder-pill"><i class="fas fa-money-bill"></i> Transactions</a>
<a href="#" class="btn btn-outline rounder-pill"><i class="fas fa-chart-area"></i> Suppliers</a>
<a href="#" class="btn btn-outline rounder-pill"><i class="fas fa-users"></i> Customers</a>
<a href="#" class="btn btn-outline rounder-pill"><i class="fas fa-truck"></i> Incoming</a>
<a href="{{ route('products.barcode')}}" class="btn btn-outline rounder-pill"><i class="fas fa-barcode"></i> Barcodes</a>


<style>
    .btn-outline{
        border-color: #008888;
        color: #008888 ;
    }
    .btn-outline:hover{
        background: #008888;
        color: #fff ;
    }

</style>