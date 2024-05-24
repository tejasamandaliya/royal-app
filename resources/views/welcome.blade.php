<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>Login</title>
</head>
<body>
    <center><h1>Login</h1></center>
    <hr>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <form method="POST" action={{route('welcome.login')}}>
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" class="form-control" name="email" value="{{old('email')}}" id="exampleInputEmail1" aria-describedby="emailHelp">
                      @if($errors->has('email'))
                      <div class="error text-danger">{{ $errors->first('email') }}</div>
                      @endif
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                      @if($errors->has('password'))
                      <div class="error text-danger">{{ $errors->first('password') }}</div>
                      @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
            @if($errors->has('error-message'))
            
            <div class="text-danger">{{ $errors->first('error-message') }}</div>
            @endif
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>