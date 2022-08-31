<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    public static $wrap = 'book';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'author' => $this->author->name,
            'book_details' => [
                'department' => $this->bookdetail->department->name,
                'language' => $this->bookdetail->language,
                'year' => $this->bookdetail->year,
                'image' => $this->bookdetail->image,
            ],
            '_links' => [
                '_self' => url('api/books/' . $this->id)
            ],

        ];
    }
}
