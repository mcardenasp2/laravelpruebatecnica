@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card" >
        <div class="card-header bg-primary">
          <h5 class="card-title"> <p class="h2 text-white">Creación de Usuario</p></h5>
        </div>
        <div class="card-body">

            
    <div class="form-group">
        <label for="title">Nombre</label>
        <input class="form-control" type="text" id="name" name="name" value="{{old('name',$user->name)}}" >
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>
    <div class="form-group">
        <label for="title">Email</label>
        <input class="form-control" type="text" id="email" name="email" value="{{old('email',$user->email)}}" >
        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>
    <div class="form-group">
        <label for="title">Password</label>
        <input class="form-control" type="password" id="password" name="password" value="{{old('password',$user->password)}}" >
        @error('password')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>
    <div class="form-group">
        <label for="title">Confirmación Password</label>
        <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" value="" >
        

    </div>

    <div class="form-group">
        <label for="title">Teléfono</label>
        <input class="form-control" type="text" id="telefono" name="telefono" value="{{old('telefono',$user->telefono)}}" >
        @error('telefono')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>
    <div class="form-group">
        <label for="title">Cédula</label>
        <input class="form-control" type="text" id="cedula" name="cedula" value="{{old('cedula',$user->cedula)}}" >
        @error('cedula')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>
    <div class="form-group">
        <label for="title">Fecha de Nacimiento</label>
        <input class="form-control" type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{old('fecha_nacimiento',$user->fecha_nacimiento)}}" >
        @error('fecha_nacimiento')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>
    
    <div class="form-group">
        <label for="title">Pais</label>
        <select class="form-control" name="country_id" id="country_id">

            @foreach ($countries as $name=>$id)
           
                <option value="{{$id}}" {{ old('supplier_ids') == $id ? "selected" : "" }}   >{{$name}}</option>

            @endforeach
            
        </select>

    </div>

    <div class="form-group">
        <label for="title">Estado</label>
        <select class="form-control" name="supplier_ids" id="supplier_ids">

            {{-- @foreach ($supplier as $company=>$id) --}}
                
                {{-- <option value="{{$id}}" {{ old('supplier_ids') == $id ? "selected" : "" }}  {{$product->supplier_ids==$id?'selected="selected"':''}} >{{$company}}</option> --}}

            {{-- @endforeach --}}
            
        </select>

    </div>

    <div class="form-group">
        <label for="title">Ciudad</label>
        <select class="form-control" name="supplier_ids" id="supplier_ids">

            {{-- @foreach ($supplier as $company=>$id)
              
                <option value="{{$id}}" {{ old('supplier_ids') == $id ? "selected" : "" }}  {{$product->supplier_ids==$id?'selected="selected"':''}} >{{$company}}</option>

            @endforeach --}}
            
        </select>

    </div>
         
          
            
    


        </div>
        <div class="card-footer bg-white">
            <input type="submit" value="Save" class="btn btn-primary">
            <a  href="{{route('user.index')}}" class="btn btn-danger">Cancel</a>

        </div>
      </div>



      
</div>




@endsection



@section('script')

<script>

    $(document).ready(function(e) {
        // alert();
        $("#country_id").change(function() {
            console.log( $("#country_id").val());
            pais=$("#country_id").val();
            // alert( "Handler for .change() called." );

            fetch('/dashboard/provinces/'+pais)
                .then(response=>response.json())
                 
                .then(json=>{
                    this.posts=json.data.data;
                    this.total=json.data.last_page;
                    
                    });
        });
    });

        
</script>
    
@endsection