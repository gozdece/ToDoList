<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="container m-5 p-2 rounded mx-auto bg-light shadow">
    <!-- App title section -->
    <div class="row m-1 p-4">
        <div class="col">
            <div class="p-1 h1 text-primary text-center mx-auto display-inline-block">
                <i class="fa fa-check bg-primary text-white rounded p-2"></i>
                <u>TODOLİST</u>
            </div>
        </div>
    </div>
    <!-- Create todo section -->
    <div class="row m-1 p-3">
        <div class="col col-11 mx-auto">
            <div class="row bg-white rounded shadow-sm p-2 add-todo-wrapper align-items-center justify-content-center">
               
                <div class="col-auto m-0 px-2 d-flex align-items-center">
                    <label class="text-secondary my-2 p-0 px-1 view-opt-label due-date-label d-none">Due date not set</label>
                    <i class="fa fa-calendar my-2 px-1 text-primary btn due-date-button" data-toggle="tooltip" data-placement="bottom" title="Set a Due date"></i>
                    <i class="fa fa-calendar-times-o my-2 px-1 text-danger btn clear-due-date-button d-none" data-toggle="tooltip" data-placement="bottom" title="Clear Due date"></i>
                </div>
                <div class="col-auto px-0 mx-0 mr-2">
                    <a href="{{route('events.create')}}">
                        <button type="button" class="btn btn-primary">Add</button>
                    </a>
                    <a href="{{route('events.index')}}">
                        <button type="button" class="btn btn-info">Get All</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="p-2 mx-4 border-black-25 border-bottom"></div>
    <!-- View options section -->  
    <form action="{{url('/search')}}" type="get" >
    <div class="row m-1 p-3 px-5 justify-content-end">
      
        <div class="col-auto d-flex align-items-center">
            <input type="text" name="arama">
        </div>
        <div class="col-auto d-flex align-items-center px-1 pr-3">
            <button type="submit" class="btn btn-info">Search</button>
        </div>
    </div>
</form>
    <!-- Todo list section -->
    <div class="row mx-1 px-5 pb-3 w-80">
        <div class="col mx-auto">        
            <!-- Todo Item 1 --> 
            @foreach($events as $event)
            <div class="row px-3 align-items-center todo-item rounded">
                <div class="col-auto m-1 p-0 d-flex align-items-center">
                    <h2 class="m-0 p-0">
               
                        <i class="fa fa-square-o text-primary btn m-0 p-0 d-none" data-toggle="tooltip" data-placement="bottom" title="Mark as complete"></i>
                        <i class="fa fa-check-square-o text-primary btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Mark as todo"></i>
                    </h2>
                </div>
                <div class="col px-1 m-1 d-flex align-items-center">
                    <input type="text" class="form-control form-control-lg border-0 edit-todo-input bg-transparent rounded px-3" readonly value="{{$event->eventName}}" title="Buy groceries for next week" />
                    <input type="text" class="form-control form-control-lg border-0 edit-todo-input rounded px-3 d-none" value="{{$event->eventName}}" />
                </div>
                <div class="col-auto m-1 p-0 px-3 d-none">
                </div>
                <div class="col-auto m-1 p-0 ">
                    <div class="row d-flex align-items-center justify-content-end">
                        <div class="col">
                            <h5 class="m-0 p-0 px-2">
                        <a href="{{route('events.edit',$event->id)}}">
                                <button type="button" class="btn btn-success">Edit</button>
                            </a>
                        </h5>
                        </div>
                        <div class="col">
                          <h5 class="m-0 p-0 px-2">
                        <form action="{{ route('events.destroy',$event->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                                <button type="submit" class="btn btn-danger">Sil</button>
                        </form>
                        </h5>   
                        </div>
                        
                       
                    </div>
                    <div class="row todo-created-info">
                        <div class="col-auto d-flex align-items-center pr-2">
                            <i class="fa fa-info-circle my-2 px-2 text-black-50 btn" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Created date"></i>
                            <label class="date-label my-2 text-black-50">{{$event->finished_at}}</label>
                        </div>
                    </div>
                </div>
            </div>
            
            @endforeach
            @if(count($events)==5)
            {{ $events->links()}}
           @endif
        </div>
    </div>
</div>
            
            
            </div>
        </div>
    </div>
</x-app-layout>
