<?php
use App\Models\Task;
use App\Models\User;
$user = User::find(auth()->id());
$id=$user->id;
$tasks = DB::table('tasks')->where('user_id', '=', $id)-> get();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-purple-300">

    uzduotys
    <form action="{{route('task.store')}}" method="post">
    <textarea rows="4" cols="50" name="task">
Enter text here...</textarea>
    <input type="hidden" id="user_id" name="user_id" value="{{$user->id}}">
    <input type="submit">
    @csrf
</form>
<br>
<table class="table-auto">
  <thead>
  <thead >
  <tr>
  {{$user->name}} <h1>Tu gali!</h1>
  </tr>
  </thead>
    <tr>
      <th class="px-2 py-2">Sukurta</th>
      <th class="px-2 py-2">Task</th>
      <th class="px-2 py-2">Edit</th>
      <th class="px-2 py-2">Done</th>
  </thead>
  
  @foreach ($tasks as $task)
  
  <tbody>
    <tr>
      <td class="border px-2 py-1">{{$task->updated_at}}</td>
      <td class="border px-2 py-1">{{$task->task}}</td>
      <td class="border px-2 py-1"><a href="{{ route('task.edit',$task->id) }}">Edit</a></td>
      <td class="border px-2 py-1"></form><form action="{{route('task.destroy',$task->id)}}" method="post">
            <button type="submit">Done</button>
            @csrf
            </form></td>
    </tr>
  </tbody>
   
  @endforeach
</table>
</body>
</html>