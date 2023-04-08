<div>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="border px-4 py-2 text-left">Name</th>
                <th class="border px-4 py-2 text-left">Email</th>
                <th class="border px-4 py-2 text-left">Phone</th>
                <th class="border px-4 py-2">Registered</th>
                <th class="border px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leads as $lead)
            <tr>
                <td class="border px-4 py-2">{{ $lead->name }}</td>
                <td class="border px-4 py-2">{{ $lead->email }}</td>
                <td class="border px-4 py-2">{{ $lead->phone }}</td>
                <td class="border px-4 py-2 text-center">{{ date('F j, Y',strtotime($lead->created_at)) }}</td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex items-center justify-around">
                        <a href="{{ route('lead.edit', $lead->id) }}">@include('components.icons.edit')</a>
                        <a href="{{ route('lead.show', $lead->id) }}">@include('components.icons.view')</a>

                        <form onsubmit="return confirm('Do you really want to delete?');" wire:submit.prevent="leadDelete({{ $lead->id }})">
                            <button type="submit">@include('components.icons.trash')</button>
                        </form>

                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

    <div>
        {{ $leads->links() }}
    </div>
</div>
