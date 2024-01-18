
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
      /* Your existing CSS styles */
      body {
        background: #eee;
        margin-top: 20px;
      }

      .text-danger strong {
        color: #9f181c;
      }

      .receipt-main {
        background: #ffffff none repeat scroll 0 0;
        border-bottom: 12px solid #333333;
        border-top: 12px solid #9f181c;
        margin-top: 50px;
        margin-bottom: 50px;
        padding: 40px 30px !important;
        position: relative;
        box-shadow: 0 1px 21px #acacac;
        color: #333333;
        font-family: open sans;
      }

      .receipt-main p {
        color: #333333;
        font-family: open sans;
        line-height: 1.42857;
      }

      .receipt-footer h1 {
        font-size: 15px;
        font-weight: 400 !important;
        margin: 0 !important;
      }

      .receipt-main::after {
        background: #414143 none repeat scroll 0 0;
        content: "";
        height: 5px;
        left: 0;
        position: absolute;
        right: 0;
        top: -13px;
      }

      .receipt-main thead {
        background: #414143 none repeat scroll 0 0;
      }

      .receipt-main thead th {
        color: #fff;
      }

      .receipt-right h5 {
        font-size: 16px;
        font-weight: bold;
        margin: 0 0 7px 0;
      }

      .receipt-right p {
        font-size: 12px;
        margin: 0px;
      }

      .receipt-right p i {
        text-align: center;
        width: 18px;
      }

      .receipt-main td {
        padding: 9px 20px !important;
      }

      .receipt-main th {
        padding: 13px 20px !important;
      }

      .receipt-main td {
        font-size: 13px;
        font-weight: initial !important;
      }

      .receipt-main td p:last-child {
        margin: 0;
        padding: 0;
      }

      .receipt-main td h2 {
        font-size: 20px;
        font-weight: 900;
        margin: 0;
        text-transform: uppercase;
      }

      .receipt-header-mid .receipt-left h1 {
        font-weight: 100;
        margin: 34px 0 0;
        text-align: right;
        text-transform: uppercase;
      }

      .receipt-header-mid {
        margin: 24px 0;
        overflow: hidden;
      }

      #container {
        background-color: #dcdcdc;
      }

      /* ... */
      /* Center-align the receipt */
      .receipt-main {
        margin: 0 auto;
        /* Center align the receipt */
        max-width: 600px;
        /* Set a maximum width for better readability */
      }
        /* Style the button */
  .btn2 {
    background-color: #008CBA;
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 10px 2px;
    cursor: pointer;
    border-radius: 5px;
  }




      /* ... */
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <div class="col-md-12">
        <div class="row">

             <!-- Your receipt content here -->
            <div class="col-md-12">
              <div class="row">
                <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                 <div class="row">
                 <button id="printButton" class="btn2" onclick="printAndHide()">Print</button>

                    <div class="receipt-header">
                      <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
                      <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="receipt-left">
                          <h3 class="text-end">INVOICE #{{$order->id}}</h3>
                        </div>
                      </div>
                       
                      </div>
                      <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                        <div class="receipt-right">

                          <h5>Product Name : {{$order->product_name}}</h5>


                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="receipt-header receipt-header-mid">
                      <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                        <div class="receipt-right">
                          <h5>Customer Name  : {{$order->name}}</h5>
                          <p>
                            <b>Mobile :</b> {{$order->phone}}
                          </p>
                          <p>
                            <b>Email :</b> {{$order->email}}
                          </p>
                          <p>
                            <b>Address :</b> {{$order->address}}
                          </p>
                        </div>
                      </div>

                    </div>
                  </div>
                  <div>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                           <th>Amount</th>
                        </tr>
                      </thead>
                      <tbody>

                        <tr>
                          <td class="text-right">
                          <p>
                              <strong>Quantity:</strong>
                            </p>
                            <p>
                              <strong>Amount Due:</strong>
                            </p>
                          </td>
                          <td>
                          <p>
                              <strong>
                                <i class="fa fa-inr"></i>  {{$order->total_qty}} Pieces</strong>
                            </p>

                            <p>
                              <strong>
                                <i class="fa fa-inr"></i>  {{$order->total_price}} 	&#2547;</strong>
                            </p>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-right">
                            <h2>
                              <strong>Total: </strong>
                            </h2>
                          </td>
                          <td class="text-left text-danger">
                            <h2>
                              <strong>
                                <i class="fa fa-inr"></i>  {{$order->total_price}} 	&#2547;</strong>
                            </h2>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="row">
                    <div class="receipt-header receipt-header-mid receipt-footer">
                      <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                        <div class="receipt-right">
                          <p>
                            <b>Date :</b> {{$order->created_at}}
                          </p>
                          <h5 style="color: rgb(140, 140, 140);">Thanks for shopping.!</h5>
                        </div>
                      </div>
                      <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="receipt-left">
                          <h1>Rakib Khan</h1>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
             </div>
            <!-- ... -->
            <!-- Add a "Print" button -->

          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script>
  function printAndHide() {
    $("#printButton").css("display", "none");
    window.print();
  }
</script>
</html>

