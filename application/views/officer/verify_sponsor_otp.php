
<?php
include_once APPPATH . "views/partials/officerheader.php";
?>

<?php if ($this->session->flashdata('otp_error')): ?>
    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded text-sm text-center">
        <?= $this->session->flashdata('otp_error'); ?>
    </div>
<?php endif; ?>


<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
    <h3 class="text-lg font-bold mb-4 text-center">Thibitisha OTP ya Mdhamini</h3>

    <p class="text-sm text-gray-600 mb-4 text-center">
        OTP imetumwa kwa namba: <b><?= $phone ?></b>
    </p>

    <form method="post" action="<?= base_url('oficer/verify_sponsor_otp') ?>">
        <input type="hidden" name="customer_id" value="<?= $customer_id ?>">

        <input type="text"
               name="otp"
               maxlength="4"
               required
               class="w-full border p-3 text-center text-lg tracking-widest rounded mb-4"
               placeholder="****">

        <button type="submit"
                class="w-full bg-green-600 text-white py-2 rounded">
            Thibitisha OTP
        </button>
    </form>
</div>




<?php
include_once APPPATH . "views/partials/footer.php";
?>