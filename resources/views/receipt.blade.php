<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pdf Template</title>

    <style>
        /* @font-face {
            font-family: myFirstFont;
            src: url(assets/css/ReadexPro-Light.ttf);
        } */


        body {
            font-family: 'Arial', sans-serif;
            margin: 0px;
        }

        .aside {
            width: 20%;
            height: 100%;
            background-color: #EEEFF0;
            float: right;
            /* align items center top */
            /* padding-left: 20px; */
            position: fixed;
            right: 0;
        }

        .brand {
            padding-left: 20px;
            padding-top: 70px;
        }

        .brand p {
            font-size: 15px;
            color: #BAC0FF;
            /* float: right; */
            /* margin-left: 40px; */
            padding: 0px;
            margin-top: 0px;
        }

        .main {
            width: 80%;
            height: 100vh;
            background-color: white;
            float: left;
            position: fixed;
            left: 0;
        }

        ul {
            list-style-type: none;
            border-left: 3px solid #BAC0FF;
        }

        /* add opacity to header headings */
        .header h1 {
            opacity: 0.2;
            font-size: 50px;
            margin: 0px;
        }

        .header {
            padding-left: 60px;
            padding-top: 60px;
            padding-bottom: 60px;


        }

        .list ul {
            padding-left: 20px;
        }

        .list {
            padding-left: 60px;
        }

        .site-data {
            padding-left: 60px;
            padding-right: 60px;
            padding-bottom: 60px;
            /*  center elements */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

        }

        table {
            border-collapse: collapse;
            /* Collapses borders between cells */
            margin: 0px auto;
            /* Centers the table */
            border: 3px double #0b940b;
            /* Double red border around the table */
            border-radius: 10px;
            /* Rounded corners */
            overflow: hidden;
            /* Ensures rounded corners are applied to the table */
            table-layout: fixed;
            /* Ensures cells do not expand beyond their width */
            width: 100%;
            /* Optional: Define a fixed width for the table */
        }

        th,
        td {
            border: 2px solid #3498db;
            /* Blue solid border */
            padding: 10px;
            text-align: left;
            width: 70px;
            /* Adjust as needed */
            word-break: break-word;
            /* Break words if they are too long */
            overflow-wrap: break-word;
            /* Modern browsers prefer this */
            hyphens: auto;
            /* Enables hyphenation when supported */
        }

        th {
            background-color: #f2f2f2;
            /* Light grey background for headers */
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
            /* Alternating row colors */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="main">
            <div class="header">
                @php
                $app_title = env('APP_NAME') ?? "N/A";
                @endphp
                <h1>{{$app_title}}</h1>
                <h1>Receipt</h1>
            </div>

            <div class="list">
                <ul>
                    <li>Total Money : ${{ $order->total ?? "0" }}</li>

                </ul>
                <h2>Receipt Information</h2>
                <table>
                    <thead>
                        <th>Product</th>
                        <th>Status</th>
                        <th>Quantity</th>
                        <th>Options Selected</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $order->product->name ?? "" }}</td>
                            <td>{{ $order->status ?? "N/A" }}</td>
                            <td>{{ $order->quantity ?? "" }}</td>
                            <td>
                                @php

                                $data = json_decode($order->fields ?? "[]");
                                $data = json_decode($data ?? "[]");
                                @endphp
                                @foreach ($data as $fild)

                                <div class="short-desc section">
                                    <h5 class="pd-sub-title">
                                        Additional Option Name : {{$fild->name}}
                                    </h5>
                                    <p>
                                        Additional Option Value : {{$fild->value}}
                                    </p>
                                </div>

                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>


            </div>
            <div class="site-data">
                <div class="item">
                    <h3><strong>Product Bar Code:</strong></h3>
                    <p>
                        {!! $order->product->barcode ?? "N/A" !!}
                    </p>
                </div>
                <div class="item">
                    <h3><strong>Receipt To Name:</strong></h3>
                    <p>
                        {!! $order->user->name !!}
                    </p>
                </div>
                <div class="item">
                    <h3><strong>Receipt To Email:</strong></h3>
                    <p>
                        {!! $order->user->email !!}
                    </p>
                </div>
            </div>
        </div>
        <div class="aside">
            <div class="brand">
                <img width="100" height="70" src="logo1.png" />
            </div>
        </div>
    </div>
</body>

</html>