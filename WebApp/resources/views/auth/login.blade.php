<style>
    .mainContent {
        margin-top: 50px;
    }

    .section .parallax,
    .section .static-image {
        width: 100%;
        height: 10vh;
        overflow: hidden;
        display: block;
        position: relative;
    }

</style>

{{-- <link href="{{ asset('assetsUnlogged/css/customAuth.css') }}" rel="stylesheet">

    <div class="container mainContent" id="caixaregistro">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" id="caixas">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body"> --}}


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group justify-content-center">
                        <label for="email"
                            class="col-md-4 col-form-label text-md-right">{{ __('Endereço de E-Mail') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <label for="password" class="col-md-4 col-form-label ">{{ __('Senha') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Lembrar me') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-8 offset-md-4" style="margin-top:24px;">
                            <button type="submit" class="btn btn-primary" id="botao">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}" id="botao">
                                    {{ __('Esqueceu a Senha?') }}
                                </a>
                            @endif
                        </div>
                    </div>



                    <div class="form-group row mb-0 " style="margin-top:40px">

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
{{-- </div>
                </div>
            </div>
        </div>
    </div> --}}
