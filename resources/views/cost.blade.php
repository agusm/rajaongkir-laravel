<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cek Ongkir</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


        <!-- Styles -->
        
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-6 left_col">
        
                    {{-- {{dd($rajaongkir)}} --}}
                    <h3>Cek Ongkir dari Jogja ke {{$rajaongkir->destination_details->city_name}}</h3>
                    <h3>menggunakan kurir {{$rajaongkir->results[0]->name}}</h3>

                    <table class="table">
                        <tr>
                            <th>Layanan</th>
                            <th>Harga (Rp)</th>
                            <th>Estimasi Pengiriman (Hari)</th>
                        </tr>
                        @foreach ($rajaongkir->results[0]->costs as $cost)
                            <tr>
                            <td>{{$cost->service}}</td>
                            <td>{{number_format($cost->cost[0]->value,0,',','.')}}</td>
                            <td>{{$cost->cost[0]->etd}}</td>
                            </tr>
                        @endforeach
                    </table>
                           
                        
                </div>
            </div>
        </div>
       
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
