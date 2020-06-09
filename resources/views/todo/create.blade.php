<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Laravel Insert Todo Example Tutorial- w3alert.com</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

</head>
 
<body>
 
<div class="container mt-5">
   
    <form id="add-todo" method="post" action="{{ url('post-todo') }}"> 
      @csrf

      <div class="form-group">
        <label for="formGroupExampleInput">Name</label>
        <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Please enter name">
        <span class="text-danger">{{ $errors->first('name') }}</span>
      </div> 

       <div class="form-group">
        <label for="formGroupExampleInput">Email</label>
        <input type="email" name="email" class="form-control" id="formGroupExampleInput" placeholder="Please enter email">
        <span class="text-danger">{{ $errors->first('email') }}</span>
      </div> 

      <div class="form-group">
        <label for="message">Message</label>
        <textarea class="form-control" name="message" placeholder="Please enter message"></textarea>
        <span class="text-danger">{{ $errors->first('message') }}</span>
      </div>

      <div class="form-group">
       <button type="submit" class="btn btn-success" id="btn-send">Submit</button>
      </div>
    </form>
 
</div>
</body>
</html>

