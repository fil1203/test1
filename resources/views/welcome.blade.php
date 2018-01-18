<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <style>
            .good_item{
                padding: 10px;
                border: 1px solid #000;
                margin: 10px;
            }
        </style>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="row col-lg-12">
                <p>
                <a class="btn btn-lg btn-danger" href="{{route('create')}}" role="button"> создать &raquo;</a>
                </p>
                    @foreach($goods as $good)
                        <div class="col-lg-5 good_item">

                                <div class="title">
                                    <p>Название: <span>{{$good->title}}</span></p>
                                </div>
                                <div class="price">
                                    <p>Цена: <span>{{$good->price}} грн.</span></p>
                                </div>
                                <div class="color">
                                    <p>Цвет: </p><span>{{$good->color}}</span>
                                </div>
                            <a class="btn btn-lg btn-primary" href="{{route('product',['id'=>$good->id])}}" role="button"> подробнее &raquo;</a>
                        </div>
                    @endforeach
            </div>


        </div>
    </body>
</html>
