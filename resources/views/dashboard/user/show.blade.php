@extends('layouts.app')

@section('content')

<div class="container">

    
    <div class="card" >
        <div class="card-header bg-primary">
          <h5 class="card-title"> <p class="h2 text-white">Mostrar Usuario</p></h5>
        </div>
            <div class="card-body">
    


            
            <div class="form-group">
                <label for="title">Nombre</label>
                <input class="form-control" type="text" id="name" name="name" value="{{old('name',$user->name)}}" readonly >
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
            <div class="form-group">
                <label for="title">Email</label>
                <input class="form-control" type="text" id="email" name="email" value="{{old('email',$user->email)}}" readonly >
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

         

            {{-- <div class="form-group">
                <label for="title">Password</label>
                <input class="form-control" type="password" id="password" name="password" value="{{old('password',$user->password)}}" >
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
            <div class="form-group">
                <label for="title">Confirmación Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

            </div> --}}

            <div class="form-group">
                <label for="title">Teléfono</label>
                <input class="form-control" type="text" id="telefono" name="telefono" value="{{old('telefono',$user->telefono)}}" readonly>
                @error('telefono')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
            <div class="form-group">
                <label for="title">Cédula</label>
                <input class="form-control" type="text" id="cedula" name="cedula" value="{{old('cedula',$user->cedula)}}"  readonly>
                @error('cedula')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
            <div class="form-group">
                <label for="title">Fecha de Nacimiento</label>
                <input class="form-control" type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{old('fecha_nacimiento',$user->fecha_nacimiento)}}" readonly>
                @error('fecha_nacimiento')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
            
            <div class="form-group">
                <label for="title">Pais</label>
                <select class="form-control" name="country_id" id="country_id" disabled>
                    <option value="" selected>Elige un País...</option>

                    @foreach ($countries as $name=>$id)
                
                    <option value="{{$id}}"  {{$user->city->province->country_id==$id?'selected="selected"':''}}  >{{$name}}</option>

                    @endforeach
                    
                </select>

            </div>

            <div class="form-group">
                <label for="title">Estado</label>
                <select class="form-control" name="estado_id" id="estado_id" disabled>

                    @foreach ($provinces as $name=>$id)
                    
                    <option value="{{$id}}"  {{$user->city->province_id==$id?'selected="selected"':''}}  >{{$name}}</option>

                    @endforeach
                    
                </select>

            </div>

            <div class="form-group">
                <label for="title">Ciudad</label>
                <select class="form-control" name="city_id" id="city_id" disabled>

                    @foreach ($cities as $name=>$id)
                    
                        <option value="{{$id}}" {{ old('city_id') == $id ? "selected" : "" }}  {{$user->ciudad_id==$id?'selected="selected"':''}} >{{$name}}</option>

                    @endforeach
                    
                </select>

            </div>
                


                
                    <a  href="{{route('user.index')}}" class="btn btn-danger">Atras</a>
    
                
        
    
            </div>
   
            
    
    </div>

</div>

@endsection




