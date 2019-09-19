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
        
                    <h1>Cek Ongkir dari Jogja</h1>

                    <form action="{!! url('getcost') !!}" method="POST">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label class="label">Provinsi</label>
                            <select class="form-control" name="province_id" id="province_id">
                                <option value="">--Pilih Provinsi--</option>
                                @foreach ($provinces as $item)
                                    <option value="{{$item->province_id}}">{{$item->province}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="label">Provinsi</label>
                            <select class="form-control" name="city_id" id="city_id">
                                <option value="">--Pilih Kota--</option>
                               
                            </select>
                        </div>
                        <div class="form-group">
                                <label class="label">Kurir</label>
                                <select class="form-control" name="courier" id="courier">
                                    <option value="jne">JNE</option>
                                    <option value="pos">POS</option>
                                    <option value="tiki">TIKI</option>
                                </select>
                            </div>
                        <div class="form-group">
                            <label class="label">Berat(gram)</label>
                            <input type="number" class="form-control" name="weight" value="100">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form> 
                </div>
            </div>
        </div>
       
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $(document).ready(function(){
                $('#province_id').change(function(){
                    let province_id = this.value;
                    if(province_id !=='' ){
                        $.ajax({
                            type: "POST", 
                            url: "{!! url('getcities') !!}" + '/' + province_id, 
                            data: {id_provinsi : province_id}, 
                            dataType: "json",
                            success: function(response){ 
                                $("#city_id").html(response.cities);
                            }
                        });
                    }
                })
            })
        </script>
    </body>
</html>
