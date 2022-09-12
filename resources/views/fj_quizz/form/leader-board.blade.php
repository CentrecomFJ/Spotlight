@extends('layouts.adminlte')

@section('content')
<!DOCTYPE html>
<html lang="en">

<body>

    <div class="container">
        <h2>Quizz Leader Board</h2>
        <p>View your rankings</p>
        <div style="overflow-y: scroll;">
            @if(!isset($data[0]->id))
            <div class="container my-5">
                <div class="alert alert-danger text-center" role="alert">
                    Woops looks like no one has attempted any quizzes for your account.
                </div>
            </div>

            <style>
                #leaderboard {

                    display: none;
                }

            </style>
            @endif
            <form id="question_week_submit" enctype="multipart/form-data">
                <select class="custom-select" name="question_week[]" data-width="100%" id="question_week" multiple>
                    @foreach($ques_weeks as $key => $week)
                    <option {{ in_array($week, $question_week) ? 'selected' : ''}} value="{{$week}}">Week {{$week}}</option>
                    @endforeach
                </select>
            </form>
            <hr>
            <a id="reload-btn" href="" class="btn btn-primary pull-rightd">Reload</a>
            <a href="#" class="btn btn-primary pull-rightd" onclick="download_table_as_csv('leaderboard');">Download as CSV</a>
            @if(\Auth::user()->is_qa=='1')
            <a href="/show-leader-answers?question_week={{$question_week}}" class="btn btn-primary pull-rightd">Answer Summary</a>
            <a href="/show-leader-questions?question_week={{$question_week}}" class="btn btn-primary pull-rightd">Questions</a>
            @endif

            <table id="leaderboard" class="table table-striped">
                <thead>
                    <tr>
                        <td> </td>
                        <th>Ranking</th>
                        <th>Week</th>
                        <th>Employee Code</th>
                        <th>Points achieved</th>
                        <th>Total points</th>
                        <th>% percentage</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($data as $datas)
                    <tr>
                        <td>
                            @if($loop->iteration< 4) <img src="{{asset('/img/trophy.png')}}" style="width:30px;">

                                @else

                                <img src="{{asset('/img/star_icon.jfif')}}" style="width:30px;">


                                @endif
                        </td>
                        {{--<td> <img src="https://randomuser.me/api/portraits/women/67.jpg" style="max-width:50px;" class="img-fluid rounded-circle"></td>--}}
                        <td>{{$loop->iteration}}</td>
                        <td>{{$datas->question_week}}</td>
                        <td>{{$datas->name}} </td>
                        <td>{{$datas->total_points_achieved}}</td>
                        <td>{{$datas->total_points}}</td>
                        <td>{{number_format($datas->percentage,2,'.','')}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
@section('scripts')
<script>

    $(document).ready(function() {
        $("#reload-btn").on("click", function(e) {
            e.preventDefault();
            $("form#question_week_submit").submit();
        });
    });

    // // Quick and simple export target #table_id into a csv
    function download_table_as_csv(table_id) {
        // Select rows from table_id
        var rows = document.querySelectorAll('table#' + table_id + ' tr');
        // Construct csv
        var csv = [];
        for (var i = 0; i < rows.length; i++) {
            var row = []
                , cols = rows[i].querySelectorAll('td, th');
            for (var j = 0; j < cols.length; j++) {
                // Clean innertext to remove multiple spaces and jumpline (break csv)
                var data = cols[j].innerText.replace(/(\r\n|\n|\r)/gm, '').replace(/(\s\s)/gm, ' ')
                // Escape double-quote with double-double-quote (see https://stackoverflow.com/questions/17808511/properly-escape-a-double-quote-in-csv)
                data = data.replace(/"/g, '""');
                // Push escaped string
                row.push('"' + data + '"');
            }
            csv.push(row.join(','));
        }
        var csv_string = csv.join('\n');
        // Download it
        var filename = 'export_' + table_id + '_' + new Date().toLocaleDateString() + '.csv';
        var link = document.createElement('a');
        link.style.display = 'none';
        link.setAttribute('target', '_blank');
        link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
        link.setAttribute('download', filename);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

</script>
@endsection


@endsection
