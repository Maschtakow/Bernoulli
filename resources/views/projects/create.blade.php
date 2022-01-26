@extends('layouts.app')

@section('content')

<div class="" style="width: 425px;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Novo confronto</h2>
            </div>
            <!--
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('projects.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
            -->
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('confrontations.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-6">Time da casa</div>
            <div class="col-6">Visitante</div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <select name="IdTeamHome" id="IdTeamHome" class="form-control">
                        <option value="">Selecione o clube</option>
                        @foreach($projects as $project){
                        <option value="{{$project->IdTeam}}">{{$project->Team}}</option>
                        }
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-1">
                <div class="form-group">
                    <input type="number" min="0" name="GoalsTeamHome" class="form-control numeric" placeholder="Gols">
                </div>
            </div>
            <div class="col-1">X</div>
            <div class="col-1">
                <div class="form-group">
                    <input type="number" min="0" name="GoalsTeamVisitor" class="form-control numeric" placeholder="Gols">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <select name="IdTeamVisitor" id="IdTeamVisitor" class="form-control">
                        <option value="">Selecione o clube</option>
                        @foreach($projects as $project){
                        <option value="{{$project->IdTeam}}">{{$project->Team}}</option>
                        }
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>

    </form>
</div>

<script>
    $(document).ready(function() {
        $('#IdTeamhome').on('change', function() {
            if ($(this).val() == $('#IdTeamVisitor').val()) {
                alert('Selecione outro clube')
                $(this).prop("selectedIndex", 0);
            }
        });
        $('#IdTeamVisitor').on('change', function() {
            if ($(this).val() == $('#IdTeamHome').val()) {
                alert('Selecione outro clube')
                $(this).prop("selectedIndex", 0);
            }
        });
    })
</script>
@endsection