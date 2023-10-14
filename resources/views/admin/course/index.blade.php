@extends('admin.apprenant.inc.header')

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


</style>
</head>
<body>

    <div class="search-container">

    <div class="search-container">

        <form style="margin-top: 50px;" class="form-inline" action="{{ route('admin.course.index') }}" method="GET">
            <input class="form-control mr-sm-2  " style="margin-left: 7% !important;margin-right: 7% !important;  display: inline-block !important;
            " type="text" placeholder="Search" aria-label="Search" style="m" name="search">
<button class="btn btn-success my-2" style="margin-left: 80% !important;margin-top: -3% !important;   color: black;background-color:rgb(236, 230, 230);" type="submit">Search</button>
</form>




<Div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                <div class="card-footer">
                <a href="{{ route('admin.course.create') }}" class="btn btn-success" style="float: right;">Add Course</a>
                <div class="card-header">courses List</div>

            </div>
 <!-- Courses Start -->
 <div class="container-xxl py-5">
    <div class="container">

        <div class="row g-4 justify-content-center">
            @if (count($courses)>0)
            @foreach($courses as $c)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" style="height: 300px; width: 400px;" src="{{asset ('uploads/courses')}}/{{$c->img}}" alt="">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="{{ route('admin.course.show',$c->id) }}" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                            <form action="{{ route('admin.course.delete', $c->id) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <a href="" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;" onclick="deleteConfirm(event);">Delete </a>
                                </form>
                                <script>
                                    window.deleteConfirm = function (e) {
                                        e.preventDefault();
                                        var form = e.target.parentNode;

                                        Swal.fire({
                                            title: "Are you sure?",
                                            text: "Once deleted, you will not be able to recover the course " + "{{ $c->name }}" + "!",
                                            icon: "warning",
                                            showCancelButton: true,
                                            confirmButtonText: "Delete",
                                            cancelButtonText: "Cancel",
                                            dangerMode: true,
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                Swal.fire({
                                                    title: "Poof! Your imaginary file has been deleted!",
                                                    icon: "success",
                                                }).then(() => {
                                                    form.submit();
                                                });
                                            } else {
                                                Swal.fire("Your deleted cancel!");
                                            }
                                        });
                                    };
                                </script>

                            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                        </div>
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
                        <h5 class="mb-4">{{$c->name}}</h5>
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
</div>
<!-- Courses End -->

   <script>https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js</script>
<script src="sweetalert2.all.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @else
    <tr> <STrong> <p>course not found</p></tr></STrong> </TR>
      @endif
</body>
</html>
@endsection
