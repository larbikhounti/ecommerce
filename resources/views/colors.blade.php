@extends('layouts.app')


@section('content')

<div class="container text-center">
    <h1 class="display-1">{{__('Colors Area')}}</h1> 
   
 

        <table class="table w-100 center m-auto table-striped  " >
          <thead class="thead-dark ">
            <tr>
              <th scope="col">{{__("id")}}</th>
              <th scope="col">{{__("Color")}} </th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col">
              <form class="column row" action={{ route('color.add')}} method="post">
                @csrf
                <input class=" input-group-sm" type="text" name="color" required>
                <button class="btn btn-success ml-2" type="submit">Add Color</button>
              </form>
              </th>
              
            </tr>
          </thead>
          <tbody>
              
                @foreach ($all as $color)
                    
                <tr >
                  <th class="h1" scope='row'>{{$color->id}}</th>
                      <td class="h1" >{{$color->name}}</td>
                  <td>
                   
                      <a id="delete" to={{ route('color.delete',$color->id)}}  onclick="deleteConfirm();"><Button class='btn btn-danger'>delete</Button></a>
                  </td>
                     <td>
                     </td>
                  <td>
                  <form class='column row' action={{ route('color.update')}}  method='POST'>
                    @csrf
                      <input class=' input-group-sm' type='text' name='color' required>
                      <input class=' input-group-sm' type='number' name='id' value={{$color->id}} hidden>
                      <button class='btn btn-primary ml-2' type='submit'>Update <i class='bi bi-pencil-square'></i></button>
                  </form>
                  </td> 
              </tr>
        
                @endforeach
             
         
          </tbody>
        </table>
        
     
        
</div>

    
@endsection