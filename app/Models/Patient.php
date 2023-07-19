<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    private static $instance;

    /**
     * Get the singleton instance of the Patient model.
     *
     * @return \App\Models\Patient
     */

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Patient();
        }
        return self::$instance;
    }

    /**
     * Get an array of patient data.
     *
     * This method generates an array of patient data, including 'id', 'name', 'surname', 'email', and 'treatments'.
     *
     * @return array
     */

    public function getDataArray()
    {
        $data = [];

        for ($i = 1; $i < rand(1, 20); $i++)
        {
            $data[] = $this->getRowArray($i);
        }

        return $data;
    }

    /**
     * Get an array of treatment names.
     *
     * This method returns an array of treatment names that can be assigned to patients.
     *
     * @return array
     */

    public function getTreatmentsArray()
    {
        return [
            'Physiotherapy',
            'Physiotherapy',
            'Bronchitis',
            'Bump',
            'Cataract',
            'Fever',
            'Headache'
        ];
    }


    /**
     * Get an array representing a patient row.
     *
     * This method generates an array representing a single patient row with 'id', 'name', 'surname', 'email', and 'treatments' properties.
     *
     * @param int $index
     * @return array
     */

    public function getRowArray($index)
    {
        return [
            'id' => $index,
            'name' => fake()->name(),
            'surname' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'treatments' => $this->getTreatmentsDataArray()
        ];
    }


    /**
     * Get an array representing a treatment row.
     *
     * This method generates an array representing a single treatment row with 'id' and 'treatmentName' properties.
     *
     * @param int $index
     * @return array
     */

    public function getTreatmentRow($index)
    {
        $treatmentsArray = $this->getTreatmentsArray();
        return [
            'id' => $index,
            'treatmentName' => $treatmentsArray[array_rand($treatmentsArray)]
        ];
    }

    /**
     * Get an array of treatment data.
     *
     * This method generates an array of treatment data by calling getTreatmentRow() method for a random number of times.
     *
     * @return array
     */

    public function getTreatmentsDataArray()
    {
        $data = [];

        for ($i = 1; $i < rand(1, 10); $i++)
        {
            $data[] = $this->getTreatmentRow($i);
        }

        return $data;
    }
}
