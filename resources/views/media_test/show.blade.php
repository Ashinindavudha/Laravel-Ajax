@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product Details</div>

                <div class="card-body">
                     Product Name:  {{$mediaTest->name}} <br/><br/>

                     Product Description : {{$mediaTest->description}} <br/><br/>


                     Image: <img src="{{$mediaTest->getFirstMediaUrl('images', 'thumb')}}" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
