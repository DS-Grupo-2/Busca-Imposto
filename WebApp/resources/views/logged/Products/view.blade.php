@extends('logged.base.app')
@section('content')

<form method="POST" action="{{ route('products-create') }}">
    @csrf
    <label for="email">
        <tag> Nome </tag>
        <input id="NomeProduto" type="text" class="form-control @error('NomeProduto') is-invalid @enderror" name="NomeProduto"
            value="" required>
    </label>
    @error('NomeProduto')
        <span class="invalid-feedback" role="alert">
            <strong></strong>
        </span>
    @enderror
    <input id="Category" type="text" class="form-control @error('Category') is-invalid @enderror" name="Category_ID"
            value="" required>
        
    <input id="Subcategory" type="text" class="form-control @error('Subcategory') is-invalid @enderror" name="SubCategoryID"
            value="" required>

    <button type="submit"> Salvar </button>
</form>
<hr>
@foreach($list as $item)
    
    <p>This is product {{ $item->id }}</p>
    <p>NomeProduto {{ $item->NomeProduto }}</p>
    <p>created_at {{ $item->created_at }}</p>
    <p>updated_at {{ $item->updated_at }}</p>
    <p>Categoria {{ $item->Category_ID }}</p>
    <p>Subcategoria {{ $item->SubCategoryID }}</p>
    <a href="{{ url('/system/products/edit/'.$item->id) }} " > editar </a>
    <a href="{{ url('/system/products/delete/'.$item->id) }}" > deletar</a>

@endforeach
@endsection


