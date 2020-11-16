<?php
use App\Models\Task;
use App\Models\User;
// $task = Task::find($id);
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
<div class="grid grid-cols-12 gap-4 mt-20">
<div class="col-start-5 col-span-5">
<form action="{{route('task.update', $task->id)}}" method="post">
    <textarea rows="4" cols="50" name="task">{{$task->task}}
</textarea>
<input type="hidden" id="id" name="id" value="{{$task->id}}">
    <input type="submit">
    @csrf
</form>
</div>
</div>
</body>
</html>