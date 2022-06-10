<div x-data="{
    show: false,
    focusables() {
        // All focusable element types...
        let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'

        return [...$el.querySelectorAll(selector)]
            // All non-disabled elements...
            .filter(el => ! el.hasAttribute('disabled'))
    },
    firstFocusable() { return this.focusables()[0] },
    lastFocusable() { return this.focusables().slice(-1)[0] },
    nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
    prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
    nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
    prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 },
}">
    <button class="text-gray-400 ml-2 2xl:ml-40" x-on:click="show = true"><--Regresar</button>

    <div
    x-init="$watch('show', value => {
        if (value) {
            document.body.classList.add('overflow-y-hidden');
        } else {
            document.body.classList.remove('overflow-y-hidden');
        }
    })"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
    x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
    x-show="show"
    id=""
    class="jetstream-modal fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
    style="display: none;">
    
    <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-100"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <div x-show="show" class="mt-20 bg-white rounded-3xl overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-sm sm:mx-auto"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    <div class="w-full h-full rounded-3xl p-1 bg-gradient-to-br from-red-900 via-red-700 to-red-900">
                        <div class="w-full h-full rounded-3xl bg-white">
                            <div class="h-0 flex1 flex justify-end mx-4">
                                <button type="button" x-on:click="show = false">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="flex flex-col justify-center items-center mb-4">
                                <img class="w-28" src="https://firebasestorage.googleapis.com/v0/b/restaurante-729c6.appspot.com/o/DineIn%2FMenu%2FAppRestaurante_Advertencia.png?alt=media&token=fa3cdbff-4ba4-4458-9e3c-44c234ec91a6" class="advertencia-carta">
                                <p class="font-bold">¿Deseas salir del Menú?</p>
                                <p>No se guardaran los cambios.</p>
                            </div>
                            <div class="pb-6 flex justify-around">
                                <button type="button" class="py-1 px-2 bg-red-500 rounded-lg text-white" x-on:click="show = false">Cancelar</button>
                                <a href="{{route('menu.welcome',['table'=>$table])}}">
                                    <button type="submit" class="py-1 px-2 bg-green-500 rounded-lg text-white">Aceptar</button>
                                </a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
</div>