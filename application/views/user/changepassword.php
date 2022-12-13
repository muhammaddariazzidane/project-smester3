<div class="lg:w-1/2 w-full mx-auto">
  <?= $this->session->flashdata('message') ?>
</div>
<div class="w-full lg:w-1/2 px-6 py-6 mx-auto">
  <form action="<?= base_url('user/changepassword') ?>" method="post">
    <div class="shadow-xl sm:rounded-md sm:overflow-hidden">
      <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
        <div>
          <label class="block text-sm font-medium text-gray-700">
            Current Password
          </label>
          <div class="mt-1">
            <input type="password" name="current_password" id="current_password" class="rounded-xl border border-indigo-300 p-2 w-full">
            <?= form_error('current_password', '<small class="p-1 text-red-600">', '</small>') ?>
          </div>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">
            New Password
          </label>
          <div class="mt-1">
            <input type="password" name="new_password1" id="new_password1" class="rounded-xl border border-indigo-300 p-2 w-full">
            <?= form_error('new_password1', '<small class="p-1 text-red-600">', '</small>') ?>
          </div>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">
            Confirm New Password
          </label>
          <div class="mt-1">
            <input type="password" name="new_password2" id="new_password2" class="rounded-xl border border-indigo-300 p-2 w-full">
            <?= form_error('new_password2', '<small class="p-1 text-red-600">', '</small>') ?>
          </div>
        </div>
      </div>
      <div class="px-4 py-3 bg-white text-right sm:px-6">
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-lg hover:text-wite text-sm font-medium rounded-md text-indigo-600 hover:text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          Change Password
        </button>
      </div>
    </div>
  </form>
</div>