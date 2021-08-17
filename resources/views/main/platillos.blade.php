<x-app-layout class="bg-yellow-700" x-data="{open: false}">
    <x-navbar/>
    <x-slide />

    @livewire('modal')
    <div class=" container mx-auto my-20 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 ">

        <x-card />
        <x-card />
        <x-card />
        <x-card class="reveal" />
        <x-card class="reveal" />
        <x-card class="reveal" />
        <x-card class="reveal" />
        <x-card class="reveal" />
        <x-card class="reveal" />
        <x-card class="reveal" />
        <x-card class="reveal" />
        <x-card class="reveal" />
        <x-card class="reveal" />
        <x-card class="reveal" />
        <x-card class="reveal" />
    </div>
    <x-footer/>



</x-app-layout>
