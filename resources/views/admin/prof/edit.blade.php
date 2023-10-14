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
                <div class="card-header">Edit /Tuteur / {{strtolower($apprenants->name)}}</div>

                <div class="card-body">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.prof.update',$apprenants->id) }}" enctype="multipart/form-data">
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
                       <label for="phonenumber" class="col-md-4 col-form-label text-md-end">phonenumber</label>
                      <div class="col-md-6">
                      <input  type="number" class="form-control @error('phonenumber') is-invalid @enderror" name="phone" value="{{$apprenants->phone}}"  required autocomplete="phonenumber">

        @error('phonenumber')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

                        </div>
                        <div class="row mb-3">
                            <label for="spec" class="col-md-4 col-form-label text-md-end">Specialite</label>
                            <div class="col-md-6">
                            <select class="form-control @error('spec') is-invalid @enderror" id="spec" name="spec" required>
                            <option value="{{$apprenants->spec}}">{{$apprenants->spec}}</option>
                            @foreach($categos as $catego)
                                <option value="{{ $catego->name }}" {{ old('spec') == $catego->id ? 'selected' : '' }}>{{ $catego->name }}</option>
                            @endforeach
                        </select>
                        @error('prof_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>



                        </div>





                          <div class="form-image">
                            <img src="{{ asset('uploads/prof/'.$apprenants->img)}}" alt="Image">
                          </div>



                          <div class="row mb-3" style="margin-top: 40px !important;margin-left: -5px !important">
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
                            <button type="submit" class="btn btn-primary">
                            Edit
                            </button>
                            <a href="{{ route('admin.prof.cancel') }}" class="btn btn-secondary">Cancel</a>

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


