@extends('logged.base.app')

@section('content')



<form class = "p-3" method="POST" action="{{ route('save-user-info') }}" > 
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Email</label>
        <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="{{ $user->email }}" required>
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Senha</label>
        <input type="password" class="form-control" id="inputPassword4" value="{{ $user->name }}" placeholder="Senha" disabled>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputNome">Nome</label>
        <input type="text" name="name" value="{{ $user->name }}" required autocomplete="name" class="form-control" id="inputNome" placeholder="Nome">
      </div>
      <div class="form-group col-md-6">
        <label for="inputSobrenome">Sobrenome</label>
        <input type="text" class="form-control" id="inputSobrenome" placeholder="Sobrenome" name="last_name" value="{{ $user->last_name }}">
      </div>
    </div>
  <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputTelefone">Telefone</label>
        <input type="text" name="cellphone" value="{{ $user->cellphone }}" class="form-control" id="inputTelefone">
      </div>
      <div class="form-group col-md-6">
        <br>
        <button type="submit" class="btn btn-primary mt-2">Salvar</button>
      </div>
    </div>
  </form>

  
{{-- atributo de Nome
tipo
valor
required
type="email" --}}



<!-- 
<form method="POST" action="{{ route('save-user-info') }}" >
    @csrf
            <label for="email"> <tag> email </tag>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>
            </label>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="last_name"> <tag> Ultimo Nome</tag>
                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                name="last_name" value="{{ $user->last_name }}" required autocomplete="last_name" autofocus>
            </label>
            @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="cellphone"> <tag> Telefone </tag>
            <input id="cellphone" type="text" class="form-control @error('cellphone') is-invalid @enderror"
                name="cellphone" value="{{ $user->cellphone }}" required autocomplete="cellphone" autofocus>
            </label>
            @error('cellphone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="name"> <tag> Nome </tag>
            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror"
                name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
            </label>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <button type="submit"> Salvar </button>
</form> -->



    {{-- <div class="card-header border-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>
                        email: {{ $user->email }} <br>
                        ultimo nome: {{ $user->last_name }} <br>
                        telefone: {{ $user->cellphone }}<br>
                        nome: {{ $user->name }}<br>
                        Criado em: {{ $user->created_at }} <br>
                        Atualizado em: {{ $user->updated_at }}<br>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ __('You are logged in!') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

@endsection
