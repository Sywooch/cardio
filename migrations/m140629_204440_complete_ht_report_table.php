<?php

use app\components\custom\MigrationTrait;

use yii\db\Schema;

class m140629_204440_complete_ht_report_table extends \yii\db\Migration
{
    use MigrationTrait;

    private $table = '{{ht_report}}';

    public function up()
    {
        $this->addColumn($this->table, 'anamnese', Schema::TYPE_TEXT);
        $this->addColumn($this->table, 'ischemia_detection_x_ecg', Schema::TYPE_BOOLEAN);
        $this->addColumn($this->table, 'ischemia_detection_x_echo', Schema::TYPE_BOOLEAN);
        $this->addColumn($this->table, 'ischemia_detection_tc_ggm', Schema::TYPE_BOOLEAN);
        $this->addColumn($this->table, 'ischemia_detection_tc_ggm_text', Schema::TYPE_STRING);
        $this->addColumn($this->table, 'ischemia_detection_x_mri', Schema::TYPE_BOOLEAN);
        $this->addColumn($this->table, 'ischemia_detection_x_mri_text', Schema::TYPE_STRING);
        $this->addColumn($this->table, 'recent_ef', Schema::TYPE_STRING);
        $this->addColumn($this->table, 'recent_rvsp', Schema::TYPE_STRING);
        $this->addColumn($this->table, 'recent_mi', Schema::TYPE_INTEGER . '(11) not null');
        $this->addColumn($this->table, 'recent_ms', Schema::TYPE_STRING);
        $this->addColumn($this->table, 'recent_mva', Schema::TYPE_STRING);
        $this->addColumn($this->table, 'recent_ti', Schema::TYPE_INTEGER . '(11) not null');
        $this->addColumn($this->table, 'recent_ts', Schema::TYPE_STRING);
        $this->addColumn($this->table, 'recent_as', Schema::TYPE_STRING);
        $this->addColumn($this->table, 'recent_ava', Schema::TYPE_STRING);
        $this->addColumn($this->table, 'recent_ai', Schema::TYPE_INTEGER . '(11) not null');
        $this->addColumn($this->table, 'recent_vvv', Schema::TYPE_STRING);
        $this->addColumn($this->table, 'cag_lm', Schema::TYPE_INTEGER . '(3)');
        $this->addColumn($this->table, 'cag_rdap', Schema::TYPE_INTEGER . '(3)');
        $this->addColumn($this->table, 'cag_rdam', Schema::TYPE_INTEGER . '(3)');
        $this->addColumn($this->table, 'cag_d1', Schema::TYPE_INTEGER . '(3)');
        $this->addColumn($this->table, 'cag_d2', Schema::TYPE_INTEGER . '(3)');
        $this->addColumn($this->table, 'cag_s1', Schema::TYPE_INTEGER . '(3)');
        $this->addColumn($this->table, 'cag_al', Schema::TYPE_INTEGER . '(3)');
        $this->addColumn($this->table, 'cag_cxm', Schema::TYPE_INTEGER . '(3)');
        $this->addColumn($this->table, 'cag_mo', Schema::TYPE_INTEGER . '(3)');
        $this->addColumn($this->table, 'cag_cxd', Schema::TYPE_INTEGER . '(3)');
        $this->addColumn($this->table, 'cag_plx1', Schema::TYPE_INTEGER . '(3)');
        $this->addColumn($this->table, 'cag_plx2', Schema::TYPE_INTEGER . '(3)');
        $this->addColumn($this->table, 'cag_plx3', Schema::TYPE_INTEGER . '(3)');
        $this->addColumn($this->table, 'cag_rca', Schema::TYPE_INTEGER . '(3)');
        $this->addColumn($this->table, 'cag_ma', Schema::TYPE_INTEGER . '(3)');
        $this->addColumn($this->table, 'cag_rdp', Schema::TYPE_INTEGER . '(3)');
        $this->addColumn($this->table, 'cag_plr1', Schema::TYPE_INTEGER . '(3)');
        $this->addColumn($this->table, 'cag_plr2', Schema::TYPE_INTEGER . '(3)');
        $this->addColumn($this->table, 'cag_plr3', Schema::TYPE_INTEGER . '(3)');
        $this->addColumn($this->table, 'cag_graft1', Schema::TYPE_INTEGER . '(3)');
        $this->addColumn($this->table, 'cag_graft2', Schema::TYPE_INTEGER . '(3)');
        $this->addColumn($this->table, 'cag_lima', Schema::TYPE_INTEGER . '(3)');
        $this->addColumn($this->table, 'cag_rima', Schema::TYPE_INTEGER . '(3)');
        $this->addColumn($this->table, 'heerlen_advice_cons', Schema::TYPE_STRING);
        $this->addColumn($this->table, 'heerlen_advice_ffr', Schema::TYPE_STRING);
        $this->addColumn($this->table, 'heerlen_advice_consultation_ctc', Schema::TYPE_STRING);
        $this->addColumn($this->table, 'heerlen_advice_naber_speak_with', Schema::TYPE_STRING);
        $this->addColumn($this->table, 'ctc_maastricht_advice', Schema::TYPE_TEXT);
        $this->addColumn($this->table, 'additional', Schema::TYPE_TEXT);
        $this->addColumn($this->table, 'wait_advice', Schema::TYPE_STRING);
        $this->addColumn($this->table, 'hold_included', Schema::TYPE_BOOLEAN);
        $this->addColumn($this->table, 'urgent', Schema::TYPE_BOOLEAN);
        $this->addColumn($this->table, 'elective', Schema::TYPE_BOOLEAN);
    }

    public function down()
    {
        $this->dropColumn($this->table, 'anamnese');
        $this->dropColumn($this->table, 'ischemia_detection_x_ecg');
        $this->dropColumn($this->table, 'ischemia_detection_x_echo');
        $this->dropColumn($this->table, 'ischemia_detection_tc_ggm');
        $this->dropColumn($this->table, 'ischemia_detection_tc_ggm_text');
        $this->dropColumn($this->table, 'ischemia_detection_x_mri');
        $this->dropColumn($this->table, 'ischemia_detection_x_mri_text');
        $this->dropColumn($this->table, 'recent_ef');
        $this->dropColumn($this->table, 'recent_rvsp');
        $this->dropColumn($this->table, 'recent_mi');
        $this->dropColumn($this->table, 'recent_ms');
        $this->dropColumn($this->table, 'recent_mva');
        $this->dropColumn($this->table, 'recent_ti');
        $this->dropColumn($this->table, 'recent_ts');
        $this->dropColumn($this->table, 'recent_as');
        $this->dropColumn($this->table, 'recent_ava');
        $this->dropColumn($this->table, 'recent_ai');
        $this->dropColumn($this->table, 'recent_vvv');
        $this->dropColumn($this->table, 'cag_lm');
        $this->dropColumn($this->table, 'cag_rdap');
        $this->dropColumn($this->table, 'cag_rdam');
        $this->dropColumn($this->table, 'cag_d1');
        $this->dropColumn($this->table, 'cag_d2');
        $this->dropColumn($this->table, 'cag_s1');
        $this->dropColumn($this->table, 'cag_al');
        $this->dropColumn($this->table, 'cag_cxm');
        $this->dropColumn($this->table, 'cag_mo');
        $this->dropColumn($this->table, 'cag_cxd');
        $this->dropColumn($this->table, 'cag_plx1');
        $this->dropColumn($this->table, 'cag_plx2');
        $this->dropColumn($this->table, 'cag_plx3');
        $this->dropColumn($this->table, 'cag_rca');
        $this->dropColumn($this->table, 'cag_ma');
        $this->dropColumn($this->table, 'cag_rdp');
        $this->dropColumn($this->table, 'cag_plr1');
        $this->dropColumn($this->table, 'cag_plr2');
        $this->dropColumn($this->table, 'cag_plr3');
        $this->dropColumn($this->table, 'cag_graft1');
        $this->dropColumn($this->table, 'cag_graft2');
        $this->dropColumn($this->table, 'cag_lima');
        $this->dropColumn($this->table, 'cag_rima');
        $this->dropColumn($this->table, 'heerlen_advice_cons');
        $this->dropColumn($this->table, 'heerlen_advice_ffr');
        $this->dropColumn($this->table, 'heerlen_advice_consultation_ctc');
        $this->dropColumn($this->table, 'heerlen_advice_naber_speak_with');
        $this->dropColumn($this->table, 'ctc_maastricht_advice');
        $this->dropColumn($this->table, 'additional');
        $this->dropColumn($this->table, 'wait_advice');
        $this->dropColumn($this->table, 'hold_included');
        $this->dropColumn($this->table, 'urgent');
        $this->dropColumn($this->table, 'elective');
    }
}
