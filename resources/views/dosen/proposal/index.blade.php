@include('layouts_dsn.head')
@include('layouts_dsn.sidebar')


<section class="main-section">
    <div class="text">
        <h5>Proposal</h5>
    </div>
    <div class="content">
        <table class='table table-striped table-bordered table-hover'>
            <thead class='text-center table-dark'>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        NRP
                    </th>
                    <th>
                        Mahasiswa
                    </th>
                    <th>
                        File
                    </th>
                    <th>
                        Keterangan
                    </th>
                    <th>
                        Revisi
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
                        <td colspan='8' class='text-center'>Data Kosong</td>
                    </tr>
                @else
                    <?php $i = 1; ?>
                    @foreach ($datas as $data)
                        <tr>
                            <td>
                                {{ $i++ }}
                            </td>
                            <td>
                                {{ $data->mhs->nrp }}
                            </td>
                            <td>
                                {{ $data->mhs->user->nama }}
                            </td>
                            <td>
                                <a href="/storage/{{ $data->file_mhs }}" download>
                                    <button class="btn btn-primary">
                                        Download
                                    </button>
                                </a>
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#revisionTeacher" onClick="addRevision({{ $data->id }})">
                                    Revisi
                                </button>
                                <div class="modal fade" id="revisionTeacher" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Perbaikan
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/dosen/proposal_dosen/{{ $data->id }}" method="post"
                                                    enctype="multipart/form-data" id='form-revision' class='form'>
                                                    @csrf
                                                    @method('put')
                                                    <div class='mb-3'>
                                                        <label class='form-label'for="file">File</label>
                                                        <p id='filename' class='filename'>{{ $data->file_dsn }}</p>
                                                        <input class='form-control' type="file" id="file"
                                                            name='file_dsn'">
                                                    </div>
                                                    <div class='mb-3'>
                                                        <label class='form-label' for="catatan">Catatan</label>
                                                        <textarea class='form-control' rows='3' name="catatan_dosen" id='catatan'>{{ $data->catatan_dosen }}</textarea>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="edit"
                                                    class='btn btn-secondary'>Revisi</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- <a href="/dosen/proposal_dosen/{{ $data->id }}/edit" name="update"
                                    value="revisi">Revisi</a> --}}
                            </td>
                            <td>
                                {{ $data->keterangan }}
                            </td>
                            <td>
                                @if (is_null($data->file_dsn))
                                    <p>-</p>
                                @else
                                    <a href="/storage/{{ $data->file_dsn }}" download>
                                        <button class="btn btn-primary">
                                            Download
                                        </button>
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if (is_null($data->catatan_dosen))
                                    <p>-</p>
                                @else
                                    {{ $data->catatan_dosen }}
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
