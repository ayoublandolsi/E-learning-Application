@extends('admin.apprenant.inc.header')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <STYle>

    h6 {
  font-weight: bold;
}
    </STYle>
    <meta charset="UTF-8">
    <title>COURSES</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-Cn8YGwJFZzVHhcTYKjWl/kXtvvWh5y2Y5hKc5g0f6KjnwmbNGQIbGdE6ilwoVXUcO6E+V7L0z6q3KjwFpTEN1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-12"> <!-- increased the column size -->
            <div class="card">
                <div class="card-header">
                    <h3>{{$courses->name}}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6"> <!-- decreased the column size -->
                            <img class="img-fluid mb-4" style="width: 600PX;height: 550px" src="{{asset ('uploads/courses')}}/{{$courses->img}}" alt="{{$courses->name}}">
                        </div>
                        <div class="col-lg-6"> <!-- increased the column size -->
                            <h5 style="font-weight: bold;">Description : </h5>
                            <p>{{$courses->desc}}</p>
                            <hr>
                            <h5 style="font-weight: bold;display:inline;">Small Description : </h5>
                            <p style="display:inline;">{{$courses->smalldesc}}</p>
                            <hr>
                            <h6 style="display:inline;font-weight: bold;">Professeur :</h6>
                            <p style="display:inline;">{{$courses->prof->name}}</p>
                            <hr>
                            <h6 style="display:inline;font-weight: bold;">Nombre :</h6>
                            <p style="display:inline;">30 Student</p>
                            <hr>
                            <h6 style="display:inline;font-weight: bold;">Durée :</h6>
                            <p style="display:inline;">{{$courses->duree}} heures</p>
                            <hr>
                            <h6 style="display:inline;font-weight: bold;">Prix :</h6>
                            <p style="display:inline;">{{$courses->price}}$</p>

                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a onclick="window.history.back()" class="btn btn-secondary">back</a>

                    <a href="{{ route('admin.course.edit',$courses->id) }}" class="btn btn-primary">Modifier le cours</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
