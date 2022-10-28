<?php

namespace App\Http\Controllers;

use App\Models\genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class genreController extends Controller
{
    public function getGenres()
    {
        $genre = new genre();
        $genreArray = $genre::all();
        return view('index', ['GenreArray' => $genreArray]);
    }

    public static function addGenre(Request $request)
    {
        DB::table('genre')->insert([
            'name' => $request->input('genre-name'),
            'display' => $request->input('genre-display')
        ]);
    }

    public static function updateGenre(Request $request, $id)
    {
        $genre = genre::find($id);
        if ($genre) {
            $genre->name = $request->input('genre-name');
            $genre->display = $request->input('genre-display');
            $genre->update();
            return response()->json([
                'status' => 200,
                'genre' => 'Genre updated successfully'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Genre not found'
            ]);
        }
    }

    public static function deleteGenreByName($name)
    {
        DB::table('genre')->where('name', '=', $name)->delete();
    }

    public static function hasGenreName($name)
    {
        $genreArray = DB::table('genre')->select()->where('name', '=', $name);
        return $genreArray;
    }

    // public static function getGenreByName($name)
    // {
    //     $sql = "SELECT * FROM genre WHERE name='$name'";

    //     $arr = toArray(execute($sql));

    //     if (count($arr) > 0) {
    //         $row = $arr[0];

    //         return new Genre($row['name'], $row['display']);
    //     }
    //     return null;
    // }

    // public static function getGenresByOrder($orderBy, $orderDir)
    // {
    //     $sql = "SELECT * FROM genre ORDER BY $orderBy $orderDir";

    //     $arr = toArray(execute($sql));

    //     $arr2 = array();

    //     foreach ($arr as $row) {
    //         array_push($arr2, new Genre($row['name'], $row['display']));
    //     }
    //     return $arr2;
    // }

    // public static function getGenresByQuery($sql)
    // {
    //     $arr = toArray(execute($sql));

    //     $arr2 = array();

    //     foreach ($arr as $row) {
    //         array_push($arr2, new Genre($row['name'], $row['display']));
    //     }
    //     return $arr2;
    // }

    // public static function getGenreCount()
    // {
    //     $sql = "SELECT * FROM genre";

    //     $result = execute($sql);

    //     return $result->num_rows;
    // }

    // public static function getGenresByProduct($name)
    // {
    //     $sql = "SELECT * FROM genre,product_genre WHERE genre.name=product_genre.genre_name and product_genre.product_name='$name' ";

    //     $arr = toArray(execute($sql));

    //     $arr2 = array();

    //     foreach ($arr as $row) {
    //         array_push($arr2, new Genre($row['name'], $row['display']));
    //     }
    //     return $arr2;
    // }
}
