<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public static function set ($data)
    {
        if (array_key_exists('id', $data) && !empty($data['id']))
            $project = self::find($data['id']);
        else
            $project = new self();

        if (array_key_exists('name', $data))
            $project->name = $data['name'];

        if (array_key_exists('description', $data))
            $project->description = $data['description'];


        $project->save();

        return $project;
    }

    public static function getAllData () {
        return self::all();
    }

    public static function getById ($project_id) {
        return self::find($project_id);
    }

    public static function getByUSerId ($user_id) {
        return self::where('user_id', $user_id)->get();
    }

}
