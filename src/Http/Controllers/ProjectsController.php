<?php

namespace Tjventurini\VoyagerProjects\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class ProjectsController extends VoyagerBaseController
{
    /**
     * General validation.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    private function validation(Request $request)
    {
        $request->validate($this->rules(), $this->messages());
    }

    /**
     * Rules for validation.
     *
     * @return array
     */
    private function rules(): array
    {
        $slug_rule = 'required|min:3';

        if (request()->has('id')) {
            $slug_rule .= '|unique:projects';
        }

        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|min:3',
            'slug' => $slug_rule,
            'project_belongstomany_user_relationship' => 'required|exists:users,id',
        ];

        return $rules;
    }

    /**
     * Messages for validation.
     *
     * @return array
     */
    private function messages(): array
    {
        $messages = [
            'project_belongstomany_user_relationship.required' => trans('validation.required', ['attribute' => 'User']),
        ];

        return $messages;
    }

    /**
     * POST BRE(A)D - Store data.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validation($request);
        return parent::store($request);
    }

    /**
     * POST BR(E)AD - Update data.
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validation($request);
        return parent::update($request, $id);
    }
}
