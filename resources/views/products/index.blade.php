<x-layout>
    <div class="container mx-auto mt-10">
        <div class="relative overflow-x-auto">
            <div class="flex justify-between mb-4">
                <h1 class="text-2xl font-bold">Products</h1>

                <a href="{{ route('product.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Product</a>
            </div>
            <form class="inline-block pb-5" method="GET">
                @csrf
                <div>
                    <div class="mt-2">
                        <div
                            class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                            <div class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6"></div>
                            <input type="text" name="search" placeholder="Search by name"
                                class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                placeholder="0.00">
                            <div class="grid shrink-0 grid-cols-1 focus-within:relative">
                            <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline px-2"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#4f39f6" viewBox="0 0 256 256"><path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path></svg></button>
                            </div>
                        </div>
                    </div>
                </div>
               
                
            </form>
            <table class="w-full text-sm text-left rtl:text-right  ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Post by
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr class="bg-white border-b  border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            {{ $product->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $product->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->qty }}
                        </td>
                        <td class="px-6 py-4">
                            ${{ $product->price }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->description }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->user->name }}
                        </td>
                        <td class="px-6 py-4">
                            <!-- ['product' => $product]-->
                            <a href="{{ route('product.edit', ['product' => $product->id]) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            |
                            <form method="POST" action="{{ route('product.destroy', ['product' => $product->id]) }}"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            @if(session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            @endif
        </div>


    </div>

</x-layout>