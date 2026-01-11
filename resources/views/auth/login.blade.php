<x-guest-layout>
    <div class="mb-6">
        <h1 class="text-3xl font-extrabold text-gray-800 mb-2">Bon retour !</h1>
        <p class="text-gray-500">Accédez à votre espace personnel.</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <x-input-label for="email" :value="__('Adresse Email')" class="font-semibold text-gray-700" />
            <x-text-input id="email" class="block mt-1 w-full form-control-doctolib @error('email') is-invalid @enderror" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mb-6">
            <x-input-label for="password" :value="__('Mot de passe')" class="font-semibold text-gray-700" />
            <x-text-input id="password" class="block mt-1 w-full form-control-doctolib" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mb-6">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Rester connecté') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-blue-600 hover:underline font-medium" href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublié ?') }}
                </a>
            @endif
        </div>

        <div class="mt-6">
            <button type="submit" class="w-full btn-doctolib">
                {{ __('Se connecter') }}
            </button>
        </div>

        <p class="mt-8 text-center text-sm text-gray-600">
            Nouveau sur la plateforme ? 
            <a href="{{ route('register') }}" class="font-bold text-blue-600 hover:underline">Créer un compte</a>
        </p>
    </form>
</x-guest-layout>