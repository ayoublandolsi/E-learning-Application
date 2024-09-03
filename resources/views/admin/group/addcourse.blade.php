@extends('admin.apprenant.inc.header')

@section('content')


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>ADD /course</div>
                    </h3>
                </div>
                <div class="card-body">
                            <form method="POST" action="{{ route('admin.group.addcourses', $groupes->id) }}" >
                                @csrf
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
                                <input type="hidden" id="action" name="action" value="addcourse">

<input type="hidden" name="hidden_id" value="{{$groupes->id}}">
<input type="hidden" id="name" name="name" value="{{$groupes->name}}">
<input type="hidden" id="number" name="number" value="{{$groupes->number}}">
<input type="hidden" id="apprenant_id" name="apprenant_id" value="{{$groupes->apprenant_id}}">
<input type="hidden" id="prof_id" name="prof_id" value="{{$groupes->prof_id}}">
<input type="hidden" id="catego_id" name="catego_id" value="{{$groupes->catego_id}}">
<input type="hidden" id="datedeb" name="datedeb" value="{{$groupes->datedeb}}">
<input type="hidden" id="datefin" name="datefin" value="{{$groupes->datefin}}">
<input type="hidden" id="datetest" name="datetest" value="{{$groupes->datetest}}">
<button type="submit" class="btn btn-primary">Add course</button>
<a href="{{route('admin.group.show',$groupes->id)}}" class="btn btn-secondary">Cancel</a>

     </form>
</div>
</div>
</div
@endsection
