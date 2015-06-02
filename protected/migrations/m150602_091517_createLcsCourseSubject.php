<?php

class m150602_091517_createLcsCourseSubject extends YdDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
        $this->import('m150602_091517_createLcsCourseSubject.sql');
	}

}