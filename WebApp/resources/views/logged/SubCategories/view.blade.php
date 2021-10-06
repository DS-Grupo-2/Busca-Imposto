@extends('logged.base.app')
@section('content')

    <div class="p-3">
        <form method="POST" action="{{ route('subcategories-create') }}">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <label>
                <tag> Nome </tag>
                <input id="NomeSubCategoria" type="text" class="form-control @error('NomeSubCategoria') is-invalid @enderror"
                    name="NomeSubCategoria" value="" required>
            </label>
            @error('NomeSubCategoria')
                <span class="invalid-feedback" role="alert">
                    <strong></strong>
                </span>
            @enderror
            <br> Categoria <br>
            <select name="Category_ID">
                <option selected="selected"> --SELECT-- </option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->NomeCategoria }}</option>
                @endforeach
            </select>
            <br>
            <br>
            <button type="submit" class="btn btn-primary"> Salvar </button>
        </form>
        <br>

        <div class="row justify-content-center">
            <div class="col-12 m-2">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th >ID</th>
                                <th >SubCategoria</th>
                                <th >Criado</th>
                                <th >Atualizado</th>
                                <th ></th>

                            </tr>
                        </thead>
                        @foreach ($list as $item)
                            <tbody>
                                <tr>
                                    <th >{{ $item->id }}</th>
                                    <td>{{ $item->NomeSubCategoria }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>

                                    <td class="float-right">
                                        <button type="submit" class="btn btn-danger "><a
                                                href="{{ url('/system/subcategories/delete/' . $item->id) }}"
                                                class="text-white">
                                                Deletar</a></button>
                                        <button type="submit" class="btn btn-success "><a
                                                href="{{ url('/system/subcategories/edit/' . $item->id) }} "
                                                class="text-white">
                                                Editar </a></button>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>

            </div>
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
