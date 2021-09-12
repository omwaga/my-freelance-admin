<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction Summary') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="mt-5 mb-5 p-3">
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
                        Transaction ID
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
                        Comment
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php
                use Illuminate\Support\Facades\DB;$trans = DB::table('fund_withdrawal_requests')->where('id', $id)->first();
                $name = DB::table('writers')->where('email', $trans->email)->value('name');
                $balance = DB::table('writers')->where('email', $trans->email)->value('account_balance')
                ?>
                <tr>
                    <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                        1
                    </td>
                    <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                        {{ $trans->email }}
                    </td>
                    <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                        {{ $name }}
                    </td>
                    <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                        {{$trans->transaction_id}}
                    </td>
                    <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                        ${{ number_format($trans->amount_requested) }}
                    </td>
                    <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                        ${{ number_format($balance)    }}
                    </td>
                    <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                        {{ $trans->created_at }}
                    </td>
                    <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                        @livewire('buttons.money-management.approve', ['withdrawal_id' => $trans->id, 'status' =>
                        $trans->status])
                    </td>
                    <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                        {{ $trans->comment }}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </x-slot>
</x-app-layout>
