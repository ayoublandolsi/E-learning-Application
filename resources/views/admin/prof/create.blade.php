@extends('admin.apprenant.inc.header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Tuteur') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.prof.store') }}" enctype="multipart/form-data">

                    @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                       <label for="phone" class="col-md-4 col-form-label text-md-end">phonenumber</label>
                      <div class="col-md-6">
                      <input  type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  required autocomplete="phonenumber">

        @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>




<div class="row mb-3">
    <label for="spec" class="col-md-4 col-form-label text-md-end">specialite</label>
    <div class="col-md-6">
    <select class="form-control @error('spec') is-invalid @enderror" id="spec" name="spec" required>
        <option value="">Select a categories</option>
        @foreach($categos as $catego)
            <option value="{{ $catego->name }}" {{ old('spec') == $catego->id ? 'selected' : '' }}>{{ $catego->name }}</option>
        @endforeach
    </select>
    @error('prof_id')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>


     <div class="row mb-3" style="margin-top: 40px !important;margin-left: -5px !important">
    <label for="image" class="col-md-4 col-form-label text-md-end">Image</label>

    <div class="col-md-6">
        <input id="img" type="file" class="form-control @error('img') is-invalid @enderror" name="img" >

        @error('img')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
                 <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                Add prof
                                </button>
                                <a onclick="window.history.back()" class="btn btn-secondary">Cancel</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


