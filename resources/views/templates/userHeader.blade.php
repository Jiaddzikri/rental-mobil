<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible"
        content="ie=edge">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("user_assets/dist/css/bootstrap.css")}}">
  <link rel="stylesheet" href="{{asset("admin_assets/plugins/fontawesome-free/css/all.css")}}">
  <link rel="stylesheet" href="{{asset("user_assets/dist/css/rental-mobil.css")}}">
  <title>{{$title}}</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <a class="navbar-brand ml-5"
     href="#">ArhamTrans</a>
  <button class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse"
       id="navbarNav">
    <ul class="navbar-nav mr-5">
      <li class="nav-item active">
        <a class="nav-link"
           href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link"
           href="/about">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"
           href="/data/mobil">Data</a>
      </li>
    </ul>
  </div>
</nav>
