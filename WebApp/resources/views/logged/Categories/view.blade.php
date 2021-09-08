@extends('logged.base.app')
@section('content')

    <form method="POST" action="{{ route('categories-create') }}">
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

        <button type="submit"> Salvar </button>
    </form>
    <hr>
    @foreach($list as $item)
        <p>This is category {{ $item->id }}</p>
        <p>NomeCategoria {{ $item->NomeCategoria }}</p>
        <p>created_at {{ $item->created_at }}</p>
        <p>updated_at {{ $item->updated_at }}</p>
        <a href="{{ url('/system/categories/edit/'.$item->id) }} " > editar </a>
        <a href="{{ url('/system/categories/delete/'.$item->id) }}" > deletar</a>

    @endforeach
    {{ $list->links() }}
@endsection


