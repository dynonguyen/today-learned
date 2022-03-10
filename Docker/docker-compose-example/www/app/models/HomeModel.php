<?php
class HomeModel
{
    protected $table = 'home';

    public function getList()
    {
        return ["Orange", "Yellow", "Red"];
    }
}
