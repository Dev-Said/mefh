<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}" class="auth">
            @csrf

            <!-- Password -->

                <label for="password" class="auth_label">{{ __('messages.mdp') }}</label>

                <x-input id="password" class="auth_input"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />


            <div class="auth_footer">
                <x-button class="auth_footer_resetmdp">
                    {{ __('messages.envoyer') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
