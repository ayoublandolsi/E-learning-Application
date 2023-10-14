@extends('admin.apprenant.inc.header')

@section('content')


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>ADD /Proffesseur</div>
                    </h3>
                </div>
                <div class="card-body">
                            <form method="POST" action="{{ route('admin.group.updatee', $groupes->id) }}" enctype="multipart/form-data">
                                @csrf



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
<input type="hidden" name="hidden_id" value="{{$groupes->id}}">
<!-- in your Blade template -->
<input type="hidden" id="name" name="name" value="{{$groupes->name}}">
<input type="hidden" id="number" name="number" value="{{$groupes->number}}">
<input type="hidden" id="apprenant_id" name="apprenant_id" value="{{$groupes->apprenant_id}}">
<input type="hidden" id="course_id" name="course_id" value="{{$groupes->course_id}}">
<input type="hidden" id="catego_id" name="catego_id" value="{{$groupes->catego_id}}">
<input type="hidden" id="datedeb" name="datedeb" value="{{$groupes->datedeb}}">
<input type="hidden" id="datefin" name="datefin" value="{{$groupes->datefin}}">
<input type="hidden" id="datetest" name="datetest" value="{{$groupes->datetest}}">
<button type="submit" class="btn btn-primary">Add prof</button>
<a href="{{route('admin.group.show',$groupes->id)}}" class="btn btn-secondary">Cancel</a>

     </form>
</div>
</div>
</div
@endsection
