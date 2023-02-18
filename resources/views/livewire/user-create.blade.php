<form wire:submit.prevent="submitForm">
    <div class="flex -mx-4 mb-4">


        <div class="flex-1 px-4">
            <label for="name" class="sms-label">Name</label>
            <input type="text" id="name" class="sms-input" wire:model.lazy="name">
            @error('name')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex-1 px-4">
            <label for="email" class="sms-label">Email</label>
            <input type="email" id="email" class="sms-input" wire:model.lazy="email">
            @error('email')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex-1 px-4">
            <label for="password" class="sms-label">Password</label>
            <input type="password" id="password" class="sms-input" wire:model.lazy="password">
            @error('password')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>




        <select wire:model.lazy="role" id="role" class="sms-input">
            <option value="">Select role</option>
            @foreach ($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
        @error('role')
        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
        @enderror
    </div>


    @include('components/wire-loading-btn')
</form>
