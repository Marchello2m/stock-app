<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Stocks
        </h2>
    </x-slot>

    <div class="py-12">

        <form action="/search" method="post">



            <label class="m-1 content-center" for="company">Company name</label><br>
            <input class="m-1 content-center" type="text" id="company" name="company">
            <button type="submit" class="btn btn-outline-success">Search</button>

        </form>
        @csrf
                @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->getName() }}</td>
                        <td>{{ $company->getSymbol() }}</td>


                        @endforeach
                    </tr>


    </div>

</x-app-layout>
