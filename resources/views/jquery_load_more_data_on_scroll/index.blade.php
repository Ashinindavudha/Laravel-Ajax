<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Jquery Load More Data on Scroll</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	
<h1 class="text-primary bg-dark text-center mt-5 p-3">Jquery Load More Data on Scroll</h1>
	<section>
		<div class="container mt-5">
			<table class="table table-dark">
				<thead>
					<tr>
						<th scope="col">Name</th>
						<th scope="col">Email</th>
						<th scope="col">Address</th>
					</tr>
				</thead>
				<tbody id="load-data">
					@foreach($data as $val)
						<tr>
							<td>{{ $val->name }}</td>
							<td>{{ $val->email }}</td>
							<td>{{ $val->address }}</td>

						</tr>					@endforeach
				</tbody>
			</table>
			<div class="loader text-center" style="display: none;">
				<img src="https://www.whostack.com/public/img/Spinner.gif" alt="">
				loading more Data
			</div>
		</div>
	</section>
	<script>
		$(document).ready(function(){
    var page = 1;

    $(window).scroll(function () {
        if ($(window).scrollTop() == $(document).height() - $(window).height()) {
            page++;
        loadData(page);
        }   
    });

    function loadData(page){
    
        $.ajax({
            url: '?page=' + page,
            type: 'get',
            beforeSend: function() {
                $('.loader').show();
            }
        })
        .done(function(data) {

            if (data.html == " ") {
                alert('no data found');
                return;
            }
            $("#load-data").append(data.html);
        })
        .fail(function() {
            alert('server not responding...');
        })
    }    
});
	</script>
	<!-- jquery cdn -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>