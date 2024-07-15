<?php
namespace App\Components;

use Hyperf\Database\Model\Collection;
use Hyperf\ViewEngine\Component\Component;
use function Hyperf\ViewEngine\view;
use App\Model\Vod;
use Hyperf\DbConnection\Db;
class TestComponent extends Component
{

    /**
     * @var  Collection<Vod> $vods
     */
    public Collection $vods ;
    public function __construct(){
      
       $this->vods= Vod::query()->forPage(1,15)->get();;
      $vodTypes= Db::table("vod_type")->select(["id"])->where(["parent_id",'=','1'])->get();
      $typeIds=$vodTypes->pluck('id')->toArray();
    }
    public function render(): mixed
    {
        return <<<'BLADE'
            @foreach($vods as $vod)
                {{$slot}}
            @endforeach
           
        
        BLADE;
    
    }
}