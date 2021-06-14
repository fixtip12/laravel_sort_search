<?php

namespace App\Repositories;

use App\Models\Todo;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

/**
 * Class TodoRepository
 * @package App\Repositories
 * @version June 15, 2021, 12:32 am JST
*/

class TodoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'title',
        'status'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Todo::class;
    }

    public function search(?string $sort,?string $status)
    {
        $todos = Todo::where('user_id',Auth::id());

        if(!empty($sort)){
            $this->sort($todos,$sort);
        }

        // 空文字の'0'がパラメータで渡ってくるため、issetで判定
        if (isset($status)) {
            $todos->where('status',$status);
        }

        return $todos->get();
    }

    private function sort($todos,$sort)
    {
        $todos->when($sort === 'titleAsc',function($query){
            $query->orderBy('title');
        })
        ->when($sort === 'titleDesc', function ($query) {
            $query->orderByDesc('title');
        })
        ->when($sort === 'statusAsc', function ($query) {
            $query->orderBy('status');
        })
        ->when($sort === 'statusDesc', function ($query) {
            $query->orderByDesc('status');
        });

        return $todos;
    }
}
