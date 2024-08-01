<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transactions = [
            [
                'orderid' => 1,
                'transaction_id' => 'TXN123456789',
                'transactionstatus' => 'Completed',
                'transactionresponse' => 'Payment successful.',
                'softdelete' => 0,
                'timestamp' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'orderid' => 2,
                'transaction_id' => 'TXN987654321',
                'transactionstatus' => 'Pending',
                'transactionresponse' => 'Payment is pending.',
                'softdelete' => 0,
                'timestamp' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'orderid' => 3,
                'transaction_id' => 'TXN112233445',
                'transactionstatus' => 'Failed',
                'transactionresponse' => 'Payment failed due to insufficient funds.',
                'softdelete' => 0,
                'timestamp' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'orderid' => 4,
                'transaction_id' => 'TXN556677889',
                'transactionstatus' => 'Completed',
                'transactionresponse' => 'Payment successful.',
                'softdelete' => 0,
                'timestamp' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'orderid' => 5,
                'transaction_id' => 'TXN998877665',
                'transactionstatus' => 'Cancelled',
                'transactionresponse' => 'Payment was cancelled by the user.',
                'softdelete' => 0,
                'timestamp' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('transactions')->insert($transactions);
    }
}
