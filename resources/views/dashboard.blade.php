<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi... <b>{{ Auth::user()->name}}</b>
            <b class="float-right">Total Users <span class="p-1 bg-green-500 text-blue-50 max-w-max shadow-sm hover:shadow-lg rounded-full w-3 h-3">{{count($users)}}</span></b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table-fixed">
                    <thead class="bg-green-500">
                      <tr>
                        <th class="px-4 py-2">SL No</th>
                        <th class="w-1/3 px-4 py-2">Name</th>
                        <th class="w-1/2 px-4 py-2">Email</th>
                        <th class="w-1/3 px-4 py-2">Created At</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php($i = 1)
                        @foreach ($users as $user)
                        <tr>
                          <td class="border px-4 py-2">{{$i++}}</td>
                          <td class="border px-4 py-2">{{$user->name}}</td>
                          <td class="border px-4 py-2">{{$user->email}}</td>
                          <td class="border px-4 py-2">{{$user->created_at->diffForHumans()}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</x-app-layout>
