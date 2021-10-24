@extends('logged.base.app2')
@section('content')

<div class="mt-6 ml-4" >
    <h2>
        Mais favoritados
    </h2>
</div>

<div class="table-responsive ml-4">
    <table class="table table-hover">
     <thead>
       <tr>

         <th scope="col">ID</th>
         <th scope="col">Produto</th>
         <th scope="col">Favoritado</th>
         <th scope="col">Image</th>
         <th scope="col"><a href="{{ url('/system/products?orderby=value') }}">Preço</a></th>
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
         <td>{{ $item->likes }}</td>
            <td><img height="50px" src="{{ asset('uploads/product/' . $item->image) }}"></td>

            <td>{{ $item->Preco }}</td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->updated_at }}</td>
            <td>{{ $item->Category_ID }}</td>
            <td>{{ $item->SubCategoryID }}</td>
            <td>
            <button type="submit" class="btn btn-success "><a href="{{ url('/system/products/edit/'.$item->id) }} " class="text-white" > Editar </a></button>
            <button type="submit" class="btn btn-danger "><a href="{{ url('/system/products/delete/'.$item->id) }}" class="text-white"> Deletar</a></button>
        </td>
        </tr>
        </tbody>
     @endforeach
    </table>
</div>
@endsection
