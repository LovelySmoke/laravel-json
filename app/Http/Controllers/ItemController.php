<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Item;
  
class ItemController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        for ($i = 1; $i <=50; $i++) {

        $input = [
            'title' => 'Demo Title',
            'data' => [
                'price' => rand(5,100),
                'instock' =>(rand(0,1) === 1) ? 'yes' : 'no'

            ]
        ];
  
        $item = Item::create($input);
        }
        dd($item->data);
  
    }
}