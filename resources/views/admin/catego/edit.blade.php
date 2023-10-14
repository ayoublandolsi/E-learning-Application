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
                <div class="card-header">Edit /Specialite / {{strtolower($categos->name)}}</div>

                <div class="card-body">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.catego.update', $categos->id) }}">
                            @csrf
                            @method('PUT')
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  required value="{{$categos->name}}"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                 <div class="row mb-0">
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <input type="hidden" name="hidden_id" value="{{$categos->id}}">
                            <button type="submit" class="btn btn-primary">
                            Edit
                            </button>
                            <a href="{{ route('admin.catego.cancel') }}" class="btn btn-secondary">Cancel</a>

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


