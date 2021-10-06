@extends('logged.base.app')
@section('content')

<form method="POST" action="{{ url('/system/categories/edit/'.$item->id) }}">
    @csrf
    <div class="form">
  <img class="card-ig-top ml-3 mt-3" src="/uploads/avatars/User.jpg"m alt="Card image cap" style="width:150px; height:150px; border-radius:50%; margin-right:25px;">
  <div class="card-body">
    <form enctype="multipart/form-data" action="home" method="post">
      
      <input type="file" name="avatar">
      <input type="hidden" name="_token" value="ekGgW459wGmMk7r8bMir5NwI7J4NxfOP6KK2Fd8F">
      <input type="submit" class="pull-right btn btn-sm btn-primary">

  

    </form>  
    
</div>

</div>

<div class="col-7" >
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="NomeProduto">Nome</label>
      <input id="NomeProduto" type="text" class="form-control @error('NomeProduto') is-invalid @enderror" name="NomeProduto"
            value="{{ $item->NomeCategoria }}" required autocomplete="text" autofocus>
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
       <th scope="row">{{ $item->id }}</th>
          <td>{{ $item->NomeCategoria }}</td>
          <td>{{ $item->created_at }}</td>
          <td>{{ $item->updated_at }}</td>
          <td scope="col">
          <button type="submit" class="btn btn-danger float-right"><a href="{{ url('/system/categories/delete/'.$item->id) }}" class="text-white"> Deletar</a></button> 
          <button type="submit" class="btn btn-success float-right"><a href="{{ url('/system/categories/edit/'.$item->id) }} " class="text-white" > Editar </a></button></td>
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

