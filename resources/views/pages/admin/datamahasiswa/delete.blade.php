<form action="{{ route('mahasiswa.destroy',$item->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <div class="card-body">
        <h3>Apakah anda yakin ingin menghapus data mahasiswa ini ?</h3>
        <p>Nama : {{ $item->nama_mahasiswa }}</p>
        <p>NPM : {{ $item->npm }}</p>
    </div>
    <div class="card-footer d-flex justify-content-end">
        <button type="button" class="btn btn-outline-secondary float-right mx-2" data-bs-dismiss="modal"
            aria-label="Close">Tutup</button>
        <button type="submit" class="btn btn-danger float-right">Hapus Data Mahasiswa</button>
    </div>
</form>