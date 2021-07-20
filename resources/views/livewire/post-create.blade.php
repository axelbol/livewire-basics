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
            <svg wire:loading wire:target="submitForm" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
            <span>{{ __('Save') }}</span>
        </x-button>
    </form>
</div>
