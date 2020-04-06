@if (Auth::user()->role == "master")
    <div class="mt-3">
        <form action="{!! URL::to('/admin/clear_'.$value) !!}" method="GET">
            <input type="submit" class="btn btn-warning" value="Pulisci" />
        </form>
    </div>
@endif