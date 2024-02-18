<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            <div class="flex">
               


                @if (request()->routeis('notes.show'))

                <p class="opacity-70 ">
                    <strong>Created:</strong>{{ $note->created_at->diffForHumans() }}
                </p>
                <p class="opacity-70 ml-8">
                    <strong>Updated:</strong>{{ $note->updated_at->diffForHumans() }}
                </p>

                    <a href="{{ route('notes.edit', $note) }}"
                        class="bg-blue-500 px-4 py-2 text-white rounded-md uppercase text-sm mx-2  ml-auto">Edit</a>
                    <form action="{{ route('notes.destroy', $note) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit"
                            class="bg-red-500 px-4 py-2 text-white rounded-md uppercase text-sm mx-2 ml-auto"
                            onclick="return confirm('Are you sure you want to move this note to trash?')">Move to
                            Trash</button>
                    </form>
                @else

                <p class="opacity-70 ">
                    <strong>Created:</strong>{{ $note->created_at->diffForHumans() }}
                </p>
                <p class="opacity-70 ml-8">
                    <strong>Deleted:</strong>{{ $note->deleted_at->diffForHumans() }}
                </p>
               

                    <form action="{{ route('trashed.update', $note) }}" method="post" class="ml-auto">
                        @method('put')
                        @csrf
                        <button type="submit"
                            class="bg-blue-500 px-4 py-2 text-white rounded-md uppercase text-sm mx-2 ml-auto"
                            onclick="return confirm('Are you sure you want to restore this note?')">Restore</button>
                    </form>

                    <form action="{{ route('trashed.destroy', $note) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit"
                            class="bg-red-500 px-4 py-2 text-white rounded-md uppercase text-sm mx-2 ml-auto"
                            onclick="return confirm('Are you sure you want to delete this note permanently?')">Delete</button>
                    </form>
                @endif

            </div>
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class=" font-bold text-4xl">
                    {{ $note->title }}
                </h2>
                <p class="mt-6 whitespace-pre-wrap">{{ $note->text }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
