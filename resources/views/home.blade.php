@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-9">
            <div class="card">
                <h4 class="card-header" style="background: #008888; color:#fff"><marquee behavior="" direction="">Welcome to Pepay's peps store</marquee></h4>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        {{-- TOP CARDS --}}
                        <div class="row">
                        </div>
                        <div class="row">
                            <div class="col-lg-6 py-1 px-1">
                                <div class="">
                                    <canvas id="productChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>    
                  
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <div class="mx-auto width-reactive overflow-hidden">
                        <a href="/users" class="bg-primary bg-gradient p-3 rounded d-inline-block m-1 w-card text-decoration-none">
                            <div class="d-flex justify-content-between">
                                <div class="text-white">
                                    <ion-icon class="fs-icon"
                                     name="person-outline"></ion-icon>
                                </div>
                                <div class="text-white text text-end">
                                    <h3 class="fs-2" id="admin-count">-</h3>
                                    <h6>ADMIN</h6>
                                </div>
                            </div>
                        </a>
                        <a href="/users" class="bg-success bg-gradient p-3 rounded d-inline-block m-1 w-card text-decoration-none">
                            <div class="d-flex justify-content-between">
                                <div class="text-white">
                                    <ion-icon class="fs-icon"
                                     name="person-circle-outline"></ion-icon>
                                </div>
                                <div class="text-white text text-end">
                                    <h3 class="fs-2" id="cashier-count">-</h3>
                                    <h6>CASHIER</h6>
                                </div>
                            </div>
                        </a>
                        <a href="/products" class="bg-info bg-gradient p-3 rounded d-inline-block m-1 w-card text-decoration-none">
                            <div class="d-flex justify-content-between">
                            <div class="text-white">
                                 <ion-icon class="fs-icon" name="layers-outline"></ion-icon>
                            </div>
                            <div class="text-white text text-end">
                                <h3 class="fs-2" id="product-count">-</h3>
                                <h6>PRODUCTS</h6>
                            </div>
                        </div>
                        </a>
                        <a href="" class="bg-secondary bg-gradient p-3 rounded d-inline-block m-1 w-card text-decoration-none">
                            <div class="d-flex justify-content-between">
                            <div class="text-white">
                                 <ion-icon class="fs-icon" name="people-outline"></ion-icon>
                            </div>
                            <div class="text-white text text-end">
                                <h3 class="fs-2" id="supplier-count">-</h3>
                                <h6>SUPPLIERS</h6>
                            </div>
                        </div>
                        </a>
                        <a href="" class="bg-primary bg-gradient p-3 rounded d-inline-block m-1 w-card text-decoration-none">
                            <div class="d-flex justify-content-between">
                            <div class="text-white flex">
                                 <ion-icon class="fs-icon" name="cart-outline"></ion-icon>
                            </div>
                            <div class="text-white text text-end">
                                <h3 class="fs-2" id="order-count">-</h3>
                                <h6>ORDERS</h6>
                            </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .width-reactive {
        width: min-content;
        max-width: 100%;
    }
    @media only screen and (max-width: 1200px) {
        .width-reactive {
            width: max-content;
        }
    }
</style>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js" integrity="sha512-VCHVc5miKoln972iJPvkQrUYYq7XpxXzvqNfiul1H4aZDwGBGC0lq373KNleaB2LpnC2a/iNfE5zoRYmB4TRDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    
function getProducts(){
    $.get("/api/product", function(response){
        const products = response.data;
        var totalProducts = 0;
        var productNames = [];
        var productQuantity = [];
        var productChart = document.getElementById('productChart').getContext('2d');
        // console.log(products);
        for(var i = 0; i < products.length; i++){
            totalProducts++;
            productNames[i] = products[i].product_name;
            productQuantity[i] = products[i].quantity;
        }
        
        var myChart = new Chart(productChart, {
            type: 'bar',
            data: {
                labels: productNames,
                datasets: [{
                    label: 'Products',
                    data: productQuantity,
                    backgroundColor: [
                        'rgba(34, 230, 216, 0.5)',
                    ],
                    borderColor: [
                        'rgba(34, 230, 216, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        $("#product-count").html(totalProducts);
    });
}

function getUsers(){
    $.get("/api/users", function(response){
        const users = response.data;
        var adminCount = 0;
        var cashierCount = 0;
        // console.log(users);
        for(var i = 0; i < users.length; i++){
            if(users[i].is_admin == 2){
                adminCount++;
                continue;
            }
            cashierCount++;
        }
        $("#admin-count").html(adminCount);
        $("#cashier-count").html(cashierCount);
    });    
}

function getSuppliers(){
    $.get("/api/suppliers", function(response){
        const suppliers = response.data;
        var supplierCount = 0;
        
        // console.log(suppliers);
        for(var i = 0; i < suppliers.length; i++){
            supplierCount++;
        }
        $("#supplier-count").html(supplierCount);
    }); 
}

function getOrders(){
    $.get("/api/orders", function(response){
        const orders = response.data;
        var orderCount = 0;
        
        // console.log(users);
        for(var i = 0; i < orders.length; i++){
            orderCount++;
        }
        $("#order-count").html(orderCount);
    }); 
}

$(document).ready(function(){
    getProducts();
    getUsers();
    getSuppliers();
    getOrders();
})
    
</script>
@endsection
