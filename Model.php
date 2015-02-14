<?php

include "db.php";
include "math.php";
/**
*  // реализация простой модели
*/
class Model

{
// Выводим все данные с базы, для вставки в диаграммы
        public function getAllData()
        {
            $result = DBmodel::getInstance()->query("SELECT * FROM main_data");
            return $result->fetchAll();

        }

        public function getAvgSalary()
        {
                $result = DBmodel::getInstance()->query("SELECT type, AVG(salary) FROM main_data GROUP BY type");
                return $result->fetchAll();
        }

        public function getMaxSalaryByType()
        {
            $result = DBmodel::getInstance()->query("SELECT type, MAX(salary) FROM main_data GROUP BY type");
            return $result->fetchAll();
        }
        public function getMaxSalaryByOld()
        {
            $result = DBmodel::getInstance()->query("SELECT old, MAX(salary) FROM main_data GROUP BY old");
            return $result->fetchAll();
        }
        public function getAvgSalaryByOld()
        {
        	 $result = DBmodel::getInstance()->query("SELECT old, AVG(salary) FROM main_data GROUP BY old");
           return $result->fetchAll();
        }

        public function getAvgSalryFromAll()
        {
           $result = DBmodel::getInstance()->query("SELECT AVG(salary) FROM main_data");
           return $result->fetch();
        }

        public function getMaxSalryFromAll()
        {
           $result = DBmodel::getInstance()->query("SELECT MAX(salary) FROM main_data");
           return $result->fetch();
        }

        public function __construct()
        {

        }
}
$objectStart = new Model();

$dataAvgSalaryByType = $objectStart->getAvgSalaryByOld();
$dataMaxSalaryByOld = $objectStart->getMaxSalaryByOld();

$dataAvgSalaryFromType = $objectStart->getAvgSalary();
$dataMaxSalaryFromType = $objectStart->getMaxSalaryByType();

$dataAvgSalaryFromAll = $objectStart->getAvgSalryFromAll();
$dataMaxSalaryFromAll = $objectStart->getMaxSalryFromAll();

$objectConvert = new Math(round($dataAvgSalaryFromAll["0"]),round($dataMaxSalaryFromAll["0"]));

?>

