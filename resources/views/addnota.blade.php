<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añadir nota') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-5">
            <div class="flex-auto text-center text-2xl mt-4 mb-4 dark:text-white">Añadir nota a {{ $alumno->nombre }} {{ $alumno->apellidos }}</div>
            
                <form method="POST" action="{{ route('notas.store', ['alumno' => $alumno]) }}" class="w-1/2 mx-auto">
    
                    <div class="form-group mb-4">
                        <label for="asignatura" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asignatura</label>
                        <input type='text' name='asignatura' id="asignatura" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
                        @if ($errors->has('asignatura'))
                            <span class="text-danger dark:text-white dark:bg-gray-500">{{ $errors->first('asignatura') }}</span>
                        @endif
                    </div>
    
                    <div class="form-group mb-4">
                        <label for="nota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nota</label>
                        <input type='text' name='nota' id="nota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
                        @if ($errors->has('nota'))
                            <span class="text-danger dark:text-white dark:bg-gray-500">{{ $errors->first('nota') }}</span>
                        @endif
                    </div>
    
                    <div class="form-group mb-4">
                        <label for="fecha" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha</label>
                        <input type='date' name='fecha' id="fecha" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
                        @if ($errors->has('fecha'))
                            <span class="text-danger dark:text-white dark:bg-gray-500">{{ $errors->first('fecha') }}</span>
                        @endif
                    </div>
    
                    <div class="form-group mb-4">
                        <label for="observaciones" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Observaciones</label>
                        <textarea type='text' name='observaciones' id="observaciones" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        @if ($errors->has('observaciones'))
                            <span class="text-danger dark:text-white dark:bg-gray-500">{{ $errors->first('observaciones') }}</span>
                        @endif
                    </div>
    
                    <div class="form-group mb-4">
                        <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Añadir Nota</button>
                        <a href="/alumno/{{$alumno->id}}/notas" class="bg-blue-500 dark:bg-cyan-700 hover:bg-gray-700 text-white font-bold mr-8 py-2 px-4 rounded">Cancelar</a>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</x-app-layout>