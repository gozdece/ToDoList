<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('To Do List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <div class="container mt-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-8">
        <a href="{{route('events.index')}}">
             <button type="submit" class="btn btn-warning">Back</button>
        </a>
       
        <form id="regForm" action="{{route('events.store')}}" method="post">
        @csrf
            
                <h1 id="register">Create New Event</h1>
                <div class="all-steps" id="all-steps"> <span class="step"><i class="fa fa-user"></i></span> <span class="step"><i class="fa fa-map-marker"></i></span> <span class="step"><i class="fa fa-shopping-bag"></i></span> <span class="step"><i class="fa fa-car"></i></span> <span class="step"><i class="fa fa-spotify"></i></span> <span class="step"><i class="fa fa-mobile-phone"></i></span> </div>
                <div class="tab">
                    <h6>Event</h6>
                    <p> <input placeholder="Name..." oninput="this.className = ''" name="eventName"></p>
                </div>
                <div class="tab">
                    <h6>Last Date</h6>
                    <p><input type="date" name="finished_at"></p>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>
     
           
            </div>
        </div>
    </div>
</x-app-layout>
