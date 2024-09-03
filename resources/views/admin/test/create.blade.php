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
                    <form method="POST" action="{{ route('admin.test.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="desc" class="form-label">Teste Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="desc" value="{{ old('desc') }}" required>
                            @error('desc')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>




                        <div class="mb-3">
                            <label for="course_id" class="form-label">Course</label>
                            <select class="form-control @error('course_id') is-invalid @enderror" id="course_id" name="course_id" required>
                                <option value="">Select a course</option>
                                @foreach($courses as $prof)
                                    <option value="{{ $prof->id }}" {{ old('prof_id') == $prof->id ? 'selected' : '' }}>{{ $prof->name }}</option>
                                @endforeach
                            </select>
                            @error('course_id')
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
                            <label for="datefin" class="form-label">Date</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}" required>
                            @error('datefin')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-3">
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


                        <button type="submit" class="btn btn-primary">Add Course</button>
                        <a href="{{ route('admin.test.cancel') }}" class="btn btn-secondary">Cancel</a>

                    </form>
                </div>
            </div>
        </div

@endsection

