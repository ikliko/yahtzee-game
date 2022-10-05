<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
                <a  href="{{ round('playing') }}"
                    class="bg-indigo-500 rounded-full px-3 py-2 text-white">
                    Play game
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
