<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body>
    <div class="row">
        <div class="col-2 Left_Side">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Chat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Special Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Documentation</a>
                </li>

            </ul>
        </div>
        <div class="col-9">
            <div class="filter">
                <form action="/api/least-ordered-products-per-day" method="get">
                <div class="mb-2 date">
                    <label for="exampleFormControlInput1" class="">From </label>
                    <input @if(!empty($from)) value="{{$from}}" @endif type="date" name="from" class="form-control" id="from">
                </div>
                <div class="mb-2 date">
                    <label for="exampleFormControlInput1" class="">To </label>
                    <input @if(!empty($to)) value="{{$to}}" @endif type="date" name="to" class="form-control" id="to" p>
                    
                </div>
                <div class="date">
                    <label for="exampleFormControlInput1" class="">day </label>
                    <select name="day" id="day" class="form-select" >
                        <option>Select day</option>
                        <option
                        @if(!empty($day))
                         @if( $day =='Saturday' ) selected @endif
                         @endif value="Saturday">
                            saturday
                        </option>
                        <option 
                            @if(!empty($day))
                         @if( $day =='Sunday' ) selected @endif
                         @endif
                        value="Sunday">
                        sunday
                        </option>
                        <option
                        @if(!empty($day))
                         @if( $day =='Monday' ) selected @endif
                         @endif
                         value="Monday">
                            monday
                        </option>
                        <option 
                        @if(!empty($day))
                         @if( $day =='Tuesday' ) selected @endif
                         @endif
                        value="Tuesday">
                            Tuesday
                        </option>
                        <option 
                        @if(!empty($day))
                         @if( $day =='Wednesday' ) selected @endif
                         @endif
                        value="Wednesday">
                        Wednesday
                    </option>
                        <option
                        @if(!empty($day))
                         @if( $day =='Thursday' ) selected @endif
                         @endif
                         value="Thursday">
                         Thursday
                        </option>
                        <option 
                        @if(!empty($day))
                         @if( $day =='Friday' ) selected @endif
                         @endif
                        value="Friday">
                        Friday
                    </option>
                    </select>
                </div>
                <div class="btns">
                    <!-- <button onclick="checkDateValue()"  type="button" class="btn btn-primary Generate">Generate</button> -->
                    <button   type="submit" class="btn btn-primary Generate">Generate</button>
                    @if(!empty($data))
                    <button onclick="exportData()" type="button" class="btn btn-primary Export">Export</button>
                    @endif
                </div>
                </form>
            </div>

            <div class="data_table">
                <table class="table table-borderless" id="dataTable">

                    <thead>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Times been ordered</th>
                        <th>Merchant name</th>
                    </thead>

                    <tbody>
                        @if(!empty($data))
                        <!-- <h1> There are no data </h1> -->
                        @foreach($data as $order)
                       
                        <tr>
                            <td>{{$order->name}}</td>
                            <td>{{$order->price}}$</td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->merchant_name}}</td>
                        </tr>
                    @endforeach
                    @else
                    <tr>
                        <td> <h2>No data</h2></td>
                    </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>
<script src="{{asset('js/main.js')}}"></script>

</html>