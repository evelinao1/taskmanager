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
</head>
<body>

<form action="{{route('task.update', $task->id)}}" method="post">
    <textarea rows="4" cols="50" name="task">{{$task->task}}
</textarea>
<input type="hidden" id="id" name="id" value="{{$task->id}}">
    <input type="submit">
    @csrf
</form>
</body>
</html>