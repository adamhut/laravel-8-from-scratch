<x-layout>
    <section class="px-6  py-8">
        <main class="max-w-lg mx-auto mt-10 ">
            <x-panel>
            <h1 class="text-center font-bold text-xl">Login</h1>

            <form method="POST" action="/login" class="mt-4">
                @csrf
                <x-form.input name="email" autocomplete="username" autocomplete="username" />

                <x-form.input name="password" type="password" autocomplete="current-password"/>

                {{-- <div class="mb-6 text-right">
                    <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Login
                    </button>
                </div> --}}

                <x-form.button>Login</x-form.button>
                @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                    <li class="text-red-500 text-xs">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </form>
            </x-panel>
        </main>
    </section>
</x-layout>