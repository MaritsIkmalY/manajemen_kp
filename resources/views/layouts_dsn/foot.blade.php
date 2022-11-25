<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="{{ url('js/script.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js%22%3E"></script>
<script>
    function addNote(id) {
        $.get(`/dosen/monitoring_dosen/${id}/edit`, (data) => {
            $('#form-note').prop('action', `/dosen/monitoring_dosen/${id}`)
            $('#catatan').val(data[0].catatan)
        });
    }

    function addRevision(id) {
        $.get(`/dosen/proposal_dosen/${id}/edit`, (data) => {
            $('#form-revision').prop('action', `/dosen/proposal_dosen/${id}`)
            $('#catatan').val(data[0].catatan_dosen)
            $('#filename').text(data[0].file_dsn)
        });
    }
</script>
</body>

</html>
