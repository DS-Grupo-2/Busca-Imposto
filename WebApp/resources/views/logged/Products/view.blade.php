@extends('logged.base.app')
@section('content')


<div class="p-3">
<div class="jumbotron">
    <form method="POST" enctype="multipart/form-data" action="{{ route('products-create') }}">
        {{ csrf_field() }}
        <label for="email"></label>
        {{-- <input type="file" name="image" class="form-control"> --}}
    
            {{-- Product image --}}
            
            
            <label>Imagem</label>
            
            
            <input type="file" name="image" class="form-control" required>
            
           
         
    
            <tag> Nome </tag>
            <input minlength="5" id="NomeProduto" type="text" class="form-control @error('NomeProduto') is-invalid @enderror" name="NomeProduto"
                value="" required>
        </label>
        @error('NomeProduto')
            <span class="invalid-feedback" role="alert">
                <strong></strong>
            </span>
        @enderror
        <br>Preço
        <input id="Preco" type="text" class="form-control mb-2 @error('Preco') is-invalid @enderror" name="Preco"
                value="" required>

        <br>Categoria
        <input id="Category" type="text" class="form-control mb-2 @error('Category') is-invalid @enderror" name="Category_ID"
                value="" required>
        
        Subcategoria    
        <input id="Subcategory" type="text" class="form-control mb-2 @error('Subcategory') is-invalid @enderror" name="SubCategoryID"
                value="" required>
        
        <button type="submit" name="submit" class="btn btn-primary btn-lg"> Salvar </button>
    </form>
</div>
<hr>

<div class="table-responsive">
        <table class="table table-hover">
         <thead>
           <tr>
             
             <th scope="col">ID</th>
             <th scope="col">Produto</th>
             <th scope="col">Image</th>
             <th scope="col">Preço</th>
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
                <td><img height="40px" src="{{ asset('uploads/product/' . $item->image) }}"></td>
                
                <td>{{ $item->Preco }}</td>
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