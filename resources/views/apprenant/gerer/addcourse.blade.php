@extends('apprenant.inc.header')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student CRUD</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-Cn8YGwJFZzVHhcTYKjWl/kXtvvWh5y2Y5hKc5g0f6KjnwmbNGQIbGdE6ilwoVXUcO6E+V7L0z6q3KjwFpTEN1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
    #message {
        /* Style pour la boîte de confirmation de suppression */
        .search-container {
display: flex;
justify-content: flex-end;
position: absolute;
bottom: 0;
width: 100%;
}
.confirmation-box {
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
  max-width: 400px;
  margin: 0 auto;
  text-align: center;
}

/* Style pour le texte de confirmation */
.confirmation-text {
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 10px;
}

/* Style pour les boutons */
.confirmation-button {
  display: inline-block;
  padding: 5px 10px;
  font-size: 16px;
  font-weight: bold;
  border: 1px solid #ccc;
  border-radius: 3px;
  text-decoration: none;
  color: #333;
  margin-right: 10px;
}

.confirmation-button:hover {
  background-color: #eee;


  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 9999;
  background-color: #ffffff;
  border: 2px solid #000000;
  padding: 20px;
  text-align: center;
}

#message h2 {
  font-size: 24px;
  margin: 0 0 20px;
} }
.form-inline {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: center;
}

.form-inline input[type="search"] {
  font-size: 16px;
  padding: 8px 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.form-inline button[type="submit"] {
  font-size: 16px;
  padding: 8px 12px;
  margin-left: 10px;
  background-color: #28a745;
  border: none;
  border-radius: 4px;
  color: #fff;
}

.form-inline button[type="submit"]:hover {
  background-color: #218838;
  cursor: pointer;
}
.search-form {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
}

.search-form input[type="text"] {
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.search-form input[type="submit"] {
  padding: 10px 20px;
  font-size: 16px;
  background-color: #008CBA;
  color: rgb(236, 230, 230);
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
.course-item {
  border-radius: 10px;
  box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
}

.course-item:hover {
  box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.3);
}

.course-item img {
  border-radius: 10px 10px 0 0;
}

.course-item .btn-primary {
  background-color: #0d6efd;
  border-color: #0d6efd;
}

.course-item .btn-primary:hover {
  background-color: #0b5ed7;
  border-color: #0b5ed7;
}

.course-item .btn-primary:focus {
  box-shadow: none;
}
body {
background-image: url('{{asset ('home/img')}}/salih.jpg');
}
.course-item .fa-star {
  color: #ffc107;
}

.course-item .fa-user-tie,
.course-item .fa-clock,
.course-item .fa-user {
  color: #6c757d;
}


</style>
</head>
<body>



    <div class="search-container">

        <form style="margin-top:px;" class="form-inline" action="{{ route('apprenant.gerer.addcourse') }}" method="GET">
            <input class="form-control mr-sm-2  " style="margin-left: 20% !important;margin-right: 20% !important;  display: inline-block !important;
            " type="text" placeholder="Search" aria-label="Search" style="m" name="search">
</form>

            <div class="container-xxl py-5">
                <div class="container">

                    <div class="row g-4 justify-content-center">
                        @if (count($courses)>0)
                        @foreach($courses as $c)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="course-item shadow-lg p-4 bg-white rounded">
                                <div class="position-relative overflow-hidden">
                                    <img class="img-fluid" style="height: 300px; width: 400px;" src="{{asset ('uploads/courses')}}/{{$c->img}}" alt="">
                                    <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                        <a href="{{ route('apprenant.gerer.show',$c->id) }}" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>

                                        @if (DB::table('apprenant_course')->where('apprenant_id', auth()->user()->id)->where('course_id', $c->id)->exists())
                                        <button class="flex-shrink-0 btn btn-sm btn-success px-3" style="border-radius: 30px;">
                                            <i class="fas fa-check"></i> Joined
                                        </button>
                                    @else
                                        <a href="{{ route('apprenant.gerer.show',$c->id) }}" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px;">
                                            <i class="fas fa-plus"></i> Add
                                        </a>
                                    @endif                                    </div>
                                </div>
                                <div class="text-center p-4 pb-0">
                                    <h3 class="mb-0">$ {{$c->price}}</h3>
                                    <div class="mb-3">
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small></small>
                                    </div>
                                    <h6 class="mb-4">{{$c->name}}</h6>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>{{$c->prof->name}}</small>
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>{{$c->duree}} Hrs</small>
                                    <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30 Students</small>
                                </div>
                            </div>
                        </div>
                     @endforeach
                </div>
            </div>


   <script>https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js</script>
<script src="sweetalert2.all.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @else
    <tr> <STrong> <p>course not found</p></tr></STrong> </TR>
      @endif
      <a onclick="window.history.back()"  class="btn btn-secondary">back</a>

</body>
</html>
@endsection
