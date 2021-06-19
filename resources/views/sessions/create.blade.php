<x-layout>
    <section class="px-6  py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 p-6 rounded-xl border border-gray-200 shadow">

            <h1 class="text-center font-bold text-xl">Login</h1>

            <form method="POST" action="/login" class="mt-4">
                @csrf
                
                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Email
                    </label>
                    <input type="text" class="border broder-gray-400 p-2 w-full" name="email" id="email" required
                        value="{{ old('email') }}">
                    @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Password
                    </label>
                    <input type="password" class="border broder-gray-400 p-2 w-full" name="password" id="password"
                        required>
                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6 text-right">
                    <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Login
                    </button>
                </div>

                @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                    <li class="text-red-500 text-xs">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </form>
        </main>
    </section>
</x-layout>