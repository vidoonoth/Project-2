@props(['options' => [], 'disabled' => false])

<select @disabled($disabled) {{ $attributes->merge(['class' => 'h-12 border border-slate-400 focus:border-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300  dark:focus:border-indigo-600 dark:focus:ring-indigo-600 text-sm rounded-xl shadow-sm']) }}>
    @foreach($options as $value => $label)
        <option value="{{ $value }}">{{ $label }}</option>
    @endforeach
</select>
