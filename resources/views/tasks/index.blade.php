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
<div class="grid grid-cols-12 gap-4 mt-20">

<div class="col-start-9 col-span-1">
<a href="{{ route('user.index') }}">Edit profile</a>
</div>
<div class="col-start-10 col-span-1">
<form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </form>
</div>
<div class="col-start-11 col-span-1">
    @if(Auth::User()->logo)
  
        <img class="logo" src="{{asset('img/'.Auth::User()->logo)}}"  alt="logo">
    @endif

</div>
</div>
<div class="grid grid-cols-12 gap-4 mt-10">
<div class="col-start-5 col-span-5">
@if ($errors->any())
    <div class="alert">
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session()->has('info_message'))
    <div class="alert aler-info">
    {{session()->get('info_message')}}
    </div>
@endif
</div>
</div>
<div class="grid grid-cols-12 gap-4 mt-5">
<div class="col-start-5 col-span-5">
    <p>Sukurti naują užduotį</p>
    <form action="{{route('task.store')}}" method="post">
    <textarea class="bg-purple-100 rounded-md" rows="4" cols="50" name="task">
Užduotis...</textarea>
    <input type="hidden" id="user_id" name="user_id" value="{{$user->id}}">
    <x-jet-button class="ml-4">
                    {{ __('Sukurti') }}
                </x-jet-button>
    @csrf
</form>
<br>
</div>
</div>
<div class="grid grid-cols-12 gap-4 mt-10">
<div class="col-start-5 col-span-5">
<table class="table-auto bg-purple-200 rounded-md">
  <thead>
  <thead >
  <tr>
  <h1 class="font-semibold text-2xl">{{$user->name}}</h1>
   <h2 class="font-semibold text-1xl">Tu gali!</h2>
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
</div>
</div>
</body>

</html>