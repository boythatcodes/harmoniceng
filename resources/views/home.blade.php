@extends('layouts.new_app')

@section('content')
<div class="grid  mt-2 md:grid-cols-2 grid-cols-1 gap-6">
    <a href="/projects" class="stats shadow bg-base-200 hover:bg-base-300">
        <div class="stat">
            <div class="stat-figure  text-primary"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125"></path>
                </svg></div>
            <div class="stat-title ">Total Projects</div>
            <div class="stat-value  text-primary">{{$project_count}}</div>
            <div class="stat-desc  text-gray-400">Need More Info For Overview</div>
        </div>
    </a>
    <a href="/users" class="stats shadow  bg-base-200 hover:bg-base-300">
        <div class="stat">
            <div class="stat-figure  text-primary"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"></path>
                </svg></div>
            <div class="stat-title ">Total Users</div>
            <div class="stat-value  text-primary">{{$user_count}}</div>
            <div class="stat-desc  font-bold text-gray-500">Need More Info For Overview</div>
        </div>
    </a>
    <a href="/inqueries" class="stats shadow  bg-base-200 hover:bg-base-300">
        <div class="stat">
            <div class="stat-figure  text-primary"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                </svg>
            </div>
            <div class="stat-title ">New Inqueries</div>
            <div class="stat-value  text-primary">{{$inqueries_count}}</div>
            <div class="stat-desc  font-bold text-rose-500">Check Out Inqueries</div>
        </div>
    </a>
</div>

<script>
    function refresh() {
        location.reload();
    }
</script>
@endsection