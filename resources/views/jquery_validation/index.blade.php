<!DOCTYPE html>
<html lang="en">
<<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Laravel Jquery Form Validation</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
	<style>
		.error{ color:red; } 
	</style>
</head>
<body>
	<h1 class="text-primary text-center mt-5 p-3 bg-danger">Laravel Jquery Contact Form Validation Check</h1>

	<div class="container">
		@if ($message = Session::get('success'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">X</button>
			<strong>{{ $message }}</strong>
			
		</div>
		<br>
		@endif
		<form action="{{ url('save-contact') }}" method="post" id="contact-us-form">
			@csrf
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Enter Your Name">
				<span class="text-danger">{{ $errors->first('name') }}</span>
			</div>

			<div class="form-group">
				<label for="name">Email</label>
				<input type="email" name="email" class="form-control" id="formGroupExampleInput" placeholder="Enter Your Email">
				<span class="text-danger">{{ $errors->first('email') }}</span>
			</div>

			<div class="form-group">
				<label for="message">Message</label>
				<textarea name="message" class="form-control" id="message" placeholder="Please enter message"></textarea>
				<span class="text-danger">{{ $errors->first('message') }}</span>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-success">Submit</button>
			</div>
		</form>
	</div>
	
	<script>
		if ($("#contact-us-form").length > 0) {
			$("#contact-us-form").validate({
				rules: {
					name: {
						required: true,
						maxlength: 50
					},
					email: {
						required: true,
						maxlength: 50,
						email: true,
					},
					message: {
						required: true,
						minlength: 50,
						maxlength: 200,
					},
				},
				messages: {

					name: {
						required: "Please enter name",
						maxlength: "Your last name maxlength should be 50 characters long."
					},

					email: {
						required: "Please enter valid email",
						email: "Please enter valid email",
						maxlength: "The email name should less than or equal to 50 characters",
					},      

					message: {
						required: "Please enter message",
						minlength: "The message should be accept minimum 50 characters",
						maxlength: "The message should be accept minimum 50 characters",
					},

				},
			});
		}
	</script>

</body>
</html>