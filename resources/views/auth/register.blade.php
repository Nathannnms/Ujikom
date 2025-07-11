<x-guest-layout>
    @if ($errors->any())
    <div class="mb-4 text-sm text-red-600">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Role -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <select name="role" id="role" class="block mt-1 w-full" required>
                <option value="">-- Pilih Role --</option>
                <option value="pelanggan" {{ old('role') == 'pelanggan' ? 'selected' : '' }}>Pelanggan</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Kode Rahasia untuk Admin -->
        <div class="mt-4" id="admin-code" style="display: none;">
            <x-input-label for="admin_code" :value="__('Kode Rahasia Admin')" />
            <x-text-input id="admin_code" class="block mt-1 w-full" type="text" name="admin_code" autocomplete="off" />
            <x-input-error :messages="$errors->get('admin_code')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    @push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const roleSelect = document.getElementById("role");
            const adminCodeDiv = document.getElementById("admin-code");
            const adminCodeInput = document.getElementById("admin_code");
    
            function toggleAdminCode() {
                if (roleSelect.value === "admin") {
                    adminCodeDiv.style.display = "block";
                } else {
                    adminCodeDiv.style.display = "none";
                    adminCodeInput.value = ""; // kosongkan biar gak terkirim
                }
            }
    
            roleSelect.addEventListener("change", toggleAdminCode);
    
            // Panggil juga saat form pertama kali dimuat
            toggleAdminCode();
        });
    </script>
    @endpush
</x-guest-layout>
