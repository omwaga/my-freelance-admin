<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <h2 class="font-semibold text-xl text-blue-500 font-bold leading-tight mr-auto">
                {{ __('Citations Settings') }}
            </h2>

            @include('layouts.settings-top')

        </div>
    </x-slot>

    <div class="container mt-50 p-10">
        <div class="mt-5 mb-5 p-3">
            <div class="flex flex-row">
                <h1 class="pl-5 pr-5 pt-2 pb-2 text-2xl mr-auto">Citation Styles</h1>
                <div class="mt-5">
                    <a href="/settings/citations/add"
                       class="bg-blue-500 transition duration-200 hover:bg-blue-800 rounded-2xl hover:shadow-lg text-white p-2 mt-5">Add
                        Style</a>
                </div>
            </div>
            <table class="table table-fixed min-w-full leading-normal">
                <thead>
                <tr>
                    <th class="px-3 py-3 border-b border-t bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">
                        #
                    </th>
                    <th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Style
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($citations as $index=>$cit)
                    <tr>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            {{ $index+1 }}</td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            {{ $cit->style }}</td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            <a href="/settings/citations/delete/{{{$cit->id}}}"
                               class="bg-red-500 hover:bg-red-800 text-white p-2 rounded">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
