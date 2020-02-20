# Laravel Commentable

I do not plan on maintaining this package, use it at your own risk.

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require benjivm/commentable
```

To get started, you'll need to publish the vendor assets and migrate:

```
php artisan vendor:publish --provider="Benjivm\Commentable\CommentableServiceProvider" && php artisan migrate
```

## Usage


### Setup a Model
``` php
<?php

namespace App;


use Benjivm\Commentable\Traits\HasComments;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasComments;
}
```

### Create a comment
``` php
$user = User::first();
$post = Post::first();

$comment = $post->comment([
    'title' => 'Some title',
    'body' => 'Some body',
], $user);

dd($comment);
```

### Create a comment as a child of another comment (e.g. an answer)
``` php
$user = User::first();
$post = Post::first();

$parent = $post->comments->first();

$comment = $post->comment([
    'title' => 'Some title',
    'body' => 'Some body',
], $user, $parent);

dd($comment);
```

### Update a comment
``` php
$comment = $post->updateComment(1, [
    'title' => 'new title',
    'body' => 'new body',
]);
```

### Delete a comment
``` php
$post->deleteComment(1);
```

### Count comments an entity has
``` php
$post = Post::first();

dd($post->commentCount());
```

## Testing

``` bash
$ phpunit
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to bvmiller@mail.sfsu.edu. All security vulnerabilities will be promptly addressed.

## Credits

This project exists thanks to all the people who [contribute](../../contributors).

## License

Mozilla Public License Version 2.0 ([MPL-2.0](./LICENSE)).
