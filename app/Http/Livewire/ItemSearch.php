<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ItemSearch extends Component
{
    public $searchItem;
    public $searchModel;
    public $searchResult;
    public $searchColumns;
    
    public function updateResult()
    {
        if($this->searchItem == ""){
            $this->searchResult = [];
            $this->emit('newResult', $this->searchResult);  
            $this->emit('newSearchItem', $this->searchItem);
            return;
        }
        try {
            $query = DB::table($this->searchModel)->where('id', 'LIKE', '%'.$this->searchItem.'%');
            foreach($this->searchColumns as $column){
                $query->orWhere($column, 'LIKE', '%' . $this->searchItem . '%');
            }    
            $this->searchResult = $query->get();;
            $this->emit('newSearchItem', $this->searchItem);
            $this->emit('newResult', $this->searchResult);   
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function removeUnknownSearchColumn()
    {
        back()->with('search', 'Searching');
        $dbColumn = DB::getSchemaBuilder()->getColumnListing($this->searchModel);
        $cleanColumn = [];
        $passedColumn = (array)$this->searchColumns;
        for($i = 0; $i < sizeof($passedColumn);$i++){
            for($j = 0; $j < sizeof($dbColumn);$j++){
                if($passedColumn[$i] == $dbColumn[$j]){
                    $cleanColumn[] = $passedColumn[$i];
                    break;
                }
            }
            $passedColumn[$i] = null;
        }
        $this->searchColumns = $cleanColumn;
    }

    public function mount()
    {
        $this->removeUnknownSearchColumn();
    }
    
    public function render()
    {
        return view('livewire.item-search');
    }
}
