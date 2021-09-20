@extends('logged.base.app')
@section('content')

<form method="POST" enctype="multipart/form-data" action="{{ url('/system/products/edit/'.$item->id) }}">
    @csrf
    <div class="form">
  <img class="card-ig-top ml-3 mt-3" src="../assets/img/brand/blue.png"m alt="Card image cap" style="width:150px; height:150px; border-radius:50%; margin-right:25px;">
  <div class="card-body">
    {{-- Modificação :: --}}
    <form enctype="multipart/form-data" action="home" method="post">
      
      <input type="file" name="avatar">
      <input type="hidden" name="_token" value="ekGgW459wGmMk7r8bMir5NwI7J4NxfOP6KK2Fd8F">
      <input type="submit" class="pull-right btn btn-sm btn-primary">

  
 
    </form>  
</div>
</div>

<div class="col-10" >
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nome</label>
      <input id="NomeProduto" type="text" class="form-control @error('NomeProduto') is-invalid @enderror" name="NomeProduto"
            value="{{ $item->NomeProduto }}" required autocomplete="email" autofocus>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Sub Categoria</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Preço</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
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



    <p>This is category id {{ $item->id }}</p>
    <p>name {{ $item->NomeProduto }}</p>
    <p>created_at {{ $item->created_at }}</p>
    <p>updated_at {{ $item->updated_at }}</p>
    <a href="{{ url('/system/products/edit/'.$item->id) }} " > editar </a>
    <a href="{{ url('/system/products/delete/'.$item->id) }} " data-method="delete" > deletar</a>


@endforeach
{{-- pagination (: --}}
{{ $list->links() }}
@endsection

