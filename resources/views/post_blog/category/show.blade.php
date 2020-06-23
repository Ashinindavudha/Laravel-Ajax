@extends('layouts.main')

@section('content')
<div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">
        <div class="card-body">
          <div class="mb-2">
            <table class="table table-bordered table-striped">
          <tbody>
           <tr>
             <th>Category ID</th>
             <td>{{ $category_show->id }}</td>
             <th>Category Name</th>
             <td>{{ $category_show->name }}</td>
             <th>Created_At</th>
             <td>{{ $category_show->created_at }}</td>
           </tr> 
          </tbody>
        </table>
        
          </div>
        </div>
        <!-- Comments Form -->
        <div class="card my-4">
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