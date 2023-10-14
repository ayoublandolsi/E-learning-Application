@extends('apprenant.inc.header')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<title>Ma page de cours</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIeXaL+0CKvQVZ+828mI918Bp6/W+9WOoh2M6t7jKxi" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-Cn8YGwJFZzVHhcTYKjWl/kXtvvWh5y2Y5hKc5g0f6KjnwmbNGQIbGdE6ilwoVXUcO6E+V7L0z6q3KjwFpTEN1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-Cn8YGwJFZzVHhcTYKjWl/kXtvvWh5y2Y5hKc5g0f6KjnwmbNGQIbGdE6ilwoVXUcO6E+V7L0z6q3KjwFpTEN1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style type="text/css">

    body{
        background-color: #d7d3d3;
    }
    .btn-primary {
  background-color: #007bff;
  border-color: #007bff;
}

.btn-danger {
  background-color: #dc3545;
  border-color: #dc3545;
}

.video-controls {
  display: flex;
  align-items: right;
}

.delete-video {
  margin-right: 10px;
}

.edit-video {
  margin-right: 10px;
}

		.video-thumbnail {
			max-width: 250px;
			max-height: 150px;
			margin-bottom: 10px;
		}

		.video-info {
			display: flex;
			align-items: center;
			margin-bottom: 20px;
		}

		.user-image {
			width: 50px;
			height: 50px;
			border-radius: 50%;
			margin-right: 10px;
		}

		.video-title {
			font-size: 24px;
			margin-bottom: 5px;
		}

		.user-name {
			font-size: 18px;
			font-weight: bold;
			margin-bottom: 0;
			cursor: pointer;
		}

		.user-name:hover {
			color: #007bff;
		}
        /* Style pour la vidéo */
.video {
  position: relative;
  padding-bottom: 56.25%; /* 16:9 */
  height: 0;
}

.video iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

/* Style pour la miniature de la vidéo */
.video-thumbnail {
  display: block;
  position: relative;
}

.video-thumbnail img {
  display: block;
  width: 100%;
  height: auto;
}

/* Style pour l'information de l'utilisateur */
.video-info {
  display: flex;
  align-items: center;
  margin-bottom: 10px;
}

.user-image {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  margin-right: 10px;
}

.user-name {
  font-size: 16px;
  font-weight: bold;
  color: #333;
  text-decoration: none;
  margin-bottom: 5px;
  display: inline-block;
}

.video-date {
  font-size: 14px;
  color: #888;
  margin: 0;
}

/* Style pour les titres de vidéos */
.video-title {
  font-size: 18px;
  font-weight: bold;
  color: #333;
  margin: 0;
  margin-top: 10px;
}

/* Style pour les boxes de vidéos */
.col-md-4 {
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
  transition: box-shadow 0.3s ease;
  margin-bottom: 30px;
}

.col-md-4:hover {
  box-shadow: 0 8px 16px rgba(0,0,0,0.2);
}
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
  border: 1px solid #e1e1e1;
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
    <div class="search-container"style="margin-top : -2%  ;margin-bottom: -2%" >

        <form style="margin-top: 50px;" class="form-inline" action="{{ route('admin.video.index') }}" method="GET">
            <input class="form-control mr-sm-2  " style="margin-left: 7% !important;margin-right: 7% !important;  display: inline-block !important;
            " type="text" placeholder="Search" aria-label="Search" style="m" name="search">
<button class="btn btn-success my-2" style="margin-left: 80% !important;margin-top: -3% !important;   color: black;background-color:rgb(236, 230, 230);" type="submit">Search</button>
</form>

    </div>
    <Div class="container mt-5" style="margin-top : -80%  ;margin-bottom: 2%" >
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                <div class="card-footer">
                <a href="{{ route('admin.video.create') }}" class="btn btn-primary" style="float: right;">Add Video</a>
                <div class="card-header">List video</div>
</div>
</div>
</div>
            </div>
        </div>

	<div class="container" style="background-color: #fff">
        <div class="row">
            @if (count($videos)>0)


        @foreach ($videos as $videos )


          <div class="col-md-4">
            <div class="video-box shadow">
              <div class="video-info">
                <img src="{{ asset('uploads/prof/'. $videos->prof_img)}}" alt="User image" class="user-image">
                <div>
                  <a href="{{route('admin.prof.index')}}" class="user-name">{{$videos->prof_name}}</a>
                  <p class="video-date">create :{{$videos->create_at}}</p>
                </div>
                <div class="video-controls float-right" style="margin-LEFT: 100px" >
                 <a href="{{ route('admin.video.edit',$videos->id) }}">   <button class="btn btn-primary btn-sm edit-video"style="float: right;"><i class="fas fa-edit"></i> </button></a>
                    <form action="{{ route('admin.video.delete', $videos->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <button class="btn btn-danger btn-sm delete-video" style="float: right;"  onclick="deleteConfirm(event);"><i class="fa fa-trash"></i></button>
                    </form>

                    <script>
                        window.deleteConfirm = function (e) {
                            e.preventDefault();
                            var form = e.target.parentNode;

                            Swal.fire({
                                title: "Are you sure?",
                                text: "Once deleted, you will not be able to recover the course " + "{{ $videos->name }}" + "!",
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


              <div class="video">
                <div class="video">
                    <a href="{{ route('admin.video.show', $videos->id) }}">
                      <iframe width="600" height="600px" src="{{ asset('uploads/video/'. $videos->desc)}}" autoplay="0" allow="accelerometer; encrypted-media; muted; gyroscope; picture-in-picture"></iframe>
                    </a>
                  </div>
              </div>


              <h3 class="video-title">Course :{{$videos->course_name}}</h3>

              <h3 class="video-title">Title :{{$videos->name}}</h3>
            </div>
          </div>
          @endforeach
          @else
          <P>The Lesson not found</P>
          @endif
          <a href="{{route('admin.course.index')}}" class="btn btn-secondary">back</a>



                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    <script>https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js</script>
                    <script src="sweetalert2.all.min.js"></script>

                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script src="{{ asset('js/app.js') }}"></script>








@endsection
