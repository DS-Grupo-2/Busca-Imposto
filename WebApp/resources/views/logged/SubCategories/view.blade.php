@extends('logged.base.app2')
@section('content')

    <div class="p-3">
        <form method="POST" action="{{ route('subcategories-create') }}">


            @csrf
            <label for="email">
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
            <select class="form-control col-md-4 col-xl-4 col-lg-4 col-sm-12" name="categoryId">
                <option selected="selected"> --SELECT-- </option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->NomeCategoria }}</option>
                @endforeach
            </select>
            <br><br>
            <label>
                <tag> Porcentagem </tag>
                <input id="taxPercentage" type="number" class="form-control" name="taxPercentage"
                    value="" required>
            </label>
            <br><br>

            <button type="submit" class="btn btn-primary"> Salvar </button>
        </form>
        <hr>

        <div class="table-responsive ">
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
                                        href="{{ url('/system/subcategories/edit/' . $item->id) }} "
                                        class="text-white">
                                        Editar </a></button>
                                <button type="submit" class="btn btn-danger "><a
                                        href="{{ url('/system/subcategories/delete/' . $item->id) }}"
                                        class="text-white">
                                        Deletar</a></button>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
