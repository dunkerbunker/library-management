<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body{
            background-color: #F6F6F6; 
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
           height: 140px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            left: 40px;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
    </style>
</head>
<body>
<!-- borrowers.borrower_name', 'borrowers.IC', 'borrowers.phone_no' ,'books.ISBN', 
'books.book_title', 'books.year','books.author', 'books.publisher_name',
 borrows.issue_date', 'borrows.due_date', 'late_returns.late_return_fines' -->
    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">Maldives Public Library </h1>
                </div>
                <div class="">
                    <div class="company-details">
                        <p class="text-white">Majeedhi Magu, Male, Maldives</p>
                        <p class="text-white">MPL@gov.com.mv</p>
                        <p class="text-white">+960 3339756</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="">
                <div class="">
                    <h2 class="heading">Late Return No: {{$late_book->first()->id}}</h2>
                    <p class="sub-heading">Date: {{$today}} </p>
                    <p class="sub-heading">Time: {{$time}} </p>
                    <p class="sub-heading">Handled by: {{ $LoggedUserInfo['name'] }} </p>
                </div>
                <br>
                <br>
                <div class="">
                <h2 class="heading">Borrower Info.</h2>
                    <p class="sub-heading">Full Name: {{$late_book->first()->borrower_name}} </p>
                    <p class="sub-heading">IC: {{$late_book->first()->IC}}</p>
                    <p class="sub-heading">Phone Number: {{$late_book->first()->phone_no}}</p>
                    <p class="sub-heading">Address: {{$late_book->first()->address}}</p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Borrowed Book Payment</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Book Name</th>
                        <th class="w-20">ID</th>
                        <th class="w-20">Overdue Days</th>
                        <th class="w-20">Fine</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$late_book->first()->book_title}}</td>
                        <td>{{$late_book->first()->ISBN}}</td>
                        <td>{{ $overdue }}</td>
                        <td>MVR {{$late_book->first()->payment}}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Tax Total %</td>
                        <td>0%</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Grand Total</td>
                        <td>MVR {{$late_book->first()->payment}}</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h3 class="heading">Payment Status: Paid</h3>
            <h4 class="heading">Each day past due date is 5 MVR/-</h4>
        </div>

        <div class="body-section">
            <p>&copy; Copyright 2021 - Maldives Public Library. All rights reserved. 
            </p>
        </div>      
    </div>      

</body>
</html>
