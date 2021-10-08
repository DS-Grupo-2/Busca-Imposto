@extends('logged.base.app')
@section('content')

<form enctype="multipart/form-data" action="{{ url('categories/edit') }}" method="post" id="imagem">
    <div class="form">
    <img class="card-img-top ml-3 mt-3" src="/uploads/pictures/{{ $item->picture }}" alt="Card image cap" style="width:150px; height:150px; border-radius:50%; margin-right:25px;">
      <input type="file" name="picture" form="imagem">
      <input type="hidden" name="idCategoria" value="{{ $item->id }}">
      <input type="hidden" name="_token" form="imagem" value="{{ csrf_token() }}">
      <button type="submit" form="imagem" class="pull-right btn btn-sm btn-primary">Enviar</button>
    <div class="card-body">

  </form>  
<form method="POST" action="{{ url('/system/categories/edit/'.$item->id) }}">
    @csrf

  <div class="col-12" >
    <div class="form-row">
      <div class="form-group">
        <label for="NomeProduto">Nome</label>
        <input id="NomeProduto" type="text" class="form-control @error('NomeProduto') is-invalid @enderror" name="NomeProduto"
            value="{{ $item->NomeCategoria }}" required autocomplete="text" autofocus>
      </div>
    </div>
<div>
  <div class="mb-2" style="width: 190px">
    <label for="inputPorcentagem">Porcentagem</label>
    <input type="number" name="percentage" value="" class="form-control" id="inputPorcentagem">
    <br><button type="submit" class="btn btn-primary"> Salvar </button>
  </div>
</form>
  
  
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
   @foreach($list as $item)         
   <tbody>
      <tr>
          <td>{{ $item->NomeCategoria }}</td>
          <td>{{ $item->created_at }}</td>
          <td>{{ $item->updated_at }}</td>
          <td scope="col">
            <button type="submit" class="btn btn-danger float-right"><a href="{{ url('/system/categories/delete/'.$item->id) }}" class="text-white"> Deletar</a></button> 
            <button type="submit" class="btn btn-success float-right"><a href="{{ url('/system/categories/edit/'.$item->id) }} " class="text-white" > Editar </a></button>
          </td>
      </tr>      
    </tbody>
   @endforeach  {{ $list->links() }}
 </table>
</div>    
  

    
<form>
    @error('NomeProduto')
        <span class="invalid-feedback" role="alert">
            <strong></strong>
        </span>
    @enderror
    

    <div class="form-group col-md-6">
      <br>
      <button type="submit" class="btn btn-primary mt-2">Salvar</button>
    </div>
  </div>
</form>
<div>
@foreach($list as $item)






@endforeach
{{-- pagination (: --}}
{{ $list->links() }}
@endsection

