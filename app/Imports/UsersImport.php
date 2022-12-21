<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            "first_name" => $row['first_name'],
            "second_name" => $row['second_name'],
            "last_name" => $row['last_name'],
            "email" => $row['email'],
            "phone" => $row['phone'],
            "gender" => $row['gender'],
            "jumuiya_id" => $row['jumuiya'],
            "date_of_birth" => gmdate("Y-m-d", ($row['birthdate'] - 25569) * 86400),
            "role_id" => "1", // User Type User
            "enabled" => true,
            "password" => Hash::make('password')
        ]);
    }

 
}
