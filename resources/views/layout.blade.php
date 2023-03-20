<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- ajx -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--css-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <style>
    <?php

use App\Models\Background;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

    $background = Background::all();
    foreach($background as $b){
      if( $b->client_id == Auth::user()->client_id){
        $bg_image = $b->image;
      }
    }
    if(@$bg_image){
      $bg_image = "/image/".$bg_image;
    } else {
      $bg_image = "/images/bg.png";
    }
    // ->where('client_id',Auth::user()->client_id)
    // ->select('image');
    // dd($background);
    
    ?>
  body {
   background-image: url({{$bg_image}}); 
  

  
  /* background-color: #cccccc; */
  background-repeat: no-repeat;
    background-position: center center;
    background-attachment: fixed;
    background-size: cover;


}
</style>

    <nav class="navbar navbar-expand-lg navbar-light"  style="background-color: lightskyblue;">
  <a class="navbar-brand" href="#">Client Portal App</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link scrollto active" href="{{route('homes.index')}}">Home <span class="sr-only">(current)</span></a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link scrollto" href="{{route('apps.index')}}">Apps List</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link scrollto" href="{{route('background.create')}}">BG Image</a>
      </li>
      <li class="nav-item">
        <a class="nav-link scrollto" href="{{route('urls.index')}}">URl List</a>
      </li>
    @can('view')
      <li class="nav-item">
      <a class="nav-link scrollto" href="{{route('applications.index')}}">Applications</a>

      </li>
      <li class="nav-item">
        <a class="nav-link scrollto" href="{{route('roles.index')}}">Roles</a>
      </li>
      <li class="nav-item">
        <a class="nav-link scrollto" href="{{route('permission.index')}}">Permission</a>
      </li>
      <li class="nav-item">
        <a class="nav-link scrollto" href="{{route('users.index')}}">Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link scrollto" href="{{route('map.index')}}">UrlMap</a>
      </li>
      <li class="nav-item">
        <a class="nav-link scrollto" href="{{ url('/register') }}">Register</a>
      </li>
     @endcan
   
      
      
    
      
      
      
      
      
      
    </ul>
  </div>
  
  <div class="pull-right">
      <a class="nav-link scrollto" >
       <h5> {{ $user = auth()->user()->name; }}</h5> <span class="caret"></span>
      
  </div>
  <div class="mx-auto">
 
    <form method="POST" action="{{ route('logout') }}">
      <div class="col-md-4">
        @csrf
        <button type="submit" href="route('logout')" onclick="return myFunction();" class="btn btn-outline-dark" >LOGOUT</button>
        
        <!-- <a href="route('logout')"
        onclick="event.preventDefault();
        this.closest('form').submit();">
        {{ __('Log Out') }}
      </a> -->
    </form>

  </div>
</nav>   
   


      
    <script>
      function myFunction() {
        if(!confirm("Are You Sure to logout"))
        event.preventDefault();
      }
      </script>
    
  
  </ul>
</div> 


  



  </head>
  <body>


    <div  class="bg-image">

    </div>

  <!-- <img src="/images/bgimage.webp" alt="Bg Image" /> -->
  <div class="container">
    @yield('content')
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 

  </body>

  
</html>