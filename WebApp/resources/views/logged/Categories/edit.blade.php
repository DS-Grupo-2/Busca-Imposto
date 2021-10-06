@extends('logged.base.app')
@section('content')

    <form method="POST" id="categoryEdit" action="{{ url('/system/categories/edit/' . $item->id) }}">
        <input type="hidden" form="categoryEdit" name="_token" value="{{ csrf_token() }}">

        {{-- <div class="form">
            <img class="card-ig-top ml-3 mt-3" src="/uploads/avatars/User.jpg" m alt="Card image cap"
                style="width:150px; height:150px; border-radius:50%; margin-right:25px;">
            <div class="card-body">
                <form enctype="multipart/form-data" action="home" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="ekGgW459wGmMk7r8bMir5NwI7J4NxfOP6KK2Fd8F">
                    <input type="submit" class="pull-right btn btn-sm btn-primary">
                </form>
            </div>
        </div> --}}

        <div class="form-row">
            <div class="col-10">
                <div class="form-group col-md-6">
                    <label for="NomeCategoria">Categoria</label>
                    <input type="text" form="categoryEdit" name="NomeCategoria" class="form-control" id="NomeCategoria"
                        value="{{ $item->NomeCategoria }}">
                </div>
            </div>
        </div>

        @error('NomeProduto')
            <span class="invalid-feedback" role="alert">
                <strong></strong>
            </span>
        @enderror

        <div class="row">
            <div class="col-3 p-3 m-3">
                <button type="submit" form="categoryEdit" class="btn btn-primary ">Salvar</button>
            </div>

        </div>

    </form>

    <h3 class="title m-3">
        Todas as categorias
    </h3>
    <div class="row justify-content-center">
        <div class="col-12 m-2">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Criado</th>
                            <th scope="col">Atualizado</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    @foreach ($list as $item)
                        <tbody>
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->NomeCategoria }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td scope="col" class="float-right">
                                    <button type="submit" class="btn btn-danger "><a
                                            href="{{ url('/system/categories/delete/' . $item->id) }}"
                                            class="text-white"> Deletar</a></button>
                                    <button type="submit" class="btn btn-success "><a
                                            href="{{ url('/system/categories/edit/' . $item->id) }} "
                                            class="text-white"> Editar </a></button>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach {{ $list->links() }}
                </table>
            </div>
        </div>
    </div>


    </div>
    <hr>

    {{-- @foreach ($list as $item)






@endforeach
{{ $list->links() }} --}}
@endsection
