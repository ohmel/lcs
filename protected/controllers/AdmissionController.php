<?php

class AdmissionController extends RestController
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */

    public function actionIndex(){
        $this->render('admission');
    }

    public function fetchStudents()
    {
        $studentsArray = array();
        $students = LcsStudent::model()->with("address", "contact", "background", "requirement", "skill")->inactive()->findAll();

        $index = 0;
        foreach ($students as $student) {
            $studentsArray[$index] = $student->attributes;
            $studentsArray[$index]["studentAddress"] = $student->address->attributes;
            $contacts = $student->contact;
            foreach($contacts as $contact){
                $studentsArray[$index]["contactDetails"][] = $contact->attributes;
            }
            $backgrounds = $student->background;
            foreach($backgrounds as $background){
                $studentsArray[$index]["educationalBackground"][] = $background->attributes;
            }
            $requirements = $student->requirement;
            foreach($requirements as $requirement){
                $studentsArray[$index]["studentRequirements"][] = $requirement->attributes;
            }
            $skills = $student->skill;
            foreach($skills as $skill){
                $studentsArray[$index]["studentSkills"][] = $skill->attributes;
            }
            $index++;
        }
        return $studentsArray;
    }

    public function addStudent($studentData)
    {
        try {
//          TODO: Put add code in here...
            return $studentData;
        } catch (Exception $e) {
            throw new CHttpException(500, $e->getMessage());
        }
    }

    public function restEvents()
    {
        $this->onRest('req.get.fetchStudents.render', function () {
            echo $this->restJsonEncode($this->fetchStudents());
        });
        $this->onRest('req.post.addStudent.render', function ($data) {
            $studentData = $data;
            echo $this->restJsonEncode($this->addStudent($studentData));
        });
    }
}
