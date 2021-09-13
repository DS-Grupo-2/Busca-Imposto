@extends('logged.base.app')
@section('content')

<form method="POST" action="{{ url('/system/subcategories/edit/'.$item->id) }}">
    @csrf
    <label for="email">
        <tag> Nome </tag>
        <input id="NomeSubCategoria" type="text" class="form-control @error('NomeSubCategoria') is-invalid @enderror" name="NomeSubCategoria"
            value="{{ $item->NomeSubCategoria }}" required autocomplete="email" autofocus>
    </label>
    @error('NomeSubCategoria')
        <span class="invalid-feedback" role="alert">
            <strong></strong>
        </span>
    @enderror

    <button type="submit"> Salvar </button>
</form>
<hr>
@foreach($list as $item)
    <p>This is product id {{ $item->id }}</p>
    <p>name {{ $item->NomeSubCategoria }}</p>
    <p>created_at {{ $item->created_at }}</p>
    <p>updated_at {{ $item->updated_at }}</p>
    <a href="{{ url('/subcategories/system/subcategories/edit/'.$item->id) }} " > editar </a>
    <a href="{{ url('/system/subcategories/delete/'.$item->id) }} " data-method="delete" > deletar</a>

@endforeach
{{-- pagination (: --}}
{{ $list->links() }}
@endsection
