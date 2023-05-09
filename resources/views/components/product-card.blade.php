<div class="py-6">
    <div class="flex max-w-md bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="w-1/3 bg-cover"
            style="background-image: url('https://images.unsplash.com/photo-1494726161322-5360d4d0eeae?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80')">
        </div>
        <div class="w-2/3 p-4">
            <h1 class="text-gray-900 font-bold text-2xl">{{ $product->title }}</h1>
            <p class="mt-2 text-gray-600 text-sm">{{ $product->summary }}</p>
            <div class="flex item-center justify-between mt-3">
                <h1 class="text-gray-700 font-bold text-xl">${{ $product->price }}</h1>
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}" />
                    <button class="px-3 py-2 bg-gray-800 text-white text-xs font-bold uppercase rounded">Add to Card</button>
                </form>
            </div>
        </div>
    </div>
</div>