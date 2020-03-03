<div class="card mb-2">
    <div class="card-body">
        <div class="row">
            <div class="col-sm text-center pt-2">
                {{ $link->text }} - Link
            </div>
            <div class="col-sm text-center">
                <button class="btn btn-primary d-inline-block" data-toggle="modal" data-target="#modal-for-card-{{ $link->id }}">
                    Modifica
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-for-card-{{ $link->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Modifica
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="/admin/edit_links" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Testo</label>
                    <input type="input" class="form-control" id="text" name="text" value="{{ $link->text }}">
                </div>
                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="input" class="form-control" id="link" name="link" value="{{ $link->link }}">
                </div>
                <input type="hidden" name="id" value="{{ $link->id }}">
                <input type="hidden" name="db" value="parlanodinoi">
                <input type="hidden" name="pg_name" value="{{ $link->page_id }}">
                <button type="submit" class="btn btn-primary w_classic">Salva</button>
            </form>
            <form method="POST" action="/admin/delete_links" class="pt-3">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $link->id }}">
                        <input type="hidden" name="db" value="parlanodinoi">
                        <button class="btn btn-danger w_classic" type="submit">Elimina</button>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
            </div>
        </div>
    </div>
</div>
