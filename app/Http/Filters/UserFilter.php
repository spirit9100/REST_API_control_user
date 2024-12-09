<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class UserFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const SORT = 'sort';


    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::SORT => [$this, 'sorting'],

        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'LIKE', "%{$value}%");
    }

    public function sorting(Builder $builder, $value)
    {
        $builder->orderBy('name', $value);


    }
}
