@extends('admin.apprenant.inc.header')

@section('content')
<style>
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


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Edit /Course / {{strtolower($tests->desc)}}</div>
                    </h3>
                </div>
                <div class="card-body">
                            <form method="POST" action="{{ route('admin.test.update', $tests->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Teste Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="desc" value="{{$tests->desc}}" required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>




                        <div class="mb-3">
                            <label for="course_id" class="form-label">Course</label>
                            <select class="form-control @error('course_id') is-invalid @enderror" id="course_id"  name="course_id" required>
                                <option value="{{$tests->course_id}}"></option>
                                @foreach($courses as $prof)
                                 <option value="{{ $prof->id }}" {{ old('prof_id') == $prof->id ? 'selected' : '' }}>{{ $prof->name }}</option>
                                @endforeach
                            </select>
                            @error('prof_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="catego_id" class="form-label">Categories</label>
                            <select class="form-control @error('catego_id') is-invalid @enderror" id="ctego_id" name="catego_id"  required>
                                <option value="{{$tests->catego_id}}"></option>
                                @foreach($categos as $catego)
                                    <option value="{{ $catego->id }}" {{ old('catego_id') == $catego->id ? 'selected' : '' }}>{{ $catego->name }}</option>
                                @endforeach
                            </select>
                            @error('catego_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>




                        <div class="mb-3">
                            <label for="datefin" class="form-label">End Date</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{$tests->date}}" required>
                            @error('datefin')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <img id="preview" src="{{ asset('uploads/test/'. $tests->img)}}" alt="Admin" class="rounded-circle border border-dark" style="width: 150px; height: 150px;">
                            <div class="form-file">
                                <input id="image" type="file"  name="img" class="form-control @error('img') is-invalid @enderror" >
                            </div>
                            @error('img')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
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

                    </div>
                        <input type="hidden" name="hidden_id" value="{{$tests->id}}">

                        <button type="submit" class="btn btn-primary">Edit Course</button>
                        <a href="{{ route('admin.test.cancel') }}" class="btn btn-secondary">Cancel</a>

                    </form>
                </div>
            </div>
        </div

@endsection


