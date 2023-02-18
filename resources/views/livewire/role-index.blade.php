<div>

    <table class="w-full">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Permissions</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        @foreach ($roles as $role )
        <tr>
            <td class="border px-4 py-4">{{ $role->name }}</td>
            <td class="border px-4 py-4">
                @foreach ($role->permissions as $permissions)
                <span class="px-2 py-2 bg-blue-400 text-white rounded text-sm">{{ $permissions->name }}</span>
                @endforeach

            <td class="border px-4 py-4 text-center">
                <div class="flex items-center justify-center">
                    <a class="mr-1" href="{{ route('role.edit',$role->id) }}"> @include('components.icons.edit')</a>

                    <form class="ml-1" onsubmit="return confirm('Do you want to delete?')"
                        wire:submit.prevent="roleDelete({{$role->id }})">
                        <button type="submit">@include('components.icons.trash')</button>
                    </form>

                </div>

            </td>
        </tr>
        @endforeach
    </table>
</div>
