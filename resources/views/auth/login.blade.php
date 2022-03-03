<x-guest-layout>
    <x-auth-card>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <h1 class="text-center mt-3 mb-3 h2">ログイン</h1>

            <div class="validate-inner">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
            </div>

            <div class="mb-3">
                <input type="email" name="email" :value="old('email')" class="form-control" id="email" placeholder="メールアドレス">
            </div>

            <div class="mb-3">
                <input type="password" name="password" class="form-control" id="password" placeholder="パスワード">
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-primary">
                    ログイン
                </button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>