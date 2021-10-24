@extends('logged.base.app2')
@section('content')

<form method="POST" enctype="multipart/form-data" action="{{ url('/system/products/edit/'.$item->id) }}">
    @csrf


<div class="col-10" >
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="NomeProduto">Nome</label>
      <input id="NomeProduto" type="text" class="form-control @error('NomeProduto') is-invalid @enderror" name="NomeProduto"
            value="{{ $item->NomeProduto }}" required autocomplete="text" autofocus>
    </div>
    <div class="form-group col-md-6">

                <br> Categoria <br>
                <select class="form-control col-md-4 col-xl-4 col-lg-4 col-sm-12" name="Category_ID">
                <option selected="selected"> --SELECT-- </option>

                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}"

                    >{{ $category->NomeCategoria }}</option>
                @endforeach
                </select>
    </div>
  </div>
  <div>
    <label>Imagem</label>
            <input type="file" name="image" class="form-control">
  </div>
  <div class="form-group col-md-6">
    <br> Sub-Categoria <br>
                <select class="form-control col-md-4 col-xl-4 col-lg-4 col-sm-12" name="SubCategoryID">
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

