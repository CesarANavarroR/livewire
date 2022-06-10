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
    <img class="w-96 h-36 rounded-lg mb-4 cursor-pointer" src="{{Storage::url($saucer->image_url)}}" alt="" x-on:click="show = true">
                
    
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
    class="jetstream-modal fixed inset-0 overflow-y-auto 2xl:px-4 2xl:py-6 sm:px-0 z-50"
    style="display: none;">
    
    <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-100"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <div x-show="show" class="2xl:mt-20 bg-white rounded-3xl overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-2xl sm:mx-auto"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    <div class="w-full h-full rounded-3xl p-1 bg-gradient-to-br from-red-900 via-red-700 to-red-900">
                        <div class="w-full h-full rounded-3xl bg-white">
                            <div class="h-0 flex1 flex justify-end mx-4 mb-10">
                                <button type="button" x-on:click="show = false">
                                    <span class="text-4xl">&times;</span>
                                </button>
                            </div>
                            <div class="flex justify-around items-center">
                                <div class="w-20">
                                    <button wire:click="decrement()">
                                        <img src="https://firebasestorage.googleapis.com/v0/b/restaurante-729c6.appspot.com/o/DineIn%2FMenu%2FAppRestaurante_RecuadroMen%C3%BADescripci%C3%B3n_FlechaIZQ.png?alt=media&token=a07b40d1-31be-4528-a1f9-78855b57e555">
                                    </button>  
                                </div>
                                <div class="w-full">
                                    <div class="flex justify-center items-center">
                                        <img src="{{Storage::url($saucers[$index]->image_url)}}" class="h-52 rounded-lg">
                                    </div>
                                    <div class="form-group description">
                                        <p class="font-bold">Nombre:</p> 
                                        <p>{{$saucers[$index]->name}}</p>
                                       
                                        <p class="font-bold">Descripción:</p>
                                        <p class="text-sm 2xl:text-base">{{$saucers[$index]->description}}</p>
                                        <p class="font-bold">Precio: </p>
                                        <p>{{$saucers[$index]->price}}</p>
                                        <p class="font-bold">Notas: </p>
                                        <textarea class="w-full border-gray-400 rounded-lg" wire:model="note"></textarea>
                                        <img class="mx-auto mt-4 mb-6 cursor-pointer" src="https://firebasestorage.googleapis.com/v0/b/restaurante-729c6.appspot.com/o/DineIn%2FMenu%2FAppRestaurante_RecuadroMen%C3%BADescripci%C3%B3n_Agregar.png?alt=media&token=347e9beb-8d81-421a-a0c9-fc27b9b0992b" wire:click="save({{$saucers[$index]->id}})" x-on:click="show = false">
                                    </div>
                                    
                                </div>

                                <div class="w-20">
                                    <button wire:click="increment()">
                                        <img src="https://firebasestorage.googleapis.com/v0/b/restaurante-729c6.appspot.com/o/DineIn%2FMenu%2FAppRestaurante_RecuadroMen%C3%BADescripci%C3%B3n_FlechaDER.png?alt=media&token=c4a0d4d1-67ea-4b7e-bd5a-a7eabba0347c">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <script>
            
        </script>
</div>
