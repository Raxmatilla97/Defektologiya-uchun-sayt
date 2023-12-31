<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Familya ismingiz')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email manzilingiz')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label for="select" class="block font-medium text-sm text-gray-700">Saytdan qay maqsadda foydalanmoqchisiz?</label>
            <select id="select" class="block mt-1 rounded-md w-full" name="roll">
                <option value="teacher" {{ old('roll', 'teacher') === 'teacher' ? 'selected' : '' }}>Malaka oshirish kurslarini yaratmoqchiman</option>
                <option value="student" {{ old('roll', 'student') === 'student' ? 'selected' : '' }}>Malaka oshirish kurslarida o'qimoqchiman</option>
               
            </select>
            <x-input-error :messages="$errors->get('select')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="phone" :value="__('Bog\'lanish uchun telefon raqamingiz')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Parol')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Parolni qaytaring')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __("Oldinroq ro'yxatdan o'tganmisiz?") }}
            </a>

            <x-primary-button class="ml-4">
                {{ __("Ro'yxatdan o'tish") }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
