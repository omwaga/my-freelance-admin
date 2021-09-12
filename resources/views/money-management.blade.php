<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-500 font-bold leading-tight">
            {{ __('Money Management') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="flex lg:flex-row sm:flex-col p-6 justify-around">
            <div>
                @livewire('money-management.requests')
            </div>
            <div>
                @livewire('money-management.approved')
            </div>
            <div>
                @livewire('money-management.denied')
            </div>
            <div>
                @livewire('money-management.total-requested')
            </div>
        </div>

        <div class="mt-5 mb-5 p-3">
            <h1 class="pl-5 pr-5 pt-2 pb-2 text-2xl">All Requests</h1>
            <table class="table table-fixed min-w-full leading-normal">
                <thead>
                <tr>
                    <th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        #
                    </th>
                    <th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Writer Email
                    </th>
                    <th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Nickname
                    </th>
                    <th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Amount Requested
                    </th>
                    <th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Balance
                    </th>
                    <th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Date
                    </th>
                    <th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Status
                    </th>
                    <th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">

                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($requests as $index=>$req)
                    <tr>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            {{ $index+1 }}</td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            {{ $req->email }}</td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            <?php
                            $name = Illuminate\Support\Facades\DB::table('writers')
                                ->where('email', '=', $req->email)->value('name');
                            ?>
                            {{ $name }}
                        </td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            ${{ number_format($req->amount_requested) }}</td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            <?php
                            $balance = DB::table('writers')
                                ->where('email', '=', $req->email)->value('account_balance');
                            ?>
                            ${{ number_format($balance) }}
                        </td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            {{ $req->created_at }}
                        </td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            @livewire('buttons.money-management.approve', ['withdrawal_id' => $req->id, 'status' =>
                            $req->status])
                        </td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            <a href="/money/management/{{ $req->id }}" class="underline text-blue-500">Summary</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-5">
            {{ $requests->links() }}
        </div>
    </x-slot>
</x-app-layout>
