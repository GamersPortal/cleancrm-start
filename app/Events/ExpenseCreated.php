<?php

namespace IP\Events;

use IP\Modules\Expenses\Models\Expense;
use Illuminate\Queue\SerializesModels;

class ExpenseCreated extends Event
{
    use SerializesModels;

    public function __construct(Expense $expense)
    {
        $this->expense = $expense;
    }
}