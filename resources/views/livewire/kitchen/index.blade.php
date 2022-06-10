<section class="w-screen h-screen overflow-hidden flex flex-col justify-between items-center" wire:poll.750ms>
    <div class="mt-5 w-4/5">
        <div class="w-full h-44 rounded-3xl rounded-b-none bg-gradient-to-r from-red-900 via-red-700 to-red-500 flex justify-center items-center">
            <img src="/../Cocina_Logo.png" alt="">
        </div>
    </div>
    <div class="flex-1 w-4/5 overflow-y-scroll">
        @foreach ($status as $state)
            <div class="w-full rounded-lg rounded-b-none flex justify-center z-20">
                <div class="mt-5 w-2/3 h-80">
                    <div class="w-full h-full rounded-3xl rounded-b-none p-1 bg-gradient-to-br from-red-900 via-red-700 to-red-900">
                        <div class="w-full h-full rounded-3xl rounded-b-none bg-white">
                            <div  class='w-full h-full rounded-b-3xl whitespace-nowrap flex flex-col flex-wrap'>
                                <div class="w-auto h-auto">
                                    <div class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                        <h1 class="font-bold text-xl">
                                            {{$state->orders->first()->table->name}}
                                        </h1>
                                    </div>
                                </div>
                                <div class="w-auto h-auto">
                                    <div class="text-sm w-1/2 float-left px-6 py-4 text-left text-gray-600">
                                        <p class="text-sm">
                                            Ticket {{$state->slug}}
                                        </p>
                                    </div>
                                    <div  class="text-right w-1/2 float-right px-6 py-4 text-gray-600">
                                        <p class="text-sm">
                                            Ticket creado a el {{$state->created_at}}
                                        </p>
                                    </div>
                                </div>
                                <div class="border-b-2 border-gray-700">
                                    <div class="text-center">
                                        <div class="font-bold w-1/4 float-left text-sm uppercase px-6 py-4">
                                            Producto
                                        </div>
                                        <div class="font-bold w-1/4 float-left text-sm uppercase px-6 py-4">
                                            Notas
                                        </div>
                                        <div class="font-bold w-1/4 float-left text-sm uppercase px-6 py-4 text-center">
                                            Actualizar
                                        </div>
                                        <div class="font-bold w-1/4 float-left text-sm uppercase px-6 py-4 text-center">
                                            Estatus
                                        </div>
                                    </div>
                                </div>
                                <div class="divide-y overflow-y-scroll flex-1 z-10">
                                    @foreach ($items as $item)
                                        @if($item->state_id < 4)
                                            <div class="bg-gray-300 h-20 flex items-center">
                                                <div class="px-6 py-1 w-1/4 float-left">
                                                    {{$item->saucer->name}}
                                                </div>
                                                <div class="px-6 py-1 w-1/4 float-left">
                                                    <input class="h-1" disabled type="text" value="{{$item->note}}">
                                                </div>
                                                <div class="px-6 w-1/4 h-8 float-left flex justify-center items-center">
                                                    <div>
                                                        <img src="/../status_0{{$item->state_id}}.png" alt="" class="w-10 cursor-pointer" wire:click="changeState({{$item->state_id+1}},{{$item->id}})">
                                                    </div>
                                                </div>
                                                <div class="px-6 py-1 w-1/4 float-left" wire:loading.remove wire:target="changeState">
                                                    {{$item->state->name}}
                                                </div>
                                                <div class="px-6 py-1 w-1/4 float-left" wire:loading wire:target="changeState">
                                                    Cargando...
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="w-4/5">
        <div class="w-full h-20 bg-gradient-to-r from-red-900 via-red-700 to-red-500 flex justify-center items-center">
        </div>
    </div>
</section>
