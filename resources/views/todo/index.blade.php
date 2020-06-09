<!DOCTYPE html>
 
<html lang="en">
<head>

<title>Laravel DataTables Todo CRUD Example Tutorial - w3alert.com</title>

<script src="https://code.jquery.com/jquery-3.4.1.js"></script> 

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

</head>
      <body>
         <div class="container mt-4">
            <h2 class="text-center mt-2 mb-3 alert alert-success">Laravel DataTables Todo CRUD Example Tutorial</h2>
            <a href="{{ url('add-todo') }}" class="text-center btn btn-success mb-1">Create Todo</a>
            <table class="table table-bordered" id="laravel-datatable-crud">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Message</th>
                     <th>Created at</th>
                     <th>Action</th>
                  </tr>
               </thead>
            </table>
         </div>
   <script>
     $(document).ready( function () {
      $('#laravel-datatable-crud').DataTable({
           processing: true,
           serverSide: true,
          ajax: {
            url: "{{ url('list') }}",
            type: 'GET',
           },
           columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'message', name: 'message'},
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action' }
                 ]
       });
     });

     $('body').on('click', '.deleteTodo', function () {
 
        var todo_id = $(this).data("id");
        if(confirm("Are You sure want to delete !"))
        {
          $.ajax({
              type: "get",
              url: "{{ url('delete-todo') }}"+'/'+todo_id,
              success: function (data) {
              var oTable = $('#laravel-datatable-crud').dataTable(); 
              oTable.fnDraw(false);
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });
       }
    });   
  
   </script>
  </body>
</html>