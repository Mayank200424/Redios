<?php

namespace App\Console\Commands;

use App\Models\Discount;
use Illuminate\Console\Command;

class UpdateProductDiscounts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-product-discounts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update product discounts based on start and end dates';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = now()->toDateString();

        $discounts = Discount::all();

        foreach ($discounts as $discount) {

            if ($today >= $discount->start_date && $today <= $discount->end_date) {

                $discount->update(['status' => 'active']);

            } elseif ($today > $discount->end_date) {

                $discount->update(['status' => 'expired']);

            } else {

                $discount->update(['status' => 'upcoming']);
            }
        }

        $this->info('Product discounts updated successfully');
    }
}
