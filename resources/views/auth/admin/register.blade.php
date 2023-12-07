@extends('layouts.users.app')

@section('title', 'Iniciar Sesion')

@section('content')
<div class="col-12 col-lg-6 px-0 px-lg-5 py-5 d-flex justify-content-center align-items-center mx-auto">
    <div class="container px-0 px-xl-5">
        <div class="px-5">
            <div class="mt-5">
                <form method="POST" action="{{ route('admin.register') }}">                            
                        @csrf                     
                        <div class="row">                          
                            <div class="col-12">                     
                                <label for="name" class="form-label">                
                                    Nombre                  
                                </label>                        
                                <input id="name" type="text"                          
                                class="py-3 form-control @error('name') is-invalid @enderror" name="name"                               
                                placeholder="" value="{{ old('name') }}" required autofocus>                   
                                @error('name')                       
                                    <span class="invalid-feedback" role="alert">                          
                                        <strong>{{ $message }}</strong>                     
                                    </span>               
                                @enderror
                                                        
                            </div>                    
                            <div class="col-12 mt-3">                          
                                <label for="email" class="form-label">                         
                                    Correo Electrónico                                            
                                </label>                      
                                <input id="email" type="email"                           
                                    class="py-3 form-control @error('email') is-invalid @enderror" name="email"                         
                                    placeholder="" value="{{ old('email') }}" required autofocus>                  
                                @error('email')                         
                                    <span class="invalid-feedback" role="alert">                                  
                                        <strong>{{ $message }}</strong>                     
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 mt-3">                            
                                <label for="password" class="form-label">                           
                                    Contraseña                        
                                </label>                    
                                <input id="password" type="password"
                                    class="py-3 form-control @error('password') is-invalid @enderror"                       
                                    name="password" placeholder="" required>
                                @error('password')                           
                                    <span class="invalid-feedback" role="alert">                            
                                        <strong>{{ $message }}</strong>                   
                                    </span>                
                                @enderror                  
                            </div>
                            <div class="col-12 mt-3">
                                <label for="password-confirm" class="form-label">
                                    Confirmar Contraseña
                                </label>
                                <input id="password-confirm" type="password" class="py-3 form-control"
                                    name="password_confirmation" placeholder="" required>
                            </div>
                            <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-quaternary-ti w-100 p-2">
                                Registrate
                                </button>
                            </div>                        
                        </div>
                </form>
                <hr class="my-4">
                                        
                <div class="mt-4 text-center">                    
                    ¿Ya tienes una cuenta?                       
                    <a href="{{ route('admin.login') }}" class="text-decoration-none fw-bold">                           
                        Inicia Sesion
                    </a>       
                </div>        
            </div>
        </div>
    </div>
</div>
@endsection
