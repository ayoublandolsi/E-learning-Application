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
                    <h3>Edit /Course / {{strtolower($certifi->name)}}</div>
                    </h3>
                </div>
                <div class="card-body">
                            <form method="POST" action="{{ route('admin.certificat.update', $certifi->id) }}">
                                @csrf
                                @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Certificat Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$certifi->name}}" required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="smalldesc" class="form-label">small description</label>
                            <input type="text" class="form-control @error('smalldesc') is-invalid @enderror" id="desc" name="desc" value="{{ $certifi->desc}}" required>
                            @error('smalldesc')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="catego_id" class="form-label">Categories</label>
                            <select class="form-control @error('prof_id') is-invalid @enderror" id="ctego_id" name="catego_id" required>
                                <option value="{{ $certifi->catego_id }}">Select a categories</option>
                                @foreach($categos as $catego)
                                    <option value="{{ $catego->id }}" {{ old('catego_id') == $catego->id ? 'selected' : '' }}>{{ $catego->name }}</option>
                                @endforeach
                            </select>
                            @error('prof_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="catego_id" class="form-label">Courses</label>
                            <select class="form-control @error('course_id') is-invalid @enderror" id="course_id" name="course_id" required>
                                <option value="{{ $certifi->course_id }}">Select a course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                                @endforeach
                            </select>
                            @error('course_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="prof_id" class="form-label">Professor</label>
                            <select class="form-control @error('prof_id') is-invalid @enderror" id="prof_id" name="prof_id" required>
                                <option value="{{ $certifi->prof_id }}">select prof</option>
                                @foreach($profs as $prof)
                                    <option value="{{ $prof->id }}" {{ old('prof_id') == $prof->id ? 'selected' : '' }}>{{ $prof->name }}</option>
                                @endforeach
                            </select>
                            @error('prof_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <input type="hidden" name="hidden_id" value="{{$certifi->id}}">

                        <button type="submit" class="btn btn-primary">Edit Certificat</button>
                        <a href="{{ route('admin.certificat.cancel') }}" class="btn btn-secondary">Cancel</a>

                    </form>
                </div>
            </div>
        </div

@endsection


