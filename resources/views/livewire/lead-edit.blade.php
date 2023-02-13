<div>
    <form wire:submit.prevent="submitForm" class="mb-6">
        <div class="flex -mx-4 mb-4">
            <div class="flex-1 px-4">
                <label for="" class="sms-label">Name</label>
                <input type="text" class="sms-input" wire:model="name">
                @error('name')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex-1 px-4">
                <label for="" class="sms-label">Email</label>
                <input type="email" class="sms-input" wire:model="email">
                @error('email')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex-1 px-4">
                <label for="" class="sms-label">Phone</label>
                <input type="phone" class="sms-input" wire:model="phone">
                @error('phone')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>

        @include('components/wire-loading-btn')
    </form>

    <h3 class="font-bold text-lg">Notes</h3>

    @foreach ($notes as $note)
    <p>{{ $note->description }}</p>
    @endforeach


<form action="">
    <div class="mb-4">
       <textarea wire:model="note" class="sms-input" placeholder="Type note"></textarea>
    </div>

    <button class="sms-btn" wire:click="addNewNote">Save</button>
</form>




</div>
