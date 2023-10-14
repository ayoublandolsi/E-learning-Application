@extends('apprenant.inc.header')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>video playlist</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="{{asset ('home/css')}}/Atyle.css">

</head>
<body>

<header class="header">

   <section class="flex">


   </section>

</header>

<div class="side-bar">

   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
    <img src="{{ asset('uploads/apprenant/'. $user->img)}}" alt="Admin" class="rounded-circle border border-dark" style="width: 150px; height: 150px; display: block;
    margin: auto;">
    <h3 class="name">{{$user->name}}</h3>
      <p class="role">Apprenant</p>
      <a href="{{route('apprenant.gerer.index')}}" class="btn">view profile</a>
   </div>

   <nav class="navbar">
      <a href="{{route('apprenant.gerer.courses')}}"><i class="fas fa-home"></i><span>home</span></a>
      <a href="courses.html"><i class="fas fa-graduation-cap"></i><span>courses</span></a>
      <a href="teachers.html"><i class="fas fa-chalkboard-user"></i><span>teachers</span></a>
      <a href="contact.html"><i class="fas fa-headset"></i><span>contact us</span></a>
   </nav>

</div>

<section class="playlist-details">

   <h1 class="heading">playlist details</h1>

   <div class="row">

      <div class="column">
         <form action="" method="post" class="save-playlist">
            <button type=""><i class="far fa-bookmark"></i> <span>save playlist</span></button>
         </form>

         <div class="thumb">
            <img src="{{ asset('uploads/courses/'.$course->img)}}" alt="">
         </div>
      </div>
      <div class="column">
         <div class="tutor">
            <img src="{{ asset('uploads/prof/'. $course->prof->img)}}" alt="">
            <div>
               <h3>{{$course->prof->name}}</h3>
               <span>{{$course->duree}} heure</span>
            </div>
         </div>

         <div class="details">
            <h3>{{$course->name}} </h3>
            <p>{{$course->desc}} .</p>
            <a href="#" class="inline-btn">view profile</a>
         </div>
      </div>
   </div>

</section>

<section class="playlist-videos">

   <h1 class="heading">playlist videos</h1>

   <div class="box-container">
@foreach ($videos as $video )


      <a class="box" href="{{route('apprenant.gerer.watch-video',$video->id)}}">
         <i class="fas fa-play"></i>
         <img src="{{ asset('home/img/images')}}/post-1-1.png" alt="">
         <h3>{{$video->name}}</h3>
      </a>
      @endforeach
      <a href="{{route('apprenant.gerer.examan',$course->id)}}" class="inline-option-btn">faire teste</a>
</div>

</section>
















<!-- custom js file link  -->
<script src="{{asset ('home/js')}}/sscript.js"></script>


</body>
</html>
@endsection
