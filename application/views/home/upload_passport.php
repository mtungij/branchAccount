<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Profile Picture - Loan Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css">
</head>
<body class="h-full bg-gradient-to-br from-cyan-50 to-blue-100 dark:from-gray-900 dark:to-gray-800">
    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            
            <!-- Header -->
            <div class="text-center">
                <div class="mx-auto h-20 w-20 rounded-full bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center mb-4">
                    <svg class="h-12 w-12 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13.024 9.25c.47 0 .827-.433.637-.863a4 4 0 0 0-7.322 0c-.19.43.167.863.637.863h6.048ZM4 12a4 4 0 0 0 4 4h4a4 4 0 0 0 4-4v-1H4v1Z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">
                    Upload Profile Picture
                </h2>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                   Tafadhali pakia picha yako ya profaili ili kuendelea.
                </p>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-500">
                    Karibu, <?php echo htmlspecialchars($employee->empl_name ?? 'Admin', ENT_QUOTES, 'UTF-8'); ?>
                </p>
            </div>

            <!-- Flash Messages -->
            <?php if ($this->session->flashdata('error')): ?>
            <div class="bg-red-100 border border-red-200 text-red-700 px-4 py-3 rounded-lg" role="alert">
                <p class="text-sm"><?php echo $this->session->flashdata('error'); ?></p>
            </div>
            <?php endif; ?>

            <!-- Upload Form -->
            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg p-8">
                <?php echo form_open_multipart('welcome/save_passport', ['id' => 'uploadForm']); ?>
                
                    <!-- Preview Area -->
                    <div class="mb-6">
                        <div id="photoPreview" class="mx-auto h-40 w-40 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center border-4 border-gray-300 dark:border-gray-600 overflow-hidden">
                            <svg class="h-20 w-20 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM3.465 14.493a1.23 1.23 0 0 0 .41 1.412A9.957 9.957 0 0 0 10 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 0 0-13.074.003Z" />
                            </svg>
                        </div>
                    </div>

                    <!-- File Input -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Chagua Picha <span class="text-red-500">*</span>
                        </label>
                        <label for="passport" class="flex items-center justify-center w-full py-6 px-4 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:border-gray-600 dark:hover:bg-gray-600 transition">
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                    <span class="font-semibold">Bonyeza hapa</span> kupiga picha au kuchagua
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    PNG, JPG, GIF hadi 5MB
                                </p>
                            </div>
                        </label>
                        <input type="file" 
                               id="passport" 
                               name="passport" 
                               accept="image/*"
                               capture="environment"
                               class="hidden"
                               onchange="previewPhoto(this)">
                        <input type="hidden" id="cropped_image" name="cropped_image">
                    </div>

                    <!-- Submit Button (Initially Hidden) -->
                    <button type="button" 
                            id="submitBtn"
                            onclick="showCropperWarning()"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.25 13.25a.75.75 0 0 0 1.5 0V4.636l2.955 3.129a.75.75 0 0 0 1.09-1.03l-4.25-4.5a.75.75 0 0 0-1.09 0l-4.25 4.5a.75.75 0 1 0 1.09 1.03L9.25 4.636v8.614Z" />
                            <path d="M3.5 12.75a.75.75 0 0 0-1.5 0v2.5A2.75 2.75 0 0 0 4.75 18h10.5A2.75 2.75 0 0 0 18 15.25v-2.5a.75.75 0 0 0-1.5 0v2.5c0 .69-.56 1.25-1.25 1.25H4.75c-.69 0-1.25-.56-1.25-1.25v-2.5Z" />
                        </svg>
                        Pakia na Endelea
                    </button>

                <?php echo form_close(); ?>
            </div>

            <!-- Note -->
            <p class="text-center text-xs text-gray-500 dark:text-gray-400">
               Hii ni muhimu kwa usalama na utambulisho wako.
            </p>
        </div>
    </div>

    <!-- Cropper Modal -->
    <div id="cropperModal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-black bg-opacity-50">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-2xl w-full">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Crop Your Photo</h3>
                        <button type="button" onclick="closeCropperModal()" class="text-gray-400 hover:text-gray-500">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    
                    <div class="max-h-96 overflow-hidden">
                        <img id="cropperImage" style="max-width: 100%;">
                    </div>
                    
                    <div class="mt-6 flex justify-end gap-3">
                        <button type="button" onclick="closeCropperModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-600">
                            Cancel
                        </button>
                        <button type="button" onclick="cropAndSubmit(event)" class="px-4 py-2 text-sm font-medium text-white bg-cyan-600 rounded-lg hover:bg-cyan-700">
                            Crop & Continue
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
    <script>
        let cropper = null;
        let currentFile = null;

        function previewPhoto(input) {
            if (input.files && input.files[0]) {
                currentFile = input.files[0];
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    // Show cropper modal
                    document.getElementById('cropperModal').classList.remove('hidden');
                    
                    // Set image source
                    const cropperImage = document.getElementById('cropperImage');
                    cropperImage.src = e.target.result;
                    
                    // Destroy previous cropper instance if exists
                    if (cropper) {
                        cropper.destroy();
                    }
                    
                    // Initialize cropper
                    cropper = new Cropper(cropperImage, {
                        aspectRatio: 1,
                        viewMode: 2,
                        dragMode: 'move',
                        autoCropArea: 1,
                        restore: false,
                        guides: true,
                        center: true,
                        highlight: false,
                        cropBoxMovable: true,
                        cropBoxResizable: true,
                        toggleDragModeOnDblclick: false,
                    });
                };
                
                reader.readAsDataURL(currentFile);
            }
        }

        function closeCropperModal() {
            document.getElementById('cropperModal').classList.add('hidden');
            if (cropper) {
                cropper.destroy();
                cropper = null;
            }
            document.getElementById('passport').value = '';
        }

        function cropAndSubmit(event) {
            if (!cropper) return;
            
            const submitBtn = event.target;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<svg class="animate-spin h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Processing...';
            
            // Get cropped canvas
            const canvas = cropper.getCroppedCanvas({
                width: 300,
                height: 300,
                imageSmoothingQuality: 'high'
            });
            
            // Convert canvas to blob
            canvas.toBlob(function(blob) {
                // Create new file input with cropped image
                const dataTransfer = new DataTransfer();
                const file = new File([blob], 'profile.jpg', { type: 'image/jpeg' });
                dataTransfer.items.add(file);
                document.getElementById('passport').files = dataTransfer.files;
                
                // Submit the form
                document.getElementById('uploadForm').submit();
            }, 'image/jpeg', 0.9);
        }
    </script>
</body>
</html>
