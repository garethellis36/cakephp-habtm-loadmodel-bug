<?php

class HabtmLoadmodelTest extends CakeTestCase
{
    /**
     * @return void
     */
    public function test_returned_object_has_correct_type_without_a_find_before()
    {
        $model = ClassRegistry::init("PostsTag");
        assertThat($model, is(anInstanceOf(PostsTag::class)));
    }

    /**
     * @return void
     */
    public function test_returned_object_has_correct_type_with_a_find_and_contain_before()
    {
        $model = ClassRegistry::init("Post");
        $model->find("all", ["contain" => "Tag"]);

        $model = ClassRegistry::init("PostsTag");
        assertThat($model, is(anInstanceOf(PostsTag::class)));        
    }
}
