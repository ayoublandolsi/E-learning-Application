@extends('admin.apprenant.inc.header')

@section('content')
<HEad>
    <STYle>
        .form-image {
  display: flex;
  justify-content: center;
  margin-bottom: 1rem;
}

.form-image img {
  width: 200px;
  height: 200px;
  object-fit: cover;
  border-radius: 10px;
}

    </STYle>
</HEad>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit /Student / {{strtolower($apprenants->name)}}</div>

                <div class="card-body">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.geadmin.update', $apprenants->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  required value="{{$apprenants->name}}"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">EmailAddress</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$apprenants->email}}"  required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                       <label for="phonenumber" class="col-md-4 col-form-label text-md-end">phonenumber</label>
                      <div class="col-md-6">
                      <input  type="tel" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" value="{{$apprenants->phonenumber}}"  required autocomplete="phonenumber">

        @error('phonenumber')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

                        <div class="row mb-3">
                            <label for="gendre" class="col-md-4 col-form-label text-md-end">Gender</label>
                            <div class="col-md-6">
                                <select id="gendre" class="form-select @error('gendre') is-invalid @enderror" name="gendre" value="{{$apprenants->gendre}}" required>
                                    <option  value="{{$apprenants->gendre}}">{{$apprenants->gendre}}</option>
                                    <option value="male" >Male</option>
                                    <option value="female" >Female</option>
                                </select>

                                @error('gendre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                          <div class="form-image">
                            <img src="{{ asset('uploads/apprenant/'. $apprenants->img)}}" alt="Image">
                          </div>



                          <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">Image</label>

                            <div class="col-md-6">
                                <input id="img" type="file" class="form-control @error('img') is-invalid @enderror" name="img" value="{{$apprenants->img}}" >

                                @error('img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                 <div class="row mb-0">
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <input type="hidden" name="hidden_id" value="{{$apprenants->id}}">
                            <input type="hidden" name="state" value="{{$apprenants->state}}">
                            <input type="hidden" name="role" value="{{$apprenants->role}}">


                            <button type="submit" class="btn btn-primary">
                            Edit
                            </button>
                            <a href="{{ route('admin.apprenant.cancel') }}" class="btn btn-secondary">Cancel</a>

                        </div>
                    </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


