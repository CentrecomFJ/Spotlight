@extends('layouts.atn_app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<body>

    <div class="container">
        <h2>User - Weekly Quiz Answers</h2>
        <p>Select week and extract</p>
        <div style="overflow-y: scroll;">
            <form id="question_week_submit">
                <select class="form-control" name="question_week" data-width="100%" id="question_week">
                    <option value="0">Select Week</option>
                    <option value="1">Week 1</option>
                    <option value="2">Week 2</option>
                    <option value="3">Week 3</option>
                    <option value="4">Week 4</option>
                    <option value="5">Week 5</option>
                    <option value="6">Week 6</option>
                    <option value="7">Week 7</option>
                    <option value="8">Week 8</option>
                    <option value="9">Week 9</option>
                    <option value="10">Week 10</option>
                    <option value="11">Week 11</option>
                    <option value="12">Week 12</option>
                    <option value="13">Week 13</option>
                    <option value="14">Week 14</option>
                    <option value="15">Week 15</option>
                    <option value="16">Week 16</option>
                    <option value="17">Week 17</option>
                    <option value="18">Week 18</option>
                    <option value="19">Week 19</option>
                    <option value="20">Week 20</option>
                    <option value="21">Week 21</option>
                    <option value="22">Week 22</option>
                    <option value="23">Week 23</option>
                    <option value="24">Week 24</option>
                    <option value="25">Week 25</option>
                    <option value="26">Week 26</option>
                    <option value="27">Week 27</option>
                    <option value="28">Week 28</option>
                    <option value="29">Week 29</option>
                    <option value="30">Week 30</option>
                    <option value="31">Week 31</option>
                    <option value="32">Week 32</option>
                    <option value="33">Week 33</option>
                    <option value="34">Week 34</option>
                    <option value="35">Week 35</option>
                    <option value="36">Week 36</option>
                    <option value="37">Week 37</option>
                    <option value="38">Week 38</option>
                    <option value="39">Week 39</option>
                    <option value="40">Week 40</option>
                    <option value="41">Week 41</option>
                    <option value="42">Week 42</option>
                    <option value="43">Week 43</option>
                    <option value="44">Week 44</option>
                    <option value="45">Week 45</option>
                    <option value="46">Week 46</option>
                    <option value="47">Week 47</option>
                    <option value="48">Week 48</option>
                    <option value="49">Week 49</option>
                    <option value="50">Week 50</option>
                    <option value="51">Week 51</option>
                    <option value="52">Week 52</option>
                </select>
            </form>
        </div>
    </div>

</body>

</html>

<script>
    $("#question_week").change(function() {
        $("form#question_week_submit").submit();
        // alert('change');


    });

    $(function() {

        $("#question_week").val({{ $question_week ?? 30 }});
    });

    // // Quick and simple export target #table_id into a csv
    function download_table_as_csv(table_id) {
        // Select rows from table_id
        var rows = document.querySelectorAll('table#' + table_id + ' tr');
        // Construct csv
        var csv = [];
        for (var i = 0; i < rows.length; i++) {
            var row = [],
                cols = rows[i].querySelectorAll('td, th');
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