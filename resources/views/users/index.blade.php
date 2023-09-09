<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white  shadow-md overflow-hidden sm:rounded-lg">
            @forelse ($tickets as $ticket)
                <div class="text-black flex justify-between py-4">
                    <p>{{ $ticket->id }}</p>
                   <a href="{{ route('users.show',$ticket->id) }}">{{ $ticket->title }} </a>
                    <p>{{ $ticket->created_at->diffForHumans() }}</p>
                </div>
            @empty
                <p class="text-white">You don't have any support ticket yet.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
