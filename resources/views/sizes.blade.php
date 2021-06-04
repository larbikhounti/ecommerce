@extends('layouts.app')


@section('content')

<div class="container text-center">
    <h1 class="display-1">{{__('sizes Area')}}</h1> 
   
 

        <table class="table w-100 center m-auto table-striped  " >
          <thead class="thead-dark ">
            <tr>
              <th scope="col">{{__("id")}}</th>
              <th scope="col">{{__("Size")}} </th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col">
              <form class="column row" action={{route('size.add')}} method="post">
                @csrf
                <input class=" input-group-sm" type="text" name="size" required>
                <button class="btn btn-success ml-2" type="submit">Add Size</button>
              </form>
              </th>
              
            </tr>
          </thead>
          <tbody>
              
                @foreach ($all as $size)
                    
                <tr >
                  <th class="h1" scope='row'>{{$size->id}}</th>
                      <td class="h1" >{{$size->name}}</td>
                  <td>
                   
                      <a id="delete" to={{ route('size.delete',$size->id)}}  onclick="deleteConfirm();"><Button class='btn btn-danger'>delete</Button></a>
                  </td>
                     <td>
                     </td>
                  <td>
                  <form class='column row' action={{ route('size.update')}}  method='POST'>
                    @csrf
                      <input class=' input-group-sm' type='text' name='color' required>
                      <input class=' input-group-sm' type='number' name='id' value={{$size->id}} hidden>
                      <button class='btn btn-primary ml-2' type='submit'>Update <i class='bi bi-pencil-square'></i></button>
                  </form>
                  </td> 
              </tr>
        
                @endforeach
             
         
          </tbody>
        </table>
        
     
        
</div>

    
@endsection