<?php

class m150210_093042_generateAuthTables2 extends YdDbMigration
{
	public function safeUp() {

        // Run single query: update the sentence table to include a langid

        // Import sql file:
        $this->import('m150210_092348_generateAuthTables.sql');
    }
}