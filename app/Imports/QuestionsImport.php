<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class QuestionsImport implements ToModel, WithHeadingRow
{

    private $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $datas = array_merge($row,$this->data);

        return new Question([
            'subject_id'    => $datas['subject_id'],
            'question'      => $datas["question"],
            'option_1'      => $datas['option_1'],
            'option_2'      => $datas['option_2'],
            'option_3'      => $datas['option_3'],
            'option_4'       => $datas['option_4'],
            'answers' => $datas['answers'],
            'explanation' => $datas['explanation'],
            'hint' => $datas['hint'],
            'status' => $datas['status'],
            'level' => $datas['level'],
        ]);
    }
}
