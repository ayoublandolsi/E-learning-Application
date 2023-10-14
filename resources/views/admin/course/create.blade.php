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
                    <form method="POST" action="{{ route('admin.course.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Course Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="smalldesc" class="form-label">small description</label>
                            <input type="text" class="form-control @error('smalldesc') is-invalid @enderror" id="name" name="smalldesc" value="{{ old('smalldesc') }}" required>
                            @error('smalldesc')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="desc" class="form-label">Description</label>
                            <textarea class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc" rows="3" required>{{ old('desc') }}</textarea>
                            @error('desc')
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
                            <label for="catego_id" class="form-label">Categories</label>
                            <select class="form-control @error('prof_id') is-invalid @enderror" id="ctego_id" name="catego_id" required>
                                <option value="">Select a categories</option>
                                @foreach($categos as $catego)
                                    <option value="{{ $catego->id }}" {{ old('catego_id') == $catego->id ? 'selected' : '' }}>{{ $catego->name }}</option>
                                @endforeach
                            </select>
                            @error('prof_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="duree" class="form-label">Duration (in hours)</label>
                            <input type="number" class="form-control @error('duree') is-invalid @enderror" id="duree" name="duree" value="{{ old('duree') }}" required>
                            @error('duree')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" required>
                            @error('price')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="img" class="form-label">Course Image</label>
                            <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name="img" required>
                            @error('img')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add Course</button>
                        <a href="{{ route('admin.course.cancel') }}" class="btn btn-secondary">Cancel</a>

                    </form>
                </div>
            </div>
        </div

@endsection

