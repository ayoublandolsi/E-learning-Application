@extends('admin.apprenant.inc.header')

@section('content')
<head>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-DU+3TVU3D6LQSM6UJx6ALo6PfdwTGf8mL1Bk6p3Uq3+cU6D2Q6AiwU6x2heLCgNYwVrBUHstWk19++N9u9Xbkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <style>
            .card {
                margin-bottom: 300px;
                border: 1px solid #ddd;
                border-radius: 4px;
                box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            }

            .card-img-top {
                border-top-right-radius: 4px;
                border-top-left-radius: 4px;
                height: 250px;
                object-fit: cover;
            }

            .card-body {
                padding: 20px;
            }

            .container {
                display: flex;
                flex-direction: column;
                height: 100vh;
            }

            nav {
                /* navigation bar styles here */
            }

            .search-container {
                display: flex;
                justify-content: flex-end;
                align-items: flex-end;
                padding: 10px;
                margin-top: auto;
                width: 100%;
                background-color: #f2f2f2;
            }

            .card-title {
                font-size: 24px;
                margin-bottom: 10px;
            }

            .card-text {
                font-size: 18px;
                margin-bottom: 5px;
            }

            .table {
                margin-top: 20px;
            }

            .table thead th {
                font-size: 18px;
                font-weight: bold;
            }

            .table td {
                font-size: 16px;
            }

            .btn-primary {
                background-color: #007bff;
                border-color: #007bff;
                color: #fff;
            }

            .btn-primary:hover {
                background-color: #0069d9;
                border-color: #0062cc;
                color: #fff;
            }
      .card {
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
    border-top-right-radius: 4px;
    border-top-left-radius: 4px;
    height: 250px;
    object-fit: cover;
    }

    .card-body {
    padding: 20px;
    }
    .container {
  display: flex;
  flex-direction: column;
  height: 100vh;
}

nav {
  /* navigation bar styles here */
}

.search-container {
  display: flex;
  justify-content: flex-end;
  align-items: flex-end;
  padding: 10px;
  margin-top: auto;
  width: 100%;
  background-color: #f2f2f2;
}


    .card-title {
    font-size: 24px;
    margin-bottom: 10px;
    }

    .card-text {
    font-size: 18px;
    margin-bottom: 5px;
    }

    .table {
    margin-top: 20px;
    }

    .table thead th {
    font-size: 18px;
    font-weight: bold;
    }

    .table td {
    font-size: 16px;
    }

    .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    color: #fff;
    }

    .btn-primary:hover {
    background-color: #0069d9;
    border-color: #0062cc;
    color: #fff;
    }</style></head>

<div class="container" >
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('uploads/apprenant/'. $apprenant->img)}}"  class="card-img-top" alt="Student Image">
                <div class="card-body">
                    <h5 class="card-title">Name: {{$apprenant->name}}</h5>


                    <p class="card-text">email: {{$apprenant->email}}</p>
                    <p class="card-text">phone: {{$apprenant->phonenumber}}</p>
                    <p class="card-text">gender :{{$apprenant->gendre}}</p>
                    <p class="card-text">password:**********</p>
                    @if ($apprenant->state == 'desactive')
                    <a onclick="activateApprenant(event);">
                        <span class="badge bg-danger">{{ $apprenant->state }}</span>
                    </a>
                @else
                    <a onclick="deactivateApprenant(event);">
                        <span class="badge bg-success">{{ $apprenant->state }}</span>
                    </a>

                @endif

                </div>
            </div>
            <button onclick="window.history.back()" class="btn btn-secondary">Back</button>

        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Course Details</h5>
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th style="font-size: 10px">Category</th>
                                <th>Groupe</th>
                                <th>Course</th>
                                <th>Trainer</th>
                                <th>Status</th>
                                <th>Certificate</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>webbb</td>
                                <td>Mathematics</td>
                                <td>salih</td>
                                <td>group A</td>
                                <td>Ongoing</td>
                                <td><a href="/path/to/student/certificate" class="btn btn-primary btn-sm">
                                    <i class="bi bi-file-earmark-certificate"></i> Certificate
                                  </a></td>
                                                              </tr>
                            <tr>
                                <td>webbb</td>
                                <td>Physics</td>
                                <td>saleh</td>
                                <td>groupe 2</td>
                                <td>Incomplete</td>
                                <td>N/A</td>
                            </tr>
                            <tr>
                                <td>webbb</td>
                                <td>Mathematics</td>
                                <td>salih</td>
                                <td>group A</td>
                                <td>Ongoing</td>
                                <td><a href="/path/to/student/certificate" class="btn btn-primary btn-sm">
                                    <i class="bi bi-file-earmark-certificate"></i> Certificate
                                  </a></td>
                                                              </tr>
                                                              <tr>
                                                                <td>webbb</td>
                                                                <td>Mathematics</td>
                                                                <td>salih</td>
                                                                <td>group A</td>
                                                                <td>Ongoing</td>
                                                                <td><a href="/path/to/student/certificate" class="btn btn-primary btn-sm">
                                                                    <i class="bi bi-file-earmark-certificate"></i> Certificate
                                                                  </a></td>
                                                                                              </tr>

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>



<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection

