@extends('logged.base.app')
@section('content')

    <div class="p-3">
        <form method="POST" action="{{ url('/system/subcategories/edit/'. $item->id) }}">
            @csrf
            <label for="NomeSubCategoria">
                <tag> Nome </tag>
                <input id="NomeSubCategoria" type="text" class="form-control @error('NomeSubCategoria') is-invalid @enderror"
                    name="NomeSubCategoria" value="{{ $item->NomeSubCategoria }}" required>
            </label>
            @error('NomeSubCategoria')
                <span class="invalid-feedback" role="alert">
                    <strong></strong>
                </span>
            @enderror
            {{-- <br>Categoria
            <input id="Category" type="text" class="form-control mb-2 @error('Category') is-invalid @enderror"
                name="Category_ID" value="" required> --}}

                <br> Categoria <br>
                <select name="categoryId">
                    <option selected="selected"> --SELECT-- </option>
                    @foreach ($categories as $category)

                    <option value="{{ $category->id }}"
                        @if ($category->id == $item->categoryId)
                            selected="selected"
                        @endif
                    >{{ $category->NomeCategoria }}</option>
                @endforeach
                </select>

                <br>
                <br>
            <button type="submit" class="btn btn-primary"> Salvar </button>
        </form>
        <hr>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">SubCategoria</th>
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
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>

                            <td>
                                <button type="submit" class="btn btn-danger "><a
                                        href="{{ url('/system/subcategories/delete/' . $item->id) }}" class="text-white">
                                        Deletar</a></button>
                                <button type="submit" class="btn btn-success "><a
                                        href="{{ url('/system/subcategories/edit/' . $item->id) }} " class="text-white">
                                        Editar </a></button>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
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
