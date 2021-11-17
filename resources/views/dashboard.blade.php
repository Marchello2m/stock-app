<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-dark text-white border-b border-gray-200">

                    <form action="/stocks" method="post">
                        @csrf


                        <label class="m-1 content-center" for="company">Company name</label><br>
                        <input class="m-1 content-center text-black" type="text" id="company" name="company" value="company name..">
                        <button type="submit" class="btn btn-outline-success">Search</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
