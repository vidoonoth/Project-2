<button {{ $attributes->merge(['type' => 'submit', 'class' => 'font-semibold bg-slate-50 hover:bg-slate-900 dark:bg-gray-200 border border-transparent rounded-[15px] text-[16px] h-10 w-[fit] px-[7px] text-center text-blue-400 dark:text-gray-800 uppercase dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300  focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition hover:text-slate-50 duration-150']) }}>
    {{ $slot }}
</button>
