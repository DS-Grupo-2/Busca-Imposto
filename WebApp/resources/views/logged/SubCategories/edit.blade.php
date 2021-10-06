  @extends('logged.base.app')
@section('content')

<form method="POST" action="{{ url('/system/subcategories/edit/'.$item->id) }}">
    @csrf
    <div class="m-3" > Categoria<br>
      <select name="Category_ID">
          <option selected="selected"> --SELECT-- </option>
      
          @foreach ($categories as $category)
          <option value="{{ $category->id }}"
      
          >{{ $category->NomeCategoria }}</option>
      @endforeach
      </select>
     </div>
          <div class="col-10" >
            <div class="form-row">
            <div class="form-group col-md-4">
              <label for="NomeProduto">Nome</label>
              <input id="NomeSubCategoria" type="text" class="form-control @error('NomeSubCategoria') is-invalid @enderror" name="NomeSubCategoria"
                    value="{{ $item->NomeSubCategoria }}" required autocomplete="text" autofocus>
            </div>        
          <div class="form-group col-md-4">
            <label for="SubCategoryID">Subcategoria</label>
            <input type="text" class="form-control" id="SubCategoryID" value="{{ $item->SubCategoryID }}">
          </div>
          </div>
          </div>
  
  
  

    

    @error('NomeProduto')
        <span class="invalid-feedback" role="alert">
            <strong></strong>
        </span>
    @enderror
    

    <button type="submit" class="btn btn-primary m-3">Salvar</button></div>
</form>
<hr>
@foreach($list as $item)






@endforeach
{{-- pagination (: --}}
{{ $list->links() }}
@endsection

