<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TweetController extends Controller
{
    function show() {
        $tweets = DB::table('tweet')->get();
        return view("showTweets", [ "allTweets" => $tweets]);
    }

    function showTweet($id) {
        $tweets = DB::table('tweet')->get();
        if($id > sizeOf($tweets)) {
            return view("tweetError");
        }
        return view("showTweets", [ "allTweets" => [$tweets[$id]]]);
    }

    function addTweet(Request $request) {
        DB::insert("INSERT INTO tweet (author, content)
        VALUES ('$request->author','$request->content');");
        $tweets = DB::table('tweet')->get();
        return view("showTweets", [ "allTweets" => $tweets]);
    }

    function selectTweet (Request $request) {
        $tweets = DB::table("tweet")->where("id","$request->id")->first();
        return view("showFormUpdate", [ "tweet" => $tweets]);
    }

    function updateTweet (Request $request) {
        DB::insert("UPDATE tweet SET author='$request->author', content='$request->content' WHERE id=$request->id");
        $tweets = DB::table('tweet')->get();
        return view("showTweets", [ "allTweets" => $tweets]);
    }

    function deleteTweet(Request $request) {
        DB::delete("DELETE FROM tweet WHERE id=$request->id");
        $tweets = DB::table('tweet')->get();
        return view("showTweets", [ "allTweets" => $tweets]);
    }
}
