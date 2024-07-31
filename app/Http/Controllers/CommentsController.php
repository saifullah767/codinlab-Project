<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    public function create (Request $request) {

        $data = $request->all();
        $comment = Comments::set($data);

        if (!$comment) {
            return response()->json([
                'success' => false
            ]);
        }

        return response()->json([
            'comment' => $comment,
            'success' => true
        ]);

    }


}
