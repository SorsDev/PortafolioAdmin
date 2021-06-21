<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category<b></b>
            <b class="float-right">Total Categories <span
                    class="p-1 bg-green-500 text-blue-50 max-w-max shadow-sm hover:shadow-lg rounded-full w-3 h-3">{{ $categories->count() }}</span></b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                @if (session('success'))
                    <div x-data="{ show: true }" x-show="show"
                        class="flex justify-between items-center bg-green-200 relative text-green-600 py-2 px-2 rounded-lg">
                        <div>
                            <span class="font-semibold text-green-700">{{ session('success') }}</span>
                        </div>
                        <div>
                            <button type="button" @click="show = false" class=" text-green-700">
                                <span class="text-2xl">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
                <div class="grid grid-cols-1 grid-rows-1 md:grid-cols-3 gap-2">
                    <div class="col-span-2 row-span-1 bg-white p-3 rounded shadow-md m-2">
                        <table class="table-fixed">
                            <thead class="bg-green-300">
                                <tr>
                                    <th class="px-4 py-2">SL No</th>
                                    <th class="w-1/3 px-4 py-2">Categoría</th>
                                    <th class="w-1/3 px-4 py-2">Usuario</th>
                                    <th class="w-1/3 px-4 py-2">Creado</th>
                                    <th class="w-1/3 px-4 py-2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $categories->firstItem() + $loop->index }}</td>
                                        <td class="border px-4 py-2">{{ $category->category_name }}</td>
                                        <td class="border px-4 py-2">{{ $category->user->name }}</td>
                                        <td class="border px-4 py-2">
                                            {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}</td>
                                        <td class="border py-3 flex">
                                            <a href="{{ url('category/edit/' . $category->id) }}"
                                                class="bg-indigo-600 w-full p-1 m-1 rounded-md text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">editar</a>
                                            <a href="{{ url('softdelete/category/'.$category->id) }}"
                                                class="bg-red-600 w-full p-1 m-1 rounded-md text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">Eliminar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                    <div class="col-span-1 row-span-1 bg-white p-3 rounded shadow-md m-2">
                        <form action="{{ route('store.category') }}" method="POST">
                            @csrf
                            <b>Agregar Categoría</b>
                            <div class="mt-7">
                                <input type="text" placeholder="Ingrese Categoría" name="category_name"
                                    class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                                @error('category_name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-7">
                                <button
                                    class="bg-green-500 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                    Agregar Categoría
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <div class="">
                <div class="grid grid-cols-1 grid-rows-1 md:grid-cols-3 gap-2">
                    <div class="col-span-2 bg-white p-3 rounded shadow-md m-2">
                        <b>Trash List</b>
                        <table class="table-fixed">
                            <thead class="bg-green-300">
                                <tr>
                                    <th class="px-4 py-2">SL No</th>
                                    <th class="w-1/3 px-4 py-2">Categoría</th>
                                    <th class="w-1/3 px-4 py-2">Usuario</th>
                                    <th class="w-1/3 px-4 py-2">Creado</th>
                                    <th class="w-1/3 px-4 py-2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trashCat as $category)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $categories->firstItem() + $loop->index }}</td>
                                        <td class="border px-4 py-2">{{ $category->category_name }}</td>
                                        <td class="border px-4 py-2">{{ $category->user->name }}</td>
                                        <td class="border px-4 py-2">
                                            {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}</td>
                                        <td class="border py-3 flex">
                                            <a href="{{ url('category/restore/' . $category->id) }}"
                                                class="bg-indigo-600 w-full p-1 m-1 rounded-md text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">Restaurar</a>
                                            <a href="{{ url('pdelete/category/' . $category->id) }}"
                                                class="bg-red-600 w-full p-1 m-1 rounded-md text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">EliminarPerm</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $trashCat->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
