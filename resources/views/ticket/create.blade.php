<x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <form method="POST" action="">

         @csrf
    <div class="w-[100vw] h-[65vh] mt-6 px-3 sm:px-5 flex items-center justify-center absolute">
         <div class = "w-full sm:w-1/2 lg:2/3 px-6 bg-gray-500 bg-opacity-20 bg-clip-padding backdrop-filter backdrop-blur-sm text-white z-50 py-4  rounded-lg">
                    <div class = "w-full flex justify-center  text-xl mb:2 md:mb-5">
                        Create a new ticket 
                    </div>
                    <div class="mb-3">
                        <x-input-label  for="title" :value="__('title')" />
                        <x-text-input id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 md:p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="title" required autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                    </div> 
                    <div class="mb-3">
                       <x-input-label for="description" :value="__('Description')" />
                     <x-textarea name="description" id="description" placeholder="Add Description..."/>
                       <x-input-error :messages="$errors->get('description')" class="mt-2"/>

                    </div>

                    <div class="mb-3">
                       <x-input-label for="attachment" :value="__('Attachment')" />
                    <x-file-input name="attachment" id="attachment"/>
                       <x-input-error :messages="$errors->get('attachment')" class="mt-2"/>

                    </div>
                    <div class="flex items-center justify-center mt-4">
                        <x-primary-button>
                         {{ __('Submit a ticket') }}
                </x-primary-button>
                </div>
                     
        
                </div>


    </div>
   </form>



</x-app-layout>

