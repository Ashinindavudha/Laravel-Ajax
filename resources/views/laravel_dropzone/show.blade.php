@extends('layouts.main')


@section('content')

<div class="row">

	<!-- Post Content Column -->
	<div class="col-lg-8">
		<h1>Post Detail</h1>

		<div class="container">
			<div class="row">
				<div class="col-sm">
					
					<h1>{{ $post->title }}</h1>
					@foreach ($post->media as $mediaItem)

					<a href="{{ route('api.media.show', ['mediaItem' => $mediaItem->id, 'size' => 'large']) }}">
						<img src="{{ route('api.media.show', ['mediaItem' => $mediaItem->id, 'size' => 'thumb']) }}">
					</a>
					<p>
						{{$mediaItem->name}}
					</p>

					@endforeach
					<hr/>
						<p class="lead">{!! htmlspecialchars_decode($post->description) !!}
					</p>
				</div>
				
			</div>
		</div>

		<hr>

		<div class="row">
			<p>Create Post:: {{ $post->created_at }}</p>&nbsp &nbsp &nbsp &nbsp
			<span>Update :: {{ $post->updated_at }}</span>
		</div>

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