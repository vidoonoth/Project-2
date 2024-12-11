@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-slate-50 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
