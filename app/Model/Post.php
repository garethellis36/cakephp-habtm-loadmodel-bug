<?php

class Post extends AppModel
{
    public $hasAndBelongsToMany = ["Tag"];
}
