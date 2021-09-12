<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-500 font-bold leading-tight">
            {{ __('Writers') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="flex lg:flex-row sm:flex-col p-6 justify-around">
            <div>
                @livewire('total-writers')
            </div>
            <div>
                @livewire('approved-writers')
            </div>
            <div>
                @livewire('waiting-approval')
            </div>
            <div>
                @livewire('failed-writers')
            </div>
        </div>

        <div class="mt-5 mb-5 p-3">
            <h1 class="pl-5 pr-5 pt-2 pb-2 text-2xl">Writers</h1>
            <table class="table table-fixed min-w-full leading-normal">
                <thead>
                <tr>
                    <th class="px-3 py-3 border-b border-t bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">
                        #
                    </th>
                    <th class="px-3 py-3 border-b border-t bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">
                        Nickname
                    </th>
                    <th class="px-3 py-3 border-b border-t bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">
                        Writer Email
                    </th>
                    <th class="px-3 py-3 border-b border-t bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">
                        Gender
                    </th>
                    <th class="px-3 py-3 border-b border-t bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">
                        Completed Orders
                    </th>
                    <th class="px-3 py-3 border-b border-t bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">
                        Incomplete Orders
                    </th>
                    <th class="px-3 py-3 border-b border-t bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">
                        Balance
                    </th><th class="px-3 py-3 border-b border-t bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">
                        Rating
                    </th>
                    <th class="px-3 py-3 border-b border-t bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">
                        Country
                    </th>
                    <th class="px-3 py-3 border-b border-t bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">
                        Success Rate
                    </th>
                    <th class="px-3 py-3 bwriter-b-2 border-b border-t bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">
                        Approved
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($writers as $index=>$writer)
                    <tr>
                        <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                            {{ $index + 1 }}</td>
                        <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                            {{ $writer->name }}</td>
                        <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                            {{ $writer->email }}</td>
                        <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                            {{ ucfirst($writer->gender) }}
                        </td>
                        <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                            {{ $writer->completed_orders }}
                        </td>
                        <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                            {{ $writer->incomplete_orders }}
                        </td>
                        <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                            {{ $writer->account_balance }}
                        </td>
                        <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                            {{ $writer->rating }}
                        </td>
                        <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">{{ $writer->country }}</td>
                        <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">{{ (($writer->success_rate)/10) * 100 }}% </td>
                        <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                            @if($writer->approved == 1)
                                Yes
                            @else
                                No
                                @endif
                             </td>
                        <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                            @livewire('buttons.activate-writer', ['writer_id' => $writer->id])
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-5">
            {{ $writers->links() }}
        </div>
    </x-slot>
</x-app-layout>
