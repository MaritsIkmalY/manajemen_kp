@include('layouts_mhs.head')
@include('layouts_mhs.sidebar')
<section class="main-section">
    <div class="text">
        <h5>Pengumpulan Proposal</h5>
    </div>
    <div class="content">
        <table class='table table-bordered table-striped table-hover'>
            <thead class='table-dark'>
                <tr class='text-center'>
                    <th>
                        #
                    </th>
                    <th>
                        Mahasiswa
                    </th>
                    <th>
                        Dosen
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

                <tr>
                    @if (count($datas) == 0)
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
                            {{ $data->dsn->user->nama }}
                        </td>
                        <td>
                            <a href="/storage/{{ $data->file_mhs }}" download>
                                <button class='btn btn-primary'>
                                    Download
                                </button>
                            </a>
                            {{-- <a href="/mahasiswa/proposal_mahasiswa/{{ $data->id }}/edit" name="update" value="update">
                                <button class="btn btn-secondary">
                                    Edit
                                </button>
                            </a> --}}

                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                data-bs-target="#editProposal" onClick="editProposal({{ $data->id }})">
                                Edit
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="editProposal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Pengumpulan Proposal
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id='form-edit'
                                                action="/mahasiswa/proposal_mahasiswa/{{ $data->id }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div>
                                                    <label for="file">File</label>
                                                    <p id='filename'>
                                                        {{ $data->file_mhs }}
                                                    </p>
                                                    <input type="file" id="file" name='file_mhs'
                                                        value="{{ $data->file_mhs }}">
                                                </div>
                                                <div>
                                                    <label for="keterangan">keterangan</label>
                                                    <textarea name="keterangan" id='keterangan'>{{ $data->keterangan }}</textarea>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="update"
                                                class='btn btn-secondary'>Edit</button>
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
        <br>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createProposal">
            Pengumpulan Proposal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="createProposal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Pengumpulan Proposal</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('proposal_mahasiswa.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="dosen">Dosen Pembimbing</label>
                                <select name="id_dosen" id="dosen">
                                    @foreach ($dosens as $dosen)
                                        <option value="{{ $dosen->id }}">{{ $dosen->user->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <input type="file" name="file_mhs">
                            </div>
                            <div>
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan"></textarea>
                            </div>
                            <input type="hidden" name='id_mhs' value={{ $id_mhs[0]->id }}>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class='submit'>Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts_mhs.foot')
