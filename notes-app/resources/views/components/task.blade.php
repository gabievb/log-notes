@pushOnce('styles')
    <link href="{{asset('css/task.css')}}" rel="stylesheet" />
@endPushOnce

<div class="task" data-id="{{ $id }}">
    <div class="task_header">
        <h1>{{ $title }}</h1>

        <div class="task_actions">
            <x-microns-edit title="Alterar" />
            <x-fas-trash-can title="Remover" />
        </div>
    </div>

    <div class="task_content">
        {{ $slot }}
    </div>

    <button class="task_add">
        <x-monoicon-add />
        <span>Adicionar Item</span>
    </button>
</div>

<x-modal id="box-modal-task-edit" taskid="{{ $id }}">
    <div class="modal_header">
        <h1>Editar tarefa</h1>
        <x-vaadin-close id="close-modal-task-edit" />
    </div>

    <div class="modal_content">
        <form method="POST" action="{{route('update-task')}}">
            @csrf
            @method('PUT')

            @error('title')
                <p class="field_error">{{ $message }}</p>
            @enderror
            <input class="fullwidth" type="text" name="title" placeholder="Título da tarefa" value="{{ $title }}" class="@error('title') field_error @enderror"/>

            <input type="hidden" name="task_id" value="{{ $id }}" />

            <x-button class='btn_fullwidth' linkto='update-task'>Atualizar tarefa</x-button>
        </form>
    </div>
</x-modal>

<x-modal id="box-modal-task-item" taskid="{{ $id }}">
    <div class="modal_header">
        <h1>Adicionar item</h1>
        <x-vaadin-close id="close-modal-task-item" />
    </div>

    <div class="modal_content">
        <form method="POST" action="{{route('store-task-item')}}">
            @csrf

            @error('content')
                <p class="field_error">{{ $message }}</p>
            @enderror
            <input class="fullwidth" type="text" name="content" placeholder="Item" value="{{old('content')}}" class="@error('content') field_error @enderror"/>

            <input type="hidden" name="task_id" value="{{ $id }}" />
            <input type="hidden" name="is_marked" value="{{ App\Models\TaskItem::IS_NOT_MARKED }}" />

            <x-button class='btn_fullwidth' linkto='store-task-item'>Criar novo item</x-button>
        </form>
    </div>
</x-modal>

<x-modal id="box-modal-task-item-edit-{{ $id }}" taskid="{{ $id }}">
    <div class="modal_header">
        <h1>Editar item</h1>
        <x-vaadin-close class="close-modal-task-item-edit" />
    </div>

    <div class="modal_content">
        <form method="POST" action="{{route('update-task-item')}}">
            @csrf
            @method('PUT')

            @error('content')
                <p class="field_error">{{ $message }}</p>
            @enderror

            <input id="input-content-{{ $id }}" class="fullwidth @error('content') field_error @enderror" type="text" name="content" placeholder="Item" value="{{ old('content') }}" required />

            <input type="hidden" name="task_item_id" id="input-task-item-id-{{ $id }}" value="">
            <input type="hidden" name="is_marked" id="input-is-marked-{{ $id }}" value="">

            <x-button class='btn_fullwidth' type="submit">Atualizar item</x-button>
        </form>
    </div>
</x-modal>


@pushOnce('scripts')
    <script>
        const btnsAddItems = document.querySelectorAll('.task_add');
        const iconsCloseModal = document.querySelectorAll('#close-modal-task-item');
        const btnsEditTask = document.querySelectorAll('[title="Alterar"]');
        const iconsCloseModalEdit = document.querySelectorAll('#close-modal-task-edit');
        const btnsEditTaskItem = document.querySelectorAll('[title="AlterarItem"]');
        const iconsCloseModalEditItem = document.querySelectorAll('.close-modal-task-item-edit');

        btnsAddItems.forEach(btnAddIt => {
            btnAddIt.addEventListener('click', (event) => {
                event.preventDefault();

                const taskId = btnAddIt.parentNode.dataset.id;
                const modal = document.querySelector(`[data-task-id='${taskId}']`)
                modal.classList.add('opened');
            })
        });

        iconsCloseModal.forEach(icCloseMod => {
            icCloseMod.addEventListener('click', (event) => {
                event.preventDefault();

                const modal = icCloseMod.parentNode.parentNode.parentNode;
                modal.classList.remove('opened');
            })
        });

        btnsEditTask.forEach(btnEdit => {
            btnEdit.addEventListener('click', (event) => {
                event.preventDefault();

                const taskId = btnEdit.closest('.task').dataset.id;
                const modal = document.querySelector(`[data-task-id='${taskId}'][id='box-modal-task-edit']`)
                modal.classList.add('opened');
            })
        });

        iconsCloseModalEdit.forEach(icCloseMod => {
            icCloseMod.addEventListener('click', (event) => {
                event.preventDefault();

                const modal = icCloseMod.parentNode.parentNode.parentNode;
                modal.classList.remove('opened');
            })
        });

        btnsEditTaskItem.forEach(btnEditIt => {
            btnEditIt.addEventListener('click', (event) => {
                event.preventDefault();

                const taskItemEl = btnEditIt.closest('.task_item');
                const taskEl = btnEditIt.closest('.task');

                const taskItemId = taskItemEl.getAttribute('data-task-item-id');
                const taskId = taskEl.dataset.id;
                const currentContent = taskItemEl.querySelector('span').innerText.trim();
                const checkbox = taskItemEl.querySelector('input[type="checkbox"]');

                const isMarkedValue = checkbox.checked ? 1 : 2;

                const modalEditItem = document.getElementById(`box-modal-task-item-edit-${taskId}`);

                modalEditItem.querySelector(`#input-task-item-id-${taskId}`).value = taskItemId;
                modalEditItem.querySelector(`#input-content-${taskId}`).value = currentContent;
                modalEditItem.querySelector(`#input-is-marked-${taskId}`).value = isMarkedValue;

                modalEditItem.classList.add('opened');
            });
        });

        iconsCloseModalEditItem.forEach(icCloseMod => {
            icCloseMod.addEventListener('click', (event) => {
                event.preventDefault();

                icCloseMod.closest('.box_modal').classList.remove('opened');
            })
        });

    </script>
@endPushOnce
