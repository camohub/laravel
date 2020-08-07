<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Model{
/**
 * App\Model\Book
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $title
 * @property string|null $slug
 * @property string $isbn
 * @property string $genre
 * @property string $abstract
 * @property string $pages
 * @property string $author_name
 * @property string $email
 * @property string|null $img
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Book newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Book newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Book query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Book whereAbstract($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Book whereAuthorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Book whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Book whereGenre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Book whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Book whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Book whereIsbn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Book wherePages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Book whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Book whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Book whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Book whereUserId($value)
 */
	class Book extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Book[] $books
 * @property-read int|null $books_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

