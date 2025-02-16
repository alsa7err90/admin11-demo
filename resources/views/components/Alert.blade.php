@php
    // تعريف أنماط التنبيه بناءً على نوعه
    $alertClasses = [
        'success' => 'bg-green-100 border-green-500 text-green-800',
        'error'   => 'bg-red-100 border-red-500 text-red-800',
        'warning' => 'bg-yellow-100 border-yellow-500 text-yellow-800',
        'info'    => 'bg-blue-100 border-blue-500 text-blue-800',
    ];
    $alertClass = $alertClasses[$type] ?? $alertClasses['info'];
@endphp

<div class="rounded-md p-4 border-l-4 {{ $alertClass }}">
    {{ $slot }}
</div>
