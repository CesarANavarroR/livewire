<x-app-layout>
    <section class="w-screen h-screen">
        <div class="w-full 2xl:h-32 flex justify-between items-center">
            @livewire('menu.back',['table'=>$table],key($table->id))
            <a href="{{route('menu.miorden.index',['table'=>$table,'details'=>$details,'order'=>$orders['total']])}}"><img class="cursor-pointer" src="{{asset('MiOrden.png')}}" alt="logo"></a>
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
                <p class="text-white font-bold text-4xl">Categorias</p>
            </div>
            <div class="text-center 2xl:text-xl  text-gray-600">
                <p>Selecciona la imagen de la categoria para ver los alimientos o bebidas.</p>
                <p>Puedes precionar el boton de "Mi Orden" para revisar el pedido.</p>
            </div>
        </div>
        <div class="w-auto h-auto mx-20 flex flex-wrap justify-center">
            @foreach ( $Typesaucer as $category )
            <div class="w-56 h-48 text-center mx-4">
                <a href="{{route('menu.category.show',['id'=>$category->id,'orders'=>$orders,'details'=>$details,'table'=>$table])}}">
                    <img class="w-full h-3/4 rounded-lg mb-4 cursor-pointer" src="{{Storage::url($category->image_url)}}" alt=""></a>
                    <!-- <img class="w-full h-3/4 rounded-lg mb-4 cursor-pointer" src="{{url('public/storage', ['products'=> $category->image_url])}}" alt=""></a> -->
                <p class="font-bold">{{$category->name}}</p>
            </div>
            @endforeach
        </div>
    </section>
</x-app-layout>