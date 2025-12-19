<?php

namespace App\Observers;

use App\Models\InventoryTransaction;

class InventoryTransactionObserver
{
    /**
     * Handle the InventoryTransaction "created" event.
     */
    public function created(InventoryTransaction $inventoryTransaction): void
    {
        //
    }

    /**
     * Handle the InventoryTransaction "updated" event.
     */
    public function updated(InventoryTransaction $inventoryTransaction): void
    {
        //
    }

    /**
     * Handle the InventoryTransaction "deleted" event.
     */
    public function deleted(InventoryTransaction $inventoryTransaction): void
    {
        //
    }

    /**
     * Handle the InventoryTransaction "restored" event.
     */
    public function restored(InventoryTransaction $inventoryTransaction): void
    {
        //
    }

    /**
     * Handle the InventoryTransaction "force deleted" event.
     */
    public function forceDeleted(InventoryTransaction $inventoryTransaction): void
    {
        //
    }
}
