@extends('logged.base.app')
@section('content')

<form method="POST" action="{{ url('products/system/products/edit/'.$item->id) }}">
    @csrf
    <label for="email">
        <tag> Nome </tag>
        <input id="NomeProduto" type="text" class="form-control @error('NomeProduto') is-invalid @enderror" name="NomeProduto"
            value="{{ $item->NomeProduto }}" required autocomplete="email" autofocus>
    </label>
    @error('NomeProduto')
        <span class="invalid-feedback" role="alert">
            <strong></strong>
        </span>
    @enderror

    <button type="submit"> Salvar </button>
</form>
<hr>
@foreach($list as $item)
    <p>This is product id {{ $item->id }}</p>
    <p>name {{ $item->NomeProduto }}</p>
    <p>created_at {{ $item->created_at }}</p>
    <p>updated_at {{ $item->updated_at }}</p>
    <a href="{{ url('products/system/products/edit/'.$item->id) }} " > editar </a>
    <a href="{{ url('/system/products/delete/'.$item->id) }} " data-method="delete" > deletar</a>


@endforeach
{{-- pagination (: --}}
{{ $list->links() }}
@endsection
