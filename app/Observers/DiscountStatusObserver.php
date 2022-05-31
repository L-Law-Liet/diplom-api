<?php

namespace App\Observers;

use App\Models\DiscountStatus;
use App\Models\User;
use TCG\Voyager\Models\Role;

class DiscountStatusObserver
{
    /**
     * @param DiscountStatus $discountStatus
     * @return void
     */
    public function created(DiscountStatus $discountStatus)
    {
        $this->updateCards();
    }

    /**
     * @param DiscountStatus $discountStatus
     * @return void
     */
    public function updated(DiscountStatus $discountStatus)
    {
        $this->updateCards();
    }

    /**
     * @param DiscountStatus $discountStatus
     * @return void
     */
    public function deleting(DiscountStatus $discountStatus)
    {
        $this->updateCards($discountStatus->id);
    }

    /**
     * @return void
     */
    private function updateCards($id = null)
    {
        $users = User::whereRelation('user_roles', 'name', 'user')->get();
        foreach ($users as $user) {
            $card = $user->discount_card;
            $card->discount_status_id = DiscountStatus::
                where('id', '<>', $id)
                ->where('min', '<=', $user->orders()->sum('total'))
                ->orderByDesc('min')
                ->first()
                ->id;
            $card->save();
        }
    }
}
