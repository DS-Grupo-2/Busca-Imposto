@extends('logged.base.app')

@section('content')


<div class="text-center">
  <img class="card-img-top ml-3 mt-3" src="/uploads/avatars/{{ $user->avatar }}" alt="Card image cap" style="width:150px; height:150px; border-radius:50%; margin-right:25px;">
  <div class="card-body">
    <h2 class="card-title">{{ $user->name }} </h2>
    <form enctype="multipart/form-data" action="home" method="post">
      {{-- <label>Atualizar imagem</label> <br> --}}
      <input type="file" name="avatar">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="submit" class="pull-right btn btn-sm btn-primary">


  {{-- <br> Nome: {{ $user->name }}<br> --}}
  {{-- Último nome: {{ $user->last_name }} <br>       --}}
  {{-- Email: {{ $user->email }} <br> --}}
  {{-- Telefone: {{ $user->cellphone }}<br> --}}
  <br> Criado em: {{ $user->created_at }} <br>
  Atualizado em: {{ $user->updated_at }}<br>
    </form>
</div>
</div>


{{-- <div class="card-header border-0">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header bg-primary text-white">{{ __('Perfil') }}</div> --}}

                  {{-- Image avatar  --}}
                  {{-- <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                  <h2>{{ $user->name }} Perfil</h2>
                  <form enctype="multipart/form-data" action="home" method="post">
                      <label>Atualizar imagem</label>
                      <input type="file" name="avatar">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="submit" class="pull-right btn btn-sm btn-primary">


                  email: {{ $user->email }} <br>
                  ultimo nome: {{ $user->last_name }} <br>
                  telefone: {{ $user->cellphone }}<br>
                  nome: {{ $user->name }}<br>
                  Criado em: {{ $user->created_at }} <br>
                  Atualizado em: {{ $user->updated_at }}<br>


                  </div>
              </div>
          </div>
      </div>
  </div> --}}

<form class = "p-3" method="POST" action="{{ route('save-user-info') }}" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

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
        <label for="inputTelefone">Telefone</label>
        <input type="text" name="cellphone" value="{{ $user->cellphone }}" class="form-control" id="inputTelefone">
      </div>
      <div class="form-group col-md-6">
        <br>
        <button type="submit" class="btn btn-primary mt-2">Salvar</button>
      </div>
    </div>
  </form>
<div>
<a class="delete-btn-w-after btn btn-danger ml-3" href="#" shref="{{ url('/system/user-delete') }}" mthod="GET"> Deletar conta </a>
</div>




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
                    <div class="card-header bg-primary text-white">{{ __('Perfil') }}</div> --}}

                    {{-- Image avatar  --}}
                    {{-- <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                    <h2>{{ $user->name }} Perfil</h2>
                    <form enctype="multipart/form-data" action="home" method="post">
                        <label>Atualizar imagem</label>
                        <input type="file" name="avatar">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="pull-right btn btn-sm btn-primary">


                    email: {{ $user->email }} <br>
                    ultimo nome: {{ $user->last_name }} <br>
                    telefone: {{ $user->cellphone }}<br>
                    nome: {{ $user->name }}<br>
                    Criado em: {{ $user->created_at }} <br>
                    Atualizado em: {{ $user->updated_at }}<br>


                    </div>
                </div>
            </div>
        </div>
    </div> --}}

@endsection
