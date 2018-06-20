
@extends('main')  
@section ('title', '|HOMEPAGE')    

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="stylesheet.css">

@endsection

@section('content')
             <div class="row">
                 <div class="col-md-12">
                     <div class="jumbotron">
                         <h1>WELCOME TO MY BLOG</h1>
                         <p>Thank you for visiting my website that i build in laravel</p>
                         <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular post</a></p>
                     </div>
                 </div>
             </div>
                
                  <div class="row">

                   <div class="col-md-8">
                        @foreach($posts as $post)
                         <div class="post">
                            <h3>{{ $post-> title}}</h3>
                            <p>{{ substr($post->body,'0',300)}}{{strlen($post->body)> 60 ?"....":" "}} </p>
                            <a href="{{ url('blog/'.$post->slugs) }}" class="btn btn-primary ">Read More</a>
                        </div>
                        <hr>
                        @endforeach
                          </div>
                     
                         <div class=" col-md-3 col-md-offset-1">
                             <h3>SIDEBAR</h3>
                         </div> 
                          
                  

     @endsection
   