@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card" >
        <div class="card-header bg-primary">
          <h5 class="card-title"> <p class="h2 text-white">Lista de Usuario</p></h5>
        </div>
        <div class="card-body">
         
          
            
        <table id="example" class="table table-striped table-bordered" style="width:100%">

          <thead>
              <tr>
                  <th>Nombre</th>
                  <th>Rol</th>
                  <th>Email</th>
                  <th>Edad</th>
                  <th>Cedula</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>

            @foreach ($users as $user)
              <tr>
                  <td>{{$user->name}}</td>
                  <td>{{$user->rol->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->fecha_nacimiento}}</td>
                  <td>{{$user->cedula}}</td>
                  
           
                  <td>
                    <a class="btn btn-primary" href="#" role="button">Ver</a>
                    <a class="btn btn-warning" href="{{route('user.edit',$user->id)}}" role="button">Editar</a>
                    {{-- @csrf --}}
                    <a class="btn btn-danger btndelete" href="#" role="button"  >Eliminar</a>
                    {{-- <a class="btn btn-danger btndelete" id="btndelete'" href="#" role="button"  >Eliminar</a> --}}
                  </td>
              </tr>
              @endforeach




             


          </tbody>
      </table>


        </div>
        <div class="card-footer bg-white">
            
          <a  href="{{route('user.create')}}" class="btn btn-primary ">Create</a>
          <a  href="{{route('user.index')}}" class="btn btn-success ">Update</a>

        </div>
      </div>



      
</div>




@endsection