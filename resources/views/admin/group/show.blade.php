@extends('admin.apprenant.inc.header')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>COURSES</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        h6 {
            font-weight: bold;
        }
        .view-btn {
            margin-left: 5px;
        }
        .course-item {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>{{$groupes->name}}</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Name of group:</strong> {{$groupes->name}}</p>
                        <p><strong>Start of course:</strong> {{$groupes->datedeb}}</p>
                        <p><strong>Test date:</strong> {{$groupes->datetest}}</p>
                        <p><strong>End of course:</strong> {{$groupes->datefin}}</p>
                        <p><strong>Categories:</strong> {{$categos}}</p>
                        <p><strong>Professors:</strong></p>
                        <ul>
                            @foreach ($profs as $prof)
                                <li class="course-item">{{$prof}} <a href="{{route('admin.prof.index')}}" class="btn btn-sm btn-info view-btn"style="float: right" ><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                            @endforeach
                        </ul>
                        <p><strong>Students:</strong></p>
                        <ul class="text-right">
                            @foreach ($apprenants as $apprenant)
                                <li class="course-item">
                                    {{$apprenant}} <a href="{{route('admin.apprenant.show',$appren)}}" class="btn btn-sm btn-info view-btn"style="float: right" style="text-align: left;" > <i class="fa fa-eye" aria-hidden="true"></i></a></li>
                            @endforeach
                        </ul>
                        <p><strong>Courses:</strong></p>
                        <ul>
                            @foreach ($courses as $course)
                            <li class="course-item">{{$course}} <a href="{{route('admin.course.show',$cours)}}" style="float: right" class="btn btn-sm btn-info view-btn"><i class="fa fa-eye" aria-hidden="true"></i></a>

                        @endforeach

                        </ul>
                        <p><strong>Number of students:</strong> {{count($apprenants)}}/{{$groupes->number}}</p>
                        <p><strong>Number of Professors:</strong> {{count($profs)}}</p>
                        <p><strong>Number of courses:</strong> {{count($courses)}}</p>

                    </div>
                    <div class="card-footer">
                        <a onclick="window.history.back()" class="btn btn-secondary">Back</a>
                        <a href="{{ route('admin.group.edit',$groupes->id) }}" class="btn btn-primary">Edit Group</a>
                        <a href="{{ route('admin.group.addstud',$groupes->id) }}" class="btn btn-success">Add Apprenant</a>
                        <a href="{{ route('admin.group.addprof',$groupes->id) }}" class="btn btn-success">Add Professor</a>
                        <a href="{{ route('admin.group.addcourse',$groupes->id) }}" class="btn btn-success">Add course</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js</script>
        <script src="sweetalert2.all.min.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="{{ asset('js/app.js') }}"></script>
        </body>

</body>
</html>
@endsection
