<?php

class m150426_070348_generateInitialLcsDatabase extends YdDbMigration {

    public function safeUp() {

        // Run single query: update the sentence table to include a langid

        // Import sql file:
        $this->import('m150426_070348_generateInitialLcsDatabase.sql');
    }

}