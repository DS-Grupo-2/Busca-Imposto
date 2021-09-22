@extends('logged.base.app')
@section('content')

<div class="p-3">
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
                <br> Categoria <br>
                <select name="Category_ID">
                    <option selected="selected"> --SELECT-- </option>

                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}"

                    >{{ $category->NomeCategoria }}</option>
                @endforeach
                </select>


    <br>            
                <br> Sub-Categoria <br>
                <select name="SubCategoryID">
                    <option selected="selected"> --SELECT-- </option>

                    @foreach ($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}"

                    >{{ $subcategory->NomeSubCategoria }}</option>
                @endforeach
                </select>


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
             <th scope="col">Produto</th>
             <th scope="col">Criado</th>
             <th scope="col">Atualizado</th>
             <th scope="col">Categoria</th>
             <th scope="col">Subcategoria</th>
             <th scope="col"></th>
           </tr>
         </thead>
         @foreach($list as $item)
         <tbody>
            <tr> 
             <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->NomeProduto }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
                <td>{{ $item->Category_ID }}</td>
                <td>{{ $item->SubCategoryID }}</td>
                <td>
                <button type="submit" class="btn btn-danger "><a href="{{ url('/system/products/delete/'.$item->id) }}" class="text-white"> Deletar</a></button> 
                <button type="submit" class="btn btn-success "><a href="{{ url('/system/products/edit/'.$item->id) }} " class="text-white" > Editar </a></button></td>
            </tr>        
            </tbody>
         @endforeach  
        </table>
</div>
</div>    
@endsection


    {{-- <p>This is product {{ $item->id }}</p>
    <p>NomeProduto {{ $item->NomeProduto }}</p>
    <p>created_at {{ $item->created_at }}</p>
    <p>updated_at {{ $item->updated_at }}</p>
    <p>Categoria {{ $item->Category_ID }}</p>
    <p>Subcategoria {{ $item->SubCategoryID }}</p>
    <a href="{{ url('/system/products/edit/'.$item->id) }} " > editar </a>
    <a href="{{ url('/system/products/delete/'.$item->id) }}" > deletar</a>--}}