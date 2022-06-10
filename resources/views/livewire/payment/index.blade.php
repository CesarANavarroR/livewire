<section class="w-screen h-screen bg-auto bg-no-repeat bg-center flex justify-center items-center" style="background-image: url('/../Pago_BG.jpg')" wire:poll.750ms>
    <div class="mb-10 w-4/5 bg-red-600 text-white rounded-xl h-auto">
        <div id="header" class="w-full py-5 px-5 text-center">
            <h1 class="font-bold text-3xl">Caja</h1>
        </div>
        <div class="mx-5 mb-5 flex justify-start items-center">
            <input type="text" wire:model="search" class="rounded-md bg-gray-100" placeholder="Search">
        </div>
        <div class="w-full h-auto">
            <div class="mx-5">
                <div class="w-full border-gray-800 border-2 bg-white text-black overflow-y-scroll mb-5" style="height: 70vh">
                    @foreach ( $details as $detail)
                        <div class="mx-5 border-gray-600 border-2 rounded-lg my-5">
                            <div class="w-full">
                                <div class="w-full h-10 bg-red-400 text-white flex justify-center items-center">
                                    <p class="font-bold">{{$detail->orders->first()->table->name}}</p>
                                </div>
                            </div>
                            @foreach ($detail->orders as $order)

                                @if ($order->items->first()->state_id<5)                                

                                    <div class="w-full">
                                        <div class="border-b-2 border-gray-400 bg-red-600">
                                            <div class="mx-5 h-5 text-white font-semibold flex items-center">
                                                <input id="{{$order->id}}" type="checkbox" class="mx-2" onclick="precio(this)" checked>
                                                <p>Cliente {{$order->name}}</p>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="w-full h-6 bg-red-400 text-white border-b-2 border-gray-400 text-center">
                                                <div class="w-1/2 float-left font-semibold">
                                                    Producto
                                                </div>
                                                <div class="w-1/2 float-left font-semibold">
                                                    Precio
                                                </div>
                                            </div>
                                            <div>

                                            @foreach ($order->items as $item)
                                
                                                    <div class="w-full h-6 text-center">
                                                        <div class="w-1/2 float-left">
                                                            {{$item->saucer->name}}
                                                        </div>
                                                        <div class="w-1/2 float-left">
                                                            {{$item->saucer->price}}
                                                        </div>
                                                        <div class="hidden">
                                                            @if(!isset($subtotal[$detail->slug]))
                                                                {{$subtotal[$detail->slug] =""}}
                                                            @endisset
                                                            {{$subtotal[$detail->slug] = (float)$subtotal[$detail->slug] + (float)$item->saucer->price}}
                                                        </div>
                                                    </div>
                                                
                                            @endforeach

                                            </div>
                                        </div>
                                    </div>
                                    
                                @endif

                            @endforeach
                            <div wire:ignore>
                                <div class="w-full h-6  border-t-2 border-gray-400 text-center">
                                    <div class="w-1/2 float-left font-semibold">
                                        Subtotal
                                    </div>
                                    <div id="sub{{$detail->id}}" class="w-1/2 float-left font-semibold">
                                        {{$subtotal[$detail->slug]}}
                                    </div>
                                    <div class="hidden">
                                        @if(!isset($total[$detail->slug]))
                                            {{$total[$detail->slug] =""}}
                                        @endisset
                                        {{$total[$detail->slug] = (float)$total[$detail->slug] + (float)$subtotal[$detail->slug]}}
                                    </div>
                                </div>
                                <div class="w-full h-6  border-t-2 border-gray-200  text-center">
                                    <div class="w-1/2 float-left font-semibold">
                                        Propina
                                    </div>
                                    <div id="propina{{$detail->id}}" class="w-1/2 float-left font-semibold">
                                        <input type="text" class="w-20 h-5 rounded-md text-center" placeholder="monto" onchange="precio(this.parentNode.parentNode.parentNode.parentNode.children[1].children[0].children[0].children[0])">
                                    </div>
                                </div>
                                <div class="w-full h-6 border-t-2 border-gray-200  text-center">
                                    <div class="w-1/2 float-left font-semibold">
                                        Total
                                    </div>
                                    <div id="total{{$detail->id}}" class="w-1/2 float-left font-semibold">
                                        {{$total[$detail->slug]}}
                                    </div>
                                </div>
                                <div class="w-full h-16 bg-red-400 border-t-2 border-gray-200 text-white text-center">
                                    <form action="{{route('admin.payment.store')}}" method="POST">
                                        @csrf
                                        <input id="pago{{$detail->id}}" type="hidden" name="orders[]" value="{{$detail->orders}}">
                                        <input id="propina{{$detail->id}}" type="hidden" name="douceur" value="">
                                        <button type="submit" class="bg-red-500 py-1 px-2 rounded-md text-white my-4">
                                            Pagar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
