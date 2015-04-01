<?php

class UserController extends RestController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
    public function fetchUsers() {
        $usersArray = array();
        $users = LcsUsers::model()->findAll();
        $index = 0;
        foreach ($users as $user) {
            $gamesArray[$index] = $user->attributes;
            unset($gamesArray[$index]['user_password']);
            $index++;
        }
        return $gamesArray;

    }

    public function restEvents() {
        $this->onRest('req.get.fetchUsers.render', function() {
            echo $this->restJsonEncode($this->fetchUsers());
        });
    }
}
