@extends('apprenant.inc.header')

@section('content')
<head>
    <title>3ada elassad la7assad</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-Cn8YGwJFZzVHhcTYKjWl/kXtvvWh5y2Y5hKc5g0f6KjnwmbNGQIbGdE6ilwoVXUcO6E+V7L0z6q3KjwFpTEN1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="{{asset ('home/css')}}/tailwind.output.css" />
  <script
    src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
    defer
  ></script>
  <script src="{{asset ('home/js')}}/init-alpine.js"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
  />
</head>


@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<div class="container">
    <div class="main-body">


          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">Apprenant</a></li>
              <li class="breadcrumb-item active" aria-current="page">Apprenant Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{ asset('uploads/apprenant/'. $userImage)}}" alt="Admin" class="rounded-circle border border-dark" style="width: 150px; height: 150px;">
                    <div class="mt-3">
                      <h4>{{$apprenants->name}}</h4>
                      <p class="text-secondary mb-1">Apprenant</p>
                      @if ($apprenants->state == 'active')
                      <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                        {{$apprenants->state}}
                      </span>
                       @else
                      <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                    {{$apprenants->state}}
                    </span>
                    @endif
                    @if ($apprenants->state == 'active')

                   <a href="{{route('apprenant.gerer.addcourse')}}"> <button class="btn btn-outline-primary" style="margin-top: 6%">Add course</button></a>

                    <button class="btn btn-outline-primary" style="margin-top: 10%">chat </button>


                    @endif
                    </div>

                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                @foreach ($apprenant_course as $course )
                @if ($apprenants->state == 'active')

                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg viewBox="0 0 24 24" width="24" height="24" xmlns="http://www.w3.org/2000/svg" width="24"height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line>
                        <path d="M10,2a1,1,0,0,0-.71.29L2.29,9.59A1,1,0,0,0,2.29,11l7.29,7.29a1,1,0,0,0,1.41-1.41L5.41,11l5.59-5.59A1,1,0,0,0,10,2Z"></path>
                    </svg>Course</h6>
                    <span class="text-secondary">
                        @if ($course->status == 'pending')
                        <span
                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-gray-700 dark:text-green-100"
                      >
                       {{$course->status}}
                      </span>
                      @elseif ($course->status == 'accepted')
                      @if ($course->courstatus == 'complete')
                      <a href="#" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Course completed</a>

                     @else
                      <a href="{{route('apprenant.gerer.courses')}}" class="btn btn-sm btn-outline-primary"><i class="fa fa-star"></i> Suivre</a>
@endif
                    </span>
                    @else
                    <span
                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700"
                  >
                  {{$course->status}}
                  </span>
                  </li>
                  @endif
                  @endif
                  @endforeach

                </ul>
              </div>

            </div>

            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3"style="padding-bottom: 2%;padding-top:2%">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary"style="padding-bottom: 2%;padding-top:2%">
                     {{$apprenants->name}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3"style="padding-bottom: 2%;padding-top:2%">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary"style="padding-bottom: 2%;padding-top:2%">
                        {{$apprenants->email}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3"style="padding-bottom: 2%;padding-top:2%">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary"style="padding-bottom: 2%;padding-top:2%">
                      +216 {{$apprenants->phonenumber}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3" style="padding-bottom: 2%;padding-top:2%">
                      <h6 class="mb-0">specialité</h6>
                    </div>
                    <div class="col-sm-9 text-secondary"style="padding-bottom: 2%;padding-top:2%">
                        {{$apprenants->spec}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3"style="padding-bottom: 2%;padding-top:2%">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary"style="padding-bottom: 2%;padding-top:2%">
                        {{$apprenants->gendre}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12"style="padding-bottom: 1%;padding-top:5%">
                      <a class="btn btn-info "  href="{{route('apprenant.gerer.edit',$apprenants->id)}}">Edit</a>
                    </div>
                  </div>
                </div>
              </div>
              @if ($apprenants->state == 'active')

              <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                @foreach ($apprenant_courses as $course)
             @if ($course->	courstatus == 'ongoing')



                <p>{{ strtolower($course->name) }} <span style="font-size:10px; COLOR:GREEN;"> << Groupe {{ $course->group_name }}>></span></p>
                <div class="progress mb-2" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                            @elseif ($course->	courstatus == 'complete')

                            <p>the course of {{strtolower($course->name)}} has complete successfully</p>    <div class="progress mb-2" style="height: 5px">
        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
                            @endif
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
            @if ($course->	courstatus == 'complete')
            <p> {{count ($apprenant_courses)}}
            </p>
            <p>certificat of module {{strtolower($apprenants->spec)}} has complete successfully</p>
            <div class="progress mb-2" style="height: 5px">
                <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

     @endif
            @else
            The account is inactive. You do not have access. Please wait for verification by the admin.</span>

            @endif
        </div>
    </div>
</div>
</div>


            </div>
          </div>

        </div>
    </div>
<style>body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
</style>
<!--
<div class="row">
    <div class="col-md-4">
      <div class="card shadow mb-3">
        <div class="card-header">
          <h3>Titre de la boîte</h3>
        </div>
        <div class="card-body">
          <img src="chemin/vers/image.jpg" alt="Description de l'image">
          <p>Description de la boîte¨LJNKDBGFVZU&ui&ajenkdf kjéa    ôfdhizskpdfjhidjé   akpdfbhjna^sl; kjlx,nvdj,sndjfh jn, vvnskdnf hdkjzkcdk vn znjniv cndhdcjxlxkzdhiansc kdhan  pqk cnkjnq,psc jvn</p>
          <button class="btn btn-primary transition">Plus</button>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow mb-3">
        <div class="card-header">
          <h3>Titre de la boîte</h3>
        </div>
        <div class="card-body">
          <img src="chemin/vers/image.jpg" alt="Description de l'image">
          <p>Description de la boîte</p>
          <button class="btn btn-primary transition">Plus</button>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow mb-3">
        <div class="card-header">
          <h3>Titre de la boîte</h3>
        </div>
        <div class="card-body">
          <img src="chemin/vers/image.jpg" alt="Description de l'image">
          <p>Description de la boîte</p>
          <button class="btn btn-primary transition">Plus</button>
        </div>
      </div>
    </div>
  </div>

    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Group List</div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Course Image</th>
                <th scope="col">Course Name</th>
                <th scope="col">Category</th>
                <th scope="col">Professor</th>
                <th scope="col">Test Name</th>
                <th scope="col">Test Progress</th>
                <th scope="col">Certificate Status</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                            <td><img src="{{ asset('uploads/apprenant/643c69d979841.jpg')}}"
                                alt="Course" class="img-thumbnail rounded" width="50"></td>
                            <td>Course 1</td>
                            <td>Category 1</td>
                            <td>Prof. John Doe</td>
                            <td>Test 1</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 25%;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                </div>
                            </td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td>
                                <button class="btn btn-primary btn-sm">go to course</button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="{{ asset('uploads/apprenant/643c69d979841.jpg')}}"
                                alt="Course" class="img-thumbnail rounded" width="50"></td>
                            <td>Course 2</td>
                            <td>Category 1</td>
                            <td>Prof. Jane Smith</td>
                            <td>Test 2</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 50%;"
                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                </div>
                            </td>
                            <td><span class="badge bg-warning text-dark">In progress</span></td>
                            <td>
                                <button class="btn btn-primary btn-sm">go to course</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3 nav-colored rounded">
                <img src="{{ asset('uploads/apprenant/643c69d979841.jpg')}}"
                alt="Student" class="rounded-circle img-thumbnail mb-3 profile-img">
                <h3>Student Name</h3>
                <p>Email: <a href="mailto:student@example.com">student@example.com</a></p>
                <p>Phone: <a href="tel:+1-123-456-7890">+1-123-456-7890</a></p>
                <button class="btn btn-primary">Add New Course</button>
                <button class="btn btn-secondary">Chat</button>
                <button class="btn btn-info">Edit Information</button>
            </div>
            <div class="col-md-9">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3>Group: Group Name</h3>
                    </div>
                    <div class="card-body">
                        <h4>Course Category:</h4>
                        <p>Category 1</p>
                        <p>Account Status: <span class="badge bg-success">Verified by Admin</span></p>
                    </div>
                </div>
                <h4>Courses Studied</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Course Image</th>
                            <th>Course Name</th>
                            <th>Category</th>
                            <th>Professor</th>
                            <th>Status</th>
                            <th>Test Name</th>
                            <th>Test Progress</th>
                            <th>Certificate Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="{{ asset('uploads/apprenant/643c69d979841.jpg')}}"
                                alt="Course" class="img-thumbnail rounded" width="50"></td>
                            <td>Course 1</td>
                            <td>Category 1</td>
                            <td>Prof. John Doe</td>
                            <td>In Progress</td>
                            <td>Test 1</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                                </div>
                            </td>
                            <td>Ongoing</td>
                            <td><a href="#" class="btn btn-primary">Go to Course</a></td>
                        </tr>
                         Add more rows for more courses -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<style>
    /* Style pour les boutons */
.btn {
  border-radius: 30px;
  font-weight: bold;
  letter-spacing: 1px;
  transition: all 0.3s ease-in-out;
  text-transform: uppercase;
  width: 100%;
}

/* Style pour le bouton au survol du curseur */
.btn:hover {
  transform: translateY(-2px);
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.3);
}

/* Style pour le bouton "Add New Course" */
.btn-info:nth-of-type(1) {
  background-color: #5cb85c;
  border-color: #5cb85c;
}

.btn-info:nth-of-type(1):hover {
  background-color: #4cae4c;
  border-color: #4cae4c;
}

/* Style pour le bouton "Edit Information" */
.btn-info:nth-of-type(2) {
  background-color: #5bc0de;
  border-color: #5bc0de;
}

.btn-info:nth-of-type(2):hover {
  background-color: #46b8da;
  border-color: #46b8da;
}

/* Style pour le bouton "chat with friends" */
.btn-info:nth-of-type(3) {
  background-color: #f0ad4e;
  border-color: #f0ad4e;
}

.btn-info:nth-of-type(3):hover {
  background-color: #eea236;
  border-color: #eea236;
}

.profile-img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
}

.nav-colored {
    background-color: #d4d9dd;
    padding: 20px;
    border-radius: 10px;
}

.card {
    border: none;
}

.btn {
    border-radius: 20px;
}

table {
    border-radius: 5px;
}

a {
    color: #1a73e8;
}

a:hover {
    text-decoration: none;
}
</style>
@endsection
