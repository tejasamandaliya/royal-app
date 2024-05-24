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
      <center><h1>Auther Page</h1></center>
      <hr>
      <a  type="button" class="btn btn-primary" href={{asset('authers')}}>Back</a>

      @if (count($autherdata['books']) == 0)
      <a  type="button" class="btn btn-danger" onclick="return confirm('Are You Sure ?')" href={{asset('auther-delete/'.$autherdata['id'])}}>Delete</a>
          
      @endif

        <div class="raw d-flex justify-content-center">
            <div class="col-md-8">
                <b>Name</b> : {{$autherdata['first_name'] . ' '.$autherdata['last_name']}} <br>
                <b>Birthday</b> : {{$autherdata['birthday']}} <br>
                <b>Gender</b> : {{$autherdata['gender']}} <br>
                <b>place of birth</b> : {{$autherdata['place_of_birth']}} <br>
                <br>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Release date</th>
                        <th scope="col">Description</th>
                        <th scope="col">Isbn</th>
                        <th scope="col">Format</th>
                        <th scope="col">Number of pages</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                       @forelse ($autherdata['books'] as $book)
                       <tr>
                          <th scope="row">{{$book['id']}}</th>
                          <td>{{$book['title']}}</td>
                          <td>{{$book['release_date']}}</td>
                          <td>{{$book['description']}}</td>
                          <td>{{$book['isbn']}}</td>
                          <td>{{$book['format']}}</td>
                          <td>{{$book['number_of_pages']}}</td>
                          <td><a type="button" class="btn btn-danger" href={{url('book-delete/'.$book['id'])}}>Delete</a></td>
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