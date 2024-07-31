<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProject extends Model
{
    use HasFactory;

    public static function set ($data)
    {
        if (array_key_exists('id', $data) && !empty($data['id']))
            $project = self::find($data['id']);
        else
            $project = new self();

        if (array_key_exists('user_id', $data))
            $project->user_id = $data['user_id'];

        if (array_key_exists('project_id', $data))
            $project->project_id = $data['project_id'];


        $project->save();

        return $project;
    }

    public static function getByUserId($user_id) {
        return self::where('user_id', $user_id)->get();
    }
}
