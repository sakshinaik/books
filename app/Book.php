<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    /**
     * Looks at a user's book list and sets a sort order based on the order of the linked list
     *
     * @param int $userID The user to look at
     *
     * @return void
     */
    public static function setSortOrder(int $userID) {
        $books = static::where('user_id', $userID)
            ->orderBy('sort_order', 'asc')
            ->get();

        $sortOrder = 0;

        foreach($books as $book) {
            $book->sort_order = $sortOrder;
            $book->save();
            $sortOrder += 10;
        }
    }
}
