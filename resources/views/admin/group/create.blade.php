@extends('admin.apprenant.inc.header')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Add New Groupe</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.group.store') }}" >
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name of group</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="smalldesc" class="form-label">number of students</label>
                            <input type="number" class="form-control @error('number') is-invalid @enderror" id="name" name="number" value="{{ old('number') }}" required>
                            @error('number')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="datedeb" class="form-label">Start Date</label>
                            <input type="date" class="form-control @error('datedeb') is-invalid @enderror" id="datedeb" name="datedeb" value="{{ old('datedeb') }}" required>
                            @error('datedeb')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="datefin" class="form-label">End Date</label>
                            <input type="date" class="form-control @error('datefin') is-invalid @enderror" id="datefin" name="datefin" value="{{ old('datefin') }}" required>
                            @error('datefin')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="datetest" class="form-label">Test Date</label>
                            <input type="date" class="form-control @error('datetest') is-invalid @enderror" id="datetest" name="datetest" value="{{ old('datetest') }}" required>
                            @error('datetest')
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
                            <label for="catego_id" class="form-label">Courses</label>
                            <select class="form-control @error('course_id') is-invalid @enderror" id="course_id" name="course_id" required>
                                <option value="">Select a course</option>
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
                            <label for="catego_id" class="form-label">Apprenant</label>
                            <select class="form-control @error('apprenant_id') is-invalid @enderror" id="apprenant_id" name="apprenant_id" required>
                                <option value="">Select a apprenants</option>
                                @foreach($apprenants as $apprenant)
                                    <option value="{{ $apprenant->id }}" {{ old('apprenant_id') == $apprenant->id ? 'selected' : '' }}>{{ $apprenant->name }}</option>
                                @endforeach
                            </select>
                            @error('apprenant_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>





                        <button type="submit" class="btn btn-primary">Add Group</button>
                        <a href="{{ route('admin.group.cancel') }}" class="btn btn-secondary">Cancel</a>

                    </form>
                </div>
            </div>
        </div

@endsection

