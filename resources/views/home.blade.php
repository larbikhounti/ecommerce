@extends('layouts.app')

@section('content')
<div class="container w-100">
    <div class="row justify-content-center ">
        <div class="col-md-12 ">
            <div class="card  ">
                <div class="card-header text-center">{{ __('insight') }}</div>

                <div class="card-body container row justify-content-around">
                    <div class="card " >
                        <div class="card-header text-center"> 
                            {{ __('sells') }}
                        </div>
                        <div class="card-body  text-center">
                           <h3>1500</h3>
                        </div> 
                    </div>
                    <div class="card " >
                        <div class="card-header text-center r "> 
                             {{ __('Clients') }}
                        </div>
                        <div class="card-body  text-center">
                           <h3>5</h3>
                        </div> 
                    </div>
                    <div class="card " >
                        <div class="card-header text-center"> 
                            {{ __('Products') }}
                        </div>
                        <div class="card-body  text-center">
                           <h3>{{$totalOfItems}}</h3>
                        </div> 
                    </div>
                    <div class="card " >
                        <div class="card-header text-center"> 
                            {{ __('Categories') }}
                        </div>
                        <div class="card-body  text-center">
                           <h3>{{$totalOfcategories}}</h3>
                        </div> 
                    </div>
                    <div class="card " >
                        <div class="card-header text-center"> 
                            {{ __('Colors') }}
                        </div>
                        <div class="card-body  text-center">
                           <h3>{{$totalOfColors}}</h3>
                        </div> 
                    </div>
                    <div class="card " >
                        <div class="card-header text-center"> 
                            {{ __('Sizes') }}
                        </div>
                        <div class="card-body  text-center">
                           <h3>{{$totalOfSizes}}</h3>
                        </div> 
                    </div>
                    
                </div>
            <div>
                
             </div>
             <div class="card  ">
                <div class="card-header text-center"> 
                    {{ __('Statics') }}
                </div>
                <div class="card-body  text-center row constainer justify-content-around">
                <div class="card " >
                    <div class="card-header text-center"> 
                        {{ __('sells') }}
                    </div>
                    <div class="card-body  text-center">
                        <canvas id="Charts" name="sells"></canvas>
                    </div> 
                </div>

                <div class="card " >
                    <div class="card-header text-center"> 
                        {{ __('clients') }}
                    </div>
                    <div class="card-body  text-center">
                        <canvas id="Charts" name="clients"></canvas>
                    </div> 
                </div>
            </div> 
             <div>
            </div>
        </div>
    </div>
</div>
@endsection
