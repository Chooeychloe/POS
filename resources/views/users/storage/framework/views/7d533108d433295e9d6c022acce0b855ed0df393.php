<div id="invoice-POS">
    <div id="printed_content">

        <center id="logo">
            <div class="logo"> PEPAY's</div>
            <div class="info"></div>
            <h2>Pepay's PEPS Ltd</h2>
        </center>
    </div>
    
    <div class="mid test-class">
        <div class="info">
            <h2>Contact Us</h2>
            <p>
                Address : Bacoor, Cavite
                Email : fey@gmail.com
                Phone : +639 99 9999 999
            </p>
        </div>
    </div>
    <div class="bot">
        <div id="table">
            <table>
                <tr class="tabletitle">
                    <td class="item"><h2>Item</h2></td>
                    <td class="Hours"><h2>Quantity</h2></td>
                    <td class="Rate"><h2>Unit</h2></td>
                    <td class="Rate"><h2>Discount</h2></td>
                    <td class="Rate"><h2>Subtotal</h2></td>
                </tr>
                <?php $__currentLoopData = $order_receipt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receipt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                <tr class="service">
                    <td class="tableitem"><p class="itemtext"><?php echo e($receipt -> product-> product_name); ?></p></td>
                    <td class="tableitem"><p class="itemtext"><?php echo e(number_format( $receipt -> unitprice, 2)); ?></p></td>
                    <td class="tableitem"><p class="itemtext"><?php echo e($receipt -> quantity); ?></p></td>
                    <td class="tableitem"><p class="itemtext"><?php echo e($receipt -> discount ? ' ': '0'); ?></p></td>
                    <td class="tableitem"><p class="itemtext"><?php echo e(number_format( $receipt -> amount, 2)); ?></p></td>
                   
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr class="tabletitle">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="Rate"> <p class="itemtext">Tax</p> </td>
                    <td class="Payment"><p class="itemtext">Sub Total Php<?php echo e(number_format( $receipt -> amount, 2)); ?></p></td>
                </tr>
                <tr class="tabletitle">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="Rate"> Total </td>
                    <td class="Payment"<?php echo e(number_format( $receipt -> sum('amount'), 2)); ?>><h2>
                    </h2> </td>
                </tr>
            </table>

            <div class="legalcopy">
                <p class="legal">
                    <strong>** Thank you for visiting **
                    <br>
                    The goods are subject to taxes. Prices includes tax.
                </strong>
                </p>
            </div>
            <div class="serial-number">
               Serial #: <span class="serial">
                    12345567888 <br>
                </span>
                <span> 215/06/2020 &nbsp; &nbsp; 15: 06</span>
            </div>
        </div>
    </div>
</div>

<style>
    #invoice-POS{
        box-shadow: 0 0 1in -0.25in rgb(0, 0, 0.5);
        padding: 2mm;
        margin: 0 auto;
        width: 70mm;
        background: #fff;

    }
    #invoice-POS ::selection{
        background: #34495E;
        color: #fff;
    }

    #invoice-POS ::-moz-selection{
        background: #34495E;
        color: #fff;
    }
    #invoice-POS h1{
        font-size: 1.5em;
        columns: #222;
    }
    #invoice-POS h2{
        font-size: 0.5xem;
    
    }
    #invoice-POS h3{
        font-size: 1.2em;
        font-weight: 300;
        line-height: 2em;
    }
    #invoice-POS p{
        font-size: 0.7em;
        color: #666;
        line-height: 1.2em;
    }
    #invoice-POS #top, #invoice-POS #mid, #invoice-POS #bot{
        border-bottom: 1px solid #eee;
    
    }
    #invoice-POS #top{
        min-height: 100px;

    }
    #invoice-POS #mid{
        min-height: 80px;

    }
    #invoice-POS #bot{
        min-height: 50px;

    }
    #invoice-POS #top .logo{
        height: 60px;
        width: 60px;
        background-image: url() no-repeat;
        background-size: 60px 60px;
        border-radius: 50px ;
    }
    #invoice-POS .info {
       display: block;
       margin-left: 0;
       text-align: center;
    }
    #invoice-POS .title{
       float: right;
    }
    #invoice-POS .title p{
       text-align: right;
    }
    #invoice-POS table{
       width: 100%;
       border-collapse: collapse;
    }

    #invoice-POS .tabletitle{
        font-size: 0.5em;
        background: #eee;
    }
    #invoice-POS .service{
        border-bottom: 1px solid #eee;
    }
    #invoice-POS .item{
        width: 24mm;
    }
    #invoice-POS .itemtext{
        font-size: 0.5em;
    }

    #invoice-POS #legalcopy{
        margin-top: 5mm ;
        text-align: center;
    }
    .serial-number{
        margin-top: 5mm;
        margin-bottom: 2mm;
        text-align: center;
        font-size: 12px;
    }
    .serial{
        font-size: 10px !important;
    }


</style><?php /**PATH D:\Xampp\htdocs\POS\resources\views/reports/receipt.blade.php ENDPATH**/ ?>