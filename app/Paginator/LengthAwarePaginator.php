<?php

namespace App\Paginator;

use function Hyperf\Support\retry;

class LengthAwarePaginator extends \Hyperf\Paginator\LengthAwarePaginator
{

    protected function addQuery(string $key, null|array|string $value): static
    {
        if ($key !== $this->pageName) {
            $this->query[$key] = $value;
        }

        return $this;
    }

    public function render(?string $view = null, array $data = []): string
    {
        $start = 1;
        $end = 5;
        if ($this->currentPage() < 3) {
            $end = min($end, $this->lastPage());
        } elseif ($this->currentPage() > $this->lastPage() - 3) {
            $start = max($this->lastPage() - 4, 1);
            $end = $this->lastPage();
        } else {
            $start = $this->currentPage() - 2;
            $end = $this->currentPage() + 2;
        }
        if ($this->lastPage() < $this->currentPage()) {
            return "";
        }
        $pageitem = '';
        for ($i = $start; $i <= $end; $i++) {
            $class = $i == $this->currentPage() ? 'btn-warm' : 'btn-default';
            $pageitem .= "<li class=\"hidden-xs\"><a class=\"btn  {$class}\" href=\"{$this->url($i)}\">{$i}</a> </li>";
        }


        return <<<PAGE
                <ul class="myui-page text-center clearfix">
                    <li><a class="btn btn-default" href="{$this->url(1)}">首页</a></li>
                    <li><a class="btn btn-default" href="{$this->previousPageUrl()}">上一页</a></li>
                    {$pageItem}
                    <li class="visible-xs"><a
                            class="btn btn-warm">{$this->currentPage()}/{$this->lastPage()}</a></li>
                    <li><a class="btn btn-default" href="{$this->nextPageUrl()}">下一页</a></li>
                    <li><a class="btn btn-default" href="{$this->url($this->lastPage())}">尾页</a></li>
                </ul>
       PAGE;
    }
}
