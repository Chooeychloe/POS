<div id="invoice-POS">
    <?php $total = 0;
        $tax = 0;
        $date = date("Y-m-d");
        // print_r($order_receipt);
    ?>
    <nav id="receipt-nav">
        <img src="/images/receipt-nav-bg.png" class="receipt-nav-bg">
        <div class="name-cotainer">
            <h1 class="company-name">STONE BASE</h1>
            
            <div class="info-email-number">
                <h6 class="email">stonebase@gmail.com</h6>
                <h6>+63912346754</h6>
            </div>
        </div>
        <div class="logo-container">
            <img class="logo" src="/images/logo.png" alt="logo">
        </div>
        
    </nav>
    
    <section class="heading">

        <div class="receipt-info">
            <div>
                <h6>
                    Serial #: 
                </h6>
                <h6>
                    Date:
                </h6>
                <h6>
                    Address:
                </h6>
            </div>
            <div>
                <h6><?= $serial = rand(1000, 10000)?></h6>
                <h6><?= $date ?></h6>
                <h6>Bacoor, Cavite</h6>
            </div>
        </div>
        <div>
            <h1 class="title">RECEIPT</h1>
        </div>
    </section>

    <main>
        <div class="t-head">
            <h3>Item</h3>
            <h3>Quantity</h3>
            <h3>Unit</h3>
            <h3>Discount</h3>
            <h3>Subtotal</h3>
            <img src="/images/receipt-thead-bg.jpg" class="t-head-bg">
        </div>

        <div class="t-body">
            {{-- ROW --}}
            @foreach ($order_receipt as $receipt)
            <div class="t-row">
                <h3>{{$receipt -> product-> product_name}}</h3>
                <h3>{{$receipt -> quantity}}</h3>
                <h3>₱{{number_format( $receipt -> unitprice, 2)}}</h3>
                <h3>{{$receipt -> discount ? ' ': '0'}}</h3>
                <h3>₱{{number_format( $receipt -> amount, 2)}}</h3>
            </div>

            @php
            
            @endphp

            <?php $total += $receipt->amount ?>

            @endforeach

        </div>
        <?php $tax = $total * 0.15;
            //  $total += $tax ?>
        {{-- Tax --}}
        <div class="tax-price">
            <h2>Tax</h2>
            <h2>₱0</h2>
        </div>
        {{-- Total price --}}
        <div class="total-price">
            <h2>₱<?= $total ?></h2>
        </div>
    </main>

    <footer>
        <div class="legalcopy">
            <p class="legal">
                <strong>** Thank you for visiting **
                <br>
                The goods are subject to taxes. Prices includes tax.
            </strong>
            </p>
        </div>
    </footer>
</div>

<style>

    *{
        font-family: Nunito, Arial, Helvetica, sans-serif;
        margin: 0;
    }

    #receipt-nav{
        max-height: 15mm;
        display: flex;
        justify-content: space-between;
        position: relative;
    }

    .receipt-nav-bg {
        position: absolute;
        width: 80%;
    }

    .logo{
        width: 15mm;
        height: auto;
        margin: auto;
    }

    .logo-container{
        display: flex;
        justify-content: center;
        width: 22mm;
    }

    .name-cotainer{
        display: flex;
        justify-content: center;
        position: relative;
        flex-direction: column;
    }

    .company-name{
        font-size: 20px;
        color: rgb(255,255,255);
        text-align: center;
        margin: auto 10px;
    }

    .infos{
        position: absolute;
        bottom: 0;
        display: flex;
        flex-direction: column;
        height: 20px;
        padding: 0 10px;
    }

    .infos h6 {
        color: rgba(255,255,255,0.7);
        font-size: 2mm;
    }

    .info-email-number{
        display: flex;
        justify-content: space-between;
        padding-left: 10px;
    }

    .info-email-number h6{
        color: rgba(255,255,255,0.7);
        font-size: 2mm;
    }

    .heading {
        display: flex;
        justify-content: space-between;
        padding: 20px 10px;
    }

    .heading .title {
        color: #1482C0;
        font-size: 20px;
        margin: auto 0;
    }

    .heading h6 {
        color: rgba(0,0,0,0.7);
        font-size: 6px;
    }

    .receipt-info {
        display: flex;
    }

    .receipt-info div {
        margin: 0 3px;
    }

    #invoice-POS{
        box-shadow: 0 0 1in -0.25in rgb(0, 0, 0.5);
        margin: 0 auto;
        width: 70mm;
        background: #fff;
        padding-bottom: 20px;
    }
    
    .t-head {
        padding: 10px 10px;
        display: flex;
        justify-content: space-evenly;
        position: relative;
    }

    .t-head h3{
        font-size: 8px;
        color: #fff;
        text-align: center;
        width: 100%;
        z-index: 20;
        margin-top: 10px;
    }

    .t-head h3:nth-child(1){
        margin-right: 50px;
    }

    .t-row h3:nth-child(1){
        margin-right: 50px;
    }

    .t-head-bg {
        position: absolute;
        z-index: 10;
        width: 100%;
        
    }

    .t-body {
        display: flex;
        flex-direction: column;
        padding: 5px 0;
    }

    .t-row {
        padding: 10px 10px;
        display: flex;
        justify-content: space-evenly;
    }

    .t-row h3{
        font-size: 8px;
        color: rgb(38, 37, 37);
        text-align: center;
        width: 100%;
    }

    .t-row:nth-child(even) {
       background-color: rgb(243,243,243);
    }

    .total-price {
        background: url('/images/receipt-total-bg.jpg');
        background-size: 100%;
        background-repeat: no-repeat;
        width: 30mm;
        margin-top: 5px;
        margin-left: auto;
        margin-right: 5px;
        margin-bottom: 10px;
        display: flex;
        justify-content: end;
        padding: 5px 5px;
    }

    .total-price h2 {
        color: #fff;
        font-size: 12px;
        width: 100%;
        text-align: right;
    }

    .legalcopy {
        font-size: 8px;
        color: rgba(0,0,0,0.5);
        text-align: center;
        margin-top: 10px;
        margin-bottom: 5px; 
    }

    .tax-price {
        width: 30mm;
        margin-top: 5px;
        margin-left: auto;
        margin-right: 5px;
        margin-bottom: 5px;
        display: flex;
        justify-content: end;
        padding: 5px 5px;
    }

    .tax-price h2 {
        color: rgba(0,0,0,0.6);
        font-size: 10px;
        width: 100%;
        text-align: right;
    }


</style>