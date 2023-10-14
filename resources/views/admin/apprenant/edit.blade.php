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
                <div class="card-header">Edit /activate / {{strtolower($apprenants->name)}}</div>

                <div class="card-body">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.apprenant.update', $apprenants->id) }}" enctype="multipart/form-data">
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
                                    <option value="male" @if($apprenants->gendre == 'Male') selected @endif >Male</option>
                                    <option value="female" @if($apprenants->gendre == 'Female') selected @endif>Female</option>
                                </select>

                                @error('gendre')
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
                        <div class="row mb-3">
                            <label for="state" class="col-md-4 col-form-label text-md-end">State</label>
                            <div class="col-md-6">
                                <select id="state" class="form-select @error('state') is-invalid @enderror" name="state"  value="{{$apprenants->state}}"  required>
                                <option value="{{$apprenants->state}}">{{$apprenants->state}}</option>
                                    <option value="active" {{ old('state') == $apprenants->state ? 'selected' : '' }}>active</option>
                                    <option value="desactive" {{ old('state') == $apprenants->state ? 'selected' : '' }}>desactive</option>
                            </select>
                            @error('state')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>







   <div class="form-image">

    <img id="preview" src="{{ asset('uploads/apprenant/'. $apprenants->img)}}" alt="Image">
</div>
<div class="row mb-3">
    <label for="image" class="col-md-4 col-form-label text-md-end">Image</label>
    <div class="col-md-6">
        <div class="form-file">
            <input id="image" type="file" class="form-control @error('img') is-invalid @enderror" name="img">
        </div>

        <input id="img-value" type="hidden" name="img" value="{{$apprenants->img}}">
        @error('img')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<!-- JavaScript -->
<script>
    // Récupérer les éléments
    const input = document.querySelector('#image');
    const preview = document.querySelector('#preview');
    const imgValue = document.querySelector('#img');

    // Vérifier si une image a été sélectionnée
    input.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                imgValue.value = e.target.result;
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>


                 <div class="row mb-0">
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <input type="hidden" name="hidden_id" value="{{$apprenants->id}}">
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


