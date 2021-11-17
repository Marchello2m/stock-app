<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl bg-dark text-white leading-tight">
      TEST e-mail
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark text-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-dark border-b border-gray-200 text-white">
                    <form action="/emailTest" method="post">
                        @csrf
                        <label for="email">Email</label>
                        <input class="text-black" type="text" name="email" id="email" value="e-mail..">
                        <button class="border-2" type="submit">Send</button>
                    </form>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
