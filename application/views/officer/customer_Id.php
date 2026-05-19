<?php include_once APPPATH . "views/partials/officerheader.php"; ?>

<div class="w-full lg:ps-64">
  <div class="p-4 sm:p-6 space-y-6">

    <div class="mb-2">
      <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">Upload Passport & Signature</h2>
      <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Hatua ya mwisho ya usajili wa mteja.</p>
    </div>

    <div class="bg-white border shadow-sm rounded-xl p-4 dark:bg-gray-800 dark:border-gray-700">
      <div class="flex items-center justify-between text-xs sm:text-sm font-medium mb-2">
        <span class="text-cyan-700 dark:text-cyan-400">Step 3 of 3: Passport & Signature</span>
        <span class="text-gray-500 dark:text-gray-400">100%</span>
      </div>
      <div class="w-full bg-gray-200 rounded-full h-2 dark:bg-gray-700">
        <div class="bg-cyan-600 h-2 rounded-full" style="width: 100%"></div>
      </div>
    </div>

   

    <!-- Skip Button -->
    <!-- <div class="text-right mb-4">
      <a href="<?= base_url('oficer/loan_application') ?>" class="inline-flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 sm:px-5 sm:py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        <svg class="w-5 h-5 mr-2 -ms-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
        </svg>
        Skip
      </a>
    </div> -->

    <!-- Upload Area -->
    <div class="max-w-xl mx-auto">
      <div class="flex items-center justify-center w-full">
        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 transition">
          <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 20 16">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 
                   5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 
                   5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 
                   8m2-2 2 2" />
            </svg>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
              <span class="font-semibold">bonyeza hapa kuweka picha ya mkopaji</span> 
            </p>
          </div>
         <input id="dropzone-file" 
       type="file" 
       accept="image/*" 
       class="hidden" />
          <input type="hidden" id="customer_id" value="<?= $data_customer->customer_id ?>">
        </label>
      </div>
    </div>

    <!-- Modal -->
   <!-- Crop Modal -->
<!-- Crop Modal -->
<div id="modal" class="fixed inset-0 z-50 bg-black bg-opacity-50 hidden flex justify-center items-center p-2 sm:p-4">
  <div class="bg-white dark:bg-gray-900 flex flex-col p-4 sm:p-6 rounded-lg w-full max-w-md sm:max-w-2xl md:max-w-3xl relative max-h-[95vh]">

    <!-- Close Button -->
    <button id="closeModalBtn" class="absolute top-2 right-3 text-2xl font-bold text-gray-600 hover:text-black dark:hover:text-white">&times;</button>

    <!-- Title -->
    <h2 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Crop Passport Photo</h2>

    <!-- Scrollable Cropper Area -->
    <div class="flex-1 overflow-y-auto">
      <div class="flex flex-col md:flex-row gap-6">
        <div class="flex-1">
          <img id="imagePreview" class="max-w-full rounded hidden" />
        </div>
        <div class="preview w-32 h-32 sm:w-40 sm:h-40 border border-gray-300 overflow-hidden rounded bg-gray-100"></div>
      </div>
    </div>

    <!-- Sticky Action Button -->
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
          url: "<?= base_url('oficer/upload_passport') ?>",
          type: "POST",
          data: {
            image: base64data,
            customer_id: customerId
          },
          success: function () {
            window.location.href = "<?= base_url('oficer/loan_application') ?>";
          }
        });
      };
      reader.readAsDataURL(blob);
    });
  });
</script>
