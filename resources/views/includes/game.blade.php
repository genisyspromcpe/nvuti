<?php $game = \App\Game::with(['user'])->find($gameBD->id) ?>
<tr data-user="{{$game->user_id}}" data-game="1" onclick="window.open('/game/?id={{$game->id}}');">
    <td class="text-truncate" style="font-weight:600">{{$game->user->username}}</td>
    <td class="text-truncate @if($game->win == 0) danger @else success @endif"
        style="font-weight:600">{{json_decode($game->game)->win_number}}</td>
    <td class="text-truncate " style="font-weight:600">{{$game->betType}}</td>
    <td class="text-truncate" style="font-weight:600">{{$game->bet}} N</td>
    <td class="text-xs-center font-small-2">
															<span>
																<progress style="margin-top:8px"
                                                                          class="progress progress-sm @if($game->win == 0) progress-danger @else progress-success @endif mb-0"
                                                                          value="{{$game->betPercent}}"
                                                                          max="100"></progress>
															</span>
    </td>
    <td class="text-truncate @if($game->win == 0) danger @else success @endif" style="font-weight:600">{{$game->win}}
        N
    </td>
</tr>
