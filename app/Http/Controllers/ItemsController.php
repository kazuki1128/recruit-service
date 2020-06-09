<?php


namespace App\Http\Controllers;

use App\Http\Requests\EditItem;
use App\Http\Requests\CreateItem;
use App\Campany;
use App\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index(int $id)
    {
        // 選ばれたフォルダを取得する
        $current_campany = Campany::find($id);

        // 選ばれたフォルダに紐づくタスクを取得する
        $items = Item::where('campany_id', $current_campany->id)->get();

    return view('items/index', [
        'current_campany_id' => $current_campany->id,
        'items' => $items,
    ]);
    }
    
   /**
    * GET /folders/{id}/tasks/create
    */
    public function showCreateForm(int $id)
    {
        return view('items/create', [
            'campany_id' => $id
        ]);
    }
    
    public function create(int $id, Request $request)
    {
        $current_campany = Campany::find($id);

        $item = new Item();
        $item->content = $request->content;
        $item->due_date = $request->due_date;

        $current_campany->items()->save($item);

        return redirect()->route('items.index', [
            'id' => $current_campany->id,
        ]);
    }
    
    /**
    * GET /folders/{id}/tasks/{task_id}/edit
    */
    public function showEditForm(int $id, int $item_id)
    {
        $item = Item::find($item_id);

        return view('items/edit', [
            'item' => $item,
        ]);
    }
    
   public function edit(int $id, int $item_id, Request $request)
{
    // 1
    $item = Item::find($item_id);

    // 2
    $item->content = $request->content;
    $item->status = $request->status;
    $item->due_date = $request->due_date;
    $item->save();

    // 3
    return redirect()->route('items.index', [
        'id' => $item->campany_id,
    ]);
}
}
