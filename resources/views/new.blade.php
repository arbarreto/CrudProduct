<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Produtos</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/fontawesome.min.css">
        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript" src="/js/style.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        <link rel="stylesheet" href="/css/style.css">

    </head>
    <body>
        <div>
            <a href="{{ route('list') }}" class="btn btn-primary btn-new-product m20">Voltar</a>
        </div>
        <div id="containerNew">
            <form id="newProduct" @if(isset($editProduct)) action="{{ route('update', $editProduct['id']) }}" @else action="{{ route('create') }}" @endif method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Nome do produto</label>
                    <input type="text" class="form-control" name="name" placeholder="Ex.: Camiseta" required="required" @if(isset($editProduct)) value="{{ $editProduct['name'] }}" @endif>
                </div>
                <div class="form-group">
                    <label for="categories">Categoria</label>
                    <select class="form-control" id="categories" name="category" required="required">
                        <option>Selecione a Categoria</option>
                            @foreach($categories as $category)
                                <option value="{{ $category['id'] }}" 
                                    @if(isset($editProduct)) 
                                        @if($editProduct['category_id'] == $category['id']) 
                                            selected="selected" 
                                        @endif 
                                    @endif>
                                    {{ $category['category'] }}
                                </option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Descrição do produto</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required="required">@if(isset($editProduct)){{ $editProduct['description'] }} @endif</textarea>
                </div>
                <div class="form-group">
                    <label>Imagem do produto</label>
                    <input type="file" class="form-control-file" name="image">
                    @if(isset($editProduct))
                        <small>Apenas preencher em caso de alteração de imagem.</small>
                    @endif
                </div>
                    <label>Cores disponíveis:</label>
                    <div>
                        <select class="selectpickercolor" multiple data-live-search="true" name="color[]" required="required">
                            <option value="Azul"
                                @if(isset($editProduct)) 
                                    @foreach(json_decode($editProduct['color']) as $edit)
                                        @if($edit == 'Azul')
                                            selected="selected" 
                                        @endif
                                    @endforeach 
                                @endif>Azul</option>
                            <option value="Amarelo"
                                @if(isset($editProduct)) 
                                    @foreach(json_decode($editProduct['color']) as $edit)
                                        @if($edit == 'Amarelo')
                                            selected="selected" 
                                        @endif
                                    @endforeach 
                                @endif>Amarelo</option>
                            <option value="Roxo"
                                @if(isset($editProduct)) 
                                    @foreach(json_decode($editProduct['color']) as $edit)
                                        @if($edit == 'Roxo')
                                            selected="selected" 
                                        @endif
                                    @endforeach 
                                @endif>Roxo</option>
                            <option value="Rosa"
                                @if(isset($editProduct)) 
                                    @foreach(json_decode($editProduct['color']) as $edit)
                                        @if($edit == 'Rosa')
                                            selected="selected" 
                                        @endif
                                    @endforeach 
                                @endif>Rosa</option>
                            <option value="Vermelho"
                                @if(isset($editProduct)) 
                                    @foreach(json_decode($editProduct['color']) as $edit)
                                        @if($edit == 'Vermelho')
                                            selected="selected" 
                                        @endif
                                    @endforeach 
                                @endif>Vermelho</option>
                            <option value="Verde"
                                @if(isset($editProduct)) 
                                    @foreach(json_decode($editProduct['color']) as $edit)
                                        @if($edit == 'Verde')
                                            selected="selected" 
                                        @endif
                                    @endforeach 
                                @endif>Verde</option>
                            <option value="Preto"
                                @if(isset($editProduct)) 
                                    @foreach(json_decode($editProduct['color']) as $edit)
                                        @if($edit == 'Preto')
                                            selected="selected" 
                                        @endif
                                    @endforeach 
                                @endif>Preto</option>
                        </select>
                    </div>
                <label>Tamanho:</label>
                    <div>
                        <select class="selectpickersize" multiple data-live-search="true" name="size[]" required="required">
                            <option value="PP"
                                @if(isset($editProduct)) 
                                    @foreach(json_decode($editProduct['size']) as $edit)
                                        @if($edit == 'PP')
                                            selected="selected" 
                                        @endif
                                    @endforeach 
                                @endif>PP</option>
                            <option value="P"
                                @if(isset($editProduct)) 
                                    @foreach(json_decode($editProduct['size']) as $edit)
                                        @if($edit == 'P')
                                            selected="selected" 
                                        @endif
                                    @endforeach 
                                @endif>P</option>
                            <option value="M"
                                @if(isset($editProduct)) 
                                    @foreach(json_decode($editProduct['size']) as $edit)
                                        @if($edit == 'M')
                                            selected="selected" 
                                        @endif
                                    @endforeach 
                                @endif>M</option>
                            <option value="G"
                                @if(isset($editProduct)) 
                                    @foreach(json_decode($editProduct['size']) as $edit)
                                        @if($edit == 'G')
                                            selected="selected" 
                                        @endif
                                    @endforeach 
                                @endif>G</option>
                            <option value="GG"
                                @if(isset($editProduct)) 
                                    @foreach(json_decode($editProduct['size']) as $edit)
                                        @if($edit == 'GG')
                                            selected="selected" 
                                        @endif
                                    @endforeach 
                                @endif>GG</option>
                            <option value="XG"
                                @if(isset($editProduct)) 
                                    @foreach(json_decode($editProduct['size']) as $edit)
                                        @if($edit == 'XG')
                                            selected="selected" 
                                        @endif
                                    @endforeach 
                                @endif>XG</option>
                        </select>
                    </div>
                <button type="submit" class="btn btn-primary btn-new-product mt20">Cadastrar</button>
            </form>
        </div>
    </body>
</html>
