<x-layout>
  <div class="container mx-auto mt-10">
    <div>
      @if($errors->any())
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Whoops!</strong>
        <span class="block sm:inline">Something went wrong.</span>
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <form method="post" action="{{ route('product.update',['product' => $product->id]) }}"
        class="mt-10 max-w-3xl rounded-xl bg-white p-8 ">
        @csrf
        @method('PUT')
        <div class="border-b border-gray-900/10 pb-12">
          <h2 class=" text-xl font-semibold text-gray-900">Edit Product</h2>

          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-12">
              <label for="name" class="block text-sm/6 font-medium text-gray-900">Product name</label>
              <div class="mt-2">
                <input type="text" name="name" id="name" autocomplete="given-name" value="{{ $product->name }}"
                  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
            </div>

            <div class="sm:col-span-12">
              <label for="qty" class="block text-sm/6 font-medium text-gray-900">Quantity</label>
              <div class="mt-2">
                <input type="text" name="qty" id="qty" autocomplete="Quantity" value="{{ $product->qty }}"
                  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
            </div>



            <div class="sm:col-span-12">
              <label for="price" class="block text-sm/6 font-medium text-gray-900">Price</label>
              <div class="mt-2">
                <input id="text" name="price" type="text" autocomplete="price" value="{{ $product->price }}"
                  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
            </div>

            <div class="sm:col-span-12">
              <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
              <div class="mt-2">
                <input type="text" name="description" id="description" autocomplete="description"
                  value="{{ $product->description }}"
                  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
            </div>

          </div>
        </div>


        <div class="mt-6 flex items-center justify-end gap-x-6">
          <input type="submit" value="Update Product"
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" />
        </div>
      </form>

    </div>

</x-layout>