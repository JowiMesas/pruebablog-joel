<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-gray-800">
            <i class="fa-duotone fa-regular fa-grid-horizontal"></i> Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class=" text-4xl  font-bold">Welcome, {{Auth::user()->name}}</h2>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
