<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category<b></b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                @if (session('success'))
                    <div x-data="{ show: true }" x-show="show"
                        class="flex justify-between items-center bg-green-200 relative text-green-600 py-2 px-2 rounded-lg">
                        <div>
                            <span class="font-semibold text-green-700">{{session('success')}}</span>
                        </div>
                        <div>
                            <button type="button" @click="show = false" class=" text-green-700">
                                <span class="text-2xl">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
                <div class="grid grid-cols-1 grid-rows-2 md:grid-cols-2 gap-2">
                    <div class="col-span-1 row-span-2 bg-white p-3 rounded shadow-md m-2">
                        <form action="{{ url('category/update/'.$categories->id)}}" method="POST">
                            @csrf
                            <b>Editar Categoría</b>
                            <div class="mt-7">
                                <input type="text" placeholder="Ingrese Categoría" name="category_name"
                                    class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0" value="{{$categories->category_name}}">
                                @error('category_name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-7">
                                <button
                                    class="bg-green-500 w-1/3 py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                    Editar Categoría
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
