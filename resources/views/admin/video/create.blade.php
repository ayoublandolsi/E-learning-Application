@extends('admin.apprenant.inc.header')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Add New Course</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.video.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Video Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="duree" class="form-label">Description</label>
                            <textarea class="form-control @error('duree') is-invalid @enderror" id="duree" name="duree" rows="3" required>{{ old('duree') }}</textarea>
                            @error('duree')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="prof_id" class="form-label">Professor</label>
                            <select class="form-control @error('prof_id') is-invalid @enderror" id="prof_id" name="prof_id" required>
                                <option value="">Select a professor</option>
                                @foreach($profs as $prof)
                                    <option value="{{ $prof->id }}" {{ old('prof_id') == $prof->id ? 'selected' : '' }}>{{ $prof->name }}</option>
                                @endforeach
                            </select>
                            @error('prof_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="course_id" class="form-label">Course</label>
                            <select class="form-control @error('course_id') is-invalid @enderror" id="course_id" name="course_id" required>
                                <option value="">Select a professor</option>
                                @foreach($courses as $courses)
                                    <option value="{{ $courses->id }}" {{ old('course_id') == $courses->id ? 'selected' : '' }}>{{ $courses->name }}</option>
                                @endforeach
                            </select>
                            @error('course_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="mb-3">
                            <label for="video" class="form-label">Lesson Video</label>
                            <input type="file" class="form-control @error('video') is-invalid @enderror" id="video" name="video" accept="video/*"  required>
                            @error('video')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add lesson</button>
                        <a href="{{ route('admin.video.cancel') }}" class="btn btn-secondary">Cancel</a>

                    </form>
                </div>
            </div>
        </div

@endsection

