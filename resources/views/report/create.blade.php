<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
        >
            {{ __("Dashboard") }}
        </h2>
    </x-slot>
    @include('layouts.flash-messages')
    <div class="container mx-auto">
        <a href="{{ route('report.index') }}">Index</a>
    <h1>Create Reports</h1>
    <form action="{{ route('reports.store') }}" method="post">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color: red">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <label for="number">Number</label>
        <input type="text" name="number" id="number" required>
        <br>
        <label for="descriotion">Desc</label>
        <textarea name="description" id="description" required></textarea>
        <br>
        <input type="submit" value="Create">
    </form>
    </div>
    
</x-app-layout>