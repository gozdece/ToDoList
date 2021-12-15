<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('To Do List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <a href="{{route('events.create')}}">
                <button type="button" class="btn btn-primary">Event Ekle</button>
            </a>
            @foreach($events as $event)
            {{$event->eventName}}
           

            <a href="{{route('events.edit',$event->id)}}">
                <button type="button" class="btn btn-primary">Event Düzenle</button>
            </a> 
            @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
