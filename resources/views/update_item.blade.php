@extends('layouts.app')

@section('js')
<script type="text/javascript">
$(document).ready(function (e) {
    
    //checking if its the accpeted format 
     let types =[ "png","jpeg","jpg","PNG","JPEG","JPG"]
    let files= document.querySelectorAll("#file")
    $(".primary").css("display","none")
     $(files).each(function (index, element) {
        
        $(element).change((event)=>{
            console.log("workd")
            let text = $(event.target).val()
            let splited = text.split(".",2); 
            console.log(this.files[0].size)
            for (let i = 0; i < types.length; i++) {
                if (this.files[0].size > 8000000){
                    $(".primary").text("image size  is bigger than 8M")
                    $(".primary").css("display","unset")
                    $(element).val("");
                    break
                }
                else if(splited[1] === types[i]){
                    $(".primary").css("display","none")
                break
                }
                if(i === 5){
                console.log("false")
                $(".primary").css("display","unset")
                $(element).val("");
                }
                
            }
         
           
        })
        });
})
</script>
    

<script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>


<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection

@section('content')

<div id='login '>
    <div class='container'>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div id='login-row' class='row justify-content-center align-items-center'>
            <div id='login-column' class='col-md-6'>
                <div id='login-box' class='col-md-12 bg-dark'>

                    <form id='login-form'enctype="multipart/form-data" class='form' action={{ route('item.update') }} method='post'>
                        @csrf
                    <input type="hidden" name="MAX_FILE_SIZE" value="8000000" />
                    <input type="hidden" name="id" value={{$id}} />
                        <h3 class='text-center text-light'>Update Product</h3>
                            <div class='form-group'>
                            <div class='alert alert-danger  primary alert-dismissible fade show' role='alert'>
                                <strong>{{__("opps")}}</strong> {{__("image type not supported")}}.
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                    </button> 
                            </div>
                        <div class='form-group'>
                        </div>
                        <div class='form-group column'>                            
                            <div>
                                <label for='primary_image' class='text-light font-weight-bold'>{{__("primary image")}} </label><br>
                                <input type='file'  name='primary_image'  id='file'  accept="image/png,image/jpg,image/jpeg" class="form-control-file bg-light" >
                            </div>
                            <div>
                                <label for='secondary_images' class='text-light font-weight-bold'>{{__("secondary images")}}</label><br>
                                
                                <input type='file'  name='secondary_images[]'  id='file'  accept="image/png,image/jpg,image/jpeg" class="form-control-file bg-light"  multiple >
                            </div>                                                             
                        </div>
                        <div class='form-group'>
                            <label for='title'  class='text-light font-weight-bold'>{{__("title")}}</label><br>
                            <input type='text'  name='title'  id='title' class='form-control bg-light' value="{{ $item->title }}" >
                        </div>
                        <div class='form-group'>
                            <label for='slug'  class='text-light font-weight-bold'>{{__("slug")}}</label><br>
                            <input type='text'  name='slug'  id='slug' class='form-control bg-light'  value="{{ $item->slug }}" >
                        </div>
                        <div class='form-group' >
                            <label for='description' class='text-light font-weight-bold'>{{__("description")}}</label><br>
                            <textarea type='text' id="description"  name='description'    class='form-control' aria-multiline="true"  >{!!$item->descreption!!}</textarea>
                        </div>
                        <div class='form-group'>
                            <label for='price' class='text-light font-weight-bold'>{{_("price")}}</label><br>
                            <input type='number' step='0.01' name='price'  id='price' class='form-control' value="{{ $item->price }}"  >
                        </div>
                        <div class='form-group'>
                            <label for='quantity' class='text-light font-weight-bold'>{{_("quantity")}}</label><br>
                            <input type='number'   name='quantity'  id='quantity' class='form-control' value="{{ $item->quantity }}"  >
                        </div>
                        <label for='Category' class='text-light font-weight-bold'>{{__("Categories")}}</label><br>
                        <div class='input-group  form-group buttom' id="Category">
                                <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">{{__("Categories")}}</label>
                                 </div>
                                        <select  name="categories[]" multiple class="custom-select" id="inputGroupSelect01"  >
                                            @foreach ($categories as $category)
                                                <option value={{ $category->id}}>{{ $category->name}}</option>
                                            @endforeach
                                        </select>    
                        </div>
                        <label for='Category' class='text-light font-weight-bold'>{{__("Colors")}}</label><br>
                        <div class='input-group  form-group buttom'>
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">{{__("Colors")}}</label>
                            </div>
                                 <select name="colors[]"  multiple class='custom-select' id='inputGroupSelect01' >
                                   
                                    @foreach ($colors as $color)
                                    <option value={{ $color->id}}>{{ $color->name}}</option>
                                    @endforeach
                                      
                                </select>

                        </div>
                        <div class='form-group'>
                            <input type='text' value="add"   name='method'  id='quantity' class='form-control'  hidden>
                        </div>
                        
                        <div class='form-group buttom'>
                            <input type='submit' name='submit' class='btn btn-success btn-lg' value='Add Product'> 
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    
</div>
@endsection
