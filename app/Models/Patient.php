<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    private static $instance;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Patient();
        }
        return self::$instance;
    }


    public function getDataArray()
    {
        $data = [];

        for ($i = 1; $i < rand(1, 20); $i++)
        {
            $data[] = $this->getRowArray($i);
        }

        return $data;
    }

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

    public function getTreatmentRow($index)
    {
        $treatmentsArray = $this->getTreatmentsArray();
        return [
            'id' => $index,
            'treatmentName' => $treatmentsArray[array_rand($treatmentsArray)]
        ];
    }

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
