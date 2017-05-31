<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all();
        return response()->json($post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = Post::create([
            'title' => $request->title,
            'post' => $request->post
        ]);

        if ($create) {
            return response()->json([
                'success' => true,
                'message' => 'Post berhasil ditambahkan!'
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post gagal ditambahkan!'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = Post::findOrFail($id);
        return response()->json($detail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Post::findOrFail($id)->update([
            'title' => $request->title,
            'post' => $request->post
        ]);

        if ($update) {
            return response()->json([
                'success' => true,
                'message' => 'Post berhasil diupdate!'
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post gagal diupdate!'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Post::findOrFail($id)->delete();
        if ($delete) {
            return response()->json([
                'success' => true,
                'message' => 'Post berhasil dihapus!'
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post gagal dihapus!'
            ]);
        }
    }
}
