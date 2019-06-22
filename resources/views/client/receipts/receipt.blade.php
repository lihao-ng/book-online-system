<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Invoice</title>

  <style type="text/css">
    @page {
      margin: 0px;
    }
    body {
      margin: 0px;
    }
    * {
      font-family: Verdana, Arial, sans-serif;
    }
    a {
      color: #fff;
      text-decoration: none;
    }
    table {
      font-size: x-small;
    }
    tfoot tr td {
      font-weight: bold;
      font-size: x-small;
    }
    .invoice table {
      margin: 15px;
    }
    .invoice h3 {
      margin-left: 15px;
    }
    .information {
      background-color: #2f2b35;
      color: #FFF;
    }
    .information .logo {
      margin: 5px;
    }
    .information table {
      padding: 10px;
    }
  </style>
</head>
<body>

  <div class="information">
    <table width="100%">
      <tr>
        <td align="left" style="width: 40%;">
          <h3>{{ $customer->name }}</h3>
          <pre>
            Address: {{ $address }}
            E-mail: {{ $customer->email }}
            Contact: {{ $customer->mobile }}
            Collection: {{ $collection }}
            Payment: {{ $payment }}
          </pre>


        </td>
       <!--  <td align="center">
          <img src="/path/to/logo.png" alt="Logo" width="64" class="logo"/>
        </td> -->
        <td align="right" style="width: 40%;">

          <h3>BOOKIE</h3>
          <pre>
            https://lihao.tth.asia

            57, 11/3L, Sunway University
            47100 Puchong,
            SELANGOR
          </pre>
        </td>
      </tr>
    </table>
  </div>

  <br/>

  <div class="invoice">
    <h3>Invoice specification</h3>
    <table width="100%">
      <thead>
        <tr>
          <th>Book</th>
          <th>Quantity</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach($orders as $order)
        <tr>
          <td>{{ $order['book']->title }}</td>
          <td>{{ $order['amount'] }}</td>
          <td align="left">RM {{ $order['total'] }}</td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <td colspan="1"></td>
          <td align="left">Total</td>
          <td align="left" class="gray">RM {{ $sum }}</td>
        </tr>
      </tfoot>
    </table>
  </div>

  <div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
      <tr>
        <td align="left" style="width: 50%;">
          &copy; {{ date('Y') }} https://lihao.tth.asia - All rights reserved.
        </td>
      </tr>
    </table>
  </div>
</body>
</html>