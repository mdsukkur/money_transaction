<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('register') }}">
        @csrf

            <div class="flex flex-wrap">
                <!-- First Name -->
                <div class="w-full md:w-1/2">
                    <x-label for="first_name" :value="@trans('form.fname')"/>

                    <x-input id="first_name" class="block mt-1" type="text" name="first_name"
                             :value="old('first_name')" required autofocus placeholder="e.g.John"/>
                </div>

                <!-- Last Name -->
                <div class="w-full md:w-1/2">
                    <x-label for="last_name" :value="@trans('form.lname')"/>

                    <x-input id="last_name" class="block mt-1" type="text" name="last_name"
                             :value="old('last_name')"  placeholder="e.g.Doe" required/>
                </div>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="@trans('form.email')"/>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="e.g.c*****@gmail.com" required/>
            </div>

            <!-- Phone Number -->
            <div class="mt-4">
                <x-label for="phone" :value="@trans('form.phone')"/>

                <x-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" placeholder="e.g.01*********" required/>
            </div>

            <!-- Country -->
            <div class="mt-4">
                <x-label for="country" :value="@trans('form.country')"/>

                <select name="country" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="country">
                    @foreach($allCountries as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="@trans('form.password')"/>

                <x-input id="password" class="block mt-1 w-full" type="password"
                         name="password" placeholder="e.g.******************" required autocomplete="new-password"/>

                <p class="text-gray-600 text-xs italic mt-1">Password must have minimum 6 characters.</p>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="@trans('form.con_password')"/>

                <x-input id="password_confirmation" class="block mt-1 w-full"
                         type="password" placeholder="e.g.******************" name="password_confirmation" required/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ trans('lang.already_registered') }}
                </a>

                <x-button class="ml-4">
                    {{ trans('lang.register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
