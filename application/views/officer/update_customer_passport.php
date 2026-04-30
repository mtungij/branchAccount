<?php include_once APPPATH . "views/partials/officerheader.php"; ?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

        <div class="mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">Update Customer Passport</h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Upload and crop a new passport photo for this customer.</p>
        </div>

        <?php if ($msg = $this->session->flashdata('massage')): ?>
            <div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
                <div class="flex">
                    <div class="ms-3">
                        <h3 class="text-gray-800 font-semibold dark:text-white">Success</h3>
                        <p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $msg; ?></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Passport Update</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Customer ID: <?php echo $data_customer->customer_id; ?></p>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="<?php echo base_url('oficer/customer_update'); ?>" class="inline-flex items-center px-3 py-2 text-sm rounded-md bg-gray-100 hover:bg-gray-200 text-gray-800 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-200">
                            Back to Update Customer
                        </a>
                        <a href="<?php echo base_url('oficer/customer_update'); ?>" class="inline-flex items-center px-3 py-2 text-sm rounded-md bg-indigo-100 hover:bg-indigo-200 text-indigo-800 dark:bg-indigo-900/40 dark:hover:bg-indigo-900/60 dark:text-indigo-200">
                            Skip Passport Update
                        </a>
                    </div>
                </div>

                <div class="max-w-xl mx-auto">
                    <div class="mb-5">
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Existing Passport</p>
                        <div class="flex items-center gap-4">
                            <img
                                src="<?php echo !empty($existing_passport) ? base_url($existing_passport) : base_url('assets/img/customer21.png'); ?>"
                                alt="Current passport"
                                class="w-24 h-24 rounded-lg object-cover border border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700"
                            >
                            <div>
                                <?php if (!empty($existing_passport)): ?>
                                    <a href="<?php echo base_url($existing_passport); ?>" target="_blank" class="text-sm text-cyan-700 hover:text-cyan-800 dark:text-cyan-400 dark:hover:text-cyan-300">
                                        View current passport
                                    </a>
                                <?php else: ?>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">No passport uploaded yet.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:border-gray-600 dark:hover:bg-gray-600 transition">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5
                                             5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5
                                             5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8
                                             8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                    <span class="font-semibold">Click here to upload a new passport image</span>
                                </p>
                            </div>
                            <input id="dropzone-file" type="file" accept="image/*" capture="environment" class="hidden" />
                            <input type="hidden" id="customer_id" value="<?php echo $data_customer->customer_id; ?>">
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modal" class="fixed inset-0 z-50 bg-black bg-opacity-50 hidden flex justify-center items-center p-2 sm:p-4">
    <div class="bg-white dark:bg-gray-900 flex flex-col p-4 sm:p-6 rounded-lg w-full max-w-md sm:max-w-2xl md:max-w-3xl relative max-h-[95vh]">
        <button id="closeModalBtn" class="absolute top-2 right-3 text-2xl font-bold text-gray-600 hover:text-black dark:hover:text-white">&times;</button>

        <h2 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Crop Passport Photo</h2>

        <div class="flex-1 overflow-y-auto">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="flex-1">
                    <img id="imagePreview" class="max-w-full rounded hidden" />
                </div>
                <div class="preview w-32 h-32 sm:w-40 sm:h-40 border border-gray-300 overflow-hidden rounded bg-gray-100"></div>
            </div>
        </div>

        <div class="mt-4 text-right sticky bottom-0 bg-white dark:bg-gray-900 pt-2">
            <button id="cropAndUpload" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 w-full sm:w-auto">
                Crop & Upload
            </button>
        </div>
    </div>
</div>

<?php include_once APPPATH . "views/partials/footer.php"; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/cropperjs@1.5.13/dist/cropper.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/cropperjs@1.5.13/dist/cropper.min.css" />

<script>
const modal = document.getElementById('modal');
const imageElement = document.getElementById('imagePreview');
const closeModalBtn = document.getElementById('closeModalBtn');
let cropper;

function openModal() {
    modal.classList.remove('hidden');
}

function closeModal() {
    modal.classList.add('hidden');
    if (cropper) {
        cropper.destroy();
        cropper = null;
    }
    $('#dropzone-file').val('');
    $('#imagePreview').addClass('hidden').attr('src', '');
}

closeModalBtn.onclick = closeModal;

$('#dropzone-file').on('change', function (e) {
    const file = e.target.files[0];
    if (!file) return;

    const url = URL.createObjectURL(file);
    imageElement.src = url;
    $('#imagePreview').removeClass('hidden');
    openModal();

    setTimeout(() => {
        if (cropper) cropper.destroy();
        cropper = new Cropper(imageElement, {
            aspectRatio: 1,
            viewMode: 1,
            preview: '.preview'
        });
    }, 200);
});

$('#cropAndUpload').on('click', function () {
    const customerId = $('#customer_id').val();

    cropper.getCroppedCanvas({
        width: 160,
        height: 160
    }).toBlob(function (blob) {
        const reader = new FileReader();
        reader.onloadend = function () {
            const base64data = reader.result;

            $.ajax({
                url: "<?php echo base_url('oficer/upload_passport'); ?>",
                type: "POST",
                data: {
                    image: base64data,
                    customer_id: customerId
                },
                success: function () {
                    window.location.href = "<?php echo base_url('oficer/customer_update'); ?>";
                }
            });
        };
        reader.readAsDataURL(blob);
    });
});
</script>
