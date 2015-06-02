<?php

class StudentMonitoringController extends RestController
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */

    public function actionIndex()
    {
        $this->render('studentMonitoring');
    }

    public function fetchStudents()
    {
        //Fetch All Student Applicants "inactive()"
        $studentsArray = array();
        $students = LcsStudent::model()->with("address", "contact", "background", "requirement", "skill")->inactive()->findAll();

        if ($students) {
            $index = 0;
            foreach ($students as $student) {

                $contacts = $student->contact;
                $backgrounds = $student->background;
                $requirements = $student->requirement;
                $skills = $student->skill;

                $studentsArray[$index] = $student->attributes;

                if ($student->address->attributes) {
                    $studentsArray[$index]["studentAddress"] = $student->address->attributes;
                }

                //Assign Child records of the parent Student
                //contacts, backgrounds, address amd requirements
                foreach ($contacts as $contact) {
                    $studentsArray[$index]["contactDetails"][] = $contact->attributes;
                }
                if ($backgrounds) {
                    foreach ($backgrounds as $background) {
                        $studentsArray[$index]["educationalBackground"][] = $background->attributes;
                    }
                }
                if ($requirements) {
                    foreach ($requirements as $requirement) {
                        $studentsArray[$index]["studentRequirements"][] = $requirement->attributes;
                    }
                }
                if ($skills) {
                    foreach ($skills as $skill) {
                        $studentsArray[$index]["studentSkills"][] = $skill->attributes;
                    }
                }

                $index++;
            }
        }

        return $studentsArray;
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
