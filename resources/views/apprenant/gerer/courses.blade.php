@extends('apprenant.inc.header')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">


   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title></title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="{{asset ('home/css')}}/Atyle.css">

</head>
<body>

<header class="header">

   <section class="flex">





      <div class="profile">
         <img src="images/pic-1.jpg" style="margin-left: 10% !important" class="image" alt="">
         <h3 class="name">hamza mansour</h3>
         <p class="role">studen</p>
         <a href="route('apprenant.gerer.index')" class="btn">view profile</a>
         <div class="flex-btn">
            <a href="login.html" class="option-btn">login</a>
            <a href="register.html" class="option-btn">register</a>
         </div>
      </div>

   </section>

</header>

<div class="side-bar">

   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
    <img src="{{ asset('uploads/apprenant/'. $userImage)}}" alt="Admin" class="rounded-circle border border-dark" style="width: 150px; height: 150px; display: block;
    margin: auto;">
    <h3 class="name">{{$apprenants->name}}</h3>
      <p class="role">Apprenant</p>
      <a href="{{route('apprenant.gerer.index')}}" class="btn">view profile</a>
   </div>

   <nav class="navbar">
      <a href="{{route('apprenant.gerer.courses')}}"><i class="fas fa-home"></i><span>home</span></a>
      <a href="about.html"><i class="fas fa-question"></i><span>about</span></a>
      <a href="courses.html"><i class="fas fa-graduation-cap"></i><span>courses</span></a>
      <a href="teachers.html"><i class="fas fa-chalkboard-user"></i><span>teachers</span></a>
      <a href="contact.html"><i class="fas fa-headset"></i><span>contact us</span></a>
   </nav>

</div>

<section class="courses">

   <h1 class="heading">our courses</h1>

   <div class="box-container">
    @foreach($courses as $c)
      <div class="box">
         <div class="tutor">
            <img src="{{ asset('uploads/prof/'. $c->prof->img)}}" alt="">
            <div class="info">
               <h3>{{$c->prof->name}}</h3>
               <span>{{$c->duree}} heure</span>
            </div>
         </div>
         <div class="thumb">
            <img src="{{ asset('uploads/courses/'. $c->img)}}" alt="">
            <span> {{count ($videos)}} videos</span>
         </div>
         <h3 class="title">{{$c->name}}</h3>
         <a href="{{ route('apprenant.gerer.leson',$c->course_id) }}" class="inline-btn">view playlist</a>
      </div>
@endforeach


   </div>

</section>















<!-- custom js file link  -->
<script src="{{asset ('home/js')}}/sscript.js"></script>


</body>
</html>
@endsection
