<?php

class PostsTag extends AppModel
{
    public $belongsTo = ["Post", "Tag"];
}
