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
      <center><h1>Book Page</h1></center>
      <hr>
      <a type="button" class="btn btn-primary" href={{asset('books')}}>Back</a>
        <div class="raw d-flex justify-content-center">
            <div class="col-md-8">
                <b>Auther</b> : {{$auther_name}}<br>
                <b>Title</b> : {{$bookdata['title']}} <br>
                <b>release_date</b> : {{$bookdata['release_date']}} <br>
                <b>description</b> : {{$bookdata['description']}} <br>
                <b>isbn</b> : {{$bookdata['isbn']}} <br>
                <b>format</b> : {{$bookdata['format']}} <br>
                <b>number_of_pages</b> : {{$bookdata['number_of_pages']}} <br>
                <br>
            </div>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>