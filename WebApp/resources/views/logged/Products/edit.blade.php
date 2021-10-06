@extends('logged.base.app')
@section('content')

    <form method="POST" action="{{ url('/system/products/edit/' . $item->id) }}">
        @csrf
        <div class="form">
            <img class="card-ig-top ml-3 mt-3" src="/uploads/avatars/User.jpg" m alt="Card image cap"
                style="width:150px; height:150px; border-radius:50%; margin-right:25px;">
            <div class="card-body">
                <form enctype="multipart/form-data" action="home" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="file" name="avatar">
                    <input type="submit" class="pull-right btn btn-sm btn-primary">



                </form>

            </div>

        </div>

        <div class="col-10">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="NomeProduto">Nome</label>
                    <input id="NomeProduto" type="text" class="form-control @error('NomeProduto') is-invalid @enderror"
                        name="NomeProduto" value="{{ $item->NomeProduto }}" required autocomplete="text" autofocus>
                </div>
                <div class="form-group col-md-12">
                    <br> Categoria <br>
                    <select name="Category_ID">
                        <option selected="selected"> --SELECT-- </option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->NomeCategoria }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <br> Sub-Categoria <br>
                    <select name="SubCategoryID">
                        <option selected="selected"> --SELECT-- </option>

                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->NomeSubCategoria }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descrição</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
    </form>







    @error('NomeProduto')
        <span class="invalid-feedback" role="alert">
            <strong></strong>
        </span>
    @enderror


    <button type="submit" class="btn btn-primary">Salvar</button></div>
    </form>
    <br>
    <br>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Produto</th>
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
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>{{ $item->Category_ID }}</td>
                        <td>{{ $item->SubCategoryID }}</td>
                        <td>
                            <button type="submit" class="btn btn-danger "><a
                                    href="{{ url('/system/products/delete/' . $item->id) }}" class="text-white">
                                    Deletar</a></button>
                            <button type="submit" class="btn btn-success "><a
                                    href="{{ url('/system/products/edit/' . $item->id) }} " class="text-white">
                                    Editar </a></button>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
    {{-- pagination (: --}}
    {{-- {{ $list->links() }} --}}
@endsection
