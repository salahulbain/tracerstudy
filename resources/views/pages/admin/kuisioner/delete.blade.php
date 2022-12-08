<form action="{{ route('kuisioner.destroy',$item->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <div class="card-body">
        <h3>Apakah anda yakin ingin menghapus data responden ini ?</h3>
        <p>Nama : {{ $item->nmmhsmsmh }}</p>
        <p>NPM : {{ $item->nimhsmsmh }}</p>
    </div>
    <div class="card-footer d-flex justify-content-end">
        <button type="button" class="btn btn-outline-secondary float-right mx-2" data-bs-dismiss="modal"
            aria-label="Close">Tutup</button>
        <button type="submit" class="btn btn-danger float-right">Hapus Data Responden</button>
    </div>
</form>