<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Books</title>
</head>
<body>




    <div class="container">
      <center><h1>books</h1></center>
      <hr>
      <a  type="button" class="btn btn-primary" href={{asset('authers')}}>Back</a>
        <div class="raw d-flex justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">title</th>
                        <th scope="col">release_date</th>
                        <th scope="col">isbn</th>
                        <th scope="col">format</th>
                        <th scope="col">number_of_pages</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                       @forelse ($books['items'] as $book)
                       <tr>
                          <th scope="row">{{$book['id']}}</th>
                          <td>{{$book['title']}}</td>
                          <td>{{$book['release_date']}}</td>
                          <td>{{$book['isbn']}}</td>
                          <td>{{$book['format']}}</td>
                          <td>{{$book['number_of_pages']}}</td>
                          <td><a type="button" class="btn btn-info" href={{url('books/'.$book['id'])}}>View</a></td>
                          <td><a type="button" class="btn btn-danger" onclick="return confirm('Are You Sure ?')" href={{url('book-delete/'.$book['id'])}}>Delete</a></td>
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