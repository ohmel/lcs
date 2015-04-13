<?php

class AdmissionController extends RestController
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */

    public function actionIndex()
    {
        $this->render('admission');
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

    public function addStudent($studentData)
    {
        try {
            $student = new LcsStudent();
            $student->attributes = $studentData['student'];
            $student->student_number = $studentData['student']['student_firstname']." Not Issued Yet";
            $student->student_status = 0;

            if(!$student->save()){
                throw new CHttpException(500, "Adding new applicant failed");
            }

            $address = new LcsStudentAddress();
            $address->attributes = $studentData['address'];
            $address->student_id = $student->student_id;

            if(!$address->save()){
                throw new CHttpException(500, "Adding new applicant address failed");
            }

            foreach($studentData['educationalBackgrounds'] as $educBackground){
                $background = new LcsStudentEducationalBackground();
                $background->attributes = $educBackground;
                $background->student_id = $student->student_id;

                if(!$background->save()){
                    throw new CHttpException(500, "Adding new Educational Background failed");
                }
            }

            foreach($studentData['contactDetails'] as $contactDetails){
                $contact = new LcsStudentContactDetails();
                $contact->attributes = $contactDetails;
                $contact->student_id = $student->student_id;

                if(!$contact->save()){
                    throw new CHttpException(500, "Adding new Contact Details failed");
                }
            }

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
