@extends('layouts.app')

@section('content')
    <section class="dash_pg">
        <div class="dash_header">
            <x-button class='btn_login' linkto='#' id="btn-create-annotation">
                Criar anotação
                <x-gmdi-edit-note-r />
            </x-button>
        </div>
        @if (session('status'))
            <span class="txt_success">{{ session('status') }}</span>
        @endif
        <div class="box_tasks">

            @foreach($tasks as $task)
                <x-task id="{{$task->id}}" title="{{$task->title}}">
                    
                    @foreach ($task->taskItems as $taskItem)
                        <div class="task_item" data-task-item-id="{{ $taskItem->id }}">
                            <input type="checkbox" name="is_marked" value="{{ $taskItem->is_marked }}" />
                            <span>{{ $taskItem->content }}</span>
                            <x-typ-edit title="AlterarItem" />
                        </div>
                    @endforeach

                </x-task>
            @endforeach
        </div>
    </section>

    <x-modal id="box-modal">
        <div class="modal_header">
            <h1>Criar anotação</h1>
            <x-vaadin-close id="close-modal"/>
        </div>

        <div class="modal_content">
            <form method="POST" action="{{route('store-task')}}">
            @csrf
                @error('title')
                    <p class="field_error">{{$message}}</p>
                @enderror
                <input class="fullwidth" type="text" name="title" placeholder="Título" value="{{old('title')}}" class="@error('title') field_error @enderror"/>

                <x-button class='btn_fullwidth' linkto='store-task'>Criar nova anotação</x-button>

            </form>
        </div>
    </x-modal>
 
@endsection

@push('scripts')
    <script>
        const btnCreateAnnotation = document.getElementById('btn-create-annotation');
        const boxModal = document.getElementById('box-modal');
        const closeModal = document.getElementById('close-modal');

        btnCreateAnnotation.addEventListener('click', (event) => {
            event.preventDefault();

            boxModal.classList.add('opened');
        });

        closeModal.addEventListener('click', (event) => {
            event.preventDefault();

            boxModal.classList.remove('opened');
        });
    </script>
@endpush