<?php

abstract class Person {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    abstract public function determineRole();
}

class Patient extends Person {
    public function determineRole() {
        return "Patient";
    }
}

abstract class Staff extends Person {
    private $salary;

    public function __construct($name, $salary) {
        parent::__construct($name);
        $this->salary = $salary;
    }

    public function getSalary() {
        return $this->salary;
    }

    abstract public function calculateSalary();
}

class Doctor extends Staff {
    public function determineRole() {
        return "Doctor";
    }

    public function calculateSalary() {
        return $this->getSalary() * 1.5; 
    }
}

class Nurse extends Staff {
    public function determineRole() {
        return "Nurse";
    }

    public function calculateSalary() {
        return $this->getSalary() * 1.2; 
    }
}

class Appointment {
    private $doctor;
    private $patient;
    private $startTime;
    private $endTime;
    private $nurse;

    public function __construct($doctor, $patient, $startTime, $endTime, $nurse = null) {
        $this->doctor = $doctor;
        $this->patient = $patient;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->nurse = $nurse;
    }

    public function getDuration() {
        return $this->endTime - $this->startTime;
    }

    public function calculateCost() {
        $doctorSalary = $this->doctor->calculateSalary();
        $cost = $doctorSalary;
        if ($this->nurse != null) {
            $nurseBonus = $this->nurse->calculateSalary() * 0.1; 
            $cost += $nurseBonus;
        }
        return $cost;
    }
}


$patient = new Patient("ABC");
$doctor = new Doctor("Dr.1", 3000);
$nurse = new Nurse("Nurse 1", 2000);
$startTime = 12; 
$endTime = 14; 
$appointment = new Appointment($doctor, $patient, $startTime, $endTime, $nurse);
echo "Appointment cost: $" . $appointment->calculateCost();
?>
