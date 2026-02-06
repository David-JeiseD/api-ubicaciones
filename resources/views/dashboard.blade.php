<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h3 class="text-lg font-bold mb-4">Tu Llave de Acceso (API Key)</h3>

                    {{-- 1. Si acabamos de generar un token, muéstralo --}}
                    @if (session('flash_token'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                            <strong class="font-bold">¡Token Generado!</strong>
                            <span class="block sm:inline">Cópialo ahora, no podrás verlo de nuevo:</span>
                            <!-- CORRECCIÓN: text-white para que se vea sobre el fondo negro -->
                            <code class="bg-black text-white p-2 rounded mt-2 block overflow-x-auto">
                                {{ session('flash_token') }}
                            </code>
                        </div>
                    @endif

                    {{-- 2. El botón para generar --}}
                    <p class="mb-4">Para usar nuestra API en tus proyectos, necesitas generar un token.</p>
                    
                    <form action="{{ route('token.generate') }}" method="POST">
                        @csrf
                        <!-- CORRECCIÓN: text-white se ve mejor en botón azul -->
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
                            Generar Nueva API Key
                        </button>
                    </form>
            
                </div>
                <div class="mt-8 border-t pt-6">
                    <h4 class="text-md font-bold mb-4">Tus Tokens Activos</h4>
                    
                    @if($tokens->isEmpty())
                        <p class="text-gray-500">No tienes tokens activos.</p>
                    @else
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr>
                                    <th class="border-b p-2">Nombre</th>
                                    <th class="border-b p-2">Creado</th>
                                    <th class="border-b p-2">Último Uso</th>
                                    <th class="border-b p-2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tokens as $token)
                                    <tr>
                                        <td class="p-2">{{ $token->name }}</td>
                                        <td class="p-2 text-sm text-gray-500">{{ $token->created_at->diffForHumans() }}</td>
                                        <td class="p-2 text-sm text-gray-500">
                                            {{ $token->last_used_at ? $token->last_used_at->diffForHumans() : 'Nunca' }}
                                        </td>
                                        </td>
                                        {{-- Botón de Borrar --}}
                                        <td class="p-2">
                                            <form action="{{ route('token.delete', $token->id) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres borrar esta llave? Dejará de funcionar inmediatamente.')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 font-bold text-sm">
                                                    Revocar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 p-4 bg-gray-100 rounded">
    <h3 class="text-lg font-bold">Estado del Plan: {{ strtoupper(Auth::user()->plan) }}</h3>
    <p>Créditos: <strong>{{ Auth::user()->credits }}</strong></p>
    
    @if(Auth::user()->plan_expires_at)
        <p class="text-sm">Vence: {{ Auth::user()->plan_expires_at->format('d/m/Y H:i') }}</p>
    @endif

    <form action="{{ route('simulate.payment') }}" method="POST" class="mt-3">
        @csrf
        <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
            🚀 Simular Pago Premium (20,000 créditos)
        </button>
    </form>
</div>
</x-app-layout>