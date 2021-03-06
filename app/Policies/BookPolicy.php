<?php

namespace App\Policies;

use App\User;
use App\Model\Book;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any books.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return TRUE;
    }

    /**
     * Determine whether the user can view the book.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Book  $book
     * @return mixed
     */
    public function view(User $user, Book $book)
    {
        return TRUE;
    }

    /**
     * Determine whether the user can create books.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    /*public function create(User $user)
    {
        return TRUE;
    }*/

    /**
     * Determine whether the user can update the book.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Book  $book
     * @return mixed
     */
    public function update(User $user, Book $book)
    {
        return $user->id === $book->user->id;
    }

    /**
     * Determine whether the user can delete the book.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Book  $book
     * @return mixed
     */
    public function delete(User $user, Book $book)
    {
        return TRUE;
    }

    /**
     * Determine whether the user can restore the book.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Book  $book
     * @return mixed
     */
    public function restore(User $user, Book $book)
    {
        return TRUE;
    }

    /**
     * Determine whether the user can permanently delete the book.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Book  $book
     * @return mixed
     */
    public function forceDelete(User $user, Book $book)
    {
        return TRUE;
    }
}
