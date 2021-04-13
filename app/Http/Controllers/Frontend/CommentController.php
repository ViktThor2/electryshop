<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'required',
        'description' => 'required'
      ]);

      $comment = New Comment;
      $comment->customer_id = \Auth::guard('customer')->user()->id;
      $comment->product_id = $request->input('product_id');
      $comment->name = $request->input('name');
      $comment->description = $request->input('description');
      $comment->save();

      return redirect()->route('product.show', $comment->product_id);
    }
}
