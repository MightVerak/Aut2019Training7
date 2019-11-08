<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FormationsPositionTitlesFixture
 */
class FormationsPositionTitlesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'formation_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'position_title_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'formation_status_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'position_title_of_formations_id' => ['type' => 'index', 'columns' => ['position_title_id'], 'length' => []],
            'formation_id' => ['type' => 'index', 'columns' => ['formation_id'], 'length' => []],
            'status_id' => ['type' => 'index', 'columns' => ['formation_status_id'], 'length' => []],
            'formation_id_2' => ['type' => 'index', 'columns' => ['formation_id'], 'length' => []],
            'position_title_id' => ['type' => 'index', 'columns' => ['position_title_id'], 'length' => []],
            'formation_status_id' => ['type' => 'index', 'columns' => ['formation_status_id'], 'length' => []],
            'position_title_id_2' => ['type' => 'index', 'columns' => ['position_title_id'], 'length' => []],
            'formation_status_id_2' => ['type' => 'index', 'columns' => ['formation_status_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'formations_position_titles_ibfk_2' => ['type' => 'foreign', 'columns' => ['formation_id'], 'references' => ['formations', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'formations_position_titles_ibfk_3' => ['type' => 'foreign', 'columns' => ['formation_status_id'], 'references' => ['formation_statuses', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'formations_position_titles_ibfk_4' => ['type' => 'foreign', 'columns' => ['position_title_id'], 'references' => ['position_titles', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'formation_id' => 1,
                'position_title_id' => 1,
                'formation_status_id' => 1
            ],
        ];
        parent::init();
    }
}
