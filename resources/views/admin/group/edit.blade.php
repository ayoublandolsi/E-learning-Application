@extends('admin.apprenant.inc.header')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Edit/{{strtolower($groupes->name)}}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.group.update', $groupes->id) }}">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="name" value="{{$groupes->name}}">
                        <input type="hidden" id="apprenant_id" name="apprenant_id" value="{{$groupes->apprenant_id}}">
                        <input type="hidden" id="course_id" name="course_id" value="{{$groupes->course_id}}">
                        <input type="hidden" id="catego_id" name="catego_id" value="{{$groupes->catego_id}}">
                        <input type="hidden" id="prof_id" name="prof_id" value="{{$groupes->prof_id}}">


                        <div class="mb-3">
                            <label for="smalldesc" class="form-label">number of students</label>
                            <input type="number" class="form-control @error('number') is-invalid @enderror" id="name" name="number" value="{{ $groupes->number }}" required>
                            @error('number')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="datedeb" class="form-label">Start Date</label>
                            <input type="date" class="form-control @error('datedeb') is-invalid @enderror" id="datedeb" name="datedeb" value="{{ $groupes->datedeb }}" required>
                            @error('datedeb')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="datefin" class="form-label">End Date</label>
                            <input type="date" class="form-control @error('datefin') is-invalid @enderror" id="datefin" name="datefin" value="{{ $groupes->datefin }}" required>
                            @error('datefin')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="datetest" class="form-label">Test Date</label>
                            <input type="date" class="form-control @error('datetest') is-invalid @enderror" id="datetest" name="datetest" value="{{ $groupes->datetest }}" required>
                            @error('datetest')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <input type="hidden" name="hidden_id" value="{{$groupes->id}}">

                        <button type="submit" class="btn btn-primary">Edit Group</button>
                        <a href="{{ route('admin.group.cancel') }}" class="btn btn-secondary">Cancel</a>

                    </form>
                </div>
            </div>
        </div

@endsection


