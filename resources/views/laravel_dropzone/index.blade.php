@extends('layouts.main')


@section('content')

<div class="row">

	<!-- Post Content Column -->
	<div class="col-lg-8">
		<div class="row">
			<a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
		</div>
		@foreach($posts as $media)
		<!-- Title -->
		<h1 class="mt-4">{{ $media->title }}</h1>

		<!-- Author -->
		<p class="lead">
			by
			<a href="#">Start Bootstrap</a>
		</p>

		<hr>

		<!-- Date/Time -->
		<p>Posted on {{ $media->created_at }}</p>

		<hr>

		<!-- Preview Image -->

		

		<hr>

		<!-- Post Content -->
		<p class="lead">{!! htmlspecialchars_decode($media->description) !!}
		</p>
		<form action="{{ route('posts.destroy',$media->id) }}" method="POST">
                        <a href="{{ route('posts.show', $media->id) }}" class="btn btn-warning">Show</a>
                        <a href="{{ route('posts.edit', $media->id) }}" class="btn btn-success">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" >Delete</button>
                    </form>

		@endforeach
		<hr>

		<!-- Comments Form -->
		<div class="card my-4">
			<h5 class="card-header"></h5>
			<div class="card-body">

			</div>
		</div>

		<!-- Single Comment -->
		<div class="media mb-4">
			<div class="media-body">

			</div>
		</div>

		<!-- Comment with nested comments -->
		<div class="media mb-4">
			<div class="media-body">


				<div class="media mt-4">
					<div class="media-body">

					</div>
				</div>

				<div class="media mt-4">
					<div class="media-body">

					</div>
				</div>

			</div>
		</div>

	</div>

	<!-- Sidebar Widgets Column -->
	<div class="col-md-4">

		<!-- Search Widget -->
		<div class="card my-4">
			<h5 class="card-header">Search</h5>
			<div class="card-body">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search for...">
					<span class="input-group-btn">
						<button class="btn btn-secondary" type="button">Go!</button>
					</span>
				</div>
			</div>
		</div>

		<!-- Categories Widget -->
		<div class="card my-4">
			<h5 class="card-header">Categories</h5>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-6">
						<ul class="list-unstyled mb-0">
							<li>
								<a href="#">Web Design</a>
							</li>
							<li>
								<a href="#">HTML</a>
							</li>
							<li>
								<a href="#">Freebies</a>
							</li>
						</ul>
					</div>
					<div class="col-lg-6">
						<ul class="list-unstyled mb-0">
							<li>
								<a href="#">JavaScript</a>
							</li>
							<li>
								<a href="#">CSS</a>
							</li>
							<li>
								<a href="#">Tutorials</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Side Widget -->
		<div class="card my-4">
			<h5 class="card-header">Side Widget</h5>
			<div class="card-body">
				You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
			</div>
		</div>

	</div>

</div>
<!-- /.row -->

@endsection