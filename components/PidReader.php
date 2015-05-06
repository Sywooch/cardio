<?php

namespace app\components;

use Yii;
use yii\base\Object;

/**
 * Reading patient ids from filenames in a directory
 */
class PidReader extends Object
{
    /**
     * @var string directory to read filenames from
     */
    public $dir;

    /**
     * @var array contains read pids
     */
    protected $pids;

    public function init() {
        parent::init();
        $this->dir = Yii::getAlias($this->dir);
    }

    public function readPids()
    {
        $pids = [];
        if ($handle = opendir($this->dir)) {
            while (false !== ($pid = readdir($handle))) {
                if (preg_match('/^(\d{7})$/', $pid)) {
                    $pids[] = $pid;
                }
            }
        }

        $this->pids = $pids;
        return $this;
    }

    public function getPids()
    {
        return $this->pids;
    }
}
