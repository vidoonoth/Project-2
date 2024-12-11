<button {{ $attributes->merge(['type' => 'button', 'class' => 'flex justify-center items-center px-4 py-2 bg-blue-400 hover:bg-blue-500 text-slate-50 text-xl hover:text-slate-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-50 font-semibold dark:text-gray-300 uppercase tracking-widest shadow-sm dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
