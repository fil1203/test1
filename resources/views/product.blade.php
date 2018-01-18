<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                var id = $('#size option').data('prod')
            $('#size ').on('change', function () {
                var size = $(this).val();
                $.ajax({
                    url:'{{route('ajax')}}',
                    method: 'get',
                    data:{size:size, id:id},
                    success: function (data) {
                       $('#sku').html(data);
                    }
                });
            });
        });
    </script>


</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="row col-lg-12">
        <div class="col-lg-5 good_item">
            <div class="jumbotron">
                <h1>{{$product->title}}</h1>
                <p>Артикул: <strong><span id="sku">{{$product->attributes[0]->pivot->sku or 0}} </span></strong> </p>
                <p>Цена: <span>{{$product->price}} грн.</span></p>
                <p>Цвет: <span>  {{$product->color}}</span><br>
                    @foreach($group_goods as $group_good)
                    <a href="{{route('product',['id'=>$group_good->id])}}">{{$group_good->color}}</a>
                    @endforeach
                </p>
                <p>Размер: </p>
                <p>ВК: <span>{{$product->code}}</span></p>
                <select name="size" id="size">
                @foreach($product->attributes as $k=>$attribute)
                   <option id="{{$attribute->title}}" data-prod="{{$product->id}}">{{$attribute->title}}</option>
                @endforeach
                </select>
                <p>
                    <a class="btn btn-lg btn-primary" href="{{route('welcome')}}" role="button">НАЗАД &raquo;</a>
                </p>

            </div>


        </div>

    </div>
</div>

</body>
</html>