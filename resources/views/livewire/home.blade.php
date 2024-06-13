<div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- @if (session()->has('message'))
        <div class="text-2xl card outline-1 outline-green-600">
            {{ session('message') }}
        </div>
    @endif --}}
    <form method="post" wire:submit="save">
        {{ $this->form }}
        <button type="submit"
            class=" mt-2 w-full bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
    </form>
</div>
