<div class="flex items-center justify-end w-full">
    <div x-data="window.darkModeSwitcher()" x-init="init" @keydown.window.tab="switchOn = false" class="flex px-2 py-2 space-x-2 place-content-start">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 fill-yellow-300">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
              </svg>
        </div>

        <input x-bind:checked="switchOn" class="hidden" type="checkbox" name="switch" />

        <button
            x-ref="switchButton"
            x-on:click="switchOn = !switchOn; switchTheme()"
            x-bind:class="{'bg-blue-400': switchOn, 'bg-slate-400': !switchOn}"
            class="relative inline-flex h-5 py-0.5 ml-2 focus:outline-none rounded-full w-9"
            type="button"
        >
            <span x-bind:class="switchOn ? 'translate-x-[18px]' : 'translate-x-0.5'" class="h-4 w-4 duration-200 ease-in-out bg-white rounded-full shadow-md"></span>
        </button>

        <label
            x-on:click="$refs.switchButton.click(); $refs.switchButton.focus()"
            x-bind:class="{ 'text-slate-300': switchOn, 'text-slate-700': !switchOn }"
            x-bind:id="$id('switch')"
            class="text-sm select-none"
        >
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 fill-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                </svg>
            </div>
        </label>
    </div>
</div>
