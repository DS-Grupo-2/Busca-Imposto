@extends('logged.base.app2')
@section('content')
<div class="p-3">
  <form method="POST" enctype="multipart/form-data" action="{{ route('categories-create') }}">
    @csrf
    <label for="email">

      <label>Imagem</label>
      <input type="file" name="picture" class="form-control">

<div class="p-3">
    <form method="POST" action="{{ route('categories-create') }}">
        @csrf
        <label for="email">
            <tag> Nome </tag>
            <input id="NomeCategoria" type="text" class="form-control @error('NomeCategoria') is-invalid @enderror" name="NomeCategoria"
                value=""  autocomplete="email" autofocus>
        </label>
        @error('NomeCategoria')
            <span class="invalid-feedback" role="alert">
                <strong></strong>
            </span>
        @enderror
        <br>
      <label>
          <tag> Porcentagem </tag>
          <input id="taxPercentage" type="number" step="0.01" class="form-control" name="taxPercentage"
              value="" >
      </label>

    </label>

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
          <th scope="col">Categoria</th>
          <th scope="col">Alíquota (%)</th>
          <th scope="col">Imagem</th>
          <th scope="col">Criado</th>
          <th scope="col">Atualizado</th>
          <th scope="col"></th>
        </tr>
      </thead>
      @foreach($list as $item)
        <tbody>
          <tr>
            <th scope="row">{{ $item->id }}</th>
            <td>{{ $item->NomeCategoria }}</td>
            <td>{{ $item->taxPercentage }}</td>
            <td><img height="50px" src="{{ asset('uploads/pictures/' . $item->picture) }}"></td>


                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
                <td>
                <button class="btn btn-success "><a href="{{ url('/system/categories/edit/'.$item->id) }} " class="text-white" > Editar </a></button>
                <button class="btn btn-danger "><a href="{{ url('/system/categories/delete/'.$item->id) }}" class="text-white"> Deletar</a></button>
            </td>
            </tr>
          </tbody>
      @endforeach
    </table>
  </div>
</div>

@endsection
