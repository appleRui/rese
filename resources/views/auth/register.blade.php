<x-guest-layout>
    <x-auth-card>



        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <!-- <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div> -->

            <!-- Email Address -->
            <!-- <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div> -->

            <!-- Password -->
            <!-- <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div> -->

            <!-- Confirm Password -->
            <!-- <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div> -->

            <h1 class="text-center mt-3 mb-3 h2">サインイン</h1>

            <div class="validate-inner">
                <!-- Validation Errors -->
                @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <div class="mb-3">
                <input type="text" name="name" :value="old('name')" class="form-control" id="name" placeholder="ユーザー名">
            </div>

            <div class="mb-3">
                <input type="email" name="email" :value="old('email')" class="form-control" id="email" placeholder="メールアドレス">
            </div>

            <div class="mb-3">
                <input type="password" name="password" class="form-control" id="password" placeholder="パスワード">
            </div>

            <div class="mb-3">
                <input type="password" name="password_confirmation" class="form-control" id="confirmPassword" placeholder="確認パスワード">
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-primary">
                    サインイン
                </button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>