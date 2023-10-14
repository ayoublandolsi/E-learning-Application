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
    @if ($message)
    <div style="margin-top: -30px;" id="mail" class="alert alert-success">{{ $message }}</div>
@endif
    <div class="search-container">

        <form style="margin-top: 50px;" class="form-inline" action="{{ route('admin.apprenant.index') }}" method="GET">
            <input class="form-control mr-sm-2  " style="margin-left: 7% !important;margin-right: 7% !important;  display: inline-block !important;
            " type="text" placeholder="Search" aria-label="Search" style="m" name="search">
<button class="btn btn-success my-2" style="margin-left: 80% !important;margin-top: -3% !important;   color: black;background-color:rgb(236, 230, 230);" type="submit">Search</button>
</form>

    </div>



<Div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                <div class="card-footer">
                <div class="card-header">Students List</div>

            </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>

                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Adress Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">State</th>
                                    <th scope="col">Action<th scope="col"><th scope="col"></th></th></th>
                                </tr>
                            </thead>
                            @if (count($apprenant)>0)

                            @foreach($apprenant as $ap)
                            <tbody>
                                <tr>
                                    <th scop="row">{{$loop->iteration}}</th>
                                    <td><img class="border rounded-circle p-2 mx-auto mb-3" style="width: 70px; height:70px;" src="{{ asset('uploads/apprenant/'. $ap->img)}}" alt="Avatar" heigth="50"></td>
                                    <td>{{$ap->name }}</td>
                                    <td>{{$ap->gendre}}</td>
                                    <td>{{$ap->email }}</td>
                                    <td>{{$ap->phonenumber}} </td>
                                    <td> @if ($ap->state == 'desactive')
                                                        <a onclick="activateApprenant(event);">
                                                            <span class="badge bg-danger">{{ $ap->state }}</span>
                                                        </a>
                                                    @else
                                                        <a onclick="deactivateApprenant(event);">
                                                            <span class="badge bg-success">{{ $ap->state }}</span>
                                                        </a>

                                                    @endif
       
                                            </td>
                                             <td>
                                        <a href="{{route('admin.apprenant.show',$ap->id)}}" class="btn btn-primary" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                        <td> <a href="{{route('admin.apprenant.edit',$ap->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
                                        <td>
                                            <form action="{{ route('admin.apprenant.delete', $ap->id) }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <button class="btn btn-danger" onclick="deleteConfirm(event);"><i class="fa fa-trash"></i></button>
                                            </form>

                                            <script>
                                                window.deleteConfirm = function (e) {
                                                    e.preventDefault();
                                                    var form = e.target.parentNode;

                                                    Swal.fire({
                                                        title: "Are you sure?",
                                                        text: "Once deleted, you will not be able to recover the course " + "{{ $ap->name }}" + "!",
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




                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
  <div>
    @else
    <tr> <STrong> <p>apprenant not found</p></tr></STrong> </TR>
      @endif
   <script>
https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js</script>
<script src="sweetalert2.all.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
@endsection
