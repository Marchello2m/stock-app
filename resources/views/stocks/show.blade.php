<x-app-layout>

    <x-slot name="header" class="bg-dark" >
        <h2 class="font-semibold text-xl text-white leading-tight  bg-dark">
            {{ __('Stock') }}
        </h2>
    </x-slot>

    <div class="py-12  bg-dark">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  ">
            <div class="bg-dark overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 bg-dark  text-white ">

                    <h3>{{$company->getName()}}</h3>
                    <img class="bg-dark text-white" src="{{$company->getLogoUrl()}}" alt="{{$company->getName()}}"/>

                    <ul>
                        @csrf

                        <li>Open: {{$quote->getOpen()}}<button   type="submit" class="btn btn-outline-success" onclick="Buy()">BuY</button>  </li>

                        <li>Current: {{$quote->getCurrent()}}</li>
                        <li>Close: {{$quote->getClose()}} <button class="btn btn-outline-danger" onclick="sellStock()">Sell</button></li>


                    </ul>



                </div>
            </div>
        </div>
    </div>

</x-app-layout>



