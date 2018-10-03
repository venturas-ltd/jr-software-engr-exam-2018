<?php

namespace Tests\Unit;

use App\Developer;
use App\Language;
use App\ProgrammingLanguage;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class DeveloperTest extends TestCase
{
    use DatabaseMigrations;
    protected $developer;
    protected $l;
    protected $pl;

    protected function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->developer = factory(Developer::class)->create();
        $this->l = factory(Language::class)->create();
        $this->pl = factory(ProgrammingLanguage::class)->create();
    }

    /** @test */
    public function create_developer_view()
    {
        $this->get('/developers/create')
            ->assertStatus(200);
    }

    /** @test */
    public function store_a_developer()
    {
        $ids = [1];
        // programming language test
        $this->developer
            ->programmingLanguages()->attach($ids);

        $this->assertCount(1,$this->developer
            ->programmingLanguages);

        // language test
        $this->developer
            ->languages()->attach($ids);

        $this->assertCount(1,$this->developer
            ->languages);

    }
}
