<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Book</title>
</head>
<body>


    <div class="container">
        <center><h1>Add Auther</h1></center>
        <hr>
        <a type="button" class="btn btn-primary" href={{asset('books')}}>Back</a>

        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <form method="POST" action={{route('create.book')}}>
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Auther</label>
                        <select class="form-control" name="author">
                            <option value="">Select Auther</option>
                        @foreach ($authers['items'] as $auther)
                            <option value={{$auther['id']}}>{{$auther['first_name'].' '.$auther['last_name']}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('author'))
                        <div class="error text-danger">{{ $errors->first('author') }}</div>
                        @endif
                    </div>
                    

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Title</label>
                      <input type="text" class="form-control" name="title">
                      @if($errors->has('title'))
                      <div class="error text-danger">{{ $errors->first('title') }}</div>
                      @endif
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Release date</label>
                        <input type="datetime-local" class="form-control" name="release_date">
                        @if($errors->has('release_date'))
                        <div class="error text-danger">{{ $errors->first('release_date') }}</div>
                        @endif
          
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description">
                        @if($errors->has('description'))
                        <div class="error text-danger">{{ $errors->first('description') }}</div>
                        @endif
          
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">isbn</label>
                        <input type="text" class="form-control" name="isbn">
                        @if($errors->has('isbn'))
                        <div class="error text-danger">{{ $errors->first('isbn') }}</div>
                        @endif
          
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Format</label>
                        <input type="text" class="form-control" name="format">
                        @if($errors->has('format'))
                        <div class="error text-danger">{{ $errors->first('format') }}</div>
                        @endif
          
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Number of pages</label>
                        <input type="number" class="form-control" name="number_of_pages">
                        @if($errors->has('number_of_pages'))
                        <div class="error text-danger">{{ $errors->first('number_of_pages') }}</div>
                        @endif
          
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>