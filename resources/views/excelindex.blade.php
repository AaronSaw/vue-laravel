<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <title>Document</title>
</head>
<body>
<form action="{{ route('excel.import') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="excel" class="form-control">
    <button class="btn btn-sm btn-danger">upload</button>
  </form>
</body>
</html>
