@extends('logged.base.app')
@section('content')

<div class="p-3">
    <form method="POST" action="{{ route('categories-create') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @csrf
        <label for="email">
            <tag> Nome </tag>
            <input id="NomeCategoria" type="text" class="form-control @error('NomeCategoria') is-invalid @enderror" name="NomeCategoria"
                value="" required autocomplete="email" autofocus>
        </label>
        @error('NomeCategoria')
            <span class="invalid-feedback" role="alert">
                <strong></strong>
            </span>
        @enderror

        <button type="submit" class="btn btn-primary"> Salvar </button>
    </form>
    <hr>


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
                    <td class="float-right" scope="col">
                    <button type="submit" class="btn btn-danger "><a href="{{ url('/system/categories/delete/'.$item->id) }}" class="text-white"> Deletar</a></button>
                    <button type="submit" class="btn btn-success "><a href="{{ url('/system/categories/edit/'.$item->id) }} " class="text-white" > Editar </a></button></td>
                </tr>
                </tbody>
             @endforeach  {{ $list->links() }}
           </table>
    </div>
</div>
        {{-- <p>This is category{{ $item->id }} </p>
        <p>NomeCategoria {{ $item->NomeCategoria }}</p>
        <p>created_at {{ $item->created_at }}</p>
        <p>updated_at {{ $item->updated_at }}</p>
        <button type="submit" class="btn btn-success"><a href="{{ url('/system/categories/edit/'.$item->id) }} " class="text-white" > Editar </a></button>
        <button type="submit" class="btn btn-danger"><a href="{{ url('/system/categories/delete/'.$item->id) }}" class="text-white"> Deletar</a></button>  --}}



@endsection


