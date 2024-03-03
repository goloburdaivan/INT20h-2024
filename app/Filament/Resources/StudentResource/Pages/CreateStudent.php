<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use App\Models\Student;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class CreateStudent extends CreateRecord
{
    protected static string $resource = StudentResource::class;

    protected function handleRecordCreation(array $data): Model
    {

        $student = new Student();
        $student->name = $data['name'];
        $student->surname = $data['surname'];
        $student->pass_num = $data['pass_num'];
        $student->last_name = $data['last_name'];
        $student->attestat = $data['attestat'];
        $student->email = $data['email'];
        $student->group_id = $data['group_id'];
        $student->password = Hash::make($data['password']);
        $student->status = $data['status'];

        $user = new User();
        $user->password = Hash::make($data['password']);
        $user->email = $data['email'];
        $user->name = $data['name'];
        $user->save();
        $student->user_id = $user->id;
        $student->save();

        return $student;
    }
}
