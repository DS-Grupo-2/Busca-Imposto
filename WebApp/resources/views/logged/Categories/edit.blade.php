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

<div class="col-10" >
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="NomeProduto">Nome</label>
      <input id="NomeProduto" type="text" class="form-control @error('NomeProduto') is-invalid @enderror" name="NomeProduto"
            value="{{ $item->NomeProduto }}" required autocomplete="text" autofocus>
    </div>
    <div class="form-group col-md-6">
      <label for="NomeCategoria">Categoria</label>
      <input type="text" class="form-control" id="NomeCategoria" value="{{ $item->NomeCategoria }}" >
    </div>
  </div>
  <div class="form-group">
    <label for="SubCategoryID">Subcategoria</label>
    <input type="text" class="form-control" id="SubCategoryID" value="{{ $item->SubCategoryID }}">
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
<hr>
@foreach($list as $item)






@endforeach
{{-- pagination (: --}}
{{ $list->links() }}
@endsection

