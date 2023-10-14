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
                    <h3>Edit /Course / {{strtolower($course->name)}}</div>
                    </h3>
                </div>
                <div class="card-body">
                            <form method="POST" action="{{ route('admin.video.update',$course->id) }}"   enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Course Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$course->name}}" required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="duree" class="form-label">Description</label>
                            <textarea class="form-control @error('duree') is-invalid @enderror" id="duree" name="duree" value="{{$course->duree}}" rows="3" >{{$course->duree}}</textarea>
                            @error('duree')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>




                        <div class="mb-3">
                            <label for="prof_id" class="form-label">Professor</label>
                            <select class="form-control @error('prof_id') is-invalid @enderror" id="prof_id"  name="prof_id" required>
                                <option value="{{$course->prof_id}}"></option>
                                @foreach($profs as $prof)
                                 <option value="{{ $prof->id }}" {{ old('prof_id') == $prof->id ? 'selected' : '' }}>{{ $prof->name }}</option>
                                @endforeach
                            </select>
                            @error('prof_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="catego_id" class="form-label">Courses</label>
                            <select class="form-control @error('course_id') is-invalid @enderror" id="course_id" name="course_id"  required>
                                <option value="{{$course->course_id}}"></option>
                                @foreach($courses as $catego)
                                    <option value="{{ $catego->id }}" {{ old('catego_id') == $catego->id ? 'selected' : '' }}>{{ $catego->name }}</option>
                                @endforeach
                            </select>
                            @error('catego_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>





                        <iframe width="300px" id="preview" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen controls src="{{ asset('uploads/video/'.$course->desc)}}" alt="Video"></iframe>
                        </div>
                        <div class="row mb-3">
                            <label for="desc" class="col-md-4 col-form-label text-md-end">Video</label>
                            <div class="col-md-6">
                                <div class="form-file">
                                    <input id="desc" type="file" class="form-control @error('desc') is-invalid @enderror" name="desc">
                                </div>

                                <input id="desc" type="hidden" name="desc" value="{{$course->desc}}">
                                @error('desc')
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
    const imgValue = document.querySelector('#desc');

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


                        <input type="hidden" name="hidden_id" value="{{$course->id}}">

                        <button type="submit" class="btn btn-primary">Edit </button>
                        <a onclick="window.history.back()" class="btn btn-secondary">back</a>

                    </form>
                </div>
            </div>
        </div

@endsection


