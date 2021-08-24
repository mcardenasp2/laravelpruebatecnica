@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card" >
        <div class="card-header bg-primary">
          <h5 class="card-title"> <p class="h2 text-white">Lista de Email</p></h5>
        </div>
        <div class="card-body">
         
          
            
        <table id="example" class="table table-striped table-bordered" style="width:100%">

          <thead>
              <tr>
                  
                  <th>Destinatario</th>
                  <th>Asunto</th>
                  <th>Cuerpo</th>
                  <th>Estado</th>
                  <th>Fecha</th>
                  
                  {{-- <th>Action</th> --}}
              </tr>
          </thead>
          <tbody>

            @foreach ($emails as $email)
              <tr>
                {{-- <td>{{$email->user_id}}</td> --}}
                  <td>{{$email->destinatario}}</td>
                  <td>{{$email->asunto}}</td>
                  <td>{{$email->cuerpo}}</td>
                  <td>{{$email->estado}}</td>
                  <td>{{$email->created_at}}</td>
                 
                  
           
                  {{-- <td> --}}
                    {{-- <a class="btn btn-primary" href="{{route('user.show',$user->id)}}" role="button">Ver</a> --}}
                    {{-- <a class="btn btn-warning" href="{{route('user.edit',$user->id)}}" role="button">Editar</a> --}}
        
                  {{-- </td> --}}
              </tr>
              @endforeach

           



             


          </tbody>
      </table>


        </div>
        <div class="card-footer bg-white">
            
          <a  href="{{route('email.create')}}" class="btn btn-primary ">Create</a>
          <a  href="{{route('email.index')}}" class="btn btn-success ">Update</a>

        </div>
      </div>



      
</div>




@endsection


@section('script')

<script >

    $('#example').DataTable();
</script>
    
@endsection