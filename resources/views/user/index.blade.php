<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Users') }}
            </h2>

            <div class="flex items-center">
                <a class="sms-btn mr-4" href="{{ route('role.index') }}">Roles</a>
                <a class="sms-btn" href="{{ route('user.create') }}">Add new user</a>
            </div>
        </div>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- @livewire('user-index') --}}
                    <livewire:user-index />

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
