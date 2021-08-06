<?php

namespace App\Imports;

use App\Post;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class PostsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Post([
            'title' => $row['title'],
            'description' => $row['description'], 
            'status' => $row['status'],
            'user_id' => $row['user_id'],
        ]);
    }
}
