<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{request()->routeis('notes.index')? __('Notes') :__('Trashed Notes') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <x-alert-success>
          {{ session('success') }}
          </x-alert-success>

          @if(request()->routeis('notes.index'))
              
          <div class="flex">
            <a href="{{ route('notes.create') }}" class="bg-indigo-600 px-4 py-2 text-white rounded-md uppercase text-sm mb-2 ml-auto">+ New Note</a>
          </div>
          @endif
        

          @forelse ($notes as $note)
          <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
            <h2 class=" font-bold text-2xl underline">
                <a 
                @if(request()->routeis('notes.index'))
                href="{{ route('notes.show',$note) }}"
                @else
                href="{{ route('trashed.show',$note) }}"
                @endif
                >{{ $note->title }}</a>
            </h2>
            <p class="mt-2">
            </p>
            {{ Str::limit($note->text, 200, '...') }}
            <span class="block text-sm opacity-7 mt-4">
              {{-- {{ $note->updated_at->format('d-m-Y H:i') }} --}}
              {{ $note->updated_at->diffForHumans() }}
            </span>
        </div>
        @empty
        
        @if(request()->routeis('notes.index'))
        <p class="text-lg my-4 p-6 bg-yellow-100 border-b border-gray-200 shadow-sm sm:rounded-lg">You have not created any notes yet!</p>
    
       @else
      
       <p class="text-lg my-4 p-6 bg-yellow-100 border-b border-gray-200 shadow-sm sm:rounded-lg">Trash bin is Empty!</p>

        @endif

          @endforelse

          {{ $notes->links() }}
      </div>
  </div> 
</x-app-layout>
