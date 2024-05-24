<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Authers</title>
</head>
<body>


    <div class="container">
      <center><h1>Authers</h1></center>
      <hr>
      Welcome, {{session('user_name') }} &nbsp;&nbsp;&nbsp;&nbsp;<a type="button" class="btn btn-danger" href={{asset('logout')}}>Logout</a><br>
      <hr>
      <a href={{asset('books')}}>Books</a> <br>
      <a href={{asset('create-book')}}>Add Books</a><br>
      
      
        <div class="raw d-flex justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Birthday</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Place Of Birth</th>
                        <th scope="col">Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                       @forelse ($authers['items'] as $auther)
                       <tr>
                          <th scope="row">{{$auther['id']}}</th>
                          <td>{{$auther['first_name']}}</td>
                          <td>{{$auther['last_name']}}</td>
                          <td>{{$auther['birthday']}}</td>
                          <td>{{$auther['gender']}}</td>
                          <td>{{$auther['place_of_birth']}}</td>
                          <td><a type="button" class="btn btn-info" href={{url('authers/'.$auther['id'])}}>View</a></td>

                        </tr>
                       @empty
                       <tr>
                        <th>No data found</th>
                      </tr>
                       @endforelse 
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>