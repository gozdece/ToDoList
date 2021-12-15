<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('To Do List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <form action="{{route('events.update',$event->id)}}" method="post">
            @method('PUT')
                @csrf
  <div class="mb-3">
    <label for="eventName" class="form-label">Event Girin</label>
    <input type="text" class="form-control" id="eventName" name="eventName">
  
  </div>
  <div class="mb-3">
    <label for="finished_at" class="form-label">Son Tarih</label>
    <input type="date" class="form-control" id="finished_at" name="finished_at">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
           
            </div>
        </div>
    </div>
</x-app-layout>
