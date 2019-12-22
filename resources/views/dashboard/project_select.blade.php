<?php
    // check if user can acces projects
if (!\Auth::user()->hasPermission('browse_projects')) {
    return;
}
    // get project model
    $Model = app(config('voyager-projects.models.project'));
    // get project from GET or SESSION
    $selected_project = session('project', null);
?>

<style type="text/css">
    #project-select-form-select {
        width: 100%;
    }
</style>

<div id="project-select">
    <form id="project-select-form" method="GET">
        <select name="project" id="project-select-form-select">
            <option value="all">{{ trans('projects::projects.project_select.show_all') }}</option>
            <?php
                $projects = $Model->withoutGlobalScope(\Tjventurini\VoyagerProjects\Scopes\ProjectSession::class)
                                    ->get();
            ?>
            @foreach ($projects as $Project)
                <option 
                    value="{{ $Project->slug }}" 
                    @if ($selected_project && $Project->slug == $selected_project) selected="selected" @endif
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