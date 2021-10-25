@extends('logged.base.app2')
@section('content')


    <div class="p-3">
        <form method="POST" enctype="multipart/form-data" action="{{ url('/system/categories/edit/' . $item->id) }}">
            @csrf
            <div class="form">
                <img class="card-img-top ml-3 mt-3" src="/uploads/pictures/{{ $item->picture }}"
                    style="width:150px; height:150px; border-radius:50%; margin-right:25px;">
                <input type="file" name="picture" value="{{ $item->picture }}">
                <input type="hidden" name="idCategoria" value="{{ $item->id }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="col-12">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="NomeCategoria">Nome</label>
                        <input id="NomeCategoria" type="text"
                            class="form-control @error('NomeCategoria') is-invalid @enderror" name="NomeCategoria"
                            value="{{ $item->NomeCategoria }}" autocomplete="text" autofocus>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Porcentagem</label>
                        <input id="taxPercentage" type="number" step="0.01" class="form-control" name="taxPercentage"
                            value="{{ $item->taxPercentage }}">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary"> Salvar </button>
        </form>
        <hr>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>

                        <th scope="col">ID</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Alíquota (%)</th>
                        <th scope="col">Criado</th>
                        <th scope="col">Atualizado</th>

                    </tr>
                </thead>
                @foreach ($list as $item)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->NomeCategoria }}</td>
                            <td><img height="50px" src="{{ asset('uploads/pictures/' . $item->picture) }}"></td>
                            <td>{{ $item->taxPercentage }}</td>


                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>
                                <button class="btn btn-success "><a
                                        href="{{ url('/system/categories/edit/' . $item->id) }} " class="text-white">
                                        Editar </a></button>
                                <button class="btn btn-danger "><a
                                        href="{{ url('/system/categories/delete/' . $item->id) }}" class="text-white">
                                        Deletar</a></button>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
    @foreach ($list as $item)






    @endforeach
    {{-- pagination (: --}}
    {{ $list->links() }}
@endsection
