<!DOCTYPE html>
<html lang="en">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>teachers</title>
   <link rel="stylesheet" href="{{asset ('home/css')}}/a.css">

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <header>
           <table class="table table-bordered">
              <thead>
                 <tr>
                    <th colspan="2"><h1>DS 1 : {{$test->desc}}</h1></th>
                    <th colspan="1"><h3>{{$catego->name}}</h3></th>
                </tr>
              </thead>
              <tbody>
                 <tr>
                    <td><h3> <div class="timer"> Durée :
                        <span class="minutes">1</span>:<span class="seconds">00</span>
                       </div></h3></td>
                    <td><h3>Matière : {{$course->name}}</h3></td>
                    <td><h3>{{$test->date}}</h3></td>
<tr></tr>
                 </tr>
              </tbody>
           </table>
        </header>

        <div class="row">
           <div class="col-md-4">
              <img src="{{ asset('uploads/test/'. $test->img)}}" alt="Test image" width="100%" height="100%">
           </div>

           <div class="col-md-8">

                 <div class="form-group">
                    <label for="question1">Question 1 : Comment faire une liaison entre un fichier HTML et un fichier CSS ?</label>
                    <input type="text" class="form-control" name="question1" >
                 </div>

                 <div class="form-group">
                    <label for="question2">Question 2 :</label>
                    <textarea class="form-control" name="question2" rows="4" ></textarea>
                 </div>

                 <div class="form-group">
                    <label for="question3">Question 3 :</label>
                    <div>
                       <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="question3" id="q3answer1" value="answer1">
                          <label class="form-check-label" for="q3answer1">Réponse 1</label>
                       </div>
                       <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="question3" id="q3answer2" value="answer2" >
                          <label class="form-check-label" for="q3answer2">Réponse 2</label>
                       </div>
                       <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="question3" id="q3answer3" value="answer3" >
                          <label class="form-check-label" for="q3answer3">Réponse 3</label>
                       </div>
                    </div>
                 </div>

                 <div class="form-group">
                    <label for="question4">Question 4 :</label>
                    <select class="form-control" name="question4" >
                       <option value="">Sélectionner une réponse</option>
                       <option value="answer1">Réponse 1</option>
                       <option value="answer2">Réponse 2</option>
                       <option value="answer3">Réponse 3</option>
                    </select>
                 </div>

                 <form method="POST" action="{{ route('apprenant.gerer.send',$course->id) }}">
                     @csrf
                     <input type="hidden" name="course_id" value="{{ $course->id }}">
                     <input type="hidden" name="message" value="the apprenant << {{$apprenants->name}} >> has completed all  the course of specialité << {{$catego->name}} >> and complete all the test with sucssesfuly  you want to effected certificat of the Module << {{$catego->name}} >>.">
                     <input type="hidden" name="apprenant_id" value="{{ $apprenants->id }}">
                     <input type="hidden" name="courstatus" value="complete">
                     <input type="hidden" name="status" value="accepted">
                     
                     <button type="submit" class="btn btn-primary">Soumettre</button>
                 </form>


           </div>
        </div>
        <script src="{{asset ('home/js')}}/jso.js"></script>
