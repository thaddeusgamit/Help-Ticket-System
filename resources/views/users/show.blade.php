<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 0">
        <h1 class=" text-lg font-bold">{{ $user->title }}</h1>
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white  shadow-md overflow-hidden sm:rounded-lg">
            <div class=" flex justify-between py-4">
                <p>{{ $user->description }}</p>
                <p>{{ $user->created_at->diffForHumans() }}</p>
                @if ($user->attachment)
                    <a href="{{ '/attachments/' . $user->attachment }}" target="_blank">Attachment</a>
                @endif
            </div>

            <div class="flex justify-between">
                <div class="flex">
                    <a href="{{ route('users.edit', $user->id) }}">
                        <x-primary-button>Edit</x-primary-button>
                    </a>

                    <form class="ml-2" action="{{ route('users.destroy', $user->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <x-primary-button>Delete</x-primary-button>
                    </form>
                </div>
                @if (auth()->user()->isAdmin)
                    <div class="flex">
                        <form action="{{ route('users.update', $user->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="status" value="resolved" />
                            <x-primary-button>Resolve</x-primary-button>
                        </form>
                        <form action="{{ route('users.update', $user->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="status" value="rejected" />
                            <x-primary-button class="ml-2">Reject</x-primary-button>
                        </form>
                    </div>
                @else
                    <p>Status: {{ $user->status }} </p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
