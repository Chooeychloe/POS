<nav class="active" id="sidebar">
    <ul class="list-unstyled lead">
        <li class="active">
            <a href=""><i class="fas fa-home"></i> Home</a>
        </li>
        <li>
            <a href="<?php echo e(route('orders.index')); ?>"><i class="fas fa-desktop fa-lg"></i> Orders</a>
        </li>
        <li>
            <a href="<?php echo e(route('transactions.index')); ?>"><i class="fas fa-money-bill fa-lg"></i> Transactions</a>
        </li>
        <li>
            <a href="<?php echo e(route('products.index')); ?>"><i class="fas fa-box fa-lg"></i> Products</a>
        </li>
       
    </ul>
</nav>

<style>

    #sidebar ul.lead{
        border-bottom: 1px solid #477748b;
        width: fit-content;
    }

    #sidebar ul li a{
        padding: 10px;
        font-size: 1.1em;
        display: block;
        width: 30vh;
        color: #008888;

            }
    #sidebar ul li a:hover{
      
        color: #fff;
        background: #008888;
        text-decoration: none !important;
     }

    #sidebar ul li a i{
        margin-right: 10px;

    }

    #sidebar ul li.active>a, a[aria-expanded="true"]{
        color: #fff;
        background: #008888;
    }

</style><?php /**PATH D:\Xampp\htdocs\POS\resources\views/layouts/includes/sideBar.blade.php ENDPATH**/ ?>