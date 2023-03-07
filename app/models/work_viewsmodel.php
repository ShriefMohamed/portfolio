<?php


namespace Framework\models;


use Framework\Lib\AbstractModel;

class Work_viewsModel extends AbstractModel
{
    public $id;
    public $workId;
    public $type;
    public $visitorIP;
    public $created;

    protected static $tableName = 'work';
    protected static $pk = 'id';
    protected $tableSchema = array(
        'workId' => parent::DATA_TYPE_INT,
        'type' => parent::DATA_TYPE_STR,
        'visitorIP' => parent::DATA_TYPE_STR
    );
}