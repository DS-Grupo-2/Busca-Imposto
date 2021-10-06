@extends('logged.base.app')
@section('content')

<form method="POST" action="{{ url('/system/products/edit/'.$item->id) }}">
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

<div class="col-10" >
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="NomeProduto">Nome</label>
      <input id="NomeProduto" type="text" class="form-control @error('NomeProduto') is-invalid @enderror" name="NomeProduto"
            value="{{ $item->NomeProduto }}" required autocomplete="text" autofocus>
    </div>
    <div class="form-group col-md-6">
    
                <br> Categoria <br>
                <select name="Category_ID">
                    <option selected="selected"> --SELECT-- </option>

                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}"

                    >{{ $category->NomeCategoria }}</option>
                @endforeach
                </select>
    </div>
  </div>
  <div class="form-group">
    <br> Sub-Categoria <br>
                <select name="SubCategoryID">
                    <option selected="selected"> --SELECT-- </option>

                    @foreach ($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}"

                    >{{ $subcategory->NomeSubCategoria }}</option>
                @endforeach
                </select>
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

