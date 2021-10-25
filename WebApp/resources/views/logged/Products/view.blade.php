@extends('logged.base.app2')
@section('content')


    <div class="p-3">
        <form method="POST" enctype="multipart/form-data" action="{{ route('products-create') }}">
            @csrf

            <label for="email">

                <label>Imagem</label>
                <input type="file" name="image" class="form-control">

                <br>
                <tag> Nome </tag>
                <input id="NomeProduto" type="text" class="form-control @error('NomeProduto') is-invalid @enderror"
                    name="NomeProduto" value="" required>

                <br>Preço<br>
                <input id="Preco" type="text" class="form-control mb-2 @error('Preco') is-invalid @enderror" name="Preco"
                    value="" required>

            </label>
            @error('NomeProduto')
                <span class="invalid-feedback" role="alert">
                    <strong></strong>
                </span>
            @enderror
            <div class="form-row ">
                <div class="form-group col-md-2">
                    Categoria
                    <select class="form-control col-md-12 col-xl-12 col-lg-12 col-sm-12" name="Category_ID">
                        <option selected="selected"> --SELECT-- </option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->NomeCategoria }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    Sub-Categoria
                    <select class="form-control col-md-12 col-xl-12 col-lg-12 col-sm-12" name="SubCategoryID">
                        <option selected="selected"> --SELECT-- </option>

                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->NomeSubCategoria }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4 ">
                    <label for="Especificacao">Descrição</label>
                    <textarea class="form-control" name="Especificacao" id="Especificacao" rows="3"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4 ">
                    <label for="linkexterno">Link do anuncio</label>
                    <textarea class="form-control" name="linkexterno" id="linkexterno" rows="3"></textarea>
                </div>
            </div>


            <br>

            <button type="submit" class="btn btn-primary"> Salvar </button>
        </form>
        <hr>
        <h2 style="margin-left: 1%;">Lista</h2>
        <form class="form-inline" action="{{ route('products-view') }}">
            <input class="form-control searchInput" url="{{ route('products-view') }}" customInMethod="GET"
                style="width: 110%" type="search" placeholder="Pesquisar Produto" aria-label="Search" name="search">
        </form>
        <br>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>

                        <th scope="col">ID</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Image</th>
                        <th scope="col"><a href="{{ url('/system/products?orderby=value') }}">Preço</a></th>
                        <th scope="col">Criado</th>
                        <th scope="col">Atualizado</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Subcategoria</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                @foreach ($list as $item)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->NomeProduto }}</td>
                            <td><img height="50px" src="{{ asset('uploads/product/' . $item->image) }}"></td>

                            <td>{{ $item->Preco }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>{{ $item->Category_ID }}</td>
                            <td>{{ $item->SubCategoryID }}</td>
                            <td>
                                <button class="btn btn-success "><a
                                        href="{{ url('/system/products/edit/' . $item->id) }} " class="text-white">
                                        Editar </a></button>
                                <button  class="btn btn-danger "><a
                                        href="{{ url('/system/products/delete/' . $item->id) }}" class="text-white">
                                        Deletar</a></button>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
    <div class="paginator ml-6" style="position: absolute">
        {{ $list->onEachSide(5)->links() }}
    </div>
@endsection


{{-- <p>This is product {{ $item->id }}</p>
    <p>NomeProduto {{ $item->NomeProduto }}</p>
    <p>created_at {{ $item->created_at }}</p>
    <p>updated_at {{ $item->updated_at }}</p>
    <p>Categoria {{ $item->Category_ID }}</p>
    <p>Subcategoria {{ $item->SubCategoryID }}</p>
    <a href="{{ url('/system/products/edit/'.$item->id) }} " > editar </a>
    <a href="{{ url('/system/products/delete/'.$item->id) }}" > deletar</a> --}}

{{-- vou usar --}}
{{-- <br>Preço<br>
        <input id="Preco" type="text" class="form-control mb-2 @error('Preco') is-invalid @enderror" name="Preco"
                value="" required> --}}


{{-- <label>Imagem</label>
    <input type="file" name="image" class="form-control" required> --}}

{{-- <form method="POST" enctype="multipart/form-data" action="{{ route('products-create') }}"> --}}
