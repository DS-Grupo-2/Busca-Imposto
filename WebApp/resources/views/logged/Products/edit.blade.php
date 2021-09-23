@extends('logged.base.app')
@section('content')

<form method="POST" enctype="multipart/form-data" action="{{ url('/system/products/edit/'.$item->id) }}">
    @csrf
    <div class="form">
  <img class="card-ig-top ml-3 mt-3" src="/uploads/avatars/User.jpg"m alt="Card image cap" style="width:150px; height:150px; border-radius:50%; margin-right:25px;">
  <div class="card-body">
    {{-- Modificação :: --}}
    <form enctype="multipart/form-data" action="home" method="post">
      
      <input type="file" name="avatar">
      <input type="hidden" name="_token" value="ekGgW459wGmMk7r8bMir5NwI7J4NxfOP6KK2Fd8F">
      <input type="submit" class="pull-right btn btn-sm btn-primary">

  
<<<<<<< HEAD
<<<<<<< HEAD
 
=======

>>>>>>> 34b0527a37a04d62ec6aff00f27314679038d662
=======

>>>>>>> b83213f76f35886ee6bfc30e1cdcda302c4e50ea
    </form>  
    
</div>

</div>

<div class="col-10" >
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="NomeProduto">Nome</label>
      <input id="NomeProduto" type="text" class="form-control @error('NomeProduto') is-invalid @enderror" name="NomeProduto"
            value="{{ $item->NomeProduto }}" required autocomplete="text" autofocus>
    </div>
    <div class="form-group col-md-6">
      <label for="NomeCategoria">Categoria</label>
      <input type="text" class="form-control" id="NomeCategoria" value="{{ $item->Category_ID }}" >
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

