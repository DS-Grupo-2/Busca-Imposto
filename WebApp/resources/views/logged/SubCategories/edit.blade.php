@extends('logged.base.app2')
@section('content')

    <form method="POST" action="{{ url('/system/subcategories/edit/' . $item->id) }}">
        @csrf
        <div class="m-3">
            <div class="col-10">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="NomeProduto">Nome</label>
                        <input id="NomeSubCategoria" type="text"
                            class="form-control @error('NomeSubCategoria') is-invalid @enderror" name="NomeSubCategoria"
                            value="{{ $item->NomeSubCategoria }}" required autocomplete="text" autofocus>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="SubCategoryID">Subcategoria</label>
                        <input type="text" class="form-control" id="SubCategoryID" value="{{ $item->SubCategoryID }}">
                    </div>
                </div>
            </div>

            <div class="col-10">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="">Porcentagem</label>
                        <input id="taxPercentage" type="number" step="0.01" class="form-control" name="taxPercentage"
                    value="" >
                    </div>
                    <div class="ml-2"> Categoria<br>
                        <select class="form-control col-md-4 col-xl-4 col-lg-4 col-sm-12" name="Category_ID">
                            <option selected="selected"> --SELECT-- </option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->NomeCategoria }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            @error('NomeProduto')
                <span class="invalid-feedback" role="alert">
                    <strong></strong>
                </span>
            @enderror

            <button type="submit" class="btn btn-primary m-3">Salvar</button>
        </div>
        </div>
    </form>
    <hr>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">SubCategoria</th>
                    <th scope="col">Alíquota (%)</th>
                    <th scope="col">Criado</th>
                    <th scope="col">Atualizado</th>
                    <th scope="col"></th>

                </tr>
            </thead>
            @foreach ($list as $item)
                <tbody>
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->NomeSubCategoria }}</td>
                        <td>{{ $item->taxPercentage }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>

                        <td>
                            <button type="submit" class="btn btn-success "><a
                                    href="{{ url('/system/subcategories/edit/' . $item->id) }} " class="text-white">
                                    Editar </a></button>
                            <button type="submit" class="btn btn-danger "><a
                                    href="{{ url('/system/subcategories/delete/' . $item->id) }}" class="text-white">
                                    Deletar</a></button>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
    @foreach ($list as $item)






    @endforeach
    {{-- pagination (: --}}
    {{ $list->links() }}
@endsection
