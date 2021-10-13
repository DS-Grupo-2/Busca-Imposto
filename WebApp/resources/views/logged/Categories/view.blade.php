@extends('logged.base.app')
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
                value="" required autocomplete="email" autofocus>
        </label>
        @error('NomeCategoria')
            <span class="invalid-feedback" role="alert">
                <strong></strong>
            </span>
        @enderror
        
          <div class="mb-2" style="width: 190px">
            <label for="inputPorcentagem">Porcentagem</label>
            <input type="number" name="percentage" value="" class="form-control" id="inputPorcentagem">
          </div>

    </label>
    @error('NomeCategoria')
    <span class="invalid-feedback" role="alert">
      <strong></strong>
    </span>
     @enderror

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
          <th scope="col">ImageM</th>
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
            <td><img height="50px" src="{{ asset('uploads/pictures/' . $item->picture) }}"></td>
                
                {{-- <td>{{ $item->Preco }}</td> --}}
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
                <td> 
                <button type="submit" class="btn btn-success "><a href="{{ url('/system/categories/edit/'.$item->id) }} " class="text-white" > Editar </a></button>
                <button type="submit" class="btn btn-danger "><a href="{{ url('/system/categories/delete/'.$item->id) }}" class="text-white"> Deletar</a></button>
            </td>
            </tr>        
          </tbody>
      @endforeach  
    </table>
  </div>
</div>
   
@endsection