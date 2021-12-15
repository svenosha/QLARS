<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

        <form class="form-inline" action="/create" method="POST">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="StdName" class="block mt-1 w-full" type="text" name="StdName"  required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="StdEmail" class="block mt-1 w-full" type="email" name="StdEmail"  required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="StdPassword" class="block mt-1 w-full" type="password" name="StdPassword"  required autocomplete="new-password" />
              
            </div>

            <div class="mt-4">
                <x-jet-label for="phone" value="{{ __('Phone Number') }}" />
                <x-jet-input id="StdPhone" class="block mt-1 w-full" type="integer" name="StdPhone" required autocomplete="phone" />
            </div>

            <div class="mt-4">
                <x-jet-label for="class" value="{{ __('Class') }}" />
                <x-jet-input id="StdClass" class="block mt-1 w-full" type="text" name="StdClass"  required autocomplete="class" />
            </div>
            
            <x-jet-button type="submit" class="ml-4">Create</button>
                </x-jet-button>
            </div>
        </form>
    
</x-app-layout>
