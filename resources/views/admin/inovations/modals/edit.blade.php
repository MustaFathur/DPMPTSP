@foreach($inovations as $inovation)
<div id="editInovationModal-{{ $inovation->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" data-modal-hide="editInovationModal-{{ $inovation->id }}"></div>
    <div class="relative p-4 w-full max-w-2xl mx-auto my-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800 max-h-[90vh] overflow-y-auto">
            <!-- Modal header - Fixed position -->
            <div class="sticky top-0 z-10 bg-white dark:bg-gray-800 px-6 py-4 border-b dark:border-gray-600">
                <div class="flex justify-between items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white flex items-center">
                        Ubah Inovasi
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editInovationModal-{{ $inovation->id }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <form id="editInovationForm-{{ $inovation->id }}" action="{{ route('inovation.update', $inovation->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="p-6 space-y-6">
                    <div class="sm:col-span-2">
                        <label for="nama-{{ $inovation->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Inovasi</label>
                        <input type="text" name="nama" id="nama-{{ $inovation->id }}" value="{{ $inovation->nama }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="deskripsi-{{ $inovation->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi (maksimal 150 karakter)</label>
                        <textarea name="deskripsi" id="deskripsi-{{ $inovation->id }}" maxlength="150" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500">{{ $inovation->deskripsi }}</textarea>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="url-{{ $inovation->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">URL</label>
                        <input type="url" name="url" id="url-{{ $inovation->id }}" value="{{ $inovation->url }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="logo-{{ $inovation->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Logo Inovasi</label>
                        <div class="flex items-center justify-center w-full">
                            <label for="logo-{{ $inovation->id }}" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500">
                                <div class="flex flex-col items-center justify-center pt-4 pb-3">
                                    <svg class="w-7 h-7 mb-3 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="mb-1 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG or GIF (MAX. 10MB)</p>
                                </div>
                                <input type="file" name="logo" id="logo-{{ $inovation->id }}" class="hidden" accept="image/*">
                            </label>
                        </div>
                        <div id="logo-preview-{{ $inovation->id }}" class="mt-4 grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-medium text-gray-900 dark:text-white mb-2">Gambar Lama</p>
                                @if($inovation->pictures->isNotEmpty())
                                    <div class="relative group aspect-w-16 aspect-h-9">
                                        <img src="{{ asset('storage/' . $inovation->pictures->first()->nama_file) }}" alt="Gambar Lama" class="object-cover rounded-lg w-full h-full">
                                    </div>
                                @else
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Tidak ada gambar lama</p>
                                @endif
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900 dark:text-white mb-2">Gambar Baru</p>
                                <div class="aspect-w-16 aspect-h-9" id="new-image-preview-{{ $inovation->id }}"></div>
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="is_published-{{ $inovation->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Publikasi</label>
                        <select name="is_published" id="is_published-{{ $inovation->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500">
                            <option value="1" {{ $inovation->is_published ? 'selected' : '' }}>Ya</option>
                            <option value="0" {{ !$inovation->is_published ? 'selected' : '' }}>Tidak</option>
                        </select>
                    </div>
                </div>
                <div class="sticky bottom-0 bg-white dark:bg-gray-800 px-6 py-4 border-t border-gray-200 dark:border-gray-600">
                    <div class="flex items-center justify-end space-x-2">
                        <button type="button" data-modal-toggle="editInovationModal-{{ $inovation->id }}" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            Batal
                        </button>
                        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('[id^="editInovationForm-"]').forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(this);

            const deskripsi = formData.get('deskripsi');
            if (deskripsi.length > 150) {
                Swal.fire({
                    title: 'Kesalahan',
                    text: 'Deskripsi tidak boleh lebih dari 150 karakter.',
                    icon: 'error',
                    confirmButtonColor: "#229CDB",
                });
                return;
            }

            fetch(this.action, {
                method: 'POST', // Use POST method for update
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            })
            .then(response => response.text()) // Change to text to debug the response
            .then(text => {
                console.log('Response text:', text); // Log the response text for debugging
                try {
                    const data = JSON.parse(text);
                    if (data.success) {
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Inovasi berhasil diperbarui.',
                            icon: 'success',
                            confirmButtonColor: "#229CDB",
                            timer: 1500
                        }).then(() => {
                            window.location.reload();
                        });
                    } else {
                        throw new Error(data.message || 'Terjadi kesalahan');
                    }
                } catch (error) {
                    console.error('Error parsing JSON:', error, text);
                    Swal.fire({
                        title: 'Kesalahan',
                        text: 'Gagal memperbarui inovasi.',
                        icon: 'error',
                        confirmButtonColor: "#229CDB",
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    title: 'Kesalahan',
                    text: 'Gagal memperbarui inovasi.',
                    icon: 'error',
                    confirmButtonColor: "#229CDB",
                });
            });
        });
    });

    // Image preview
    document.querySelectorAll('[id^="logo-"]').forEach(input => {
        input.addEventListener('change', function(event) {
            const id = this.id.split('-')[1];
            const file = event.target.files[0];
            const previewContainer = document.getElementById(`new-image-preview-${id}`);
            previewContainer.innerHTML = '';

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'w-full h-auto rounded-lg';
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    });

    // Drag and Drop Handling
    document.querySelectorAll('label[for^="logo-"]').forEach(dropZone => {
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            dropZone.classList.add('border-red-500');
        }

        function unhighlight(e) {
            dropZone.classList.remove('border-red-500');
        }

        dropZone.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const id = dropZone.getAttribute('for').split('-')[1];
            const dt = e.dataTransfer;
            const files = dt.files;

            document.getElementById(`logo-${id}`).files = files;

            const event = new Event('change');
            document.getElementById(`logo-${id}`).dispatchEvent(event);
        }
    });
});
</script>
@endpush