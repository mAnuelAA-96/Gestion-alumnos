<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notas de') }} {{ $alumno->nombre }} {{ $alumno->apellidos }}
        </h2>
    </x-slot>
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-5">
            <div class="flex-auto text-center text-2xl mt-4 mb-4 dark:text-white">Notas de {{ $alumno->nombre }} {{ $alumno->apellidos }}</div>
                <table class="w-full  text-md rounded mb-4">
                    <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><div class="flex-auto text-right float-right mt-4 mb-4">
                            <a href="/alumno/{{ $alumno->id }}/notas/add" class="bg-blue-500 dark:bg-cyan-700 hover:bg-gray-700 text-white font-bold mr-8 py-2 px-4 rounded">Añadir nueva nota</a>
                        </div></th>
                    </tr>
                    <tr class="border-b dark:text-white text-center">
                        <th class="text-left p-3 px-5">Asignatura</th>
                        <th class="text-left p-3 px-5">Nota</th>
                        <th class="text-left p-3 px-5">Fecha</th>
                        <th class="text-left p-3 px-5">Observaciones</th>
                        <th class="text-left p-3 px-5">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>

                        @if ($notas)
                            @foreach($notas as $nota)
                                <tr class="border-b hover:bg-orange-100 dark:text-white text-center">
                                    <td class="p-3 px-5">
                                        {{ $nota->asignatura }}
                                    </td>
                                    <td class="p-3 px-5">
                                        {{ $nota->nota }}
                                    </td>
                                    <td class="p-3 px-5">
                                        {{ $nota->fecha }}
                                    </td>
                                    <td class="p-3 px-5">
                                        {{ Str::limit($nota->observaciones, 20) }}
                                    </td>
                                    <td class="p-3 px-5">                                  
                                    <form action="/alumno/{{$alumno->id}}/{{$nota->id}}/update" class="inline-block"> 
                                        <a href="/alumno/{{$alumno->id}}/{{$nota->id}}/edit" name="edit" class="text-sm bg-gray-500 hover:bg-gray-700 text-white py-1 px-4 rounded focus:outline-none focus:shadow-outline">Editar</a>
                                        <button type="submit" name="delete" formmethod="POST" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Borrar</button>
                                        {{ csrf_field() }}
                                    </form>
                                    </td>
                                </tr>
                            @endforeach

                        @else
                            <tr>
                                <td colspan="3" class="text-sm bg-gray-500 hover:bg-gray-700 text-white py-1 px-4 rounded focus:outline-none focus:shadow-outline">No hay notas disponibles.</td>
                            </tr>
                        @endif

                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</x-app-layout>
