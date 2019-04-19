<tr style="cursor:default" id="{{$w->id}}_his">
    <td>
        @if($w->status == 0)
            <i class="ft-x" style="color:red;cursor:pointer;margin-left: -18px;" onclick="removeWithdraw({{$w->id}})"></i>
        @endif
        {{$w->created_at}}
    </td>
    <td>
        <?php
            if($w->system == 1) { $img = '/files/ya.png'; }
            elseif($w->system == 2) { $img = '/files/payeer.png'; }
            elseif($w->system == 3) { $img = '/files/wm.png'; }
            elseif($w->system == 4) { $img = '/files/qiwi.png'; }
            elseif($w->system == 5) { $img = '/files/beeline.png'; }
            elseif($w->system == 6) { $img = '/files/megafon.png'; }
            elseif($w->system == 7) { $img = '/files/mts.png'; }
            elseif($w->system == 8) { $img = '/files/tele.png'; }
            elseif($w->system == 9) { $img = '/files/visa.png'; }
            elseif($w->system == 10) { $img = '/files/mc.png'; }
        ?>
        <img src="{{$img}}"> {{$w->number}}
    </td>
    <td>{{$w->sum}} N</td>
    <td>
        @if($w->status == 0)
            <div class="tag tag-warning">Ожидание</div>
        @elseif($w->status == 1)
            <div class="tag tag-success">Выполнено</div>
        @elseif($w->status == 2)
            <div class="tag tag-danger">Отменено</div>
        @endif
    </td>
</tr>
