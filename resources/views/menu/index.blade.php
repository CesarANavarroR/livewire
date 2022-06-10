<x-app-layout>
    <div class="w-screen h-screen flex justify-center items-center" style="background-image: url('{{asset('Restaurante_BG.png')}}')">
        <div class="container w-full h-full mb-0 md:w-96 md:h-auto md:mb-44 lg:w-96 lg:h-auto lg:mb-44 xl:w-96 xl:h-auto xl:mb-44">
            <div class="w-full h-full rounded-3xl p-1 bg-gradient-to-br from-red-900 via-red-700 to-red-900">
                <div class="w-full h-full rounded-3xl bg-white">
                    <img class="mx-auto py-4 mb-4" src="{{asset('LogoLogin.png')}}" alt="logo">
                    <div class="text-center pb-20">
                        <h4 class="text-lg font-bold">!Bienvenidos¡</h4>
                        <p class="mb-6">Favor de ingresar el numero de clientes</p>
                        <form action="{{route('menu.category.index',$table)}}" method="HEAD">
                            <input class="rounded-lg border-2 border-solid border-gray-300 block mx-auto mb-6 text-center" type="number" min="1" name="order">
                            <button type="submit" class="bg-red-500 py-2 px-6 rounded-lg text-white" align="center">Aceptar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>