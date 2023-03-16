<x-layouts.admin title='Crear Usuario'>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-light" style="background-color: #f1300e "><h2>{{ __('Register') }}</h2></div>
                   
                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end"><b>{{ __('Name') }} </b></label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}"  autocomplete="name" autofocus>

                                    @error('name')
                                        <x-partials.menssageError message={{$message}}/>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="username"
                                    class="col-md-4 col-form-label text-md-end"> <b>{{ __('Username') }}</b></label>

                                <div class="col-md-6">
                                    <input id="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        value="{{ old('username') }}" required autocomplete="username" autofocus>
                                    @error('username')
                                        <x-partials.menssageError message={{$message}}/>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end"> <b>{{ __('Email Address') }}</b></label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <x-partials.menssageError message={{$message}}/>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end"><b>{{ __('Password') }}</b></label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <x-partials.menssageError message={{$message}}/>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end"><b>{{ __('Confirm Password') }}</b> </label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                                @error('password_confirmation')
                                    <x-partials.menssageError message={{$message}}/>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label for="rol_id_fk"
                                    class="col-md-4 col-form-label text-md-end"><b>{{ __('Tipo de Roles') }}</b></label>

                                <div class="col-md-6">
                                    <select class="form-select" id="rol_id_fk" name="rol_id_fk">
                                        <option selected>Choose...</option>
                                        @if (Auth::user()->rol_id_fk==9)
                                            <option value=1>Admininstrador</option>
                                        @endif
                                        
                                        <option value=2>Cliente</option>
                                        <option value=3>Usuario</option>
                                    </select>
                                    @error('rol_id_fk')
                                        <x-partials.menssageError message='No a selecccionado el rol del nuevo usuario' />
                                    @enderror
                                </div>

                                {{-- @error('rol_id_fk')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror --}}
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
