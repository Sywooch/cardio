<?php

namespace app\behaviors;

use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\base\Model;

/**
 * Cuts off time from datetime field for prettier display
 *
 * @author Oleksandr Shybystyi <oleksandr.shybystyi@gmail.com>
 */
class PrettyDateBehavior extends Behavior
{
    public $attributes;

    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_FIND => 'afterFind',
            Model::EVENT_BEFORE_VALIDATE => 'beforeValidate',
        ];
    }

    public function afterFind()
    {
        foreach ($this->attributes as $attribute) {
            $this->owner->{$attribute} = $this->cutOffTime($this->owner->{$attribute});
        }
    }

    public function beforeValidate()
    {
        foreach ($this->attributes as $attribute) {
            $this->owner->{$attribute} = $this->appendTime($this->owner->{$attribute});
        }
    }

    /**
     * Cuts off time from datetime value
     * @param string $datetime
     * @return string date
     * @see http://stackoverflow.com/questions/113829/how-to-convert-date-to-timestamp-in-php
     */
    public function cutOffTime($datetime)
    {
        if (preg_match('/\d{4}-\d{2}-\d{2} 00:00(:00)?/', $datetime, $matches)) {
            if (isset($matches[1])) {
                $a = static::strptime($datetime, '%Y-%m-%d 00:00:00');
            } else {
                $a = static::strptime($datetime, '%Y-%m-%d 00:00');
            }
            $timestamp = mktime(0, 0, 0, $a['tm_mon']+1, $a['tm_mday'], $a['tm_year']+1900);
            $date = strftime('%Y-%m-%d', $timestamp);
        } else {
            $date = $datetime;
        }

        return $date;
    }

    /**
     * Append time to date before insertion into database
     * @param string $date
     * @return string $datetime
     */
    public function appendTime($date)
    {
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
            $datetime = $date . ' 00:00:00';
        } else {
            $datetime = $date;
        }

        return $datetime;
    }

    /**
     * Port of strptime on windows
     *
     * @see http://ua2.php.net/manual/en/function.strptime.php#103598
     */
    public static function strptime($date, $format) {
        $masks = array(
            '%d' => '(?P<d>[0-9]{2})',
            '%m' => '(?P<m>[0-9]{2})',
            '%Y' => '(?P<Y>[0-9]{4})',
            '%H' => '(?P<H>[0-9]{2})',
            '%M' => '(?P<M>[0-9]{2})',
            '%S' => '(?P<S>[0-9]{2})',
            // usw..
        );

        $rexep = "#".strtr(preg_quote($format), $masks)."#";
        if(!preg_match($rexep, $date, $out))
            return false;

        $ret = array(
            "tm_sec"  => isset($out['S']) ? (int) $out['S'] : 0,
            "tm_min"  => isset($out['M']) ? (int) $out['M'] : 0,
            "tm_hour" => isset($out['H']) ? (int) $out['H'] : 0,
            "tm_mday" => (int) $out['d'],
            "tm_mon"  => $out['m'] ? $out['m']-1 : 0,
            "tm_year" => $out['Y'] > 1900 ? $out['Y'] - 1900 : 0,
        );

        return $ret;
    } 

}
