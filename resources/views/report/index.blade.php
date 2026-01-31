<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
        >
            {{ __("Dashboard") }}
        </h2>
    </x-slot>

    <div class="container mx-auto max-sm max-md max-lg max-xl max-2xl">
        <div class="grid grid-cols-4 grid-flow-row-dense md:grid-rows-2">
            <div>
                <div class="py-12 md:col-span-auto">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div
                            class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <x-filter :sort=$sort :status=$status>
                                
                            </x-filter>                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="xl:col-span-3 md:col-span-2">
                <div class="grid grid-cols-2 max-md:grid-cols-1">
                    @foreach ($reports as $report )
                        <div class="report m-2 p-2 border border-gray-400 rounded-md">
                                <strong>
                                    <a
                                        href="{{ route('reports.show', $report->id) }}"
                                        >Show report</a
                                    >
                                </strong>
                                <h2>{{$report->number}}</h2>
                                <p>
                                    {{ $report->description }}
                                </p>
                                <strong>{{ $report->status->name }}</strong>
                                <x-status :type="$report->status->id">
                                    {{ $report->status->name }}
                                </x-status>
                                <br />
                                <strong
                                    >Author: {{ $report->user->name }}
                                    {{ $report->user->middlename }}</strong
                                >
                                <p>
                                    {{\Carbon\Carbon::parse($report->created_at)->translatedFormat('j F Y h:i')}}
                                </p>
                                <form
                                    action="{{ route('reports.delete', $report->id) }}"
                                    method="post"
                                >
                                    @method('delete') @csrf
                                    <input type="submit" value="Delete" />
                                </form>
                        </div>
                    @endforeach
                </div>
                {{ $reports->links() }}

            </div>
        </div>
    </div>
</x-app-layout>
