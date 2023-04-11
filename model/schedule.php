<?php

class Schedule {
    private $id;
    private $date;
    private $startTime;
    private $endTime;
 private $doctorid ;

    public function __construct($id = null , $date = null, $startTime = null , $endTime = null , $doctorid=null) {
        $this->id = $id;
        $this->date = $date;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->doctorid = $doctorid;

        
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function getdoctorid() {
        return $this->doctorid;
    }

    public function setdoctorid($doctorid) {
        $this->doctorid = $doctorid;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getStartTime() {
        return $this->startTime;
    }

    public function setStartTime($startTime) {
        $this->startTime = $startTime;
    }

    public function getEndTime() {
        return $this->endTime;
    }

    public function setEndTime($endTime) {
        $this->endTime = $endTime;
    }


}