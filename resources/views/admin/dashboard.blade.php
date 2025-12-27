<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="p-6">
        <p>Halo Admin {{ auth()->user()->name }}</p>
        <p class="text-sm text-gray-500">
            Kamu punya akses penuh
        </p>
    </div>
</x-app-layout>
