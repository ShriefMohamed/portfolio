<?php


namespace Framework\models;


use Framework\Lib\AbstractModel;

class WorkModel extends AbstractModel
{
    public $id;
    public $title;
    public $keyworks;
    public $description;
    public $subDomain;
    public $status;
    public $work_order;
    public $created;

    protected static $tableName = 'work';
    protected static $pk = 'id';
    protected $tableSchema = array(
        'title' => parent::DATA_TYPE_STR,
        'keyworks' => parent::DATA_TYPE_STR,
        'description' => parent::DATA_TYPE_STR,
        'subDomain' => parent::DATA_TYPE_STR,
        'status' => parent::DATA_TYPE_INT,
        'work_order' => parent::DATA_TYPE_INT
    );

    public static function getAllWork($options = '')
    {
        $sql = "SELECT work.*
                FROM work
                LEFT JOIN work_views ON work.id = work_views.workId
                $options";
        return parent::getSQL($sql);
    }
}