<div>
    <!-- Success Message -->
    <x-success-message />

    <!-- Session Status -->
    {{-- <x-auth-session-status class="mb-4" :status="session('message')" /> --}}

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <!-- email, phone, message -->
    <form wire:submit.prevent="submitForm">
        @csrf
        <div>
            <x-label for="title" :value="__('Title')" />
            <x-input wire:model="title" class="block mt-1 w-full" type="text" name="title" value="old('title')" />
        </div>

        <div class="mt-4">
            <x-label for="slug" :value="__('Slug')" />
            <x-input wire:model="slug" class="block mt-1 w-full" type="text" name="slug" value="old('slug')" />
        </div>

        <div class="mt-4">
            <label for="message" class="sr-only">Message</label>
            <div class="relative rounded-md shadow-sm">
                <textarea wire:model="message" name="message" rows="4" class="@error('message') border border-red-500 @enderror rounded-md shadow-md border-gray-300
                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-input block w-full py-3 px-4 placeholder-gray-500
                        transition ease-in-out duration-150" placeholder="Message">{{ old('message') }}</textarea>
            </div>
            @error('message')
            <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <x-button class="ml-3 mt-4">
            {{ __('Save') }}
        </x-button>
    </form>
</div>
