@extends('layouts.app')

@section('content')

<div class="container">

    





    <div class="card" >
        <div class="card-header bg-primary">
          <h5 class="card-title"> <p class="h2 text-white">Creación de Usuario</p></h5>
        </div>
            <div class="card-body">
    
    
            <form action="{{route('user.store')}}" method="POST">
    
                @csrf 
                @include('dashboard.user._form')


                <input type="submit" value="Save" class="btn btn-primary">
                    <a  href="{{route('user.index')}}" class="btn btn-danger">Cancel</a>
    
                
            </form>
    
            </div>
    
    
        
            
    
    </div>

</div>

@endsection

