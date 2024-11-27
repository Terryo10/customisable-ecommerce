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
            /* Centers the table and adds margin */
        }

        th,
        td {
            border: 2px solid #3498db;
            /* Blue solid border */
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            /* Light grey background for headers */
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
            /* Alternating row colors */
        }

        table {
            border: 3px double #e74c3c;
            /* Double red border around the table */
            border-radius: 10px;
            /* Rounded corners */
            overflow: hidden;
            /* Ensures rounded corners are applied to the table */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="main">
            <div class="header">
                <h1>SlimRiff</h1>
                <h1>Invoice</h1>
            </div>

            <div class="list">
                <ul>
                    <li>Total Money : {{ $order->total ?? "0" }}</li>

                </ul>
                <h2>Invoice Information</h2>
                <table>
                    <thead>
                        <th>Product</th>
                        <th>Status</th>
                        <th>Quantity</th>
                        <th>Options Selected</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ "" }}</td>
                            <td>{{ "" }}</td>
                            <td>{{ "" }}</td>
                            <td>{{ "" }}</td>
                        </tr>
                    </tbody>
                </table>


            </div>
            <div class="site-data">
                <div class="item">
                    <h3><strong>Invoice To Name:</strong></h3>
                    <p>
                        {!! $order->user->name !!}
                    </p>
                </div>
                <div class="item">
                    <h3><strong>Invoice To Email:</strong></h3>
                    <p>
                        {!! $order->user->email !!}
                    </p>
                </div>
            </div>
        </div>
        <div class="aside">
            <div class="brand">
                <img width="100" height="30" src="assets/assets/img/website.png" />
            </div>
        </div>
    </div>
</body>

</html>