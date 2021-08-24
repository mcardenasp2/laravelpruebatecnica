


            
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

    <div class="form-group ">
        <label for="password" class="">{{ __('Password') }}</label>

        {{-- <div class="col-md-6"> --}}
            <input id="password" type="password" value="{{old('password',$user->password)}}" class="form-control @error('password')  is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        {{-- </div> --}}
    </div>

    <div class="form-group">
        <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

        {{-- <div class="col-md-6"> --}}
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        {{-- </div> --}}
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
            <option value="" selected>Elige un País...</option>

            @foreach ($countries as $name=>$id)
           
                <option value="{{$id}}" {{ old('supplier_ids') == $id ? "selected" : "" }}   >{{$name}}</option>

            @endforeach
            
        </select>

    </div>

    <div class="form-group">
        <label for="title">Estado</label>
        <select class="form-control" name="estado_id" id="estado_id">

            {{-- @foreach ($supplier as $company=>$id) --}}
                
                {{-- <option value="{{$id}}" {{ old('supplier_ids') == $id ? "selected" : "" }}  {{$product->supplier_ids==$id?'selected="selected"':''}} >{{$company}}</option> --}}

            {{-- @endforeach --}}
            
        </select>

    </div>

    <div class="form-group">
        <label for="title">Ciudad</label>
        <select class="form-control" name="city_id" id="city_id">

            {{-- @foreach ($supplier as $company=>$id)
              
                <option value="{{$id}}" {{ old('supplier_ids') == $id ? "selected" : "" }}  {{$product->supplier_ids==$id?'selected="selected"':''}} >{{$company}}</option>

            @endforeach --}}
            
        </select>

    </div>
         
          
            
    


       



    



@section('script')

<script>

    $(document).ready(function(e) {
        // alert();
        $("#country_id").change(function() {
            // console.log( $("#country_id").val());
            pais=$("#country_id").val();
            // alert( "Handler for .change() called." );

            fetch('/dashboard/provinces/'+pais)
                .then(response=>response.json())
                 
                .then(json=>{


                    $("#estado_id option").remove();
                    $("#estado_id").append('<option value="" selected>Elige una Provincia...</option>');


                    $.each(json, function (value, id) {
                         $("#estado_id").append('<option value="' + id+ '">' + value + '</option>');
                    });

                    
                    });
        });


        $("#estado_id").change(function() {
            console.log( $("#estado_id").val());
            estado=$("#estado_id").val();
            // alert( "Handler for .change() called." );

            fetch('/dashboard/ciudades/'+estado)
                .then(response=>response.json())
                 
                .then(json=>{


                    $("#city_id option").remove();
                    $("#city_id").append('<option value="" selected>Elige una Ciudad...</option>');


                    $.each(json, function (value, id) {
                         $("#city_id").append('<option value="' + id+ '">' + value + '</option>');
                    });

                    
                    });
        });

    });

        
</script>
    
@endsection