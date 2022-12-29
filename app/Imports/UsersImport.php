<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model( array $row)
    {

    }
//
//    public function rules(): array
//    {
//        return [
//            '0' => 'required',
//            '1' => 'required',
//            '2' => 'required|unique:users,email',
//            '3' => 'required',
//            '4' => 'required',
//
//        ];
//    }
//    public function customValidationMessages()
//    {
//        return [
//            '0.required' => 'This name  is empty.',
//            '1.required' => 'This role  is empty.',
//            '2.unique' => 'This email is already exit',
//            '2.required' => 'This email  is empty.',
//            '3.required' => 'This addres  is empty.',
//            '4.required' => 'This password  is empty.',
//        ];
//    }
}
