<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
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

        if (array_key_exists('comment', $data))
            $project->comment = $data['comment'];

        $project->save();

        return $project;
    }

    public static function getById ($project_id) {
        return self::find($project_id);
    }

    public static function getByProjectId ($project_id) {
        return self::where('project_id', $project_id)->get();
    }
}
