@props(['sort', 'status'])
<div>
    <div>
        <span>Сортировка по дате:</span>
        <a href="{{ route('report.index', ['sort'=>'desc', 'status' => $status])}}" class="border border-gray-200 rounded-md px-2 py-1 mb-1 hover:bg-slate-400 transition">
            Новые</a>
        <a href="{{ route('report.index', ['sort'=>'asc', 'status' => $status])}}" class="border border-gray-200 rounded-md px-2 py-1 mb-1 hover:bg-slate-400 transition">
            Старые</a>
        <a href="{{ route('report.index') }}" class="border border-gray-200 rounded-md px-2 py-1 mb-1 hover:bg-slate-400 transition">Сброс</a>
    </div>
    <div>
        <p>Фильтрация по статусу заявки</p>
        <ul>
            @foreach ($statuses as $status)
                <li>
                    <a href="{{ route('report.index', ['sort'=>$sort, 'status'=>$status->id]) }}"
                    class="border border-gray-200 rounded-md px-2 py-1 mb-1 w-full block hover:bg-slate-400 transition">
                    {{ $status->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>