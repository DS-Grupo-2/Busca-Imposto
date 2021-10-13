@extends('unlogged.base.app')
@section('content')

<div class="section" style="background: rgb(246, 245, 248); margin-left:2%; margin-right:2%">
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">ImageM</th>
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
                        <td><img height="50px" src="{{ asset('uploads/pictures/' . $item->picture) }}"></td>
                        {{-- <td>{{ $item->Preco }}</td> --}}
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                    </tr>        
                </tbody>
                @endforeach  
            </table>
        </div>
    </div>
</div>




@endsection