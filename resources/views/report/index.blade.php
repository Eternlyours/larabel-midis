<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <a href="{{ route('reports.create') }}">Create report</a>
        <h1>Reports</h1>
        <div>
            <span>Sort by date</span>
            <a href="{{ route('report.index', ['sort'=>'desc', 'status' => $status])}}">New</a>
            <a href="{{ route('report.index', ['sort'=>'asc', 'status' => $status])}}">Old</a>
            <a href="{{ route('report.index') }}">Reset filter and sort</a>
        </div>
    
    <div>
        <span>
            Filter by status
        </span>
        <ul>
            @foreach ($statuses as $status)
                <li>
                    <a href="{{ route('report.index', ['sort'=>$sort, 'status'=>$status->id]) }}">
                        {{ $status->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <hr>
    @foreach ($reports as $report )
        <div>
            <strong>
                <a href="{{ route('reports.show', $report->id) }}">Show report</a>
            </strong>
            <h2>{{$report->number}}</h2>    
            <p>
                {{ $report->description }}
            </p>
            <strong>{{ $report->status->name }}</strong>
            <br>
            <strong>Author: {{ $report->user->name }} {{ $report->user->middlename }}</strong>
            <form action="{{ route('reports.delete', $report->id) }}" method="post">
                @method('delete')
                @csrf
                <input type="submit" value="Delete">
            </form>
        </div>
        <div>
        </div>
        <hr>
    @endforeach
    {{ $reports->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>





