<h5><strong>Comments</strong></h5>
<div class="comments">
    @if ($ticket->comments->isEmpty())

    <p>There are currently no comments.</p>

    @else

    @foreach($ticket->comments as $comment)
    <div class="panel panel-@if($ticket->user->id === $comment->user_id){{"default"}}@else{{"success"}}@endif">
        <div class="panel panel-heading">
            <span class="pull-right">  {{ $comment->user->name }} on {{ $comment->created_at }}</span>
        </div>

        <div class="panel panel-body">
            {!! $comment->comment !!}
        </div>
    </div>
    <hr>
    @endforeach

    @endif
</div>