<div>

    <table class="w-full">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Email</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td class="border px-4 py-2">{{ $user->name }}</td>
            <td class="border px-4 py-2">{{ $user->email }}</td>
            <td class="border px-4 py-2 text-center">
                <div class="flex items-center justify-center">
                    <a href="{{ route('user.edit', $user->id) }}">@include('components.icons.edit')</a>
                    <a class="px-2" href="{{ route('user.show', $user->id) }}">@include('components.icons.eye')</a>

                    <form onsubmit="return confirm('Do you want to delete?')"
                        wire:submit.prevent="leadDelete({{$user->id }})">
                        <button type="submit">@include('components.icons.trash')</button>
                    </form>

                </div>
            </td>
        </tr>
        @endforeach
    </table>

</div>
