<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'long_description', 'completed'];
    protected $id;
    protected $title;
    protected $description;
    protected $long_description;
    protected $completed;


    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getLongDescription()
    {
        return $this->long_description;
    }
    public function getCompleted()
    {
        return $this->completed;
    }
}
