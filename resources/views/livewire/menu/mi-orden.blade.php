<section class="w-screen h-screen 2xl:overflow-hidden" wire:poll.500ms>
    <div class="2xl:mx-40 2xl:mt-10 mb-4 2xl:mb-14">
        <div class="w-full 2xl:h-44 2xl:rounded-3xl rounded-b-none bg-gradient-to-r from-red-900 via-red-700 to-red-500 flex justify-center items-center">
            <img src="/../Logo_MiOrden.png" class="p-4 w-40 2xl:w-auto">
        </div>
        <div class="absolute">
            <a href="javascript: history.go(-1)"><i class="fas fa-undo-alt"></i></a>
        </div>
    </div>
    
    <div class="mx-4 2xl:mx-40">
        <div class="w-full h-3/4 2xl:h-2/4 rounded-lg rounded-b-none overflow-y-scroll">
            @if ($details->orders->count()>0)
                @foreach ( $details->orders as $order )
                <div class='mx-auto mb-3 min-w-4xl w-full whitespace-nowrap rounded-lg rounded-b-none divide-y divide-gray-600 overflow-hidden'>
                    <div class="block">
                        <div class="bg-gray-300 relative">
                            <div class="font-semibold text-sm uppercase px-6 py-4">
                                <div class="text-center">
                                    Cliete {{$order->name}}
                                </div>
                                <div class="text-right">
                                    <a href="{{route('menu.category.index',['table'=>$table,'details'=>$details,'orders'=>['actual'=>$order->name,'total'=>$order->name]])}}" class="bg-green-700 text-white py-2 px-2 rounded-lg"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center" style="height: 3.2rem;">
                            <div class="bg-gray-400 font-semibold float-left w-1/12 h-full text-xs 2xl:text-sm text-center py-4">
                                -
                            </div>
                            <div class="bg-gray-400 font-semibold float-left w-6/12 h-full text-xs 2xl:text-sm uppercase px-1 2xl:px-6 py-4">
                                Producto
                            </div>
                            <div class="bg-gray-400 font-semibold float-left w-5/12 h-full text-xs 2xl:text-sm uppercase px-1 2xl:px-6 py-4">
                                Precio
                            </div>
                        </div>
                    </div>
                    <div id="tbody" class="divide-y divide-gray-200">
                        @foreach ( $order->items as $item)
                            <div style="height: 3.2rem;">
                                <div class="float-left w-1/12 py-4 text-center text-xs 2xl:text-sm">
                                    @if($item->state_id < 2)
                                        <a wire:click="delete({{$item->id}},{{$order->id}})" class="font-bold px-1 cursor-pointer text-red-600 hover:text-red-500"><i class="fas fa-minus"></i></a>
                                    @elseif($item->state_id > 1 && $item->state_id < 4)
                                        <a class="font-bold px-1 cursor-pointer text-yellow-600"><i class="fas fa-clock"></i></a>
                                    @else
                                        <a class="font-bold px-1 cursor-pointer text-green-600"><i class="fas fa-check"></i></a>
                                    @endif
                                </div>
                                <div class="float-left w-6/12 h-auto text-xs 2xl:text-sm" style="min-height: 3.2rem;">
                                    <div class="w-full h-1/2 px-2 2xl:px-6 pt-2 bg-gray-300">
                                        <p>{{$item->saucer->name}}</p>
                                    </div>
                                    <div class="w-full h-1/2 2xl:px-6 bg-gray-300">
                                        <p>{{$item->note}}</p>
                                    </div>
                                </div>
                                <div class="float-left w-5/12 h-auto text-xs 2xl:text-sm" style="min-height: 3.2rem;">
                                    <div class="w-full h-1/2 px-2 2xl:px-6 pt-2 text-right">
                                        {{$item->saucer->price}}
                                    </div>
                                    <div class="hidden">
                                        @if(!isset($subtotal[$order->name]))
                                            {{$subtotal[$order->name] =""}}
                                        @endisset)
                                        {{$subtotal[$order->name] = (float)$subtotal[$order->name] + (float)$item->saucer->price}}
                                    </div>
                                    <div class="w-full h-1/2 px-2 2xl:px-6 text-left">
                                        <p>{{$item->state->name}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div id="tfoot">
                        <div>
                            <div>
                                <p class="mx-10 py-4 font-bold">{{'Subtotal: '.$subtotal[$order->name]}}</p>
                                <div class="hidden">
                                    {{$total = (float)$total + (float)$subtotal[$order->name]}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="w-full h-full flex justify-center items-center">
                    <p>No hay ordens aun...</p>
                </div>
            @endif
        </div>
        <div class="">
            @if ($details->orders->count()>0)
                <p class="font-bold text-xl mb-4">
                    {{'Total a Pagar: '.$total}}
                </p>
                @livewire('menu.confirmation',['table'=>$table,'details'=>$details,'order'=>$order])
            @else
                <div class="w-full h-full flex justify-center items-center">
                    <a href="javascript: history.go(-1)" class="bg-red-600 text-white py-1 px-3 rounded-2xl mt-10">Agrega orden</a>
                </div>
            @endif
        </div>
    </div>
    <div class="absolute top-10 right-5" wire:loading wire:target="delete">
        <div class="w-screen space-x-2 bg-red-50 rounded flex items-start text-red-600 my-4 mx-auto max-w-2xl shadow-lg">
            <div class="w-1 self-stretch bg-red-800"></div>
            <div class="flex  space-x-2 p-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 pt-1" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.5 5h3l-1 10h-1l-1-10zm1.5 14.25c-.69 0-1.25-.56-1.25-1.25s.56-1.25 1.25-1.25 1.25.56 1.25 1.25-.56 1.25-1.25 1.25z"/></svg>
                <h3 class="text-red-800 tracking-wider flex-1">
                    Eliminado...
                </h3>
            </div>
        </div>
    </div>
</section>
