<x-app-layout>
    <section class="w-screen h-screen">
        <div class="w-full 2xl:h-32 flex justify-between items-center">
            <a href="{{route('menu.category.index',['table'=>$table,'details'=>$details,'orders'=>['actual'=>($orders['actual']),'total'=>$orders['total']]])}}" class="text-gray-400 ml-2 2xl:ml-40"><--Regresar</a>
            <a href="{{route('menu.miorden.index',['table'=>$table,'details'=>$details,'order'=>$orders['total']])}}"><img src="{{asset('MiOrden.png')}}" alt=""></a>
            <div class="mr-2 2xl:mr-40 flex flex-col justify-end h-24">
                @if($orders['actual']!=$orders['total'])
                <a href="{{route('menu.category.index',['table'=>$table,'details'=>$details,'orders'=>['actual'=>($orders['actual']+1),'total'=>$orders['total']]])}}" class="text-gray-400 mb-3" >Continuar--></a>
                @else
                <a href="{{route('menu.miorden.index',['table'=>$table,'details'=>$details,'order'=>$orders['total']])}}" class="text-gray-400 mb-3" >Continuar--></a>
                @endif
                <p class="font-bold">{{'Cliente '.$orders['actual'].' de '.$orders['total']}}</p>
            </div>
            
        </div>
        <div class="w-full 2xl:h-40 mb-4">
            <div class=" w-full h-1/2 mt-1 mb-2 bg-gradient-to-r from-red-900 via-red-700 to-red-500 text-center flex justify-center items-center">
                <p class="text-white font-bold text-4xl">{{$category->name}}</p>
            </div>
            <div class="text-center 2xl:text-xl  text-gray-600">
                <p>Selecciona la opcion deseada para ver su descripcion y preciona el boton de <strong class="font-bold">(+)</strong> para agregar a su orden.</p>
                <p>En "Mi Orden" puedes precionar el boton <strong class="font-bold">(-)</strong> para quitar la opcion seleccionada.</p>
            </div>
        </div>
        <div class="w-auto h-auto mx-20 flex flex-wrap justify-center">
            @foreach ( $saucers as $saucer )
            <div class="w-56 h-60 2xl:h-80 text-center mx-4">
                @livewire('menu.saucer-description',['table'=>$table,'index'=>$loop->index,'limit'=>$loop->count,'saucer'=>$saucer,'saucers'=>$saucers, 'details'=>$details,'order'=>$orders['actual']],key($table->id))
                <p class="font-bold">{{$saucer->name}}</p>
                <p>{{$loop->count}}</p>
                <p class="">{{$saucer->price}}</p>
            </div>
            @endforeach
        </div>

    </section>

</x-app-layout>