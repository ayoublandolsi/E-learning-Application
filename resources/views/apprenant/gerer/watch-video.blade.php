@extends('apprenant.inc.header')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>watch</title>

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
      <a href="about.html"><i class="fas fa-question"></i><span>about</span></a>
      <a href="courses.html"><i class="fas fa-graduation-cap"></i><span>courses</span></a>
      <a href="teachers.html"><i class="fas fa-chalkboard-user"></i><span>teachers</span></a>
      <a href="contact.html"><i class="fas fa-headset"></i><span>contact us</span></a>
   </nav>

</div>

<section class="watch-video">

   <div class="video-container">
      <div class="video">
         <video src="{{ asset('uploads/video/'. $video->desc)}}" controls poster="{{ asset('home/img/images')}}/post-1-1.png" id="video"></video>
      </div>
      <h3 class="title">{{$video->name}}(part 01)</h3>  <div class="more-btn">
      </div>
      <div class="info">
         <p class="date"><i class="fas fa-calendar"></i><span>{{$video->create_at}}</span></p>
         <p class="date"><i class="fas fa-heart"></i><span>44 likes</span></p>
      </div>

      <div class="tutor">
         <img src="{{ asset('uploads/prof/'.$prof->img)}}" alt="">
         <div>
            <h3>{{$prof->name}}</h3>
            <span>prof</span>
         </div>
      </div>
      <form action="" method="post" class="flex">
         <a href="" class="inline-btn">view playlist</a>
         <button><i class="far fa-heart"></i><span>like</span></button>
      </form>
      <p class="description">
        this lesson is about the developpement {{$course->desc}}
      </p>
   </div>

</section>

<section class="comments">



   <h1 class="heading">user comments</h1>

   <div class="box-container">

      <div class="box">
         <div class="user">
            <img src="{{ asset('home/img/images')}}/pic-1.jpg" alt="">
            <div>
               <h3>hamza mansour</h3>
               <span>22-10-2022</span>
            </div>
         </div>
         <div class="comment-box">this is a comment form shaikh anas</div>

      </div>

      <div class="box">
         <div class="user">
            <img src="{{ asset('home/img/images')}}/pic-2.jpg" alt="">
            <div>
               <h3>jasser maroini
               </h3>
               <span>22-10-2022</span>
            </div>
         </div>
         <div class="comment-box">awesome tutorial!
            keep going!</div>
      </div>

      <div class="box">
         <div class="user">
            <img src="{{ asset('home/img/images')}}/pic-3.jpg" alt="">
            <div>
               <h3>Ayoub landolsi</h3>
               <span>22-10-2022</span>
            </div>
         </div>
         <div class="comment-box">amazing way of teaching!
            thank you so much!
         </div>
      </div>

      <div class="box">
         <div class="user">
            <img src="{{ asset('home/img/images')}}/pic-4.jpg" alt="">
            <div>
               <h3>Amine chadly</h3>
               <span>22-10-2022</span>
            </div>
         </div>
         <div class="comment-box">loved it, thanks for the tutorial!</div>
      </div>

      <div class="box">
         <div class="user">
            <img src="{{ asset('home/img/images')}}/pic-5.jpg" alt="">
            <div>
               <h3>yassine bhk</h3>
               <span>22-10-2022</span>
            </div>
         </div>
         <div class="comment-box">this is what I have been looking for! thank you so much!</div>
      </div>

      <div class="box">
         <div class="user">
            <img src="{{ asset('home/img/images')}}/pic-2.jpg" alt="">
            <div>
               <h3>TSO</h3>
               <span>22-10-2022</span>
            </div>
         </div>
         <div class="comment-box">thanks for the tutorial!

            how to download source code file?
         </div>
      </div>

   </div>

</section>

















<!-- custom js file link  -->
<script src="{{asset ('home/js')}}/sscript.js"></script>

</body>
</html>
@endsection
