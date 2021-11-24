
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
                    <form style="padding-bottom: 20px">
                        <uL>
                            <li>Company Symbols:AAPL</li>
                            <li>Tipa LOgo</li>
                            <li>Current price:120</li>
                            <li>Price when bought:100</li>
                            <li>Profit:20</li>
                            <li>Lost:</li>

                        </uL>
                    </form>

                    <form action="/" >
                        <label for="symbol">Company Symbols:</label>
                        <input class="text-black" type="text" id="symbol" name="symbol"><br><br>
                        <label for="quantity">Quantity:</label>
                        <input class="text-black" type="text" id="quantity" name="quantity"><br><br>
                        <button   type="submit" class="btn btn-outline-danger"> Sell</button>

                    </form>



                </div>
            </div>
        </div>
    </div>

</x-app-layout>
