<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añadir alumno') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-5">
            <div class="flex-auto text-center text-2xl mt-4 mb-4 dark:text-white">Añadir alumno</div>
            
                <form method="POST" action="{{ route('alumnos.store') }}" class="w-1/2 mx-auto">
    
                    <div class="form-group mb-4">
                        <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                        <input type='text' name='nombre' id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
                        @if ($errors->has('nombre'))
                            <span class="text-danger dark:text-white dark:bg-gray-500">{{ $errors->first('nombre') }}</span>
                        @endif
                    </div>
    
                    <div class="form-group mb-4">
                        <label for="apellidos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos</label>
                        <input type='text' name='apellidos' id="apellidos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
                        @if ($errors->has('apellidos'))
                            <span class="text-danger dark:text-white dark:bg-gray-500">{{ $errors->first('apellidos') }}</span>
                        @endif
                    </div>
    
                    <div class="form-group mb-4">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type='text' name='email' id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
                        @if ($errors->has('email'))
                            <span class="text-danger dark:text-white dark:bg-gray-500">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
                        <input type='tel' name='telefono' id="telefono" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
                        @if ($errors->has('telefono'))
                            <span class="text-danger dark:text-white dark:bg-gray-500">{{ $errors->first('telefono') }}</span>
                        @endif
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="fechaNacimiento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de nacimiento</label>
                        <input type='date' name='fechaNacimiento' id="fechaNacimiento" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
                        @if ($errors->has('fechaNacimiento'))
                            <span class="text-danger dark:text-white dark:bg-gray-500">{{ $errors->first('fechaNacimiento') }}</span>
                        @endif
                    </div>
    
                    <div class="form-group mb-4">
                        <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Añadir Alumno</button>
                        <a href="/dashboard" class="bg-blue-500 dark:bg-cyan-700 hover:bg-gray-700 text-white font-bold mr-8 py-2 px-4 rounded">Cancelar</a>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</x-app-layout>