<?php
    // get project model
    $Model = app(config('voyager-projects.models.project'));
    // get project from GET or SESSION
    $selected_project = request()->input('project', false) || session('project', false);
?>

<style type="text/css">
    #project-select-form-select {
        width: 100%;
    }
</style>

<div id="project-select">
    <form id="project-select-form" method="GET" action="?">
        <select name="project" id="project-select-form-select">
            <option value="">{{ trans('projects::projects.project_select.please_select') }}</option>
            @foreach ($Model->all() as $Project)
                <option 
                    value="{{ $Project->slug }}" 
                    @if ($Project->slug == $selected_project) selected="selected" @endif
                >{{ $Project->name }}</option>
            @endforeach
        </select>
    </form>
</div>

<script>
    // set event on select
    document.querySelector('select#project-select-form-select').addEventListener('change', function(){
        // submit form
        document.querySelector('form#project-select-form').submit();
    });
</script>