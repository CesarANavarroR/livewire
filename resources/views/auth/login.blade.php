<x-guest-layout>
<body>
    <div class="w-screen h-screen flex justify-center items-center" style="background-image: url('/../Background.jpg')"> 
        <div class="container w-full h-full mb-0 md:w-96 md:h-auto md:mb-44 lg:w-96 lg:h-auto lg:mb-44 xl:w-96 xl:h-auto xl:mb-44">
            <div class="w-full h-full rounded-3xl p-1 bg-gradient-to-br from-red-900 via-red-700 to-red-900">
                <div class="w-full h-full rounded-3xl bg-white">
                    <a href="/" class="badge rounded mx-auto d-block">
                        <img src="LogoLogin.png" alt="Logo" class="pb-8 pt-10 mx-auto">
                    </a>
                        
                    <x-jet-validation-errors class="mb-4" />

                    @if (session('status'))
                        <div class="pb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="p-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-4">
                                <x-jet-label for="email" value="{{ __('Email') }}" />

                                <div class="">
                                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                </div>
                            </div>

                            <div class="mb-4">
                                <x-jet-label for="password" value="{{ __('Password') }}" />

                                <div class="">
                                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                                </div>
                            </div>

                            <div class="block mt-4">
                                <label for="remember_me" class="flex items-center recuerd">
                                    <x-jet-checkbox id="remember_me" name="remember" />
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>
                            <div class="flex justify-center items-center">
                                <button type="submit" class="py-2 px-4 rounded bg-red-600 hover:bg-red-500 text-white">
                                    <font size=3>{{ __('Login') }}</font>
                                </button>
                            </div>
                            <div class="flex items-center justify-center mt-4 mb-4">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</x-guest-layout>

<style>
    .imagen{
        top: 0%;
        width: 100%;
        height: 100%;
        position: fixed;
        z-index: -2;
    }

    .card {
        top:4 rem;
        position: relative;
        border: 4px solid transparent;
        border-radius: 16px;
        background: white;
        background-clip: padding-box;
        padding: 0px;
    }

    .card::after{
        position: absolute;
        top: -9px; bottom: -9px;
        left: -9px; right: -9px;
        background: linear-gradient(45deg, #3a4ed5 -41%, black 50%, #3a4ed5 122%);
        content: '';
        z-index: -1;
        border-radius: 16px;
    }

    @media screen and (max-width: 899px){  
        .card {
        top: 2rem;
        left: -6%;
        width: 21rem; 
        height: auto;
        position: relative;
        border: 4px solid transparent;
        border-radius: 16px;
        background: white;
        background-clip: padding-box;
        padding: 0px;
        }

    }

    @media screen and (min-width: 900px){
        .card {
        top: 4rem; 
        width: 21rem; 
        height: auto;
        position: relative;
        border: 4px solid transparent;
        border-radius: 16px;
        background: white;
        background-clip: padding-box;
        padding: 0px;
        }

        .label-mail {
            width: 18rem;
        }

        .label-password {
            width: 18rem;
        }

        .recuerd {
            margin-left: 1rem;
        }

        .question {
            margin-left: -17rem;
        }

        .login {
            margin-right: 1rem;
        }

        .border {
            border-width: 1px;
            border-color: rgb(0 0 0);
            border-radius: 3px;
            padding: 5px;
        }
    }
</style>
