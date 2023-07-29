<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" action="{{ old('form_url') }}" method="POST" id="formInput">
            @csrf
            @method('POST')
            <input type="hidden" name="form_url" id="form_url" value="{{ old('form_url') }}">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-semibold" id="formModalLabel">Form Test Candidate</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex flex-column gap-2">
                    <div class="form-group">
                        <label class="form-label" for="nama">Nama</label>
                        <input type="text" class="form-control" placeholder="" name="nama" value="{{ old('nama') }}">
                        @if($errors->has('nama'))
                        <div class="invalid-feedback d-block">
                            {{ $errors->get('nama')[0] }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="jabatan">Jabatan</label>
                        <input type="text" class="form-control" placeholder="" name="jabatan" value="{{ old('jabatan') }}">
                        @if($errors->has('jabatan'))
                        <div class="invalid-feedback d-block">
                            {{ $errors->get('jabatan')[0] }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" id="jenis_kelamin_l" {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }}>
                            <label class="form-check-label" for="jenis_kelamin_l">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="jenis_kelamin_p" {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}>
                            <label class="form-check-label" for="jenis_kelamin_p">
                                Perempuan
                            </label>
                        </div>
                        @if($errors->has('jenis_kelamin'))
                        <div class="invalid-feedback d-block">
                            {{ $errors->get('jenis_kelamin')[0] }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="alamat">Alamat</label>
                        <textarea class="form-control" placeholder="" name="alamat">{{ old('alamat') }}</textarea>
                        @if($errors->has('alamat'))
                            <div class="invalid-feedback d-block">
                                {{ $errors->get('alamat')[0] }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        const formModal = document.getElementById('formModal')
        const formModalBs =  new bootstrap.Modal(formModal)
        const formInput = document.getElementById('formInput')
        const formUrlInput =  document.getElementById('form_url')
        const method = document.querySelector('#formModal [name=_method]')

        @if(old('form_url'))
        formModalBs.show()
        @endif

        formModal.addEventListener('shown.bs.modal', (e) => {
            if (e.relatedTarget) {
                let dataUrl = e.relatedTarget.getAttribute('data-url')
                formInput.action = dataUrl
                formUrlInput.value = dataUrl

                let item = e.relatedTarget.getAttribute('data-item')

                if (item) {
                    item = JSON.parse(item)

                    document.getElementsByName('nama')[0].value = item.nama
                    document.getElementsByName('jabatan')[0].value = item.jabatan
                    document.getElementsByName('alamat')[0].value = item.alamat

                    if (item.jenis_kelamin === 'Laki-laki') document.getElementById('jenis_kelamin_l').checked = true
                    else if (item.jenis_kelamin === 'Perempuan') document.getElementById('jenis_kelamin_p').checked = true
                }

                method.value = 'PUT'
            } else {
                method.value = 'POST'
            }

            console.log(formUrlInput.value)

            if (formUrlInput.value) {
                const lastSegment = formUrlInput.value.split('/').at(-1)

                if (lastSegment && lastSegment !== 'test-candidate') {
                    method.value = 'PUT'
                }
            }
        })
    </script>
@endpush
