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
    <div class="flex-center position-ref full-height  ">
        <div class="row center-block ">
            <div class="col-lg-4 col-lg-offset-4">
            <form action="{{route('create')}}" method="post" role="form">
                <div class="form-group">
                    <label for="title">Название продукта</label>
                    <input type="text"  name="title" class="form-control" id="title" placeholder="Название продукта">
                </div>
                <div class="form-group">
                    <label for="price">Цена</label>
                    <input type="text" name="price" class="form-control" id="price" placeholder="Цена">
                </div>
                <div class="form-group">
                    <label for="color">Цвет</label>
                    <input type="text" name="color" class="form-control" id="color" placeholder="Цвет">
                </div>
                <div class="form-group">
                    <label for="sku">Артикул</label>
                    <input type="text" name="sku" class="form-control" id="sku" placeholder="Артикул">
                </div>
                <div class="form-group">
                    <label for="code">Внешний код товара</label>
                    <input type="text" name="code" class="form-control" id="code" placeholder="Код">
                </div>
                <div class="checkbox">
                    <label >Размер</label>
                    <select name="size" id="" class="form-control">
                        @foreach($sizes as $size)
                            <option value="{{$size->id}}">{{$size->title}}</option>
                        @endforeach
                    </select>
                </div>
                {{csrf_field()}}
                <button type="submit" class="btn btn-default">Отправить</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>