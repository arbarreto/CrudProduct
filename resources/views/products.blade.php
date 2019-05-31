<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Produtos</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/fontawesome.min.css">
        <link rel="stylesheet" href="/css/style.css">
        <script type="text/javascript" src="/js/jquery.js"></script>

    </head>
    <body>
        <div>
            <a href="{{ route('new') }}" class="btn btn-primary btn-new-product m20">Criar novo</a>
        </div>
        <div id="containerList">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-3">
                        <div class="container-product m20">
                            <div class="links">
                                <a href="{{ route('edit', $product['id']) }}">Editar</a> | <a href="{{ route('delete', $product['id']) }}">Excluir</a>
                            </div>
                            <div class="imgProduct">
                                <img src="{{ $product['image'] }}" class="imageProduct">
                            </div>
                            <div class="nameProduct">
                                {{ $product['name'] }}
                            </div>
                            <div class="category">
                                @foreach($categories as $category)
                                    @if($category['id'] == $product['category_id'])
                                        {{ $category['category'] }}
                                    @endif
                                @endforeach
                            </div>
                            <div class="colors">
                                <strong>Cores:</strong> 
                                @foreach(json_decode($product['color']) as $color)
                                    {{ $color }}
                                    @if(!$loop->last)
                                        - 
                                    @endif
                                @endforeach
                            </div>
                            <div class="size">
                                <strong>Tamanho:</strong>
                                @foreach(json_decode($product['size']) as $size)
                                    {{ $size }}
                                    @if(!$loop->last)
                                        - 
                                    @endif
                                @endforeach 
                            </div>
                            <div class="description">
                                <strong>Descrição:</strong> {{ $product['description'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
