Small repo to demonstrate presence of a bug in CakePHP 2.x

* Run composer install
* Create a database to use for tests
* Create `phinx.yml` in base directory using provided `phinx.yml.sample`
* Populate tables for test with `vendor/bin/phinx migrate`
* Create `app/Config/database.php` using `app/Config/database.php.default`
* Make `app/tmp` and its subdirectories writeable
* Run tests with `app/Console/cake test app HabtmLoadmodel`
* Second test should fail:

```php
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

```

Output:
```
1) HabtmLoadmodelTest::test_returned_object_has_correct_type_with_a_find_and_contain_before
Hamcrest\AssertionError: Expected: is an instance of PostsTag
     but: [AppModel] <AppModel>
```

