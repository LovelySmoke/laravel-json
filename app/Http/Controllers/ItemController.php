<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
use App\Models\FilteredItem;
  
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

        $filtereditems = Item::where('data->price','<', 50)
            ->whereJsonContains('data->instock','yes')
            ->get();

        $filteredItemsTableName = 'filtered_items';

        DB::beginTransaction();

        try {

            item::whereIn('id', $filtereditems->pluck('id'))->delete();
           
            foreach ($filtereditems as $item){
                DB::table($filteredItemsTableName)->insert([
                    'title' => $item->title,
                    'data' =>  json_encode($item->data)
                ]);
            }
            
            if (DB::transactionLevel() > 1 ){
                DB::commit();
            }

        } catch(\Exception $e){
            DB::rollback();
            throw $e;         
        }

        $refresheditems = Item::all();

        dd($refresheditems);


    }
}



