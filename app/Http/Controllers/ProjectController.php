<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Project;
use App\Models\User;
use App\Models\UserProject;
use Illuminate\Http\Request;
use \Auth;


class ProjectController extends Controller
{
    
    public static function index(Request $request) {

        $user = Auth::user();
        $projects = [];

        if (!$user->is_admin) {
            $user_projects = UserProject::getByUserId($user->id);

            foreach ($user_projects as $value) {
                $project_ = Project::getById($value['project_id']);
                $projects[] = $project_;
            }
            
        } else {
            $projects = Project::getAllData();
        }

        return view('app.projects', [
            'projects' => json_encode($projects)
        ]);

    }

    public function create (Request $request) {

        $data = $request->all();
        $project = Project::set($data);

        if (!$project) {
            return response()->json([
                'success' => false
            ]);
        }

        return response()->json([
            'projecrt' => $project,
            'success' => true
        ]);

    }

    public function projectDetailPage ($project_id) {

        $project = Project::getById($project_id);
        $comments = Comments::getByProjectId($project_id);
        $user = Auth::user();

        $commentsWithUserNames = $comments->map(function ($comment) {
            $user = User::getById($comment->user_id);
            return [
                'id' => $comment->id,
                'comment' => $comment->comment,
                'user_id' => $comment->user_id,
                'user_name' => $user->name,
                'created_at' => $comment->created_at,
            ];
        });

        return view('app.project', [
            'project' => json_encode($project),
            'comments' => json_encode($commentsWithUserNames),
            'user' => json_encode($user)
        ]);
    }

}
