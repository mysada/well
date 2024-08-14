<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactQueryController extends Controller
{

    /**
     * Display a listing of the contact queries.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Fetch and filter items
        $items = ContactQuery::when(
          $request->input('status'),
          function ($query, $status) {
              return $query->where('status', $status);
          }
        )
                             ->orderByDesc('id')
                             ->get();
        $title = 'Queries Management - List';

        return view('admin.pages.queries.index', compact('items', 'title'));
    }

    /**
     * Display the details of a query, including the follow-up notes.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $query         = ContactQuery::findOrFail($id);
        $followUpNotes = Session::get("follow_up_notes.{$id}", '');
        $title         = 'Queries Management - Detail';

        return view(
          'admin.pages.queries.show',
          compact('query', 'followUpNotes', 'title')
        );
    }

    /**
     * Save the follow-up notes temporarily in the session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveFollowUpNotes(Request $request, $id)
    {
        $request->validate([
          'follow_up_notes' => 'nullable|string|max:1000',
        ]);

        $followUpNotes = $request->input('follow_up_notes');
        Session::put("follow_up_notes.{$id}", $followUpNotes);

        return redirect()->route('admin.queries.show', $id)->with(
          'success',
          'Follow-up notes updated.'
        );
    }

    /**
     * Show the form for editing the specified query.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $query = ContactQuery::findOrFail($id);
        $title = 'Queries Management - Detail';
        return view('admin.pages.queries.edit', compact('query', 'title'));
    }

    /**
     * Update the specified query in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
          'name'            => 'required|string|max:255',
          'email'           => 'required|email|max:255',
          'phone'           => 'nullable|string|max:20',
          'subject'         => 'required|string|max:255',
          'message'         => 'required|string|max:1000',
          'follow_up_notes' => 'nullable|string|max:1000',
        ]);

        $query = ContactQuery::findOrFail($id);
        $query->update($request->all());

        return redirect()->route('admin.queries')->with(
          'success',
          'Query details updated successfully.'
        );
    }

    /**
     * Update the status of the query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus(Request $request, $id)
    {
        $query = ContactQuery::findOrFail($id);
        $query->update(['status' => $request->status]);

        return redirect()->route('admin.queries')->with(
          'success',
          'Query status updated successfully.'
        );
    }

    /**
     * Soft delete a query.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $query = ContactQuery::findOrFail($id);
        $query->delete();

        return redirect()->route('admin.queries')->with(
          'success',
          'Query deleted successfully.'
        );
    }

}
