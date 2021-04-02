@extends('layouts.app')
@section('customCss')
    <style>
        .mybtn{
            height: 30px;
            width: 100px;
            padding-bottom: 3px;
            border: 1px solid black
        }
    </style>
@endsection

@section('content')

<div class="container text-centers">
    <h1 class="display-1">{{__('items Area')}}</h1> 
        <table class="table  table-striped  " >
          <thead class="thead-dark ">
            <tr>
              <th scope="col">{{__("id")}}</th>
              <th scope="col">{{__("Title")}} </th>
              <th scope="col">{{__("descreption")}} </th>
              <th scope="col">{{__("price")}} </th>
              <th scope="col">{{__("picture")}} </th>
              <th scope="col">
                <a href={{ route('item.additempage') }}><button class="btn btn-warning ml-2" type="submit">{{__("Add product")}} </button></a>
              </th>
            </tr>
            
          </thead>
          <tbody>
                @foreach ($all as $item)   
                <tr >
                  <th class="" scope='row'>{{$item->id}}</th>
                    <td  >{{$item->title}}</td>
                    <td  >{!! Str::limit($item->descreption, $limit = 15, $end = '...')!!}</td>
                    <td  >{{$item->price}}</td>
                    <td  ><img src={{$item->picture}} width="50px" height="50px"></td>
                    
                     <td>
                      <a id="delete" to={{ route('item.delete',$item->id)}}  onclick="deleteConfirm();"><Button class=' btn-danger mybtn'>delete</Button></a>
                      <a id="update" href={{ route('item.updateitempage',$item->id)}}  > <button  class=' btn-primary ml-2 mybtn' type='submit'>Update <i class='bi bi-pencil-square'></i></button></a>
                        <button  class=' btn-success ml-2 mybtn' type='submit'>View <i class='bi bi-pencil-square'></i></button>
                     </td>
                  
              </tr>
                @endforeach
          </tbody>
        </table>
</div>

    
@endsection