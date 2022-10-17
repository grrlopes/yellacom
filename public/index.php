<?php

use App\Domain\Entities\News;
use App\Domain\Validator\Name;

require_once __DIR__ . '/../vendor/autoload.php';

echo "<pre>";

$news = new News();
echo $news->setAuthor(new Name("Gabriel Lopes"));
