<div>

    <table class="w-full">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Email</th>
            <th class="border px-4 py-2 text-left">Phone</th>
            <th class="border px-4 py-2">Registered</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        @foreach ($leads as $lead )
        <tr>
            <td class="border px-4 py-4">{{ $lead->name }}</td>
            <td class="border px-4 py-4">{{ $lead->email }}</td>
            <td class="border px-4 py-4">{{ $lead->phone }}</td>
            <td class="border px-4 py-4 text-center">{{date('F j, Y', strtotime($lead->created_at)) }}</td>
            <td class="border px-4 py-4 text-center">

                <div class="flex items-center justify-center">
                    <a href="{{ route('lead.edit',$lead->id) }}"> @include('components.icons.edit')</a>
                    <a class="px-2" href="{{ route('lead.show',$lead->id) }}"> @include('components.icons.eye')</a>

                    <form onSubmit="return confirm('Do you want to delete?')"
                        wire:submit.prevent="leadDelete({{$lead->id }})">
                        <button type="submit">@include('components.icons.trast')</button>
                    </form>

                </div>

            </td>
        </tr>
        @endforeach
    </table>

    <div class="mt-4">
        {{ $leads->links() }}
    </div>

</div>
