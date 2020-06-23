@extends('layouts.main')

    @section('style')
    {{-- <link rel="stylesheet" type="text/css" href="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/css/bootstrap.min.css"></link> --}}
    <link rel="stylesheet" type="text/css" href="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/css/prettify.css"></link>
    <link rel="stylesheet" type="text/css" href="https://jhollingworth.github.io/bootstrap-wysihtml5//src/bootstrap-wysihtml5.css"></link>
    @endsection
@section('content')

<body class="wysihtml5-supported">
    <div class="container">
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-12">
                <div id="showimages"></div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 style="color: black;">How To Use WYSIHTML5 Editor In Laravel? - NiceSnippets.com</h3>
                    </div>
                    <div class="panel-body">
                        <form class="image-upload" method="post" action="{{ route('books.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control"/>
                            </div>  
                            <div class="form-group">
                                <label>Author Name</label>
                                <input type="text" name="auther_name" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="textarea" style="width: 730px; height: 200px"></textarea>
                            </div>  
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success btn-lg">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
@endsection
@section('scripts')
 <script src="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/js/wysihtml5-0.3.0.js"></script>
    <script src="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/js/jquery-1.7.2.min.js"></script>
    <script src="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/js/prettify.js"></script>
    <script src="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/js/bootstrap.min.js"></script>
    <script src="https://jhollingworth.github.io/bootstrap-wysihtml5//src/bootstrap-wysihtml5.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          $('.textarea').wysihtml5();
        });
    </script>

    @stop