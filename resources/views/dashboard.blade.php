<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if ($message = Session::get('success'))
                <div class="p-6 bg-green-200">
                    <p><strong>Éxito</strong>, {{ $message }}</p>
                </div>
                @endif
                <div class="p-6 flex flex-wrap justify-center gap-2">
                    @foreach ($products as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
