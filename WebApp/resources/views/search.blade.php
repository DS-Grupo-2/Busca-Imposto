@extends('unlogged.base.app')
@section('content')

<div class="section" style="background: rgb(246, 245, 248); margin-left:2%; margin-right:2%">
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Imagem</th>
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
                        <td><img height="50px" src="{{ asset('uploads/product/' . $item->image) }}"></td>
                        <td>{{ $item->Preco }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>{{ $item->Category_ID }}</td>
                        <td>{{ $item->SubCategoryID }}</td>
                    </tr>        
                </tbody>
                @endforeach  
            </table>
        </div>
    </div>
</div>




@endsection