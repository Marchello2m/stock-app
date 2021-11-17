<x-app-layout>
    <x-slot name="header" class="bg-dark text-white">
        <h2 class="font-semibold text-xl text-white leading-tight thead-dark ">
            Stocks
            <a href="{{ URL::previous() }}">Go Back</a>
        </h2>
    </x-slot>

    <div class="py-12 thead-dark ">

        <form action="/stocks" method="post">
            @csrf


            <label class="m-1 content-center" for="company" >Company name</label><br>
            <input class="m-1 content-center text-black" type="text" id="company" name="company" value="company name..">
            <button type="submit" class="btn btn-outline-success">Search</button>

        </form>



        @if(!empty($companies))
            <table class="table table-hover table-dark">
                <thead>
                <tr>
                    <th scope="col">Company Name</th>
                    <th scope="col">Company Symbols</th>
                    <th scope="col">About</th>

                </tr>
                </thead>
                <tbody>



                @foreach($companies as $company)
                    <tr>

                        <td >{{ $company->getName() }}</td>
                        <td>{{ $company->getSymbol() }}</td>


<td><input type="button" value="See about company" class="btn btn-warning" onclick="window.open('stocks/{{$company->getSymbol()}}')" /></td>

                        @endforeach
                    </tr>
                </tbody>
            </table>
        @endif
    </div>

</x-app-layout>
