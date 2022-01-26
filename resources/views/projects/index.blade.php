@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>APP FUTEBOL - Resultado</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success text-light" data-toggle="modal" id="mediumButton" data-target="#mediumModal" data-attr="{{ route('teams.create') }}" title="Inserir confrnto">Inserir confronto</i>
            </a>
        </div>
        <!--
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('teams.create') }}" title="Create a project"> <i class="fas fa-plus-circle"></i>
            </a>
        </div>
        -->
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered table-responsive-lg">
    <tr>
        <th colspan="2">Posicao</th>
        <th>PTS</th>
        <th>J</th>
        <th>V</th>
        <th>E</th>
        <th>D</th>
        <th>GP</th>
        <th>GC</th>
        <th>SG</th>
    </tr>
    <?php 
    $x = 1;   
    ?>
    @foreach ($projects as $project)
    <?php 
    if($x == 1) $class = 'text-success';
    else if($x >= 2 && $x <= 7) $class = 'text-primary';
    else if($x >= 8 && $x <= 14) $class = 'text-secondary';
    else if($x >= 17 && $x <= 20) $class = 'text-danger';
    else $class = null;
    $x++;
    ?>
    <tr class="<?php echo $class ?>">
        <td>{{ ++$i }}</td>
        <td >{{ $project->Team }}</td>
        <td>{{ $project->PTS }}</td>
        <td>{{ $project->J }}</td>
        <td>{{ $project->V }}</td>
        <td>{{ $project->E }}</td>
        <td>{{ $project->D }}</td>
        <td>{{ $project->GP }}</td>
        <td>{{ $project->GC }}</td>
        <td>{{ $project->SG }}</td>
    </tr>
    @endforeach
</table>

<!-- {!! $projects->links() !!} -->

<!-- small modal -->
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <div>
                    <!-- the result to be displayed apply here -->
                </div>
            </div>
        </div>
    </div>
</div>


<!-- medium modal -->
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="mediumBody">
                <div>
                    <!-- the result to be displayed apply here -->
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // display a modal (small modal)
    $(document).on('click', '#smallButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#smallModal').modal("show");
                $('#smallBody').html(result).show();
            },
            complete: function() {
                $('#loader').hide();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000
        })
    });

    // display a modal (medium modal)
    $(document).on('click', '#mediumButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#mediumModal').modal("show");
                $('#mediumBody').html(result).show();
            },
            complete: function() {
                $('#loader').hide();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000
        })
    });
</script>

@endsection