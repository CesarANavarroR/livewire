<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @livewireStyles
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        {{$slot}}
        @stack('modals')
        @livewireScripts
        <script>
            function precio(c){
                var subtotal = c.parentNode.parentNode.parentNode.parentNode.lastElementChild.children[0].children[1];
                var propina = c.parentNode.parentNode.parentNode.parentNode.lastElementChild.children[1].children[1].children[0];
                var total = c.parentNode.parentNode.parentNode.parentNode.lastElementChild.children[2].children[1];
                var clients = c.parentNode.parentNode.parentElement.parentElement.children.length - 2;
                var pago = c.parentNode.parentNode.parentNode.parentNode.lastElementChild.lastElementChild.children[0].children[1];
                var addPropina = c.parentNode.parentNode.parentNode.parentNode.lastElementChild.lastElementChild.children[0].children[2];
                var intSubtotal = 0.00;
                var intTotal = 0.00;
                var orders = [];
                for(i=0;i<clients;i++){
                    if(c.parentNode.parentNode.parentNode.parentNode.children[(i+1)].children[0].children[0].children[0].checked){
                        orders.push({"id":c.parentNode.parentNode.parentNode.parentNode.children[(i+1)].children[0].children[0].children[0].id});
                        var products = c.parentNode.parentNode.parentNode.parentNode.children[(i+1)].children[1].children[1].children.length;
                        for(j=0;j<products;j++){
                            intSubtotal+=parseFloat(c.parentNode.parentNode.parentNode.parentNode.children[(i+1)].children[1].children[1].children[j].children[1].innerHTML);
                        }
                    }
                }
                subtotal.innerHTML = parseFloat(intSubtotal).toFixed(1);
                if(propina.value != ''){
                    intSubtotal += parseFloat(propina.value);
                }
                total.innerHTML = parseFloat(intSubtotal).toFixed(1);
                pago.value = JSON.stringify(orders);
                addPropina.value = propina.value;
            }
        </script>
    </body>
</html>