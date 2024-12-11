@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'h-12 border border-slate-400 focus:border-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-indigo-600 focus:ring-blue-500 dark:focus:ring-blue-500 text-sm rounded-xl shadow-sm']) }}>
