<x-app-layout>
    @livewire('menu.mi-orden', ['details' => $details,'table'=>$table,'order'=>$order], key($details->id))
</x-app-layout>