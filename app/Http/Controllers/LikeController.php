<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Posts;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function increaseLike(Posts $post)
    {
        $post->increment('like_pt'); // Tăng giá trị cột 'like_pt' của bài viết
        return response()->json(['success' => true, 'likes' => $post->like_pt]);
    }
    public function increaseCommentLike($comment_id)
{
    $comment = Comment::find($comment_id);

    if (!$comment) {
        return response()->json(['success' => false, 'message' => 'Bình luận không tồn tại.']);
    }

    $comment->increment('like_count'); // Tăng giá trị cột 'like_count' của bình luận
    return response()->json(['success' => true, 'likes' => $comment->like_count]);
}

}
