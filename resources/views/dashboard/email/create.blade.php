@extends('layouts.app')

@section('content')

<div class="container">

    
    <div class="card" >
        <div class="card-header bg-primary">
          <h5 class="card-title"> <p class="h2 text-white">Envio de Email</p></h5>
        </div>
            <div class="card-body">
    
    
            <form action="{{route('email.store')}}" method="POST">
    
                @csrf 

            <div class="form-group">
                <label for="title">Asunto</label>
                <input class="form-control" type="text" id="asunto" name="asunto" value="{{old('asunto')}}" >
                @error('asunto')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
            <div class="form-group">
                <label for="title">Destinatario</label>
                <input class="form-control" type="email" id="destinatario" name="destinatario" value="{{old('destinatario')}}"  >
                @error('destinatario')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

           

            <div class="form-group">
                <label for="title">Cuerpo</label>
                {{-- <input class="form-control" type="text" id="cuerpo" name="cuerpo" value="{{old('cuerpo')}}" > --}}

                <textarea name="cuerpo" id="cuerpo" cols="30" class="form-control" rows="10">
                    {{old('cuerpo')}}
                </textarea>
                @error('cuerpo')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
           
            
            
            

       
                


                <input type="submit" value="Enviar" class="btn btn-primary">
                    <a  href="{{route('email.index')}}" class="btn btn-danger">Cancel</a>
    
                
            </form>
    
            </div>
   
            
    
    </div>

</div>

@endsection



