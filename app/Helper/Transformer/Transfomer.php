<?php


namespace App\Helper\Transformer;


use Illuminate\Database\Eloquent\Collection;

Abstract class Transfomer

{


    /**
     * transfor a collection
     *
     * @param Collection $item
     * @return array
     */
    public function transformCollection(Collection $item)
    {
        return array_map([$this, 'transform'], $item->toArray());
    }


    /**
     * abstract  method to be implemented
     *
     * @param array $item
     * @return mixed
     */
    public abstract function transform(array $item);
}