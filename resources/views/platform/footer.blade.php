Welcome
<?php
echo \App\Models\Organization::query()->where("id","=",\Illuminate\Support\Facades\Auth::user()->org_id)?->first()?->name ?? "Organization Name";
