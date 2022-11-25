@include('layouts_dsn.head')
@include('layouts_dsn.sidebar')


<section class="main-section">
    <div class="text">
        <h5>Monitoring</h5>
    </div>
    <div class="content">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark text-center">
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Mahasiswa
                    </th>
                    <th>
                        Kelas
                    </th>
                    <th>
                        File
                    </th>
                    <th>
                        Keterangan
                    </th>
                    <th>
                        Catatan
                    </th>
                    <th>
                        Waktu
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (count($datas) == 0)
                    <tr>
                        <td colspan='7'>Data Kosong</td>
                    </tr>
                @else
                    <?php $i = 1; ?>
                    @foreach ($datas as $data)
                        <tr>
                            <td>
                                {{ $i++ }}
                            </td>
                            <td>
                                {{ $data->mhs->user->nama }}
                            </td>
                            <td>
                                {{ $data->mhs->kelas }}
                            </td>
                            <td>
                                <a href="/storage/{{ $data->file_mhs }}" download>
                                    <button class="btn btn-primary">
                                        Download
                                    </button>
                                </a>
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#note-section" onClick="addNote({{ $data->id }})">
                                    Catatan
                                </button>
                                <div class="modal fade" id="note-section" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Catatan
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/dosen/monitoring_dosen/{{ $data->id }}"
                                                    method="post" enctype="multipart/form-data" id='form-note'>
                                                    @csrf
                                                    @method('put')
                                                    <div>
                                                        <label for="catatan">Catatan</label>
                                                        <textarea name="catatan" id='catatan'>{{ $data->catatan }}</textarea>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="edit"
                                                    class='btn btn-secondary'>Kirim</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ $data->keterangan }}
                            </td>
                            <td>
                                @if (is_null($data->catatan))
                                    -
                                @else
                                    {{ $data->catatan }}
                                @endif
                            </td>
                            <td>
                                {{ $data->created_at->diffForHumans() }}
                            </td>
                        </tr>
                    @endforeach
            </tbody>
            @endif
        </table>
    </div>
</section>
@include('layouts_dsn.foot')
